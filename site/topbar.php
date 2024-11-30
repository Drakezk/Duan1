<?php
if (isset($_SESSION['user'])) {
   $carts = select_cart_by_user_id($_SESSION['user']['user_id']);
}
$total = 0;
?>


<!-- pre loader area start -->
<div id="loading">
   <div id="loading-center">
      <div id="loading-center-absolute">
         <!-- loading content here -->
         <div class="tp-preloader-content">
            <div class="tp-preloader-logo">
               <div class="tp-preloader-circle">
                  <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                     </circle>
                     <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                  </svg>
               </div>
               <img src="assets/img/logo/preloader/preloader-icon.svg" alt="">
            </div>
            <h3 class="tp-preloader-title">Shofy</h3>
            <p class="tp-preloader-subtitle">Loading</p>
         </div>
      </div>
   </div>
</div>
<!-- pre loader area end -->

<!-- back to top start -->
<div class="back-to-top-wrapper">
   <button id="back_to_top" type="button" class="back-to-top-btn">
      <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
      </svg>
   </button>
</div>
<!-- back to top end -->

<!-- offcanvas area start -->
<div class="offcanvas__area">
   <div class="offcanvas__wrapper">
      <div class="offcanvas__close">
         <button class="offcanvas__close-btn offcanvas-close-btn">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round" />
               <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round" />
            </svg>
         </button>
      </div>
      <div class="offcanvas__content">
         <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
            <div class="offcanvas__logo logo">
               <a href="index.html">
                  <img src="assets/img/logo/logo.svg" alt="logo">
               </a>
            </div>
         </div>
         <div class="offcanvas__category pb-40">
            <button class="tp-offcanvas-category-toggle">
               <i class="fa-solid fa-bars"></i>
               All Categories
            </button>
            <div class="tp-category-mobile-menu">

            </div>
         </div>
         <div class="tp-main-menu-mobile fix mb-40"></div>

         <div class="offcanvas__contact align-items-center d-none">
            <div class="offcanvas__contact-icon mr-20">
               <span>
                  <img src="assets/img/icon/contact.png" alt="">
               </span>
            </div>
            <div class="offcanvas__contact-content">
               <h3 class="offcanvas__contact-title">
                  <a href="tel:098-852-987">004524865</a>
               </h3>
            </div>
         </div>
         <div class="offcanvas__btn">
            <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
         </div>
      </div>
      <div class="offcanvas__bottom">
         <div class="offcanvas__footer d-flex align-items-center justify-content-between">
            <div class="offcanvas__currency-wrapper currency">
               <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                  id="tp-offcanvas-currency-toggle">Currency : USD</span>
               <ul class="offcanvas__currency-list tp-currency-list">
                  <li>USD</li>
                  <li>ERU</li>
                  <li>BDT </li>
                  <li>INR</li>
               </ul>
            </div>
            <div class="offcanvas__select language">
               <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                  <div class="offcanvas__lang-img mr-15">
                     <img src="assets/img/icon/language-flag.png" alt="">
                  </div>
                  <div class="offcanvas__lang-wrapper">
                     <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                        id="tp-offcanvas-lang-toggle">English</span>
                     <ul class="offcanvas__lang-list tp-lang-list">
                        <li>Spanish</li>
                        <li>Portugese</li>
                        <li>American</li>
                        <li>Canada</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="body-overlay"></div>
<!-- offcanvas area end -->

<!-- mobile menu area start -->
<div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
   <div class="container">
      <div class="row row-cols-5">
         <div class="col">
            <div class="tp-mobile-item text-center">
               <a href="shop.html" class="tp-mobile-item-btn">
                  <i class="flaticon-store"></i>
                  <span>Store</span>
               </a>
            </div>
         </div>
         <div class="col">
            <div class="tp-mobile-item text-center">
               <button class="tp-mobile-item-btn tp-search-open-btn">
                  <i class="flaticon-search-1"></i>
                  <span>Search</span>
               </button>
            </div>
         </div>
         <div class="col">
            <div class="tp-mobile-item text-center">
               <a href="wishlist.html" class="tp-mobile-item-btn">
                  <i class="flaticon-love"></i>
                  <span>Wishlist</span>
               </a>
            </div>
         </div>
         <div class="col">
            <div class="tp-mobile-item text-center">
               <a href="profile.html" class="tp-mobile-item-btn">
                  <i class="flaticon-user"></i>
                  <span>Account</span>
               </a>
            </div>
         </div>
         <div class="col">
            <div class="tp-mobile-item text-center">
               <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                  <i class="flaticon-menu-1"></i>
                  <span>Menu</span>
               </button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- mobile menu area end -->

