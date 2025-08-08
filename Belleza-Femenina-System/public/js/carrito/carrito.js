document.addEventListener("DOMContentLoaded", function() {
    // Animación de las imágenes cuando se cargan
    const images = document.querySelectorAll('.cart-item-img');
    images.forEach(img => {
        img.addEventListener('load', function() {
            this.classList.remove('img-loading');
            gsap.from(this, {opacity: 0, scale: 0.9, duration: 0.5});
        });
        
        // Simular carga para el ejemplo (en producción esto no sería necesario)
        setTimeout(() => {
            img.classList.remove('img-loading');
        }, Math.random() * 1000 + 500);
    });
    
    // Efecto hover en los items del carrito
    const cartItems = document.querySelectorAll('.cart-item');
    cartItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            gsap.to(this, {y: -5, duration: 0.3});
        });
        
        item.addEventListener('mouseleave', function() {
            gsap.to(this, {y: 0, duration: 0.3});
        });
    });
    
    // Contador de cantidad
    document.querySelectorAll('.input-group button').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            let value = parseInt(input.value);
            
            if (this.textContent === '+' && value < 10) {
                input.value = value + 1;
            } else if (this.textContent === '-' && value > 1) {
                input.value = value - 1;
            }
            
            // Pequeña animación al cambiar la cantidad
            gsap.to(input, {
                scale: 1.1,
                duration: 0.1,
                yoyo: true,
                repeat: 1
            });
        });
    });
});