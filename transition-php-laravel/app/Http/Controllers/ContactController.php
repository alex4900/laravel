<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'message' => 'required',
            'email' => 'required|email',
        ]);

        try {
            Contact::create($validatedData);
            return redirect()->back()->with('success', 'Votre demande a bien été prise en compte.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Votre demande n\'a pas pu être prise en compte. Veuillez réessayer.');
        }
    }
}