<?php include_once "includes/header.php" ?>

<!-- Main Content -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
    <h1>Quản lý người dùng</h1>
    <p>Chào mừng đến trang quản trị!</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $value) {
                echo "<tr>";
                echo "<td>" . $key . "</td>";
                echo "<td>" . $value['username'] . "</td>";
                echo "<td>" . $value['email'] . "</td>";
                echo "<td>" . $value['phone'] . "</td>";
                echo "<td>
                <a class='btn btn-danger' href='/admin/User/delete?id=" . $value['id'] . "'><i class='bi bi-trash-fill'></i></a>
                <a class='btn btn-primary' href='#'><i class='bi bi-pencil-square'></i></a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<?php include_once "includes/footer.php" ?>