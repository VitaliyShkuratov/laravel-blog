<?php

namespace App\Http\Controllers;

class PagesController extends Controller {
    public function getIndex() {
        return view('pages.welcome');
    }
    public function getAbout() {
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
    public function getContact() {
        return view('pages.contact');
    }
}