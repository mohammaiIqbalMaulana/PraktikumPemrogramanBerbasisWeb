document.addEventListener('DOMContentLoaded', function() {
    // Validasi form register
    const registerForm = document.querySelector('form[action*="register"]');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const password1 = document.getElementById('password1').value;
            const password2 = document.getElementById('password2').value;
            
            if (password1 !== password2) {
                e.preventDefault();
                alert('Konfirmasi password tidak sesuai!');
                return false;
            }
            
            if (password1.length < 8) {
                e.preventDefault();
                alert('Password harus minimal 8 karakter!');
                return false;
            }
        });
    }

    // Efek hover untuk card
    const cards = document.querySelectorAll('.card'); // Changed from .auth-card to .card for consistency
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 12px 25px rgba(0, 0, 0, 0.4)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
            card.style.boxShadow = '0 8px 20px rgba(0, 0, 0, 0.3)';
        });
    });
});