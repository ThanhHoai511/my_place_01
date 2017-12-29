<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
        {{ HTML::image(config('asset.image_path.icon') . 'map-icon.png', trans('messages.logo'), ['class' => 'logo-img']) }}
        myplaces</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a class="head-item-1st active" href="/ideas">{{ trans('messages.home') }}</a></li>
            <li><a class="head-item-2nd" href="/pages/info">{{ trans('messages.personal') }}</a></li>
        </ul>
        <p class="navbar-text pull-right color-white">
        <div class="col-md-1 dropdown head-dropdown float-right">
            <!-- if user_signed_in -->
            <div class="dropdown color-white float-right">
                <button class="btn btn-secondary dropdown-toggle color-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <!-- Image avatar here -->
                    <strong>
                        <!-- current_user.email -->User Email
                    </strong>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="head-dropdown-ul">
                        <li>
                            {{ trans('messages.edit-profile') }}
                        </li>
                        <li>
                            {{ trans('messages.logout') }}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- else
                link_to "Sign up", new_user_registration_path, :class => 'navbar-link', :class => 'navlink', :class => 'dropdown-item' |
                link_to "Login", new_user_session_path, :class => 'navbar-link', :class => 'navlink', :class => 'dropdown-item'  %>
                end -->
        </div>
        </p>
    </div>
</div>
