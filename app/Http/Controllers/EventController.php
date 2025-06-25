<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(6)->get();
        return view('HomePage', compact('events')); 
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('EventDetails', compact('event'));
    }

    public function category($category)
{
    $events = Event::where('category', $category)->latest()->get();
    return view('CategoryEvents', compact('events', 'category'));
}
}
