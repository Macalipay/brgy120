@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    LGBTQI Reports
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">LGBTQI Report Screen </h5>
                        </div>
                        @include('backend.partials.flash-message')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>House Number</th>
                                                <th>House street</th>
                                                <th>Contact</th>
                                                <th>Precinct No</th>
                                                <th>Birthday</th>
                                                <th>LGBTQI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($youths as $key => $youth)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $youth->firstname . ' ' . $youth->lastname}}</td>
                                                    <td>{{ $youth->gender}}</td>
                                                    <td>{{ $youth->house_number}}</td>
                                                    <td>{{ $youth->street->street}}</td>
                                                    <td>{{ $youth->contact}}</td>
                                                    <td>{{ $youth->precinct_no}}</td>
                                                    <td>{{date('M-d-y', strtotime($youth->birthday))}}</td>
                                                    <td>{{ $youth->lgbtqi_value}}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </main>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script>
        $(function() {
         
            $('#datatables').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        });
    </script>
@endsection