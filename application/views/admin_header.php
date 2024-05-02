
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ローカルで動くYoutubeもどきWebページ</title>
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
    <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css">
    <!-- <script src="js/jquery.min.js"></script> -->
    <!-- material design icons -->
    <link href="../assets/css/mdi-icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../assets/js/vendors.min.js"></script>
</head>

<body style="background: #ffffff;">

  <div class="app-content content">
    
    <div class="content-wrapper">
      <div class="content-body">
        <section id="image-gallery" class="card">
          
          <div class="card-content">    
            <div class="card-header">
              <h3>画像や動画を追加したり、画像の切り替え秒数を変更することができます。 </h3>
            </div>          
            <div class="card-body  my-gallery p-0">
              <div class="row ml-0">
                <div class="col-2 ml-0" style="background-color: #F5F5F5;">
                  <div class="row">
                    <div class="sel-item" id="add_category" onclick="go_category()" style="border-bottom: 1px solid #c3c3c3;">
                      <div class="row">
                        <div class="col-sm-3">
                          <span class="mdi mdi-group" id="group_icon" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                        </div>
                        <div class="col-sm-9" style="text-align: left;">
                          <span style="font-size: 17px;line-height: 25px;">カテゴリ</span>
                        </div>
                      </div>                     
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="sel-item active" id="add_img" onclick="go_img()" style="border-bottom: 1px solid #c3c3c3;">
                      <div class="row">
                        <div class="col-sm-3">
                          <span class="mdi mdi-image" id="image_icon" style="color: red;font-size: 25px;line-height: 25px;"></span>
                        </div>
                        <div class="col-sm-9" style="text-align: left;">
                          <span style="font-size: 17px;line-height: 25px;">画像</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="sel-item " id="add_video" onclick="go_video()" style="border-bottom: 1px solid #c3c3c3;">
                      <div class="row">
                        <div class="col-sm-3">
                          <span class="mdi mdi-video" id="video_icon" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                        </div>
                        <div class="col-sm-9" style="text-align: left;">
                          <span style="font-size: 17px;line-height: 25px;">動画</span>
                        </div>
                      </div>                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="sel-item" id="setting" onclick="go_setting()" style="border-bottom: 1px solid #c3c3c3;">
                      <div class="row">
                        <div class="col-sm-3">
                          <span class="mdi mdi-settings" id="setting_icon" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                        </div>
                        <div class="col-sm-9" style="text-align: left;">
                          <span style="font-size: 17px;line-height: 25px;">設定</span>
                        </div>
                      </div>                      
                    </div>
                  </div>              
                </div>


               