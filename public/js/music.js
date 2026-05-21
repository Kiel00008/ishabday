
document.addEventListener('DOMContentLoaded', function() {
    const musicToggle = document.getElementById('music-toggle');
    const bgMusic = document.getElementById('bg-music');
    let isPlaying = false;
    
    // Restore music state from localStorage
    const savedTime = localStorage.getItem('bgMusicTime');
    const savedIsPlaying = localStorage.getItem('bgMusicPlaying') === 'true';
    
    if (savedTime && !isNaN(parseFloat(savedTime))) {
        bgMusic.currentTime = parseFloat(savedTime);
    }
    
    // Auto play music if shouldAutoPlayMusic is true or was playing before
    if ((typeof shouldAutoPlayMusic !== 'undefined' && shouldAutoPlayMusic) || savedIsPlaying) {
        // Try to play
        const attemptPlay = () => {
            bgMusic.play().then(() => {
                isPlaying = true;
                musicToggle.textContent = '🔊';
                localStorage.setItem('bgMusicPlaying', 'true');
            }).catch(e => {
                console.log('Audio autoplay failed:', e);
                isPlaying = false;
                musicToggle.textContent = '🎵';
                localStorage.setItem('bgMusicPlaying', 'false');
            });
        };
        
        // Try immediately, and also try on user interaction (for autoplay policies)
        attemptPlay();
        
        // Also try on first user interaction
        const userInteract = () => {
            if (!isPlaying) {
                attemptPlay();
            }
            document.removeEventListener('click', userInteract);
            document.removeEventListener('touchstart', userInteract);
        };
        document.addEventListener('click', userInteract);
        document.addEventListener('touchstart', userInteract);
    }
    
    // Save current time and state before page unloads
    window.addEventListener('beforeunload', () => {
        localStorage.setItem('bgMusicTime', bgMusic.currentTime.toString());
        localStorage.setItem('bgMusicPlaying', isPlaying ? 'true' : 'false');
    });
    
    // Save current time every second
    setInterval(() => {
        if (bgMusic.currentTime) {
            localStorage.setItem('bgMusicTime', bgMusic.currentTime.toString());
        }
    }, 500);
    
    // Save state when pausing
    bgMusic.addEventListener('pause', () => {
        localStorage.setItem('bgMusicPlaying', 'false');
        musicToggle.textContent = '🎵';
        isPlaying = false;
    });
    
    // Save state when playing
    bgMusic.addEventListener('play', () => {
        localStorage.setItem('bgMusicPlaying', 'true');
        musicToggle.textContent = '🔊';
        isPlaying = true;
    });
    
    musicToggle.addEventListener('click', function() {
        if (isPlaying) {
            bgMusic.pause();
        } else {
            bgMusic.play().catch(e => console.log('Audio play failed:', e));
        }
    });
});
