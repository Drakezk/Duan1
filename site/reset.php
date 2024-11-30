<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['change_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $con_new_password = $_POST['con_new_password'];
        echo $con_new_password, $old_password, $new_password;
        if (strlen($$old_password) == 0) {
            $message['old_password'] = "Please enter password";
        }
        if (strlen($new_password) == 0) {
            $message['new_password'] = "Please enter new password";
        }

        if ($old_password != $user['password']) {
            $message['password'] = "Incorrect password";
        }

        if (!isset($message)) {
            if ($new_password !== $new_password) {
                $message['$con_new_password'] = "Please re-enter new password";
            } else {
                $pass_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $_SESSION['user']['password'] = $pass_hash;
                update_password($_SESSION['user']['user_id'], $pass_hash);
                setcookie("update-password", "Password changed successfully", time() + 30);
            }
        }

    }
}
?>