<?php
require_once "../dao/users.php";

$total_users = count_users();
$limit = 5;
$total_page = ceil($total_users['total'] / $limit);

// nếu không có page number thì mặc định là 1
$page_number = isset($_GET['page']) ? $_GET['page'] : 1;

if ($page_number <= 1) {
    $page_number = 1;
}

if ($page_number >= $total_page) {
    $page_number = $total_page;
}


$start = ($page_number - 1) * $limit;

$users = select_user_by_page($start, $limit);

if (isset($_COOKIE['add-user'])) {
    echo '<div class="alert alert-success" role="alert">
            ' . $_COOKIE['add-user'] . '
          </div>
    ';
}

if (isset($_COOKIE['delete-user'])) {
    echo '<div class="alert alert-success" role="alert">
            ' . $_COOKIE['delete-user'] . '
          </div>
    ';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $total_users = count_all_users_by_keyword($keyword);
        $total_page = ceil($total_users['total'] / $limit);
        if ($page_number <= 1) {
            $page_number = 1;
        }
        if ($page_number >= $total_page) {
            $page_number = $total_page;
        }
        $start = ($page_number - 1) * $limit;

        $users = select_all_user_by_keyword($keyword, $start, $limit);
    }
}

?>

<div class="cont col-md-10 p-4">
    <!-- search box -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <form class="d-flex" action="" method="post">
            <input name="keyword" class="form-control me-2" type="search" placeholder="Search user-id, name" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        </form>
    </div>
</nav>


<!-- users -->

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">USER ID</th>
            <th scope="col">FULL NAME</th>
            <th scope="col">EMAIL ADDRESS</th>
            <th scope="col">PHOTO</th>
            <th scope="col">GENDER</th>
            <th scope="col">PHONE NUMBER</th>
            <th scope="col">REGISTRATION DATE</th>
            <th scope="col">ROLE</th>
            <th scope="col">CUSTOM</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="col">
                    <input class="form-check-input" type="checkbox" value="<?= $user['user_id'] ?>" name="check_hh">
                </th>
                <th scope="col">
                    <?= $user['user_id'] ?>
                </th>
                <th scope="col">
                    <?= $user['name'] ?>
                </th>
                <th scope="col">
                    <?= $user['email'] ?>
                </th>
                <th scope="col">
                    <img src="../content/img/users/<?= $user['photo'] ?>" alt="#" width="100px">
                </th>
                <th scope="col">
                    <?= $user['sex'] ?>
                </th>
                <th scope="col">
                    <?= $user['phone_number'] ?>
                </th>
                <th scope="col">
                    <?= $user['created_on'] ?>
                </th>
                <th scope="col" style="color: <?= $user['status'] == 1 ? 'green' : 'red' ?>;">
                    <?= $user['status'] == 1 ? 'đã kích hoạt' : 'chưa kích hoạt' ?>
                </th>
                <th scope="col">
                    <?= $user['type'] == 1 ? 'admin' : 'khách hàng' ?>
                </th>
                <th scope="col">
                    <a href="index.php?act=edit_user&user_id=<?= $user['user_id'] ?>"><button class="btn btn-outline-primary">Edit</button></a>
                    <a onclick="return confirm('Bạn có muón xóa khách hàng này không')" href="users/delete_user.php?user_id=<?= $user['user_id'] ?>"><button class="btn btn-outline-primary">Delete</button></a>
                </th>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<section class="mt-1">
    <div class="button">
        <a href="index.php?act=add-user"><button type="button" class="btn btn-outline-primary">Add New</button></a>
    </div>
</section>
<!-- page number list -->
<section class="page-number my-5">
    <div class="d-flex justify-content-center">
        <a class="mx-2" href="index.php?act=users&page=1">|&lt;</a>
        <a class="mx-2" href="index.php?act=users&page=<?= $page_number - 1 ?>">&lt;&lt;</a>
        <div class="btn-group me-2" role="group" aria-label="First group">
            <?php
            for ($i = 0; $i < $total_page; $i++) {
                echo '<a id="page' . ($i + 1) . '" class="mx-2" href="index.php?act=users&page=' . ($i + 1) . '"><button type="button" class="btn btn-primary">' . ($i + 1) . '</button></a>';
            }
            ?>
        </div>
        <a class="mx-2" href="index.php?act=users&page=<?= $page_number + 1 ?>">&gt;&gt;</a>
        <a class="mx-2" href="index.php?act=users&page=<?= $total_page ?>">&gt;|</a>
    </div>

</section>
</div>



.

<!-- js -->

<script>
    document.getElementById('page<?= $page_number ?>').style.border = "2px solid green";
    var checkBox = document.getElementsByClassName('form-check-input');
    var checkAll = document.getElementById('check-all');
    var uncheck = document.getElementById('uncheck');

    function check() {
        for (var i in checkBox) {
            if (checkBox[i].checked = "false") {
                checkBox[i].checked = true;
            }
        }
    }

    checkAll.addEventListener('click', check);
    uncheck.addEventListener('click', function() {
        for (var i in checkBox) {
            if (checkBox[i].checked = "true") {
                checkBox[i].checked = false;
            }
        }
    });
</script>
