<?php

if (isset($_SESSION['user'])){
    $orders = select_order_by_user($_SESSION['user']['user_id']);
}

?>

<div class="tab-pane fade  show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
    <div class="profile__ticket table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <!-- order list -->
                <?php if(isset($orders)) foreach ($orders as $order) : ?>
                <tr>
                    <th scope="row"> #<?= $order['order_id']?></th>
                    <td data-info="title"><?= number_format($order['total_price'])?></td>
                    <td data-info="status <?= $order['order_status'] == 1 ? 'done' : 'pending' ?>"><?= $order['order_status'] == 0 ? 'Pending' : "Complete" ?> </td>
                    <td><a href="index.php?act=order&order_id=<?= $order['order_id']?>" class="tp-logout-btn">Invoice</a></td>
                </tr>
                <?php endforeach ?>
                <!-- end -->
            </tbody>
        </table>
    </div>
</div>