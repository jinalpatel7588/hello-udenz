<style>
    .chating-text-msg {
        margin-bottom: 10px
    }
</style>

<ul class="nav nav-tabs mb-4 chat-details-tab" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab"
            aria-controls="home" aria-selected="true">About
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab"
            aria-controls="profile" aria-selected="false">Members</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="chat-details-wrap mb-5">
            <div class="card">
                <h5 class="heading-4">Files</h5>
                <div class="file-overflow">
                    @if (count($chatAttachment) > 0)
                        @foreach ($chatAttachment as $key1 => $message)
                            <div class="chating-text-msg" style="font-size: 1.6rem; background-color: #F7F7F7; color: black">
                                <h3 class="heading-6">{{ $message->sender_name }}</h3>
                                @php
                                    $contents = explode('/', $message->attachment);
                                    $ext = pathinfo(storage_path('storage/' . $message->attachment), PATHINFO_EXTENSION);
    
                                @endphp
                                @if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg')
                                    <div class="msg-image mb-2" onclick="modalNewImagesOpen('{{ $key1 }}')">
                                        <img id="new_image_show{{ $key1 }}"
                                            src="{{ asset('storage/' . $message->attachment) }}" alt="">
                                    </div>
                                    <span class="msg-time">{{ date('M d Y h:i A', strtotime($message->created_at)) }}</span>
                                @else
                                    @if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'MP4' || $ext == 'MKV')
                                        <div class="msg-video mb-2">
                                            <video id="message_video_{{ $key1 }}"
                                                src="{{ asset('storage/' . $message->attachment) }}" alt=""></video>
                                            <button onclick="previewVideo('{{ $key1 }}')"
                                                class="msg-video-play-btn">
                                                <svg width="28" height="37" viewBox="0 0 28 37" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.38 36.9996C5.4379 36.9941 4.5076 36.7896 3.65 36.3996C2.72248 35.9908 1.93224 35.3236 1.37367 34.4777C0.815095 33.6319 0.511799 32.6432 0.5 31.6296V6.3696C0.511799 5.35604 0.815095 4.36729 1.37367 3.52145C1.93224 2.67562 2.72248 2.00844 3.65 1.5996C4.71723 1.0955 5.9046 0.901342 7.07681 1.03925C8.24901 1.17716 9.35891 1.64158 10.28 2.3796L25.58 15.0096C26.18 15.4872 26.6645 16.0941 26.9976 16.7849C27.3306 17.4757 27.5035 18.2327 27.5035 18.9996C27.5035 19.7665 27.3306 20.5235 26.9976 21.2143C26.6645 21.9051 26.18 22.5119 25.58 22.9896L10.28 35.6196C9.17714 36.514 7.79993 37.0013 6.38 36.9996Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
                                        </div>
                                        <span class="msg-time">{{ date('M d Y h:i A', strtotime($message->created_at)) }}</span>
                                    @else
                                        @if ($ext == 'pdf' || $ext == 'xls' || $ext == 'zip' || $ext == 'doc' || $ext != '')
                                            <p><a href="{{ asset('storage/' . $message->attachment) }}" download><i
                                                        class="fa fa-file" aria-hidden="true"
                                                        style="font-size:21px"></i>&nbsp;{{ end($contents) }}</a>
                                            </p>
                                            <span class="msg-time">{{ date('M d Y h:i A', strtotime($message->created_at)) }}</span>
                                        @endif
                                        <!--<h4 class="msg-chat mb-0">@php  echo htmlspecialchars_decode($message->messages); @endphp</h4>-->
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    @else
                        <p class="paragraph-regular mb-0">No Files Are Shared</p>
                    @endif
                </div>
            </div>
        </div>
        @if ($chatRoom)
            <div class="chat-details-wrap mb-5">
                <div class="card">
                    <h5 class="heading-4">Description</h5>
                    <p class="paragraph-regular mb-0">{{ $chatRoom->description }}</p>
                </div>
                <div class="card">
                    <h5 class="heading-4">Created by</h5>
                    <p class="paragraph-regular mb-0">
                        {{ $chatRoom->user ? $chatRoom->user->name : '' }}
                        on {{ date('M d, Y', strtotime($chatRoom->created_at)) }} </p>
                </div>
                @if ($chatRoom->user_id == Auth::user()->id)
                    <div class="card">
                        <button type="button" class="heading-4 text-red"
                            style="border: none;text-align: left;
                        cursor: pointer;"
                            onclick="sweetAlertAjax('delete','{{ route('user.chat.destroy', $chatRoom->id) }}', 'Are you sure you want to delete?')">Delete
                            Room</button>
                    </div>
                @else
                    <div class="card">
                        <button type="button" class="heading-4 text-red"
                            style="border: none;text-align: left;
                    cursor: pointer;"
                            onclick="sweetAlertAjax('delete','{{ route('user.chat.leave', [$chatRoom->id, Auth::user()->id]) }}', 'Are you sure you want to Leave?')">Leave
                            Room</button>
                    </div>
                @endif
            </div>
        @endif
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="messages-chat-list">
            @foreach ($messages->data as $value)
            @if($value->user_name)
                <a class="messages-link">
                    <div class="messages-wrap">
                        <div class="messages-profile">
                        </div>
                        <div class="messages-content" style="display: flex;justify-content: space-between;">
                            @if ($value->user_log == App\Enums\StatusEnum::LOGIN)
                                <h6 class="tag-text">{{ $value->user_name }} <span style="color: green" class="logged-in">●</span></h6>
                            @else
                            <h6 class="tag-text">{{ $value->user_name }}</h6>
                            @endif
                            @if ($chatRoom)
                                    @if ($chatRoom->user_id == Auth::user()->id)
                                    @if (Auth::user()->id != $value->user_id)
                                            <button type="button" class="remove-room-btn btn btn-danger"
                                                style="border: none;text-align: left;cursor: pointer;"
                                                onclick="sweetAlertAjax('delete','{{ route('user.chat.leave', [$chatRoom->id, $value->user_id]) }}', 'Are you sure you want to Remove {{ $value->user_name }} From This Room?')">Remove
                                                Member</button>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </a>
            @endif
            @endforeach
        </div>
    </div>
</div>
