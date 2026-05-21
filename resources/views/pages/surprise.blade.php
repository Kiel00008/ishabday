
@extends('layouts.app')

@section('content')
<section class="section">
    <h2 class="section-title fade-in-up">Your Special Surprise! 🎁</h2>
    
    <!-- Locked State -->
    <div id="locked-section" style="text-align: center; padding: 3rem 0;">
        <div style="font-size: 8rem; margin-bottom: 1rem;">🔒</div>
        <h3 style="font-family: 'Great Vibes', cursive; font-size: 2.5rem; margin-bottom: 1rem;">Coming Soon...</h3>
        <p style="font-size: 1.2rem; margin-bottom: 2rem;">Wait for your birthday! 💕</p>
        
        <!-- Countdown to unlock -->
        <div class="countdown" style="justify-content: center; display: flex; gap: 1.5rem; flex-wrap: wrap;">
            <div class="countdown-item">
                <span class="countdown-number" id="unlock-days">0</span>
                <span class="countdown-label">Days</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="unlock-hours">0</span>
                <span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="unlock-minutes">0</span>
                <span class="countdown-label">Minutes</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="unlock-seconds">0</span>
                <span class="countdown-label">Seconds</span>
            </div>
        </div>
    </div>
    
    <!-- Unlocked State -->
    <div id="unlocked-section" style="display: none;">
        <div class="gift-box fade-in-up" style="animation-delay: 0.2s;" id="gift-section">
            <div class="gift-container" id="gift-container">
                <div class="gift-bow">🎀</div>
                <div class="gift-lid">
                    <div class="gift-ribbon-vertical"></div>
                    <div class="gift-ribbon-horizontal"></div>
                </div>
                <div class="gift-body">
                    <div class="gift-ribbon-vertical"></div>
                    <div class="gift-ribbon-horizontal"></div>
                </div>
            </div>
            <p style="margin-top: 1rem; font-style: italic;">Click the gift to open! ✨</p>
        </div>
        
        <!-- Surprise Photos Section (Clickable) -->
        <div id="photo-section" style="display: none; margin-top: 3rem; text-align: center;">
            <h3 class="section-title" style="font-size: 2.2rem; margin-bottom: 1rem;">Our Beautiful Moments 💕</h3>
            <p style="margin-bottom: 2rem; font-style: italic;">Click the photo to see the next one! 📸</p>
            <div id="photo-container" style="position: relative; height: 500px; max-width: 400px; margin: 0 auto; cursor: pointer;">
                @foreach ($images as $index => $image)
                    <div 
                        class="clickable-photo" 
                        id="photo-{{ $index }}" 
                        data-index="{{ $index }}"
                        style="
                            position: absolute;
                            left: 0;
                            top: 0;
                            transform: none;
                            opacity: {{ $index == 0 ? 1 : 0 }};
                            z-index: {{ count($images) - $index }};
                            width: 100%;
                            aspect-ratio: 1;
                            display: {{ $index == 0 ? 'block' : 'none' }};
                        "
                    >
                        <img src="{{ asset($image) }}" alt="Memory {{ $index + 1 }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Final Birthday Message -->
        <div id="final-section" style="display: none; margin-top: 3rem;">
            <div class="glass-card">
                <h3 class="section-title" style="font-size: 2.5rem;">🎉 Happy Birthday, My Love! 🎉</h3>
                <p style="text-align: center; font-size: 1.1rem; line-height: 2;">
                    My dearest Isha,<br><br>
                    I hope you've enjoyed all the little surprises I've prepared for you today! 💖<br><br>
                    Every single memory we've made together is a treasure that I hold close to my heart. From our first meeting to this very moment, you've filled my life with so much love, happiness, and meaning.<br><br>
                    As you celebrate another year of your beautiful life, I want you to know how grateful I am to have you by my side. You are my everything - my best friend, my partner, my love, and my whole world.<br><br>
                    I can't wait to create countless more memories with you, to celebrate many more birthdays together, and to love you more each and every day.<br><br>
                    Happy Birthday, my love! May all your dreams come true and may this year be filled with endless joy, laughter, and love!<br><br>
                    <strong>Forever and always, yours ❤️</strong>
                </p>
                
                <!-- Open Gift Button -->
                <div style="text-align: center; margin-top: 2rem;">
                    <button id="open-bouquet-btn" class="btn">💐 Open My Gift For You 💐</button>
                </div>
            </div>
        </div>
        
        <!-- Bouquet Section -->
        <div id="bouquet-section" style="display: none; margin-top: 3rem; text-align: center;">
            <h3 class="section-title" style="font-size: 2.5rem;">For My Love 🌹</h3>
            <div style="margin-top: 2rem;">
                <img src="{{ asset('images/Digital.png') }}" alt="Bouquet of Roses" style="max-width: 500px; width: 100%; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
            </div>
            <p style="margin-top: 2rem; font-size: 1.3rem; font-family: 'Great Vibes', cursive;">
                Flowers baby HAHAHA, I love you baby.💕
            </p>
        </div>
    </div>
    
    <!-- Tahan Music -->
    <audio id="tahan-music">
        <source src="{{ asset('music/Tahan.mp3') }}" type="audio/mpeg">
    </audio>
