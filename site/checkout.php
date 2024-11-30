<?php
if (isset($_SESSION['user'])) {
   $carts = select_cart_by_user_id($_SESSION['user']['user_id']);

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $street = $_POST['street'];
      $city = $_POST['city'];
      $address = $city . ' ' . $street;

      $note = $_POST['note'];
      $total_price = $_POST['total-price'];
      $date = date('Y-m-d');
      $user_id = $_SESSION['user']['user_id'];



      if (!isset($_POST['agree'])) {
         $message['agree'] = "Please read and agree to the website.";
      } else {
         if (strlen($street) == 0) {
            $message['street'] = "Please type a street";
         }
         if (strlen($city) == 0) {
            $message['city'] = "Please type a city";
         }
         if(!isset( $_POST['shipping'])){
            $message['shipping'] = "Please choose a shipping method";
         }else{
            $shipping = $_POST['shipping'];
         }     
      }

      if (!isset($message)) {
         $order_id = add_order($date, $user_id, $total_price, $address, $note, $shipping);
         foreach ($carts as $cart) {
            // insert into cart_order table 
            add_order_cart($cart['cart_id'], $order_id);
            foreach($carts as $cart) {
               cart_update_status($cart['cart_id']);
               update_product_after_order($cart['product_id'],$cart['quantity']);
            }
            header("location: index.php?act=profile&profile=order");
         }
      }
   }
} else {
   echo '<div class="alert alert-warning" role="alert">
            Not logged in
         </div>';
}
$total = 0;
?>


<main>
   <!-- breadcrumb area start -->
   <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content p-relative z-index-1">
                  <h3 class="breadcrumb__title">Checkout</h3>
                  <div class="breadcrumb__list">
                     <span><a href="#">Home</a></span>
                     <span>Checkout</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb area end -->

   <!-- checkout area start -->
   <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
      <div class="container">
         <!-- main form -->
         <form action="" method="post">
            <div class="row">
               <div class="col-lg-7">
                  <div class="tp-checkout-bill-area">
                     <h3 class="tp-checkout-bill-title">Billing Details</h3>

                     <div class="tp-checkout-bill-form">

                        <div class="tp-checkout-bill-inner">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <label>Địa Chỉ</label>
                                    <input type="text" placeholder="Số nhà và tên đường" name="street">
                                 </div>
                                 <div class="<?= isset($message['street']) ? 'alert' : '' ?> alert-danger">
                                    <?= $message['street'] ?? '' ?>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <label>Tỉnh / Tp</label>
                                    <input type="text" placeholder="" name="city">
                                 </div>
                                 <div class="<?= isset($message['city']) ? 'alert' : '' ?> alert-danger">
                                    <?= $message['city'] ?? '' ?>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="tp-checkout-input">
                                    <label>Ghi Chú</label>
                                    <textarea placeholder="Lưu ý đặc biệt khi giao hàng..."
                                       name="note"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="col-lg-5">
                  <!-- checkout place order -->
                  <div class="tp-checkout-place white-bg">
                     <h3 class="tp-checkout-place-title">Your Order</h3>

                     <div class="tp-order-info-list">
                        <ul>

                           <!-- header -->
                           <li class="tp-order-info-list-header">
                              <h4>Product</h4>
                              <h4>Total</h4>
                           </li>

                           <!-- item list -->
                           <?php if (isset($_SESSION['user']))
                              foreach ($carts as $cart): ?>
                                 <li class="tp-order-info-list-desc">
                                    <p>
                                       <?= select_product_name_by_cart_id($cart['cart_id'])['name'] ?>. <span>
                                          <?= $cart['color_name'] ?>
                                       </span>. <span>
                                          <?= $cart['size_name'] ?>
                                       </span>. <span>x
                                          <?= $cart['quantity'] ?>
                                       </span>
                                    </p>
                                    <span>
                                       <?= number_format($cart['price'] * $cart['quantity'])?>
                                    </span>
                                 </li>
                                 <?php $total += $cart['price'] * $cart['quantity']; ?>
                              <?php endforeach ?>

                           <!-- subtotal -->
                           <li class="tp-order-info-list-subtotal">
                              <span>Subtotal</span>
                              <span>
                                 <?= number_format($total) ?? '0' ?>VND
                              </span>
                           </li>

                           <!-- shipping -->
                           <li class="tp-order-info-list-shipping">
                              <span>Shipping</span>
                              <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                 <span>
                                    <input id="flat_rate" type="radio" name="shipping" value="20000">
                                    <label for="flat_rate">Mặc định: <span>20.000</span></label>
                                 </span>
                                 <span>
                                    <input id="local_pickup" type="radio" name="shipping" value="25000">
                                    <label for="local_pickup">Phí giao hàng: <span>25.000</span></label>
                                 </span>
                                 <span>
                                    <input id="free_shipping" type="radio" name="shipping" value="0">
                                    <label for="free_shipping">FreeShip</label>
                                 </span>
                              </div>
                           </li>
                           <div class="<?= isset($message['shipping']) ? 'alert' : '' ?> alert-danger">
                                    <?= $message['shipping'] ?? '' ?>
                                 </div>

                           <!-- total -->
                           <li class="tp-order-info-list-total">
                              <span>Total</span>
                              <span id="total-price">
                                 <?= number_format($total) ?>VND
                              </span>
                              <input id="total-price-input" type="hidden" name="total-price" value="0">
                           </li>
                        </ul>
                     </div>
                     <div class="tp-checkout-payment">
                        <div class="tp-checkout-payment-item">
                           <input type="radio" id="back_transfer" name="payment">
                           <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Chuyển khoản ngân hàng</label>
                        </div>
                        <div class="tp-checkout-payment-item">
                           <input type="radio" id="cod" name="payment">
                           <label for="cod">Trả tiền khi nhận được hàng</label>
                        </div>
                     </div>
                     <div class="tp-checkout-agree">
                        <div class="tp-checkout-option">
                           <input id="read_all" type="checkbox" name="agree">
                           <label for="read_all">Tôi đã đọc và đồng ý với các <span style="color: red;">điều khoản </span>.</label>
                        </div>
                        <div class="<?= isset($message['agree']) ? 'alert' : '' ?> alert-danger">
                           <?= $message['agree'] ?? '' ?>
                        </div>
                     </div>
                     <div class="tp-checkout-btn-wrapper">
                        <button type="submit" class="tp-checkout-btn w-100">Đặt Hàng</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <!-- end form -->
      </div>
   </section>
   <!-- checkout area end -->
</main>


<script>
   const shippingInputs = document.querySelectorAll('input[name="shipping"]');
   const totalPrice = document.getElementById('total-price');
   const totalPriceInput = document.getElementById('total-price-input');
   // biến format số sang số vietnam
   const formatter = new Intl.NumberFormat('vi-VN');

   shippingInputs.forEach(input => {
      input.addEventListener('click', () => {
         const selectedValue = input.value;
         // Hiển thị giá trị được chọn trong thẻ div kết quả
         if (input.checked == true) {
            // format số
            totalPrice.textContent = formatter.format(Number(selectedValue) + <?= $total ?>) + "VND";
            totalPriceInput.value = Number(selectedValue) + <?= $total ?>;
         }
      })
   });
</script>