@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    Seminar
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Seminar
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Event
                                </button>
                            </h5>
                        </div>
                        @include('backend.partials.flash-message')
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Picture</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($seminars as $key => $seminar)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $seminar->title}}</td>
                                                    <td>{{ $seminar->description}}</td>
                                                    <td>{{ $seminar->type}}</td>
                                                    <td> <img src="{{asset('/images/seminar/'.$seminar->picture)}}" height="30px" width="30px"> </td>
                                                    <td>{{ $seminar->status}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$seminar->id}}></a>
                                                        <a href="{{url('seminar/destroy/' . $seminar->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
        {{-- MODAL --}}
        <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Seminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('seminar/save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Type</label>
                            <div class="col-sm-9">
                                <select id="type" name="type" class="form-control">
                                    <option value="Seminar">Seminar</option>
                                    <option value="Event">Event</option>
                                    <option value="Project">Project</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Picture</label>
                            <div class="col-sm-9">
                                <input type="file" name="picture" id="picture" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Status</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-button">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        function edit(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/seminar/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Seminar');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', 'seminar/update/' + data.seminars.id);
                }
            });

        }

        $(function() {
            $('#datatables').DataTable({
                responsive: true
            });

            $('.edit').click(function(){
                edit(this.id);
            });

            $('.add').click(function(){
                $('.modal-title').text('Add Seminar');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'seminar/save');

            })
        });
    </script>
@endsection