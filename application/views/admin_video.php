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
                                          <select id="category" style="width: 200px;height: 40px;" autofocus>
                                            <option value="0">Select Category</option>
                                            <?php if (isset($categories)) {                                              
                                              foreach ($categories as $key => $category) {  ?>
                                              <option value="<?php echo $category->id;?>"><?php echo $category->category_name; ?></option>
                                            <?php } } ?>
                                          </select>
                                        </div>
                                        <div class="row pt-2 pl-4">     
                                          <span style="line-height: 40px;">Title: &nbsp;</span>                                    
                                          <input type="text" id="title" style="width: 80%; float:left;" class="form-control" required="required" placeholder="Input new item title">
                                        </div>
                                        <div class="col-sm-9 pt-2 ml-auto mr-auto">
                                          <input id="chooseLocalVideo" type="file" accept=".mp4"/>
                                          <div id="thumbnail" style="padding-top: 10px;">
                                            <img id="video_thumbnail" src="../assets/images/video_icon.jpg" style="width: 210px;height: 130px;" />
                                          </div>
                                        </div>
                                        
                                      </div>    
                                      <div class="col-sm-6"> 
                                        <div class="row">
                                          <span style="line-height: 40px;">Views: </span>&emsp;&emsp;
                                          <input type="number" id="views" style="width: 60%;" class="form-control" required="required" placeholder="Input the number of views" value="0">
                                        </div>
                                        <div class="row pt-2">
                                          <span style="line-height: 40px;">Favorites: &nbsp;</span>
                                          <input type="number" id="favorites" style="width: 60%;" class="form-control" required="required" placeholder="Input the number of favorites" value="0">
                                        </div>
                                        <div class="row pt-2">
                                          <span style="line-height: 40px;">Disgusts: &nbsp;</span>
                                          <input type="number" id="disgusts" style="width: 60%;" class="form-control" required="required" placeholder="Input the number of disgusts" value="0">
                                        </div>
                                      </div>  
                                  </div>                                 
                                
                                   <div class="row mt-2">
                                    <div class="col-sm-6 mr-auto ml-auto" style="text-align: center;">
                                      <button class="btn btn-primary" style="width: 50%;" type="button" onclick="javascript:add_video()">Add</button>
                                    </div>
                                  </div>
                              </div>
                          </div>

                          <div class="input-group" style="width: 300px;float:right;">
                              <input type="text" id="search_item" class="form-control" placeholder="Enter the item name..." aria-label="Search" aria-describedby="basic-addon2">
                              <div class="input-group-append" onclick="javascript:search_item()">
                                  <button class="btn btn-primary" type="button">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="table-responsive">
                              <table class="table table-bordered table-striped" id="dataTable" width="50%" cellspacing="0" style="margin-top: 20px;background-color: white;">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Title</th>
                                      <!-- <th>Poster</th> -->
                                      <th>Category</th>
                                      <th>Views</th>
                                      <th>Favorites</th>
                                      <th>Disgusts</th>
                                      <!-- <th>Date and Time</th> -->
                                      <th>Operation</th>
                                  </tr>
                                  </thead>
                                  <tbody id="item-table">
                                  <tr>
                                      <td colspan="7">No Item</td>
                                  </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      
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
 <style type="text/css">
   /*img {
      max-width: 210px;
      max-height: 130px;
      vertical-align: middle;
      text-align: center;
      background-size: 100% 100%;
    }

    @supports (object-fit: cover) {
      img {
        width: 210px;
        height: 130px;
        object-fit: cover;
        background-size: 100% 100%;
      }
    }*/
    
 </style>   
 <script type="text/javascript">
   $('#add_img').removeClass('active');
   $('#add_video').addClass('active');
   $('#video_icon').css('color', 'red');
   $('#image_icon').css('color', '#606060');

////////////////////    video thumbnail  ///////////////////////////////////

  document.getElementById('chooseLocalVideo').addEventListener('change', function(event) {
      var file = event.target.files[0];
      var fileReader = new FileReader();
      
        fileReader.onload = function() {
          var blob = new Blob([fileReader.result], {type: file.type});
          var url = URL.createObjectURL(blob);
          var video = document.createElement('video');
          var timeupdate = function() {
            if (snapImage()) {
              video.removeEventListener('timeupdate', timeupdate);
              video.pause();
            }
          };
          video.addEventListener('loadeddata', function() {
            if (snapImage()) {
              video.removeEventListener('timeupdate', timeupdate);
            }
          });
          var snapImage = function() {
            var canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            var image = canvas.toDataURL();
            var success = image.length > 100000;
            if (success) {
              var img = document.getElementById('video_thumbnail');
              img.src = image;         

              URL.revokeObjectURL(url);
            }
            return success;
          };
          video.addEventListener('timeupdate', timeupdate);
          video.preload = 'metadata';
          video.src = url;
          console.log(url);
          // Load video in Safari / IE11
          video.muted = true;
          video.playsInline = true;
          video.play();
        };
        fileReader.readAsArrayBuffer(file); 
    });

