<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday, My Love!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>
    <!-- Floating Hearts Container -->
    <div id="floating-hearts"></div>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="nav-logo">💖 Our Love Story</a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item"><a href="{{ route('story') }}" class="nav-link {{ request()->routeIs('story') ? 'active' : '' }}">Our Story</a></li>
                <li class="nav-item"><a href="{{ route('memories') }}" class="nav-link {{ request()->routeIs('memories') ? 'active' : '' }}">Memories</a></li>
                <li class="nav-item"><a href="{{ route('surprise') }}" class="nav-link {{ request()->routeIs('surprise') ? 'active' : '' }}">Surprise</a></li>
            </ul>
            <button id="music-toggle" class="music-btn">🎵</button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>system made by kiel zareno</p>
    </footer>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-img" src="" alt="">
    </div>

    <!-- Background Music -->
    <audio id="bg-music" loop>
        <source src="{{ asset('music/DARREN - \'Iyo\' Official Lyric Video (320).mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        var shouldAutoPlayMusic = {{ (session()->has('autoplay_music') && !request()->routeIs('surprise')) ? 'true' : 'false' }};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/countdown.js') }}"></script>
    <script src="{{ asset('js/gallery.js') }}"></script>
    <script src="{{ asset('js/music.js') }}"></script>
</body>
</html>
