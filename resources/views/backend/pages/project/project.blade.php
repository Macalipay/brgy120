@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    Project
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Project
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Project
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
                                                <th>Date</th>
                                                <th>Location</th>
                                                <th>Date/Time</th>
                                                <th>Attendees</th>
                                                <th>Lead</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $key => $project)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $project->title}}</td>
                                                    <td>{{ $project->description}}</td>
                                                    <td>{{ $project->date_implemented}}</td>
                                                    <td>{{ $project->location}}</td>
                                                    <td>{{ $project->date_time}}</td>
                                                    <td>{{ $project->attendees}}</td>
                                                    <td>{{ $project->status}}</td>
                                                    <td> <img src="{{asset('/images/project/'.$project->picture)}}" height="30px" width="30px"> </td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$project->id}}></a>
                                                        <a href="{{url('project/destroy/' . $project->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
                        <h5 class="modal-title">Add Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('project/save')}}" method="post" enctype="multipart/form-data">
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
                            <label class="col-form-label col-sm-3 text-sm-right">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date_implemented" id="date_implemented" placeholder="Enter Date Implemented">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Requirements</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="requirements" id="requirements" placeholder="Enter Requirements">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Registration</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="registration" id="registration" placeholder="Enter Registration Process">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Date/Time</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="date_time" id="date_time" placeholder="Enter Date/Time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Attendees</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="attendees" id="attendees" placeholder="Enter Attendees">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Lead By</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lead_by" id="lead_by" placeholder="Enter Lead By">
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
                                    <option value="Done">Done</option>
                                    <option value="Upcoming">Upcoming</option>
                                    <option value="Hold">Hold</option>
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
                url: '/project/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('#modal-form').attr('action', 'project/update/' + data.projects.id);
                    $('.modal-title').text('Update Project');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
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
                $('.modal-title').text('Add Project');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'project/save');
            })
        });
    </script>
@endsection