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
                                      </div>    
                                      <div class="col-sm-6"> 
                                        <div class="row">
                                          <span style="line-height: 40px;">Views:</span>&emsp;&emsp;
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
                                  
                                  <div class="row mt-2" id="add_image1">
                                    <div class="col-sm-6">
                                        <div class="ml-auto mr-auto" style="width: 200px;height: 120px;">                     
                                           <img id="slide_img1" src="../assets/images/gallery/empty.png" style="width: 100%;height: 100%;background-size: 100% 100%;background-repeat: no-repeat">
                                           <input id="chooseLocalImg1" type="file" accept="image/*" style="width:200px;height: 120px;position: absolute;top: 0;opacity: 0;cursor: pointer;" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">                                            
                                        <input type="text" id="img_intro1" style="width: 100%; margin-top: 40px;" class="form-control" required="required" placeholder="Input image description" aria-label="Search" aria-describedby="basic-addon2">
                                    </div>  
                                  </div>
                                  
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
                                      <button class="btn btn-primary" style="width: 50%;" type="button" onclick="javascript:add_item_images()">Add</button>
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
                                      <th>Intro Image</th>
                                      <th>Category</th>
                                      <th>Views</th>
                                      <th>Favorites</th>
                                      <th>Disgusts</th>
                                      <!-- <th>Date and Time</th> -->
                                      <th width="200">Operation</th>
                                  </tr>
                                  </thead>
                                  <tbody id="item-table">
                                  <tr>
                                      <td colspan="9">No Item</td>
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
    
 <script type="text/javascript">    
      $(document).ready(function() {
          load_items();
      });   
     
      var divCounter = 1; 
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
        
        $("#chooseLocalImg1").change(function(){          
            readURL(this, 1);            
        });

        function refresh(){
          for (var i = divCounter; i > 0; i--) {          
           $("#chooseLocalImg" + divCounter).change(function(){    
              var cnt = $(this).attr('cnt');    
              cnt = parseInt(cnt);  
              readURL(this, cnt);            
            });

          }
        }
        
        function add_item_images(){
          var check_img = 0;
          for (var i = 1; i <= divCounter; i++) {
            img_intro_arr[i] = $("#img_intro" + i).val();
            if (icon_img_file[i] != null) {
              check_img++;
            }
          }
          var sel_category = $('#category').val();
          var title = $('#title').val();
          var views = $('#views').val();
          var favorites = $('#favorites').val();
          var disgusts = $('#disgusts').val();
          if (sel_category == 0) {
            swal("Warning", "Please select category.", "warning");            
            return;
          }
          else if(title.length < 1){
            swal("Warning", "Please Input Title.", "warning");
            return;
          }
          else if (check_img < divCounter) {
            swal("Warning", "Please select all images.", "warning");            
            return;
          }
          else{
            var formData = new FormData();            
            var img_cnt = divCounter;
                  formData.append('category', sel_category);
                  formData.append('title', title);
                  formData.append('views', views);
                  formData.append('favorites', favorites);
                  formData.append('disgusts', disgusts);
                  formData.append('img_cnt', img_cnt);
                  for (var i=1; i<=divCounter; i++){
                    formData.append('image'+i, icon_img_file[i], icon_img_file[i].fileName);
                    formData.append('description'+i, img_intro_arr[i]);
                  }                 
                    $.ajax({
                        type: "POST",
                        url: 'add_images',
                        success: function (data, textStatus, jqXHR) {
                            var result = JSON.parse(data);
                            console.log(result);
                            if (result['state'] == "success") {                                
                                swal({
                                  title: "Success！",
                                  text: "",
                                  icon: "success",                
                                })
                                .then((isok) => {
                                  if (isok) {               
                                    location.reload();
                                    icon_img_file = null;
                                  }
                                });
                            }
                            else {
                                swal("Warning", "Please try again later.", "warning");
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

        function load_items(){
          $.get('all_items',
                function (data) {                    
                    var result = JSON.parse(data);
                    console.log(result);
                    if (result['state'] == "success") {
                        var items = result['items'];
                        var category_names = result['category_names'];    
                        var items_images = result['items_images'];                    
                        var tbhtml = "";
                        for (var i = 0; i < items.length; i++) {
                            var num = i+1;
                            var item = items[i];
                            var title = item['title'];                            
                            var item_id = item['id'];
                            var item_img = items_images[i];
                            var category = category_names[i];
                            var views = item['views'];
                            var disgusts = item['disgust'];
                            var favorites = item['favorite'];
                            var date = item['created_at'];
                            tbhtml += '<tr>';
                            tbhtml += '<td>' + num + '</td>';
                            tbhtml += '<td>';                          
                            tbhtml += '<span id = "title_'+i+'">' + title + '</span>';
                            tbhtml += '</td>';
                            tbhtml += '<td><img id="icon" src="../../uploads/images/'+item_img+'" style="width: 50px;height: 40px;background-size: 100% 100%;background-repeat: no-repeat"></td>';
                            tbhtml += '<td>'+category+'</td>';   
                            tbhtml += '<td>'+views+'</td>';   
                            tbhtml += '<td>'+favorites+'</td>'; 
                            tbhtml += '<td>'+disgusts+'</td>';    
                            //tbhtml += '<td>'+date+'</td>';                
                            tbhtml += '<td>';                            
                            tbhtml += '<button class="btn btn-info" type="button" onclick="edit_item('+item_id+')">Edit</button>&emsp;';
                            tbhtml += '<button class="btn btn-danger" type="button" onclick="delete_item('+item_id+')">Delete</button>';
                            tbhtml += '</td>';
                            tbhtml += '</tr>';
                        }
                        $('#item-table').html(tbhtml);
                    } else {
                        var tbhtml = "";
                        tbhtml +='<tr><td colspan="9">No Item</td></tr>';
                        $('#dataTable').html(tbhtml);
                    }

                }
            );

        }
        function edit_item(item_id){
          location.href = 'edit_item?item_id=' + item_id;
        }
        function delete_item(item_id){
          swal({
                title: "Warning",
                text: "Are you sure to delete?",
                icon: "warning",          
                
                buttons: ["Cancel", "OK"],
                
              })
              .then((willDelete) => {
                if (willDelete) {
                  $.post('delete_img_item', {'item_id': item_id},
                        function (data) {
                            var result = JSON.parse(data);
                            if (result['state'] == "success") {
                          
                                swal({
                                  title: "Success！",
                                  text: "",
                                  icon: "success",                
                                })
                                .then((isok) => {
                                  if (isok) {               
                                    location.reload();
                                  }
                                });  


                            } else {
                                swal("Warning", "Please try again", "warning");
                            }

                        }
                    );
                  
                } else {
                  // swal("Your imaginary file is safe!");
                }
              });
        }
    </script>