
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Very Important Question</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #ff6b9d, #c44569, #a855f7, #6366f1);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes floatHeart {
            0% {
                transform: translateY(100vh) rotate(0deg) scale(1);
                opacity: 1;
            }
            50% { opacity: 0.8; }
            100% {
                transform: translateY(-100px) rotate(360deg) scale(0.5);
                opacity: 0;
            }
        }

        .floating-heart {
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 9999;
            animation: floatHeart linear forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-20px); }
            60% { transform: translateY(-10px); }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .bounce {
            animation: bounce 2s infinite;
        }

        .question-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 3rem;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .question-title {
            font-family: 'Great Vibes', cursive;
            font-size: 3.5rem;
            margin-bottom: 2rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .buttons-container {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-yes {
            background: linear-gradient(145deg, #4ade80, #22c55e);
            color: #fff;
        }

        .btn-no {
            background: linear-gradient(145deg, #f87171, #ef4444);
            color: #fff;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .message {
            margin-top: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.8;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            display: none;
        }

        .message.active {
            display: block;
            animation: fadeInUp 0.5s ease-out forwards;
        }

        #floating-hearts {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        @media (max-width: 480px) {
            .question-container {
                padding: 2rem 1.5rem;
            }

            .question-title {
                font-size: 2.5rem;
            }

            .btn {
                font-size: 1rem;
                padding: 0.8rem 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div id="floating-hearts"></div>
    <div class="question-container fade-in-up">
        <h1 class="question-title bounce">Do you love me?</h1>
        
        <div class="buttons-container" id="buttons-container">
            <button id="btn-yes" class="btn btn-yes">Yes ❤️</button>
            <button id="btn-no" class="btn btn-no">No 😢</button>
        </div>
        
        <div id="message" class="message"></div>
    </div>

    <script>
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
        
        document.addEventListener('DOMContentLoaded', function() {
            createFloatingHearts();
            
            const btnYes = document.getElementById('btn-yes');
            const btnNo = document.getElementById('btn-no');
            const message = document.getElementById('message');
            let noClicks = 0;
            
            btnYes.addEventListener('click', function() {
                window.location.href = '{{ route('home') }}';
            });
            
            btnNo.addEventListener('click', function() {
                noClicks++;
                
                // Gradually increase Yes button size
                const yesScale = 1 + (noClicks * 0.15);
                btnYes.style.transform = `scale(${yesScale})`;
                
                // Gradually decrease No button size
                const noScale = Math.max(0.3, 1 - (noClicks * 0.1));
                btnNo.style.transform = `scale(${noScale})`;
                
                message.innerHTML = 'baby naman yung totoo love moko dibaa, yes na kasi 🥺💖';
                message.classList.add('active');
            });
        });
    </script>
</body>
</html>
