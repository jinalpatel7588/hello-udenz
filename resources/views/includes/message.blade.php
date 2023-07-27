@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="uil uil-check me-2"></i>
        {!! \Session::get('success') !!}
    </div>
@endif

@if (\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="uil uil-times me-2"></i>
        {!! \Session::get('error') !!}
    </div>
@endif
