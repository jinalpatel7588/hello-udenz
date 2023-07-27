@extends('layouts.admin')

@section('css')
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-primary bg-soft-primary">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i
                            class="mdi mdi mdi-account-supervisor font-30 widget-icon rounded-circle avatar-title text-primary"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Regions">Users</p>
                        <h2><span data-plugin="counterup">{{ $users }}</span></h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
