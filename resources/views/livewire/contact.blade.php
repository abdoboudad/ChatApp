<div wire:poll.5000ms>
    
<ul class="contacts-list" id="chatContactTab" data-chat-list="">
    <!-- Chat Item Start -->    
    
    @forelse ($contacts as $contact)
    @if ($contact->aboutme)
        <?php
        $msg = App\Models\Chat::where('receiver_id',Auth::user()->id)->where('sender_id',$contact->id)->latest()->first();
        $msg1 = App\Models\Chat::where('receiver_id',$contact->id)->where('sender_id',Auth::user()->id)->latest()->first();
        ?>

        <li class="contacts-item friends ">
            <a class="contacts-link" href="{{ route('chat.show',$contact->name) }}">
                <div class="avatar {{ $contact->status == 'online' ? 'avatar-online' : 'avatar-offline' }} ">
                    <img src="{{ asset('files').'/'.$contact->aboutme->photo }}" alt="">
                </div>
                <div class="contacts-content">
                    <?php $test = '' ?>
                    @if ($msg == null && $msg1 == null)

                    @else
                        @if ($msg1 > $msg)
                            <?php $test = date('g:ia',strtotime($msg1->created_at)) ?>
                        @else
                            <?php $test =  date('g:ia',strtotime($msg->created_at)) ?>
                        @endif
                    @endif
                    <div class="contacts-info">
                        <h6 class="chat-name text-truncate">{{ $contact->name == Auth::user()->name ? 'Me' : $contact->name  }} <img src="https://flagcdn.com/16x12/{{ $contact->aboutme->country }}.png" alt=""></h6>
                        <div class="chat-time">{{ $test }}</div>
                    </div>
                    <div class="contacts-texts">
                        <style>
                            .dsfs{
                                background-color: 
                            }
                        </style>
                        @if ($msg == null && $msg1 == null)

                        @else
                            @if ($msg1 > $msg)
                                <p class="text-truncate" style="color:{{ $contact->id != $msg1->receiver_id ? $msg1->is_read == 0 ? 'rgb(110, 112, 216);font-weight:700;' : '' : ''}}">{{ $msg1->message }}</p>
                            @else
                                <p class="text-truncate" style="color:{{ $contact->id != $msg->receiver_id ? $msg->is_read == 0 ? 'rgb(110, 112, 216);font-weight:700;' : '' : ''}}">{{ $msg->message }}</p>
                            @endif
                        @endif

                    </div>
                </div>
            </a>
        </li>     
    @else

    @endif
    @empty
    
    @endforelse

    <!-- Chat Item Start -->
    <li class="contacts-item groups active">
        <a class="contacts-link" href="javascript:;">
            <div class="avatar bg-success text-light">
                <span>
                    <!-- Default :: Inline SVG -->
                    <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>

                    <!-- Alternate :: External File link -->
                    <!-- <img class="injectable" src="./../../assets/media/heroicons/outline/user-group.svg" alt=""> -->
                </span>
            </div>
            <div class="contacts-content">
                <div class="contacts-info">
                    <h6 class="chat-name">Themeforest Group</h6>
                    <div class="chat-time"><span>10:20 pm</span></div>
                </div>
                <div class="contacts-texts">
                    <p class="text-truncate"><span>Jeny: </span>That’s pretty common. I
                        heard that a lot of people had the same experience.</p>
                    <div class="d-inline-flex align-items-center ml-1">
                        <!-- Default :: Inline SVG -->
                        <svg class="hw-16 text-muted" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>

                        <!-- Alternate :: External File link -->
                        <!-- <img class="injectable hw-16 text-muted" src="./../../assets/media/heroicons/solid/lock-closed.svg" alt=""> -->
                    </div>
                </div>
            </div>
        </a>
    </li>
    <!-- Chat Item End -->                              
    <!-- Chat Item End -->
</ul>

</div>
