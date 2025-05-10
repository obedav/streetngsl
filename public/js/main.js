/**
 * StreetNG - Enhanced JavaScript file
 * Improved for better responsiveness and performance
 */

// IIFE to avoid polluting global namespace
(function() {
    'use strict';
    
    // Global variables
    let windowWidth = window.innerWidth;
    let isMobile = windowWidth < 768;
    let isTablet = windowWidth >= 768 && windowWidth < 1024;
    
    // Initialize all functionality
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initFormValidation();
        initLazyLoading();
        initResizeHandler();
        initTouchSupport();
        
        // Initialize any section-specific functionality
        if (document.querySelector('.hero-slides')) {
            initHeroSlider();
        }
        
        if (document.querySelector('.map-tabs')) {
            initMapTabs();
        }
    }
    
    // Mobile menu functionality
    function initMobileMenu() {
        const navbarToggle = document.querySelector('.navbar-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        const body = document.body;
        
        if (navbarToggle && mobileMenu) {
            navbarToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
                this.classList.toggle('active');
                
                // Prevent background scrolling when menu is open
                if (mobileMenu.classList.contains('active')) {
                    body.style.overflow = 'hidden';
                } else {
                    body.style.overflow = '';
                }
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (mobileMenu.classList.contains('active') && 
                    !mobileMenu.contains(e.target) && 
                    !navbarToggle.contains(e.target)) {
                    mobileMenu.classList.remove('active');
                    navbarToggle.classList.remove('active');
                    body.style.overflow = '';
                }
            });
            
            // Add menu close on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    navbarToggle.classList.remove('active');
                    body.style.overflow = '';
                }
            });
        }
    }
    
    // Smooth scrolling functionality
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Close mobile menu if it's open
                const mobileMenu = document.querySelector('.mobile-menu.active');
                const navbarToggle = document.querySelector('.navbar-toggle.active');
                
                if (mobileMenu && navbarToggle) {
                    mobileMenu.classList.remove('active');
                    navbarToggle.classList.remove('active');
                    document.body.style.overflow = '';
                }
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    // Calculate header height to offset scroll position
                    const headerHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    // Form validation
    function initFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const requiredInputs = form.querySelectorAll('[required]');
                
                requiredInputs.forEach(input => {
                    // Clear previous error states
                    clearError(input);
                    
                    // Check for empty values
                    if (input.value.trim() === '') {
                        isValid = false;
                        const errorMessage = input.dataset.errorMessage || 'This field is required';
                        showError(input, errorMessage);
                    } 
                    // Email validation
                    else if (input.type === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(input.value.trim())) {
                            isValid = false;
                            showError(input, 'Please enter a valid email address');
                        }
                    }
                    // Phone validation (basic)
                    else if (input.type === 'tel') {
                        const phoneRegex = /^[0-9\+\-\s\(\)]{7,15}$/;
                        if (!phoneRegex.test(input.value.trim())) {
                            isValid = false;
                            showError(input, 'Please enter a valid phone number');
                        }
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = form.querySelector('.is-invalid');
                    if (firstError) {
                        const headerHeight = document.querySelector('.navbar').offsetHeight;
                        const targetPosition = firstError.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
            
            // Live validation as user types
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearError(input);
                });
                
                // Validate email format on blur
                if (input.type === 'email') {
                    input.addEventListener('blur', function() {
                        if (input.value.trim() !== '') {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(input.value.trim())) {
                                showError(input, 'Please enter a valid email address');
                            }
                        }
                    });
                }
            });
        });
    }
    
    // Show error message
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        const errorElement = formGroup.querySelector('.error-message') || document.createElement('div');
        
        errorElement.className = 'error-message';
        errorElement.textContent = message;
        
        input.classList.add('is-invalid');
        
        if (!formGroup.querySelector('.error-message')) {
            formGroup.appendChild(errorElement);
        }
    }
    
    // Clear error message
    function clearError(input) {
        const formGroup = input.closest('.form-group');
        input.classList.remove('is-invalid');
        
        const errorElement = formGroup.querySelector('.error-message');
        if (errorElement) {
            errorElement.remove();
        }
    }
    
    // Lazy loading for images
    function initLazyLoading() {
        if ('loading' in HTMLImageElement.prototype) {
            // Browser supports native lazy loading
            document.querySelectorAll('img[data-src]').forEach(img => {
                img.src = img.dataset.src;
                img.setAttribute('loading', 'lazy');
                img.removeAttribute('data-src');
            });
        } else if ('IntersectionObserver' in window) {
            // Use intersection observer as fallback
            const lazyImages = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const image = entry.target;
                        image.src = image.dataset.src;
                        image.removeAttribute('data-src');
                        imageObserver.unobserve(image);
                    }
                });
            }, {
                rootMargin: '100px'  // Load images when they're 100px from viewport
            });
            
            lazyImages.forEach(img => {
                imageObserver.observe(img);
            });
        } else {
            // Fallback for older browsers
            document.querySelectorAll('img[data-src]').forEach(img => {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
        }
    }
    
    // Window resize handler
    function initResizeHandler() {
        let resizeTimeout;
        
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            
            resizeTimeout = setTimeout(function() {
                const newWidth = window.innerWidth;
                
                // Check if we've crossed a breakpoint
                const wasDesktop = windowWidth >= 1024;
                const isNowDesktop = newWidth >= 1024;
                
                const wasTablet = windowWidth >= 768 && windowWidth < 1024;
                const isNowTablet = newWidth >= 768 && newWidth < 1024;
                
                const wasMobile = windowWidth < 768;
                const isNowMobile = newWidth < 768;
                
                // Only trigger changes if we cross breakpoints
                if ((wasDesktop && !isNowDesktop) || (wasTablet && !isNowTablet) || (wasMobile && !isNowMobile)) {
                    // Update global variables
                    windowWidth = newWidth;
                    isMobile = isNowMobile;
                    isTablet = isNowTablet;
                    
                    // Reset mobile menu when switching to desktop
                    if (isNowDesktop && !wasDesktop) {
                        const mobileMenu = document.querySelector('.mobile-menu');
                        const navbarToggle = document.querySelector('.navbar-toggle');
                        
                        if (mobileMenu && mobileMenu.classList.contains('active')) {
                            mobileMenu.classList.remove('active');
                            navbarToggle.classList.remove('active');
                            document.body.style.overflow = '';
                        }
                    }
                    
                    // Adjust specific elements based on new screen size
                    adjustLayoutForScreenSize();
                }
            }, 150);  // Debounce time
        });
    }
    
    // Adjust layout elements based on screen size
    function adjustLayoutForScreenSize() {
        // Example: adjust card heights to be equal in a row
        if (!isMobile) {
            equalizeCardHeights('.service-card');
            equalizeCardHeights('.expertise-card');
            equalizeCardHeights('.testimonial-card');
        } else {
            // Reset heights on mobile
            resetCardHeights('.service-card');
            resetCardHeights('.expertise-card');
            resetCardHeights('.testimonial-card');
        }
    }
    
    // Make all cards in a row the same height
    function equalizeCardHeights(selector) {
        const cards = document.querySelectorAll(selector);
        if (cards.length < 2) return;
        
        // Reset heights first
        cards.forEach(card => card.style.height = 'auto');
        
        // Get row groups (cards that are on the same row)
        const rows = [];
        let currentRow = [];
        let currentTop = cards[0].getBoundingClientRect().top;
        
        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            
            if (Math.abs(rect.top - currentTop) > 10) {
                // New row
                if (currentRow.length > 0) {
                    rows.push(currentRow);
                    currentRow = [];
                }
                currentTop = rect.top;
            }
            
            currentRow.push(card);
        });
        
        // Add the last row
        if (currentRow.length > 0) {
            rows.push(currentRow);
        }
        
        // Set equal heights for cards in each row
        rows.forEach(rowCards => {
            let maxHeight = 0;
            
            rowCards.forEach(card => {
                maxHeight = Math.max(maxHeight, card.offsetHeight);
            });
            
            rowCards.forEach(card => {
                card.style.height = maxHeight + 'px';
            });
        });
    }
    
    // Reset card heights
    function resetCardHeights(selector) {
        const cards = document.querySelectorAll(selector);
        cards.forEach(card => card.style.height = 'auto');
    }
    
    // Touch support for better mobile interaction
    function initTouchSupport() {
        if ('ontouchstart' in window) {
            document.body.classList.add('touch-device');
            
            // Add specific handling for drop-down menus
            document.querySelectorAll('.has-dropdown').forEach(item => {
                item.addEventListener('touchstart', function(e) {
                    if (!this.classList.contains('touch-open')) {
                        e.preventDefault();
                        
                        // Close all other open dropdowns
                        document.querySelectorAll('.has-dropdown.touch-open').forEach(openItem => {
                            if (openItem !== this) {
                                openItem.classList.remove('touch-open');
                            }
                        });
                        
                        this.classList.add('touch-open');
                    }
                });
            });
            
            // Close dropdowns when tapping elsewhere
            document.addEventListener('touchstart', function(e) {
                if (!e.target.closest('.has-dropdown')) {
                    document.querySelectorAll('.has-dropdown.touch-open').forEach(item => {
                        item.classList.remove('touch-open');
                    });
                }
            });
        }
    }
    
    // Hero slider functionality
    function initHeroSlider() {
        const slides = document.querySelectorAll('.hero-slides .slide');
        let currentSlide = 0;
        
        if (slides.length <= 1) return;
        
        // Auto rotate slides
        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            
            // Handle index bounds
            if (index >= slides.length) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = slides.length - 1;
            } else {
                currentSlide = index;
            }
            
            slides[currentSlide].classList.add('active');
        }
        
        // Initialize first slide
        showSlide(0);
        
        // Auto-rotate timer
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);
        
        // Add swipe support for touch devices
        if ('ontouchstart' in window) {
            const heroSlides = document.querySelector('.hero-slides');
            let touchStartX = 0;
            let touchEndX = 0;
            
            heroSlides.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            
            heroSlides.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, { passive: true });
            
            function handleSwipe() {
                const threshold = 50;  // Minimum distance for swipe
                
                if (touchEndX < touchStartX - threshold) {
                    // Swipe left - next slide
                    showSlide(currentSlide + 1);
                } else if (touchEndX > touchStartX + threshold) {
                    // Swipe right - previous slide
                    showSlide(currentSlide - 1);
                }
            }
        }
    }
    
    // Map tabs functionality
    function initMapTabs() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabPanes = document.querySelectorAll('.tab-pane');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons and panes
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanes.forEach(pane => pane.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding pane
                const tabId = this.getAttribute('data-tab');
                document.getElementById(`${tabId}-map`).classList.add('active');
            });
        });
    }
    
    // Initialize all functionality when DOM is ready
    document.addEventListener('DOMContentLoaded', init);
    
    // Handle page load optimization
    window.addEventListener('load', function() {
        // Recalculate equal heights after all images are loaded
        if (!isMobile) {
            equalizeCardHeights('.service-card');
            equalizeCardHeights('.expertise-card');
            equalizeCardHeights('.testimonial-card');
        }
        
        // Add page loaded class for CSS transitions
        document.body.classList.add('page-loaded');
    });
})();


// Add this to main.js or create a new file called mobile-menu-fix.js

// This is a backup solution in case the primary event listener fails
document.addEventListener('DOMContentLoaded', function() {
    // Check if the mobile menu toggle is already working
    setTimeout(function() {
        const menuToggle = document.querySelector('.navbar-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (menuToggle && mobileMenu) {
            // Test if an event listener is attached by checking for properties
            const hasListener = menuToggle.onclick || menuToggle._hasClickListener;
            
            if (!hasListener) {
                console.log('Applying backup mobile menu toggle handler');
                
                // Apply a direct onclick handler as a fallback
                menuToggle.onclick = function(e) {
                    e.preventDefault();
                    mobileMenu.classList.toggle('active');
                    this.classList.toggle('active');
                    
                    // Change icon if using Font Awesome
                    const icon = this.querySelector('i');
                    if (icon) {
                        if (mobileMenu.classList.contains('active')) {
                            icon.className = 'fas fa-times';
                        } else {
                            icon.className = 'fas fa-bars';
                        }
                    }
                };
                
                // Mark that we've added a listener
                menuToggle._hasClickListener = true;
            }
        }
    }, 500); // Check after a short delay to allow other scripts to initialize
});