<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('NewUserAbout');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('chat.show','welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Chat::create([
            'message'=>$request->message,
            'receiver_id'=>$request->receiver_id,
            'sender_id'=>$request->sender_id,
        ]);
        return response()->json(['message' => 'Message sent successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($name = null)
    {
        $user = User::where('name', $name)->first();
        $contacts = User::all();
        return view('chat.chat',compact('user','contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function contacts(Chat $chat)
    {
    }


}
