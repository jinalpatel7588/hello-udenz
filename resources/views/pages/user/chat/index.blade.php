<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('new_assets/images/small-black-logo.png') }}" type="image/x-icon" />
    <title>Udenz Talks</title>

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="http://chat-room.udenz.co/public/user/chat">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Chat Room">
    <meta property="og:description" content="">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://chat-room.udenz.co/public/user/chat">
    <meta name="twitter:title" content="Chat Room">
    <meta name="twitter:description" content="">

    <!-- google poppins font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- font awesome icon link -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">

    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{ asset('new_assets/chat_css/bootstrap.min.css') }}">
    <link href="{{ asset('new_assets/css/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- custome css link -->
    <link rel='stylesheet' href='{{ asset('new_assets/chat_css/style.css') }}'>
    <link rel="stylesheet" href="{{ asset('new_assets/chat_css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('new_assets/chat_css/responsive.css') }}">
   <!-- <style>-->

   <!--     * {-->
   <!--     font-family: Open Sans;-->
   <!--     }-->
   <!--     .footer-distributed{-->
   <!--         background: #0072FF;-->
   <!--     box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);-->
   <!--     box-sizing: border-box;-->
   <!--     width: 100%;-->
   <!--     text-align: left;-->
   <!--     font: bold 16px sans-serif;-->
   <!--     padding: 50px 50px;-->
   <!--     }-->
   <!--     .footer-distributed .footer-left,-->
   <!--     .footer-distributed .footer-center,-->
   <!--     .footer-distributed .footer-right{-->
   <!--     display: inline-block;-->
   <!--     vertical-align: top;-->
   <!--     }-->

   <!--     .footer ul{-->
   <!--     display: inline-block;-->
   <!--     }-->
   <!--     .footerLinks ul li {-->
   <!--         display: inline-block;-->
   <!--     }-->

   <!--     .footerLinks {-->
   <!--         float: right;-->
   <!--     }-->

   <!--</style>-->
</head>

