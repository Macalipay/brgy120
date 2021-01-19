@extends('backend.master.template')

@push('head')
        <link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/elfinder.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/theme.css') }}">

        <script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>

        @if($locale)
            <script src="{{ asset($dir."/js/i18n/elfinder.$locale.js") }}"></script>
        @endif

        <script type="text/javascript" charset="utf-8">
       
            $().ready(function() {
                $('#elfinder').elfinder({
                    @if($locale)
                        lang: '{{ $locale }}', // locale
                    @endif
                    customData: { 
                        _token: '{{ csrf_token() }}'
                    },
                    handlers : {
                        add : function(event, instance) {

                            var uploadedFiles = event.data.added;
                            for (i in uploadedFiles) {
                                var file = uploadedFiles[i];
                                newFileSize += file.size;
                                console.log(i);
                            }

                            var limitSize = '{{env('MAX_TOTAL_UPLOAD_SIZE')}}';
                            var totalSize = currentFolderSize + newFileSize;

                            if(totalSize > limitSize){
                                shouldRejectUpload = true;
                            }
                        },
                    },
                    url : '{{ route("elfinder.connector") }}', 
                    soundPath: '{{ asset($dir.'/sounds') }}'
                });
            });
        </script>
@endpush

@section('content')
<div class="main">
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    DOCUMENT MANAGEMENT
                </h1>
                <p class="header-subtitle">Upload all Important Documents</p>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card flex-fill w-100 col-xl-11 col-xxl-11">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Documents</h5>

                        </div>
                        
                        <h1 class="display-5 mt-1 mb-3">
                            <div id="elfinder"></div>
                        </h1>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="chartjs-dashboard-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>
</div>
@endsection

