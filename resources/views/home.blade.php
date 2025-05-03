```php
@extends('layouts.app')

@section('title', 'StreetNG - Three Passions, One Mission')

@section('content')
    <!-- Hero Section -->
    <header class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat; height: 85vh; display: flex; align-items: center; color: white; text-align: center;">
        <div class="container">
            <h1>Three Passions, One Mission</h1>
            <p style="font-size: 1.25rem; max-width: 800px; margin: 1.5rem auto;">
                At StreetNG, we blend the art of fine dining, precision tailoring, and curated real estate to redefine luxury living. Whether you're here for a memorable meal, a handcrafted wardrobe, or your dream home, excellence is our signature.
            </p>
            <a href="#services" class="btn btn-primary">Discover Our Services</a>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="section-title text-center">Our Premium Services</h2>
            
            <div class="grid grid-cols-1 grid-cols-3 gap-8">
                <!-- Street Tavern Card -->
                <div class="card" style="border-top: 4px solid var(--primary);">
                    <div class="card-img">
                        <img src="{{ asset('images/tavern-thumbnail.jpg') }}" alt="Street Tavern">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Fresh, Local, Delicious Meals</h3>
                        <p>
                            We create experiences at Street Tavern in addition to serving food. Our love of using seasonal, locally sourced ingredients guarantees that every dish is bursting with flavor and freshness.
                        </p>
                        <a href="{{ route('tavern') }}" class="btn btn-primary">View More</a>
                    </div>
                </div>
                
                <!-- Street Trendy Card -->
                <div class="card" style="border-top: 4px solid var(--secondary);">
                    <div class="card-img">
                        <img src="{{ asset('images/trendy-thumbnail.jpg') }}" alt="Street Trendy">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Stitching Dreams into Reality</h3>
                        <p>
                            Our expertise lies in bespoke sewing, precise alterations, and one-of-a-kind handmade creations designed specifically for you.
                        </p>
                        <a href="{{ route('trendy') }}" class="btn btn-secondary">View More</a>
                    </div>
                </div>
                
                <!-- Street Realtors Card -->
                <div class="card" style="border-top: 4px solid var(--accent);">
                    <div class="card-img">
                        <img src="{{ asset('images/realtors-thumbnail.jpg') }}" alt="Street Realtors">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Expert Guidance for All Your Property Needs</h3>
                        <p>
                            Discover how our tailored approach to property brokerage, management, and advisory can help you achieve your real estate ambitions.
                        </p>
                        <a href="{{ route('realtors') }}" class="btn btn-accent">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" style="background-color: var(--light);">
        <div class="container">
            <div class="grid grid-cols-1 grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="section-title">About StreetNG</h2>
                    <p>
                        StreetNG is a unique Nigerian brand that brings together three distinct businesses under one umbrella, each dedicated to enhancing your lifestyle in different ways. Our philosophy is centered around quality, innovation, and customer satisfaction.
                    </p>
                    <p>
                        We take pride in our attention to detail and commitment to excellence, whether it's through the flavors of our cuisine, the stitches in our garments, or the properties in our portfolio.
                    </p>
                    <p>
                        With roots deeply embedded in Nigerian culture and a vision that spans across industries, StreetNG stands as a testament to the entrepreneurial spirit and creative ingenuity that defines our approach to business.
                    </p>
                </div>
                <div style="position: relative; height: 400px;">
                    <div style="position: absolute; width: 60%; height: 70%; top: 0; right: 0; background-color: var(--secondary); z-index: 1;"></div>
                    <img src="{{ asset('images/about-image.jpg') }}" alt="About StreetNG" style="position: absolute; width: 80%; height: 80%; object-fit: cover; bottom: 0; left: 0; z-index: 2; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title text-center">What Our Clients Say</h2>
            
            <div class="grid grid-cols-1 grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="card">
                    <div class="card-body">
                        <div style="color: var(--primary); font-size: 2rem; margin-bottom: 1rem;">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p style="font-style: italic;">
                            Affordable, tasty, and always fresh. This eatery never disappoints!
                        </p>
                        <div style="margin-top: 1.5rem;">
                            <h4>Mr Ayodele</h4>
                            <p style="color: #666;">Street Tavern Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="card">
                    <div class="card-body">
                        <div style="color: var(--secondary); font-size: 2rem; margin-bottom: 1rem;">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p style="font-style: italic;">
                            From the initial consultation to finding our dream home, the team at Street Realtors was fantastic. They truly listened to our needs and went above and beyond. Thank you!
                        </p>
                        <div style="margin-top: 1.5rem;">
                            <h4>Mr Ibrahim Babatunde</h4>
                            <p style="color: #666;">Street Realtors Client</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="card">
                    <div class="card-body">
                        <div style="color: var(--accent); font-size: 2rem; margin-bottom: 1rem;">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p style="font-style: italic;">
                            The attention to detail and craftsmanship in my custom suit is exceptional. Street Trendy has redefined my wardrobe with their tailoring expertise.
                        </p>
                        <div style="margin-top: 1.5rem;">
                            <h4>Mrs. Elizabeth</h4>
                            <p style="color: #666;">Street Trendy Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section" style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('images/cta-bg.jpg') }}') center/cover no-repeat; color: white; text-align: center;">
        <div class="container">
            <h2>Experience the StreetNG Difference</h2>
            <p style="max-width: 700px; margin: 1.5rem auto;">
                Ready to elevate your dining experience, upgrade your wardrobe, or find your dream property? Our team of dedicated professionals is here to assist you every step of the way.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us Today</a>
        </div>
    </section>
@endsection
```