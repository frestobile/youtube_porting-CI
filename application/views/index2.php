
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
    <!-- <script src="js/jquery.min.js"></script> -->
    <link href="../assets/css/mdi-icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style type="text/css">
      form.example input[type=text] {
            width: 35% !important;
      }
    </style>
</head>
<body style="background: #ffffff;">

    <div class="app-content content">   
    <?php defined('BASEPATH') OR exit('No direct script access allowed');
     $this->load->view('includes/header_portion'); ?>
      <div class="content-wrapper" id="main_body">
        <div class="content-body">
          <section id="image-gallery" class="card">            
            <div class="card-content">                
              <div class="card-body  my-gallery p-0">
                <div class="row ml-0">
                  <div class="col-1 ml-0" style="background-color: #F5F5F5;">
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_img()">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-home" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">画像</span>
                          </div>
                        </div>          
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item active" onclick="select_video()">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-fire" style="color: red;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">動画</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_mylist()" style="border-bottom: 1px solid #c3c3c3;">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-heart" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">マイリスト</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_video()">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-folder" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">動画</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_video()" style="border-bottom: 1px solid #c3c3c3;">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-restore-clock" style="color: #606060;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">動画</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="txtandlogin">                     
                        <span style="font-size: 17px;line-height: 25px;">動画の評価、コメント、チ ヤンネル登録を行うにはロ グインしてください。</span>
                        <br>
                        <div class="login-btn" style="height: 40px;">
                            <div style="float: left;margin-top: -3px;">
                              <span class="mdi mdi-account-circle" style="font-size: 25px;"></span>
                            </div>
                            <div style="float: left;margin-top: 2px;margin-left: 5px;">
                              <span style="font-size: 14px;">ログイン</span>
                            </div>                  
                        </div>
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="txtandlogin" style="text-align: left;border: none;">
                        <div class="row">                        
                          <div class="col-sm-12" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;font-weight: bold;color: #919399;">BEST OF YOUTUBE</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_video()">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-music-circle" style="color: black;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">動画</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_video()">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-star-circle" style="color: black;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">動画</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="sel-item" onclick="select_video()">
                        <div class="row">
                          <div class="col-sm-3">
                            <span class="mdi mdi-heart-circle" style="color: black;font-size: 25px;line-height: 25px;"></span>
                          </div>
                          <div class="col-sm-9" style="text-align: left;">
                            <span style="font-size: 17px;line-height: 25px;">動画</span>
                          </div>
                        </div>                      
                      </div>
                    </div>
                  </div>
                  <div class="col-10 pl-4 pr-4 pt-0">
                    <div class="row intro-title">
                     
                    </div>
                    <div class="row" style="border-bottom: 1px solid #E1E1E1;">
                      <?php for($i = 0; $i < count($recommand_items); $i++){ ?>
                        
                        <div class="col-lg-3 col-md-6 col-12 mb-1" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        
                          <a href="<?php echo base_url ('Front/go_videoplay?item_id='.$recommand_items[$i]->id)?>" itemprop="contentUrl" data-size="480x360">
                              <img class="img-thumbnail img-fluid" src="../assets/images/gallery/<?php echo $i+1;?>_1.jpg" itemprop="thumbnail" alt="Image description" />
                          </a>
                          <p class="p-0 m-0" style="font-weight: bold;color: black;"><?php echo $recommand_items[$i]->title ; ?></p>                        
                          <p class="m-0" style="padding-top: 5px;font-weight: bold;font-size: 12px;"><?php echo $recommand_items[$i]->created_at ; ?></p>
                          <?php if ($recommand_items[$i]->views > 0) { ?>
                          <p class="p-0 m-0" style="font-weight: bold;font-size: 12px;">
                            <i class="fa fa-play"></i>&nbsp;<?php echo $recommand_items[$i]->views;?> &nbsp;
                            <i class="fa fa-comment"></i>&nbsp; 0 &nbsp;
                            <i class="fa fa-star"></i> &nbsp; <?php echo $recommand_items[$i]->favorite;?>                            
                          </p>
                          <?php } ?>
                        </div>
                      <?php } ?>                    
                    </div>
                    <div class="row intro-title" style="display:none;">
                      <img class="channel-profile" src="../assets/images/gallery/5_2.jpg">&nbsp;&nbsp;&nbsp;
                      <span style="line-height: 40px;">Jボップ-卜ピック</span>&nbsp;&nbsp;&nbsp;
                      <span class="recommand-channel" style="line-height: 40px;">おすすめのチヤンネル</span>
                      <div class="register-btn">
                        <span>チャンネル登録</span>&nbsp; <span>23万</span>
                      </div>
                    </div>
                    <div class="row" style=" display:none; border-bottom: 1px solid #E1E1E1;">
                      <?php for($i = 5; $i <= 8; $i++){ ?>
                        
                        <div class="col-lg-3 col-md-6 col-12 mb-1" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        
                          <a href="<?php echo base_url ('Front/go_playback?item_id='.$i)?>" itemprop="contentUrl" data-size="480x360">
                              <img class="img-thumbnail img-fluid" src="../assets/images/gallery/<?php echo $i;?>_1.jpg" itemprop="thumbnail" alt="Image description" />
                          </a>
                          <p class="p-0 m-0" style="font-weight: bold;color: black;">結婚式のプロフィールムービ</p>                        
                          <p class="m-0" style="padding-top: 5px;font-weight: bold;font-size: 12px;">dsfdsfdf hfgfj</p>
                          <p class="p-0 m-0" style="font-weight: bold;font-size: 12px;">44444</p>
                        </div>
                      <?php } ?>                    
                    </div>
                    <div class="row intro-title" style="display:none;">
                      <img class="channel-profile" src="../assets/images/gallery/9_5.jpg">&nbsp;&nbsp;&nbsp;
                      <span style="line-height: 40px;">Jボップ-卜ピック</span>&nbsp;&nbsp;&nbsp;
                      <span class="recommand-channel" style="line-height: 40px;">おすすめのチヤンネル</span>
                      <div class="register-btn">
                        <span>チャンネル登録</span>&nbsp; <span>23万</span>
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <?php for($i = 9; $i <= 12; $i++){ ?>
                        
                        <div class="col-lg-3 col-md-6 col-12 mb-1" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        
                          <a href="<?php echo base_url ('Front/go_playback?item_id='.$i)?>" itemprop="contentUrl" data-size="480x360">
                              <img class="img-thumbnail img-fluid" src="../assets/images/gallery/<?php echo $i;?>_1.jpg" itemprop="thumbnail" alt="Image description" />
                          </a>
                          <p class="p-0 m-0" style="font-weight: bold;color: black;">結婚式のプロフィールムービ</p>                        
                          <p class="m-0" style="padding-top: 5px;font-weight: bold;font-size: 12px;">dsfdsfdf hfgfj</p>
                          <p class="p-0 m-0" style="font-weight: bold;font-size: 12px;">44444</p>
                        </div>
                      <?php } ?>                    
                    </div>
                  </div>
                  <div class="col-1 mr-0" style="background-color: #F5F5F5;"></div>
                </div>
              </div>
              <!--/ Image grid -->             
            </div>
            <!--/ PhotoSwipe -->
          </section>
        </div>
      </div>
    </div>
    <div id="cover_div" style="display:none;top: 67.2px; left: 0px; position: fixed; width: 100%; height: 100vh; background-color: rgba(0,0,0,0.5); z-index: 1;">

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
       <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- <script src="../assets/js/photo-swipe/photoswipe-script.js"></script> -->
    <!-- END PAGE LEVEL JS-->
    <script>
        var clock;
        $(document).ready(function () {
            var W = $(window).width();
            var H = $(window).height();
            
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today =  mm + '/' + dd + '/' + yyyy;

            console.log(today);
            $('#datepicker_one').datepicker();
            $('#datepicker_two').datepicker();
            $("#datepicker_one" ).datepicker("setDate","01/01/2019");
            $("#datepicker_two" ).datepicker("setDate",today);
        });
        $('#search_key').focus(function() {
          $('#category_search').css('display', 'block');
          $('#cover_div').css('display', 'block');
        });
        $('#cover_div').click(function () {
            $('#category_search').css('display', 'none');
            $('#cover_div').css('display', 'none');
        });

        function cat_search(e) {
            console.log(e.nextElementSibling.value);
            var search_key = e.nextElementSibling.value;
            var category = e.nextElementSibling.nextElementSibling.value;
            console.log(category);
            $('#search_key').val(search_key);
            $('#is_cat').val(category);
            $('form').submit();
        }

        function select_img(){
          location.href = "<?php echo base_url('Front/index')?>";         
      
        }
        
        function select_video(){
          location.href = "<?php echo base_url('Front/go_video_index2')?>";    
        }

        function select_mylist(){
          location.href = "<?php echo base_url('Front/go_mylist')?>";
        }

        function go_login() {
            location.href = "<?php echo base_url('Front/login')?>";
        }

        function logout() {
            var userId = <?php echo $userId;?>;

            if (userId = 0) {
                alert("Please login");
                return;
            } else {
                var formData = new FormData();
                formData.append('userId', userId);
                $.ajax({
                    type: "POST",
                    url: 'logout',
                    success: function (data) {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result['state'] == "success") {
                            location.reload();
                        } else {
                            alert("wrong!");
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




