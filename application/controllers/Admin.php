<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('General');
    }

	public function index()
	{
        // $data['categories'] = $this->General->get_all('category', 'no');        
		// $this->load->view('admin_header');
		// $this->load->view('admin_img',$data);
        // $this->load->view('admin_footer');
        
        $data['categories'] = $this->General->get_all('category', 'no');     
        $this->load->view('admin_header');
        $this->load->view('admin_video', $data);
        $this->load->view('admin_footer');
	}
///////////////   category func ///////////////////////////
	public function go_category(){        
		$this->load->view('admin_header');
		$this->load->view('admin_category');
		$this->load->view('admin_footer');
	}
	public function add_category(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $image = '';
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if ($status != "error")
        {
            $config['upload_path'] = './uploads/category/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $image = $data['file_name'];
            }
        }
        $category_name = $this->input->post('category_name');
        $db_data['category_name'] = $category_name;
        $db_data['category_icon'] = $image;
        $db_data['created_at'] = date('Y:m:d H:i:s');
        if($this->General->insert_new('category',$db_data)){
            $data['state'] = "success";
        }
        echo json_encode($data);
    }
    public function all_category(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $cond['is_active'] = 1;
        $result = $this->General->get_rows('category', $cond);
        $data['result'] = $result;
        if ($result != null){
            $data['state'] = "success";
        }
        else{
            $data['state'] = "fail";
        }
        echo json_encode($data);
    }
    public function search_category(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $search_category = $this->input->post('search_category');
        $sql = "select * from category where is_active=1 and category_name like '%{$search_category}%'";
        $result = $this->General->excute_query_result($sql);
        $data['result'] = $result;
        if ($result != null){
            $data['state'] = "success";
        }
        else{
            $data['state'] = "fail";
        }
        echo json_encode($data);
    }

    public function go_edit_category(){
        $category_id = $this->input->get('category_id');
        $cond1['id'] = $category_id;
        $category = $this->General->get_row('category', $cond1); 
        $data['category'] = $category;
        $this->load->view('admin_header');
        $this->load->view('admin_edit_category', $data);
        $this->load->view('admin_footer');
    }

    public function edit_category(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );

        $image = '';
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if ($status != "error")
        {
            $config['upload_path'] = './uploads/category/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $image = $data['file_name'];
            }
        }
        $category_id = $this->input->post('category_id');
        $cond['id'] = $category_id;
        $category_name = $this->input->post('category_name');
        $db_data['category_name'] = $category_name;
        $subscribe = $this->input->post('subscribe');
        $db_data['subscribe'] = $subscribe;
        $created_at = $this->input->post('created_at');
        $db_data['created_at'] = $created_at;
        if ($image != null && $image != "") {
            $db_data['category_icon'] = $image;
        }
        
        $result = $this->General->update('category',$db_data, $cond);
        if($result != null){
            $data['state'] = "success";
        }
        echo json_encode($data);
    }

    public function delete_category(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $category_id = $this->input->post('category_id');
        $cond['id'] = $category_id;
        $db_data['is_active'] = 0;
        $result = $this->General->update('category',$db_data, $cond);
        $cond1['category'] = $category_id;
        $items = $this->General->get_rows('img_items', $cond1);
        foreach ($items as $key => $item) {
            $cond2['id'] = $item->id;
            $item_data['is_active'] = 0;
            $result2 = $this->General->update('img_items', $item_data, $cond2);
        }
        if($result != null){
            $data['state'] = "success";
        }
        echo json_encode($data);
    }
 ///////////////   images for slideshow   /////////////////////////////   
	public function go_img(){
        $data['categories'] = $this->General->get_all('category', 'no');       
        $this->load->view('admin_header');
        $this->load->view('admin_img', $data);
        $this->load->view('admin_footer');
	}
    public function add_images(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $db_data['title'] = $this->input->post('title');
        $db_data['category'] = $this->input->post('category');
        $db_data['views'] = $this->input->post('views');
        $db_data['favorite'] = $this->input->post('favorites');
        $db_data['disgust'] = $this->input->post('disgusts');
        $db_data['created_at'] = date('Y:m:d H:i:s');
        $item_id = $this->General->insert_new('img_items',$db_data);
        if ($item_id != null){
            $img_cnt = $this->input->post('img_cnt');
            for ($i=1; $i <= $img_cnt ; $i++) { 
                $image[$i] = '';
                $status[$i] = "";
                $msg[$i] = "";
                $file_element_name[$i] = 'image'.$i;

                if ($status != "error")
                {
                    $config['upload_path'] = './uploads/images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 1024 * 8;
                    $config['encrypt_name'] = FALSE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($file_element_name[$i]))
                    {
                        $status = 'error';
                        $msg = $this->upload->display_errors('', '');
                    }
                    else
                    {
                        $data = $this->upload->data();
                        $image[$i] = $data['file_name'];
                    }
                }
                $db_item['item_id'] = $item_id;
                $db_item['img_url'] = $image[$i];               
                $db_item['description'] = $this->input->post('description'.$i);                
                if ($this->General->insert_new('item_images',$db_item)){
                    $data['state'] = "success";
                }
            }
        }
        echo json_encode($data);
        
    }
    public function all_items(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        
        $cond['is_active'] = 1;
        $items = $this->General->get_rows('img_items', $cond);

        $category_arr = array();
        $items_images_arr = array();
        foreach ($items as $item){
            $cond1['id'] = $item->category;
            $category = $this->General->get_row('category', $cond1);            
            array_push($category_arr, $category->category_name);

            $cond2['item_id'] = $item->id;
            $item_image = $this->General->get_row('item_images', $cond2);            
            array_push($items_images_arr, $item_image->img_url);
        }
        $data = array('items' =>$items, 'category_names' => $category_arr, 'items_images' => $items_images_arr);
        if ($items != null){
            $data['state'] = "success";
        }
        else{
            $data['state'] = "fail";
        }
        echo json_encode($data);
    }

    public function edit_item(){
        $item_id = $this->input->get('item_id');
        $cond1['id'] = $item_id;
        $item = $this->General->get_row('img_items', $cond1); 
        $data['item'] = $item;
        $cond2['item_id'] = $item_id;
        $data['item_images'] = $this->General->get_rows('item_images', $cond2);    

        $cond3['id'] = $item->category;
        $category = $this->General->get_row('category', $cond3);
        $data['category'] = $category->category_name;

        $this->load->view('admin_header');
        $this->load->view('admin_edit_img', $data);
        $this->load->view('admin_footer');
    }

    public function add_edit_images(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $cond['id'] = $this->input->post('item_id');
        $db_data['title'] = $this->input->post('title');
        // $db_data['category'] = $this->input->post('category');
        $db_data['views'] = $this->input->post('views');
        $db_data['favorite'] = $this->input->post('favorites');
        $db_data['disgust'] = $this->input->post('disgusts');
        // $db_data['created_at'] = date('Y:m:d H:i:s');
        $result = $this->General->update('img_items',$db_data, $cond);
        if ($result != null){
            $start_cnt = $this->input->post('start_cnt');
            $end_cnt = $this->input->post('end_cnt');
            if($end_cnt > $start_cnt){
                for ($i = $start_cnt+1; $i <= $end_cnt ; $i++) { 
                    $image[$i] = '';
                    $status[$i] = "";
                    $msg[$i] = "";
                    $file_element_name[$i] = 'image'.$i;

                    if ($status != "error")
                    {
                        $config['upload_path'] = './uploads/images/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 1024 * 8;
                        $config['encrypt_name'] = FALSE;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload($file_element_name[$i]))
                        {
                            $status = 'error';
                            $msg = $this->upload->display_errors('', '');
                        }
                        else
                        {
                            $data = $this->upload->data();
                            $image[$i] = $data['file_name'];
                        }
                    }
                    $db_item['item_id'] = $cond['id'];
                    $db_item['img_url'] = $image[$i];               
                    $db_item['description'] = $this->input->post('description'.$i);                
                    if ($this->General->insert_new('item_images',$db_item)){
                        $data['state'] = "success";
                    }
                }
            }
            else{
                $data['state'] = "success";
            }
        }
        echo json_encode($data);
    }
    public function delete_img_item(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $item_id = $this->input->post('item_id');
        $cond['id'] = $item_id;
        $db_data['is_active'] = 0;
        $result = $this->General->update('img_items',$db_data, $cond);
        if($result != null){
            $data['state'] = "success";
        }
        echo json_encode($data);
    }

