<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('backend.contact.index', compact('contact'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:15',
            'phone_number_2' => 'nullable|string|max:15',
            'email_address' => 'nullable|email|max:255',
            'email_address_2' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'map' => 'nullable|string|max:1000',
            'hours' => 'nullable|string|max:255',
            'instagram' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
        ]);

        $data = [
            'phone_number' => $request->input('phone_number'),
            'phone_number_2' => $request->input('phone_number_2'),
            'email_address' => $request->input('email_address'),
            'email_address_2' => $request->input('email_address_2'),
            'address' => $request->input('address'),
            'map' => $request->input('map'),
            'hours' => $request->input('hours'),
            'instagram' => $request->input('instagram'),
            'tiktok' => $request->input('tiktok'),
            'facebook' => $request->input('facebook'),
        ];

        Contact::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->back()->with('success', 'Configuration has been successfully saved or updated.');
    }
}
