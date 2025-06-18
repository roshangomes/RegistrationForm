<?php
namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'country' => 'required|string',
            'college' => 'required|string',
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'contact_number' => 'required|string|min:10|max:15',
            'gender' => 'required|in:Male,Female,Other',
            'email' => 'required|email|unique:registrations,email',
            'year' => 'required|integer|between:1,5',
            'domain' => 'required|string',
        ]);

        Registration::create($validated);

        return redirect()->route('registration.form')->with('success', 'Registration successful!');
    }

    public function viewData()
    {
        $registrations = Registration::all();
        return view('view', compact('registrations'));
    }
}