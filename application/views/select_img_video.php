
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

<style type="text/css">

    
</style>

</head>
<body>

  
        <div class="container pt-3 pb-5">
          <div class="row mb-5">
            <div class="col-md-8" style="margin-left: auto; margin-right: auto;">
                <div class="row">
                    <div class="col-md-6">
                        <button onclick="select_img()">image slideshow</button>
                    </div>   
                    <div class="col-md-6">
                        <button onclick="select_video()" style="">Local Video play</button>
                    </div>  
                
                </div>
            </div>
          </div>
        </div>
       

    

    <script>
        

        $(document).ready(function () {
            var W = $(window).width();
            var H = $(window).height(); 
        });

      
        function select_img(){
          location.href = "<?php echo base_url('Front/go_img_index1')?>";         
      
        }
        
        function select_video(){
          location.href = "<?php echo base_url('Front/go_video_index2')?>";    
        }

        function select_youtube(){
            location.href = "<?php echo base_url('Front/go_youtube_index3')?>";   
        }
    </script>
</body>
</html>
