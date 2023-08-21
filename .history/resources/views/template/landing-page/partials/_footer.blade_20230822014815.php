<footer class="bg-dark text-white py-5 {{ request()->is('login') || request()->is('register') ? 'footer-fixed' : '' }}">
    <div class="container">
        <!-- Bagian-bagian footer yang lain -->

        <div class="col-md-12 mt-4">
            <h5 class="fs-18 mb-4">Stay Connected</h5>
            <ul class="list-inline social-icons">
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

        <!-- Slider di dalam bagian footer -->
        <div class="col-md-12 mt-4">
            <div class="slider">
                <div><img src="{{ asset('storage/img/slider/image1.jpg') }}"></div>
                <div><img src="{{ asset('storage/img/slider/image2.jpg') }}"></div>
                <!-- Tambahkan gambar-gambar lainnya -->
            </div>
        </div>

        <div class="col-md-12 text-center">
            <p class="fs-14 mb-0" style="color: #777;">&copy; {{ date('Y') }} <span class="text-title"
                    style="color: #fd5e53;">EASYIN</span> - All Rights Reserved</p>
        </div>
    </div>
</footer>
