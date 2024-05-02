
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../assets/js/sweet-alerts.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
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
        function go_category(){
          location.href = "<?php echo base_url('Admin/go_category')?>";
        }
        function go_img(){
          location.href = "<?php echo base_url('Admin/index')?>";         
      
        }
        
        function go_video(){
          location.href = "<?php echo base_url('Admin/go_video')?>";    
        }

        function go_setting(){
          location.href = "<?php echo base_url('Admin/go_setting')?>";    
        }
    </script>
        
</body>
</html>
