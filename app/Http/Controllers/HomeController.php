<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function index()
    {
        $testimonials = Testimonial::active()->ordered()->get();
        
        return view('front.home', compact('testimonials'));
    }

}
