<?php include_once './includes/login-register/header.php' ?>

<div class="register-container">
    <h2 class="text-center">Register</h2>
    <form>
        <div class="mb-2">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="name" placeholder="Username">
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email address">
        </div>
        <div class="mb-2">
            <label for="name" class="form-label">Phone</label>
            <input type="text" class="form-control" id="name" placeholder="Phone">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-2">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password">
        </div>
        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" id="terms">
            <label class="form-check-label" for="terms">I agree to the <a href="#" class="text-primary">terms and
                    conditions</a></label>
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