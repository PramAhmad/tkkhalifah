<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Feature;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Show the form for creating a new pendaftaran.
     */
    public function index()
    {
        return view('front.pendaftaran');
    }

    /**
     * Store a newly created pendaftaran in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'features_id' => 'required|exists:features,id',
            'nama' => 'required|string|max:255',
            'nowa' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
        ]);

        Pendaftaran::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }
}