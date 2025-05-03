/**
 * StreetNG - Main JavaScript file
 * This file handles all custom JavaScript functionality for the StreetNG website
 */

// Mobile menu toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const navbarToggle = document.querySelector('.navbar-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (navbarToggle && mobileMenu) {
        navbarToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
    
    // Smooth scrolling (already implemented in the layout file)
    
    // Testimonial slider (if implemented later)
    
    // Form validation for contact form
    const contactForm = document.querySelector('#contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            const nameInput = document.querySelector('#name');
            const emailInput = document.querySelector('#email');
            const messageInput = document.querySelector('#message');
            
            // Simple validation
            if (nameInput && nameInput.value.trim() === '') {
                isValid = false;
                showError(nameInput, 'Please enter your name');
            }
            
            if (emailInput) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value.trim())) {
                    isValid = false;
                    showError(emailInput, 'Please enter a valid email');
                }
            }
            
            if (messageInput && messageInput.value.trim() === '') {
                isValid = false;
                showError(messageInput, 'Please enter your message');
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    // Helper function for showing error messages
    function showError(input, message) {
        const formGroup = input.parentElement;
        const errorElement = formGroup.querySelector('.invalid-feedback') || document.createElement('div');
        
        errorElement.className = 'invalid-feedback';
        errorElement.textContent = message;
        
        if (!formGroup.querySelector('.invalid-feedback')) {
            formGroup.appendChild(errorElement);
        }
        
        input.classList.add('is-invalid');
    }
    
    // Clear validation errors when input changes
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('is-invalid');
            const errorElement = this.parentElement.querySelector('.invalid-feedback');
            if (errorElement) {
                errorElement.remove();
            }
        });
    });
});

// Image lazy loading
document.addEventListener('DOMContentLoaded', function() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        let imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    image.src = image.dataset.src;
                    image.removeAttribute('data-src');
                    imageObserver.unobserve(image);
                }
            });
        });
        
        lazyImages.forEach(img => {
            imageObserver.observe(img);
        });
    } else {
        // Fallback for browsers without intersection observer
        lazyImages.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }
});