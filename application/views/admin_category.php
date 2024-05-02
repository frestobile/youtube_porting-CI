
                <div class="col-10 pl-4 pr-4 pt-0" style="background-color: #FAFAFA;">
                  <div id="content-wrapper">  
                    <div class="card mb-3">
                          
                          <div class="card-body" style="background-color: #FAFAFA;">
                              <div class="card mb-3">
                                  
                                  <div class="card-body">
                                      <div class="row">
                                      
                                         <div class="col-sm-4">
                                            <div class="ml-auto mr-auto" style="width: 100px;height: 100px;">                                          
                                               <img id="category_icon" src="../assets/images/gallery/empty.png" style="width: 100%;height: 100%;border-radius: 50%;background-size: 100% 100%;background-repeat: no-repeat">
                                               <input id="chooseLocalImg" type="file" accept="image/*" style="width:100px;height: 100px;border-radius: 50%;position: absolute;top: 0;opacity: 0;" />
                                            </div>
                                         </div>
                                         <div class="col-sm-5">
                                                                                       
                                              <input type="text" id="category_name" style="width: 100%;margin-top: 30px;" class="form-control" required="required" placeholder="Input new category name..." aria-label="Search" aria-describedby="basic-addon2">
                                             
                                          </div>
                                          <div class="col-sm-3" style="text-align: center;">
                                              <button class="btn btn-primary" style="margin-top: 30px;" type="button" onclick="javascript:add_category()">Add</button>
                                          </div>
                                      
                                      </div>

                                  </div>
                              </div>

                              <div class="input-group" style="width: 300px;float:right;">
                                  <input type="text" id="search_category" class="form-control" placeholder="Enter the category name..." aria-label="Search" aria-describedby="basic-addon2">
                                  <div class="input-group-append" onclick="javascript:search_category()">
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
                                          <th>Category Name</th>
                                          <th>Category Icon</th>
                                          <th>Subscribe</th>
                                          <th>Date and Time</th>
                                          <th>Operation</th>
                                      </tr>
                                      </thead>
                                      <tbody id="category-table">
                                      <tr>
                                          <td colspan="5">No category</td>
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
            $(document).ready(function() {

                load_category();

            });
            function load_category(){
                $.get('all_category',
                    function (data) {
                        console.log(data);
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result['state'] == "success") {

                            var cate = result['result'];
                                console.log(cate);
                                var tbhtml = "";
                                for (var i = 0; i < cate.length; i++) {
                                    var num = i+1;
                                    var item = cate[i];
                                    var category_name = item['category_name']; 
                                    var subscribe = item['subscribe'];                                  
                                    var category_id = item['id'];
                                    var icon = item['category_icon'];
                                    var created_at = item['created_at'];
                                    tbhtml += '<tr>';
                                    tbhtml += '<td>' + num + '</td>';
                                    tbhtml += '<td>';                                    
                                    tbhtml += '<span id = "span_category_name_'+i+'">' + category_name + '</span>';
                                    tbhtml += '</td>';
                                    tbhtml += '<td><img id="icon" src="../../uploads/category/'+icon+'" style="width: 50px;height: 40px;background-size: 100% 100%;background-repeat: no-repeat"></td>';
                                    // if (item['isActive'] == 1) tbhtml += '<td><button class="btn btn-primary" type="button" onclick="reverse_active_category('+category_id+','+item['isActive']+')">Active</button></td>';
                                    // else tbhtml += '<td><button class="btn btn-warning" type="button" onclick="reverse_active_category('+category_id+','+item['isActive']+')">Inactive</button></td>';
                                    tbhtml +='<td>'+ subscribe +'</td>';
                                    tbhtml +='<td>'+ created_at +'</td>';
                                    tbhtml += '<td>';
                                    tbhtml += '<button class="btn btn-info" type="button" onclick="edit_category('+category_id+')">Edit</button>&emsp;';
                                    tbhtml += '<button class="btn btn-danger" type="button" onclick="delete_category('+category_id+')">Delete</button>';
                                    tbhtml += '</td>';
                                    tbhtml += '</tr>';
                                }
                                $('#category-table').html(tbhtml);
                        } else {
                            var tbhtml = "";                            
                            tbhtml +='<tr><td colspan="6">No Category</td></tr>';
                            $('#category-table').html(tbhtml);
                        }

                    }
                );

            }
            function search_category() {
                var search_category = document.getElementById("search_category").value;
                if (search_category == null || search_category == "") {
                    load_category();
                }
                else {
                    $.post('search_category',{'search_category': search_category},
                        function (data) {
                            console.log(data);
                            var result = JSON.parse(data);
                            console.log(result);
                            if (result['state'] == "success") {
                                var cate = result['result'];
                                console.log(cate);
                                var tbhtml = "";
                                for (var i = 0; i < cate.length; i++) {
                                    var num = i+1;
                                    var item = cate[i];
                                    var category_name = item['category_name'];
                                    var subscribe = item['subscribe'];                            
                                    var category_id = item['id'];
                                    var icon = item['category_icon'];
                                    var created_at = item['created_at'];
                                    tbhtml += '<tr>';
                                    tbhtml += '<td>' + num + '</td>';
                                    tbhtml += '<td>';                                
                                    tbhtml += '<span>' + category_name + '</span>';
                                    tbhtml += '</td>';
                                    tbhtml += '<td><img id="icon" src="../../uploads/category/'+icon+'" style="width: 50px;height: 40px;background-size: 100% 100%;background-repeat: no-repeat"></td>';
                                    // if (item['isActive'] == 1) tbhtml += '<td><button class="btn btn-primary" type="button" onclick="reverse_active_category('+category_id+','+item['isActive']+')">Active</button></td>';
                                    // else tbhtml += '<td><button class="btn btn-warning" type="button" onclick="reverse_active_category('+category_id+','+item['isActive']+')">Inactive</button></td>';
                                    tbhtml +='<td>'+ subscribe +'</td>';
                                    tbhtml +='<td>'+ created_at +'</td>';
                                    tbhtml += '<td>';
                                    tbhtml += '<button class="btn btn-info" type="button" onclick="edit_category('+category_id+')">Edit</button>&emsp;';
                                    tbhtml += '<button class="btn btn-danger" type="button" onclick="delete_category('+category_id+')">Delete</button>';
                                    tbhtml += '</td>';
                                    tbhtml += '</tr>';
                                }
                                $('#category-table').html(tbhtml);
                            }
                            else {
                                var tbhtml = "";                            
                                tbhtml +='<tr><td colspan="6">No Category</td></tr>';
                                $('#category-table').html(tbhtml);
                            }
                        }
                    );
                }

            }

          
            function add_category() {
                var category_name = $("#category_name").val();

                if (category_name.length < 1) {
                  swal("Warning", "Please input new category name.", "warning");                
                  return;
                }
                else if(icon_img_file == null){
                  swal("Warning", "Please input new category icon.", "warning");                 
                  return;
                }
                else {
                    var formData = new FormData();
                    formData.append('image', icon_img_file, icon_img_file.fileName);
                    formData.append('category_name', category_name);
                    $.ajax({
                        type: "POST",
                        url: 'add_category',
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
                                    load_category();
                                    icon_img_file = null;
                                    $('#category_icon').attr('src', '../assets/images/gallery/empty.png');
                                    $("#category_name").val('');
                                  }
                                });                            
                            }
                            else {
                                swal("Warning", "Please try again", "warning");
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
            function edit_category(category_id){
              location.href = 'go_edit_category?category_id=' + category_id;
            }
            function delete_category(category_id){
              swal({
                title: "Warning",
                text: "Are you sure to delete?",
                icon: "warning",          
                
                buttons: ["Cancel", "OK"],
                
              })
              .then((willDelete) => {
                if (willDelete) {
                  $.post('delete_category', {'category_id': category_id},
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