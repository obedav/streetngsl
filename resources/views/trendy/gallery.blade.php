@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Our Gallery</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">Browse through our collection of trendy designs, styles, and inspirational projects.</p>
    </div>

    <div class="mb-8">
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 active">All</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Fashion</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Interior</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Events</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Digital</button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">
        <!-- Gallery Item 1 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-1.jpg') }}" alt="Fashion Design" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Summer Collection</h3>
                <p class="text-gray-200 text-sm">Fashion</p>
            </div>
        </div>

        <!-- Gallery Item 2 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-2.jpg') }}" alt="Interior Design" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Modern Living Room</h3>
                <p class="text-gray-200 text-sm">Interior</p>
            </div>
        </div>

        <!-- Gallery Item 3 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-3.jpg') }}" alt="Event Styling" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Corporate Gala</h3>
                <p class="text-gray-200 text-sm">Events</p>
            </div>
        </div>

        <!-- Gallery Item 4 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-4.jpg') }}" alt="Digital Trend" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Social Media Campaign</h3>
                <p class="text-gray-200 text-sm">Digital</p>
            </div>
        </div>

        <!-- Gallery Item 5 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-5.jpg') }}" alt="Fashion Accessories" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Accessory Collection</h3>
                <p class="text-gray-200 text-sm">Fashion</p>
            </div>
        </div>

        <!-- Gallery Item 6 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-6.jpg') }}" alt="Kitchen Design" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Contemporary Kitchen</h3>
                <p class="text-gray-200 text-sm">Interior</p>
            </div>
        </div>

        <!-- Gallery Item 7 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-7.jpg') }}" alt="Wedding Styling" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Elegant Wedding</h3>
                <p class="text-gray-200 text-sm">Events</p>
            </div>
        </div>

        <!-- Gallery Item 8 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-8.jpg') }}" alt="Web Design" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">E-commerce Platform</h3>
                <p class="text-gray-200 text-sm">Digital</p>
            </div>
        </div>

        <!-- Gallery Item 9 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-9.jpg') }}" alt="Winter Fashion" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Winter Collection</h3>
                <p class="text-gray-200 text-sm">Fashion</p>
            </div>
        </div>

        <!-- Gallery Item 10 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-10.jpg') }}" alt="Office Design" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Modern Office Space</h3>
                <p class="text-gray-200 text-sm">Interior</p>
            </div>
        </div>

        <!-- Gallery Item 11 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-11.jpg') }}" alt="Birthday Party" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Luxury Birthday Party</h3>
                <p class="text-gray-200 text-sm">Events</p>
            </div>
        </div>

        <!-- Gallery Item 12 -->
        <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer">
            <img src="{{ asset('images/gallery-12.jpg') }}" alt="Mobile App" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                <h3 class="text-white text-lg font-semibold">Lifestyle Mobile App</h3>
                <p class="text-gray-200 text-sm">Digital</p>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal (Hidden by default) -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden flex items-center justify-center p-4">
        <button id="close-lightbox" class="absolute top-4 right-4 text-white text-2xl">&times;</button>
        <button id="prev-image" class="absolute left-4 text-white text-4xl">&lt;</button>
        <button id="next-image" class="absolute right-4 text-white text-4xl">&gt;</button>
        <img id="lightbox-image" src="" alt="Enlarged gallery image" class="max-h-[80vh] max-w-[90vw] object-contain">
        <div class="absolute bottom-8 text-white text-center w-full">
            <h3 id="lightbox-title" class="text-xl font-semibold"></h3>
            <p id="lightbox-category" class="text-gray-300"></p>
        </div>
    </div>

    <div class="text-center">
        <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Load More
        </button>
    </div>

    <div class="mt-16 bg-gray-100 rounded-lg p-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Want to See More?</h2>
            <p class="mt-2 text-gray-600">Contact us to request a personalized portfolio or to discuss your project needs.</p>
        </div>
        <div class="flex justify-center">
            <a href="#" class="bg-blue-600 text-white hover:bg-blue-700 font-bold py-3 px-6 rounded-lg transition duration-300">Get in Touch</a>
        </div>
    </div>
</div>

<script>
    // Simple lightbox functionality
    document.addEventListener('DOMContentLoaded', function() {
        const galleryItems = document.querySelectorAll('.grid > div');
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxCategory = document.getElementById('lightbox-category');
        const closeLightbox = document.getElementById('close-lightbox');
        const prevImage = document.getElementById('prev-image');
        const nextImage = document.getElementById('next-image');
        
        let currentIndex = 0;
        
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                const img = item.querySelector('img');
                const title = item.querySelector('h3').textContent;
                const category = item.querySelector('p').textContent;
                
                lightboxImage.src = img.src;
                lightboxTitle.textContent = title;
                lightboxCategory.textContent = category;
                lightbox.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        });
        
        closeLightbox.addEventListener('click', () => {
            lightbox.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
        
        prevImage.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
            updateLightbox();
        });
        
        nextImage.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % galleryItems.length;
            updateLightbox();
        });
        
        function updateLightbox() {
            const item = galleryItems[currentIndex];
            const img = item.querySelector('img');
            const title = item.querySelector('h3').textContent;
            const category = item.querySelector('p').textContent;
            
            lightboxImage.src = img.src;
            lightboxTitle.textContent = title;
            lightboxCategory.textContent = category;
        }
        
        // Close lightbox when clicking outside the image
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('hidden')) return;
            
            if (e.key === 'Escape') {
                lightbox.classList.add('hidden');
                document.body.style.overflow = 'auto';
            } else if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
                updateLightbox();
            } else if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % galleryItems.length;
                updateLightbox();
            }
        });
    });
    
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.flex.flex-wrap.justify-center button');
        const galleryItems = document.querySelectorAll('.grid > div');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active button
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                });
                button.classList.remove('bg-gray-200', 'text-gray-800');
                button.classList.add('bg-blue-600', 'text-white');
                
                const filter = button.textContent.trim();
                
                // Filter gallery items
                galleryItems.forEach(item => {
                    const category = item.querySelector('p').textContent.trim();
                    
                    if (filter === 'All' || category === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection