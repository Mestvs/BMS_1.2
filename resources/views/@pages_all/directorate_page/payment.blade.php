@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.directorate_page.sidebar_payment')<div class="span8" id=""
            style="width:70% ;margin-left:16%;">
            <div class="row-fluid">

                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <!--fas fa-file-signature-->
                            <a href="/payment_request_form" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="fa fa-question-circle">
                                </i><b><strong> {{ __('payment.requestpayment') }} </strong></b></a>
                        </diV>
                        <div class="alert alert-info" style="font-family: all; font-size: large;">
                            <i class="icon-info-sign"></i><b><strong> {{ __('payment.paymentlist') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="{{ url('payment_delete') }}" method="post" autocomplete="off">
                                @csrf
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <a data-toggle="modal" href="#payment_delete" id="delete" class="btn btn-danger"
                                        name=""><i class="icon-trash icon-large"></i></a>
                                    @include('@pages_all.directorate_page.modal_delete')
                                    <thead>
                                        <!-- errro message -->
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block" id="alert"
                                                style="margin-left: 30%; margin-right:30%" aria-hidden="true">
                                                <i class="icon-ban-circle"></i>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">x</button> <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                        @endif

                                        <!-- errro message end -->
                                        <!-- success message -->
                                        @if (session()->has('message'))
                                            <div class="alert alert-success" style="margin-left: 30%; margin-right:40%">
                                                <i class="icon-check"></i>
                                                {{ session()->get('message') }}
                                                <button type="button" class="close" data-bs-dismiss="alert"
                                                    aria-hidden="true"></button>

                                            </div>
                                        @endif

                                        <!-- errro message end -->
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Request Info</th>
                                            <th>Description</th>
                                            <th>Directorate</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                            <th>Track</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($p_request_query as $payment)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="{{ $payment->request_id }}">
                                                </td>
                                                <td> {{ $payment->request_id }} </td>
                                                <td>
                                                    <p class="info">Payment title: <b> {{ $payment->title }} </b></p>
                                                    <p class="info">Amount: <small class="text-danger"><b>
                                                                {{ $payment->amount }} </b></small></p>
                                                    <p class="info"><small>Budget Category: <b>
                                                                {{ $payment->category_code }} </b></small></p>
                                                    <p class="info"><small>Request Date: <b>
                                                                {{ $payment->request_date }} </b></small></p>
                                                </td>
                                                <td> {{ $payment->description }}</td>
                                                <td> {{ $payment->directorate_name }} </td>
                                                <td>
                                                    <p class="info"><small>Request: <b style="color:green">
                                                                {{ $payment->signature }} </b></small></p>
                                                    <p class="info"><small>Approval: <b> {{ $payment->approval }}
                                                            </b></small></p>
                                                </td>
                                                <td width="70">
                                                    <a href="{{ url('edit_payment', $payment->request_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i
                                                            class="icon-pencil icon-small"></i></a>
                                                </td>
                                                <td width="70">
                                                    <a href="{{ url('track_payment', $payment->request_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i
                                                            class="icon-spinner"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    </div><br><br><br><br><br><br>@include('@pages_all.directorate_page.truck_payment')
    @if (session('back') == 'true')
        <script>
            document.getElementById("login").style.display = "block";
        </script>
    @else
    @endif
    @include('home_page.footer')@include('home_page.script')
</body>

</html>
