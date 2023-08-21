<footer class="bg-dark text-white py-4 {{ request()->is('login') || request()->is('register') ? 'footer-fixed' : '' }}">


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex align-items-center text-center">
                    <img src="{{ asset('storage/img/logo/Steam_icon.png') }}" alt="Logo" class="logo me-3"
                        style="max-width: 50px;">
                    <p class="fs-12 mb-0 unique-font">EASYIN</p>
                </div>
                <p class="mt-3 fs-14">Bringing Events to You</p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-12">About Us</h5>
                <p class="fs-14">EASYIN is a platform that connects event organizers with participants, providing an
                    easy way to discover and join various events.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-12">Quick Links</h5>
                <ul class="list-unstyled fs-14">
                    <li><a href="#" class="text-white">Terms & Conditions</a></li>
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">F.A.Q</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h5 class="fs-12 mb-4">Stay Connected</h5>
                <ul class="list-inline social-icons">
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="fs-12 mb-0" style="color: #888;">&copy; {{ date('Y') }} <span class="text-title"
                        style="color: #0f356f;">EASYIN</span> - All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
