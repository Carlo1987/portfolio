<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::first();
        $contacts = $contacts->formatFormContacts();
        return view('admin.pages.contacts.index', [
            'contacts' => $contacts
        ]);
    }


    public function edit(Request $request)
    {  
        $contact = Contact::find($request->id);

        $contact->web = $request->web;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->location = $request->location;

        $contact = $contact->formatDBContacts();
        $contact->save();

        return back()->with('success','Contatti salvati');
    }

}
