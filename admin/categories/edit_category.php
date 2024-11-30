<?php
require_once "../dao/categories.php";
$category_id = $_GET["category_id"];
$category = category_select_by_id($category_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    if (strlen($name) == 0) {
        $messiage['name'] = "Please enter a name";
    } else {
        category_update($category_id,$name);
        setcookie("edit-category", "Edited category sucessfully", time() + 30);
        header("location: index.php?act=categories");
        // die();
    }
}
?>

<!-- form -->
<form class="col-md-10" action="" method="post">
    <div class="form-group">
        <label for="ma-loai">Categori ID :</label>
        <input type="text" class="form-control" id="ma-loai" name="category_id" placeholder="<?= $category_id?>" readonly value="<?= $category_id?>">
    </div>
    <div class="form-group">
        <label for="ten-loai">Category Name:</label>
        <input type="text" class="form-control" id="ten-loai" name="name" value="<?= $category['name']?>">
    </div>
    <div class="mt-1">
        <button type="submit" class="btn btn-outline-primary">Edit</button>
        <button type="reset" class="btn btn-outline-primary">Retype</button>
        <a href="index.php?act=categories"><button type="button" class="btn btn-outline-primary">List</button></a>
    </div>
</form>