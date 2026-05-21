
document.addEventListener('DOMContentLoaded', function() {
    createFloatingHearts();
});

function createFloatingHearts() {
    const container = document.getElementById('floating-hearts');
    const heartEmojis = ['❤️', '💕', '💖', '💗', '💓', '💝', '💞', '💘'];
    
    setInterval(() => {
        const heart = document.createElement('div');
        heart.className = 'floating-heart';
        heart.textContent = heartEmojis[Math.floor(Math.random() * heartEmojis.length)];
        heart.style.left = Math.random() * 100 + 'vw';
        heart.style.fontSize = (Math.random() * 20 + 15) + 'px';
        heart.style.animationDuration = (Math.random() * 5 + 5) + 's';
        container.appendChild(heart);
        
        setTimeout(() => {
            heart.remove();
        }, 10000);
    }, 500);
}

function createConfetti() {
    const colors = ['#ff6b9d', '#c44569', '#a855f7', '#6366f1', '#ffeef8', '#ffd700'];
    
    for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
        confetti.style.animationDelay = Math.random() * 2 + 's';
        document.body.appendChild(confetti);
        
        setTimeout(() => {
            confetti.remove();
        }, 5000);
    }
}

function createFirework(x, y) {
    const colors = ['#ff6b9d', '#c44569', '#a855f7', '#6366f1', '#ffd700', '#00ff88'];
    const firework = document.createElement('div');
    firework.className = 'firework';
    firework.style.left = x + 'px';
    firework.style.top = y + 'px';
    
    for (let i = 0; i < 20; i++) {
        const particle = document.createElement('div');
        particle.className = 'firework-particle';
        particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        const angle = (i / 20) * Math.PI * 2;
        const distance = Math.random() * 100 + 50;
        particle.style.transform = `translate(${Math.cos(angle) * distance}px, ${Math.sin(angle) * distance}px)`;
        firework.appendChild(particle);
    }
    
    document.body.appendChild(firework);
    
    setTimeout(() => {
        firework.remove();
    }, 1500);
}
