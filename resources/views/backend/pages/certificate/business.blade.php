@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    Business Permit
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Business Permit Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Business
                                </button>
                            </h5>
                        </div>
                        @include('backend.partials.flash-message')
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Action</th>
                                                <th>Code</th>
                                                <th>Resident</th>
                                                <th>Business Name</th>
                                                <th>Business Nature</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Issued Date</th>
                                                <th>Purpose</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($businesses as $key => $business)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td class="table-action">
                                                        <a href="{{url('business/template/' . $business->id)}}" target="_blank"><i class="align-middle fas fa-fw fa-print"></i></a>
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$business->id}}></a>
                                                        <a href="{{url('business/destroy/' . $business->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                                    </td>
                                                    <td>{{ $business->code}}</td>
                                                    <td>{{ $business->youth->firstname . ' ' . $business->youth->lastname}}</td>
                                                    <td>{{ $business->business_name}}</td>
                                                    <td>{{ $business->business_nature}}</td>
                                                    <td>{{ $business->business_location}}</td>
                                                    <td>{{ $business->renewal}}</td>
                                                    <td>{{date('M-d-y', strtotime($business->issued_date))}}</td>
                                                    <td>{{ $business->purpose}}</td>
                                                    
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
                        <h5 class="modal-title">Add Business</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <form id="modal-form" action="{{url('business/save')}}" method="post">
                            @csrf
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Resident</label>
                            <select id="youth_id" name="youth_id" class="form-control" required>
                                <option selected disabled hidden>Choose Resident</option>
                                @foreach ($youths as $youth)
                                    <option value="{{$youth->id}}">{{$youth->firstname . ' ' . $youth->lastname}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Business Name</label>
                            <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Business Name">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Business Nature</label>
                            <input type="text" class="form-control" id="business_nature" name="business_nature" placeholder="Enter Business Name">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Business Location</label>
                            <input type="text" class="form-control" id="business_location" name="business_location" placeholder="Enter Business Name">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="New">New</option>
                                <option value="Renewal">Renewal</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Issued Date</label>
                            <input type="date" class="form-control" id="issued_date" name="issued_date" value="<?php echo date('Y-m-d'); ?>">
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
                url: '/business/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Business');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', 'business/update/' + data.businesses.id);
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
                $('.modal-title').text('Add Business');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'business/save');

            })
        });
    </script>
@endsection