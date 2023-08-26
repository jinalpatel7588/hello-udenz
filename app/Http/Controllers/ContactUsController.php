<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $contact = new ContactUs();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile_number = $request->mobile_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('success','Your message is sent. Our team will get in touch with you soon.');

    }

    public function index(Request $request)
    {
        $contact = ContactUs::paginate(25);
        return view('pages.admin.contact-us.index',compact('contact'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return response()->json(["status" => 200, "message" => "Contact Us Data Deleted"]);
    }

    public function statusChange(ContactUs $contact)
    {
        if ($contact->status == StatusEnum::ACTIVE) {
            $contact->status = StatusEnum::DEACTIVE;
        } else {
            $contact->status =  StatusEnum::ACTIVE;
        }
        $contact->save();
        return redirect()->back()->with('success', 'message Status Changed.');
    }

    
}
