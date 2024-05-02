
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!--Custom css-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- jquery JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
    <link href="../assets/css/mdi-icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<style type="text/css">
  .control-bar {    
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 30px;
    background-color: rgba(43, 51, 63, 0.7);
    color: white;
    z-index: 999;
  }
  .control-btn{
    width: 40px;
    height: 100%;
    font-size: 20px;
    line-height: 30px;
    text-align: center;
    float: left;
    cursor: pointer;
  }
  .volumeslide{   
    display: none;
    width: 0;
    float: left;
    -webkit-transition: width 0.5s; /* For Safari 3.1 to 6.0 */
    transition: width 0.5s;
  }
  .slidecontainer {
    width: 80%;
    float: left;
    -webkit-transition: width 0.5s; /* For Safari 3.1 to 6.0 */
    transition: width 0.5s;
  }

  .seekbar {
    -webkit-appearance: none;
    width: 90%;
    height: 4px;
    border-radius: 2px;
    background: rgba(115, 133, 159, 0.5);
    outline: none;
    opacity: 1;
    -webkit-transition: .2s;
    transition: opacity .2s;
    -webkit-transition: width 0.5s; /* For Safari 3.1 to 6.0 */
    transition: width 0.5s;
    vertical-align: middle;
  }

  /*.seekbar::-webkit-slider-thumb:hover {
    -webkit-slider-thumb:width: 14px;
    -webkit-slider-thumb:height: 14px;
  }*/
  .seekbar:hover{
    height: 6px;
    border-radius: 3px;  
  }
  .seekbar::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: white;
    cursor: pointer;
  }

  .seekbar::-moz-range-thumb {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: white;
    cursor: pointer;
  }

  form.example input[type=text] {
            width: 35% !important;
      }
</style>

