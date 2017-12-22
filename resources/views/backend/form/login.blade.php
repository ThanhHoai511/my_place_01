<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ trans('message.login') }}</title>
        {{ Html::style('css/login.css') }}
    </head>
    <body>
        <div class="main">
            <div class="wrapper">
                <div id="login" class="row">
                    <div class="large-12 columns text-center">
                        {{ HTML::image(config('asset.image_path.icon') . 'logo-icon.png', trans('message.logo'), ['class' => 'logo-icon logo-login']) }}
                        <h3>{{ trans('message.login-admin') }}</h3>
                        <form class="form-login">
                        <input id="Text1" type="text" placeholder="{{ trans('message.email') }}" class="border-radius-top" />

                        <input id="Text2" type="password" placeholder="{{ trans('message.password') }}" class="no-radius"  />
                        <label class="remember">
                            <input type="checkbox" name="remember"> {{ trans('message.remember') }}
                        </label>
                        
                        <a href="#" class="button small border-radius-bottom coral-bg login-btn">{{ trans('message.login') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
