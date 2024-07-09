@include('header')
<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>

<body id="page"> @include('@pages_all.admin_page.navbar')<div class="row-fluid" style="margin-bottom: 14%"> @include('@pages_all.top_manager_page.sidebar_dashboard')
        <!--/span-->
        <div class="span9" id="content" style="margin-left:17% ;">
            <div class="row-fluid"></div>
            <div class="row-fluid">
                <!-- block           -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><b style="font-family: all;font-size: large;color: black;"><strong>
                                    {{ __('link.datamember') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $total_user }}

                                </strong></b></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="span3">
                                <div class="chart" data-percent="{{ $total_AF }}"> {{ $total_AF }}
                                </div>
                                <div class="chart-bottom-heading" style="color:#08367f; font-size:large;">
                                    {{ __('link.a_financeZ') }}<strong>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="chart" data-percent="{{ $total_ICT }}">{{ $total_ICT }}
                                </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    {{ __('link.i_c_tZ') }}<strong>

                                </div>
                            </div>
                            <div class="span3">
                                <div class="chart" data-percent="{{ $total_SIT }}">{{ $total_SIT }}
                                </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    {{ __('link.s_&_technologyZ') }}<strong>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="chart" data-percent="{{ $total_Top }}"> {{ $total_Top }}
                                </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    {{ __('link.t_managementZ') }}<strong>

                                </div>
                            </div>
                        </div> @include('home_page.script')
                    </div>
                </div>
            </div>
        </div>
    </div><br> @include('home_page.footer')
