@extends('backend.master.template')
@section('content')
<div class="main">
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Dashboard
                </h1>
                <p style="color: white">Barangay 120 Zone 10 District II</p>
            </div>

            <div class="row">
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Residents</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="align-middle" data-feather="users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-2 mb-4">{{App\Youth::count()}}</h1>
                                        <div class="mb-0">
                                            <span class="text-default">Total Number of Resident in Barangay 120
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total PWD</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="align-middle fas fa-wheelchair"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-2 mb-4">{{App\PwdList::count()}}</h1>
                                        <div class="mb-0">
                                            <span class="text-default"></span>Total PWD in Barangay 120
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Total Blotter Record</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="align-middle fas fa-gavel"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-2 mb-4">{{App\Cicl::count()}}</h1>
                                        <div class="mb-0">
                                            <span class="text-default">Total Number of Blotter</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">LGBTQI</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="align-middle fas fa-transgender"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-2 mb-4">{{App\Youth::where('lgbtqi', 'on')->count()}}</h1>
                                        <div class="mb-0">
                                            <span class="text-default"> Total Number of Resident that belongs on LGBTQI </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-6 d-flex">
                    <div class="card flex-fill w-100">
                        
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>

                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td><i class="fas fa-circle text-primary fa-fw"></i>Male</td>
                                            <td class="text-right">{{ App\Youth::where('gender', 'Male')->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-circle text-warning fa-fw"></i>Female</td>
                                            <td class="text-right">{{ App\Youth::where('gender', 'Female')->count() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-3 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Certificate</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle fas fa-file-word"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">{{App\Certificate::count()}}</h1>
                            <div class="mb-0">
                                <span>Total Number of Issued Certificate
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Certificate of Indigency</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle fas fa-file-word"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">{{App\Indigency::count()}}</h1>
                            <div class="mb-0">
                                <span class="text-default">Total Number of Issued Certificate of Indigency
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Barangay Clearance</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle fas fa-file-word"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">{{App\PwdList::count()}}</h1>
                            <div class="mb-0">
                                <span class="text-default">Total Number of Issued Barangay Clearance
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Barangay Business Permit</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle fas fa-file-word"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">{{App\Business::count()}}</h1>
                            <div class="mb-0">
                                <span class="text-default">Total Number of Issued Barangay Business Permit
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xxl-12 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Resident per Street</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <table id="datatables" class="table table-striped my-0">
									<thead>
										<tr>
											<th>Street</th>
											<th class="text-right">Number of Resident</th>
											<th class="d-none d-xl-table-cell w-75">% Resident</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($street_counts as $street)
                                            <tr>
                                                <td>{{ $street->street->street }}</td>
                                                <td class="text-right">{{ $street->total }}</td>
                                                <td class="d-none d-xl-table-cell">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary-dark" role="progressbar" style="width: {{ ($street->total / $total)* 100 }}%;" aria-valuenow="{{ ($street->total / $total)* 100 }}" aria-valuemin="0" aria-valuemax="100">{{ ($street->total / $total)* 100 }}%</div>
                                                    </div>
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
    </main>
</div>
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#datatables').DataTable({
                responsive: true
            });

        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/dashboard/data',
                method: 'get',
                data: {

                },
                success: function(data) {
                    console.log(data.male);
                    $(function() {
                        // Pie chart
                        new Chart(document.getElementById("chartjs-dashboard-pie"), {
                            type: 'pie',
                            data: {
                                labels: ["Male", "Female"],
                                datasets: [{
                                    data: [data.male, data.female],
                                    backgroundColor: [
                                        window.theme.primary,
                                        window.theme.warning,
                                        "#E8EAED"
                                    ],
                                    borderColor: "transparent"
                                }]
                            },
                            options: {
                                responsive: !window.MSInputMethodContext,
                                maintainAspectRatio: false,
                                legend: {
                                    display: false
                                },
                                cutoutPercentage: 75
                            }
                        });
                    });
                }
            });
    });

</script>
@endsection