<div class="chat-post-header">
    <div class="chat-post-profile">
        <div class="post-profile-content">
            <a href="#" data-toggle="modal" data-target="#chatDetailsModal-{{ $chatRoom->id }}">
                <h4 class="heading-4" onclick="about()">{{ $chatRoom->name }} </h4>
            </a>
        </div>
    </div>
    <h4 class="heading-4 text-right">
        <button class="btn btn-warning copy-link-btn" data-toggle="tooltip" data-placement="top" title="copy"
            onclick="copyToClipboard('{{ route('user.chat.addchatroom', $chatRoom->link) }}')">Copy Link
        </button>
    </h4>
</div>
<div class="modal fade chatDetailsModal" id="chatDetailsModal-{{ $chatRoom->id }}" tabindex="-1" role="dialog"
    aria-labelledby="chatDetailsModal-{{ $chatRoom->id }}" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-box p-0">
            <div class="modal-header p-0 pt-5 px-5 mb-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="buttonCloseModal">
                    <span aria-hidden="true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.39844 2.40039L21.5984 21.6004M2.39844 21.6004L21.5984 2.40039"
                                stroke="#2F2A32" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="submit-offer-wrap">
                    <h3 class="heading-3 mb-5">Chat Details </h3>
                    <div id="details_id">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chat-box-wrap">
    @if (count($messages->data) > 0)
    <?php $date_array = []; ?>
    @foreach ($messages->data as $key1 => $message)
    <?php
            if (in_array($message->date, $date_array))
            {}
            else
            { ?>
    <div class="text-center my-3">
        <span class="px-3 py-2 small bg-white shadow-sm  rounded">{{ date('M d Y', strtotime($message->date)) }}
        </span>
        <?php array_push($date_array, $message->date); ?>
    </div>
    <?php
            }
            ?>
            {{--  <div class="chat-post-box">
            </div>  --}}
    <div class="chat-post-box">
        <div class="chat-chating-text" id="user_message_lists">
            <div class="chating-profile">
            </div>
            <div class="chating-msg-center">
                <div class="chating-msg-wrap">
                    @if($message->sender_id == Auth::id())
                        <div class="chating-text-msg-user" style="font-size: 1.6rem;">
                    @elseif ($message->sender_id !== Auth::id())
                        <div class="chating-text-msg" style="font-size: 1.6rem;">
                    @endif
                        <h3 class="heading-6">{{ $message->sender_name }}</h3>
                            @php
                                $contents = explode('/', $message->attachment);
                                $ext = pathinfo(storage_path('storage/' . $message->attachment), PATHINFO_EXTENSION);
                            @endphp
                            @if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg')
                            <div class="msg-image" onclick="modalNewImagesOpen('{{ $key1 }}')">
                                <img id="new_image_show{{ $key1 }}" src="{{ $message->attachment }}" alt="">
                            </div>
                            <h4 class="msg-chat mb-0">@php echo htmlspecialchars_decode($message->messages); @endphp
                            </h4>
                            @else
                            @if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'MP4' || $ext == 'MKV')
                            <div class="msg-video">
                                <video id="message_video_{{ $key1 }}" src="{{ $message->attachment }}" alt=""></video>
                                <button onclick="previewVideo('{{ $key1 }}')" class="msg-video-play-btn">
                                    <svg width="28" height="37" viewBox="0 0 28 37" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.38 36.9996C5.4379 36.9941 4.5076 36.7896 3.65 36.3996C2.72248 35.9908 1.93224 35.3236 1.37367 34.4777C0.815095 33.6319 0.511799 32.6432 0.5 31.6296V6.3696C0.511799 5.35604 0.815095 4.36729 1.37367 3.52145C1.93224 2.67562 2.72248 2.00844 3.65 1.5996C4.71723 1.0955 5.9046 0.901342 7.07681 1.03925C8.24901 1.17716 9.35891 1.64158 10.28 2.3796L25.58 15.0096C26.18 15.4872 26.6645 16.0941 26.9976 16.7849C27.3306 17.4757 27.5035 18.2327 27.5035 18.9996C27.5035 19.7665 27.3306 20.5235 26.9976 21.2143C26.6645 21.9051 26.18 22.5119 25.58 22.9896L10.28 35.6196C9.17714 36.514 7.79993 37.0013 6.38 36.9996Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </div>
                            <h4 class="msg-chat mb-0">@php echo htmlspecialchars_decode($message->messages); @endphp
                            </h4>
                            @else
                            @if ($ext == 'pdf' || $ext == 'xls' || $ext == 'zip' || $ext == 'doc' || $ext != '')
                            <p class="pdf-text"><a href="{{ $message->attachment }}" download><i class="fa fa-file"
                                        aria-hidden="true"></i>&nbsp;{{ end($contents) }}</a>
                            </p>
                            @endif

                            @endif
                            <h4 class="msg-chat mb-0">@php echo htmlspecialchars_decode($message->messages); @endphp
                            </h4>
                            @endif
                        </div>
                        <span class="msg-time">{{ date('M d Y h:i A', strtotime($message->date_time)) }}</span>
                </div>
            </div>
        </div>
    </div>

    @if ($key1 + 1 == count($messages->data))
        <input type="radio" id="focus-bottom" style="height: 0;width: 0;">
    @endif
    @endforeach
    @endif
</div>
