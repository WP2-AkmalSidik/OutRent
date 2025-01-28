<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // CustomerController.php
    public function index()
    {
        // Data dummy customer
        $customer = (object) [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Sudirman No. 123, Jakarta Selatan',
            'image' => null,
            'created_at' => now()->subMonths(2), // Bergabung 2 bulan lalu
        ];

        return view('profile', compact('customer'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address']);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $data['image'] = $request->file('image')->store('profile-images', 'public');
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
