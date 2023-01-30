<?php

namespace App\Http\Controllers;

use App\Models\ContactsData;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required'
        ]);
        ContactsData::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject
        ]);
        return back()->with('success', 'Contact Message Sent!');
    }
}