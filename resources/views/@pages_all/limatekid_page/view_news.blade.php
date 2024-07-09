@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid" style="margin-bottom: 17%;"> @include('@pages_all.limatekid_page.sidebar_news') <div
            class="span8" id="" style="margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="alert alert-info"><i class="icon-info-sign"></i><strong> {{__('link.news_list')}} </strong></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form method="post">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{__('link.title')}}</th>
                                            <th>{{__('link.News')}}</th>
                                            <th>{{__('link.date')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Today = date('Y-m-d');
                                        $dtA = new DateTime("$Today");
                                        ?>
                                        @foreach ($news as $new)
                                            @if ($new->date == $Today)
                                                <tr>
                                                    <td width="30">
                                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                            type="checkbox" value="<?php //echo $id;
                                                            ?>">
                                                    </td>
                                                    <td> {{ $new->title }} </td>
                                                    <td> {{ $new->news }} </td>
                                                    <td> {{ $new->date }} </td>
                                                </tr>
                                            @else
                                            @endif
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
    </div><br><br> @include('home_page.footer') @include('home_page.script') </body>

</html>
