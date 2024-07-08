<?php
include_once "includes/header.php";
?>

<section class="shop1 text-center">
    <h1 class="text-center mt-5">Sản phẩm</h1>
    <p class="text-center">
        Các sản phẩm có tại website của chúng tôi.
    </p>
</section>

<div class="container">
    <div class="row">
        <div class="col-2">
            <!-- Filters -->
            <h5>Filters</h5>
            <div>
                <h6>Categories</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck1">
                    <label class="form-check-label" for="flexCheck1">Jar</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                    <label class="form-check-label" for="flexCheck2">Kettle</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck3">
                    <label class="form-check-label" for="flexCheck3">Cup</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck4">
                    <label class="form-check-label" for="flexCheck4">Tools</label>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <label for="sort" class="form-label">Sort by:</label>
                    <select class="form-select" id="sort">
                        <option selected>Popular</option>
                        <option value="1">Price: Low to High</option>
                        <option value="2">Price: High to Low</option>
                    </select>
                </div>
                <div>Showing 1033 Products</div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                <?php
                foreach ($sanpham as $product) {
                ?>
                    <div class="col">
                        <a href="/detail?id=<?php echo $product['id']; ?>" class="text-decoration-none text-black">
                            <div class="card border-0">
                                <img src="/uploads/<?php echo $product['image']; ?>" class="card-img-top" alt="404">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                    <div class="d-flex justify-content-left small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <h5 class="card-title"><?php echo $product['price']; ?>$</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- <button class="btn btn-primary mt-4">Load more products</button> -->
        </div>
    </div>
</div>
<!-- end shop -->

<?php
include_once "includes/footer.php";
?>