<?php include_once './includes/login-register/header.php' ?>

<div class="register-container">
    <h2 class="text-center">Register</h2>
    <form action="/admin/users/register" method="post">
        <div class="mb-2">
            <label for="name" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="name" placeholder="Username" value="<?= htmlspecialchars($data['username'] ?? '') ?>">
            <?php if (!empty($errors['username'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['username']) ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="Email address" value="<?= htmlspecialchars($data['email'] ?? '') ?>">
            <?php if (!empty($errors['email'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="name" class="form-label">Phone</label>
            <input name="phone" type="text" class="form-control" id="name" placeholder="Phone" value="<?= htmlspecialchars($data['phone'] ?? '') ?>">
            <?php if (!empty($errors['phone'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['phone']) ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            <?php if (!empty($errors['password'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['password']) ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input name="confirm_password" type="password" class="form-control" id="confirm-password" placeholder="Confirm Password">
            <?php if (!empty($errors['confirm_password'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['confirm_password']) ?></div>
            <?php endif; ?>
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" id="terms">
            <label class="form-check-label" for="terms">I agree to the <a href="#" class="text-primary">terms and conditions</a></label>
        </div>
        <button type="submit" class="btn btn-primary w-100">REGISTER</button>
        <div class="text-center mt-2">
            <p>Already a member? <a href="/login" class="text-primary">Sign In</a></p>
            <div>
                <a href="#" class="btn btn-outline-light btn-floating m-1 bg-primary"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 bg-danger"><i class="fab fa-google"></i></a>
            </div>
        </div>
    </form>
</div>
<?php include_once './includes/login-register/footer.php' ?>
