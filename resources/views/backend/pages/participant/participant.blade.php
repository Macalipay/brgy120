@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    Participant
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Participant List</h5>
                        </div>
                        @include('backend.partials.flash-message')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>Name</th>
                                                <th>Picture</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($participants as $key => $participant)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $participant->project->title}}</td>
                                                    <td>{{ $participant->participants}}</td>
                                                    <td> <img src="{{asset('/images/participant/'.$participant->picture)}}" height="30px" width="30px"> </td>
                                                    <td class="table-action">
                                                        <a href="{{url('participant/destroy/' . $participant->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                                    </td>
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

    <script>
        $(function(){
            $('#datatables').DataTable({
                responsive: true
            });
        })
    </script>
@endsection