<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $user;
    public $message;
    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $messages = ModelsChat::where(function ($query) {
            $query->where('sender_id', Auth::user()->id)->where('receiver_id', $this->user->id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->user->id)->where('receiver_id', Auth::user()->id);
        })->orderBy('created_at')->get();

        return view('livewire.chat', compact('messages'));
    }
    
}
