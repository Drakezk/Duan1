<?php
require_once "../dao/users.php";
$user_id = $_GET['user_id'];
$user = select_one_user($user_id);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $file = $_FILES['photo'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // check is file a image
    $img = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
    $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    $check_img = in_array($file_ext, $img);

    // validate the form
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message['email'] = 'Please enter the correct email format';
    }
    if (strlen($name) == 0) {
        $message['name'] = 'Please enter your name';
    }

    if (strlen($sex) == 0) {
        $message['sex'] = 'Please choose a gender';
    }


    if ($file['size'] > 0) {
        if (!$check_img) {
            $message['check_photo'] = 'The file is not a image file';
        }
    }

    if (strlen($address) == 0){
        $message['address'] = "Please enter your address";
    }

    if(!preg_match("/^0\d{9}$/", $phone_number)){
        $message['phone_number'] = 'The phone number is not a valid number';
    }

    if(strlen($phone_number) == 0) {
        $message['phone_number'] = 'Please enter your phone number';
    }


    // nếu không có lỗi message thì form được submit

    if (!isset($message)) {
        move_uploaded_file($file['tmp_name'], "../content/img/users/" . $file['name']);
        update_user($user_id,$email,$type,$name,$address,$phone_number,$file['name'],$status,$sex);
        setcookie("edit-user", "update thành công", time() + 30);
        header("location: index.php?act=users");
        die();
    }
}


?>

<!-- form -->
<section class="form col-md-10">
    <form class="row g-3" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $user['email'] ?? ''?>">
            <div class="<?= isset($message['email']) ? 'alert' : '' ?> alert-danger">
                <?= $message['email'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Full name</label>
            <input type="text" class="form-control" id="inputPassword4" name="name" value="<?= $user['name'] ?? ''?>">
            <div class="<?= isset($message['name']) ? 'alert' : '' ?> alert-danger">
                <?= $message['name'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Gender</label>
            <select class="form-select" name="sex">
                <option value="nam" <?php if($user['sex']  == "Male") {echo 'selected';}else{echo '';}?>>Male</option>
                <option value="nữ" <?php if($user['sex']  == "Famate") {echo 'selected';}else{echo '';}?>>Famate</option>
            </select>
            <div class="<?= isset($message['sex']) ? 'alert' : '' ?> alert-danger">
                <?= $message['sex'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Photo</label>
            <input type="file" class="form-control" id="inputPassword4" name="photo" accept="image/*">
            <div class="<?= isset($message['check_photo']) ? 'alert' : '' ?> alert-danger">
                <?= $message['check_photo'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label w-100">Status</label>
            <div class="border border-1 rounded-3" style="height: 38px;">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="0" <?php if($user['status']  == "0") {echo 'checked';}else{echo '';}?>>
                    <label class="form-check-label" for="inlineRadio1">Not activated</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="1" <?php if($user['status']  == "1") {echo 'checked';}else{echo '';}?>>
                    <label class="form-check-label" for="inlineRadio2">Activated</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label w-100">User Type</label>
            <div class="border border-1 rounded-3" style="height: 38px;">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="0" <?php if($user['type']  == "0") {echo 'checked';}else{echo '';}?>>
                    <label class="form-check-label" for="inlineRadio1">Customer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="1" <?php if($user['type']  == "1") {echo 'checked';}else{echo '';}?>>
                    <label class="form-check-label" for="inlineRadio2">Admin</label>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="inputEmail4" name="phone_number" value="<?= $user['phone_number'] ?? ''?>">
            <div class="<?= isset($message['phone_number']) ? 'alert' : '' ?> alert-danger">
                <?= $message['phone_number'] ?? '' ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $user['address'] ?? ''?></textarea>
            <div class="<?= isset($message['address']) ? 'alert' : '' ?> alert-danger">
                <?= $message['address'] ?? '' ?>
            </div>
        </div>
        <!-- button -->
        <div class="button">
            <button type="submit" class="btn btn-outline-primary">Edit</button>
            <button type="reset" class="btn btn-outline-primary">Retype</button>
            <a href="index.php?act=users"><button type="button" class="btn btn-outline-primary">List</button></a>
        </div>
    </form>
</section>