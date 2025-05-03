
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'StreetNG')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Base CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Page-specific CSS -->
    @if(Route::currentRouteName() == 'home')
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @elseif(Route::currentRouteName() == 'contact')
        <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    @elseif(Route::currentRouteName() == 'trendy')
        <link href="{{ asset('css/trendy.css') }}" rel="stylesheet">
    @elseif(Route::currentRouteName() == 'tavern')
        <link href="{{ asset('css/tavern.css') }}" rel="stylesheet">
    @elseif(Route::currentRouteName() == 'realtors')
        <link href="{{ asset('css/realtors.css') }}" rel="stylesheet">
    @endif
    
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">StreetNG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'tavern' ? 'active' : '' }}" href="{{ route('tavern') }}">Tavern</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'trendy' ? 'active' : '' }}" href="{{ route('trendy') }}">Trendy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'realtors' ? 'active' : '' }}" href="{{ route('realtors') }}">Realtors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4>StreetNG</h4>
                    <p>Redefining luxury living through culinary arts, fashion, and real estate.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('tavern') }}">Street Tavern</a></li>
                        <li><a href="{{ route('trendy') }}">Street Trendy</a></li>
                        <li><a href="{{ route('realtors') }}">Street Realtors</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact</h5>
                    <address>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Luxury Avenue, Lagos, Nigeria</p>
                        <p><i class="fas fa-phone me-2"></i> +234 123 456 7890</p>
                        <p><i class="fas fa-envelope me-2"></i> info@streetng.com</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} StreetNG. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                if (this.getAttribute('href').length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>