////////////////////  videos  /////////////////////////////////////////

	public function go_video(){
        $data['categories'] = $this->General->get_all('category', 'no');     
        $this->load->view('admin_header');
        $this->load->view('admin_video', $data);
        $this->load->view('admin_footer');
	}
    public function all_videos(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        
        $items = $this->General->get_all('video_items', 'no');
        $category_arr = array();
        $video_thumbnail_arr = array();
        foreach ($items as $item){
            $cond1['id'] = $item->category;
            $category = $this->General->get_row('category', $cond1);            
            array_push($category_arr, $category->category_name);  
        }
        $data = array('videos' =>$items, 'category_names' => $category_arr);
        if ($items != null){
            $data['state'] = "success";
        }
        else{
            $data['state'] = "fail";
        }
        echo json_encode($data);
    }
    public function add_video(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $db_data['title'] = $this->input->post('title');
        $db_data['category'] = $this->input->post('category');
        $db_data['views'] = $this->input->post('views');
        $db_data['favorite'] = $this->input->post('favorites');
        $db_data['disgust'] = $this->input->post('disgusts');
        $db_data['created_at'] = date('Y:m:d H:i:s');
    
        $video = '';
        $status = "";
        $msg = "";
        $file_element_name = 'video';

        if ($status != "error")
        {
            $config['upload_path'] = './uploads/videos/';
            $config['allowed_types'] = 'mp4|ogg|webm';
            $config['max_size'] = '';
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $video = $data['file_name'];
            }
        }
        
        $db_data['video_url'] = $video;   
        $result = $this->General->insert_new('video_items',$db_data);            
        if ($result != null){
            $data['state'] = "success";
        }    
        
        echo json_encode($data);  
    }
    public function go_edit_video(){
        $video_id = $this->input->get('video_id');
        $cond1['id'] = $video_id;
        $video = $this->General->get_row('video_items', $cond1);
        $cond2['id'] = $video->category;
        $category = $this->General->get_row('category', $cond2);     
        $data['video'] = $video;
        $data['category'] = $category->category_name;

        $this->load->view('admin_header');
        $this->load->view('admin_edit_video', $data);
        $this->load->view('admin_footer');
    }
    public function edit_video(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $cond['id'] = $this->input->post('video_id');
        $db_data['title'] = $this->input->post('title');
        // $db_data['category'] = $this->input->post('category');
        $db_data['views'] = $this->input->post('views');
        $db_data['favorite'] = $this->input->post('favorites');
        $db_data['disgust'] = $this->input->post('disgusts');
        // $db_data['created_at'] = date('Y:m:d H:i:s');
        $result = $this->General->update('video_items',$db_data, $cond);
        if ($result != null){
           $data['state'] = "success";            
        }
        echo json_encode($data);
    }
//////////////////////////////////////////////////////////////////////////
	public function go_setting(){
        $cond['id'] = 1;
        $setting = $this->General->get_row('setting',$cond);
        $data['setting'] = $setting;
        $this->load->view('admin_header');
        $this->load->view('admin_setting', $data);
        $this->load->view('admin_footer');
	}

    public function change_second(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $db_data['img_switching_second'] = $this->input->post('second');
        $cond['id'] = 1;
        if ($this->General->update('setting',$db_data, $cond)){
            $data['state'] = "success";
        }    
        
        echo json_encode($data);        
    }
    public function change_comment_size(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $db_data['comment_size'] = $this->input->post('comment_size');
        $cond['id'] = 1;
        if ($this->General->update('setting',$db_data, $cond)){
            $data['state'] = "success";
        }    
        
        echo json_encode($data);        
    }
    public function edit_admob(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $image = '';
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if ($status != "error")
        {
            $config['upload_path'] = './uploads/admob/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $image = $data['file_name'];
            }
        }
        $cond['id'] = 1;
        $db_data['admob_img'] = $image;        
        if($this->General->update('setting',$db_data, $cond)){
            $data['state'] = "success";
        }
        echo json_encode($data);
    }
}
