// Hero Section with Custom Transitions
document.addEventListener('DOMContentLoaded', function() {
    initializeHeroSlider();
});

function initializeHeroSlider() {
    // Get all slides
    const slides = document.querySelectorAll('.hero-slides .slide');
    
    if (slides.length === 0) return;
    
    // Create a fallback background for slides if images are missing
    slides.forEach(slide => {
        // Add an error handler for the background image
        const bgImage = slide.style.backgroundImage;
        const url = bgImage.replace(/url\(['"]?(.*?)['"]?\)/, '$1');
        
        // Create a test image to check if the background image exists
        const img = new Image();
        img.onerror = function() {
            // If image fails to load, set a gradient fallback
            const colors = ['#E65100', '#1A237E', '#43A047']; // Primary, Secondary, Accent colors
            const index = Array.from(slides).indexOf(slide);
            const color = colors[index % colors.length];
            
            slide.style.backgroundImage = `linear-gradient(to bottom right, ${color}, #000)`;
            console.log(`Fallback applied for slide ${index + 1}`);
        };
        img.src = url;
    });
    
    let currentSlide = 0;
    
    // Function to show next slide
    function nextSlide() {
        // Hide current slide
        slides[currentSlide].classList.remove('active');
        
        // Move to next slide (loop back to first slide if at the end)
        currentSlide = (currentSlide + 1) % slides.length;
        
        // Show next slide
        slides[currentSlide].classList.add('active');
    }
    
    // Set first slide as active initially
    slides[0].classList.add('active');
    
    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
}