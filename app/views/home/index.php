<?php include_once "includes/header.php" ?>
<!-- start slider -->
<section class="slider">
    <img src="https://bizweb.dktcdn.net/100/485/982/themes/918620/assets/slider_1.jpg?1719892831755" alt="">
    <img src="https://bizweb.dktcdn.net/100/485/982/themes/918620/assets/slider_2.jpg?1719892831755" alt="">
    <img src="https://bizweb.dktcdn.net/100/485/982/themes/918620/assets/slider_5.jpg?1719892831755" alt="">
</section>
<!-- end slider -->
<!-- start category  -->
<section class="category-section">
    <div class="category-head">
        <h3 class="text-center mt-5">Danh mục sản phẩm</h3>
        <p class="text-center">
            Các danh mục sản phẩm có tại shop
        </p>
        <a class="btn btn-outline-secondary">Xem tất cả</a>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <a href="#" style="text-decoration: none; color: black;">
                    <div class="card border-0">
                        <img src="https://pos.nvncdn.com/6a2bd9-54198/ps/20230804_fXS07knJQE.jpeg" alt="" class="img-thunbnail">
                        <h5 class="text-center mt-3">Giày đá bóng</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" style="text-decoration: none; color: black;">
                    <div class="card border-0">
                        <img src="https://makan.vn/wp-content/uploads/2023/05/ao-bong-da-co-co-1.1.jpg" alt="" class="img-thunbnail">
                        <h5 class="text-center mt-3">Áo đá bóng</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" style="text-decoration: none; color: black;">
                    <div class="card border-0">
                        <img src="https://gangtaytapgym.com/wp-content/uploads/2021/06/bang-co-tay-veidoorm-300x300.jpg" alt="" class="img-thunbnail">
                        <h5 class="text-center mt-3">Phụ kiện thể thao</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end category  -->
<!-- star view shop  -->
<section class="viewshop-section mt-5">
    <div class="viewshop-head">
        <h3 class="text-center mt-5">Các sản phẩm mới nhất của chúng tôi</h3>
        <p class="text-center">Sản phẩm được cập nhật tháng 7 năm 2024</p>
        <a class="btn btn-outline-secondary">Xem tất cả</a>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img class="img-thunbnail" src="https://www.sporter.vn/wp-content/uploads/2017/07/Ao-doi-tuyen-bo-dau-nha-san-khach-1.jpg" alt="" height="400">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="img-thunbnail" src="https://www.sport9.vn/images/uploaded/tin-tuc/giay%20nike/giay-da-bong-.jpg" alt="" height="350">
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img class="img-thunbnail" src="https://zocker.vn/pic/Product/gang-tay-thu-mon-zocker-becker-den_6290_HasThumb_Thumb.webp" alt="" height="400">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end view shop  -->
<!-- start our product  -->
<section class="ourproduct-section">
    <div class="ourproduct-head">
        <h3 class="text-center mt-5">Sản phẩm bán chạy</h3>
        <p class="text-center">Các sản phẩm được mua nhiều nhất
        </p>
        <a class="btn btn-outline-secondary">Xem tất cả</a>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <a href="#" style="text-decoration: none; color:black;">
                    <div class="card border-0">
                        <img class="img-thunbnail" src="https://www.sport9.vn/images/thumbs/002/0021481_bo-quan-ao-bong-da-doi-tuyen-quoc-gia-duc-mau-xam.jpeg?preset=large&watermark=default" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">500$</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" style="text-decoration: none; color:black;">
                    <div class="card border-0">
                        <img class="img-thunbnail" src="https://www.sport9.vn/images/thumbs/002/0021493_bo-quan-ao-bong-da-doi-tuyen-quoc-gia-anh-woncup-2022.jpeg?preset=large&watermark=default" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">500$</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" style="text-decoration: none; color:black;">
                    <div class="card border-0">
                        <img class="img-thunbnail" src="https://www.sport9.vn/images/thumbs/002/0020426_bo-quan-ao-bong-da-doi-tuyen-quoc-gia-argentina-trang-xanh.jpeg?preset=large&watermark=default" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">500$</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
</section>
<!-- end our product  -->
<!-- start footer  -->
<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.slider img');

    function showSlide(index) {
        images.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % images.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showSlide(currentIndex);
    }

    // Tự động chuyển ảnh sau mỗi 3 giây
    setInterval(nextSlide, 3000);
</script>
<?php include_once "includes/footer.php" ?>