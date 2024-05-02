
                <div class="col-10 pl-4 pr-4 pt-0" style="background-color: #FAFAFA;">
                  <div id="content-wrapper">  
                    <div class="card mb-3">                          
                        <div class="card-body" style="background-color: #FAFAFA;">
                            <div class="card mb-3">                                  
                                <div class="card-body">
                                    <div class="row">                                      
                                        <div class="col-sm-4" style="text-align: center;">
                                          <span style="line-height: 40px;">画像の切り替え秒数</span>
                                        </div>
                                        <div class="col-sm-5">                                                                
                                            <input type="number" id="switch_second" style="width: 80%;" class="form-control" required="required" value="<?php echo $setting->img_switching_second;?>" />
                                        </div>
                                        <div class="col-sm-3" style="text-align: center;">
                                            <button class="btn btn-primary" style="" type="button" onclick="javascript:change_second()">変更</button>
                                        </div>                                      
                                    </div>
                                </div>
                            </div>                          
                        </div>  
                        <div class="card-body" style="background-color: #FAFAFA;">
                            <div class="card mb-3">                                  
                                <div class="card-body">
                                    <div class="row">                                      
                                        <div class="col-sm-4" style="text-align: center;">
                                          <span style="line-height: 40px;">コメントのフォントサイズ</span>
                                        </div>
                                        <div class="col-sm-5">                                                                
                                            <input type="number" id="comment_size" style="width: 80%;" class="form-control" required="required" value="<?php echo $setting->comment_size;?>" />
                                        </div>
                                        <div class="col-sm-3" style="text-align: center;">
                                            <button class="btn btn-primary" style="" type="button" onclick="javascript:change_comment_size()">変更</button>
                                        </div>                                      
                                    </div>
                                </div>
                            </div>                          
                        </div> 
                        <div class="card-body" style="background-color: #FAFAFA;">
                            <div class="card mb-3">                                  
                                <div class="card-body">
                                    <div class="row">     
                                      <div class="col-sm-4" style="text-align: center;">
                                        <span style="line-height: 144px;">広告画像</span>
                                      </div>                               
                                      <div class="col-sm-5">
                                        <div class="ml-auto mr-auto" style="width: 190px;height: 144px;">                     
                                           <img id="admob" src="../uploads/admob/<?php echo $setting->admob_img;?>" style="width: 100%;height: 100%;background-size: 100% 100%;background-repeat: no-repeat">
                                           <input id="chooseLocalImg1" type="file" accept="image/*" style="width:190px;height: 144px;position: absolute;top: 0;opacity: 0;cursor: pointer;" />
                                        </div>
                                      </div>
                                      <div class="col-sm-3" style="text-align: center;">           
                                        <button class="btn btn-primary" style="margin-top: 52px;" type="button" onclick="javascript:change_admob()">変更</button>
                                      </div>                                                                            
                                    </div>
                                </div>
                            </div>                          
                        </div>  

                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </div>          
        </section>
      </div>
    </div>
  </div>
    
<script type="text/javascript">

   $('#add_img').removeClass('active');
   $('#setting').addClass('active');
   $('#setting_icon').css('color', 'red');
   $('#image_icon').css('color', '#606060');

  
   //////////////////////////////////////////////////////////
            function change_second(){
              var new_second = $('#switch_second').val();
              if (new_second.length < 1) {
                alert('Please input second');
                return;
              }
              else{
                $.post('change_second', {'second': new_second},
                    function (data) {                        
                        var result = JSON.parse(data);
                        if (result['state'] == "success") {
                            alert("Changed OK!");
                            // location.reload();                            
                            
                        } else {
                            alert('warning');
                        }

                    }
                );
              }
            }
 //////////////////////////////////////////////////////////////////
          function change_comment_size(){
            var comment_size = $('#comment_size').val();
              if (comment_size.length < 1) {
                alert('Please input comment font size');
                return;
              }
              else{
                $.post('change_comment_size', {'comment_size': comment_size},
                    function (data) {                        
                        var result = JSON.parse(data);
                        if (result['state'] == "success") {
                            alert("Changed OK!");                                                       
                            location.reload();
                        } else {
                            alert('warning');
                        }

                    }
                );
              }
          }           
///////////////////////////////////////////////////////////////////
        var  admob_img_file = null;        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#admob').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                admob_img_file = input.files[0];               
            }
        }
        
        $("#chooseLocalImg1").change(function(){          
            readURL(this);            
        });

        function change_admob(){
          if (admob_img_file != null) {
           var formData = new FormData();
            formData.append('image', admob_img_file, admob_img_file.fileName);
            $.ajax({
                type: "POST",
                url: 'edit_admob',
                success: function (data, textStatus, jqXHR) {
                    var result = JSON.parse(data);
                    console.log(result);
                    if (result['state'] == "success") {  
                        alert("Changed OK!");                      
                        admob_img_file = null;                      
                    }
                    else {
                        alert("warning");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    message('danger', textStatus + ': ' + errorThrown);
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