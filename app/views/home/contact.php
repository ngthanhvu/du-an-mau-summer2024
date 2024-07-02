<?php include_once "includes/header.php" ?>
    <!-- end header  -->
    <!-- start contact  -->
    <section class="contact-section">
        <div class="contact-header">
            <h1 class="text-center mt-5">Contact</h1>
            <p class="text-center">
                Bạn muốn khiếu nại gì ở đây!.
            </p>
            <!-- thêm Map -->
            <div id="map"></div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"></script>
        </div>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputname">Name</label>
                            <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputemail">Email</label>
                            <input type="email" class="form-control mt-1" id="email" name="email"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputsubject">Subject</label>
                        <input type="text" class="form-control mt-1" id="subject" name="subject"
                            placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <label for="inputmessage">Message</label>
                        <textarea class="form-control mt-1" id="message" name="message" placeholder="Message"
                            rows="8"></textarea>
                    </div>
                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" class="btn btn-success btn-lg px-3">Let’s Talk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end contact  -->

    <!-- start footer  -->
    <footer class="bg-light text-black py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-black ft-end">Email: info@example.com</a></li>
                        <li><a href="#" class="text-black ft-end">Phone: +123 456 7890</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-black ft-end">Facebook</a></li>
                        <li><a href="#" class="text-black ft-end">Twitter</a></li>
                        <li><a href="#" class="text-black ft-end">Instagram</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Subscribe</h5>
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 Your Company. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
</body>

</html>