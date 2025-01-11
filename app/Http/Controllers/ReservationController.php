<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Menampilkan form reservasi
    public function create()
    {
        return view('reservations.reserve_table');
    }

    // Menyimpan data reservasi baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'table_number' => 'required|integer',
            'payment_method' => 'required|in:Cash,Credit Card,E-Wallet',
        ]);

        Reservation::create($validatedData);

        return redirect()->route('reservations.index')->with('success', 'Reservation successfully created!');
    }

    // Menampilkan semua data reservasi (Read)
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    // Menampilkan form edit reservasi
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    // Memperbarui data reservasi
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'table_number' => 'required|integer',
            'payment_method' => 'required|in:Cash,Credit Card,E-Wallet',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($validatedData);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }

    // Menghapus data reservasi
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
    }
}

