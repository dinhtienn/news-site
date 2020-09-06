<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->getLocale();
        View::share(
            'locale_image_name',
            App::getLocale() === 'en' ? 'us.jpg' : 'vi.png'
        );
    }

    public function getLocale()
    {
        if (!empty(Cookie::get('news-site-locale'))) {
            App::setLocale(Cookie::get('news-site-locale'));
        }
    }
}
