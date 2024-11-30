<?php
session_start();

// các URL cần thiết cho trang web
$ROOT_URL = "/du_an_1";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";


/*
 * Định nghĩa đường dẫn chứa ảnh sử dụng trong upload
 */
$IMAGE_DIR = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/content/img/";
/*
 * 2 biến toàn cục cần thiết để chia sẻ giữa controller và view
 */
$VIEW_NAME = "index.html";
$MESSAGE = '';
// GIỚI THIỆU GLOBAL.PHP
/**
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra
 * @return boolean true tồn tại
 */
function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}
/**
 * Lưu file upload vào thư mục
 * @param string $fieldname là tên trường file
 * @param string $target_dir thư mục lưu file
 * @return tên file upload
 */
function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = $file_uploaded["name"];
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}
// GIỚI THIỆU GLOBAL
// .PHP
/**
 * Tạo cookie
 * @param string $name là tên cookie
 * @param string $value là giá trị cookie
 * @param int $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookie
 * @param string $name là tên cookie
 */
function delete_cookie($name){
    add_cookie($name, '', -1);
}
/**
 * Đọc giá trị cookie
 * @param string $name là tên cookie
 * @return string giá trị của cookie
 */
function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}



/**
 * kiểm tra dăng nhập
 * các php trong trang admin hoặc yêu cầu phải đăng nhập thì dùng hàm này
 * nếu tài khoản là admin thì return -> done
 * nếu trang đó không phải là trang của admin thì cũng return-> done
 * nếu tài khoản là user bình thường mà trang đó lại là trang admin thì không cho phép truy cập,
 * và out ra trang đăng nhấp 
 **/

function check_login()
{
    global $SITE_URL;
    if (isset($_SESSION['user'])) {
        // nếu là khách hàng thì return
        if ($_SESSION['user']['type'] == true) {
            return;
        }

        // nếu url không chứa /admin/ tức là trang admin thì return
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
            return;
        }
    }
    $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"]; // tạo session chứa link trang hiện tại
    header("location: $SITE_URL/index.php");
}
?>