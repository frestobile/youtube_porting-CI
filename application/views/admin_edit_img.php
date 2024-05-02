                <div class="col-10 pl-4 pr-4 pt-0" style="background-color: #FAFAFA;">
                 
                  <div id="content-wrapper">  
                    <div class="card mb-3">
                      
                      <div class="card-body" style="background-color: #FAFAFA;">
                          <div class="card mb-3">
                             
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-6"> 
                                        <div class="row pl-4">
                                           
                                            <span style="line-height: 40px;">Category: &nbsp;</span>                          
                                            <input type="text" id="category" style="width: 200px; height: 40px;" class="form-control" readonly="readonly" value="<?php echo $category;?>" />
                                          
                                        </div>
                                        <div class="row pt-2 pl-4">                                           
                                            <span style="line-height: 40px;">Title: &nbsp;</span>                               
                                            <input type="text" id="title" style="width: 80%; float:left;" class="form-control"  value="<?php echo $item->title;?>"/>
                                        </div>
                                      </div>    
                                      <div class="col-sm-6"> 
                                        <div class="row">
                                          <span style="line-height: 40px;">Views:</span>&emsp;&emsp;
                                          <input type="number" id="views" style="width: 60%;" class="form-control" required="required" value="<?php echo $item->views;?>">
                                        </div>
                                        <div class="row pt-2">
                                          <span style="line-height: 40px;">Favorites: &nbsp;</span>
                                          <input type="number" id="favorites" style="width: 60%;" class="form-control" required="required" value="<?php echo $item->favorite;?>">
                                        </div>
                                        <div class="row pt-2">
                                          <span style="line-height: 40px;">Disgusts: &nbsp;</span>
                                          <input type="number" id="disgusts" style="width: 60%;" class="form-control" required="required" value="<?php echo $item->disgust;?>">
                                        </div>
                                      </div>  
                                  </div>
                                  
                                  <?php if(isset($item_images)){ 
                                    foreach($item_images as $key => $item_img){ 
                                      $num = $key + 1; ?>
                                      <div class="row mt-2" id="add_image<?php echo $num;?>">
                                        <div class="col-sm-6">
                                            <div class="ml-auto mr-auto" style="width: 200px;height: 120px;">  
                                               <img id="slide_img<?php echo $num;?>" src="../uploads/images/<?php echo $item_img->img_url;?>" style="width: 100%;height: 100%;background-size: 100% 100%;background-repeat: no-repeat">
                                               <!-- <input id="chooseLocalImg<?php echo $num;?>" type="file" accept="image/*" style="width:200px;height: 120px;position: absolute;top: 0;opacity: 0;cursor: pointer;" /> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-6">                                            
                                            <input type="text" id="img_intro<?php echo $num;?>" style="width: 100%; margin-top: 40px;" class="form-control" readonly="readonly" value="<?php echo $item_img->description?>"/>
                                        </div>  
                                      </div>
                                    <?php } } ?>
                                  <input type="hidden" id="img_cnt" value="<?php echo count($item_images);?>">
                                  <input type="hidden" id="item_id" value="<?php echo $item->id;?>">

                                  <div class="row mt-2" id="create_div_btn">
                                    <div class="col-sm-6 ml-auto mr-auto" style="text-align: center;font-size: 20px;">
                                      <u onclick="create_image_div()" style="cursor: pointer;">
                                        <span class="mdi mdi-plus-box"></span>
                                        <span>Add image</span>
                                      </u>
                                    </div>
                                  </div>
                                  <div class="row mt-2">
                                    <div class="col-sm-6 mr-auto ml-auto" style="text-align: center;">
                                      <button class="btn btn-primary" style="width: 50%;" type="button" onclick="javascript:add_item_images()">変更</button>
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
            <!--/ Image grid -->
          </div>
          
        </section>
      </div>
    </div>
  </div>
    
 <script type="text/javascript">    
       
     
      var divCounter = $('#img_cnt').val(); 
      var start_divCounter = $('#img_cnt').val();
       function create_image_div() {         
          var divReference = document.querySelector('#add_image' + divCounter);
          ++divCounter;           
          var divToCreate = document.createElement('div');
          divToCreate.setAttribute("class", "row mt-2");
          divToCreate.setAttribute("id", "add_image" + divCounter);
          var html = "";          
          html += '<div class="col-sm-6">';
          html += '<div class="ml-auto mr-auto" style="width: 200px;height: 120px;">';                     
          html += '<img id="slide_img' + divCounter + '" src="../assets/images/gallery/empty.png" style="width: 100%;height: 100%;background-size: 100% 100%;background-repeat: no-repeat"/>';
          html += '<input cnt="'+ divCounter+'" id="chooseLocalImg'+ divCounter +'" type="file" accept="image/*" style="width:200px;height: 120px;position: relative;top: -120px;opacity: 0;" />';
          html += '</div>';
          html += '</div>';
          html += '<div class="col-sm-6">';                                            
          html += '<input type="text" id="img_intro'+ divCounter +'" style="width: 100%; margin-top: 40px;" class="form-control" required="required" placeholder="Input image description" aria-label="Search" aria-describedby="basic-addon2"/>';
          html += '</div>';  
          
          divToCreate.innerHTML = html;
          divReference.parentNode.insertBefore(divToCreate, divReference.nextSibling);

          refresh();
       }
                
        var  icon_img_file = [];
        var img_intro_arr = [];
        function readURL(input, cnt) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#slide_img' + cnt).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                icon_img_file[cnt] = input.files[0];
                console.log(icon_img_file);
            }
        }
        

        function refresh(){
          for (var i = divCounter; i > start_divCounter; i--) {          
           $("#chooseLocalImg" + divCounter).change(function(){    
              var cnt = $(this).attr('cnt');    
              cnt = parseInt(cnt);  
              readURL(this, cnt);            
            });

          }
        }
        
        function add_item_images(){
          var check_img = 0;
          for (var i = divCounter; i > start_divCounter; i--) {
            img_intro_arr[i] = $("#img_intro" + i).val();
            if (icon_img_file[i] != null) {
              check_img++;
            }
          }
          var item_id = $('#item_id').val();
          var sel_category = $('#category').val();
          var title = $('#title').val();
          var views = $('#views').val();
          var favorites = $('#favorites').val();
          var disgusts = $('#disgusts').val();
          var img_cnt = divCounter-start_divCounter;
          if (sel_category == 0) {
            alert("Please select category.");
            return;
          }
          else if(title.length < 1){
            alert("Please Input Title.");
            return;
          }
          else if (check_img < img_cnt) {
            alert("Please select all images.");
            return;
          }
          else{
            var formData = new FormData();            
            
                  // formData.append('category', sel_category);
                  formData.append('title', title);
                  formData.append('item_id', item_id);
                  formData.append('views', views);
                  formData.append('favorites', favorites);
                  formData.append('disgusts', disgusts);
                  formData.append('start_cnt', start_divCounter);
                  formData.append('end_cnt', divCounter);
                  for (var i=divCounter; i>start_divCounter; i--){
                    formData.append('image'+i, icon_img_file[i], icon_img_file[i].fileName);
                    formData.append('description'+i, img_intro_arr[i]);
                  }                 
                    $.ajax({
                        type: "POST",
                        url: 'add_edit_images',
                        success: function (data, textStatus, jqXHR) {
                            var result = JSON.parse(data);
                            console.log(result);
                            if (result['state'] == "success") {
                                
                                icon_img_file = null;
                                location.href = 'go_img';
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