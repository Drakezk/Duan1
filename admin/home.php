<?php
require_once "header.php";
require_once "../dao/order.php";
require_once "../dao/users.php";
require_once "../dao/products.php";

$order_count = count_all_order();
$user_count = count_users();
$product_count = count_all_products();

// phân trang
$page_number = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
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
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dashboard-header h1 {
            font-size: 30px;
        }

        .dashboard-cards {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 23%;
            text-align: center;
            font-size: 20px;
        }

        .card h2 {
            margin: 0;
            font-size: 40px;
        }

        .card .title {
            font-size: 18px;
            color: #7f8c8d;
        }

        .card .amount {
            font-weight: bold;
        }

        .table-responsive {
            margin-top: 40px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #3498db;
            color: white;
        }

        table tr:hover {
            background-color: #ecf0f1;
        }
    </style>

    <div class="cont col-md-10 p-4">
        <!-- Main content -->
    <div class="content p-4">
        <div class="dashboard-header">
            <h1>Trang Thống Kê</h1>
        </div>

        <!-- Dashboard Statistics Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <h2><?php echo $order_count['total']; ?></h2>
                <p class="title">Đơn hàng</p>
                <p class="amount">+15% từ tuần trước</p>
            </div>
            <div class="card">
                <h2>30.000.000 VND</h2>
                <p class="title">Doanh thu</p>
                <p class="amount">+10% từ tuần trước</p>
            </div>
            <div class="card">
                <h2><?php echo $user_count['total']; ?></h2>
                <p class="title">Khách hàng</p>
                <p class="amount">+5% từ tuần trước</p>
            </div>
            <div class="card">
                <h2><?php echo $product_count['total']; ?></h2>
                <p class="title">Sản phẩm bán được</p>
                <p class="amount">+20% từ tuần trước</p>
            </div>
        </div>

        <!-- Sales Table -->
        <div class="table-responsive">
            <h3>Danh sách đơn hàng gần đây</h3>
            <table>
                <thead>
                    <tr>
                        <th>Khách hàng</th>
                        <th>Ngày</th>
                        <th>Giá tiền</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($orders))
                        foreach ($orders as $order) : ?>
                        <tr>
                            <td>
                                <?= select_one_user($order['user_id'])['name'] ?>
                            </td>
                            <td>
                                <?= $order['order_date'] ?>
                            </td>
                            <td>
                                <?= number_format($order['total_price']) ?>
                            </td>
                            <td><a href="index.php?act=order-detail&order_id=<?= $order['order_id'] ?>" class="tp-logout-btn">Invoice</a></td>
                        </tr>
                    <?php endforeach ?>
                    <!-- <tr>
                        <td>#103</td>
                        <td>2024-11-28</td>
                        <td>Phạm Minh C</td>
                        <td>5</td>
                        <td>500,000 VND</td>
                    </tr>
                    <tr>
                        <td>#104</td>
                        <td>2024-11-27</td>
                        <td>Lê Thị D</td>
                        <td>1</td>
                        <td>100,000 VND</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    </div>
<!-- <div class="main col-md-10">
    <h1>Đây là trang cho quản trị viên</h1>
</div> -->
