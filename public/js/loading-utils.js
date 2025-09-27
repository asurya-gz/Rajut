// Loading utility functions
class LoadingManager {
    constructor() {
        this.loadingStates = new Map();
        this.overlayElement = null;
    }

    // Show loading overlay with custom text
    showOverlay(text = 'Memproses...') {
        this.hideOverlay(); // Remove any existing overlay
        
        const overlay = document.createElement('div');
        overlay.className = 'fixed inset-0 bg-black/20 backdrop-blur-sm z-50 flex items-center justify-center loading-overlay';
        overlay.innerHTML = `
            <div class="bg-white rounded-2xl p-8 shadow-2xl border border-pink-100 transform scale-95 animate-pulse">
                <div class="flex flex-col items-center space-y-4">
                    <div class="relative">
                        <div class="w-12 h-12 text-pink-500">
                            <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <div class="absolute inset-0 w-12 h-12 bg-pink-100 rounded-full animate-ping opacity-20"></div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-700 font-medium">${text}</p>
                        <div class="flex space-x-1 mt-2 justify-center">
                            <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                            <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                            <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(overlay);
        this.overlayElement = overlay;
        
        // Add scale animation
        setTimeout(() => {
            const content = overlay.querySelector('div > div');
            if (content) {
                content.classList.remove('scale-95');
                content.classList.add('scale-100', 'transition-transform', 'duration-300');
            }
        }, 50);
    }

    // Hide loading overlay
    hideOverlay() {
        if (this.overlayElement) {
            const content = this.overlayElement.querySelector('div > div');
            if (content) {
                content.classList.add('scale-95', 'transition-transform', 'duration-200');
            }
            
            setTimeout(() => {
                if (this.overlayElement && this.overlayElement.parentNode) {
                    this.overlayElement.parentNode.removeChild(this.overlayElement);
                }
                this.overlayElement = null;
            }, 200);
        }
    }

    // Show loading state for a specific button
    showButtonLoading(button, text = null) {
        if (!button) return;
        
        const originalContent = button.innerHTML;
        const originalDisabled = button.disabled;
        
        this.loadingStates.set(button, { originalContent, originalDisabled });
        
        button.disabled = true;
        button.innerHTML = `
            <div class="flex items-center justify-center space-x-2">
                <div class="w-4 h-4 text-current">
                    <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                ${text ? `<span>${text}</span>` : ''}
            </div>
        `;
    }

    // Hide loading state for a specific button
    hideButtonLoading(button) {
        if (!button) return;
        
        const state = this.loadingStates.get(button);
        if (state) {
            button.innerHTML = state.originalContent;
            button.disabled = state.originalDisabled;
            this.loadingStates.delete(button);
        }
    }

    // Add loading to form submission
    addFormLoading(form, loadingText = 'Memproses...') {
        if (!form) return;
        
        form.addEventListener('submit', (e) => {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                this.showButtonLoading(submitButton, loadingText);
            }
            
            // Also show overlay for certain forms
            if (form.classList.contains('loading-overlay-form')) {
                this.showOverlay(loadingText);
            }
        });
    }
}

// Create global instance
window.loadingManager = new LoadingManager();

// Auto-setup when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Auto-setup forms with data-loading attribute
    document.querySelectorAll('form[data-loading]').forEach(form => {
        const loadingText = form.getAttribute('data-loading') || 'Memproses...';
        window.loadingManager.addFormLoading(form, loadingText);
    });
    
    // Auto-setup buttons with data-loading attribute
    document.querySelectorAll('button[data-loading]').forEach(button => {
        const loadingText = button.getAttribute('data-loading') || null;
        
        button.addEventListener('click', function() {
            window.loadingManager.showButtonLoading(this, loadingText);
            
            // Auto-hide after 5 seconds as fallback
            setTimeout(() => {
                window.loadingManager.hideButtonLoading(this);
            }, 5000);
        });
    });
    
    // Auto-setup links with data-loading attribute
    document.querySelectorAll('a[data-loading]').forEach(link => {
        const loadingText = link.getAttribute('data-loading') || 'Memuat...';
        
        link.addEventListener('click', function() {
            window.loadingManager.showOverlay(loadingText);
        });
    });
    
    // Handle logout forms specifically
    document.querySelectorAll('form[action*="logout"]').forEach(form => {
        window.loadingManager.addFormLoading(form, 'Keluar...');
    });
    
    // Enhanced search functionality
    document.querySelectorAll('form[action*="products"] input[name="search"]').forEach(searchInput => {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const form = this.closest('form');
                if (form) {
                    window.loadingManager.showOverlay('Mencari produk...');
                    form.submit();
                }
            }
        });
    });
});

// Utility functions for easy access
window.showLoading = (text) => window.loadingManager.showOverlay(text);
window.hideLoading = () => window.loadingManager.hideOverlay();
window.showButtonLoading = (button, text) => window.loadingManager.showButtonLoading(button, text);
window.hideButtonLoading = (button) => window.loadingManager.hideButtonLoading(button);