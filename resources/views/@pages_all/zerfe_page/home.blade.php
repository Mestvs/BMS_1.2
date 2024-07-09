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
@foreach ($zerfe as $zerfe_name)
    <?php
    $type = $zerfe_name->zerfe_name;
    ?>
@endforeach

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.zerfe_page.sidebar_dashboard')
        <!--/span-->
        <div class="span9" id="content" style="margin-left: 16%;">
            <div class="row-fluid"></div>
            <div class="row-fluid"> <?php
if ($type == "ICT") {
?> <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><b
                                style="font-family: all;font-size: 18px;color: black;"><strong>{{ __('link.ICT_datamember') }}
                                </strong></b></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12"> <?php
                        
                        $count_reg_ICT1 = $query_reg_ICT1->count();
                        ?> <div class="span3">
                                <div class="chart" data-percent="{{ $count_reg_ICT1 }}"> {{ $count_reg_ICT1 }} </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    <strong>{{ __('link.j_CreationD') }} </strong>
                                </div>
                            </div> <?php
                            
                            $count_reg_ICT2 = $query_reg_ICT2->count();
                            ?> <div class="span3">
                                <div class="chart" data-percent="{{ $count_reg_ICT2 }}"> {{ $count_reg_ICT2 }} </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    <strong>{{ __('link.net_&_softwareD') }}</strong>
                                </div>
                            </div> <?php
                            
                            $count_reg_ICT3 = $query_reg_ICT3->count();
                            ?> <div class="span3">
                                <div class="chart" data-percent="{{ $count_reg_ICT3 }}">{{ $count_reg_ICT3 }} </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    <strong>{{ __('link.maintenD') }} </strong>
                                </div>
                            </div> <?php
                            $count_reg_ICT4 = $query_reg_ICT4->count();
                            ?> <div class="span3">
                                <div class="chart" data-percent="{{ $count_reg_ICT4 }}"> {{ $count_reg_ICT4 }} </div>
                                <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                    <strong>{{ __('link.p_merja_infoD') }} </strong>
                                </div>
                            </div>
                        </div> <?php
      
}
else if ($type == "Science_&_Technology") { ?> <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b
                                        style="font-family: all;font-size: 18px;color: black;"><strong>{{ __('link.SIT_datamember') }}</strong></b>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12"> <?php
                                
                                $count_reg_SIT1 = $query_reg_SIT1->count();
                                ?> <div class="span3">
                                        <div class="chart" data-percent="{{ $count_reg_SIT1 }}">
                                            {{ $count_reg_SIT1 }} </div>
                                        <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                            <strong>{{ __('link.s_&_t_research_&_analysisD') }}</strong>
                                        </div>
                                    </div> <?php
                                    
                                    $count_reg_SIT2 = $query_reg_SIT2->count();
                                    ?> <div class="span3">
                                        <div class="chart" data-percent="{{ $count_reg_SIT2 }}">
                                            {{ $count_reg_SIT2 }} </div>
                                        <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                            <strong>{{ __('link.c_buildD') }}</strong>
                                        </div>
                                    </div> <?php
                                    
                                    $count_reg_SIT3 = $query_reg_SIT3->count();
                                    ?> <div class="span3">
                                        <div class="chart" data-percent="{{ $count_reg_SIT3 }}">
                                            {{ $count_reg_SIT3 }} </div>
                                        <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                            <strong>{{ __('link.p_writesD') }}</strong>
                                        </div>
                                    </div> <?php
                                    $count_reg_SIT4 = $query_reg_SIT4->count();
                                    ?> <div class="span3">
                                        <div class="chart" data-percent="{{ $count_reg_SIT4 }}">
                                            {{ $count_reg_SIT4 }} </div>
                                        <div class="chart-bottom-heading" style="color:#08367f;font-size:large;">
                                            {{ __('link.r_controlD') }} </strong>
                                        </div>
                                    </div>
                                </div> <?php

}
else if ($type == "Top_Management") { ?> <div id="block_bg" class="block">
                                    <div class="navbar navbar-inner block-header">
                                        <div class="muted pull-left"><b
                                                style="font-family: all;font-size: 18px;color: black;"><strong>{{ __('link.TM_datamember') }}</strong></b>
                                        </div>
                                    </div>
                                    <div class="block-content collapse in">
                                        <div class="span12"> <?php
                                        $count_reg_Top1 = $query_reg_Top1->count();
                                        ?> <div class="span3">
                                                <div class="chart" data-percent="{{ $count_reg_Top1 }}">
                                                    {{ $count_reg_Top1 }} </div>
                                                <div class="chart-bottom-heading"
                                                    style="color:#08367f;font-size:large;">
                                                    <strong>{{ __('link.h_officeD') }}</strong>
                                                </div>
                                            </div> <?php
                                            $count_reg_Top2 = $query_reg_Top2->count();
                                            ?> <div class="span3">
                                                <div class="chart" data-percent="{{ $count_reg_Top2 }}">
                                                    {{ $count_reg_Top2 }} </div>
                                                <div class="chart-bottom-heading"
                                                    style="color:#08367f;font-size:large;">
                                                    <strong>{{ __('link.AuditD') }}</strong>
                                                </div>
                                            </div> <?php
                                            $count_reg_Top3 = $query_reg_Top3->count();
                                            ?> <div class="span3">
                                                <div class="chart" data-percent="{{ $count_reg_Top3 }}">
                                                    {{ $count_reg_Top3 }} </div>
                                                <div class="chart-bottom-heading"
                                                    style="color:#08367f;font-size:large;"><strong>
                                                        {{ __('link.e_deptD') }}</strong>
                                                </div>
                                            </div> <?php
                                            $count_reg_Top4 = $query_reg_Top4->count();
                                            ?> <div class="span3">
                                                <div class="chart" data-percent="{{ $count_reg_Top4 }}">
                                                    {{ $count_reg_Top4 }} </div>
                                                <div class="chart-bottom-heading"
                                                    style="color:#08367f;font-size:large;">
                                                    <strong>{{ __('link.commnD') }}</strong>
                                                </div>
                                            </div>
                                        </div> <?php
}
else { ?> <div id="block_bg" class="block">
                                            <div class="navbar navbar-inner block-header">
                                                <div class="muted pull-left"><b
                                                        style="font-family: all;font-size: 18px;color: black;"><strong>{{ __('link.AF_datamember') }}</strong></b>
                                                </div>
                                            </div>
                                            <div class="block-content collapse in">
                                                <div class="span12">
                                                    <?php
                                                    $count_reg_af1 = $query_reg_af1->count();
                                                    ?> <div class="span3">
                                                        <div class="chart" data-percent="{{ $count_reg_af1 }}">
                                                            {{ $count_reg_af1 }} </div>
                                                        <div class="chart-bottom-heading"
                                                            style="color:#08367f;font-size:large;"><strong>
                                                                {{ __('link.p&fD') }}</strong>
                                                        </div>
                                                    </div> <?php
                                                    $count_reg_af2 = $query_reg_af2->count();
                                                    
                                                    ?> <div class="span3">
                                                        <div class="chart" data-percent="{{ $count_reg_af2 }}">
                                                            {{ $count_reg_af2 }} </div>
                                                        <div class="chart-bottom-heading"
                                                            style="color:#08367f;font-size:large;">
                                                            <strong>{{ __('link.h_resourceD') }}</strong>
                                                        </div>
                                                    </div> <?php
                                                    $count_reg_af3 = $query_reg_af3->count();
                                                    ?> <div class="span3">
                                                        <div class="chart" data-percent="{{ $count_reg_af3 }}">
                                                            {{ $count_reg_af3 }} </div>
                                                        <div class="chart-bottom-heading"
                                                            style="color:#08367f;font-size:large;">
                                                            <strong>{{ __('link.h_&_genderD') }}</strong>
                                                        </div>
                                                    </div> <?php
                                                    $count_reg_af4 = $query_reg_af4->count();
                                                    ?> <div class="span3">
                                                        <div class="chart" data-percent="{{ $count_reg_af4 }}">
                                                            {{ $count_reg_af4 }} </div>
                                                        <div class="chart-bottom-heading"
                                                            style="color:#08367f;font-size:large;">
                                                            <strong>{{ __('link.l_ekidD') }}</strong>
                                                        </div>
                                                    </div> <?php
                                                    $count_reg_af5 = $query_reg_af5->count();
                                                    ?> <div class="span3">
                                                        <div class="chart" data-percent="{{ $count_reg_af5 }}">
                                                            {{ $count_reg_af5 }} </div>
                                                        <div class="chart-bottom-heading"
                                                            style="color:#08367f;font-size:large;">
                                                            <strong> {{ __('link.g_serviceD') }}</strong>
                                                        </div>
                                                    </div> <?php
                                                    $count_reg_af6 = $query_reg_af6->count();
                                                    ?> <div class="span3">
                                                        <div class="chart" data-percent="{{ $count_reg_af6 }}">
                                                            {{ $count_reg_af6 }} </div>
                                                        <div class="chart-bottom-heading"
                                                            style="color:#08367f;font-size:large;"><strong>
                                                                {{ __('link.m_staticsD') }}</strong>
                                                        </div>
                                                    </div>
                                                </div> <?php } ?>
                                                <!-- block -->@include('home_page.script')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br> @include('home_page.footer')
