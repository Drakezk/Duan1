<?php
require_once "../dao/categories.php";

if (isset($_COOKIE['add-category'])) {
    echo '<div class="alert alert-success" role="alert">
        ' . $_COOKIE['add-category'] . '
           </div>
            ';
}

if (isset($_COOKIE['delete-category'])) {
    echo '<div class="alert alert-success" role="alert">
        ' . $_COOKIE['delete-category'] . '
           </div>
            ';
}

if (isset($_COOKIE['edit-category'])) {
    echo '<div class="alert alert-success" role="alert">
        ' . $_COOKIE['edit-category'] . '
           </div>
            ';
}

$page_number = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;

$total_categories = categorie_count_all();
$total_page = ceil($total_categories['total'] / $limit);

if ($page_number <= 1) {
    $page_number = 1;
}
if ($page_number >= $total_page) {
    $page_number = $total_page;
}

$start = ($page_number - 1) * $limit;

$categories = categorie_select_by_page($start, $limit);

?>

<div class="cont col-md-10">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Category ID</th>
                <th>Category ID</th>
                <th>Custom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><input class="checkbox" type="checkbox" value=""></td>
                    <td>
                        <?= $category['category_id'] ?>
                    </td>
                    <td>
                        <?= $category['name'] ?>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary" href="index.php?act=edit-category&category_id=<?= $category['category_id'] ?>"><button>Edit</button></a>
                        <a class="btn btn-outline-primary" onclick="return confirm('Do you want to delete this category')" href="categories/delete_category.php?category_id=<?= $category['category_id'] ?>"><button>Delete</button></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- page number list -->
    <section class="page-number my-5">
        <div class="d-flex justify-content-center">
            <a class="mx-2" href="index.php?act=categories&page=1">|&lt;</a>
            <a class="mx-2" href="index.php?act=categories&page=<?= $page_number - 1 ?>">&lt;&lt;</a>
            <?php
            for ($i = 0; $i < $total_page; $i++) {
                echo '<a id="page' . ($i + 1) . '" class="mx-2" href="index.php?act=categories&page=' . ($i + 1) . '"><button type="button" class="btn btn-primary">' . ($i + 1) . '</button></a>';
            }
            ?>
            <a class="mx-2" href="index.php?act=categories&page=<?= $page_number + 1 ?>">&gt;&gt;</a>
            <a class="mx-2" href="index.php?act=categories&page=<?= $total_page ?>">&gt;|</a>
        </div>
    </section>

    <!-- button -->
    <section class="mt-1">
        <div class="button">
            <a href="index.php?act=add-category"><button type="button" class="btn btn-outline-primary">Add new</button></a>
        </div>
    </section>
</div>