@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid ">
            <div class="header">
                <h1 class="header-title">
                    Resident Other Information
                </h1>
            </div>
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Additional Information Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Information
                                </button>
                            </h5>
                        </div>
                        @include('backend.partials.flash-message')
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Action</th>
                                                <th>Resident</th>
                                                <th>Picture</th>
                                                <th>Signature</th>
                                                <th>Right Thumb</th>
                                                <th>Left Thumb</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($informations as $key => $information)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$information->id}}></a>
                                                        <a href="{{url('other/destroy/' . $information->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                                    </td>
                                                    <td>{{ $information->youth->firstname . ' ' . $information->youth->lastname}}</td>
                                                    <td><img src="{{asset('/images/other/'.$information->picture)}}" height="30px" width="30px"></td>
                                                    <td><img src="{{asset('/images/other/'.$information->signature)}}" height="30px" width="30px"></td>
                                                    <td><img src="{{asset('/images/other/'.$information->right_thumb)}}" height="30px" width="30px"></td>
                                                    <td><img src="{{asset('/images/other/'.$information->left_thumb)}}" height="30px" width="30px"></td>
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
                        <h5 class="modal-title">Add Resident</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('other/save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Resident</label>
                                <div class="col-sm-9">
                                    <select id="youth_id" name="youth_id" class="form-control">
                                        <option selected disabled hidden>Choose Resident</option>
                                        @foreach ($youths as $youth)
                                            <option value="{{$youth->id}}">{{$youth->firstname . ' ' . $youth->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Picture</label>
                                <div class="col-sm-9">
                                    <input type="file" id="picture" name="picture" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Signature</label>
                                <div class="col-sm-9">
                                    <input type="file" id="signature" name="signature" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Right Thumb Mark</label>
                                <div class="col-sm-9">
                                    <input type="file" id="right_thumb" name="right_thumb" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Left Thumb Mark</label>
                                <div class="col-sm-9">
                                    <input type="file" id="left_thumb" name="left_thumb" class="form-control">
                                </div>
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
                url: '/other/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Resident');
                    $('.submit-button').text('Update');
                    $('#modal-form').attr('action', 'other/update/' + data.informations.id);
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
                $('.modal-title').text('Add Information');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'other/save');

            })
        });
    </script>
@endsection