<?php

// xử lý form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $quantity_list = $_POST['quantity'];
  $cart_list = $_POST['cart-id'];

  for ($i = 0; $i < count($cart_list); $i++) {
    cart_update_quantity($cart_list[$i], $quantity_list[$i]);
  }
}



if (isset($_SESSION['user'])) {
  $carts = select_cart_by_user_id($_SESSION['user']['user_id']);
}
$total = 0;

?>
<main>
  <!-- breadcrumb area start -->
  <section class="breadcrumb__area include-bg pt-95 pb-50">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
            <h3 class="breadcrumb__title">Shopping Cart</h3>
            <div class="breadcrumb__list">
              <span><a href="#">Home</a></span>
              <span>Shopping Cart</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb area end -->

  <!-- cart area start -->
  <section class="tp-cart-area pb-120">
    <div class="container">
      <div class="row">

        <div class="col-xl-9 col-lg-8">
          <!-- form -->
          <form action="" method="post">
            <div class="tp-cart-list mb-25 mr-30">

              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2" class="tp-cart-header-product">
                      Product
                    </th>
                    <th class="">Color</th>
                    <th class="">Size</th>
                    <th class="tp-cart-header-price">Price</th>
                    <th class="tp-cart-header-quantity">Quantity</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- cart list start -->
                  <?php if (isset($_SESSION['user'])) foreach ($carts as $cart) : ?>
                    <tr>
                      <!-- img -->
                      <td class="tp-cart-img">
                        <a href="index.php?act=product-details&product_id=<?= $cart['product_id']?>">
                          <img src="../content/img/products/<?= $cart['product_id'] ?>/<?= $cart['img_name'] ?>" alt="" /></a>
                      </td>
                      <!-- title -->
                      <td class="tp-cart-title">
                        <a href="#"><?= select_product_name_by_cart_id($cart['cart_id'])['name'] ?></a>
                      </td>
                      <!-- color -->
                      <td style="color: <?= $cart['color_name'] ?>;" class=""><?= $cart['color_name'] ?></td>
                      <!-- size -->
                      <td class=""><?= $cart['size_name'] ?></td>
                      <!-- price -->
                      <td class="tp-cart-price"><span><?= number_format($cart['price']) ?></span></td>
                      <!-- quantity -->
                      <td class="tp-cart-quantity">
                        <div class="tp-product-quantity mt-10 mb-10">
                          <span class="tp-cart-minus">
                            <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </span>
                          <!-- input quantity -->
                          <input class="tp-cart-input" type="text" value="<?= $cart['quantity'] ?>" name="quantity[]" />

                          <span class="tp-cart-plus">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </span>
                        </div>
                      </td>
                      <!-- action -->
                      <td class="tp-cart-action">
                        <a href="delete-from-cart.php?cart_id=<?= $cart['cart_id'] ?>"><button type="button" class="tp-cart-action-btn">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor" />
                            </svg>
                            <span>Remove</span>
                          </button></a>
                      </td>
                    </tr>
                    <input type="hidden" name="cart-id[]" value="<?= $cart['cart_id'] ?>">
                    <?php $total += $cart['price'] * $cart['quantity']; ?>
                  <?php endforeach ?>
                  <!-- cart list end -->
                </tbody>
              </table>

            </div>
            <div class="tp-cart-bottom">
              <div class="row align-items-end">
                <div class="col-xl-6 col-md-8">
                  <div class="tp-cart-coupon">
                    <form action="#">
                      <div class="tp-cart-coupon-input-box">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-xl-6 col-md-4">
                  <div class="tp-cart-update text-md-end">
                    <button type="submit" class="tp-cart-update-btn">
                      Update Cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- form end -->
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div class="tp-cart-checkout-wrapper">
            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
              <span class="tp-cart-checkout-top-title">Subtotal</span>
              <span class="tp-cart-checkout-top-price"><?= number_format($total) ?>VND</span>
            </div>
            <div class="tp-cart-checkout-shipping">
              <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

              <div class="tp-cart-checkout-shipping-option-wrapper">
                <div class="tp-cart-checkout-shipping-option">
                  <input id="flat_rate" type="radio" name="shipping" value="20000" />
                  <label for="flat_rate">Mặc định: <span>20.000</span></label>
                </div>
                <div class="tp-cart-checkout-shipping-option">
                  <input id="local_pickup" type="radio" name="shipping" value="25000" />
                  <label for="local_pickup">Phí giao hàng: <span> 25.000</span></label>
                </div>
                <div class="tp-cart-checkout-shipping-option">
                  <input id="free_shipping" type="radio" name="shipping" value="0" />
                  <label for="free_shipping">FreeShip</label>
                </div>
              </div>
            </div>
            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
              <span>Total</span>
              <span id="total-price"><?= number_format($total) ?>VND</span>
            </div>
            <div class="tp-cart-checkout-proceed">
              <a href="index.php?act=checkout" class="tp-cart-checkout-btn w-100">Thanh Toán</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- cart area end -->
</main>
<script>
  const shippingInputs = document.querySelectorAll('input[name="shipping"]');
  const totalPrice = document.getElementById('total-price');
  // biến format số sang số vietnam
  const formatter = new Intl.NumberFormat('vi-VN');

  shippingInputs.forEach(input => {
    input.addEventListener('click', () => {
      const selectedValue = input.value;
      // Hiển thị giá trị được chọn trong thẻ div kết quả
      if (input.checked == true) {
        // format số
        totalPrice.textContent = formatter.format(Number(selectedValue) + <?= $total ?>) + "VND";
      }
    })
  });
</script>