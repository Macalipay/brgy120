@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    Blotter
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Blotter Record
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Blotter
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
                                                <th>Resident</th>
                                                <th>Case</th>
                                                <th>Date Happen</th>
                                                <th>Date Filled</th>
                                                <th>Complainant</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cicls as $key => $cicl)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $cicl->youth->firstname . ' ' . $cicl->youth->lastname}}</td>
                                                    <td>{{ $cicl->case_type->case}}</td>
                                                    <td>{{date('M-d-y', strtotime($cicl->date_happen))}}</td>
                                                    <td>{{date('M-d-y', strtotime($cicl->date_filed))}}</td>
                                                    <td>{{ $cicl->complainant}}</td>
                                                    <td>{{ $cicl->remarks}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$cicl->id}}></a>
                                                        <a href="{{url('cicl/destroy/' . $cicl->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
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
                        <h5 class="modal-title">Add Blotter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('cicl/save')}}" method="post">
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
                                <label class="col-form-label col-sm-3 text-sm-right">Case</label>
                                <div class="col-sm-9">
                                    <select id="case_id" name="case_id" class="form-control">
                                        <option selected disabled hidden>Choose Case</option>
                                        @foreach ($case_types as $case_type)
                                            <option value="{{$case_type->id}}">{{$case_type->case}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Date Happen</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date_happen" id="date_happen" placeholder="Enter Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Date Filed</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date_filed" id="date_filed" placeholder="Enter Date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Complainants</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="complainant" id="complainant" placeholder="Enter Complainant">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Remarks</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks">
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
                url: '/cicl/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Blotter');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', 'cicl/update/' + data.cicls.id);
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
                $('.modal-title').text('Add Blotter');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'cicl/save');

            })
        });
    </script>
@endsection