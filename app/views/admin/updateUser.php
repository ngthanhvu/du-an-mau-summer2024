<?php
include_once "./includes/header.php";
include "./app/models/User.php";
$id = $_GET['id'];
$db = new User();
$user = $db->getUserId($id);

?>
<div class="container mt-2">
    <form method="post" action="/admin/users/update">
        <h2>Update User</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID</label>
            <input name="id" value="<?= $user['id'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" value="<?= $user['username'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fullname</label>
            <input name="full_name" value="<?= $user['full_name'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fullname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Level</label>
            <input name="level" value="<?= $user['level'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Level">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once "./includes/footer.php" ?>