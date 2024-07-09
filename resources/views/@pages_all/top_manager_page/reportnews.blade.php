@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.top_manager_page.sidebar_news') <div class="span6" id="adduser"
            style="margin-left:17%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info"><i class="icon-info-sign"></i> {{ __('link.Addadmin') }}
                                {{ __('link.News_Boardadmin') }}</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="{{ route('top_manager.add_news') }}" method="post"
                                    class="form-horizontal" autocomplete="off">
                                    @csrf
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all;text-align:center;">
                                                    <b><strong>{{ __('link.News_Boardadmin') }}</strong></b>
                                            </i></b></strong></h4>
                                    <hr>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('link.Titleadmin') }}: </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="title" id="focusedInput" type="text"
                                                placeholder="news title" style="color: black;font-family: all;"
                                                required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('link.News') }}: </strong></b> </label>
                                        <div class="controls">
                                            <textarea name="report" cols="50" rows="10" id="comment"
                                                style="border: double;color: black;font-family: all;" placeholder="{{ __('link.your_news_here') }}" required
                                                pattern="[a-zA-Z0-9_]{3,}"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="control-group">
                                        <div class="controls"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button name="give" class="btn btn-info"
                                                style="color: black;font-family: all;"><i class="icon-plus-sign"></i><b>
                                                    {{ __('link.Postadmin') }}</b></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> @include('home_page.footer') @include('home_page.script')
