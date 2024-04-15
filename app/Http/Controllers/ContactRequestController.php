<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function post() {
        $validatedData = request()->validate([
            'email' => 'required',
            'question' => 'required'
        ]);

        ContactRequest::create($validatedData);

        return view('contact.contact-form-success');
    }

    public function overview() {
        $contactRequests = ContactRequest::all();

        return view('contact.contact-overview', ['contactRequests' => $contactRequests]);
    }
}
