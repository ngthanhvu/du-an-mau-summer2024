<?php
include_once "./includes/header.php"
?>
<div class="container mt-3">
    <h1>Manage Users</h1>
    <a href="/admin" class="btn btn-primary mb-3">Manage user</a>
    <a href="/admin/adduser" class="btn btn-success mb-3">Add user</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Fullname</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                echo "<tr>";
                echo "<th scope='row'>" . $user['id'] . "</th>";
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['full_name'] . "</td>";
                if ($user['level'] == 0) {
                    echo "<td>Admin</td>";
                } else {
                    echo "<td>User</td>";
                }
                echo "<td>
                <a href='/admin/users/delete?id=" . $user['id'] . "' class='btn btn-danger'>Delete</a>
                <a href='/admin/update?id=" . $user['id'] . "' class='btn btn-warning'>Update</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include_once "./includes/footer.php" ?>