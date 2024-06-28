<?php include_once './includes/login-register/header.php' ?>

<div class="login-container">
    <h2 class="text-center">Login</h2>
    <form action="/admin/users/login" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= htmlspecialchars($data['username'] ?? '') ?>">
            <?php if (!empty($errors['username'])) : ?>
                <div class="text-danger"><?= htmlspecialchars($errors['username']) ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= htmlspecialchars($data['password'] ?? '') ?>">
            <?php if (!empty($errors['password'])) : ?>
                <div class="text-danger"><?= htmlspecialchars($errors['password']) ?></div>
            <?php endif; ?>
        </div>
        <?php if (!empty($errors['login'])) : ?>
            <div class="text-danger"><?= htmlspecialchars($errors['login']) ?></div>
        <?php endif; ?>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
            <a href="#" class="float-end">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
        <div class="text-center mt-3">
            <p>Not a member? <a href="/register" class="text-primary">Register</a></p>
            <p>or sign up with:</p>
            <div>
                <a href="#" class="btn btn-outline-light btn-floating m-1 bg-primary"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 bg-danger"><i class="fab fa-google"></i></a>
            </div>
        </div>
    </form>
</div>
<?php include_once './includes/login-register/footer.php' ?>
