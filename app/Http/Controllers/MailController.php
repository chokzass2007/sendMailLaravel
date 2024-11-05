<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class MailController 
{
    public function sendWelcomeEmail()
    {
        
        $data = [
            'name' => 'นำโชค จันทะดวง',
            'email' => 'urc_notify@universalrice.com'
        ];

        try {
            Mail::to('numchok.j@urcricemail.com')->send(new WelcomeMail($data));
            return "Email has been sent successfully!";
        } catch (\Exception $e) {
            return "Error sending email: " . $e->getMessage();
        }
    }
}