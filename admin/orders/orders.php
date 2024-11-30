<?php
require_once "../dao/order.php";
require_once "../dao/users.php";

// phân trang
$page_number = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_orders = count_all_order();
$total_page = ceil($total_orders['total'] / $limit);

if ($page_number <= 1) {
    $page_number = 1;
}
if ($page_number >= $total_page) {
    $page_number = $total_page;
}

$start = ($page_number - 1) * $limit;

$orders = order_select_by_page($start, $limit);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $status = $_POST['status'];
        $order_id = $_POST['order_id'];
        for ($i = 0; $i < count($order_id); $i++) {
            update_status_by_order_id($order_id[$i], $status[$i]);
            setcookie("update-orders", "Sửa thành công", time() + 30);
        }
        $orders = order_select_by_page($start, $limit);
    } else if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $total_orders = count_all_order_by_keyword($keyword);
        $total_page = ceil($total_orders['total'] / $limit);
        if ($total_page == 0) {
            $total_page = 1;
        }
        if ($page_number >= $total_page) {
            $page_number = $total_page;
        }
        if ($page_number <= 1) {
            $page_number = 1;
        }
        
        $start = ($page_number - 1) * $limit;

        try {
            $orders = select_all_order_by_keyword($keyword, $start, $limit);
        } catch (PDOException $e) {
            echo '<span style="color: red;">no result</span>';
        }
    }
}





?>

<!-- search box -->
<div class="cont col-md-10">
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <form class="d-flex" action="" method="post">
            <input name="keyword" class="form-control me-2" type="search" placeholder="Search user_name,email user-id, order-id" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        </form>
    </div>
</nav>

<div class="tab-pane fade  show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
    <div class="profile__ticket table-responsive">
        <form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Date Ordered</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- order list -->
                    <?php if (isset($orders))
                        foreach ($orders as $order) : ?>
                        <tr>
                            <td scope="row">
                                <?= select_one_user($order['user_id'])['name'] ?>
                            </td>
                            <td scope="row">
                                <input type="hidden" name="order_id[]" value="<?= $order['order_id'] ?>">
                                <?= select_one_user($order['user_id'])['email'] ?>
                            </td>
                            <td data-info="title">
                                <?= $order['order_date'] ?>
                            </td>
                            <td data-info="title">
                                <?= number_format($order['total_price']) ?>
                            </td>
                            <td data-info="status">
                                <select name="status[]" id="">
                                    <option value="<?= $order['order_status'] ?>" selected><?= $order['order_status'] == 1 ? "Complete" : "Pending" ?></option>
                                    <option value="<?= $order['order_status'] == 1 ? '0' : '1' ?>"><?= $order['order_status'] == 1 ? 'Pending' : "Complete" ?></option>
                                </select>
                            </td>
                            <td><a href="index.php?act=order-detail&order_id=<?= $order['order_id'] ?>" class="tp-logout-btn">Invoice</a></td>
                        </tr>
                    <?php endforeach ?>
                    <!-- end -->
                </tbody>
            </table>
            <div class="mt-1">
                <button name="update" type="submit" class="btn btn-outline-primary">Update List</button>
            </div>
        </form>
    </div>
    <!-- page number list -->
    <section class="page-number my-5">
        <div class="d-flex justify-content-center">
            <a class="mx-2" href="index.php?act=orders&page=1">|&lt;</a>
            <a class="mx-2" href="index.php?act=orders&page=<?= $page_number - 1 ?>">&lt;&lt;</a>
            <?php
            for ($i = 0; $i < $total_page; $i++) {
                echo '<a id="page' . ($i + 1) . '" class="mx-2" href="index.php?act=orders&page=' . ($i + 1) . '"><button type="button" class="btn btn-primary">' . ($i + 1) . '</button></a>';
            }
            ?>
            <a class="mx-2" href="index.php?act=orders&page=<?= $page_number + 1 ?>">&gt;&gt;</a>
            <a class="mx-2" href="index.php?act=orders&page=<?= $total_page ?>">&gt;|</a>
        </div>
    </section>
</div>
</div>