<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function getIndex() 
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    public function getAbout() 
    {
        $first = 'Vitaliy';
        $last = 'Shkuratov';
        $email = 'mail@mail.com';
        $data = [];
        
        $fullname = $first . " " . $last;
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        // return view('pages.about')->with("fullname", $fullname);

        // short sintax
        // return view('pages.about')->withFullname($fullname)->withEmail($email);

        // with array
        return view('pages.about')->withData($data);
    }
    public function getContact() 
    {
        return view('pages.contact');
    }
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
            ]);

            $data = [
                'email' => $request->email,
                'subject' => $request->subject,
                'bodyMessage' => $request->message
            ];
        // Mail::queue(); as Mail::send(); but allowd to send mail on background
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('info.ogogo@gmail.com');
            $message->subject($data['subject']);            
        });
    }
}