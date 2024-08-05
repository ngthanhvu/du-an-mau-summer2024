<?php include_once "includes/header.php" ?>

<!-- Main Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
    <h1>Quản lý đơn hàng</h1>
    <p>Chào mừng đến trang quản trị!</p>
    <table class="table table-bordered">
        <thead>
            <tr class="bg-primary text-white">
                <th class="text-center">#</th>
                <th class="text-center">ID người dùng</th>
                <th class="text-center">Họ tên</th>
                <th class="text-center">Email</th>
                <th class="text-center">Số điện thoại</th>
                <th class="text-center">Địa chỉ</th>
                <th class="text-center">ID đơn hàng</th>
                <th class="text-center">Tên sản phẩm</th>
                <th class="text-center">Giá tiền</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function formatVND($number)
            {
                return number_format($number, 0, ',', '.') . ' đ';
            }
            foreach ($bills as $key => $value) {
                echo "<tr>";
                echo "<td class='text-center'>" . ($key + 1) . "</td>";
                echo "<td class='text-center'>" . $value['user_id'] . "</td>";
                echo "<td class='text-center'>" . $value['full_name'] . "</td>";
                echo "<td class='text-center'>" . $value['email'] . "</td>";
                echo "<td class='text-center'>" . $value['phone'] . "</td>";
                echo "<td class='text-center'>" . $value['address'] . "</td>";
                echo "<td class='text-center'>" . $value['order_id'] . "</td>";
                echo "<td class='text-center'>" . $value['product_name'] . "</td>";
                echo "<td class='text-center'>" . formatVND($value['total']) . "</td>";
                echo "<td class='text-center'>" . ($value['status'] == 1 ? '<span class="badge text-bg-warning">Chưa thanh toán</span>' : ($value['status'] == 2 ? '<span class="badge text-bg-success">Đã thanh toán</span>' : '<span class="badge text-bg-danger">Hủy thanh toán</span>')) . "</td>";
                // echo "<td>" . $value['status'] . "</td>";
                echo "<td class='text-center'>
                 <a class='btn btn-danger' href='/delete-bill?id=$value[id]'><i class='bi bi-trash-fill'></i></a>
                 <a class='btn btn-primary' href='/admin/product/update?id=$value[id]'><i class='bi bi-pencil-square'></i></a>
                 </td>";
                echo "</tr>";
            }
            if(empty($bills)) {
                echo "<tr>";
                echo "<td class='text-center' colspan='11'>Không tìm thấy đơn hàng</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>


<?php include_once "includes/footer.php" ?>