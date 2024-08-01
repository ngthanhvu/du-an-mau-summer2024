<?php include_once "includes/header.php" ?>

<div class="container profile-section">
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://hotprintdesign.com/wp-content/uploads/2019/02/Sani-Sebastian.png" class="rounded-circle mb-3" alt="Profile Picture" width="150">
                    <h5 class="card-title"><?php echo $users['username'] ?></h5>
                    <p class="card-text"><?php echo $users['email'] ?></p>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-person-circle"></i> Tài khoản khách hàng</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Chi tiết hồ sơ</h5>
                </div>
                <div class="card-body">
                    <?php
                    echo "<pre>";
                    // var_dump($_SESSION);
                    echo "</pre>";
                    ?>
                    <form action="/update-profile?id=<?php echo $users['id'] ?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Nhập username của bạn" value="<?php echo $users['username'] ?>">
                            <?php
                            if (isset($errors['username'])) {
                                echo "<div class='text-danger'>" . $errors['username'] . "</div>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Nhập email của bạn" value="<?php echo $users['email'] ?>">
                            <?php
                            if (isset($errors['email'])) {
                                echo "<div class='text-danger'>" . $errors['email'] . "</div>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="fullname" name="full_name" placeholder="Nhập họ tên của bạn" value="<?php echo $users['full_name'] ?>">
                            <?php
                            if (isset($errors['full_name'])) {
                                echo "<div class='text-danger'>" . $errors['full_name'] . "</div>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại của bạn" value="<?php echo $users['phone'] ?>">
                            <?php
                            if (isset($errors['phone'])) {
                                echo "<div class='text-danger'>" . $errors['phone'] . "</div>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="address" rows="3" placeholder="Nhập địa chỉ của bạn" value="<?php echo $users['address'] ?>">
                            <?php
                            if (isset($errors['address'])) {
                                echo "<div class='text-danger'>" . $errors['address'] . "</div>";
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Lưu chỉnh sửa</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">Đổi mật khẩu</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="oldPassword" placeholder="Điền mật khẩu cũ">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Điền mật khẩu mới">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>