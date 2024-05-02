<?php

class LoginModel extends CI_Model{
    protected  $dbcon;
    protected $globalModel;
    // protected $memberModel;
    // protected $gradeModel;

    public function __construct()
    {
        parent::__construct();

        // $this->load->model('MemberModel');
        // $this->load->model('GlobalModel');
        // $this->load->model('GradeModel');
        // $this->load->model('TimeModel');
    }

    public function can_login($username, $password){
        $sqls = "select * from tb_admin where username='".$username."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        if($row){
            if($row->password == $password){
                return 'success';
            }else{
                return '密码不正确';
            }
        }else{
            return '账号不存在';
        }
    }

    public function login($phone, $password){
        $sqls = "select * from pv_member where member_phone='".$phone."'";
        $row = $this->GlobalModel->excute_query_row($sqls);

        $sqls1 = "update pv_member set member_login_time = '".$this->TimeModel->getting_datetime()."' where member_id = ".$row->member_id;
        $this->GlobalModel->excute_query($sqls1);

        $sqls2 = "update pv_member set member_login_num = ".($row->member_login_num + 1)." where member_id = ".$row->member_id;
        $this->GlobalModel->excute_query($sqls2);

        $sqls = "insert into pv_member_log (log_member_id, log_member_name, log_grade_id, log_create) values ('".$row->member_id."', '".$row->member_name."', '".$row->member_grade_id."', '".$this->TimeModel->getting_datetime()."')";
        $this->GlobalModel->excute_query($sqls);

        return array('member_id'=> $row->member_id, 'member_name'=>$row->member_name, 'member_grade_id'=>$row->member_grade_id);
    }

    public function logout()
    {
        $_SESSION['member_is'] = null;
        //     $sqls = "update pv_member set logout_time = '".$this->TimeModel->getting_datetime()."' where member_id = ".$_SESSION['user_id'];
        //   $this->globalModel->excute_query($sqls);
    }

    public function can_register($phone)
    {
        $sqls = "select * from pv_member where member_phone='".$phone."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        if($row){
            return $row->member_id;
        }else{
            return 'success';
        }
    }
    public function can_add($job)
    {
        $sqls = "select * from seven_data where jobnum='".$job."'";
        $row = $this->GlobalModel->excute_query_row($sqls);
        if($row){
            return $row->id;
        }else{
            return 'success';
        }
    }
    public function register($name, $gender, $phone, $sms, $password, $img)
    {
        $openid = isset($_SESSION['openid'])?$_SESSION['openid']:'';
        $sqls = "insert into pv_member (member_name, member_gender, member_phone, member_openid, member_sms, member_passwd, member_add_time, member_picture) values ('".$name."', '".$gender."', '".$phone."', '".$openid."', '".$sms."', '".$password."', '".$this->TimeModel->getting_datetime()."', '".$img."')";
        $this->GlobalModel->excute_query($sqls);
        $sqls = "select * from pv_member where member_phone='".$phone."'";
        $row=$this->GlobalModel->excute_query_row($sqls);
        return $row->member_id;
    }

    public function updateMember($id, $name, $gender, $confirm, $img){
        $sqls = '';
        if($confirm!='')
            $sqls = "update pv_member set member_name = '".$name."', member_gender = '".$gender."', member_passwd = '".$confirm."', member_picture = '".$img."' where member_id = ".$id;
        else
            $sqls = "update pv_member set member_name = '".$name."', member_gender = '".$gender."', member_picture = '".$img."' where member_id = ".$id;
        $this->GlobalModel->excute_query($sqls);
        return $id;
    }

    public function can_class_register($member_id, $class)
    {
        $result=$this->GradeModel->findWhere(array('grade_is_allow'=>1,'grade_serial'=>$class));

        if(count($result) == 0)
            return "找不到此编号";
        else{
            return "success";
        }
    }

    public function class_register($member_id, $class)
    {
        $result=$this->GradeModel->findWhere(array('grade_is_allow'=>1,'grade_serial'=>$class));
        $grade_id = $result[0]->grade_id;
        $this->MemberModel->findWhere(array('member_grade_id'=>$grade_id));
        $sqls = "update pv_member set member_grade_id = ".$grade_id.", member_state = 2 where member_id = ".$member_id;
        $this->GlobalModel->excute_query($sqls);
    }
}