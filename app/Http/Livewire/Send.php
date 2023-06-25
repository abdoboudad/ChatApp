<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class Send extends Component
{
    use FileTrait;
    use WithFileUploads;
    public $user;
    public $message;
    public $photo;

    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.send');
    }
    public function store()
    {
        
        $image = $this->fileget();
        Chat::create([
            'image'=>$image,
            'message'=>$this->message,
            'receiver_id'=> $this->user->id,
            'sender_id'=>Auth::user()->id,
        ]);
        $this->photo = '';
       
    }
}
