<?php
require_once "../dao/order.php";
require_once "../dao/product_variants.php";
require_once "../dao/cart.php";
require_once "../dao/images.php";
require_once "../dao/users.php";

if (isset($_SESSION['user'])) {
   $order_id = $_GET['order_id'];
   $order = select_order_by_id($order_id);
   $carts = select_all_cart_by_order_id($order_id);
   $order_user = select_one_user($order['user_id']);
}
?>

<main class="col-md-10">
   <section class="form">
      <!-- breadcrumb area start -->
   <section class="breadcrumb__area include-bg pt-95 pb-90">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="breadcrumb__content p-relative z-index-1">
                  <h3 class="breadcrumb__title">Track your order</h3>
                  <div class="breadcrumb__list">
                     <span><a href="#">Home</a></span>
                     <span>Track your order</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb area end -->

   <!-- order area start -->
   <section class="tp-order-area pb-160">
      <div class="container">
         <div class="tp-order-inner">
            <div class="row gx-0">
               <div class="col-lg-6">
                  <div class="tp-order-details" data-bg-color="#4F3D97">
                     <div class="tp-order-details-top text-center mb-70">
                        <div class="tp-order-details-icon">
                           <span style="overflow: hidden;">
                              <img width="140px" src="../content/img/users/<?= $order_user['photo']?>" alt="">
                           </span>
                        </div>
                        <div class="tp-order-details-content">
                           <h3 class="tp-order-details-title">Your Order Confirmed</h3>
                           <p>We will send you a shipping confirmation email as soon <br> as your order ships</p>
                        </div>
                     </div>
                     <div class="tp-order-details-item-wrapper">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="tp-order-details-item">
                                 <h4>Order Date:</h4>
                                 <p><?= $order['order_date'] ?></p>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="tp-order-details-item">
                                 <h4>Expected Delivery: </h4>
                                 <p><?= date('Y-m-d', strtotime($order['order_date'] . ' +7 days')) ?></p>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="tp-order-details-item">
                                 <h4>Order Number:</h4>
                                 <p>#<?= $order_id ?? '' ?></p>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="tp-order-details-item">
                                 <h4>User Email:</h4>
                                 <p><?= $order_user['email'] ?? '' ?></p>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="tp-order-details-item">
                                 <h4>User Name:</h4>
                                 <p><?= $order_user['name'] ?? '' ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="tp-order-info-wrapper">
                     <h4 class="tp-order-info-title">Order Details</h4>

                     <div class="tp-order-info-list">
                        <ul>

                           <!-- header -->
                           <li class="tp-order-info-list-header">
                              <h4>Product</h4>
                              <h4>Total</h4>
                           </li>

                           <!-- item list -->
                           <?php if (isset($_SESSION['user']))
                              foreach ($carts as $cart) : ?>
                              <li class="tp-order-info-list-desc">
                                 <p><?= select_product_name_by_cart_id($cart['cart_id'])['name'] ?>.
                                    <span><?= select_variant_by_id($cart['variant_id'])['color_name'] ?></span>
                                    <span><?= select_variant_by_id($cart['variant_id'])['size_name'] ?></span>
                                    <span> x<?= $cart['quantity'] ?></span>

                                 </p>
                                 <img width="60px" src="../content/img/products/<?= $cart['product_id']?>/<?= select_one_img_by_product_id($cart['product_id'])['img_name']?>" alt="#">
                                 <span><?= number_format($cart['price'] * $cart['quantity']) ?></span>
                              </li>
                           <?php endforeach ?>
                           <!-- shipping -->
                           <!-- shipping -->
                           <li class="tp-order-info-list-shipping">
                              <span>Shipping</span>
                              <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                 <span>
                                    <label for="shipping_info">Flat rate: <span><?= number_format($order['shipping']) ?></span></label>
                                 </span>
                              </div>
                           </li>

                           <!-- total -->
                           <li class="tp-order-info-list-total">
                              <span>Total</span>
                              <span><?= number_format($order['total_price']) ?>VND</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- order area end -->
   </section>
</main>