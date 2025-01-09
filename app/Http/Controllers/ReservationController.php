<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reserve_table');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Pastikan kolom phone/phone_number ada
            'table_number' => 'required|integer',
            'payment_method' => 'required|in:Cash,Credit Card,E-Wallet',
        ]);
        

        Reservation::create($validatedData);

        return redirect()->route('reservations.create')->with('success', 'Reservation successfully created!');
    }
}
