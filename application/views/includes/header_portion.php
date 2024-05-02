    <div class="content-wrapper" style="padding: 1rem 2.2rem; box-shadow: 5px 10px 18px #eeeeee;">
        <div class="row color60">
          <div class="col-md-2" style="min-width: 180px;">
            <div class="row">
              <div class="col-sm-2">
                  <a href="/">
                      <!-- <span class="mdi mdi-menu" style="font-size: 27px;"></span> -->
                  </a>
              </div>
              <div class="col-sm-10">
                <a href="/">
                    <img src="../assets/images/logo.png" style="width: 27px;">
                    <span style="font-size: 20px;font-family: fantasy;color: black;">みめ</span>
                    <span style="font-size: 12px;font-weight: bold;position: absolute; margin-top: 5px;margin-left: 5px;">JP</span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div>
            <form class="example" action="search_key" id="search_form">
                <?php if ($is_cat == 0){?>
                    <input type="text" placeholder="検索" name="search" id="search_key">
                <?php } else { foreach ($category as $cat_item) { if ($cat_item->is_active == 1) {if ($is_cat == $cat_item->id) {?>
                    <input type="text" placeholder="検索" name="search" value="<?php echo $cat_item->category_name;?>" id="search_key">
                <?php } } } }?>
              <button type="submit"><i class="fa fa-search" style="color: black;"></i></button>
              <input type="text" id="datepicker_one" name="date_from" style="width: 20% !important;margin-left: 10px;">
              <input type="text" id="datepicker_two" name="date_end" style="width: 20% !important;margin-left: 10px;">
                <input type="hidden" name="is_cat" id="is_cat" value="0">
            </form>
            </div>
            <div id="category_search" style="display: none;max-height: 651px; position: absolute; top:43px; left:20px; width:50%; min-width:405px; z-index: 2; border-radius: 7px; background-color: #e7e7e7;">
              <div class="row pt-1 pb-1">
                  <div class="col-6 pl-2">
                    履歴
                  </div>
                  <div class="col-6 pr-2 text-right">
                    <span style="cursor: pointer;">履歴をクリア</span>
                  </div>                  
              </div>
                <div class="row pt-1 pb-1 pl-1 pr-1">
                    <div class="col-12">
                        評価
                    </div>
                    <?php foreach($category as $key=>$cat_item) { if ($key < 3) {?>
                    <div class="col-4" style="margin-top: 7px;">
                        <div style="width: 100%; height: 100px; border-radius: 7px; cursor: pointer; background-image: url('../uploads/category/<?php echo $cat_item->category_icon?>');" onclick="cat_search(this);">
                            <div class="text-center" style="position: absolute; bottom: 15px;padding-left: 5px;width: 75%;color: white;font-weight: bold;">
                                <?php echo $cat_item->category_name;?>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $cat_item->category_name;?>"/>
                        <input type="hidden" value="<?php echo $cat_item->id;?>"/>
                    </div>
                    <?php } }?>
                </div>
                <div class="row pt-1 pb-1 pl-1 pr-1">
                    <div class="col-12" style="margin-bottom: 5px;">
                        感想
                    </div>
                    <?php foreach($category as $key=>$cat_item) { if (3 <= $key ) {?>
                        <div class="col-4" style="margin-top: 7px;">
                            <div style="width: 100%; height: 100px; border-radius: 7px; cursor: pointer; background-image: url('../uploads/category/<?php echo $cat_item->category_icon?>');" onclick="cat_search(this)">
                                <div class="text-center" style="position: absolute; bottom: 15px;padding-left: 5px;width: 75%;color: white;font-weight: bold;">
                                    <?php echo $cat_item->category_name;?>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $cat_item->category_name;?>"/>
                            <input type="hidden" value="<?php echo $cat_item->id;?>"/>
                        </div>
                    <?php } }?>
                </div>
              </div>
            </div>
          <div class="col-md-2">
            <div class="row">
              <div class="col-sm-2 btn-pointer">
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
    </div>

    