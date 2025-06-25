<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('RegisterForm', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'payment_method' => 'required|in:FPX,TNG',
        ]);

        $event = Event::find($request->event_id);

        Registration::create([
        'event_id' => $request->event_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'ticket_type' => Event::find($request->event_id)->ticket_type,
        'payment_method' => $request->payment_method,
        ]);

        Mail::to($request->email)->send(new RegistrationSuccessMail($request->name, $event));

        return redirect('/home')->with('success', 'Registration successful! A confirmation email has been sent.');
    }
}
