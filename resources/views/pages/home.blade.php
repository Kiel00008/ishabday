
@extends('layouts.app')

@section('content')
<section class="hero">
    <h1 class="fade-in-up">Happy Birthday, Baby!</h1>
    <h2 class="fade-in-up" style="animation-delay: 0.2s;">Isha</h2>
    <p class="fade-in-up" style="animation-delay: 0.4s;">
        On this special day, I want you to know how much you mean to me. Every moment with you is a treasure, and I'm so grateful to have you in my life.
    </p>
    
    <div class="countdown fade-in-up" style="animation-delay: 0.6s;">
        <div class="countdown-item">
            <span class="countdown-number" id="days">0</span>
            <span class="countdown-label">Days</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-number" id="hours">0</span>
            <span class="countdown-label">Hours</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-number" id="minutes">0</span>
            <span class="countdown-label">Minutes</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-number" id="seconds">0</span>
            <span class="countdown-label">Seconds</span>
        </div>
    </div>
    
    <div class="fade-in-up" style="animation-delay: 0.8s;">
        <a href="{{ route('story') }}" class="btn">Our Story 📖</a>
    </div>
</section>

<section class="section">
    <div class="glass-card scale-pulse">
        <h3 class="section-title">Message From My Heart</h3>
        <p style="text-align: center; font-size: 1.1rem; line-height: 2;">
            My dearest Isha,<br><br>

Happy Birthday, baby ko. 🎂❤️<br><br>

Nakakatuwa isipin na nagsimula lang tayo sa isang game noong 2020. Hindi natin alam noon na yung simpleng pagtagpo natin doon ay magiging simula pala ng napakagandang storya ng buhay natin.<br><br>

Tapos noong 2021, parang binigyan tayo ulit ng tadhana ng chance na magkita at mag-usap ulit. Doon tayo mas naging close. Humaba nang humaba yung mga usapan natin hanggang sa ikaw na yung naging pinaka-hinihintay kong kausap araw-araw.<br><br>

Hindi ko makakalimutan yung April 2, 2022 — yung unang beses na nagkita tayo nang personal. Sobrang kaba ko noon, pero nung nakita na kita, parang biglang naging okay lahat. Ang gaan lang sa pakiramdam kapag kasama kita.<br><br>

At noong May 11, 2022, sinabi ko na finally yung totoong nararamdaman ko para sayo. Isa yun sa pinaka-kinakabahan akong moment sa buhay ko, pero isa rin sa pinaka-worth it, kasi ikaw yung pinakamagandang bagay na nangyari sakin.<br><br>

Noong March 2023, nung sinagot mo ako, doon ko naramdaman yung totoong saya. Simula noon, mas naging masaya at makulay yung buhay ko dahil sayo. Ikaw yung comfort ko, best friend ko, pahinga ko, at yung taong gusto kong makasama palagi.<br><br>

Ngayong birthday mo, gusto ko lang sabihin kung gaano ako ka-thankful na nandiyan ka sa buhay ko. Thank you sa love, care, effort, at sa pananatili mo kahit sa mga mahirap na panahon. Lagi’t lagi kitang pipiliin.<br><br>

Sana maging masaya ang birthday mo at matupad lahat ng gusto ng puso mo, dahil deserve mo lahat ng magagandang bagay sa mundo.<br><br>

Happy Birthday ulit, baby ko. I love you so much more than words can explain. 💖<br><br>

Forever yours,<br>
Your baby ❤️
        </p>
    </div>
</section>
@endsection
