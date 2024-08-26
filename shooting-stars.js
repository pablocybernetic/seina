const numShootingStars = 20; // Increase the number of stars for a more cinematic effect

function createShootingStars() {
    const container = document.querySelector('.shooting-star-background');
    container.innerHTML = ''; // Clear existing stars

    for (let i = 0; i < numShootingStars; i++) {
        const star = document.createElement('div');
        star.classList.add('shooting-star');
        const size = Math.random() * 3 + 2; // Random size
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;

        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.top = `${y}px`;
        star.style.left = `${x}px`;
        
        // Random animation properties
        const duration = Math.random() * 3 + 2; // Duration between 2 and 5 seconds
        const delay = Math.random() * 5; // Random delay

        star.style.animation = `shootingStar ${duration}s linear ${delay}s infinite`;
        
        container.appendChild(star);
    }
}

window.addEventListener('resize', createShootingStars);
createShootingStars();
