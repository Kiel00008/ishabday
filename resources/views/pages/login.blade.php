
@extends('layouts.app')

@section('content')
<section class="section" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="glass-card fade-in-up" style="text-align: center; max-width: 500px; width: 100%;">
        <h1 class="fade-in" style="font-family: 'Great Vibes', cursive; font-size: 3rem; margin-bottom: 0.5rem;">Welcome, My Love</h1>
        <p class="fade-in" style="animation-delay: 0.2s; margin-bottom: 2rem; font-size: 1.1rem;">Enter our special date to continue</p>
        
        <form id="login-form">
            <label style="display: block; margin-bottom: 1rem; font-weight: 600; font-size: 1.1rem;">Our Anniversary (MMDDYY)</label>
            
            <!-- 6 separate input boxes -->
            <div style="display: flex; gap: 10px; justify-content: center; margin-bottom: 1.5rem;">
                <input type="text" maxlength="1" class="pin-input" id="pin-1">
                <input type="text" maxlength="1" class="pin-input" id="pin-2">
                <input type="text" maxlength="1" class="pin-input" id="pin-3">
                <input type="text" maxlength="1" class="pin-input" id="pin-4">
                <input type="text" maxlength="1" class="pin-input" id="pin-5">
                <input type="text" maxlength="1" class="pin-input" id="pin-6">
            </div>
            
            <button type="submit" class="btn">Open Our Story 🥰</button>
        </form>
        
        <div id="hints" style="margin-top: 1.5rem; font-style: italic; font-size: 0.95rem; min-height: 2rem;"></div>
    </div>
</section>

<style>
.pin-input {
    width: 50px;
    height: 60px;
    text-align: center;
    font-size: 1.5rem;
    font-weight: 600;
    border: 2px solid rgba(255,255,255,0.3);
    border-radius: 12px;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    color: white;
    outline: none;
    transition: all 0.3s ease;
}

.pin-input:focus {
    border-color: rgba(255,105,180,0.8);
    box-shadow: 0 0 15px rgba(255,105,180,0.4);
    transform: translateY(-2px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('login-form');
    const hintsDiv = document.getElementById('hints');
    const pinInputs = [
        document.getElementById('pin-1'),
        document.getElementById('pin-2'),
        document.getElementById('pin-3'),
        document.getElementById('pin-4'),
        document.getElementById('pin-5'),
        document.getElementById('pin-6')
    ];
    let attempts = 0;
    const correctPin = '040222';
    
    // Auto focus next input
    pinInputs.forEach((input, index) => {
        input.addEventListener('input', function() {
            if (input.value.length === 1 && index < pinInputs.length - 1) {
                pinInputs[index + 1].focus();
            }
        });
        
        // Handle backspace
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && input.value === '' && index > 0) {
                pinInputs[index - 1].focus();
            }
        });
    });
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get entered PIN
        const enteredPin = pinInputs.map(input => input.value).join('');
        
        if (enteredPin === correctPin) {
            // Success! Redirect to question page
            window.location.href = '/question';
        } else {
            attempts++;
            
            // Clear inputs
            pinInputs.forEach(input => {
                input.value = '';
            });
            pinInputs[0].focus();
            
            // Shake animation
            pinInputs.forEach(input => {
                input.style.animation = 'none';
                input.offsetHeight;
                input.style.animation = 'shake 0.5s ease';
            });
            
            // Show hints
            if (attempts === 1) {
                hintsDiv.textContent = '💡 Hint: It\'s the day we became official!';
                hintsDiv.style.color = '#ffb3c1';
            } else if (attempts === 2) {
                hintsDiv.textContent = '💡💡 Hint: April 2, 2022';
                hintsDiv.style.color = '#ffb3c1';
            } else {
                hintsDiv.innerHTML = '💔 Come on baby, it\'s our special day! 040222';
                hintsDiv.style.color = '#ff8fab';
            }
        }
    });
});
</script>
@endsection
