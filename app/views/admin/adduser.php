<?php include_once "./includes/header.php" ?>
<div class="container mt-2">
    <form method="post" action="/admin/users/add">
        <h2>Add User</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fullname</label>
            <input name="full_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fullname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Level</label>
            <input name="level" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Level">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once "./includes/footer.php" ?>