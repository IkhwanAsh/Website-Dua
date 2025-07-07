<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::latest()->get();
        $totalPemesanans = Pemesanan::count();
        $totalDipesan = Pemesanan::where('status', 'Dipesan')->count();
        $totalDibatalkan = Pemesanan::where('status', 'Dibatalkan')->count();

        return view('pemesanan', compact('pemesanans', 'totalPemesanans', 'totalDipesan', 'totalDibatalkan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'movie' => 'required',
            'status' => 'required'
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan!');
    }

    public function edit(Pemesanan $pemesanan)
    {
        return view('pemesanan', compact('pemesanan'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'movie' => 'required',
            'status' => 'required'
        ]);

        $pemesanan->update($request->all());

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus!');
    }
}
