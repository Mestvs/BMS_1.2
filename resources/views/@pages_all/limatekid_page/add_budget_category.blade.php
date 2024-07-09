@include('header')

<body>
    @include('@pages_all.admin_page.navbar')
    <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_budget_codes')
        <div class="span6" id="adduser" style="margin-left:16% ;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                    class="icon-info-sign"></i><b><strong>{{ __('budget.Add_budget_category') }}
                                    </strong></b> </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="{{ url('add_budget_category') }}" method="post" class="form-horizontal"
                                    enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="font-family: all;color: black;"><b>{{ __('budget.budgetcategory') }}:
                                            </b></label>
                                        <div class="controls">
                                            <input class="input focused" name="category" id="focusedInput"
                                                type="text" placeholder="Category" required
                                                style="font-family: all;color: black;"
                                                pattern="[0-9_]{3}[-_]{1}[0-9_]{2}[-_]{1}[0-9_]{2}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="type"
                                            style="font-family: all;color: black;"><b>{{ __('link.zerfe') }}:
                                            </b></label>
                                        <div class="controls">
                                            <select name="type" class="chzn-select" required>
                                                <option> </option>
                                                @foreach ($zerfe_query as $z_query)
                                                    <option value="{{ $z_query->zerfe_id }}"> {{ $z_query->zerfe_name }}
                                                        Head </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    </br>
                                    <hr>
                                    <input class="input focused" name="signature" id="focusedInput" type="hidden">
                                    <div class="control-group">
                                        <div class="controls" style="font-family: all;color: black;">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="save"
                                                class="btn btn-info"><i class="icon-plus-sign"></i><b
                                                    style="font-family: all;">
                                                    <strong>Add category </strong></b> </button>
                                        </div>
                                    </div>
                                    </br>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br>@include('home_page.footer') @include('home_page.script')
</body>

</html>