<!-- search area start -->
<section class="tp-search-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="tp-search-form">
               <div class="tp-search-close text-center mb-20">
                  <button class="tp-search-close-btn tp-search-close-btn"></button>
               </div>
               <form action="#">
                  <div class="tp-search-input mb-10">
                     <input type="text" placeholder="Search for product...">
                     <button type="submit"><i class="flaticon-search-1"></i></button>
                  </div>
                  <div class="tp-search-category">
                     <span>Search by : </span>
                     <a href="#">Men, </a>
                     <a href="#">Women, </a>
                     <a href="#">Children, </a>
                     <a href="#">Shirt, </a>
                     <a href="#">Demin</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- search area end -->

<!-- cart mini area start -->
<div class="cartmini__area">
   <div class="cartmini__wrapper d-flex justify-content-between flex-column">
      <div class="cartmini__top-wrapper">
         <div class="cartmini__top p-relative">
            <div class="cartmini__top-title">
               <h4>Shopping cart</h4>
            </div>
            <div class="cartmini__close">
               <button type="button" class="cartmini__close-btn cartmini-close-btn">
                  <i class="fal fa-times"></i>
               </button>
            </div>
         </div>
         <div class="cartmini__shipping">
         </div>
         <div class="cartmini__widget">

            <!-- cart mini start -->
            <?php if (isset($_SESSION['user']))
               foreach ($carts as $cart): ?>
                  <div class="cartmini__widget-item">
                     <div class="cartmini__thumb">
                        <a href="index.php?act=product-details&product_id=<?= $cart['product_id'] ?>">
                           <img src="../content/img/products/<?= $cart['product_id'] ?>/<?= $cart['img_name'] ?>" alt="#">
                        </a>
                     </div>
                     <div class="cartmini__content">
                        <h5 class="cartmini__title"><a
                              href="index.php?act=product-details&product_id=<?= $cart['product_id'] ?>"><?= $cart['name'] ?></a>
                        </h5>
                        <div class="cartmini__price-wrapper">
                           <span class="cartmini__price">
                              <?= number_format($cart['price']) ?>đ
                           </span>
                           <span class="cartmini__quantity">x
                              <?= $cart['quantity'] ?>
                           </span>
                           <span style="color: <?= $cart['color_name'] ?>;" class="cartmini__quantity fs-6">
                              <?= $cart['color_name'] ?></span>
                           <span class="cartmini__quantity">
                              <?= $cart['size_name'] ?>
                           </span>
                        </div>
                     </div>
                     <!-- form xóa cart -->
                     <form method="post">
                        <input type="hidden" value="<?= $cart['cart_id']?>" name="cart_id">
                        <button onclick="submitFormDeleteCart(this)" type="button"><a href="#" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a></button>
                     </form>
                     <!-- end form -->
                  </div>
                  <?php $total += $cart['price'] * $cart['quantity']; ?>
               <?php endforeach ?>
            <!-- cart mini end -->

         </div>
         <!-- for wp -->
         <!-- if no item in cart -->
         <div class="cartmini__empty text-center d-none">
            <img src="assets/img/product/cartmini/empty-cart.png" alt="">
            <p>Your Cart is empty</p>
            <a href="shop.html" class="tp-btn">Go to Shop</a>
         </div>
      </div>
      <div class="cartmini__checkout">
         <div class="cartmini__checkout-title mb-30">
            <h4>Subtotal:</h4>

            <span>
               <?= number_format($total) ?>VND
            </span>
         </div>
         <div class="cartmini__checkout-btn">
            <a href="index.php?act=cart" class="tp-btn mb-10 w-100"> view cart</a>
            <a href="index.php?act=checkout" class="tp-btn tp-btn-border w-100"> checkout</a>
         </div>
      </div>
   </div>
</div>
<!-- cart mini area end -->


<script>
    function submitFormDeleteCart(buttonElement) {
      var formElement = $(buttonElement).closest("form");
      var formData = formElement.serialize();
      var carticon = $('#cart-count');
      var cartDIV = buttonElement.parentNode.parentNode;

      // Sử dụng Ajax để gửi dữ liệu form đến máy chủ PHP
      $.ajax({
        type: "POST",
        url: "delete-from-cart.php", //địa chỉ xử lý dữ liệu form trên máy chủ.
        data: formData,
        success: function(response) {
          // Xử lý kết quả trả về từ máy chủ ở đây
          console.log(response);
        if(response == "successfully"){
         cartDIV.parentNode.removeChild(cartDIV);
        }
      },
        error: function() {
          // Xử lý lỗi (nếu có)
          console.error('Đã xảy ra lỗi khi gửi form.');
          
        }
      });
    }
  </script>