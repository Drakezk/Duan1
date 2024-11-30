<?php
require_once "../dao/products.php";
require_once "../dao/categories.php";
require_once "../dao/images.php";
$product_id = $_GET["product_id"];
$product = select_product_by_id($product_id);
$product_cate = category_select_by_id($product['category_id']);
$categories = categories_select_all();
$images = select_img_by_product_id($product_id);




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // xử lý form thông tin sản phẩm
    if (isset($_POST['edit-info'])) {
        $category = $_POST['category'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];


        if (strlen($category) == 0) {
            $message['category'] = 'Please select a category';
        }

        if (strlen($name) == 0) {
            $message['name'] = 'Please enter product name';
        }

        if (strlen($description) == 0) {
            $message['description'] = "Please enter product description";
        }

        if ($price <= 0) {
            $message['price'] = "Please enter a price";
        }

        if ($quantity <= 0) {
            $message['quantity'] = "Please enter a quantity";
        }

        if (!isset($message)) {
            echo $product_id;
            edit_product_by_id($category, $name, $quantity, $price, $description, $product_id);
            setcookie("edit-product", "edited product sucessfully", time() + 30);
            header("location: index.php?act=products");
            die();
        }
    }


    // php xử lý các file ảnh của sản phẩm
    if (isset($_POST['add-img'])) {
        // Xử lí dữ liệu từ add-img
        $imgs = $_FILES['images'];
        if ($imgs['size'][0] != null) {
            for ($i = 0; $i < count($imgs['name']); $i++) {
                $path_dir = "../content/img/products/$product_id/";
                if (!file_exists($path_dir)) {
                    // Tạo thư mục mới
                    mkdir($path_dir);
                }
                move_uploaded_file($imgs['tmp_name'][$i], "$path_dir" . $imgs['name'][$i]);
                add_image($imgs['name'][$i], $product_id);
                header("location: index.php?act=edit_product&product_id=$product_id");
            }
        }
    }
    
}



// check form sản phẩm
?>
<div class="row col-md-10">
    <section class="col">
        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Product name</label>
                <input type="text" class="form-control" id="inputPassword4" name="name" value="<?= $product['name'] ?>">
                <div class="alert-danger">
                    <?= $message['name'] ?? '' ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="inputAddress" class="form-label">Price</label>
                <input type="number" class="form-control" id="inputAddress" name="price" placeholder="giá" value="<?= $product['price'] ?>">
                <div class="alert-danger">
                    <?= $message['price'] ?? '' ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="inputAddress" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="inputAddress" name="quantity" value="<?= $product['quantity'] ?>">
                <div class="alert-danger">
                    <?= $message['quantity'] ?? '' ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="inputState" class="form-label">Category</label>
                <select id="inputState" class="form-select" name="category">
                    <option value="<?= $product_cate['category_id'] ?>" selected><?= $product_cate['name'] ?></option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="alert-danger">
                    <?= $message['category'] ?? '' ?>
                </div>
            </div>

            <!-- thông báo lỗi ảnh -->
            <div id="message-container"></div>

            <div class="col-12">
                <label for="inputZip" class="form-label">Description</label>
                <textarea name="description" style="min-height: 200px;" class="form-control" placeholder="mô tả" id="description"><?= $product['description'] ?></textarea>
                <div class="alert-danger">
                    <?= $message['description'] ?? '' ?>
                </div>
            </div>


            <!-- button -->
            <div class="button">
                <button type="submit" name="edit-info" class="btn btn-outline-primary">Edit</button>
                <button type="reset" class="btn btn-outline-primary">Retype</button>
                <a href="index.php?act=products"><button type="button" class="btn btn-outline-primary">List</button></a>
            </div>
        </form>
    </section>

    <section class="col">
        <!-- render ảnh -->
        <div class="row g-3">
            <?php foreach ($images as $image) : ?>
                <div class="col-md-3">
                    <div>
                        <img width="200px" height="260px" src="../content/img/products/<?php echo $product_id . '/' . $image['img_name'] ?>" alt="#">
                    </div>
                    <div class="mt-2">
                        <a class="mx-auto" href="images/delete_image.php?product_id=<?= $product_id ?>&img_id=<?= $image['img_id'] ?>" onclick="return confirm('bạn có muốn xóa ảnh này không')"><button type="button" class="btn btn-outline-primary">Delete image</button></a>
                    </div>
                </div>

            <?php endforeach ?>
        </div>



        <div class="col-md-12 mt-3">
            <label for="inputCity" class="form-label">Inages</label>
            <form action="" method="post" enctype="multipart/form-data">
                <div id="img-input">
                    <input id="image-input" type="file" class="form-control" id="inputAnh" name="images[]" accept="image/*" multiple>
                </div>
                <button type="submit" name="add-img" class="btn btn-outline-primary">Add image</button>
            </form>

            <!-- preview image -->
            <div id="preview-container" class="row g-3 mt-5">
            </div>
            <!-- // thông báo -->
            <div class="alert-danger">
                <?= $message['size'] ?? '' ?>
            </div>
            <div class="alert-danger">
                <?= $message['image'] ?? '' ?>
            </div>
        </div>
    </section>
</div>
<script>
    document.getElementById("image-input").addEventListener("change", function(event) {
        var input = event.target;
        var previewContainer = document.getElementById("preview-container");

        while (previewContainer.firstChild) {
            previewContainer.removeChild(previewContainer.firstChild);
        }

        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();

            reader.onload = function(e) {
                //tạo thẻ div để chứa img
                var imgBox = document.createElement("div");
                imgBox.className = "img-box col-md-3";
                previewContainer.appendChild(imgBox);

                if (i == 0) {
                    imgBox.innerHTML = "<p>cover image</p>";
                }
                var image = document.createElement("img");
                image.src = e.target.result;
                imgBox.appendChild(image);
                if (i == 0) {
                    var anhBia = document.createElement("p");
                    anhBia.innerHTML = "cover image"
                    imgBox.appendChild(anhBia);
                }
            }
            reader.readAsDataURL(input.files[i]);

        }
    });
</script>