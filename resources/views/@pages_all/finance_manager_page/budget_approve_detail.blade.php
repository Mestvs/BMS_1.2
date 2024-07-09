<style>
    .forms {
        margin: auto;
        width: 30%;
        padding: 20px;
        height: 500px;
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
            width: 35%;
            left: 10px;
            right: 10px;
            flex-direction: column;
        }
    }

    * {
        margin: 0;
        padding: 0;
    }
</style>
<div class="forms" id="login" style="margin-top: 6%;">


    <div class="close-btns">
        <label for="close" onclick="close_me()" style="font-size: 44px;">&CircleTimes;</label>{{-- <em hidden>-----------------</em> --}}
    </div>
    <section id="voucher">
        <label style="margin-left: 15%;" for="name">SNNPR BoSIT Department of <b>{{ session('request') }}</b> Budget
            Approval Detail</label>
        <div style="margin-left: 15%;">------------------------------------------------------</div>
        <form action="#" method="post" autocomplete="off">
            <fieldset>
                <legend style="text-align:center;">Approval Details</legend>
                <span>Confirmation:</span><br />
                @if (session('status')=='Approved')
                <label for="name">It is known that you have requested the budget for performing the activities of
                    your zerfe.The BoSIT was seen your request and approved it.So this is to confirm you that your
                    request is approved by the department whom it concerns.
                </label>
                @else
                <label for="name">It is known that you have requested the budget for performing the activities of
                    your zerfe.The BoSIT was seen your request and rejected it.Contact the person whom it concerns .
                </label>
                @endif

            </fieldset>
            <fieldset>
                <legend style="text-align:center;"></legend>
                @if (session('status')=='Approved')
                <label for="name"><strong>Approved By:</strong> {{ session('approver') }}</label>
                <label for="name"><strong>Approved Date:</strong>{{ session('approved_date') }}</label>
                @else
                <label for="name"><strong>Seen By:</strong> {{ session('approver') }}</label>
                <label for="name"><strong>Rejected Date:</strong>{{ session('approved_date') }}</label>
                @endif
                <label for="name"><strong>Signature:</strong>{{ session('signature') }}</label>
            </fieldset>

            <div class="elements">

            </div>

        </form>
    </section>
    <div class="pull-right" style="margin-bottom: 10%;">
        <a href="" id="print" onclick="printVoucher('voucher')" class="btn"
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
