<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contact extends Component
{
    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        $contacts = User::all();
        foreach($contacts as $contact){
            if($contact->last_activity < now()->subMinutes(5)){
                $contact->status = 'offline';
                $contact->save();
            }else{
                $contact->status = 'online';
                $contact->save();
            }
        }
        return view('livewire.contact',compact('contacts'));
    }
}
