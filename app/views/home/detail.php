<?php include_once "includes/header.php" ?>
<?php
function formatVND($number)
{
    return number_format($number, 0, '', '.',) . 'đ';
}
?>
<!-- <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/uploads/<?php echo $detailProduct['image'] ?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">Category: <?php echo $detailProduct['category_id'] ?></div>
                <h1 class="display-5 fw-bolder"><?php echo $detailProduct['product_name'] ?></h1>
                <div class="fs-5 mb-3">
                    <span>Giá: <?php echo formatVND($detailProduct['price']) ?></span>
                </div>
                <p class="lead"><?php echo $detailProduct['description'] ?></p>
                <form action="/add_to_cart" method="post">
                    <div class="d-flex">
                        <input type="hidden" name="product_id" value="<?php echo $detailProduct['id']; ?>">
                        <input type="hidden" name="user_id" value="<?php if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) {
                                                                        echo ($_SESSION['user']['id']);
                                                                    } ?>">
                        <input type="hidden" name="image" value="<?php echo $detailProduct['image']; ?>">
                        <input type="hidden" name="name" value="<?php echo $detailProduct['product_name']; ?>">
                        <input type="hidden" name="price" value="<?php echo $detailProduct['price']; ?>">
                        <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="number" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->

<section class="py-5 bg-light section-detail">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="/uploads/<?php echo $detailProduct['image'] ?>" class="product-image11" alt="BDN Home Jersey">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detailProduct['product_name'] ?></h2>
                <p>Hãng: Đang cập nhật</p>
                <div class="mb-3">
                    <label for="size" class="form-label">Size:</label>
                    <div id="size" class="d-flex size-option">
                        <?php
                        $sizes = explode(',', $detailProduct['size']);
                        foreach ($sizes as $s) {
                            echo '<input type="radio" name="size" id="size' . $s . '" value="' . $s . '">
                            <label for="size' . $s . '">' . $s . '</label>';
                        }
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mo-ta" class="form-label">Mô tả:</label>
                    <p class="text-muted"><?php echo $detailProduct['description'] ?></p>
                </div>
                <div class="mt-3">
                    <p><b>Giá tiền:</b><strong class="text-danger text-nowrap fs-5"> <?php echo formatVND($detailProduct['price']) ?></strong></p>
                    <form action="/add_to_cart" method="post">
                        <div class="d-flex">
                            <input type="hidden" name="product_id" value="<?php echo $detailProduct['id']; ?>">
                            <input type="hidden" name="user_id" value="<?php if (isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])) {
                                                                            echo ($_SESSION['user']['id']);
                                                                        } ?>">
                            <input type="hidden" name="image" value="<?php echo $detailProduct['image']; ?>">
                            <input type="hidden" name="name" value="<?php echo $detailProduct['product_name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $detailProduct['price']; ?>">
                            <input type="hidden" name="size" id="selectedSize" value="">
                            <label for="inputQuantity" class="form-label me-3 text-center">Số lượng:</label>
                            <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="number" value="1" style="max-width: 3rem" /><br>
                        </div>
                        <div>
                            <button class="btn btn-danger mt-3" type="submit">
                                Thêm Vào Giỏ Hàng <i class="bi bi-basket2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('input[name="size"]').forEach(function(sizeInput) {
        sizeInput.addEventListener('change', function() {
            document.getElementById('selectedSize').value = this.value;
        });
    });
</script>

<!-- Comments Section -->
<section>
    <div class="container px-4 px-lg-5 my-5">
        <h2 class="fw-bolder mb-4">Bình luận</h2>
        <?php if (!empty($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($comment['username']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($comment['text']); ?></p>
                        <span class="card-text"><small class="text-muted">Ngày: <?php echo date('d/m/Y', strtotime($comment['date'])); ?></small></span>
                        <span><a href="/delete-comment?id=<?php echo $comment['id'] ?>&product_id=<?php echo $detailProduct['id'] ?>" class="btn btn-danger btn-sm float-end"><i class="bi bi-trash"></i></a></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Chưa có bình luận nào.</p>
        <?php endif; ?>
        <h3 class="fw-bolder mt-4">Thêm bình luận</h3>
        <form action="/add-comment" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Tên của bạn</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên của bạn" required>
            </div>
            <div class="mb-3">
                <label for="commentText" class="form-label">Bình luận của bạn</label>
                <textarea class="form-control" id="commentText" name="comment" rows="3" placeholder="Nhập bình luận..." required></textarea>
            </div>
            <input type="hidden" name="product_id" value="<?php echo $detailProduct['id']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?? ''; ?>">
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
    </div>
</section>
<!-- Related items section-->

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Các sản phẩm tương tự</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($recommendProduct as $value) {
            ?>
                <div class="col mb-5">
                    <a href="/detail?id=<?php echo $value['id'] ?>" class="text-decoration-none text-black">
                        <div class="card h-100">
                            <img class="card-img-top" src="/uploads/<?php echo $value['image'] ?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="star-rating" style="color: orange;">
                                        &#9733; &#9733; &#9733; &#9733; &#9733;
                                    </div>
                                    <h5 class="fw-bolder"><?php echo $value['product_name'] ?></h5>
                                    <?php echo formatVND($value['price']) ?>
                                </div>
                            </div>
                            <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div> -->
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- ... -->
<?php include_once "includes/footer.php" ?>