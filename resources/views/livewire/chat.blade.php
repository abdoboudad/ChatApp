<div wire:poll.5000ms>
    <style>
        .self .message-content{
            overflow: hidden;
        }
        .message .message-content{
            overflow: hidden;
        }
    </style>
    @forelse ($messages as $msg)
        @if (Auth::user()->id == $msg->sender_id)
            @if ($msg->image != null)
                <div class="message self">
                    <div class="message-wrapper">
                        <div class="message-content">
                            <h6>{{ $msg->message }}</h6>
                            <div class="form-row">
                                    <?php $imageArray = explode(',', $msg->image); ?>
                                    @forelse ($imageArray as $img)
                                    <div class="col">
                                        <a class="popup-media" href="{{ asset('files').'/'.$img }}">
                                            <img class="img-fluid rounded" src="{{ asset('files').'/'.$img }}" alt="">
                                        </a>
                                    </div>

                                    @empty
                                        
                                    @endforelse                           
                            </div>
                        </div>
                    </div>
                    <div class="message-options">
                        <div class="avatar avatar-sm"><img alt="" src="{{ asset('files').'/'.Auth::user()->aboutme->photo }}"></div>
                        <span class="message-date">{{  date('g:ia',strtotime($msg->created_at)) }} </span>
                        <span class="message-status" style="{{ $msg->is_read == 0 ? '' : 'color: #665dfe' }}">{{ $msg->is_read == 0 ? 'unreaded' : 'readed' }}</span>
                        <div class="dropdown">
                            <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Default :: Inline SVG -->
                                <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                </svg>

                                <!-- Alternate :: External File link -->
                                <!-- <img class="injectable hw-18" src="./../../assets/media/heroicons/outline/dots-horizontal.svg" alt="message options"> -->
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/download.svg" alt="download"> -->
                                    <span>Download</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message replay"> -->
                                    <span>Replay</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable rotate-y hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message forward"> -->
                                    <span>Forward</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/star.svg" alt="message favourite"> -->
                                    <span>Favourite</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/trash.svg" alt="message delete"> -->
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>  
            @else
                <div class="message self">
                    <div class="message-wrapper">
                        <div class="message-content">
                            {{ $msg->message}}
                        </div>
                    </div>
                    <div class="message-options">
                        <div class="avatar avatar-sm"><img alt=""src="{{ asset('files').'/'.Auth::user()->aboutme->photo }}"></div>

                        <span class="message-date">{{  date('g:ia',strtotime($msg->created_at)) }} </span>
                        <span class="message-status" style="{{ $msg->is_read == 0 ? '' : 'color: #665dfe' }}">{{ $msg->is_read == 0 ? 'unreaded' : 'readed' }}</span>
                        <div class="dropdown" wire:ignore>
                            <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Default :: Inline SVG -->
                                <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                </svg>

                                <!-- Alternate :: External File link -->
                                <!-- <img class="injectable hw-18" src="./../../assets/media/heroicons/outline/dots-horizontal.svg" alt="message options"> -->
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/duplicate.svg" alt="message options"> -->
                                    <span>Copy</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/pencil.svg" alt="message edit"> -->
                                    <span>Edit</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message replay"> -->
                                    <span>Replay</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable rotate-y hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message forward"> -->
                                    <span>Forward</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/star.svg" alt="message favourite"> -->
                                    <span>Favourite</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/trash.svg" alt="message delete"> -->
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>  
            @endif
                                
        @else
            <?php 
                $msg->is_read = true;
                $msg->save();
            ?>
            @if ($msg->image != null)
                <div class="message">
                    <div class="message-wrapper">
                        <div class="message-content">
                            <h6>{{ $msg->message }}</h6>
                            <div class="form-row">
                                <?php $imageArray = explode(',', $msg->image); ?>
                                @forelse ($imageArray as $img)
                                    <div class="col">
                                        <a class="popup-media" href="{{ asset('files').'/'.$img }}">
                                            <img class="img-fluid rounded" src="{{ asset('files').'/'.$img }}" alt="">
                                        </a>
                                    </div>

                                @empty
                                    
                                @endforelse  
                            </div>
                        </div>
                    </div>
                    <div class="message-options">
                        <div class="avatar avatar-sm"><img alt="" src="{{ asset('files').'/'.$user->aboutme->photo }}"></div>
                        <span class="message-date">{{  date('g:ia',strtotime($msg->created_at)) }}</span>
                        <div class="dropdown">
                            <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Default :: Inline SVG -->
                                <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                </svg>

                                <!-- Alternate :: External File link -->
                                <!-- <img class="injectable hw-18" src="./../../assets/media/heroicons/outline/dots-horizontal.svg" alt="message options"> -->
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/download.svg" alt="download"> -->
                                    <span>Download</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message replay"> -->
                                    <span>Replay</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable rotate-y hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message forward"> -->
                                    <span>Forward</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/star.svg" alt="message favourite"> -->
                                    <span>Favourite</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/trash.svg" alt="message delete"> -->
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>   
            @else
                <div class="message">
                    <div class="message-wrapper">
                        <div class="message-content">
                            <h6 class="text-dark">{{ $user->name }}</h6>
                            <span>
                                {{$msg->message}}
                            </span>
                        </div>
                    </div>
                    <div class="message-options">
                        <div class="avatar avatar-sm"><img alt="" src="{{ asset('files').'/'.$user->aboutme->photo }}"></div>
                        <span class="message-date">{{  date('g:ia',strtotime($msg->created_at)) }}</span>
                        <div class="dropdown" wire:ignore>
                            <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Default :: Inline SVG -->
                                <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                </svg>

                                <!-- Alternate :: External File link -->
                                <!-- <img class="injectable hw-18" src="./../../assets/media/heroicons/outline/dots-horizontal.svg" alt="message options"> -->
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/duplicate.svg" alt="message options"> -->
                                    <span>Copy</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message replay"> -->
                                    <span>Replay</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable rotate-y hw-18 mr-2" src="./../../assets/media/heroicons/outline/reply.svg" alt="message forward"> -->
                                    <span>Forward</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/star.svg" alt="message favourite"> -->
                                    <span>Favourite</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                    <!-- Default :: Inline SVG -->
                                    <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>

                                    <!-- Alternate :: External File link -->
                                    <!-- <img class="injectable hw-18 mr-2" src="./../../assets/media/heroicons/outline/trash.svg" alt="message delete"> -->
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>    
            @endif      
        @endif
        <script>
            var chatContent = document.getElementById('chatContent');
            var messageInput2 = document.getElementById('message-input');
            var imagePreview2 = document.getElementById('imagePreview');
            messageInput2.value = ''
            imagePreview2.innerHTML = ''

            chatContent.scrollTop = chatContent.scrollHeight;
        </script>    
    @empty
                        
    @endforelse
    
</div>
