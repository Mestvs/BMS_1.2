@include('header')
<!DOCTYPE html>
<html lang="en">
<script src="{{ asset('css/js/dist.js') }}"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/OverlayScrollbars.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed"> @include('@pages_all.admin_page.navbar') <div class="row-fluid">
        @include('@pages_all.finance_page.sidebar_generate_report') <div class="span8" style="width:80%;margin-left:17%;">
            <div class="row-fluid">
                <div class="wrapper">
                    <div class="content-wrapper">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <form action="{{ url('generate_report') }}" method="post"
                                        style="margin-top: 2%;">
                                        @csrf
                                        <div class="control-group"
                                            style="border-color:blue; width: 32%; border-style: solid; padding-top:0.5%;padding-bottom:0.5%;">
                                            <div class="controls"style="margin-top:7%;">
                                                <select name="years" class="chzn-select" required id="select">
                                                    <option></option>
                                                    @foreach ($payment_year_query as $year_query)
                                                        <option value="{{ $year_query->year }}"> {{ $year_query->year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button name="report" id="print" class="btn btn-success"
                                                    style="font-family: all;">
                                                    <i
                                                        class="icon-plus"></i><b><strong>{{ __('payment.report') }}</strong></b></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($report == 'yes')
                                        @if (isset($_POST['report']))
                                            <?php
                                            $year = $_POST['years'];
                                            ?>
                                        @endif
                                        <div class="navbar navbar-inner block-header" style="margin-top:0%; ;">
                                            <div class="alert alert-info" style="font-family: all;font-size:large;">
                                                <i class="icon-info-sign"></i><b> {{ $year }}
                                                    {{ __('payment.monthly_expense_report') }}
                                                    <strong></strong></b>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <section class="content" id="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="small-box">
                                            <div class="inner" style="background-color: #fff">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead style="font-size:medium ;">
                                                        <tr>
                                                            <th>payment ID</th>
                                                            <th>Paid date</th>
                                                            <th>Ref.No</th>
                                                            <th>Amount</th>
                                                            <th>Payment mode</th>
                                                            <th>Directorate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size:small ;">

                                                        @foreach ($payment_query as $payment)
                                                            <tr>
                                                                <td>{{ $payment->payment_id }}</td>
                                                                <td>{{ $payment->paid_date }}</td>
                                                                <td>{{ $payment->reference_no }}</td>
                                                                <td>{{ $payment->amount }}</td>
                                                                <td>{{ $payment->payment_mode }}</td>
                                                                <td> {{ $payment->directorate_name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="small-box">
                                            <div class="inner" style="background-color: #fff">
                                                <canvas id="bargraph"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @else
                        <div class="navbar navbar-inner block-header" style="margin-top:0%; ;">
                            <div class="alert alert-info" style="font-family: all;font-size:large;">
                                <i class="icon-info-sign"></i><b> <strong>{{ __('payment.monthly_expense_report') }}
                                    </strong></b>
                            </div>
                        </div></div></div></div></div></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/adminlte.js') }}"></script>
    <script src="{{ asset('asset/js/chart.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar Chart
            var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "Novermber", "December"
                ],
                datasets: [{
                    label: 'Expense',
                    backgroundColor: 'rgb(79, 129, 189)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: [{{ $jan }}, {{ $feb }}, {{ $mar }},
                        {{ $apri }}, {{ $may }}, {{ $jun }},
                        {{ $jul }}, {{ $aug }}, {{ $sep }},
                        {{ $oct }}, {{ $nov }}, {{ $dec }}
                    ]
                }, {
                    label: 'Led',
                    backgroundColor: 'rgb(192, 80, 77)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: [450, 550, 750, 850, 350, 700, 800, 850, 950, 900, 600, 1000]
                }]
            };
            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                    }
                }
            });
        });
    </script>
    @include('home_page.footer') @include('home_page.script')
</body>

</html>
