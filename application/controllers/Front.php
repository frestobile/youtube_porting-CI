<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('General');
    }

    public $user_id = '';

	public function indexss()
	{
        
		$cond_active['is_active'] = 1;
		$recommand_items = $this->General->get_video_items('img_items',$cond_active, 'favorite');

		$items_images_arr = $this->General->get_recommand_item_images($recommand_items);
		$data['recommand_items'] = $recommand_items;
        $data['recommand_items_images'] = $items_images_arr;
        $category = $this->General->get_rows('category', $cond_active);
        $cate_recom_items = array();
        $cate_recom_items_images = array();
        foreach ($category as $key => $value) {
        	$cond['category'] = $value->id;
        	$cond['is_active'] = 1;
        	$cate_recom_items[$key] = $this->General->get_cate_recommand_items('img_items', $cond, 'favorite', 4);
        	$cate_recom_items_images[$key] = $this->General->get_recommand_item_images($cate_recom_items[$key]);
        }
        $data['category'] = $category;
        $data['cate_recom_items'] = $cate_recom_items;
        $data['cate_recom_items_images'] = $cate_recom_items_images;

        $this->load->library('session');
        $userID = $this->session->userdata('userID');
        if ($userID) {
            $user_id = array('user_id'=>1);
            $is_login = $this->General->get_row('session', $user_id);
            $data['is_login'] = $is_login->status;
            $data['userId'] = $userID;
        } else {
            $data['is_login'] = 0;
            $data['userId'] = 0;
        }

		$this->load->view('index1', $data);
    }
    
    public function go_mylist()
	{
        
        $cond_active['is_active'] = 1;

        $this->load->library('session');
        $userID = $this->session->userdata('userID');

		$recommand_items = $this->General->get_recommand_items('img_items',$cond_active, 'favorite', 4);

		$items_images_arr = $this->General->get_recommand_item_images($recommand_items);
        // echo "<pre>";
        // print_r($recommand_items);
        // die;
		$data['recommand_items'] = $recommand_items;
        $data['recommand_items_images'] = $items_images_arr;
        $category = $this->General->get_rows('category', $cond_active);

        $arr_mylist = $this->General->get_all('mylist', 'no');

        $cate_recom_items = array();
        $cate_recom_items_images = array();

        foreach($arr_mylist as $my_list) {
            if ($my_list)
            foreach ($category as $key => $value) {
                $cond['category'] = $value->id;
                $cond['is_active'] = 1;
                $cond['id'] = $my_list->item_id;
                $cate_recom_items[$key] = $this->General->get_cate_recommand_items('img_items', $cond, 'favorite', 20);
                $cate_recom_items_images[$key] = $this->General->get_recommand_item_images($cate_recom_items[$key]);
            } 
        }        
        $data['category'] = $category;
        $data['cate_recom_items'] = $cate_recom_items;
        $data['cate_recom_items_images'] = $cate_recom_items_images;
        
        if ($userID) {
            $user_id = array('user_id'=>1);
            $is_login = $this->General->get_row('session', $user_id);
            $data['is_login'] = $is_login->status;
            $data['userId'] = $userID;
        } else {
            $data['is_login'] = 0;
            $data['userId'] = 0;
        }

		$this->load->view('mylist', $data);
	}

	public function register() {
	    $this->load->view('register');
    }
    public function add_user() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $db_data['username'] = $this->input->post('username');
        $db_data['email'] = $this->input->post('email');
        $db_data['password'] = md5($this->input->post('password'));
        $db_data['created_at'] = date('Y:m:d H:i:s');

        $check_email = $this->General->get_row('users', array('email'=>$db_data['email']));

        if ($check_email == null) {
            $result = $this->General->insert_new('users',$db_data);

            if ($result != null){
                $data['state'] = "success";
                $session_data['user_id'] = $result;
                $session_data['status'] = 0;
                $session_data['created_at'] = date('Y:m:d H:i:s');
                $this->General->add_user('session', $session_data);
            }
        } else {
            $data['state'] = "email";
        }
        echo json_encode($data);
    }

    public function user_login() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $db_data['email'] = $this->input->post('email');
        $db_data['password'] = md5($this->input->post('password'));
        $result = $this->General->get_row('users', $db_data);
        if ($result != null) {
            $this->load->library('session');
            $this->session->set_userdata('userID', $result->id);
            $user_id = array('user_id'=>$result->id);
            $session_data['status'] = 1;
            $this->General->update('session', $session_data, $user_id);
            $data['state'] = "success";
        }
        echo json_encode($data);
    }

    public function logout() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $user_id = array('user_id'=>$this->input->post('userId'));
        $session_data['status'] = 0;
        $result = $this->General->update('session', $session_data, $user_id);
        if ($result != null) {
            $data['state'] = "success";
            $this->load->library('session');
            //removing session data
            $this->session->unset_userdata('userID');
        }
        echo json_encode($data);
    }
    public function login() {
        $this->load->view('login');
    }

	// public function go_video_index2(){
    public function index(){
        $cond_active['is_active'] = 1;
		$recommand_items = $this->General->get_video_items('video_items',$cond_active, 'favorite');

		$data['recommand_items'] = $recommand_items;
        $category = $this->General->get_rows('category', $cond_active);

        $data['category'] = $category;
        $data['is_cat'] = 0;

        $this->load->library('session');
        $userID = $this->session->userdata('userID');
        if ($userID) {
            $user_id = array('user_id'=>1);
            $is_login = $this->General->get_row('session', $user_id);
            $data['is_login'] = $is_login->status;
            $data['userId'] = $userID;
        } else {
            $data['is_login'] = 0;
            $data['userId'] = 0;
        }

		$this->load->view('index2', $data);
	}	

	public function go_playback()
	{
		//////////      This is the Text d  isplayed at the bottom of the screen.   /////////////
		$ip_address = $this->input->ip_address();
        $item_id = $_GET['item_id'];
        
        $view_cond['item_id'] = $item_id;
        $view_cond['ip_address'] = $ip_address;
        $item_views = $this->General->get_row('item_views', $view_cond);
        if (empty($item_views)){            
            $view_cond['ip_address'] = $ip_address;
            $view_cond['item_id'] = $item_id;
            $insert_id = $this->General->insert_new('item_views', $view_cond);            
            $view_cond['id'] = $insert_id;
            $item_views = $this->General->get_row('item_views', $view_cond);
        }
        
        $view_cond_1['item_id'] = $item_views->item_id;
        $total_views = $this->General->total_rows('item_views', $view_cond_1);
        $item_view_id['id'] = $item_id;
        $img_item_views['views'] = $total_views;
        $this->General->update('img_items', $img_item_views, $item_view_id);     

        $cond['id'] = $item_id;
        $select_item = $this->General->get_row('img_items', $cond);
        $cond2['item_id'] = $item_id;
        $item_images = $this->General->get_row('item_images', $cond2);

        // echo "<pre>";
        // print_r($item_images);
        // die;
        $cond_active['is_active'] = 1;
        $all_items = $this->General->get_rows('img_items', $cond_active);
        $items_images_arr = array();
        foreach ($all_items as $item){
            // $cond1['id'] = $item->category;
            // $category = $this->General->get_row('category', $cond1);            
            // array_push($category_arr, $category->category_name);
            $condd['item_id'] = $item->id;
            $item_image = $this->General->get_row('item_images', $condd);            
            array_push($items_images_arr, $item_image->img_url);
        }

        $cond3['id'] = '1';
        $settings = $this->General->get_row('setting', $cond3);
        $cond4['id'] = $select_item->category;
        $category = $this->General->get_row('category', $cond4);
        $data['item'] = $select_item;
        $data['item_images'] = $item_images;
        $data['all_items'] = $all_items;
        $data['all_images'] = $items_images_arr;
        $data['settings'] = $settings;
        $data['category'] = $category;
		$data['item_id'] = $item_id;
        $data['total_views'] = $total_views;
		$commit_data = $this->General->get_all('commit', 'no');
        $commit_arr = array();

		foreach ($commit_data as $commit) {
            if ($commit->v_item_id == 0 && $commit->i_item_id == $item_id) {
                array_push($commit_arr, $commit->commit);
            }
        }

		$data['commit'] = $commit_arr;

        // get user id
        $this->load->library('session');
        $userID = $this->session->userdata('userID');
        if ($userID) {
            $user_id = array('user_id'=>1);
            $is_login = $this->General->get_row('session', $user_id);
            $data['is_login'] = $is_login->status;
            $data['userId'] = $userID;
        } else {
            $data['is_login'] = 0;
            $data['userId'] = 0;
            $data['is_mylist'] = 0;
        }

        $arr_mylist_data = $this->General->get_all('mylist', 'no');

        if(!empty($arr_mylist_data)) {
           foreach($arr_mylist_data as $mylist_data) {
            if ($mylist_data->user_id == $userID && $mylist_data->item_id == $item_id) {
                $data['is_mylist'] = 1;
            } else {
                $data['is_mylist'] = 0;
            }
        } 
        }
        
        
        // echo "<pre>";
        // print_r($select_item);
        // die;
		// $this->load->view('playback', $data);
        $this->load->view('play_video', $data);
    }
    
    public function add_mylist() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );

        $db_data['user_id'] = $this->input->post('user_id');
        $db_data['item_id'] = $this->input->post('item_id');
        $db_data['created_at'] = date('Y:m:d H:i:s');
        $result = $this->General->insert_new('mylist',$db_data);

        if ($result != null) {
            $data['state'] = "success";
        }
        echo json_encode($data);
    }

	public function add_commit() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );

        $db_data['user_id'] = $this->input->post('user_id');
        $db_data['i_item_id'] = $this->input->post('i_item_id');
        $db_data['v_item_id'] = $this->input->post('v_item_id');
        $db_data['commit'] = $this->input->post('commit');
        $db_data['created_at'] = date('Y:m:d H:i:s');
        $result = $this->General->insert_new('commit',$db_data);

        if ($result != null) {
            $data['state'] = "success";
        }
        echo json_encode($data);
    }

    public function increase_favorite() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );

        $item_id = array('id'=>$this->input->post('item_id'));
        $favorite['favorite']= $this->input->post('favorite');


        $result = $this->General->update('video_items', $favorite, $item_id);

        if ($result != null) {
            $data['state'] = "success";
        }
        echo json_encode($data);
    }

    public function increase_disgust() {
        $data = array(
            'state' => 'fail',
            'result' => '',
        );
        $item_id = array('id'=>$this->input->post('item_id'));
        $favorite['disgust']= $this->input->post('disgust');

        $result = $this->General->update('video_items', $favorite, $item_id);

        if ($result != null) {
            $data['state'] = "success";
        }
        echo json_encode($data);
    }
	public function go_videoplay()
	{
        //
        $ip_address = $this->input->ip_address();
        $item_id = $_GET['item_id'];
        $view_cond['v_item_id'] = $item_id;
        $view_cond['ip_address'] = $ip_address;
        $item_views = $this->General->get_row('item_views', $view_cond);
        if (empty($item_views)){            
             $view_cond['ip_address'] = $ip_address;
             $view_cond['v_item_id'] = $item_id;
             $insert_id = $this->General->insert_new('item_views', $view_cond);            
             $view_cond['id'] = $insert_id;
             $item_views = $this->General->get_row('item_views', $view_cond);
        }
        
        $view_cond_1['item_id'] = $item_views->item_id;
        $total_views = $this->General->total_rows('item_views', $view_cond_1);
        $view_id['id'] = $item_id;
        $img_item_views['views'] = $total_views;
        $this->General->update('video_items', $img_item_views, $view_id);
         ///////////////////////////

        $video_item_id['id'] = $item_id;
        $data['item'] = $this->General->get_row('video_items', $video_item_id);
        $cond_active['is_active'] = 1;
        $category = $this->General->get_all('category', 'no');
        $data['category'] = $category;

        $commit_data = $this->General->get_all('commit', 'no');
        $commit_arr = array();

        foreach ($commit_data as $commit) {
            if ($commit->i_item_id == 0 && $commit->v_item_id == $item_id) {
                array_push($commit_arr, $commit->commit);
            }
        }
        $data['is_cat'] = 0;
        $data['item_id'] = $item_id;
        $data['total_views'] = $total_views;
        $data['commit'] = $commit_arr;

        $data['arr_user_item_category'] = $this->General->get_all('add_item_category', 'no');

        // get user id
        $this->load->library('session');
        $userID = $this->session->userdata('userID');
        if ($userID) {
            $user_id = array('user_id'=>1);
            $is_login = $this->General->get_row('session', $user_id);
            $data['is_login'] = $is_login->status;
            $data['userId'] = $userID;
        } else {
            $data['is_login'] = 0;
            $data['userId'] = 0;
            $data['is_mylist'] = 0;
        }

        $arr_mylist_data = $this->General->get_all('mylist', 'no');

        if(!empty($arr_mylist_data)) {
           foreach($arr_mylist_data as $mylist_data) {
            if ($mylist_data->user_id == $userID && $mylist_data->item_id == $item_id) {
                $data['is_mylist'] = 1;
            } else {
                $data['is_mylist'] = 0;
            }
        } 
        }

		$this->load->view('videoplay', $data);
	}

    public function search_key() 
    {
       $search_key = $this->input->get('search');
       $date_from = $this->input->get('date_from');
       $date_end = $this->input->get('date_end');
       $is_cat = $this->input->get('is_cat');

        $date_from = date('Y-m-d', strtotime(str_replace('-', '/', $date_from)));
        $date_end = date('Y-m-d', strtotime(str_replace('-', '/', $date_end)));

        $cond_active['is_active'] = 1;
        if ($is_cat == 0) {
            $recommand_items = $this->General->get_item_search('video_items',$cond_active, 'favorite',$search_key,$date_from,$date_end);
        } else {
            $recommand_items = $this->General->get_category_search('video_items',$cond_active, 'favorite',$is_cat,$date_from,$date_end);
        }
        $data['is_cat'] = $is_cat;
        $data['recommand_items'] = $recommand_items;

        $category = $this->General->get_rows('category', $cond_active);
        $data['category'] = $category;

        $this->load->library('session');
        $userID = $this->session->userdata('userID');
        if ($userID) {
            $user_id = array('user_id'=>1);
            $is_login = $this->General->get_row('session', $user_id);
            $data['is_login'] = $is_login->status;
            $data['userId'] = $userID;
        } else {
            $data['is_login'] = 0;
            $data['userId'] = 0;
        }

        $this->load->view('index2', $data);
       
    }
    public function add_user_item_cat(){
        $data = array(
            'state' => 'fail',
            'result' => '',
        );

        $db_data['user_id'] = $this->input->post('user_id');
        $db_data['v_item_id'] = $this->input->post('item_id');
        $category_key = $this->input->post('category_key');
        $db_data['created_at'] = date('Y:m:d H:i:s');
//        $db_data['category_id'] = 0;
        $cond_active['is_active'] = 1;
        $category_data = $this->General->get_all('category', 'no');

        foreach($category_data as $category) {
            if ($category->category_name == $category_key) {
                $db_data['category_id'] = $category->id;
            } else {
                $db_data['category_id'] = 0;
            }
        }
//        print_r($db_data['category_id']);
//        die;
       if ($db_data['category_id'] == 0) {
           $new_cat_data['category_name'] = $category_key;
           $new_cat_data['category_icon'] = 'default.png';
           $new_cat_data['subscribe'] = '0';
           $new_cat_data['created_at'] = date('Y:m:d H:i:s');
           $new_cat_data['is_active'] = '0';
           $db_data['category_id'] = $this->General->insert_new('category',$new_cat_data);
       }

       $result = $this->General->insert_new('add_item_category',$db_data);

       if ($result != null) {
           $data['state'] = "success";
       }
        echo json_encode($data);
    }

}
