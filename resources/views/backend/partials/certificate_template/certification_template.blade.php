<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>BARANGAY 120</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        body {
            line-height: 8px;
            margin: 20px;
            padding: 20px;
        }
        .text-right {
            text-align: right;
        }
        hr {
            display: block;
            height: 3px;
            background: transparent;
            width: 100%;
            margin: 1px;
            border: none;
            border-top: solid 3px black;
        }
        .content {
            line-height: 30px;
            
        }
        b{
            text-transform: uppercase;
        }
  
    </style>
</head>
<body class="login-page" onload="window.print()" >
    <div>
        <div class="row">
            <br>
            <div class="col-xs-3">
                <img src="{{ asset('/images/logo/logo.png') }}" alt="logo">
            </div>

            <div class="col-xs-6">
                <p class="text-center" style="font-weight: bold; font-size: 20px">REPUBLIC OF THE PHILIPPINES</p><br>
                <p class="text-center" style="font-weight: bold; font-size: 15px">NATIONAL CAPITAL REGION</p><br>
                <p class="text-center" style="font-weight: bold; font-size: 15px">CITY OF CALOOCAN</p><br>
                <p class="text-center" style="font-weight: bold; font-size: 30px"> BARANGAY 120</p><br>
                <p class="text-center" style="font-weight: bold; font-size: 15px">GRACE PARK SILANGAN</p><br>
                <p class="text-center" style="font-weight: bold; font-size: 15px"> BRGY 120 ZONE 10 DISTRICT II</p><br>
            </div>

            <div class="col-xs-3">
                <img src="{{ asset('/images/logo/logo.png') }}" alt="logo">
            </div>
        </div>

            <div class="row">
                <div class="col-xs-12">
                    <p class="text-center" style="font-weight: bold; font-size: 25px">OFFICE OF THE BARANGAY CHAIRMAN</p><br>
                </div>
            </div>
            <hr style="border-top: solid 1px black;">
            <hr>
            <br>
            <p class="text-right" style="font-weight: bold; font-size: 15px"> Control No: {{$data->code}}</p><br>
            
            <div class="row">
                <p class="text-center" style="font-weight: bold; font-size: 30px;"> CERTIFICATION</p><br>
            </div>
            <br><br>
             <div class="content">
                <p style="font-size: 20px;text-indent: 50px;"> This is to certify that <b>{{$data->youth->lastname . ', ' . $data->youth->firstname . ' ' . substr($data->youth->middlename, 0,  1) . '.'}}</b>, 
                    {{\Carbon\Carbon::parse($data->youth->birthday)->diff(\Carbon\Carbon::now())->format('%y') }} years old, is a bonafide resident of <b>{{ $data->youth->house_number . ' ' . $data->youth->street->street}}</b> 
                    Brgy. 120, Zone 10 District II, Caloocan City for <b>{{\Carbon\Carbon::parse($data->youth->residing_date)->diff(\Carbon\Carbon::now())->format('%y year(s) %m month(s)') }}</b>.</p><br>
                <p style="font-size: 20px;text-indent: 50px;"> This certification was issued upon request of <b>Mr. {{$data->youth->lastname}}</b> in connection
                with his/her application for <b>{{$data->purpose}}</b> and for all legal intents it may serve him/her best.</p><br>

                <p style="font-size: 20px;text-indent: 50px;"> Issued this <b>{{ \Carbon\Carbon::now()->format('dS') }}</b> day of <b>{{ \Carbon\Carbon::now()->format('F') }}</b> year <b>{{ \Carbon\Carbon::now()->format('Y') }}</b> at the office of the Barangay Chairman.</p><br>

                
             <div class="row">
                <div class="col-xs-4">
                    <p class="text-left" style="font-size: 15px"> Certified By:</p>
               </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4">
                    <p class="text-right" style="font-size: 15px"> Attested By:</p>
               </div>
               <br><br><br>
            
               <div style="line-height: 5px">
                    <div class="col-xs-4">
                        <p class="text-left" style="font-weight: bold; font-size: 20px"> <u style="text-transform: uppercase;">{{$chairman->firstname . ' ' . substr($chairman->middlename, 0,  1) . ' ' . $chairman->lastname }} </u> </p><br>
                        <p class="text-left" style="font-size: 12px"> Barangay Chairman </p><br>
                    </div>

                    <div class="col-xs-4"></div>

                    <div class="col-xs-4">
                            <p class="text-right" style="font-weight: bold; font-size: 20px"> <u style="text-transform: uppercase;">{{$secretary->firstname . ' ' . substr($secretary->middlename, 0,  1) . ' ' . $secretary->lastname }} </u> </p><br>
                            <p class="text-right" style="font-size: 12px"> Barangay Secretary </p><br><br>
                    </div>
               </div>
            
                <div class="row">
                    <div class="col-xs-6">
                            <div class="col-xs-6">
                                <div style="border: 1px solid black; height:130px; width:130px"></div>
                                <p style="font-weight: bold;font-size: 13px">LEFT THUMBMARK</p>
                            </div>
                            <div class="col-xs-6">
                                <div style="border: 1px solid black; height:130px; width:130px"></div>
                                <p style="font-weight: bold; font-size: 13px">RIGHT THUMBMARK</p>
                            </div>
                    </div>
                    <div class="col-xs-6  mt-5" style="line-height: 5px">
                        <br><br><br><br><br><br><br><br><br>
                        <p class="text-right" style="font-weight: bold; font-size: 20px"> <u style="text-transform: uppercase;">{{$data->youth->lastname . ', ' . $data->youth->firstname . ' ' . substr($data->youth->middlename, 0,  1) . '.'}} </u> </p><br>
                        <p class="text-right" style="font-size: 12px"> Signature Over Printed Name </p><br><br><br><br><br><br>


                        <p class="text-right" style="font-size: 12px"> <i>Note:</i> Valid for three (3) months only. </p>
                        <p class="text-right" style="font-size: 12px">  Not valid without official seal. </p>
                    </div>
                </div>

            </div>
             </div>

        </div>
    </body>

    </html>