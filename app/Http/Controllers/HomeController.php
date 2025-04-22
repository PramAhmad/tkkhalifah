<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function index()
    {
        $testimonials = Testimonial::active()->ordered()->get();
        
        return view('front.home', compact('testimonials'));
    }
    public function contact()
    {
        return view('front.contact');
    }

    /**
     * Store a new contact message
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);
        
        // Create new contact record
        Contact::create($validated);
        
        // Redirect back with success message
        return redirect()->route('contact')->with('success', 'Thank you for contacting us. We will get back to you shortly!');
    }
}
