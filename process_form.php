<?php
// Xử lý dữ liệu form ở đây
$username = $_POST['username'];
$email = $_POST['email'];
// Xử lý dữ liệu ở đây (ví dụ: lưu vào cơ sở dữ liệu, gửi email, vv.)

// Trả về phản hồi (response) dạng văn bản (text) cho Ajax.
echo "Dữ liệu của bạn đã được gửi thành công!";
echo $username . " " . $email;
?>