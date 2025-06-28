<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $contacts = ContactModel::all();
        return view('allContacts',compact('contacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "subject" => "required|string",
            "message" => "required|string|min:5"
        ]);

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message"),
        ]);

        return redirect("/contact")->with("success", "Your message has been sent successfully!");
    }

    public function delete ($contact)
    {
        $singleContact = ContactModel::where(["id"=>$contact])->first();

        if($singleContact == null)
        {
            die("Contact doesn't exist");
        };

        $singleContact->delete();

        return redirect()->back();

    }
}
