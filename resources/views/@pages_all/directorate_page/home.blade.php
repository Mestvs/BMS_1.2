@include('header')

<body>@include('@pages_all.admin_page.navbar')
    <div class="row-fluid"> @include('@pages_all.directorate_page.sidebar_dashboard')
        <div class="span9" id="content" style="margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div id="" class="muted pull-left"></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="#" method="post">
                                <div class="alert alert-info"><strong><i class="icon-info-sign"></i>
                                        {{ __('link.Notifications') }}</strong></div>
                                <div>
                                    <p
                                        style="font-style: normal;font-family: all;font-weight: normal;font-size: 20px;color: black;">
                                        You are {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} and signed
                                        as a {{ Auth::user()->role }}</p>
                                </div>
                            </form>
                        </div>
                        @if ($news->count() == 0)
                            <p><strong
                                    style="font-style: normal;font-family: all;font-weight: normal;font-size: 20px;color: black;">{{ __('link.No_News') }}
                                    <br><br>
                                @else
                                    @foreach ($news as $new)
                                        <p><strong
                                                style="font-style: normal;font-family: all;font-weight: normal;font-size: 20px;color: black;">{{ __('link.News') }}
                                                <br><br>
                                                {{ $new->news }}
                                    @endforeach
                        @endif
                        </strong></p>
                    </div>
                </div><br>
                <p
                    style="font-style: normal;font-family: all;font-weight: normal;font-size: 16px;color: black;margin-bottom:15%">
                    <script type='text/javascript'>
                        var mydate = new Date()

                        var year = mydate.getYear()

                        if (year < 1000) year += 1900

                        var day = mydate.getDay()

                        var month = mydate.getMonth()

                        var daym = mydate.getDate()

                        if (daym < 10)

                            daym = "0" + daym

                        var hours2 = mydate.getHours()

                        var minutes2 = mydate.getMinutes()

                        var seconds2 = mydate.getSeconds()

                        dn2 = "am"

                        if ((hours2 >= 12) && (minutes2 >= 1) || (hours2 >= 13)) {
                            dn2 = "pm"
                            hours2 = hours2 - 12

                        }
                        if (hours2 == 0)

                            hours2 = 12

                        if (hours2 < 10) hours2 = "0" + hours2

                        else hours2 = hours2 + ''

                        if (minutes2 < 10) minutes2 = "0" + minutes2

                        else minutes2 = minutes2 + ''

                        if (seconds2 < 10) seconds2 = "0" + seconds2

                        else seconds2 = seconds2 + ''

                        var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")

                        var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September",
                            "October", "November", "December")

                        document.write(dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year + "<br>" + hours2 + " : " +
                            minutes2 + " : " + seconds2 + "<br>")
                    </script>
                </p>
                <!-- /block -->
            </div>
        </div>
    </div>
    </div><br><br> @include('home_page.footer')@include('home_page.script')
