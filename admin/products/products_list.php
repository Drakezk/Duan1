<?php
require_once "../dao/products.php";
require_once "../dao/categories.php";

// hiện cookie
if (isset($_COOKIE['add-product'])) {
    echo '<div class="alert alert-success" role="alert">
            ' . $_COOKIE['add-product'] . '
          </div>
    ';
}

if (isset($_COOKIE['delete-product'])) {
    echo '<div class="alert alert-success" role="alert">
            ' . $_COOKIE['delete-product'] . '
          </div>
    ';
}

if (isset($_COOKIE['edit-product'])) {
    echo '<div class="alert alert-success" role="alert">
            ' . $_COOKIE['edit-product'] . '
          </div>
    ';
}



$page_number = isset($_GET['page']) ? $_GET['page'] : 1;

if ($page_number <= 1) {
    $page_number = 1;
}
if ($page_number >= $page_number)

    $limit = 10;
$total_products = count_all_products();
$total_page = ceil($total_products['total'] / $limit);

if ($page_number <= 1) {
    $page_number = 1;
}
if ($page_number >= $total_page) {
    $page_number = $total_page;
}


$start = ($page_number - 1) * $limit;

$products = select_products_by_page($start, $limit);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $total_products = count_all_products_by_keyword($keyword);
        $total_page = ceil($total_products['total'] / $limit);
        if ($page_number <= 1) {
            $page_number = 1;
        }
        if ($page_number >= $total_page) {
            $page_number = $total_page;
        }
        $start = ($page_number - 1) * $limit;

        $products = select_all_products_by_keyword($keyword,$start,$limit);
    }
}

?>

<div class="cont col-md-10">
    <!-- search box -->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <form class="d-flex" action="" method="post">
            <input name="keyword" class="form-control me-2" type="search" placeholder="Search category, product name" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        </form>
    </div>
</nav>

<table class="table">
    <thead>
        <tr>
            <th scope="col"><button>All</button></th>
            <th scope="col">Product ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Date Added</th>
            <th scope="col">Sold</th>
            <th scope="col">Optional</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <th scope="col"><input class="form-check-input" type="checkbox" value="<?= $product['product_id'] ?>" name="check_hh[]"></th>
                <th scope="col">
                    <?= $product['product_id'] ?>
                </th>
                <th scope="col">
                    <?= $product['name'] ?>
                </th>
                <th scope="col">
                    <?php $category = category_select_by_id($product['category_id']);
                    echo $category['name'];
                    ?>
                </th>
                <th scope="col">
                    <?= number_format($product['price'], 0) ?>
                </th>
                <th scope="col">
                    <?= $product['quantity'] ?>
                </th>
                <th scope="col">
                    <?= $product['date_added'] ?>
                </th>
                <th scope="col">
                    <?= $product['sold'] ?>
                </th>
                <th scope="col">
                    <a href="index.php?act=edit_product&product_id=<?= $product['product_id'] ?>"><button class="btn btn-outline-primary">Edit</button></a>
                    <a onclick="return confirm('Bạn có muốn xóa hàng này không')" href="products/delete_product.php?product_id=<?= $product['product_id'] ?>"><button class="btn btn-outline-primary">Delete</button></a>
                </th>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- page number list -->
<section class="page-number my-5">
    <div class="d-flex justify-content-center">
        <a class="mx-2" href="index.php?act=products&page=1">|&lt;</a>
        <a class="mx-2" href="index.php?act=products&page=<?= $page_number - 1 ?>">&lt;&lt;</a>
        <?php
        for ($i = 0; $i < $total_page; $i++) {
            echo '<a id="page' . ($i + 1) . '" class="mx-2" href="index.php?act=products&page=' . ($i + 1) . '"><button type="button" class="btn btn-primary">' . ($i + 1) . '</button></a>';
        }
        ?>
        <a class="mx-2" href="index.php?act=products&page=<?= $page_number + 1 ?>">&gt;&gt;</a>
        <a class="mx-2" href="index.php?act=products&page=<?= $total_page ?>">&gt;|</a>
    </div>

</section>

<section class="mt-1">
    <div class="button">
        <a href="index.php?act=add-product"><button type="button" class="btn btn-outline-primary">Add new</button></a>
    </div>
</section>
</div>

<script>
    document.getElementById('page<?= $page_number ?>').style.border = "2px solid green";
</script>