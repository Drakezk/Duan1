<?php
require_once "../dao/users.php";

// thông báo đổi mật khẩu thành công
if (isset($_COOKIE['update-password'])) {
   echo '<div class="alert alert-success" role="alert">
           ' . $_COOKIE['update-password'] . '
         </div>
   ';
}



if (!isset($_SESSION['user'])) {
   header("Location: index.php?act=login");
   die();
}
?>



<main>

   <!-- profile area start -->
   <section class="profile__area pt-120 pb-120">
      <div class="container">
         <div class="profile__inner p-relative">
            <div class="profile__shape">
               <img class="profile__shape-1" src="assets/img/login/laptop.png" alt="">
               <img class="profile__shape-2" src="assets/img/login/man.png" alt="">
               <img class="profile__shape-3" src="assets/img/login/shape-1.png" alt="">
               <img class="profile__shape-4" src="assets/img/login/shape-2.png" alt="">
               <img class="profile__shape-5" src="assets/img/login/shape-3.png" alt="">
               <img class="profile__shape-6" src="assets/img/login/shape-4.png" alt="">
            </div>
            <div class="row">
               <div class="col-xxl-4 col-lg-4">
                  <div class="profile__tab mr-40">
                     <nav>
                        <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                           <a class="nav-link <?php if(isset($_GET['profile'])){ if($_GET['profile'] == 'main' || $_GET['profile'] == false){echo 'active' ;} else{echo "";}}?>"
                              href="index.php?act=profile&profile=main"><button  type="button"><span><i
                                       class="fa-regular fa-user-pen"></i></span>Profile</button></a>
                           <a class="nav-link <?php if(isset($_GET['profile'])){ if($_GET['profile'] == 'info'){echo 'active' ;} else{echo "";}}?>" href="index.php?act=profile&profile=info"><button class="" id=""
                                 data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab"
                                 aria-controls="nav-information"><span><i class="fa-regular fa-circle-info"></i></span>
                                 Information</button></a>
                           <a class="nav-link <?php if(isset($_GET['profile'])){ if($_GET['profile'] == 'address'){echo 'active' ;} else{echo "";}}?>" href="index.php?act=profile&profile=address"><button class=""
                                 data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab"
                                 aria-controls="nav-address"><span><i class="fa-light fa-location-dot"></i></span>
                                 Address
                              </button></a>
                           <a class="nav-link <?php if(isset($_GET['profile'])){ if($_GET['profile'] == 'order'){echo 'active' ;} else{echo "";}}?>" href="index.php?act=profile&profile=order"><button class=""
                                 data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab"
                                 aria-controls="nav-order"><span><i class="fa-light fa-clipboard-list-check"></i></span>
                                 My Orders </button></a>
                           <a class="nav-link <?php if(isset($_GET['profile'])){ if($_GET['profile'] == 'notifi'){echo 'active' ;} else{echo "";}}?>" href="index.php?act=profile&profile=notifi"><button class=""
                                 data-bs-toggle="tab" data-bs-target="#nav-notification" type="button" role="tab"
                                 aria-controls="nav-notification"><span><i class="fa-regular fa-bell"></i></span>
                                 Notification</button></a>
                           <a class="nav-link <?php if(isset($_GET['profile'])){ if($_GET['profile'] == 'password'){echo 'active' ;} else{echo "";}}?>" href="index.php?act=profile&profile=password"><button class=""
                                 data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab"
                                 aria-controls="nav-password"><span><i class="fa-regular fa-lock"></i></span> Change
                                 Password</button></a>
                           <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                        </div>
                     </nav>
                  </div>
               </div>
               <div class="col-xxl-8 col-lg-8">
                  <div class="profile__tab-content">
                     <div class="tab-content" id="profile-tabContent">
                        <!--php xử lý content -->
                        <?php
                        if (isset($_GET['profile'])) {
                           $profile = $_GET['profile'];
                           switch ($profile) {
                              case 'info':
                                 require_once "profile-info.php";
                                 break;

                              case "address":
                                 require_once "profile-address.php";
                                 break;

                              case "order":
                                 require_once "profile-order.php";
                                 break;

                              case 'notifi':
                                 require_once "profile-notifi.php";
                                 break;
                              case 'password':
                                 require_once "profile-password.php";
                                 break;

                              default:
                                 require_once "profile-main.php";
                           }
                        } else {
                           require_once "profile-main.php";
                        }

                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</main>
<!-- Hiển thị kết quả từ máy chủ sau khi submit -->