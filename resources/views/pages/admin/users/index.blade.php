@extends('layouts.admin')
@section('css')
    <style>
        .table-heading thead th {
            font-size: 16px;
            font-weight: 600;

        }

        .table-heading td,
        .table th,
        .btn-sm {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
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
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title mb-4 d-flex justify-content-between"><span></span><a
                        class="btn btn-success mt-4 mt-sm-0" href="{{ route('admin.users.create') }}"><i
                            class="fas fa-plus"></i>
                        Add New</a></h4>
                <div class="table-responsive">
                    <table class="table table-striped m-0 mb-3 table-heading">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Accept</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $users->perPage() * ($users->currentPage() - 1) + 1; ?>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status == '1')
                                                <button type="button"
                                                    class="btn btn-sm btn-success waves-effect waves-light"
                                                    onclick="sweetAlertAjax('PATCH','{{ route('admin.users.status', $user->id) }}', 'Are You Sure To Deactive')">Active</button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                                    onclick="sweetAlertAjax('PATCH','{{ route('admin.users.status', $user->id) }}', 'Are You Sure To Active')">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                    <button type="button" data-toggle="tooltip" data-placement="top"
                                                        title="edit"
                                                        class="btn btn-facebook waves-effect waves-light btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <button type="button" data-toggle="tooltip" data-placement="top"
                                                    title="delete"
                                                    class="ml-2 btn btn-sm btn-danger waves-effect waves-light"
                                                    onclick="sweetAlertAjax('delete','{{ route('admin.users.destroy', $user->id) }}', 'Are you sure you want to delete?')">
                                                    <i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                        <td><a target="_blank" href="{{ route('admin.users.login', $user->id) }}">
                                                <button type="button" data-toggle="tooltip" data-placement="top"
                                                    title="Login" class="btn btn-facebook waves-effect waves-light btn-sm">
                                                    Login
                                                </button>
                                            </a></td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="10">No Data Found </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
