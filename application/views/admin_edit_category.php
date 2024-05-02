
                <div class="col-10 pl-4 pr-4 pt-0" style="background-color: #FAFAFA;">
                  <div id="content-wrapper">  
                    <div class="card mb-3">
                          
                          <div class="card-body" style="background-color: #FAFAFA;">
                              <div class="card mb-3">
                                  
                                  <div class="card-body">
                                      <div class="row">
                                      
                                          <div class="col-sm-2">
                                              <div class="ml-auto mr-auto" style="width: 100px;height: 100px;">                                                              
                                                 <input type="hidden" id="category_id" value="<?php echo $category->id;?>">
                                                 <img id="category_icon" src="../uploads/category/<?php echo $category->category_icon;?>" style="width: 100%;height: 100%;border-radius: 50%;background-size: 100% 100%;background-repeat: no-repeat">
                                                 <input id="chooseLocalImg" type="file" accept="image/*" style="width:100px;height: 100px;border-radius: 50%;position: absolute;top: 0;opacity: 0;" />
                                              </div>
                                          </div>
                                          <div class="col-sm-8">
                                            <div class="row">
                                              <div class="col-sm-3">
                                                <span style="color: black;line-height: 40px;">カテゴリのタイトル:&nbsp;</span>
                                              </div>
                                              <div class="col-sm-9">
                                                <input type="text" id="category_name" style="width: 100%;" class="form-control" required="required" value="<?php echo $category->category_name;?>">
                                              </div>
                                            </div>
                                          
                                            <div class="row mt-2">
                                              <div class="col-sm-3">
                                                <span style="color: black;line-height: 40px;">チャンネル登録数:&nbsp;</span>
                                              </div>
                                              <div class="col-sm-9">
                                                <input type="text" id="subscribe" style="width: 100%;" class="form-control" required="required" value="<?php echo $category->subscribe;?>"> 
                                              </div>
                                            </div>

                                            <div class="row mt-2">
                                              <div class="col-sm-3">
                                                <span style="color: black;line-height: 40px;">日時:&nbsp;</span>
                                              </div>
                                              <div class="col-sm-9">
                                                <input type="date" id="created_at" style="width: 200px;" class="form-control" required="required" value="<?php echo substr($category->created_at, 0,10);?>"> 
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-2" style="text-align: center;">
                                              <button class="btn btn-primary" style="margin-top: 30px;" type="button" onclick="javascript:edit_category()">変更</button>
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

   $('#add_img').removeClass('active');
   $('#add_category').addClass('active');
   $('#group_icon').css('color', 'red');
   $('#image_icon').css('color', '#606060');

  ///////////////  category icon select /////////////////
          var  icon_img_file;
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#category_icon').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                    icon_img_file = input.files[0];
                }
            }

            $("#chooseLocalImg").change(function(){
                readURL(this);
            });
   //////////////////////////////////////////////////////////
           
          
            function edit_category() {
                var category_id = $('#category_id').val();
                var category_name = $("#category_name").val();
                var subscribe = $("#subscribe").val();
                var created_at = $('#created_at').val();
                if (category_name.length < 1) {
                    alert("Please input new category name.");
                    return;
                }
                if (subscribe.length < 1) {
                    alert("Please input subscribe.");
                    return;
                }
                else {
                    var formData = new FormData();
                    if (icon_img_file != null) {
                      formData.append('image', icon_img_file, icon_img_file.fileName);
                    }
                    
                    formData.append('category_name', category_name);
                    formData.append('subscribe', subscribe);
                    formData.append('category_id', category_id);
                    formData.append('created_at', created_at);
                    $.ajax({
                        type: "POST",
                        url: 'edit_category',
                        success: function (data, textStatus, jqXHR) {
                            var result = JSON.parse(data);
                            console.log(result);
                            if (result['state'] == "success") {
                                alert('Changed OK!');
                                icon_img_file = null;
                                location.href = 'go_category';                           
                                
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