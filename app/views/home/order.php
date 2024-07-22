<?php include_once "includes/header.php" ?>
<!-- end header  -->
<section class="vieworder-section">
    <h1 class="text-center mb-5">Lịch sử mua hàng</h1>
    <table class="table table-striped">
        <thead class="text-center bg-white thead-bordered">
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Họ tên</th>
                <th class="text-center">Số điện thoại</th>
                <th class="text-center">Địa chỉ</th>
                <th class="text-center">ID đơn hàng</th>
                <th class="text-center">Tên sản phẩm</th>
                <th class="text-center">Giá tiền</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody class="text-center bg-white">
            <?php
            function formatVND($number)
            {
                return number_format($number, 0, ',', '.') . ' đ';
            }
            foreach ($bills as $key => $value) {
                echo "<tr>";
                echo "<td class='text-center'>" . ($key + 1) . "</td>";
                echo "<td class='text-center'>" . $value['full_name'] . "</td>";
                echo "<td class='text-center'>" . $value['phone'] . "</td>";
                echo "<td class='text-center'>" . $value['address'] . "</td>";
                echo "<td class='text-center'>" . $value['order_id'] . "</td>";
                echo "<td class='text-center'>" . $value['product_name'] . "</td>";
                echo "<td class='text-center'>" . formatVND($value['total']) . "</td>";
                echo "<td class='text-center'>" . ($value['status'] == 1 ? '<span class="badge text-bg-warning">Chưa thanh toán</span>' : ($value['status'] == 2 ? '<span class="badge text-bg-success">Đã thanh toán</span>' : '<span class="badge text-bg-danger">Hủy thanh toán</span>')) . "</td>";
                echo "<td class='text-center'>
                     <a class='btn btn-danger' href='/admin/product/delete?id=$value[id]'><i class='bi bi-trash-fill'></i></a>
                     </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</section>
<!-- start footer  -->
<?php include_once "includes/footer.php" ?>