/**
 * ULTIMATE HAMBURGER MENU FIX
 * Updated with custom styling while maintaining site design
 */

// IIFE to avoid conflicts with other scripts
(function() {
  // Function to fix the menu
  function ultimateMenuFix() {
    console.clear(); // Clear console for clean debugging
    console.log('🔧 APPLYING ULTIMATE HAMBURGER MENU FIX');
    
    // Get required elements
    const menuBtn = document.querySelector('.navbar-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (!menuBtn || !mobileMenu) {
      console.warn('⚠️ Menu elements not found, retrying in 500ms');
      setTimeout(ultimateMenuFix, 500);
      return;
    }
    
    // Force remove ALL existing event listeners by cloning
    const newMenuBtn = menuBtn.cloneNode(true);
    menuBtn.parentNode.replaceChild(newMenuBtn, menuBtn);
    
    // Check if we're on the home page to apply appropriate styling
    const isHomePage = document.body.classList.contains('home-page');
    
    // Set initial styles based on page type
    let menuBackground, textColor, borderColor;
    
    // For desktop view (these will be overridden on small screens)
    if (isHomePage) {
      menuBackground = 'rgba(248, 248, 250, 0.98)';
      textColor = '#333333';
      borderColor = 'rgba(0, 0, 0, 0.05)';
    } else {
      menuBackground = 'rgba(30, 30, 40, 0.95)';
      textColor = '#ffffff';
      borderColor = 'rgba(255, 255, 255, 0.1)';
    }
    
    // Create a dark overlay for the background
    let overlayElement = document.getElementById('mobile-menu-overlay');
    if (!overlayElement) {
      overlayElement = document.createElement('div');
      overlayElement.id = 'mobile-menu-overlay';
      overlayElement.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 998;
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
      `;
      document.body.appendChild(overlayElement);
    }
    
    // Set initial state with inline styles (highest CSS specificity)
    mobileMenu.style.cssText = `
      position: fixed;
      top: 70px;
      left: 0;
      width: 100%;
      background: ${menuBackground};
      z-index: 999 !important;
      display: none;
      max-height: calc(100vh - 70px);
      overflow-y: auto;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    `;
    
    // Ensure all menu items are visible when menu is shown
    const menuItems = mobileMenu.querySelectorAll('a');
    menuItems.forEach(item => {
      item.style.cssText = `
        display: block;
        padding: 15px 20px;
        border-bottom: 1px solid ${borderColor};
        color: ${textColor};
        opacity: 1;
        transform: none;
        font-weight: 500;
        transition: color 0.3s ease, background-color 0.3s ease;
      `;
    });
    
    // Style active menu item differently
    const activeMenuItem = mobileMenu.querySelector('a.active');
    if (activeMenuItem) {
      if (isHomePage) {
        activeMenuItem.style.cssText += `
          color: #3f51b5;
          font-weight: 700;
          background: transparent;
          border-left: 3px solid #3f51b5;
        `;
      } else {
        activeMenuItem.style.cssText += `
          background: rgba(255, 255, 255, 0.1);
          border-left: 4px solid #E65100;
          color: #ffffff;
          font-weight: 700;
        `;
      }
    }
    
    // Add supercharged click handler with maximum debugging
    newMenuBtn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation(); // Prevent event bubbling
      
      console.log('🍔 Hamburger clicked');
      
      // Toggle menu visibility with maximum specificity
      const isMenuVisible = mobileMenu.style.display !== 'none';
      
      if (isMenuVisible) {
        console.log('📕 Closing menu');
        mobileMenu.style.display = 'none';
        
        // Hide overlay
        overlayElement.style.opacity = '0';
        setTimeout(() => {
          overlayElement.style.display = 'none';
        }, 300);
        
        // Re-enable body scroll
        document.body.style.overflow = '';
        
        // Change icon back to hamburger
        const icon = this.querySelector('i');
        if (icon) icon.className = 'fas fa-bars';
      } else {
        console.log('📖 Opening menu');
        
        // Apply mobile-specific dark styling when menu is opened
        // This overrides the isHomePage styles on mobile devices
        if (window.innerWidth <= 768) {
          mobileMenu.style.background = 'rgba(30, 30, 40, 0.95)';
          
          menuItems.forEach(item => {
            item.style.color = '#ffffff';
            item.style.borderBottom = '1px solid rgba(255, 255, 255, 0.1)';
            item.style.fontSize = '18px';
            item.style.padding = '18px 24px';
          });
          
          if (activeMenuItem) {
            activeMenuItem.style.background = 'rgba(255, 255, 255, 0.1)';
            activeMenuItem.style.borderLeft = '4px solid #E65100';
            activeMenuItem.style.color = '#ffffff';
          }
        }
        
        // Show menu and overlay
        mobileMenu.style.display = 'block';
        overlayElement.style.display = 'block';
        
        // Force repaint before adding opacity
        void overlayElement.offsetWidth;
        overlayElement.style.opacity = '1';
        
        // Prevent body scrolling
        document.body.style.overflow = 'hidden';
        
        // Change icon to X
        const icon = this.querySelector('i');
        if (icon) icon.className = 'fas fa-times';
      }
      
      // Force repaint to ensure changes are reflected
      void mobileMenu.offsetWidth;
      
      console.log(`✅ Menu is now ${isMenuVisible ? 'closed' : 'open'}`);
    });
    
    // Add click outside to close menu
    document.addEventListener('click', function(e) {
      if (mobileMenu.style.display !== 'none' && 
          !mobileMenu.contains(e.target) && 
          !newMenuBtn.contains(e.target)) {
        
        console.log('📕 Closing menu (clicked outside)');
        mobileMenu.style.display = 'none';
        
        // Hide overlay
        overlayElement.style.opacity = '0';
        setTimeout(() => {
          overlayElement.style.display = 'none';
        }, 300);
        
        // Re-enable body scroll
        document.body.style.overflow = '';
        
        // Reset icon
        const icon = newMenuBtn.querySelector('i');
        if (icon) icon.className = 'fas fa-bars';
      }
    });
    
    // Make sure overlay click also closes the menu
    overlayElement.addEventListener('click', function() {
      mobileMenu.style.display = 'none';
      
      // Hide overlay
      this.style.opacity = '0';
      setTimeout(() => {
        this.style.display = 'none';
      }, 300);
      
      // Re-enable body scroll
      document.body.style.overflow = '';
      
      // Reset icon
      const icon = newMenuBtn.querySelector('i');
      if (icon) icon.className = 'fas fa-bars';
    });
    
    // Force CSS to ensure visibility and add responsive styles
    const styleEl = document.createElement('style');
    styleEl.textContent = `
      /* Higher specificity selectors to override all other styles */
      body .mobile-menu {
        transition: transform 0.3s ease !important;
        transform: translateX(0) !important;
      }
      
      /* Force display when clicking hamburger menu */
      body .navbar .navbar-toggle:active + .mobile-menu,
      body .navbar .navbar-toggle:focus + .mobile-menu {
        display: block !important;
      }
      
      /* Ensure menu items are visible */
      body .mobile-menu a {
        opacity: 1 !important;
        transform: none !important;
        transition: background-color 0.2s ease, color 0.2s ease !important;
      }
      
      /* Hover effects for menu items */
      body .mobile-menu a:hover {
        color: #3f51b5 !important;
      }
      
      /* Mobile-specific enhancements - dark background for all pages on mobile */
      @media (max-width: 768px) {
        body .mobile-menu {
          top: 80px !important; /* Match your navbar height */
          max-height: calc(100vh - 80px) !important;
          background: rgba(30, 30, 40, 0.95) !important;
        }
        
        body .mobile-menu a {
          color: #ffffff !important;
          padding: 18px 24px !important; /* Larger touch targets on mobile */
          font-size: 18px !important;
          border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        
        body .mobile-menu a:hover {
          background-color: rgba(255, 255, 255, 0.15) !important;
        }
        
        body .mobile-menu a.active {
          background-color: rgba(255, 255, 255, 0.1) !important;
          border-left: 4px solid #E65100 !important;
          color: #ffffff !important;
        }
        
        #mobile-menu-overlay {
          opacity: 0.85 !important; /* Darker overlay on mobile */
        }
      }
      
      /* Animation for menu items */
      body .mobile-menu a:nth-child(1) { animation: fadeInRight 0.3s ease 0.1s both; }
      body .mobile-menu a:nth-child(2) { animation: fadeInRight 0.3s ease 0.2s both; }
      body .mobile-menu a:nth-child(3) { animation: fadeInRight 0.3s ease 0.3s both; }
      body .mobile-menu a:nth-child(4) { animation: fadeInRight 0.3s ease 0.4s both; }
      body .mobile-menu a:nth-child(5) { animation: fadeInRight 0.3s ease 0.5s both; }
      
      @keyframes fadeInRight {
        from {
          opacity: 0;
          transform: translateX(-20px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }
    `;
    document.head.appendChild(styleEl);
    
    console.log('✅ Ultimate hamburger menu fix successfully applied!');
  }
  
  // Run immediately and after DOM content loaded
  ultimateMenuFix();
  
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ultimateMenuFix);
  }
  
  // Also run after window load as a final attempt
  window.addEventListener('load', ultimateMenuFix);
  
  // Also run on window resize to handle orientation changes
  window.addEventListener('resize', function() {
    ultimateMenuFix();
  });
})();