<body>

    <div class="app-content content">
    <!--   <div class="content-wrapper" style="padding: 1rem 2.2rem; box-shadow: 5px 10px 18px #eeeeee;">
        <div class="row color60">
          <div class="col-md-2" style="min-width: 180px;">
            <div class="row">
              <div class="col-sm-2">
                  <a href="index">
                      <span class="mdi mdi-menu" style="font-size: 27px;"></span>
                  </a>
              </div>
              <div class="col-sm-10">
                  <img src="../assets/images/logo.png" style="width: 27px;">
                  <span style="font-size: 20px;font-family: fantasy;color: black;">みめ</span>
                <span class="JP-txt">JP</span>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <form class="example" action="/action_page.php">
              <input type="text" placeholder="検索" name="search">
              <button type="submit"><i class="fa fa-search" style="color: black;"></i></button>
            </form>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-sm-2">
                <span class="mdi mdi-video-plus" style="font-size: 27px;"></span>
              </div>
              <div class="col-sm-2">
                <span class="mdi mdi-grid" style="font-size: 27px; color: black;"></span>
              </div>
              <div class="col-sm-2">
                <span class="mdi mdi-share" style="font-size: 27px;"></span>
              </div>
              <div class="col-sm-2">
                <span class="mdi mdi-dots-vertical" style="font-size: 27px;"></span>
              </div>
              <div class="col-sm-4">
                  <?php if ($is_login == 0) {?>
                      <div class="login-btn" onclick="go_login();">
                          <div style="float: left;margin-top: -3px;">
                              <span class="mdi mdi-account-circle" style="font-size: 25px;"></span>
                          </div>
                          <div style="float: left;margin-top: 5px;margin-left: 5px;">
                              <span style="font-size: 14px;">ログイン</span>
                          </div>
                      </div>
                  <?php } else {?>
                      <div class="login-btn" onclick="logout();">
                          <div style="float: left;margin-top: -3px;">
                              <span class="mdi mdi-account-circle" style="font-size: 25px;"></span>
                          </div>
                          <div style="float: left;margin-top: 5px;margin-left: 5px;">
                              <span style="font-size: 12px;">ログアウト</span>
                          </div>
                      </div>
                  <?php }?>
              </div>
            </div>
          </div>
        </div>      
    </div> -->
    <?php defined('BASEPATH') OR exit('No direct script access allowed');
     $this->load->view('includes/header_portion'); ?> 
      <div class="content-wrapper" style="padding: 1rem 2.2rem;">
        <div class="row">
          <div class="col-md-7">
            <div class="video">
              <div class="video-holder">
                <div class="youtube" data-embed="PuGpgHT1Dxc">
                  <div class="play-button" id="play-button"></div>
                  <img id="poster-img" src="../uploads/images/<?php echo $item_images[0]->img_url;?>" style="width: 100%;height: 100%;">

                  <div class="slideshow" id="stage1" style="display: none;">
                    <?php foreach($item_images as $key => $img){
                      $i = $key + 1; ?>
                      <a id="first<?php echo $i;?>" title="<?php echo $img->description;?>"><img src="../uploads/images/<?php echo $img->img_url;?>"></a>                   
                    <?php }?>
                  </div>            
                </div>
                <div class="control-bar">
                  <div id="play-btn" class="control-btn" onclick="PlayOrPause()">
                    <span class="mdi mdi-play"></span>
                  </div>
                  <div id="volume-btn" class="control-btn" onclick="change_volume()">
                    <span class="mdi mdi-volume-high"></span>
                  </div>
                  <div class="volumeslide">
                    <input type="range" min="0" max="100" value="100" class="seekbar" id="myVolume">                  
                  </div>
                  <div class="slidecontainer">
                    <input type="range" min="0" max="<?php echo count($item_images);?>" value="1" class="seekbar" id="myRange">&nbsp;&nbsp;
                    <span  id="demo" style="font-size: 12px;"></span>
                  </div>
                  <div id="fullscreen-btn" class="control-btn" style="float: right;" onclick="FullscreenOrExit()">
                    <span class="mdi mdi-fullscreen"></span>
                  </div>  
                </div>
              </div>
            </div>
            

            <p class="pt-1 mb-0" style="font-weight: bold;color: black;width: 50%;"><?php echo $item->title?></p>
            <div class="row pb-1" style="border-bottom: 1px solid #c3c3c3;">
              <div class="col-md-6">
                <!-- <span class="mb-1"><?php echo $item->views?> 回視聴</span> -->
                <span class="mb-1"><?php echo $total_views?> 回視聴</span>
              </div>
              <div class="col-md-6 p-0 m-0">
                <div class="row">
                  <div style="width: 20%;float: left;padding: 0 5px;">
                    <span class="mdi mdi-thumb-up" style="font-size: 15px;"></span>
                    <?php if ($item->favorite > 10000){?>
                      <span><?php echo $item->favorite/10000;?>万</span>
                    <?php } else{ ?>
                      <span><?php echo $item->favorite?></span>
                    <?php } ?>
                  </div>             
            
                  <div style="width: 20%;float: left;padding: 0 5px;">
                    <span class="mdi mdi-thumb-down"></span>
                    <?php if ($item->disgust > 10000){?>
                      <span><?php echo $item->disgust/10000;?>万</span>
                    <?php } else{ ?>
                      <span><?php echo $item->disgust?></span>
                    <?php } ?>
                  </div>

                  <div style="width: 20%;float: left;padding: 0 5px;">
                    <span class="mdi mdi-share" style="font-size: 20px;line-height: 20px;"></span>
                    <span>共有</span>
                  </div>

                  <div style="width: 20%;float: left;padding: 0 5px;">
                    <span class="mdi mdi-playlist-plus" style="font-size: 20px;line-height: 20px;"></span>
                    <span>保存</span>
                  </div>

                  <div style="width: 20%;float: left;padding: 0 5px;">
                    <span class="mdi mdi-dots-horizontal" style="font-size: 25px;line-height: 25px;"></span>                  
                  </div>
                </div>
              </div>
            </div>
            <div class="row intro-title">
              <div style="margin-right: 10px;">
                <img class="channel-profile" src="../uploads/category/<?php echo $category->category_icon;?>">
              </div>
              <div class="col-sm-3">
                <div class="row">
                  <span style="line-height: 22px;font-size: 13px"><?php echo $category->category_name;?></span>
                </div>
                <div class="row">
                  <span class="recommand-channel" style="line-height: 12px;font-size: 12px;"><?php echo date('Y/m/d',strtotime($category->created_at));?> に公開</span>
                </div>
              </div>              
              
              <div class="register-btn" style="right: 15px;">
                <span>チャンネル登録</span>&nbsp; 
                <?php if ($category->subscribe > 10000){?>
                  <span><?php echo $category->subscribe/10000;?>万</span>
                <?php } else{ ?>
                  <span><?php echo $category->subscribe;?></span>
                <?php } ?>
                
              </div>
              
            </div>

          <div class="row">
              <div class="com-sm-12">
                  <?php foreach ($commit as $commit_text) { ?>
                  <div class="form-group input-group">
                    <?php echo $commit_text;?>
                  </div>
                  <?php } ?>
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                  <div class="form-group input-group">
                      <textarea id="commit" class="form-control" placeholder="コミットを入力してください。" name="commit" type="text" rows="3"></textarea>
                  </div>
                  <div class="row">
                      <div class="col-sm-8"></div>
                      <div class="col-sm-3">
                          <button class="btn btn-sm btn-primary btn-block" onclick="commit_submit()">コミット</button>
                      </div>
                      <div class="col-sm-1"></div>
                  </div>
              </div>
              <div class="col-sm-1"></div>

          </div>

          </div>

          <div class="col-md-5" style="min-width: 475px;">
            <?php if($settings->admob_img == null){?>
              <img src="../assets/images/admob.png" style="width: 60%;height: 250px;">
            <?php } else { ?>
              <img src="../uploads/admob/<?php echo $settings->admob_img;?>" style="width: 60%;height: 250px;">
            <?php } ?>
            <div class="row mt-1 p-1">
              <span style="color: black;font-size: 17px;">次の動画</span>
              <div style="position: absolute;right: 2.5rem;line-height: 14px;">
                <span class="color60" style="font-size: 14px;">自動再生</span>
                <label class="switch">
                  <input type="checkbox" checked>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            
            <?php foreach ($all_items as $key => $next_item) { 
              if ($next_item->id != $item->id) {            
            ?>
              <div class="row mb-1" onclick="item_play(<?php echo $next_item->id;?>)">
                <div class="col-sm-5 mr-0 pr-0" style="padding-right: 8px !important;">
                  <img src="../uploads/images/<?php echo $all_images[$key]; ?>" style="max-width: 220px;width: 100%;height: 120px;">
                </div>
                <div class="col-sm-7 pl-0">
                  <p class="mb-0" style="font-weight: bold;color: black;"><?php echo $next_item->title;?></p>
                  
                  <p class="mb-0">Local Youtube</p>
                  <p class="mb-0"><?php echo $next_item->views;?> &nbsp;回視聴</p>
                </div>
              </div>
            <?php }} ?>
          </div>
        </div>
      </div>
      <div id="fullsreen_back" style="position: fixed;width: 100%;height: 100%;background-color: black;z-index: 8;top: 0;left: 0;display: none;">
    </div>

    <input type="hidden"  value="<?php echo $settings->img_switching_second;?>" id="switching_second">
    <input type="hidden"  value="<?php echo $settings->comment_size;?>" id="comment_size">
      
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
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
            $("#datepicker_one" ).datepicker("setDate",today);
            $("#datepicker_two" ).datepicker("setDate",today);            
        });

        var comment_size = $('#comment_size').val();
        var my_slide_scond = $('#switching_second').val();        
        var switching_second = parseInt(my_slide_scond) + 1;   
        var sec = switching_second * 1000;     
        var fullscreen_state = 0;
        var play_pause = 0;
        var mySlide;
        var slide_value = 1;
        var slide_range = $('#myRange').attr('max');
        $(document).ready(function () {
            $('.slideshow a').css('font-size', comment_size + 'em');
            $('#first1').css('animation-delay', my_slide_scond + 's');
           
            var video_W = $('.video').width();
            var video_H = video_W * 360 / 635;
            $('.video').css('height', video_H + 'px');

            let youtube = $('.youtube');
            for (let i = 0; i < youtube.length; i++) {
              youtube[i].addEventListener("click", function() {
                if (play_pause == 0) {
                  $('#play-button').css('z-index', '-1');
                  $('#play-button').css('opacity', '0');
                  $('#poster-img').css('display', 'none');
                  $('#stage1').css('display', 'block');

                  $('#play-btn span').removeClass('mdi-play');
                  $('#play-btn span').addClass('mdi-pause');
                  play_pause = 1;
                  
                  mySlide = setInterval(change_slide, sec);
                }
                else{
                  $('#play-btn span').removeClass('mdi-pause');
                  $('#play-btn span').addClass('mdi-play');
                  $('#play-button').css('z-index', '9');
                  $('#play-button').css('opacity', '1');
                  $('#poster-img').css('display', 'block');
                  var url = '../uploads/images/<?php echo $item_images[0]->img_url;?>';
                  $('#poster-img').attr('src', url);                  
                  $('#stage1').css('display', 'none');
                  play_pause = 0;

                  clearInterval(mySlide);
                }
                
              } );
            }
        });

        window.onresize = function(event) {
            var video_W = $('.video').width();
            var video_H = video_W * 360 / 635;
            $('.video').css('height', video_H + 'px');
            
        };

        window.addEventListener("DOMContentLoaded", function(e) {        
          var stage1 = document.getElementById("stage1");
          var fadeComplete1 = function(e) { stage1.appendChild(arr1[0]); };
          var arr1 = stage1.getElementsByTagName("a");
          for(var i=0; i < arr1.length; i++) {
            arr1[i].addEventListener("animationend", fadeComplete1, false);
          }          
        }, false);  
      
        function item_play(item_id){
          location.href = "<?php echo base_url('Front/go_playback?item_id=')?>" + item_id;
        }
        
        var seekbar = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = seekbar.value;

        seekbar.oninput = function() {
          output.innerHTML = this.value;


        }

        function commit_submit() {
            var i_item_id = <?php echo $item_id;?>;
            var user_id = <?php echo $userId;?>;
            var commit = $('#commit').val();
            var v_item_id = 0;

            if (commit.length < 1) {
                alert('Please Input you commit');
                return;
            } else {
                var formData = new FormData();
                formData.append('i_item_id', i_item_id);
                formData.append('v_item_id', v_item_id);
                formData.append('user_id', user_id);
                formData.append('commit', commit);
                $.ajax({
                    type: "POST",
                    url: 'add_commit',
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

        function PlayOrPause(){
          if (play_pause == 0) {
            $('#play-btn span').removeClass('mdi-play');
            $('#play-btn span').addClass('mdi-pause');
            $('#play-button').css('z-index', '-1');
            $('#play-button').css('opacity', '0');
            $('#poster-img').css('display', 'none');
            $('#stage1').css('display', 'block');
            play_pause = 1;
            
            mySlide = setInterval(change_slide, sec);
          }
          else{
            $('#play-btn span').removeClass('mdi-pause');
            $('#play-btn span').addClass('mdi-play');
            $('#play-button').css('z-index', '9');
            $('#play-button').css('opacity', '1');
            $('#poster-img').css('display', 'block');
            var url = '../uploads/images/<?php echo $item_images[0]->img_url;?>';
            $('#poster-img').attr('src', url);            
            $('#stage1').css('display', 'none');
            play_pause = 0;

            clearInterval(mySlide);
          }
        }

        

        function change_slide(){  
          
          slide_value++;
          $('#first' + slide_value).css('animation-delay', my_slide_scond + 's');          
          $('#myRange').val(slide_value);
          $('#demo').text(slide_value);
          console.log(slide_value);
          if (slide_value == parseInt(slide_range)) {
            slide_value = 0;
          }
        }

        var show_volume = 0;
        function change_volume(){
          if (show_volume == 0) {
            $('#volume-btn span').removeClass('mdi-volume-high');
            $('#volume-btn span').addClass('mdi-volume-off');
            show_volume = 1;
          }
          else{
            $('#volume-btn span').removeClass('mdi-volume-off');
            $('#volume-btn span').addClass('mdi-volume-high');
            show_volume = 0;
          }
        }
        $('#volume-btn').hover(
          function(){   
            $('.volumeslide').css('display', 'block');
            $('.volumeslide').css('width', '10%');
            $('.slidecontainer').css('width', '70%');
          },
          function(){       
            $('#myVolume').hover(
              function(){   
                $('.volumeslide').css('display', 'block');            
              },
              function(){       
                setTimeout(function(){ $('.volumeslide').css('display', 'none'); }, 500);     
                $('.volumeslide').css('width', '0');            
                $('.slidecontainer').css('width', '80%');
              }              
            );

          }
        );
        
        var fullscreen_state = 0;
        var v_w = 0;
        var v_h = 0; 
        function FullscreenOrExit(){
          if (fullscreen_state == 0) {
            $('#fullscreen-btn span').removeClass('mdi-fullscreen');
            $('#fullscreen-btn span').addClass('mdi-fullscreen-exit');
            fullscreen_state = 1;
            v_w = $('.video').width();
            v_h = $('.video').height();
            var window_W = $(window).width();
            var window_H = $(window).height();
            var video_w = window_W;
            var video_h = window_W * 360 / 635;
            if (video_h > window_H) {
              video_h = window_H;
              video_w = window_H * 635 / 360;
            }
            var Margin_Left = (window_W - video_w - 50) / 2;
            $('.video').css('width', video_w + 'px');
            $('.video').css('height', video_h + 'px');
            $('.video').css('top', '-87px');
            $('.video').css('left', Margin_Left + 'px');
            $('.video').css('position', 'absolute');
            $('.video').css('z-index', '9');
            $('#fullsreen_back').css('display', 'block');
          }
          else{
            $('#fullscreen-btn span').removeClass('mdi-fullscreen-exit');
            $('#fullscreen-btn span').addClass('mdi-fullscreen');
            fullscreen_state = 0;
            $('.video').css('width', v_w + 'px');
            $('.video').css('height', v_h + 'px');
            $('.video').css('top', '0');
            $('.video').css('left', '0');
            $('.video').css('position', 'relative');
            $('.video').css('z-index', '1');
            $('#fullsreen_back').css('display', 'none');
          }
        }


    </script>
    
</body>
</html>
