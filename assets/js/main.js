// Efek hover untuk card
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-6px) scale(1.01)'; // Updated transform
        card.style.boxShadow = '0 14px 28px rgba(0, 0, 0, 0.25)'; // Updated shadow
        card.style.backgroundColor = 'rgba(255, 255, 255, 0.15)'; // Slightly brighter background
    });
    
    card.addEventListener('mouseleave', () => {
        card.style.transform = '';
        card.style.boxShadow = '0 8px 20px rgba(0, 0, 0, 0.3)';
        card.style.backgroundColor = ''; // Reset background color
    });
});

// Animasi tabel
document.querySelectorAll('.data-table tbody tr').forEach(row => {
    row.addEventListener('mouseenter', () => {
        row.style.backgroundColor = 'rgba(16, 255, 243, 0.1)';
    });
    
    row.addEventListener('mouseleave', () => {
        row.style.backgroundColor = '';
    });
});

// Toast notification
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast-notification ${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 100);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Cek parameter URL untuk notifikasi
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('status') && urlParams.has('message')) {
    showToast(decodeURIComponent(urlParams.get('message')), urlParams.get('status'));
}

// Smooth scroll for navigation links (optional, but good for UX)
document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Simple image gallery/modal for images in index.php (example)
document.querySelectorAll('.taman img').forEach(img => {
    img.style.cursor = 'pointer'; // Indicate it's clickable
    img.addEventListener('click', function() {
        const modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.backgroundColor = 'rgba(0,0,0,0.8)';
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';
        modal.style.zIndex = '1000';
        modal.style.cursor = 'pointer';

        const modalImg = document.createElement('img');
        modalImg.src = this.src;
        modalImg.style.maxWidth = '90%';
        modalImg.style.maxHeight = '90%';
        modalImg.style.borderRadius = '8px';

        modal.appendChild(modalImg);
        document.body.appendChild(modal);

        modal.addEventListener('click', () => {
            modal.remove();
        });
    });
});

// Smooth gradient transition on scroll for long pages
function adjustGradientOnScroll() {
    const scrollPosition = window.scrollY;
    const docHeight = document.documentElement.scrollHeight;
    const windowHeight = window.innerHeight;

    // Only adjust if the page is scrollable
    if (docHeight > windowHeight) {
        // Calculate scroll progress (0 to 1)
        const scrollProgress = scrollPosition / (docHeight - windowHeight);

        // Define gradient colors
        const color1 = [4, 110, 249]; // #046ef9ff
        const color2 = [39, 214, 223]; // #27d6dfff

        // Interpolate colors based on scroll progress
        // This creates a dynamic gradient that changes as you scroll
        // For simplicity, let's just shift the gradient angle or opacity slightly
        // A more complex interpolation would involve calculating new RGB values
        
        // Example: Shift hue or adjust opacity based on scroll
        // This is a simplified approach to prevent "separation"
        const startOpacity = 1 - (scrollProgress * 0.3); // Fade out start color slightly
        const endOpacity = 1 - (scrollProgress * 0.1);   // Fade out end color less

        document.body.style.background = `linear-gradient(135deg, 
            rgba(${color1[0]}, ${color1[1]}, ${color1[2]}, ${startOpacity}), 
            rgba(${color2[0]}, ${color2[1]}, ${color2[2]}, ${endOpacity}))`;
    } else {
        // If not scrollable, ensure default gradient is applied
        document.body.style.background = `linear-gradient(135deg, #046ef9ff, #27d6dfff)`;
    }
}

// Attach the function to scroll event
window.addEventListener('scroll', adjustGradientOnScroll);
// Also call it once on load to set initial state
window.addEventListener('load', adjustGradientOnScroll);


// --- NAVBAR INTERACTIVITY ---
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');

    // Change navbar background on scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) { // Change background after scrolling 50px
            navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.7)'; // Darker, more opaque
            navbar.style.boxShadow = '0 6px 20px rgba(0, 0, 0, 0.3)';
        } else {
            navbar.style.backgroundColor = 'transparent'; // Transparent when at top
            navbar.style.boxShadow = 'none';
        }
    });

    // Add active class to current page link (already handled by PHP, but good for JS consistency)
    // const currentPath = window.location.pathname.split('/').pop();
    // const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    // navLinks.forEach(link => {
    //     if (link.getAttribute('href') === currentPath) {
    //         link.classList.add('active');
    //     }
    // });
});