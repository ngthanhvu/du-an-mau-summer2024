<?php
echo '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
';

?>

<div class="container mt-5">
    <h1 class="mb-4">Thêm Sản Phẩm</h1>
    <form action="/admin/product/updateProduct" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="productName" class="form-label">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" value="<?= $products['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Giá sản phẩm</label>
            <input name="price" type="number" class="form-control" id="productPrice" placeholder="Nhập giá sản phẩm" value="<?= $products['price'] ?>">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Số lượng sản phẩm</label>
            <input name="quantity" type="number" class="form-control" id="productPrice" placeholder="Nhập số lượng sản phẩm" value="<?= $products['quantity'] ?>">
        </div>
        <!-- <div class="mb-3">
            <label for="productCategory" class="form-label">Danh mục sản phẩm</label>
            <select class="form-select" id="productCategory">
                <option selected>Chọn danh mục</option>
                <option value="1">Danh mục 1</option>
                <option value="2">Danh mục 2</option>
                <option value="3">Danh mục 3</option>
            </select>
        </div> -->
        <div class="mb-3">
            <label for="productImage" class="form-label">Hình ảnh sản phẩm: </label>
            <img src="/uploads/<?= $products['image'] ?>" alt="No image" class="mb-3 border" width="100" height="100">
            <input name="image[]" class="form-control" type="file" id="productImage" placeholder="Nhập link hình ảnh" multiple>
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Mô tả sản phẩm</label>
            <input type="text" name="description" class="form-control" id="productDescription" rows="3" placeholder="Nhập mô tả sản phẩm" value="<?= $products['description'] ?>"></input>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Thay đổi sản phẩm</button>
        <a href="/admin/product" class="btn btn-danger"><i class="bi bi-arrow-left-circle"></i> Trở về trang quản trị</a>
    </form>
</div>