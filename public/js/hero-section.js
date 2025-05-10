/**
 * Optimized Hero Section JavaScript
 * Modified for immediate visibility of first slide
 */

// Self-executing function to avoid global scope pollution
(function() {
  'use strict';
  
  // Wait for DOM to be ready
  document.addEventListener('DOMContentLoaded', initializeHeroSlider);
  
  function initializeHeroSlider() {
    // Get all slides
    const slides = document.querySelectorAll('.hero-slides .slide');
    if (!slides || slides.length === 0) return;
    
    // Configuration
    const TRANSITION_DURATION = 1000; // transition duration in ms (match CSS)
    const SLIDE_DURATION = 5000;      // how long each slide shows
    
    let currentSlide = 0;
    let isAnimating = false;
    let slideInterval;
    
    // Setup first slide with active class immediately (no delay)
    slides[0].classList.add('active');
    
    // Preload remaining images in the background
    preloadSlideImages();
    
    function preloadSlideImages() {
      console.log('Preloading slide images');
      
      // Convert NodeList to Array for easier manipulation
      const slidesArray = Array.from(slides);
      const totalSlides = slidesArray.length;
      let loadedCount = 0;
      
      // For each slide, preload its background image
      slidesArray.forEach((slide, index) => {
        // Skip the first slide in counting since it's already visible
        if (index === 0) {
          loadedCount++;
          return;
        }
        
        const bgImage = getComputedStyle(slide).backgroundImage;
        const imgUrl = bgImage.replace(/url\(['"]?(.*?)['"]?\)/i, '$1');
        
        if (imgUrl && imgUrl !== 'none') {
          const img = new Image();
          
          img.onload = function() {
            loadedCount++;
            if (loadedCount >= totalSlides) {
              console.log('All slide images loaded, starting automatic slideshow');
              startAutoSlide();
            }
          };
          
          img.onerror = function() {
            console.warn(`Failed to load image: ${imgUrl}`);
            loadedCount++;
            if (loadedCount >= totalSlides) {
              console.log('All slide image attempts completed, starting automatic slideshow');
              startAutoSlide();
            }
          };
          
          img.src = imgUrl;
        } else {
          loadedCount++;
          if (loadedCount >= totalSlides) {
            console.log('All slide checks completed, starting automatic slideshow');
            startAutoSlide();
          }
        }
      });
      
      // Safety fallback - if preloading takes too long, start anyway
      setTimeout(() => {
        if (!slideInterval) {
          console.log('Preloading timed out, starting slideshow anyway');
          startAutoSlide();
        }
      }, 3000);
    }
    
    function showSlide(index, immediate = false) {
      if (isAnimating && !immediate) return;
      isAnimating = true;
      
      // Handle index bounds
      if (index >= slides.length) index = 0;
      if (index < 0) index = slides.length - 1;
      
      // Get current and next slides
      const currentSlideElement = slides[currentSlide];
      const nextSlideElement = slides[index];
      
      // Prepare next slide to fade in
      nextSlideElement.style.visibility = 'visible';
      
      if (immediate) {
        // Immediate transition (no animation)
        currentSlideElement.style.opacity = '0';
        currentSlideElement.style.visibility = 'hidden';
        currentSlideElement.classList.remove('active');
        
        nextSlideElement.style.opacity = '1';
        nextSlideElement.style.transform = 'scale(1)';
        nextSlideElement.classList.add('active');
        
        currentSlide = index;
        isAnimating = false;
      } else {
        // Animated transition
        
        // Fade out current slide
        currentSlideElement.style.opacity = '0';
        currentSlideElement.style.transform = 'scale(1.05)';
        
        // Fade in next slide
        nextSlideElement.style.opacity = '1';
        nextSlideElement.style.transform = 'scale(1)';
        nextSlideElement.classList.add('active');
        
        // Wait for transition to complete
        setTimeout(() => {
          // Hide the old slide completely
          currentSlideElement.style.visibility = 'hidden';
          currentSlideElement.classList.remove('active');
          
          // Update current slide index
          currentSlide = index;
          isAnimating = false;
        }, TRANSITION_DURATION);
      }
    }
    
    function startAutoSlide() {
      // Clear any existing interval first
      if (slideInterval) {
        clearInterval(slideInterval);
      }
      
      // Set new interval
      slideInterval = setInterval(() => {
        if (!isAnimating) {
          showSlide(currentSlide + 1);
        }
      }, SLIDE_DURATION);
      
      // Add pause on page visibility change
      handleVisibilityChange();
    }
    
    function handleVisibilityChange() {
      // Pause slideshow when page is not visible
      document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
          // Clear interval when page is hidden
          if (slideInterval) {
            clearInterval(slideInterval);
            slideInterval = null;
          }
        } else {
          // Restart when page becomes visible again
          startAutoSlide();
        }
      });
    }
  }
})();