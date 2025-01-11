<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Takeaway;

class TakeawayController extends Controller
{
    public function create()
    {
        return view('takeaway.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'pickup_location' => 'required|string|max:255',
            'payment_method' => 'required|in:Cash,Credit Card,E-Wallet',
        ]);

        Takeaway::create($validatedData);

        return redirect()->route('takeaway.index')->with('success', 'Takeaway order successfully created!');
    }

    public function index()
    {
        $takeaways = Takeaway::all();
        return view('takeaway.index', compact('takeaways'));
    }

    public function edit($id)
    {
        $takeaway = Takeaway::findOrFail($id);
        return view('takeaway.edit', compact('takeaway'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'pickup_location' => 'required|string|max:255',
            'payment_method' => 'required|in:Cash,Credit Card,E-Wallet',
        ]);

        $takeaway = Takeaway::findOrFail($id);
        $takeaway->update($validatedData);

        return redirect()->route('takeaway.index')->with('success', 'Takeaway order successfully updated!');
    }

    public function destroy($id)
    {
        $takeaway = Takeaway::findOrFail($id);
        $takeaway->delete();

        return redirect()->route('takeaway.index')->with('success', 'Takeaway order successfully deleted!');
    }
}