<body>
    <header class="main-header">
        <nav class="navbar navbar-expand-lg px-lg-0 justify-content-end">
            <ul class="navbar-nav align-items-center navbar-top-icon ml-auto w-100 justify-content-between">
                <div class="logo-box ml-5">
                        <span class="logo-lg dash-logo">
                            <img src="{{ asset('new_assets/images/logo-black.png') }}" alt="" style="width: 190px;" >
                        </span>
                    </div>
                <li class="nav-item">
                    
                                    <div class="dropdown show profile-popup-wrap">
                        <a class="profile-circle" href="#" role="button" id="profile-menu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user())
                                @if(!empty(Auth::user()->photo))
                                    <img class="nav-profile-img" src="{{ asset('storage/'.Auth::user()->photo) }}"  alt="your image" />
                                @else
                                    <img class="nav-profile-img" src="{{ asset('new_assets/images/profile.png') }}"  alt="profile image" />
                                @endif
                            @endif


                            {{--  <img class="nav-profile-img" src="{{ asset('new_assets/images/profile.png') }}"
                                alt="Profile Image">  --}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profile-menu">
                            <div class="card menu-card profile-div">
                                <div class="card-body p-0">
                                    <div class="profile-body d-flex">
                                        <a class="profile-circle" href="#" role="button" id="profile-menu"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (Auth::user())
                                                @if(!empty(Auth::user()->photo))
                                                    <img class="nav-profile-img" src="{{ asset('storage/'.Auth::user()->photo) }}"  alt="your image" />
                                                @else
                                                    <img class="nav-profile-img" src="{{ asset('new_assets/images/profile.png') }}"  alt="profile image" />
                                                @endif
                                            @endif
                                        </a>
                                        <span class="paragraph-regular">
                                            @if (Auth::user())
                                                {{ Auth::user()->name }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="profile-body">
                                        <a class="paragraph-regular" href="{{ route('user.edit',Auth::user()->id) }}">
                                            <i class="mdi mdi-logout-variant"></i>{{ __('Profile') }}
                                        </a>
                                    </div>
                                    <div class="profile-body">
                                        <a class="paragraph-regular" href="{{ route('user.logout') }}">
                                            <i class="mdi mdi-logout-variant"></i>{{ __('Logout') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    @include('includes.message')
    <section id="main-chat">
        <div class="chat-wrap">
            <div class="chat-left">
                <div class="messages-chat-wrap position-relative">
                    <div class="messages-sticky-top">
                        <h3 class="heading-3 d-flex mb-0">Messages</h3>
                    </div>
                    <div class="messages-chat-list" id="message_chat_list_id">

                    </div>
                    {{-- <h3 class="text-center mt-3">Empty Chat List</h3> --}}
                </div>
                <button class="btn btn-brand create-chat" data-toggle="modal" data-target="#createChatModal"><i
                        class="fa fa-plus"></i></button>
            </div>
            <div class="chat-right" style="border-left: 1px solid #f1ebf5; display: flex; flex-direction: column;">
                <div class="card chat-post-card h-100" id="message_details_id">
                <h3 class="text-center mt-5">No Chat Found</h3>
                </div>
                <div class="chat-post-footer" style="display:none">
                    {{-- <label for="profile" id="profile_error" class="error" style="margin-left: 68px;"></label> --}}
                    <div class="chat-type-box">
                        <form action="" enctype="multipart/form-data" id="attachfile"></form>
                        <input type="text" name="message" onkeypress="msgsent(event)" id="message"
                            placeholder="Write your message">
                        <input type="hidden" name="room_id" id="room_id" value="">
                        <div class="chat-send-button">
                            <button class="send-button" onclick="getfile()">
                                <label for="my_file" id="" class="mb-0 images_loader">
                                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M29.7607 16.9743L17.4783 29.2567C15.7809 30.9541 13.4788 31.9077 11.0783 31.9077C6.0796 31.9077 2.02734 27.8554 2.02734 22.8567C2.02734 20.4562 2.98092 18.1541 4.67831 16.4567L17.3267 3.80832C18.4583 2.67673 19.9931 2.04102 21.5934 2.04102C24.9258 2.04102 27.6273 4.74252 27.6273 8.07499C27.6273 9.6753 26.9916 11.2101 25.86 12.3417L13.5777 24.624C13.0119 25.1898 12.2445 25.5077 11.4443 25.5077C9.7781 25.5077 8.42734 24.1569 8.42734 22.4907C8.42734 21.6905 8.7452 20.9232 9.311 20.3574L21.2273 8.44102"
                                            stroke
                                            ="#605866" stroke-width="2" />
                                    </svg>
                                </label>
                                <input type="file" name="my_file[]" id="my_file" onchange="readURL(this);" multiple
                                    style="display: none;">
                            </button>
                            <button type="button" class="send-button sent_messages_loader lick-chat-msg-popup" id="send_message"
                                onclick="sentmsg()">send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" name="latestMessageId" id="latestMessageId" value="{{ $latestMessageId }}">
    <div class="modal fade" id="createChatModal" tabindex="-1" role="dialog" aria-labelledby="createChatModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-box p-0">
                <div class="modal-header p-0 pt-5 px-5 mb-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.39844 2.40039L21.5984 21.6004M2.39844 21.6004L21.5984 2.40039"
                                    stroke="#2F2A32" />
                            </svg>
                        </span>
                    </button>
                </div>
                <form method="POST" action="{{ route('user.chat.create') }}" id="chatForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-0">
                        <div class="submit-offer-wrap">
                            <h3 class="heading-3 mb-5">Create New Chat</h3>
                            <div class="form-group">
                                <label for="" class="clock-text">Chat Name</label>
                                <input type="text" name="name" id="" placeholder="Enter chat name"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="clock-text">Description <span>(optional)</span></label>
                                <textarea name="description" id="" cols="30" rows="6" placeholder="Enter Description"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 d-block">
                        <div class="portfolio-footer">
                            <div class="row align-items-center justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-brand ml-auto" type="submit">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="overviewImagesModal" tabindex="-1" role="dialog"
        aria-labelledby="overviewImagesModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-box">
                <div class="modal-header p-0 mb-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.39844 2.40039L21.5984 21.6004M2.39844 21.6004L21.5984 2.40039"
                                    stroke="#2F2A32" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <img id="images_moels" src="" style="border-radius: 8px; width: 100%; height: auto;" />
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="overviewVideoModal" tabindex="-1" role="dialog"
        aria-labelledby="overviewVideoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-box">
                <div class="modal-header p-0 mb-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.39844 2.40039L21.5984 21.6004M2.39844 21.6004L21.5984 2.40039"
                                    stroke="#2F2A32" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <iframe width="560" height="315" src="" title="YouTube video player"
                        frameborder="0" allowfullscreen id="iframe_video"></iframe>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="currentRoomId">
    <script src="{{ asset('new_assets/chat_js/jquery-3.6.2.min.js') }}"></script>
    <script src="{{ asset('new_assets/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('new_assets/chat_js/popper.min.js') }}"></script>
    <script src="{{ asset('new_assets/chat_js/bootstrap.min.js') }}"></script>
    @include('includes.socket')
    <script>
        $(document).ready(function() {
            chatrefresh();
            if ($("#latestMessageId").val() != "") {
                message_details($("#latestMessageId").val());
            }
            $('#focus-bottom').focus();
            $('#chatForm').validate({
                ignore: [],
                rules: {
                    name: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Name"
                    },
                }
            });
        });

        function message_details(roomId) {
            var roomId = roomId;
            $("#room_id").val(roomId);
            var previousRoomId = $("#currentRoomId").val();
            socket.emit("LEAVE ROOM", {
                roomId: previousRoomId,
            });
            $("#currentRoomId").val(roomId);
            socket.emit("JOIN ROOM", {
                roomId: roomId,
            });

            $.ajax({
                url: "{{ route('user.chat.details') }}",
                type: "GET",
                data: {
                    "roomId": roomId
                },
                cache: false,
                success: function(html) {
                    $(".chat-post-footer").css("display","block");
                    // if (html.status != 200) {
                    //     alert(html.message);
                    // } else {
                    $("#message_details_id").html(html);
                    $(".sent_messages_loader").html("send");
                    // }
                    $(".service_content").removeClass("active");
                    $(".service_content-" + roomId).addClass("active");
                    $('#focus-bottom').focus();
                   // $("#message").val('');
                    $('#message').focus();
                }
            });
        }

        function previewVideo(id) {
            var videoLink = $('#message_video_' + id).attr('src');
            $('#iframe_video').attr('src', videoLink);
            $('#overviewVideoModal').modal('show');
        }


        function modalNewImagesOpen(id) {
            var imageUrl = $('#new_image_show' + id).attr('src');
            $('#images_moels').attr('src', imageUrl);
            $('#overviewImagesModal').modal('show');
        }


        function buyerChat() {
            var text = $("#buyer-chat").val();
            $('.service_content').hide();
            $(".service_content").each(function() {
                var lcServiceText = $(this).text().toLowerCase();
                var lcSearchString = text.toLowerCase();
                var result = lcServiceText.indexOf(lcSearchString) >= 0;
                if (result) {
                    $($(this)).show();
                }
            })
        }


        function getfile() {
            $('#my_file').click();
        }

        function readURL(input) {
            $(".images_loader").html(`<svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M29.7607 16.9743L17.4783 29.2567C15.7809 30.9541 13.4788 31.9077 11.0783 31.9077C6.0796 31.9077 2.02734 27.8554 2.02734 22.8567C2.02734 20.4562 2.98092 18.1541 4.67831 16.4567L17.3267 3.80832C18.4583 2.67673 19.9931 2.04102 21.5934 2.04102C24.9258 2.04102 27.6273 4.74252 27.6273 8.07499C27.6273 9.6753 26.9916 11.2101 25.86 12.3417L13.5777 24.624C13.0119 25.1898 12.2445 25.5077 11.4443 25.5077C9.7781 25.5077 8.42734 24.1569 8.42734 22.4907C8.42734 21.6905 8.7452 20.9232 9.311 20.3574L21.2273 8.44102"
                    stroke="#605866" stroke-width="2" />
            </svg>`);
            for (var i = 0; i < input.files.length; ++i) {
                var filePath = input.files[i].name;
                const size = (input.files[i].size / 1024 / 1024).toFixed(2);
                if (size > 10) {
                    $('#profile_error').html("Attach size must be less than 10 MB");
                    fileInput.value = '';
                    return false;
                }
                $('#profile_error').html("");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                var tokenn = "{{ csrf_token() }}";
                var file_data = input.files[i];
                var myform = document.getElementById("attachfile");

                var form_data = new FormData(myform);
                form_data.append('attachment', file_data);
                form_data.append('_token', tokenn);
                form_data.append("roomId", $("#room_id").val());
                form_data.append("message", $("#message").val());
                $.ajax({
                    url: "{{ route('user.chat.message') }}", // point to server-side controller method
                    type: 'post',
                    data: form_data,
                    beforeSend: function() {
                        $('.images_loader').html(
                            '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                    },
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(response) {
                        $("#message").val('');
                        socket.emit("SEND MESSAGE", {
                            roomId: $("#currentRoomId").val(),
                        });
                        {{--  $("#message").val('');
                        $('#message').focus();  --}}
                        $("#message_details_id").html(response);
                        $(".images_loader").html(`<svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.7607 16.9743L17.4783 29.2567C15.7809 30.9541 13.4788 31.9077 11.0783 31.9077C6.0796 31.9077 2.02734 27.8554 2.02734 22.8567C2.02734 20.4562 2.98092 18.1541 4.67831 16.4567L17.3267 3.80832C18.4583 2.67673 19.9931 2.04102 21.5934 2.04102C24.9258 2.04102 27.6273 4.74252 27.6273 8.07499C27.6273 9.6753 26.9916 11.2101 25.86 12.3417L13.5777 24.624C13.0119 25.1898 12.2445 25.5077 11.4443 25.5077C9.7781 25.5077 8.42734 24.1569 8.42734 22.4907C8.42734 21.6905 8.7452 20.9232 9.311 20.3574L21.2273 8.44102"
                                stroke="#605866" stroke-width="2" />
                        </svg>`);
                        $('#focus-bottom').focus();
                    }
                });
            }
        }

        function about(data) {
            $("#details_id").html("");
            var roomId = $("#room_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('user.chat.getattachment') }}",
                type: "POST",
                data: '_token={{ csrf_token() }}' + '&roomId=' + roomId,
                beforeSend: function() {
                    $('.sent_messages_loader').html(
                        '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                },
                cache: false,
                success: function(response) {
                    $("#details_id").html(response);
                }
            });
        }

        function sentmsg(data, type = "") {
            if (type == "") {
                if ($("#message").val() == "") {
                    return false;
                }
            }
            var roomId = $("#room_id").val();
            var message = $("#message").val();
            var file = $("#my_file").val();
            var message = $("#message").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('user.chat.message') }}",
                type: "POST",
                data: '_token={{ csrf_token() }}' + '&roomId=' + roomId + '&message=' + message + '&file=' + file,
                beforeSend: function() {
                    $('.sent_messages_loader').html(
                        '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                },
                cache: false,
                success: function(response) {
                    $("#message").val('');
                    socket.emit("CHAT REFRESH", {
                        socketId: response.socket_ids,
                    });
                    socket.emit("SEND MESSAGE", {
                        roomId: $("#currentRoomId").val(),
                    });

                    $("#message_details_id").html(response.message);
                    $(".sent_messages_loader").html("send");
                    $('#focus-bottom').focus();

                }
            });
        }

        function msgsent(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                $("#send_message").trigger('click');
            }
        }

        function chatrefresh() {
            $.ajax({
                url: "{{ route('user.chat.index') }}",
                type: "GET",
                cache: false,
                success: function(html) {
                    $("#message_chat_list_id").html(html);
                    var currentRoomId = $("#currentRoomId").val();
                    $(".service_content-" + currentRoomId).addClass("active");
                }
            });
        }

        $(".alert").fadeTo(3000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });

        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(element).select();
            document.execCommand("copy");
            $temp.remove();
            alert("Link Copied");
        }
    </script>
    <script src="{{ asset('new_assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/sweet-alert-ajax.js') }}"></script>
</body>

</html>
