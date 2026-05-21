<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BirthdayController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function question(Request $request)
    {
        Session::put('autoplay_music', true);
        return view('pages.question');
    }

    public function home(Request $request)
    {
        Session::put('autoplay_music', true);
        return view('pages.home');
    }

    public function story()
    {
        return view('pages.story');
    }

    public function memories()
    {
        $imageFiles = File::files(public_path('images'));
        $images = [];
        foreach ($imageFiles as $file) {
            if ($file->getFilename() !== 'Digital.png') {
                $images[] = 'images/' . $file->getFilename();
            }
        }

        $videoFiles = File::files(public_path('videos'));
        $videos = [];
        foreach ($videoFiles as $file) {
            $videos[] = 'videos/' . $file->getFilename();
        }

        return view('pages.memories', compact('images', 'videos'));
    }

    public function surprise()
    {
        $imageFiles = File::files(public_path('images'));
        $images = [];
        foreach ($imageFiles as $file) {
            if ($file->getFilename() !== 'Digital.png') {
                $images[] = 'images/' . $file->getFilename();
            }
        }

        $videoFiles = File::files(public_path('videos'));
        $videos = [];
        foreach ($videoFiles as $file) {
            $videos[] = 'videos/' . $file->getFilename();
        }

        return view('pages.surprise', compact('images', 'videos'));
    }
}
