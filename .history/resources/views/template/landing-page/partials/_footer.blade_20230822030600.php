<footer
    class="slider -bottom-3 -mb-2 bg-dark text-white py-4 {{ request()->is('login') || request()->is('register') ? 'footer-fixed' : '' }}">

    <style>
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px 0;
            /* Atur sesuai dengan kebutuhan */
            background-color: #343a40;
            /* Ganti warna sesuai kebutuhan */
        }

        .footer-fixed {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .unique-font {
            font-family: 'Audiowide', sans-serif;
            font-size: 18px;
            color: #000346;
        }

        .social-link {
            font-size: 24px;
            color: #fd5e53;
            margin: 0 10px;
            transition: transform 0.3s ease-in-out;
        }

        .social-link:hover {
            transform: scale(1.2);
        }

        .hover-text-decoration-none {
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .hover-text-decoration-none:hover {
            color: #0f356f;
        }

        .content {
            margin-bottom: 100px;
            /* Atur sesuai tinggi footer */
            position: relative;
        }

        .footer-link:hover {
            color: #fd5e53;
        }
    </style>

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
                    <li><a href="#" class="text-white hover-text-decoration-none">Terms & Conditions</a></li>
                    <li><a href="#" class="text-white hover-text-decoration-none">Privacy Policy</a></li>
                    <li><a href="#" class="text-white hover-text-decoration-none">Frequently Asked Questions</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-10 mt-3">
                <h5 class="fs-12 mb-4">Stay Connected</h5>
                <ul class="list-inline social-icons">
                    <li class="list-inline-item"><a href="#" class="social-link"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i
                                class="fab fa-instagram"></i></a>
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
