
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>登録</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo.png">

    <!-- Bootstrap framework main css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/photo-swipe/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/photo-swipe/default-skin/default-skin.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/pages/gallery.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- <script src="js/jquery.min.js"></script> -->
    <!-- material design icons -->
    <link href="../assets/css/mdi-icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background: #ffffff;">

<div class="app-content content">
    <div class="content-wrapper">
        <div class="row" style="padding-top: 100px;">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4 login_win">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">登録</h3>
                    </div>
                    <div class="panel-body">
<!--                        <form accept-charset="UTF-8" role="form">-->
                            <fieldset>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="username" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                                    </div>
                                    <input id="username" class="form-control" placeholder="ユーザー名" name="username" type="text" required>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="mail" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                                    </div>
                                    <input id="email" class="form-control" placeholder="メール" name="email" type="text" required>
                                 </div>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                                    </div>
                                    <input id="password" class="form-control" placeholder="パスワード" name="password" type="password" value="" required>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                                    </div>
                                    <input id="confirm_password" class="form-control" placeholder="パスワード" name="confirm_password" type="password" value="" required>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" onclick="add_user()">登録</button>
                            </fieldset>
<!--                        </form>-->
                        <div class="form-group">
                            <label>
                                <a href="login">ログイン</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="../assets/js/masonry.pkgd.min.js"></script>
<!-- <script src="../assets/css/photo-swipe/photoswipe.min.js"></script> -->
<script src="../assets/css/photo-swipe/photoswipe-ui-default.min.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="../assets/js/core/app-menu.js"></script>
<script src="../assets/js/core/app.js"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- <script src="../assets/js/photo-swipe/photoswipe-script.js"></script> -->
<!-- END PAGE LEVEL JS-->
<script>
    var clock;
    $(document).ready(function () {
        var W = $(window).width();
        var H = $(window).height();
        // $('#whole').width(W);

    });

    function add_user() {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        if (username.length < 1) {
            alert("Please Input username.");
            return;
        } else if(email.length < 1){
            alert("Please Input Title.");
            return;
        } else if (password.length < 1) {
            alert("Please Input Password")
        } else if (confirm_password.length < 1) {
            alert("Please Input Confirm Password")
        } else if (password.length != confirm_password.length) {
            alert("Please enter same password")
        } else {
            var formData = new FormData();
            formData.append('username', username);
            formData.append('email', email);
            formData.append('password', password);
            $.ajax({
                type: "POST",
                url: 'add_user',
                success: function (data) {
                    var result = JSON.parse(data);
                    console.log(result);
                    if (result['state'] == "success") {
                        location.href = "<?php echo base_url('front/login');?>";
                    } else if(result['status'] == "email") {
                        alert("email duplicated!");
                    } else {
                        alert("warning");
                    }
                },

                async: true,
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            });
        }

    }
</script>

</body>
</html>
