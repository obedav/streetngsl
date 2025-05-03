@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Trendy</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">Discover the latest trends and styles that will elevate your lifestyle.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/trendy-1.jpg') }}" alt="Trendy Fashion" class="w-full h-64 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2">Fashion Forward</h3>
                <p class="text-gray-600">Explore the latest fashion trends that are making waves in the industry.</p>
                <a href="{{ route('trendy.services') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">Learn More →</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/trendy-2.jpg') }}" alt="Trendy Lifestyle" class="w-full h-64 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2">Lifestyle Essentials</h3>
                <p class="text-gray-600">Discover must-have items that will transform your everyday experience.</p>
                <a href="{{ route('trendy.services') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">Learn More →</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/trendy-3.jpg') }}" alt="Trendy Gallery" class="w-full h-64 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2">Inspiration Gallery</h3>
                <p class="text-gray-600">Browse our curated collection of inspirational designs and concepts.</p>
                <a href="{{ route('trendy.gallery') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">View Gallery →</a>
            </div>
        </div>
    </div>

    <div class="mt-16 bg-gray-100 rounded-lg p-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Why Choose Trendy?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-4">
                <div class="bg-blue-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Cutting Edge</h3>
                <p class="text-gray-600">Always at the forefront of the latest trends and innovations.</p>
            </div>
            <div class="text-center p-4">
                <div class="bg-blue-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Customizable</h3>
                <p class="text-gray-600">Tailor our offerings to match your unique style and preferences.</p>
            </div>
            <div class="text-center p-4">
                <div class="bg-blue-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Quality Assured</h3>
                <p class="text-gray-600">We never compromise on quality, ensuring the best for our clients.</p>
            </div>
        </div>
    </div>
</div>
@endsection