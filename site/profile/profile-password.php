<?php
$user = select_one_user($_SESSION['user']['user_id']);
// print_r($_SESSION['user']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['change_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $con_new_password = $_POST['con_new_password'];

        if (strlen($old_password) == 0) {
            $message['old_password'] = "Please enter password";
        }
        if (strlen($new_password) == 0) {
            $message['new_password'] = "Please enter new password";
        }

        if (!isset($message)) {
            echo "Error: none";
            if ($new_password !== $con_new_password) {
                $message['con_new_password'] = "Please re-enter new password";
            } else {
                if (!password_verify($old_password, $user['password'])) {
                    $message['password'] = "Incorrect password";
                } else {
                    $pass_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $_SESSION['user']['password'] = $pass_hash;
                    update_password($_SESSION['user']['user_id'], $pass_hash);
                    setcookie("update-password", "Password changed successfully", time() + 30, '/');
                    header("Location: index.php?act=profile&profile=main");
                }
            }
        }
    }
}
?>

<div class="tab-pane fade show active" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
    <div class="profile__password">
        <!-- change password form -->
        <form id="myForm" action="" method="post">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="tp-profile-input-box">
                        <div class="tp-contact-input">
                            <input name="old_password" id="old_pass" type="password" name="old_password">
                        </div>
                        <div class="<?= isset($message['old_password']) ? "alert" : "" ?> alert-danger">
                            <?= $message['old_password'] ?? '' ?>
                        </div>
                        <div class="<?= isset($message['password']) ? "alert" : "" ?> alert-danger">
                            <?= $message['password'] ?? '' ?>
                        </div>
                        <div class="tp-profile-input-title">
                            <label for="old_pass">Old Password</label>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="tp-profile-input-box">
                        <div class="tp-profile-input">
                            <input name="new_password" id="new_pass" type="password">
                        </div>
                        <div class="<?= isset($message['new_password']) ? "alert" : "" ?> alert-danger">
                            <?= $message['new_password'] ?? '' ?>
                        </div>
                        <div class="tp-profile-input-title">
                            <label for="new_pass">New Password</label>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="tp-profile-input-box">
                        <div class="tp-profile-input">
                            <input name="con_new_password" id="con_new_pass" type="password">
                        </div>
                        <div class="<?= isset($message['con_new_password']) ? "alert" : "" ?> alert-danger">
                            <?= $message['con_new_password'] ?? '' ?>
                        </div>
                        <div class="tp-profile-input-title">
                            <label for="con_new_pass">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="profile__btn">
                        <button type="submit" class="tp-btn" name="change_password">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>