<style>
    .forms {
        margin: auto;
        width: 15%;
        padding: 20px;
        height: 250px;
        background-color: white;
        border-radius: 4px;
        margin-top: 20px;
        display: none;
        position: fixed;
        top: 0px;
        left: 20%;
        right: 20%;
        z-index: 5;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.5);
        transition: 1s;
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    .login-btns {
        width: 80%;
        padding: 10px;
        margin: 10px 0;
        background-color: blueviolet;
        border: none;
        border-radius: 3px;
        color: white;
        font-size: 18pt;
        cursor: pointer;
        margin-top: 30px;

    }

    .close-btns {
        position: absolute;
        top: 0.1;
        float: right;
        width: 30px;
        text-align: center;

    }

    .close-btns:hover {
        color: red;
        cursor: pointer;
    }

    @media only screen and (max-width:912px) {
        .forms {
            width: 80%;
            left: 10px;
            right: 10px;
        }
    }

    @media only screen and (min-width:1024px) {
        .forms {
            width: 40%;
            left: 10px;
            right: 10px;
            flex-direction: column;
        }
    }

    @media only screen and (min-width:1280px) {
        .forms {
            width: 40%;
            left: 10px;
            right: 10px;
            flex-direction: column;
        }
    }

    * {
        margin: 0;
        padding: 0;
    }

    span {
        font-weight: bold;
        font-size: medium;
    }
</style>
<div class="forms" id="login" style="margin-top: 6%;">
    <div class="close-btns">
        <label for="close" onclick="close_me()" style="font-size: 44px;">&CircleTimes;</label>{{-- <em hidden>-----------------</em> --}}
    </div>
    <section id="voucher">
        <h5 style="margin-left: 15%;" for="name">SNNPR BoSIT Department of
            payment request status Detail</h5>
        <div style="margin-left: 15%;">-------------------------------------------------------</div>
        <form action="#" method="post" autocomplete="off">
            <fieldset>
                <legend style="text-align:center;">Request status</legend>
                <span>Confirmation:</span><br />
                @if (session('signature') == 'Pending')
                    <label for="name">Dear,<span>{{ Auth::user()->first_name }}</span> <br>Your request is waiting
                        for the sign of
                        <span>{{ session('zerfe_name') }} </span>zerfe</label>
                @elseif (session('signature') == 'rejected')
                    <label for="name">Dear, &nbsp;<span>{{ Auth::user()->first_name }}</span> <br>Your request is
                        <b>{{ session('signature') }}</b>
                        by
                        <span>{{ session('zerfe_name') }} </span>zerfe due to the following reason:</label>
                    <span>Rejected Date:
                        <label>{{ session('updated_at') }}</label>
                    </span>
                @elseif(session('signature') == 'Signed' && session('approval') != 'Approved')
                    <label for="name">Dear,<span>{{ Auth::user()->first_name }}</span><br>Your request is signed and
                        now waiting to
                        be <b>{{ session('signature') }}</b> by
                        <span>Finance</span></label>
                    <span>Signed Date:
                        <label>{{ session('updated_at') }}</label>
                    </span>
                @elseif(session('signature') == 'Signed' && session('approval') == 'rejected')
                    <label for="name">Dear,<span>{{ Auth::user()->first_name }}</span><br>Your request approval by
                        <span>Finance</span> is <b>{{ session('approval') }}</b> due to the following reason:</label>
                    <span>Rejected Date:
                        <label>{{ session('updated_at') }}</label>
                    </span>
                @elseif(session('signature') == 'Signed' && session('approval') == 'Approved' && session('pay_status') != 'paid')
                    <label for="name">Dear,<span>{{ Auth::user()->first_name }}</span><br>Your request is
                        <b>{{ session('approval') }}</b>
                        by
                        <span>Finance</span> wait for payment</label>
                    <span>Approved Date:
                        <label>{{ session('updated_at') }}</label>
                    </span>
                @elseif(session('signature') == 'signed' && session('approval') == 'Approved' && session('pay_status') == 'paid')
                    <label for="name">Dear,<span>{{ Auth::user()->first_name }}</span> <br> payment request is
                        paid, please take the invoice
                        from <span>Finance</span></label>
                    <span>Paid Date:
                        <label>{{ session('updated_at') }}</label>
                    </span>
                @else
                @endif
            </fieldset>


        </form>
    </section>
    <div class="pull-right" style="margin-bottom: 10%;">
        <a href="" id="print" onclick="printVoucher('voucher')" class="btn "
            style="font-family: all;background-color:blue;">
            <i class="icon-print">
            </i><b><strong>{{ __('payment.Print') }}</strong></b></a>
    </div>
    <script>
        function printVoucher(el) {
            var getfull = document.body.innerHTML;
            var voucher = document.getElementById(el).innerHTML;
            document.body.innerHTML = voucher;
            window.print();
            document.body.innerHTML = getfull;

        }
    </script>
</div>
