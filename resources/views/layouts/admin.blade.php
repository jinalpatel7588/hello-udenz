<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="">
    <meta name="Author" content="">
    <link rel="icon" href="{{ asset('new_assets/images/small-black-logo.png') }}" type="image/x-icon" />
    <title>Udenz Hello</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
    <meta name="Keywords" content="" />
    @php $siteSetting = ''; @endphp
    <title>{{ $siteSetting ? $siteSetting->title : '' }}</title>
    @yield('font-link')
    @include('includes.admin.head')
</head>

<body>

    <div id="wrapper">
        @include('includes.admin.header')
        @if (Route::currentRouteName() != 'admin.templates.edit' &&
                Route::currentRouteName() != 'admin.templates.create' &&
                Request()->route()->getPrefix() != 'chapter/templates' &&
                Route::currentRouteName() != 'payment.index')
            @include('includes.admin.sidebar')
        @else
            <style>
                .content-page {
                    margin-left: 0px;
                }


                .footer {
                    left: 0;
                }
            </style>
        @endif


        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('breadcrumb')
                    @include('includes.message')
                    @yield('content')
                </div>
            </div>
            @include('includes.admin.footer')
        </div>
    </div>
</body>

</html>