////////////////////////////////////////////////////////////////////////////////////////
    $(document).ready(function() {
          load_videos();
    }); 

    function load_videos(){
      $.get('all_videos',
          function (data) {              
              var result = JSON.parse(data);              
              if (result['state'] == "success") {                        
                        var videos = result['videos'];
                        var category_names = result['category_names'];    
                        var items_images = result['items_images'];                    
                        var tbhtml = "";
                        for (var i = 0; i < videos.length; i++) {
                            var num = i+1;
                            var video = videos[i];
                            var title = video['title'];                            
                            var video_id = video['id'];
                            var video_url = video['video_url'];
                            var category = category_names[i];
                            var views = video['views'];
                            var disgusts = video['disgust'];
                            var favorites = video['favorite'];
                            var date = video['created_at'];
                            tbhtml += '<tr>';
                            tbhtml += '<td>' + num + '</td>';
                            tbhtml += '<td>';                          
                            tbhtml += '<span id = "title_'+i+'">' + title + '</span>';
                            tbhtml += '</td>';
                            // tbhtml += '<td>';
                            
                            // tbhtml += '<div id="output'+i+'"></div></td>';
                            tbhtml += '<td>'+category+'</td>';   
                            tbhtml += '<td>'+views+'</td>';   
                            tbhtml += '<td>'+favorites+'</td>'; 
                            tbhtml += '<td>'+disgusts+'</td>';    
                            //tbhtml += '<td>'+date+'</td>';                
                            tbhtml += '<td width="200">';                            
                            tbhtml += '<button class="btn btn-info" type="button" onclick="go_edit_video('+video_id+')">Edit</button>&emsp;';
                            tbhtml += '<button class="btn btn-danger" type="button" onclick="go_delete_video('+video_id+')">Delete</button>';
                            tbhtml += '</td>';
                            tbhtml += '</tr>';

                        }
                        $('#item-table').html(tbhtml);

                        // for(var i=0; i < videos.length; i++){    
                        //   var video = videos[i];  
                        //   var video_url = video['video_url'];                                   
                        //   $('#main-video'+i).css('width', '84px');
                        //   $('#main-video'+i).css('height', '52px');
                        //   var td_video = document.createElement('video'); 
                        //   td_video.setAttribute('src', '../uploads/videos/' + video_url);           
                        //   var timeupdate = function() {
                        //     if (snapImage()) {
                        //       td_video.removeEventListener('timeupdate', timeupdate);
                        //       td_video.pause();
                        //     }
                        //   };
                        //   td_video.addEventListener('loadeddata', function() {
                        //     if (snapImage()) {
                        //       td_video.removeEventListener('timeupdate', timeupdate);
                        //     }
                        //   });
                        //   var snapImage = function() {
                        //     var canvas = document.createElement('canvas');
                        //     canvas.width = 84;
                        //     canvas.height = 52;
                        //     canvas.getContext('2d').drawImage(td_video, 0, 0, canvas.width, canvas.height);
                        //     var image = canvas.toDataURL();
                        //     console.log(image);
                        //     var success = image.length > 100000;
                        //     if (success) {
                        //       var img = document.createElement("img");
                        //       img.src = image;         
                        //       var $output = $("#output"+i);
                        //       $output.appendChild(img);
                        //       // URL.revokeObjectURL(url);
                        //     }
                        //     return success;
                        //   };
                        //    // video.addEventListener('timeupdate', timeupdate);
                        //   // $('#main-video'+i).css('display', 'block');
                        // }
                    } else {
                        var tbhtml = "";
                        tbhtml +='<tr><td colspan="7">No Item</td></tr>';
                        $('#dataTable').html(tbhtml);
              }
          }
      );
    }




    var video_file = null;
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            // reader.onload = function (e) {
            //     $('#slide_img' + cnt).attr('src', e.target.result);
            // }
            reader.readAsDataURL(input.files[0]);
            video_file = input.files[0];
            
        }
    }
    
    $("#chooseLocalVideo").change(function(){          
        readURL(this);            
    });

    function add_video(){
          
          var sel_category = $('#category').val();
          var title = $('#title').val();
          var views = $('#views').val();
          var favorites = $('#favorites').val();
          var disgusts = $('#disgusts').val();
          if (sel_category == 0) {
            alert("Please select category.");
            return;
          }
          else if(title.length < 1){
            alert("Please Input Title.");
            return;
          }
          else if (video_file == null) {
            alert("Please select video.");
            return;
          }
          else{
            var formData = new FormData();          
                  formData.append('category', sel_category);
                  formData.append('title', title);
                  formData.append('views', views);
                  formData.append('favorites', favorites);
                  formData.append('disgusts', disgusts);             
                  formData.append('video', video_file, video_file.fileName);                                 
                    $.ajax({
                        type: "POST",
                        url: 'add_video',
                        success: function (data, textStatus, jqXHR) {
                            var result = JSON.parse(data);                            
                            if (result['state'] == "success") {
                                location.reload();
                                video_file = null;
                                
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

        function go_edit_video(video_id){
          location.href = 'go_edit_video?video_id=' + video_id;
        }
 </script>