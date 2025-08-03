<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::first();
        $contacts = $contacts->formatBladeContacts();
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
        $contact->github = $request->github;
        $contact->linkedin = $request->linkedin;

        $contact = $contact->formatDBContacts();
        $contact->save();

        return back()->with('success','Contatti salvati');
    }


    public function contactsApi()
    {
        $contacts = Contact::first();
        return response()->json([
            'github' => $contacts->github,
            'linkedin' => $contacts->linkedin,
            'curriculum' => env('CURRICULUM_URL_DWNLD_COMPLETE'),
        ]);
    }

}
