@extends('layouts.admin')
@section('css')
@endsection

@section('breadcrumb')
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </div>
            <h4 class="page-title">Users</h4>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}" id="chapterForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="parsley-input col-md-6  mg-b-20">
                                <label>{{ __('Name') }}<span class="tx-danger">*</span></label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
                                    class="form-control" maxlength="60">
                            </div>
                            <div class="parsley-input col-md-6  mg-b-20">
                                <label>{{ __('Email') }}<span class="tx-danger">*</span></label>
                                <input type="email" value="{{ old('email') }}" name="email" id="email"
                                    class="form-control" maxlength="60">
                            </div>
                            <div class="parsley-input col-md-6  mg-b-20">
                                <label>{{ __('Password') }}<span class="tx-danger">*</span></label>
                                <input type="password" value="{{ old('password') }}" name="password" id="password"
                                    class="form-control" minlength="4" maxlength="30">
                                <div>
                                    <input type="checkbox" class="mr-2" onclick="showPassword()">Show Password
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 col-md-4">
                                <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        $(document).ready(function() {
            $('#chapterForm').validate({
                ignore: [],
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Name"
                    },
                    email: {
                        required: "Please Enter Email"
                    },
                    password: {
                        required: "Please Enter Password"
                    },
                }
            });
        });
    </script>
@endsection
