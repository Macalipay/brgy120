@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    PWD List
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">PWD List Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add PWD
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
                                                <th>Youth</th>
                                                <th>Type of Disability</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pwd_lists as $key => $pwd_list)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $pwd_list->youth->firstname . ' ' . $pwd_list->youth->lastname}}</td>
                                                    <td>{{ $pwd_list->pwd->pwd}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$pwd_list->id}}></a>
                                                        <a href="{{url('pwd_list/destroy/' . $pwd_list->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
                        <h5 class="modal-title">Add PWD Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('pwd_list/save')}}" method="post">
                            @csrf
                            <div class="form-group row lgbtqi_row">
                                <label class="col-form-label col-sm-3 text-sm-right">Youth</label>
                                <div class="col-sm-9">
                                    <select id="youth_id" name="youth_id" class="form-control">
                                        <option selected disabled hidden>Choose Youth</option>
                                        @foreach ($youths as $youth)
                                            <option value="{{$youth->id}}">{{$youth->firstname . ' ' . $youth->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row lgbtqi_row">
                                <label class="col-form-label col-sm-3 text-sm-right">Disability</label>
                                <div class="col-sm-9">
                                    <select id="pwd_id" name="pwd_id" class="form-control">
                                        <option selected disabled hidden>Choose Disability</option>
                                        @foreach ($pwds as $pwd)
                                            <option value="{{$pwd->id}}">{{$pwd->pwd}}</option>
                                        @endforeach
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
                url: '/pwd_list/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update PWD Type');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', 'pwd_list/update/' + data.pwd_lists.id);
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
                $('.modal-title').text('Add PWD Type');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'pwd_list/save');

            })
        });
    </script>
@endsection