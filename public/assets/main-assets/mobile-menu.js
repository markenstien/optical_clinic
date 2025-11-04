// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    // Create mobile menu toggle button
    const mobileToggle = document.createElement('button');
    mobileToggle.className = 'mobile-menu-toggle';
    mobileToggle.innerHTML = `
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    `;
    mobileToggle.setAttribute('aria-label', 'Toggle mobile menu');
    
    // Create mobile overlay
    const mobileOverlay = document.createElement('div');
    mobileOverlay.className = 'mobile-overlay';
    
    // Insert elements into DOM
    document.body.insertBefore(mobileToggle, document.body.firstChild);
    document.body.insertBefore(mobileOverlay, document.body.firstChild);
    
    const sidebar = document.querySelector('.sidebar');
    
    // Toggle mobile menu
    function toggleMobileMenu() {
        const isOpen = sidebar.classList.contains('mobile-open');
        
        if (isOpen) {
            sidebar.classList.remove('mobile-open');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        } else {
            sidebar.classList.add('mobile-open');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    // Close mobile menu
    function closeMobileMenu() {
        sidebar.classList.remove('mobile-open');
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // Event listeners
    mobileToggle.addEventListener('click', toggleMobileMenu);
    mobileOverlay.addEventListener('click', closeMobileMenu);
    
    // Close menu when clicking nav items on mobile
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                closeMobileMenu();
            }
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            closeMobileMenu();
        }
    });
    
    // Handle dropdown toggles
    const dropdownToggles = document.querySelectorAll('[data-toggle]');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-toggle');
            const dropdown = document.getElementById(targetId);
            
            if (dropdown) {
                const isHidden = dropdown.hasAttribute('hidden');
                
                // Close all other dropdowns
                document.querySelectorAll('.dropdown-panel').forEach(panel => {
                    panel.setAttribute('hidden', '');
                });
                
                // Toggle current dropdown
                if (isHidden) {
                    dropdown.removeAttribute('hidden');
                } else {
                    dropdown.setAttribute('hidden', '');
                }
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('[data-toggle]') && !e.target.closest('.dropdown-panel')) {
            document.querySelectorAll('.dropdown-panel').forEach(panel => {
                panel.setAttribute('hidden', '');
            });
        }
    });
    
    // Improve touch interactions
    if ('ontouchstart' in window) {
        document.body.classList.add('touch-device');
        
        // Add touch feedback to buttons
        const buttons = document.querySelectorAll('.btn, .nav-item, .header-icon');
        buttons.forEach(button => {
            button.addEventListener('touchstart', function() {
                this.style.opacity = '0.7';
            });
            
            button.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.opacity = '';
                }, 150);
            });
        });
    }
});
