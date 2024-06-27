<?php include_once './includes/login-register/header.php' ?>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="email" class="form-control" id="email" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
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
    