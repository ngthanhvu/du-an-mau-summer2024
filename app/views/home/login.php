<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>Đăng nhập</h2>
                    </div>
                    <div class="card-body">
                        <form action="/admin/users/login" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập" value="<?= htmlspecialchars($data['username'] ?? '') ?>">
                                <?php if (!empty($errors['username'])) : ?>
                                    <div class="text-danger"><?= htmlspecialchars($errors['username']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" value="<?= htmlspecialchars($data['password'] ?? '') ?>">
                                <?php if (!empty($errors['password'])) : ?>
                                    <div class="text-danger"><?= htmlspecialchars($errors['password']) ?></div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($errors['login'])) : ?>
                                <div class="text-danger"><?= htmlspecialchars($errors['login']) ?></div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">Ghi nhớ mật khẩu</label>
                                <a href="#" class="float-end">Quên mật khẩu</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Chưa có tài khoản? <a href="/register">Đăng ký</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>