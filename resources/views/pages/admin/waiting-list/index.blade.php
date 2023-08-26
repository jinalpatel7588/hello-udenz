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
                <a href="{{ route('admin.waitingList.exportCSV') }}"class="btn btn-sm btn-success waves-effect waves-light csv">export CSV</a>
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
<script>
        // Document ready event
        $(csv).on(click ,function() {
            // Make an AJAX request to trigger the CSV download
            $.ajax({
                url: 'admin/waiting-list/export-csv', // Change to the appropriate URL
                method: 'GET',
                xhrFields: {
                    responseType: 'blob' // Set the response type to blob
                },
                success: function(data) {
                    // Create a Blob object from the response data
                    var blob = new Blob([data], { type: 'text/csv' });

                    // Create a URL for the Blob
                    var url = window.URL.createObjectURL(blob);

                    // Create a link element and simulate a click event to trigger download
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'contacts.csv'; // Set the desired file name
                    a.click();

                    // Clean up the URL and Blob object
                    window.URL.revokeObjectURL(url);
                }
            });
        });
    </script>
@endsection
