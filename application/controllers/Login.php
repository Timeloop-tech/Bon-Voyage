<?php

class Login extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('loginmodel');
        $this->load->model('resourcemodel');
    }

    public function index(){
        if($this->session->userdata('user_id')) {
            return redirect('admin/dashboard');
        }
        $this->load->view('public/admin_login');
    }

    public function signUpForm(){
        $this->load->view('public/signup');
    }

    public function user_signUp(){
        $config = [
            'upload_path' => './profile_photos',
            'allowed_types' => 'jpg|jpeg|png|gif',
        ];
        $this->load->library('upload', $config);

        $result = $this->resourcemodel->get_resource_id();
        $res_id = $result->resource_id;

        if($this->form_validation->run('user_login_rules') && $this->upload->do_upload()){
            $post = $this->input->post();
            unset($post['submit']);
            if($this->loginmodel->is_user_exist($post['uname'])){
                $this->session->set_flashdata('user_exist','User already exist!');
                return redirect('login/signUpForm');
            }
            $data = $this->upload->data();
            rename('./profile_photos/'.$data['file_name'],'./profile_photos/ProfilePic_'.$res_id.$data['file_ext']);
            $post['profile_photo'] = 'ProfilePic_'.$res_id.$data['file_ext'];
            $post['pword'] = md5($post['pword']);
            $this->loginmodel->add_user($post);
            $login_id = $this->loginmodel->login_valid($post['uname'],$post['pword']);
            $this->resourcemodel->id_increment($res_id);
            $this->session->set_userdata('user_id',$login_id);
            return redirect('admin/dashboard');

        } else {
            if(!$this->upload->do_upload()) {
                $upload_error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_failed',$upload_error);
            }
            $this->load->view('public/signup');
        }
    }
    public function admin_login(){
        $this->form_validation->set_rules('username','Username','required|alpha_dash|trim');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password = md5($password);
            $this->load->model('loginmodel');
            $login_id = $this->loginmodel->login_valid($username,$password);
            if($login_id){
                $this->session->set_userdata('user_id',$login_id);
                return redirect('admin/dashboard');
            }else{
                $this->session->set_flashdata('login_failed','Invalid Username/Password.');
                return redirect('login');
            }
        }else{
            $this->load->view('public/admin_login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        return redirect('login');
    }


}