<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = $request->user()->contacts()->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $contact = $request->user()->contacts()->create($validated);

        return redirect()->route('contacts.index');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($contact->profile_picture) {
                Storage::delete('public/'.$contact->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $contact->update($validated);

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        if ($contact->profile_picture) {
            Storage::delete('public/'.$contact->profile_picture);
        }

        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
