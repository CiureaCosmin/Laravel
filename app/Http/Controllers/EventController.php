<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Models\User;
use Illuminate\Http\Request;



class EventController extends Controller
{

    public function index()
    {
        $events = Event::where('user_id', auth()->user()->id)->get();
        return view('events.list', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }


    public function store(StoreEventRequest $request)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'location' => 'required', 'date' =>
            'required']);
        // create new event
        $request->merge(['user_id' => auth()->user()->id]);
        $request->merge(['lista_invitati' => auth()->user()->id]);

        if($request->hasFile('images')){
            $file = $request->file('images');
            $filename = $file->getClientOriginalName();
            $time = time();
            $file->storeAs('public/imagini/',$time.$filename);
            $request = new Request($request->all());
            $request->merge(['images' => $time.$filename]);
        }

        Event::create($request->all());
        return redirect()->route('events.show', ['event' => Event::latest()->first()->id]);
    }

    public function show($id)
    {
        try {
            $user_id = auth()->user()->id;
            $event = Event::find($id);
            $lista_invitati = $event->lista_invitati;
            $lista_array = explode(',', $lista_invitati);
            $users = User::whereIn('id', $lista_array)->get();
            if (in_array($user_id, $lista_array)) {
                return view('events.show', compact( 'users', 'event'));
            } else {
                //returneaza viewul pentru acceptarea invitatiei
                return view('events.accept_invite_link', compact('event'));
            }
        }
        catch (\Exception $e){
            return view('error404');
        }
    }



    public function edit(Event $event)
    {
        //
    }


    public function update()
    {

       //


    }
    public function participa($id)
    {
        try{
       $user =  auth()->user()->id;
        $event_id = $id;

        $event = Event::find($event_id);
        $lista_invitati = $event->lista_invitati;

        $lista_array = explode(',', $lista_invitati);
        if(in_array($user, $lista_array)){
            return back();
        }
        else {
            // update the existing value
            if ($lista_invitati == null) {
                $lista_invitati = $user;
            } else {
                $lista_invitati = $lista_invitati . ',' . auth()->user()->id;
            }
            $event->lista_invitati = $lista_invitati;
            $event->save();
            return back();
        }}
        catch (\Exception $e){
            return view('error404');

        }
    }

    public function destroy(Event $event)
    {
        //
    }
}
