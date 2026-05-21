
@extends('layouts.app')

@section('content')
<section class="section">
    <h2 class="section-title fade-in-up">Our Beautiful Memories</h2>
    
    <!-- Photo Gallery Section -->
    <div class="glass-card fade-in-up" style="margin-bottom: 3rem;">
        <h3 class="section-title" style="font-size: 2.2rem; margin-bottom: 2rem;">📸 Photo Memories</h3>
        <div class="gallery-grid">
            @foreach ($images as $index => $image)
                <div class="gallery-item fade-in-up" style="animation-delay: {{ $index * 0.05 }}s;">
                    <img src="{{ asset($image) }}" alt="Memory {{ $index + 1 }}">
                    <div class="gallery-overlay">
                        <span>❤️</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Video Gallery Section -->
    <div class="glass-card fade-in-up" style="animation-delay: 0.2s;">
        <h3 class="section-title" style="font-size: 2.2rem; margin-bottom: 2rem;">🎥 Video Memories</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
            @foreach ($videos as $index => $video)
                <div class="fade-in-up" style="animation-delay: {{ ($index + count($images)) * 0.05 }}s; aspect-ratio: 16/9;">
                    <video 
                        controls 
                        style="width: 100%; height: 100%; border-radius: 15px; background: rgba(0,0,0,0.2); object-fit: cover;"
                        preload="metadata"
                    >
                        <source src="{{ asset($video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
