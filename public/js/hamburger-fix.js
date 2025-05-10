// Direct hamburger menu fix - add this to a new file called hamburger-fix.js

// Execute immediately when the script loads
(function() {
    // Function to fix the mobile menu toggle
    function fixMobileMenu() {
        const menuToggle = document.querySelector('.navbar-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        // If elements don't exist, try again later
        if (!menuToggle || !mobileMenu) {
            console.log('Menu elements not found, retrying in 100ms');
            setTimeout(fixMobileMenu, 100);
            return;
        }
        
        // Remove all existing click handlers by cloning and replacing
        const newMenuToggle = menuToggle.cloneNode(true);
        menuToggle.parentNode.replaceChild(newMenuToggle, menuToggle);
        
        // Simple direct click handler
        newMenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle the mobile menu
            if (mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
                this.classList.remove('active');
                
                // Toggle icon if using Font Awesome
                const icon = this.querySelector('i');
                if (icon) icon.className = 'fas fa-bars';
            } else {
                mobileMenu.classList.add('active');
                this.classList.add('active');
                
                // Toggle icon if using Font Awesome
                const icon = this.querySelector('i');
                if (icon) icon.className = 'fas fa-times';
            }
            
            console.log('Menu toggle clicked, menu is now:', 
                      mobileMenu.classList.contains('active') ? 'active' : 'inactive');
        });
        
        console.log('Hamburger menu fix applied successfully');
    }

    // Try to fix the menu immediately
    fixMobileMenu();
    
    // Also try again when the document is fully loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fixMobileMenu);
    }
    
    // And once more after a delay to catch any late-loading elements
    setTimeout(fixMobileMenu, 1000);
})();