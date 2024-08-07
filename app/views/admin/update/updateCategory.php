<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
';

?>

<div class="container mt-5">
    <h1 class="mb-4">Sửa danh mục</h1>
    <form action="/admin/category/updateCategory?id=<?= $categories['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="productName" class="form-label">Id danh mục</label>
            <input name="id" type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" value="<?= $categories['id'] ?>">
            <?php
            if (isset($errors['id'])) {
                echo '<p class="text-danger">' . $errors['id'] . '</p>';
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Tên danh mục</label>
            <input name="name" type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" value="<?= $categories['name'] ?>">
            <?php
            if (isset($errors['name'])) {
                echo '<p class="text-danger">' . $errors['name'] . '</p>';
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Hình ảnh danh mục: </label>
            <img src="/uploads/<?= $categories['image'] ?>" alt="No image" class="mb-3 border" width="100" height="100">
            <input type="hidden" name="old_image" value="<?= $categories['image'] ?>">
            <input name="image[]" class="form-control" type="file" id="productImage" placeholder="Nhập link hình ảnh" multiple>
            <?php
            if (isset($errors['image'])) {
                echo '<p class="text-danger">' . $errors['image'] . '</p>';
            }
            if (isset($errors['errors'])) {
                echo '<p class="text-danger">' . $errors['error'] . '</p>';
            }
            ?>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Thay đổi danh mục</button>
        <a href="/admin/category" class="btn btn-danger"><i class="bi bi-arrow-left-circle"></i> Trở về trang quản trị</a>
    </form>
</div>