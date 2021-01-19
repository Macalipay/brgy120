@extends('backend.master.template')
@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="header">
                <h1 class="header-title">
                    List of Resident
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Resident Screen
                                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#defaultModalPrimary" style="float:right">
                                    Add Resident
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
                                                <th>Gender</th>
                                                <th>House Number</th>
                                                <th>House street</th>
                                                <th>Birthday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($youths as $key => $youth)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td class="table-action">
                                                        <a href="#" class="align-middle fas fa-fw fa-pen edit" title="Edit" data-toggle="modal" data-target="#defaultModalPrimary" id={{$youth->id}}></a>
                                                        <a href="{{url('youth/destroy/' . $youth->id)}}" onclick="alert('Are you sure you want to Delete?')"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                                    </td>
                                                    <td>{{ $youth->firstname . ' ' . $youth->lastname}}</td>
                                                    <td>{{ $youth->gender}}</td>
                                                    <td>{{ $youth->house_number}}</td>
                                                    <td>{{ $youth->street->street}}</td>
                                                    <td>{{date('M-d-y', strtotime($youth->birthday))}}</td>
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
                        <form id="modal-form" action="{{url('youth/save')}}" method="post">
                            @csrf
                        <label style="font-weight: bold;font-style: italic">Resident Information</label>
                        <div class="form-group col-md-12">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right" style="padding-left: 5px; !important"> Middle Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middle Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Height</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="height" id="height" placeholder="Enter Height" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Weigth</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Height" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Gender</label>
                                <div class="col-sm-6">
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <label class="custom-control custom-checkbox mt-1">
                                    <input type="checkbox" class="custom-control-input" id="lgbtqi" name="lgbtqi">
                                    <span class="custom-control-label">LGBTQI</span>
                                </label>
                            </div>
                            <div class="form-group row lgbtqi_row">
                                <label class="col-form-label col-sm-3 text-sm-right" style="padding-left: 0.1rem !important; padding-right: 0.1rem !important">LGBTQI <small>(Optional)</small></label>
                                <div class="col-sm-9">
                                    <select id="lgbtqi_value" name="lgbtqi_value" class="form-control">
                                        <option selected disabled hidden>Choose Status</option>
                                        <option value="Lesbian">Lesbian</option>
                                        <option value="Gay">Gay</option>
                                        <option value="Bisexual">Bisexual</option>
                                        <option value="Transgender">Transgender</option>
                                        <option value="Queer">Queer</option>
                                        <option value="Intersex">Intersex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right"></label>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="student" id="student">
                                    <span class="custom-control-label">Student</span>
                                </label>
                                <label class="custom-control custom-checkbox ml-2">
                                    <input type="checkbox" class="custom-control-input" id="solo_parent" name="solo_parent">
                                    <span class="custom-control-label">Solo Parent</span>
                                </label>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">House #</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="house_number" id="house_number" placeholder="Enter House Number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Street</label>
                                <div class="col-sm-9">
                                    <select id="street_id" name="street_id" class="form-control" required>
                                        <option selected disabled hidden>Choose Street</option>
                                        @foreach ($streets as $street)
                                            <option value="{{$street->id}}">{{$street->street}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Birthday</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="birthday" id="birthday" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Birth Place</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="birthday_place" id="birthday_place" placeholder="Enter Birth Place" required> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Contact #</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter 9 digit number" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right" style="padding-left: 3px;">Marital Status</label>
                                <div class="col-sm-9">
                                    <select id="marital_status" name="marital_status" class="form-control" required>
                                        <option selected disabled hidden>Choose Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widow">Widow</option>
                                    </select>
                                </div>
                            </div>


                            

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Residing Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="residing_date" id="residing_date" required>
                                </div>
                            </div>

                            <label style="font-weight: bold;font-style: italic"> Resident Identification</label>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Precinct No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="precinct_no" id="precinct_no" placeholder="Enter your Precinct No" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">TIN No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tin" id="tin" placeholder="Enter your TIN No." required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Philhealth ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="philhealth" id="philhealth" placeholder="Enter your Philhealth" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Pag-Ibig ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pagibig" id="pagibig" placeholder="Enter your Pag-ibig" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">SSS ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="sss" id="sss" placeholder="Enter your SSS" required>
                                </div>
                            </div>

                            <label style="font-weight: bold;font-style: italic"> Contact Person </label>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Contact Person</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Contact Person" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Relation</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contact_relation" id="contact_relation" placeholder="Enter Relation to Contact Person" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Contact</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact Number" required>
                                </div>
                            </div>

                            <label class="mb-1" style="font-weight: bold;font-style: italic">Educational Attainment, Skills and Occupation</label>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Educational Attainment</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="educational_attainment" id="educational_attainment" placeholder="Enter Educational Attainment" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Course</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="course" id="course" placeholder="Enter Course" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Skills</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="skills" id="skills" placeholder="Enter Skills" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Occupation</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter your Occupation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Income</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="income" id="income" placeholder="Enter Income" required>
                                </div>
                            </div>

                            <label style="font-weight: bold;font-style: italic"> Other Information </label>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Religion</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="religion" id="religion" placeholder="Enter your Religion" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right">Spouse</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="spouse" id="spouse" placeholder="Enter your Spouse" required>
                                </div>
                            </div>
                            <div class="form-group row children_row">
                                <label class="col-form-label col-sm-3 text-sm-right">Children</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="number_of_children" id="number_of_children" placeholder="Enter Number of Children" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right" placeholder="Enter Mother's Name" style="padding-left: 0.25rem !important; padding-right: 0.25rem !important">Mother's Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter Mother's Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3 text-sm-right" placeholder="Enter Father's Name" style="padding-left: 0.25rem !important; padding-right: 0.25rem !important">Father's Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father's Name" required>
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
                url: '/youth/edit/' + id,
                method: 'get',
                data: {

                },
                success: function(data) {
                    $('.modal-title').text('Update Youth');
                    $('.submit-button').text('Update');
                        $.each(data, function() {
                            $.each(this, function(k, v) {
                                if(k == 'lgbtqi') {
                                    if(v == 'on') {
                                        $('.lgbtqi_row').show();
                                        $('#lgbtqi').prop("checked", true);
                                    } else {
                                        $('#lgbtqi').prop("checked", false);
                                    }
                                } if (k == 'student') {
                                    if(v == 'on') {
                                        $('#student').prop("checked", true);
                                    } else {
                                        $('#student').prop("checked", false);
                                    }
                                } if (k == 'pregnant') {
                                    if(v == 'on') {
                                        $('#pregnant').prop("checked", true);
                                    } else {
                                        $('#pregnant').prop("checked", false);
                                    }
                                } if (k == 'solo_parent') {
                                    if(v == 'on') {
                                        $('#solo_parent').prop("checked", true);
                                    } else {
                                        $('#solo_parent').prop("checked", false);
                                    }
                                }
                                $('#'+k).val(v);
                            });
                        });
                    $('#modal-form').attr('action', 'youth/update/' + data.youths.id);
                }
            });
        }

        $(function() {
            $('.lgbtqi_row').hide();

            $('#datatables').DataTable({
                responsive: true
            });

            $('.edit').click(function(){
                edit(this.id);
            });

            $('#lgbtqi').click(function() {
              if($('#lgbtqi').prop("checked") == true) {
                    $('.lgbtqi_row').show();
              }
              else if($('#lgbtqi').prop("checked") == false) {
                    $('.lgbtqi_row').hide();
              }
            });

            $('.add').click(function(){
                // $(':input').val('');
                // $(':input').prop('checked', false);
                $('.lgbtqi_row').hide();

                $('.modal-title').text('Add Resident');
                $('.submit-button').text('Add');
                $('#modal-form').attr('action', 'youth/save');

            })
        });
    </script>
@endsection