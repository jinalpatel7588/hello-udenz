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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Waiting List</li>
                </ol>
            </div>
            <h4 class="page-title">Waiting List</h4>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table table-striped m-0 mb-3 table-heading">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $waitingList->perPage() * ($waitingList->currentPage() - 1) + 1; ?>
                            @if (count($waitingList) > 0)
                                @foreach ($waitingList as $waitingLists)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $waitingLists->name }}</td>
                                        <td>{{ $waitingLists->number }}</td>
                                        <td>{{ $waitingLists->waitingEmail }}</td>
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
                    {{ $waitingList->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
