@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">Explore our comprehensive range of trendy services designed to meet your needs.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Style Consultation</h2>
                <p class="text-gray-600 mb-4">Our expert stylists will work with you to identify your unique style and provide personalized recommendations that align with the latest trends.</p>
                <ul class="list-disc pl-5 mb-4 text-gray-600">
                    <li>Personal style assessment</li>
                    <li>Wardrobe evaluation</li>
                    <li>Trend-based recommendations</li>
                    <li>Color palette selection</li>
                </ul>
                <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                    <p class="font-semibold">Starting at $99</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Interior Design</h2>
                <p class="text-gray-600 mb-4">Transform your living spaces with our cutting-edge interior design services that incorporate the latest trends in home décor.</p>
                <ul class="list-disc pl-5 mb-4 text-gray-600">
                    <li>Space planning and layout</li>
                    <li>Color scheme development</li>
                    <li>Furniture and accessory selection</li>
                    <li>Lighting design</li>
                </ul>
                <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                    <p class="font-semibold">Starting at $299</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Event Styling</h2>
                <p class="text-gray-600 mb-4">Make your special events memorable with our trendy event styling services that will impress your guests.</p>
                <ul class="list-disc pl-5 mb-4 text-gray-600">
                    <li>Theme development</li>
                    <li>Décor and prop selection</li>
                    <li>Table settings and arrangements</li>
                    <li>Lighting and ambiance design</li>
                </ul>
                <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                    <p class="font-semibold">Starting at $499</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4">Digital Trend Analysis</h2>
                <p class="text-gray-600 mb-4">Stay ahead of the curve with our comprehensive digital trend analysis services for businesses and individuals.</p>
                <ul class="list-disc pl-5 mb-4 text-gray-600">
                    <li>Market trend research</li>
                    <li>Competitor analysis</li>
                    <li>Consumer behavior insights</li>
                    <li>Trend forecasting reports</li>
                </ul>
                <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                    <p class="font-semibold">Starting at $199</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-600 text-white rounded-lg p-8 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold">Ready to Get Started?</h2>
            <p class="mt-2 text-blue-100">Contact us today to schedule a consultation and discover how our services can benefit you.</p>
        </div>
        <div class="flex justify-center">
            <a href="#" class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-3 px-6 rounded-lg transition duration-300">Contact Us</a>
        </div>
    </div>

    <div class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-2">How do I know which service is right for me?</h3>
                <p class="text-gray-600">We offer a free initial consultation to assess your needs and recommend the most suitable services for your specific situation and goals.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-2">How long does each service typically take?</h3>
                <p class="text-gray-600">Service duration varies depending on the complexity of your project. Style consultations typically take 1-2 hours, while interior design projects may span several weeks.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-2">Do you offer package deals for multiple services?</h3>
                <p class="text-gray-600">Yes, we offer customized packages that combine multiple services at discounted rates. Contact us for more information about our package options.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-2">Can I see examples of your previous work?</h3>
                <p class="text-gray-600">Absolutely! Check out our <a href="{{ route('trendy.gallery') }}" class="text-blue-600 hover:text-blue-800">gallery</a> to view our portfolio of past projects and client transformations.</p>
            </div>
        </div>
    </div>
</div>
@endsection