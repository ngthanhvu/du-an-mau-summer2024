<?php include_once "includes/header.php" ?>

<div class="container mt-5">
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Profile Picture">
                    <h5 class="card-title"><?php echo $users['username'] ?></h5>
                    <p class="card-text"><?php echo $users['email'] ?></p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal"><i class="bi bi-person-circle"></i> Chỉnh sửa hồ sơ</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Chi tiết hồ sơ</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username" value="<?php echo $users['username'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" value="<?php echo $users['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" value="<?php echo $users['phone'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <textarea class="form-control" id="address" rows="3" placeholder="Điền địa chỉ của bạn"></textarea>
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

<!-- Edit Profile Modal
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="modalUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="modalUsername" value="User Name">
                    </div>
                    <div class="mb-3">
                        <label for="modalEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="modalEmail" value="user@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="modalPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="modalPhone" value="123-456-7890">
                    </div>
                    <div class="mb-3">
                        <label for="modalAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="modalAddress" rows="3">123 Main St, Anytown, USA</textarea>
                    </div>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div> -->