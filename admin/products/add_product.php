<?php
require_once "../dao/products.php";
require_once "../dao/categories.php";
require_once "../dao/images.php";

$categories = categories_select_all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date_added = date('Y-m-d');
    $quantity = $_POST['quantity'];

    $images = $_FILES['images'];
    $sold = 0 ;


    // check file ảnh
    if (strlen($images['name'][0]) > 0) {
        // print_r($images);
        foreach ($images['name'] as $image) {
            // check is file a image
            $img = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
            $file_ext = pathinfo($image, PATHINFO_EXTENSION);
            $check_img = in_array($file_ext, $img);
            if (!$check_img) {
                $message['image'] = "The file is not an image";
            }
        }

        // check size file nếu file là ảnh
        if (!isset($message['image'])) {
            foreach ($images['size'] as $img_size) {
                if ($img_size > 2000000) {
                    $message['image'] = "file is too large";
                }
            }
        }

    } else {
        $message['image'] = "Please add image file";
    }



    if (strlen($category) == 0) {
        $message['category'] = 'Please choose category';
    }

    if (strlen($name) == 0) {
        $message['name'] = 'Please enter product name';
    }

    if (strlen($description) == 0) {
        $message['description'] = "Please enter product description";
    }

    if ($price <= 0) {
        $message['price'] = "Please enter product price";
    }

    if ($quantity <= 0) {
        $message['quantity'] = "Please enter product quantity";
    }

    if (!isset($message)) {
        echo $category, $name, $description, $price, $date_added, $quantity;
        $product_id = add_product($category, $name, $description, $price, $date_added, $quantity);
        echo count($images['name']);
        for ($i=0; $i < count($images['name']); $i++) {
            $path_dir = "../content/img/products/$product_id/";
            mkdir($path_dir, 0777, true);
            move_uploaded_file($images['tmp_name'][$i], "$path_dir" . $images['name'][$i]);
            add_image($images['name'][$i], $product_id);
        }

        setcookie("add-product", "added product sucessfully", time() + 30);
        header("location: index.php?act=products");
        die();
    }
}

?>

<section class="form col-md-10">
    <form class="row g-3" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Product name</label>
            <input type="text" class="form-control" id="inputPassword4" name="name">
            <div class="<?= isset($message['name']) ? "alert" : "" ?> alert-danger">
                <?= $message['name'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Price</label>
            <input type="number" class="form-control" id="inputAddress" name="price" placeholder="">
            <div class="<?= isset($message['price']) ? "alert" : "" ?> alert-danger">
                <?= $message['price'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="inputAddress" name="quantity" placeholder="">
            <div class="<?= isset($message['quantity']) ? "alert" : "" ?> alert-danger">
                <?= $message['quantity'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Category</label>
            <select id="inputState" class="form-select" name="category">
                <option value="" selected>Choose...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="<?= isset($message['category']) ? "alert" : "" ?> alert-danger">
                <?= $message['category'] ?? '' ?>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Image</label>
            <div id="img-input">
                <input id="image-input" type="file" class="form-control" id="inputAnh" name="images[]" accept="image/*"
                    multiple>
            </div>
            <div class="<?= isset($message['size']) ? "alert" : "" ?> alert-danger">
                <?= $message['size'] ?? '' ?>
            </div>
            <div class="<?= isset($message['image']) ? "alert" : "" ?> alert-danger">
                <?= $message['image'] ?? '' ?>
            </div>
        </div>
        <!-- preview image -->
        <div id="preview-container">
        </div>

        <!-- thông báo lỗi ảnh -->
        <div id="message-container"></div>

        <div class="col-12">
            <label for="inputZip" class="form-label">Description</label>
            <textarea name="description" style="min-height: 200px;" class="form-control" placeholder="description"
                id="description"></textarea>
            <div class="<?= isset($message['description']) ? "alert" : "" ?> alert-danger">
                <?= $message['description'] ?? '' ?>
            </div>
        </div>


        <!-- button -->
        <div class="button">
            <button type="submit" class="btn btn-outline-primary">Add new</button>
            <button type="reset" class="btn btn-outline-primary">Retype</button>
            <a href="index.php?act=products"><button type="button" class="btn btn-outline-primary">Products list</button></a>
        </div>
    </form>
</section>

<script>

    document.getElementById("image-input").addEventListener("change", function (event) {
        var input = event.target;
        var previewContainer = document.getElementById("preview-container");

        while (previewContainer.firstChild) {
            previewContainer.removeChild(previewContainer.firstChild);
        }

        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();

            reader.onload = function (e) {
                //tạo thẻ div để chứa img
                var imgBox = document.createElement("div");
                imgBox.className = "img-box";
                previewContainer.appendChild(imgBox);

                if (i == 0) {
                    imgBox.innerHTML = "<p>ảnh bìa</p>";
                }
                var image = document.createElement("img");
                image.src = e.target.result;
                imgBox.appendChild(image);
                if (i == 0) {
                    var anhBia = document.createElement("p");
                    anhBia.innerHTML = "Cover image"
                    imgBox.appendChild(anhBia);
                }
            }
            reader.readAsDataURL(input.files[i]);

        }
    });

</script>