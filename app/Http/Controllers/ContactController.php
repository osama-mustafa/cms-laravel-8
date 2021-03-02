<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Contact;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
         return view('contact')->with([
 
             'blog_name'      => Setting::first()->blog_name,
             'settings'       => Setting::first(),
             'categories'     => Category::take(4)->get(),
             'tags'           => Tag::take(12)->get(),
 
         ]);
         
    }

    public function storeContact(Request $request)
    {

        $request->validate([
            'name'  => 'required|min:3|max:30',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:250'
        ]);


        $input = $request->all();
        Contact::create($input);

        $data = [

            'name'    => $input['name'],
            'subject' => $input['subject'],
            'email'   => $input['email'],
            'message' => $input['subject']
        ];


        Mail::send('contacts.contactmail', $data, function ($message) use ($request) {
            $message->from($request->email);
            $message->to('semsem6661@gmail.com');
        });

        return redirect()->back()->with([
            'message' => 'Your message has been sent successfully!'
        ]);

    }
 
}
