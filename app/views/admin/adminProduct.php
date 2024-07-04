<?php include_once "includes/header.php" ?>

<!-- Main Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
    <h1>Quản lý sản phẩm</h1>
    <p>Chào mừng đến trang quản trị!</p>
    <a href="/admin/product/add" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Thêm sản phẩm</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mô tả sản phẩm</th>
                <!-- <th>Danh mục</th> -->
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($products as $key => $value) {
                echo "<tr>";
                echo "<td>" . $key . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td><img width='100' height='100' src='$value[image]' alt='anh'></td>";
                echo "<td>" . $value['price'] . " VNĐ</td>";
                echo "<td>" . $value['quantity'] . "</td>";
                echo "<td>" . $value['description'] . "</td>";
                echo "<td>
                <a class='btn btn-danger' href='/admin/product/delete?id=$value[id]'><i class='bi bi-trash-fill'></i></a>
                <a class='btn btn-primary' href='#'><i class='bi bi-pencil-square'></i></a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>


<?php include_once "includes/footer.php" ?>