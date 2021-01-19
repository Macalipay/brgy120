@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    Barangay Official
                </h1>
            </div>
            <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Barangay Official Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Barangay Official
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
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Message/Quote</th>
                                                <th>Picture</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($councils as $key => $council)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$council->id}}></a>
                                                        <a href="{{url('council/destroy/' . $council->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                                    </td>
                                                    <td>{{ $council->firstname . ' ' . $council->middlename . ' ' . $council->lastname}}</td>
                                                    <td>{{ $council->position}}</td>
                                                    <td>{{ $council->message}}</td>
                                                    <td> <img src="{{asset('/images/council/'.$council->picture)}}" height="30px" width="30px"> </td>
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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Barangay Official</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('council/save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Middle Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Position</label>
                            <div class="col-sm-9">
                                <select id="position" name="position" class="form-control">
                                    <option value="Kagawad">Kagawad</option>
                                    <option value="Treasure">Treasurer</option>
                                    <option value="Secretary">Secretary</option>
                                    <option value="Admin Stuff">Admin Stuff</option>
                                    <option value="Barangay Chairman">Barangay Chairman</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Message/Quote</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="message" id="message" placeholder="Enter Message/Quote"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3 text-sm-right">Picture</label>
                            <div class="col-sm-9">
                                <input type="file" name="picture" class="form-control">
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
                url: '/council/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Barangay Official');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', 'council/update/' + data.councils.id);
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
                $('.modal-title').text('Add Barangay Official');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'council/save');

            })
        });
    </script>
@endsection