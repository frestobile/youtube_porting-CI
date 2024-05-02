                <div class="col-10 pl-4 pr-4 pt-0" style="background-color: #FAFAFA;">
                 
                  <div id="content-wrapper">  
                    <div class="card mb-3">
                      
                      <div class="card-body" style="background-color: #FAFAFA;">
                          <div class="card mb-3">
                             
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-6" style="text-align: center;">   
                                        <div class="row pl-4">  
                                          <span style="line-height: 40px;">Category: &nbsp;</span>                           
                                          <input type="text" id="category" style="width: 200px; height: 40px;" class="form-control" readonly="readonly" value="<?php echo $category;?>" />
                                        </div>
                                        <div class="row pt-2 pl-4">     
                                          <span style="line-height: 40px;">Title: &nbsp;</span>                                    
                                          <input type="text" id="title" style="width: 80%; float:left;" class="form-control" required="required" value="<?php echo $video->title;?>">
                                        </div>
                                        
                                      </div>    
                                      <div class="col-sm-6"> 
                                        <div class="row">
                                          <span style="line-height: 40px;">Views:</span>&emsp;&emsp;
                                          <input type="number" id="views" style="width: 60%;" class="form-control" required="required" value="<?php echo $video->views;?>">
                                        </div>
                                        <div class="row pt-2">
                                          <span style="line-height: 40px;">Favorites: &nbsp;</span>
                                          <input type="number" id="favorites" style="width: 60%;" class="form-control" required="required" value="<?php echo $video->favorite;?>">
                                        </div>
                                        <div class="row pt-2">
                                          <span style="line-height: 40px;">Disgusts: &nbsp;</span>
                                          <input type="number" id="disgusts" style="width: 60%;" class="form-control" required="required" value="<?php echo $video->disgust;?>">
                                        </div>
                                      </div>  
                                  </div>                                 
                                
                                   <div class="row mt-2">
                                    <div class="col-sm-6 mr-auto ml-auto" style="text-align: center;">
                                      <button class="btn btn-primary" style="width: 50%;" type="button" onclick="javascript:edit_video()">変更</button>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                            <input type="hidden" id="video_id" value="<?php echo $video->id;?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Image grid -->
          </div>
          
        </section>
      </div>
    </div>
  </div>
    
 <script type="text/javascript">
   $('#add_img').removeClass('active');
   $('#add_video').addClass('active');
   $('#video_icon').css('color', 'red');
   $('#image_icon').css('color', '#606060');

  
    
    
   

    function edit_video(){
          
          var video_id = $('#video_id').val();
          var title = $('#title').val();
          var views = $('#views').val();
          var favorites = $('#favorites').val();
          var disgusts = $('#disgusts').val();
          if(title.length < 1){
            alert("Please Input Title.");
            return;
          }
          else if(views.length < 1){
            alert("Please Input Views.");
            return;
          }
          else if(favorites.length < 1){
            alert("Please Input Favorites.");
            return;
          }
          else if(disgusts.length < 1){
            alert("Please Input Disgusts.");
            return;
          }
          else{
            var formData = new FormData();          
                  formData.append('video_id', video_id);
                  formData.append('title', title);
                  formData.append('views', views);
                  formData.append('favorites', favorites);
                  formData.append('disgusts', disgusts);             
                                      
                    $.ajax({
                        type: "POST",
                        url: 'edit_video',
                        success: function (data, textStatus, jqXHR) {
                            var result = JSON.parse(data);                            
                            if (result['state'] == "success") {
                                location.href = 'go_video';                               
                                
                            }
                            else {
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