// navbar-color.js - Improved with better practices

document.addEventListener('DOMContentLoaded', function() {
    // Identify the current page based on the active menu item
    const activePage = document.querySelector('.navbar-menu a.active');
    const navbar = document.querySelector('.navbar');
    const mobileMenu = document.querySelector('.mobile-menu');
    const logoSpan = document.querySelector('.navbar-logo span');
    
    // Get page type from active menu or fallback to pathname
    let pageType = activePage ? activePage.textContent.trim() : '';
    if (!pageType) {
        // Fallback to URL path to determine page
        const path = window.location.pathname;
        if (path.includes('tavern')) {
            pageType = 'Tavern';
        } else if (path.includes('trendy')) {
            pageType = 'Trendy';
        } else if (path.includes('realtors')) {
            pageType = 'Realtors';
        } else {
            pageType = 'Home';
        }
    }
    
    // Configure colors based on page type
    let primaryColor, accentColor, gradientStart, gradientEnd, gradientStartScrolled, gradientEndScrolled;
    
    if (pageType.includes('Home')) {
        // Home - Off-white background with purple accents
        primaryColor = '#3f51b5';      // Indigo
        accentColor = '#3f51b5';       // Indigo for accents
        gradientStart = 'rgba(248, 248, 250, 0.95)'; // Off-white with slight transparency
        gradientEnd = 'rgba(245, 245, 250, 0.95)';   // Slightly different off-white for subtle gradient
        gradientStartScrolled = 'rgba(248, 248, 250, 0.98)'; // More opaque when scrolled
        gradientEndScrolled = 'rgba(245, 245, 250, 0.98)';   // More opaque when scrolled
        document.body.classList.add('home-page');
    }
    else if (pageType.includes('Tavern')) {
        // Tavern - White and Orange gradient
        primaryColor = '#E65100';      // Deep orange (base)
        accentColor = '#FF9800';       // Orange accent
        gradientStart = 'rgba(0, 0, 0, 0.5)'; // Semi-transparent black
        gradientEnd = 'rgba(230, 81, 0, 0.6)';     // Semi-transparent orange
        gradientStartScrolled = 'rgba(0, 0, 0, 0.7)'; // More opaque when scrolled
        gradientEndScrolled = 'rgba(230, 81, 0, 0.8)';     // More opaque when scrolled
        document.body.classList.add('tavern-page');
    } 
    else if (pageType.includes('Trendy')) {
        // Trendy - Black and Red gradient
        primaryColor = '#8B0000';          // Dark red (base)
        accentColor = '#FF5252';           // Bright red accent
        gradientStart = 'rgba(139, 0, 0, 0.6)'; // Semi-transparent black
        gradientEnd = 'rgba(0, 0, 0, 0.6)';  // Semi-transparent dark red
        gradientStartScrolled = 'rgba(0, 0, 0, 0.8)'; // More opaque when scrolled
        gradientEndScrolled = 'rgba(139, 0, 0, 0.8)';  // More opaque when scrolled
        document.body.classList.add('trendy-page');
    } 
    else if (pageType.includes('Realtors')) {
        // Realtors - Black and Gold gradient
        primaryColor = '#b5ad56';      // Gold/mustard (base)
        accentColor = '#d4cc6a';       // Lighter gold accent
        gradientStart = 'rgba(0, 0, 0, 0.5)'; // Semi-transparent black
        gradientEnd = 'rgba(181, 173, 86, 0.6)';   // Semi-transparent gold
        gradientStartScrolled = 'rgba(0, 0, 0, 0.7)'; // More opaque when scrolled
        gradientEndScrolled = 'rgba(181, 173, 86, 0.8)';   // More opaque when scrolled
        document.body.classList.add('realtors-page');
    }
    else {
        // Default fallback - Blue gradient
        primaryColor = '#3f51b5';      // Indigo
        accentColor = '#ffffff';       // White for better visibility
        gradientStart = 'rgba(3, 31, 193, 0.6)'; // Semi-transparent indigo
        gradientEnd = 'rgba(103, 58, 183, 0.6)';  // Semi-transparent purple
        gradientStartScrolled = 'rgba(3, 31, 193, 0.8)'; // More opaque when scrolled
        gradientEndScrolled = 'rgba(103, 58, 183, 0.8)';  // More opaque when scrolled
        document.body.classList.add('home-page');
    }
    
    // Apply initial gradient
    navbar.style.background = `linear-gradient(to right, ${gradientStart}, ${gradientEnd})`;
    
    // Set up logo color
    if (logoSpan) {
        logoSpan.style.color = accentColor;
    }
    
    // Style mobile menu
    if (mobileMenu) {
        mobileMenu.style.background = `linear-gradient(to right, ${gradientStartScrolled}, ${gradientEndScrolled})`;
    }
    
    // Handle scrolling effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            // More opaque gradient when scrolled
            navbar.style.background = `linear-gradient(to right, ${gradientStartScrolled}, ${gradientEndScrolled})`;
            navbar.style.backdropFilter = 'blur(8px)';
            navbar.style.webkitBackdropFilter = 'blur(8px)';
        } else {
            // Return to more transparent gradient at the top
            navbar.style.background = `linear-gradient(to right, ${gradientStart}, ${gradientEnd})`;
            navbar.style.backdropFilter = 'blur(5px)';
            navbar.style.webkitBackdropFilter = 'blur(5px)';
        }
    });

    // Handle mobile menu toggle
    const menuToggle = document.querySelector('.navbar-toggle');
    if (menuToggle && mobileMenu) {
        // Remove any existing event listeners first
        const newMenuToggle = menuToggle.cloneNode(true);
        menuToggle.parentNode.replaceChild(newMenuToggle, menuToggle);
        
        // Add the event listener with a clearer implementation
        newMenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle the 'active' class on the mobile menu
            mobileMenu.classList.toggle('active');
            
            // Visual feedback for the toggle button
            this.classList.toggle('active');
            
            // Change icon if using Font Awesome
            const icon = this.querySelector('i');
            if (icon) {
                if (mobileMenu.classList.contains('active')) {
                    icon.className = 'fas fa-times'; // Change to X when menu is open
                } else {
                    icon.className = 'fas fa-bars';  // Change back to bars when closed
                }
            }
            
            console.log('Mobile menu toggle clicked. Menu is now:', 
                      mobileMenu.classList.contains('active') ? 'active' : 'inactive');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileMenu.classList.contains('active') && 
                !mobileMenu.contains(e.target) && 
                !newMenuToggle.contains(e.target)) {
                
                mobileMenu.classList.remove('active');
                newMenuToggle.classList.remove('active');
                
                // Reset icon
                const icon = newMenuToggle.querySelector('i');
                if (icon) {
                    icon.className = 'fas fa-bars';
                }
            }
        });
    }
});
