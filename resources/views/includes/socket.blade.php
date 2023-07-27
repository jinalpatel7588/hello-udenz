<script src="https://cdn.socket.io/3.1.3/socket.io.min.js"
    integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous">
</script>
<script>
    var socket = io.connect('http://13.50.221.60', {
        reconnection: false,
        secure: true
    });
    setTimeout(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('user.store.socket') }}",
            data: {
                "_token": '{{ csrf_token() }}',
                "socket_id": socket.id,
            },
            success: function(response) {},
        });
        console.log("socket: " + socket.id);
    }, 2000);
    socket.on('RECEIVER', function(data) {
        if (data.type == "chat_refresh") {
            chatrefresh();
        }
        if (data.type == "receive_message") {
            message_details(data.roomId);
        }
    });
</script>
