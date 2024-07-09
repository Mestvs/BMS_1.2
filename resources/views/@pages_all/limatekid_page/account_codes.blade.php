@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_budget_codes') <div class="span8" id=""
            style="width:80%; margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/budget_codes" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong> {{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.acc_code_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
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
                            <form action="/delete_account_code" method="post" autocomplete="off">
                                @csrf
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>{{ __('payment.acc_name') }}</th>
                                            <th>{{ __('payment.acc_code') }}</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($acc_code_query as $acc_code)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="{{ $acc_code->account_id }}">
                                                </td>
                                                <td> {{ $acc_code->account_id }} </td>
                                                <td> {{ $acc_code->account_name }} </td>
                                                <td> {{ $acc_code->account_code }} </td>
                                                <td width="100">
                                                    <p class="info"
                                                        style="width:0.3cm ;height:0.3cm;float:left; margin-top:0%;margin-right:0.8cm;">
                                                        <a data-toggle="modal" href="/add_account_code_form"
                                                            id="delete" class="btn btn-info" name=""
                                                            style="height:0.3cm;width:0.3cm; "><i
                                                                class="icon-plus icon-small"></i></a>
                                                    </p>
                                                    <p class="info"
                                                        style="width:0.3cm ;height:0.3cm;float:left;margin-right:0.8cm;">
                                                        <a data-toggle="modal" href="#acc_code_delete" id="delete"
                                                            class="btn btn-danger" name=""
                                                            style="height:0.3cm;width:0.3cm; "><i
                                                                class="icon-trash icon-small"></i></a>
                                                        @include('@pages_all.limatekid_page.modal_delete')
                                                    </p>
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
    </div><br><br><br><br><br><br><br><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
