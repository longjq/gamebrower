<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <meta name="keywords"
          content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates"/>
    <link href="{{ asset('css/login.css') }}" rel='stylesheet' type='text/css'/>
    <!--webfonts-->
    <link href='http://fonts.useso.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald:400,300,700'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body>
<script>$(document).ready(function (c) {
        $('.close').on('click', function (c) {
//            $('.login-form').fadeOut('slow', function (c) {
//                $('.login-form').remove();
//            });
        });

        // 登录
        $('#send').on('click', function (c) {
            location.href = '/admin';
        });
    });
</script>
<!--SIGN UP-->
<h1>Game King Dom</h1>
<div class="login-form">
    <div class="close"></div>
    <div class="head-info">
        <label class="lbl-1"> </label>
        <label class="lbl-2"> </label>
        <label class="lbl-3"> </label>
    </div>
    <div class="clear"></div>
    <div class="avtar">
        <img src="{{ asset('images/avatar_game.png') }}"/>
    </div>
    <form>
        <input type="text" class="text" value="Username" onfocus="this.value = '';"
               onblur="if (this.value == '') {this.value = 'Username';}">
        <div class="key" style="background: none;">
            <input type="password" value="Password" onfocus="this.value = '';"
                   onblur="if (this.value == '') {this.value = 'Password';}">
        </div>
    </form>
    <div class="signin">
        <input type="submit" id="send" value="Login">
    </div>
</div>

</body>
</html>