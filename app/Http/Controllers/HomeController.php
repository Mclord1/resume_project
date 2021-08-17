<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sendMailFromContactForm(Request $request)
    {
        $validatedValues = $this->validate($request, [
            'full_name' => ['string'],
            'email' => ['string'],
            'subject' => ['string'],
            'message' => ['string']
        ]);

        Feedback::create($validatedValues);

        return redirect()->route('home')->with('success', 'Your feedback has been received, thank you!');
    }
}
