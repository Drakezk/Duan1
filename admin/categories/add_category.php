<?php
require_once '../dao/categories.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    if (strlen($name) == 0) {
        $messiage['name'] = "Please enter category name";
    } else {
        insert_category($name);
        setcookie("add-category", "Successfully added product category", time() + 30);
        header("location: index.php?act=categories");
        die();
    }
}
?>
<!-- form -->
<form class="col-md-10" action="" method="post">
    <div class="form-group">
        <label for="ma-loai">Category ID: </label>
        <input type="text" class="form-control" id="ma-loai" name="category_id" placeholder="auto number" readonly>
    </div>
    <div class="form-group">
        <label for="ten-loai">Category Name:</label>
        <input type="text" class="form-control" id="ten-loai" name="name">
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-outline-primary">Add New</button>
        <button type="reset" class="btn btn-outline-primary">Retype</button>
        <a href="index.php?act=categories"><button type="button" class="btn btn-outline-primary">List</button></a>
    </div>
</form>