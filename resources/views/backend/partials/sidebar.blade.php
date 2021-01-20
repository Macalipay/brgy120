<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="index.html">
  <svg>
    <use xlink:href="#ion-ios-pulse-strong"></use>
  </svg>
  Barangay 120
</a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="{{ asset('docs/img/avatars/avatar.jpg') }}" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
            <div class="font-weight-bold">{{ Auth::user()->name }}</div>
            {{-- <small>Front-end Developer</small> --}}
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('dashboard') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-chart-pie" style="color:#153d77"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#resident" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-users"></i> <span class="align-middle">Resident</span>
                </a>
                <ul id="resident" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('youth') }}">Resident Information</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('cicl') }}">Blotter</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('pwd_list') }}">PWD</a></li>
                </ul>
                <a href="#certificate" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-stamp"></i> <span class="align-middle">Certificate Issuance</span>
                </a>
                <ul id="certificate" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('certification') }}">Certification</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('indigency') }}">Certificate of Indigency</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('business') }}">Business Permit</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('#') }}">Barangay Clearance</a></li>
                </ul>

                <a href="#identification" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-id-card"></i> <span class="align-middle">ID Issuance</span>
                </a>
            <ul id="identification" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('#') }}">Create ID</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('#') }}">Issued ID</a></li>
                </ul>

                <a class="sidebar-link" href="{{ url('council') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-sitemap" style="color:#153d77"></i> <span class="align-middle">Barangay Officials</span>
                </a>
                <a class="sidebar-link" href="{{ url('project') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-tasks" style="color:#153d77"></i> <span class="align-middle">Project</span>
                </a>

                <a class="sidebar-link" href="{{ url('seminar') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-calendar-week" style="color:#153d77"></i> <span class="align-middle">Seminar/Event</span>
                </a>

            </li>

            <li class="sidebar-header">
                Maintenance
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('street') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-road" style="color:#153d77"></i> <span class="align-middle">Street</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('case') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-suitcase" style="color:#153d77"></i> <span class="align-middle">Case Type</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('pwd') }}">
                    <i class="align-middle mr-2 fa fa-fw fa-wheelchair" style="color:#153d77"></i> <span class="align-middle">Type of Disability</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#admin" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-user"></i> <span class="align-middle">Administrator</span>
                </a>
                <ul id="admin" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Account</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Extras
            </li>
            <li class="sidebar-item">
                <a href="#report" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-file-csv"></i> <span class="align-middle">Reports</span>
                </a>
                <ul id="report" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('report/resident') }}">Total Resident</a></li>
                </ul>
                <ul id="report" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('report/blotter') }}">Total Blotter</a></li>
                </ul>
                <ul id="report" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('report/pwd') }}">Total PWD</a></li>
                </ul>
                <ul id="report" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('report/lgbtqi') }}">Total LGBTQI</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#document" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-fw fa-book"></i> <span class="align-middle">Documentation</span>
                </a>
                <ul id="document" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ url('elfinder') }}">Files</a></li>
                </ul>
            </li>
           
        </ul>
    </div>
</nav>