</section>

<script>
function getPHTime() {
    const now = new Date();
    const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
    return new Date(utc + (8 * 3600000));
}

function updateUnlockCountdown() {
    const now = getPHTime();
    const unlockDate = new Date('2026-05-23T00:00:00+08:00');
    const diff = unlockDate - now;
    
    if (diff <= 0) {
        document.getElementById('locked-section').style.display = 'none';
        document.getElementById('unlocked-section').style.display = 'block';
        return;
    }
    
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);
    
    document.getElementById('unlock-days').textContent = days;
    document.getElementById('unlock-hours').textContent = hours;
    document.getElementById('unlock-minutes').textContent = minutes;
    document.getElementById('unlock-seconds').textContent = seconds;
}

document.addEventListener('DOMContentLoaded', function() {
    // Check if unlocked first
    const now = getPHTime();
    const unlockDate = new Date('2026-05-23T00:00:00+08:00');
    
    if (now >= unlockDate) {
        document.getElementById('locked-section').style.display = 'none';
        document.getElementById('unlocked-section').style.display = 'block';
    } else {
        updateUnlockCountdown();
        setInterval(updateUnlockCountdown, 1000);
    }
    
    const giftContainer = document.getElementById('gift-container');
    const giftSection = document.getElementById('gift-section');
    const photoSection = document.getElementById('photo-section');
    const finalSection = document.getElementById('final-section');
    const bouquetSection = document.getElementById('bouquet-section');
    const tahanMusic = document.getElementById('tahan-music');
    const bgMusic = document.getElementById('bg-music');
    const musicToggle = document.getElementById('music-toggle');
    const photoContainer = document.getElementById('photo-container');
    const openBouquetBtn = document.getElementById('open-bouquet-btn');
    
    let giftOpened = false;
    let currentPhotoIndex = 0;
    const totalPhotos = {{ count($images) }};
    
    // Pause background music when surprise page loads
    if (bgMusic) {
        bgMusic.pause();
        localStorage.setItem('bgMusicPlaying', 'false');
        musicToggle.textContent = '🎵';
    }
    
    if (giftContainer) {
        giftContainer.addEventListener('click', function() {
            if (!giftOpened) {
                giftOpened = true;
                giftContainer.classList.add('open');
                
                // Play Tahan
                tahanMusic.play().catch(e => console.log('Tahan music play failed:', e));
                
                // Confetti!
                createConfetti();
                
                // Show photo section
                setTimeout(() => {
                    giftSection.style.display = 'none';
                    photoSection.style.display = 'block';
                }, 800);
            }
        });
    }
    
    // Click photo to go to next
    if (photoContainer) {
        photoContainer.addEventListener('click', function() {
            if (currentPhotoIndex < totalPhotos - 1) {
                // Hide current photo
                const currentPhoto = document.getElementById('photo-' + currentPhotoIndex);
                currentPhoto.style.opacity = '0';
                setTimeout(() => {
                    currentPhoto.style.display = 'none';
                }, 300);
                
                currentPhotoIndex++;
                
                // Show next photo
                const nextPhoto = document.getElementById('photo-' + currentPhotoIndex);
                nextPhoto.style.display = 'block';
                setTimeout(() => {
                    nextPhoto.style.opacity = '1';
                    nextPhoto.style.transition = 'opacity 0.3s ease-out';
                }, 100);
            } else {
                // No more photos - show final message
                photoSection.style.display = 'none';
                finalSection.style.display = 'block';
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: 'smooth'
                });
            }
        });
    }
    
    // Open bouquet button
    if (openBouquetBtn) {
        openBouquetBtn.addEventListener('click', function() {
            finalSection.style.display = 'none';
            bouquetSection.style.display = 'block';
            createConfetti();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
</script>
@endsection
