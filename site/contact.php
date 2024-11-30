<?php

// hiện cookie
if (isset($_COOKIE['add-contact'])) {
  echo '<div class="alert alert-success" role="alert">
          ' . $_COOKIE['add-contact'] . '
        </div>
  ';
}

if (isset($_POST['send-msg'])) {
  $email = $_POST['email'];
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $msg = $_POST['message'];


  // validate the form
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message['email'] = 'Please enter the correct email format';
  }
  if (strlen($name) == 0) {
    $message['name'] = 'Please enter your name';
  }
  if (strlen($subject) == 0) {
    $message['subject'] = "Please enter subject";
  }
  if (strlen($msg) == 0) {
    $message['msg'] = "Please enter your message";
  }

  if (!isset($message)) {

    add_contact($email, $name, $subject, $msg);
    setcookie("add-contact", "submitted successfully", time() + 30);
  }
}
?>

<main>
  <!-- breadcrumb area start -->
  <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
            <h3 class="breadcrumb__title">Contact Us</h3>
            <div class="breadcrumb__list">
              <span><a href="#">Home</a></span>
              <span>Contact</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb area end -->

  <!-- contact area start -->
  <section class="tp-contact-area pb-100">
    <div class="container">
      <div class="tp-contact-inner">
        <div class="row">
          <div class="col-xl-9 col-lg-8">
            <div class="tp-contact-wrapper">
              <h3 class="tp-contact-title">Send Message</h3>

              <div class="tp-contact-form">
                <!-- form start -->
                <form action="" method="POST">
                  <div class="tp-contact-input-wrapper">
                    <div class="tp-contact-input-box">
                      <div class="tp-contact-input">
                        <input name="name" id="name" type="text" placeholder="Nguyen Van A" />
                      </div>
                      <div class="tp-contact-input-title">
                        <label for="name">Your Name</label>
                      </div>
                    </div>
                    <div class="<?= isset($message['name']) ? 'alert' : '' ?> alert-danger">
                      <?= $message['name'] ?? '' ?>
                    </div>
                    <div class="tp-contact-input-box">
                      <div class="tp-contact-input">
                        <input name="email" id="email" type="email" placeholder="shofy@mail.com" />
                      </div>
                      <div class="tp-contact-input-title">
                        <label for="email">Your Email</label>
                      </div>
                    </div>
                    <div class="<?= isset($message['email']) ? 'alert' : '' ?> alert-danger">
                      <?= $message['email'] ?? '' ?>
                    </div>
                    <div class="tp-contact-input-box">
                      <div class="tp-contact-input">
                        <input name="subject" id="subject" type="text" placeholder="Write your subject" />
                      </div>
                      <div class="tp-contact-input-title">
                        <label for="subject">Subject</label>
                      </div>
                    </div>
                    <div class="<?= isset($message['subject']) ? 'alert' : '' ?> alert-danger">
                      <?= $message['subject'] ?? '' ?>
                    </div>
                    <div class="tp-contact-input-box">
                      <div class="tp-contact-input">
                        <textarea id="message" name="message" placeholder="Write your message here..."></textarea>
                      </div>
                      <div class="tp-contact-input-title">
                        <label for="message">Your Message</label>
                      </div>
                    </div>
                    <div class="<?= isset($message['msg']) ? 'alert' : '' ?> alert-danger">
                      <?= $message['msg'] ?? '' ?>
                    </div>
                  </div>
                  <div class="tp-contact-btn">
                    <button type="submit" name="send-msg">Send Message</button>
                  </div>
                </form>
                <!-- form end -->
                <!-- <p class="ajax-response"></p> -->
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4">
            <div class="tp-contact-info-wrapper">
              <div class="tp-contact-info-item">
                <div class="tp-contact-info-icon">
                  <span>
                    <img src="assets/img/contact/contact-icon-1.png" alt="" />
                  </span>
                </div>
                <div class="tp-contact-info-content">
                  <p data-info="mail">
                    <a href="mailto:contact@shofy.com">contact@shofy.com</a>
                  </p>
                  <p data-info="phone">
                    <a href="tel:670-413-90-762">+849 469 85 816</a>
                  </p>
                </div>
              </div>
              <div class="tp-contact-info-item">
                <div class="tp-contact-info-icon">
                  <span>
                    <img src="assets/img/contact/contact-icon-2.png" alt="" />
                  </span>
                </div>
                <div class="tp-contact-info-content">
                  <p>
                    <a href="https://www.google.com/maps/place/New+York,+NY,+USA/@40.6976637,-74.1197638,11z/data=!3m1!4b1!4m6!3m5!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728!16zL20vMDJfMjg2" target="_blank">
                    79 Cau Giay. <br />
                      Ha Noi, Viet Nam 1432
                    </a>
                  </p>
                </div>
              </div>
              <div class="tp-contact-info-item">
                <div class="tp-contact-info-icon">
                  <span>
                    <img src="assets/img/contact/contact-icon-3.png" alt="" />
                  </span>
                </div>
                <div class="tp-contact-info-content">
                  <div class="tp-contact-social-wrapper mt-5">
                    <h4 class="tp-contact-social-title">
                    Tìm kiếm trên MXH
                    </h4>

                    <div class="tp-contact-social-icon">
                      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                      <a href="#"><i class="fa-brands fa-twitter"></i></a>
                      <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact area end -->
</main>