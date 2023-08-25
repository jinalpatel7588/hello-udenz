@foreach ($chats as $chat)
    <div class="messages-link service_content service_content-{{ $chat->id }}"
        onclick="message_details('{{ $chat->id }}')">
        <div class="messages-wrap">
            <div class="messages-profile">
            </div>
            <div class="messages-content">
                <h6 class="tag-text">{{ ucfirst($chat->name) }}</h6>
                <p class="tag-text">
                    @if (count($chat->latestMessages) > 0)
                    
                        @php
                    //    dd($chat->latestMessages)
                            $ext = pathinfo(storage_path('storage/' . $chat->latestMessages->first()->attachment), PATHINFO_EXTENSION);
                        @endphp
                        {{ $chat->latestMessages->first()->messages ? decrypt($chat->latestMessages->first()->messages) : '' }}
                        @if ($ext == 'pdf' || $ext == 'xls' || $ext == 'zip' || $ext == 'doc')
                            <a href="{{ asset('public/storage/service' . '/' . $chat->latestMessages->first()->attachment) }}"
                                download><i class="fa fa-file" aria-hidden="true"
                                    style="font-size:14px"></i>&nbsp;{{ $chat->latestMessages->first()->attachment }}</a>
                        @endif
                        @if ($ext == 'jpg' || $ext == 'png' || $ext == 'png' || $ext == 'webp')
                            <i class="fa fa-file" aria-hidden="true" style="font-size:14px"></i>
                            Image
                            
                            {{-- {{ $chat->latestMessages->first()->attachment }} --}}
                        @endif
                    @endif
                </p>
            </div>
            <div class="messages-taming">
                @if (count($chat->latestMessages) > 0)
                    <p> {{ date('h:i ', strtotime($chat->latestMessages->first()->created_at)) }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endforeach
