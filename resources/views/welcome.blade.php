<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StreetNG - Three Passions, One Mission</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
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
                            <a class="nav-link active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tavern') }}">Tavern</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trendy') }}">Trendy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('realtors') }}">Realtors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="hero">
            <div class="container">
                <h1>Three Passions, One Mission</h1>
                <p>At StreetNG, we blend the art of fine dining, precision tailoring, and curated real estate to redefine luxury living. Whether you're here for a memorable meal, a handcrafted wardrobe, or your dream home, excellence is our signature.</p>
                <a href="#services" class="btn btn-primary">Discover Our Services</a>
            </div>
        </div>

        <section id="services" class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h3>Street Tavern</h3>
                            <p>Experience culinary excellence with our innovative menu that blends local flavors with international techniques.</p>
                            <a href="{{ route('tavern') }}" class="btn btn-outline-dark mt-3">Explore Menu</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-tshirt"></i>
                            </div>
                            <h3>Street Trendy</h3>
                            <p>Elevate your style with our bespoke tailoring services, crafting garments that reflect your unique personality.</p>
                            <a href="{{ route('trendy') }}" class="btn btn-outline-dark mt-3">View Collection</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <h3>Street Realtors</h3>
                            <p>Find your perfect property with our expert real estate services, focusing on premium locations and exceptional value.</p>
                            <a href="{{ route('realtors') }}" class="btn btn-outline-dark mt-3">Browse Properties</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        <p>&copy; 2023 StreetNG. All rights reserved.</p>
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
        <script>
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    </body>
</html>