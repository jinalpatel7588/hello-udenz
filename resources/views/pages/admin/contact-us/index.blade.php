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
                    <li class="breadcrumb-item active" aria-current="page">Contact Us Inquiries</li>
                </ol>
            </div>
            <h4 class="page-title">Contact Us Inquiries</h4>
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
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $contact->perPage() * ($contact->currentPage() - 1) + 1; ?>
                            @if (count($contact) > 0)
                                @foreach ($contact as $contacts)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $contacts->name }}</td>
                                        <td>{{ $contacts->email }}</td>
                                        <td>{{ $contacts->mobile_number }}</td>
                                        <td>{{ $contacts->subject }}</td>
                                        <td>{{ $contacts->message }}</td>
                                        <td>
                                            <div class="d-flex">

                                                <button type="button" data-toggle="tooltip" data-placement="top"
                                                    title="delete"
                                                    class="ml-2 btn btn-sm btn-danger waves-effect waves-light"
                                                    onclick="sweetAlertAjax('delete','{{ route('admin.contactUs.destroy', $contacts->id) }}', 'Are you sure you want to delete?')">
                                                    <i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
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
                    {{ $contact->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
