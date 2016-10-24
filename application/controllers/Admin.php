<?php

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            return redirect('login');
        }
        $this->load->model('articlesmodel', 'articles');
        $this->load->model('loginmodel','login');
        $this->load->model('resourcemodel','resources');
        $users = $this->login->all_users_id();
        $id_array = [];
        $i = 0;
        foreach($users as $user){
            $id_array[$i] = $user['id'];
            $i++;
    }
        if(!in_array($this->session->userdata('user_id'),$id_array)) {
            return redirect('login');
        }
    }

    public function dashboard()
    {
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('admin/dashboard'),
            'per_page' => 10,
            'total_rows' => $this->articles->num_rows(),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => "</a></li>",
            'first_link' => "First",
            'last_link' => "Last",
            'prev_link' => "Prev",
            'next_link' => "Next",
        ];
        $this->pagination->initialize($config);
        $articles = $this->articles->articles_list($config['per_page'], $this->uri->segment(3));
        $user_id = $this->session->userdata('user_id');
        $user = $this->login->find($user_id);
        $this->load->view('admin/admin_header',['user'=>$user]);
        $this->load->view('admin/dashboard', ['articles' => $articles],compact('user'));
    }

    public function profile_edit()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->login->find($user_id);
        $this->load->view('admin/admin_header',['user'=>$user]);
        $this->load->view('admin/edit_profile',['user'=>$user]);
    }

    public function update_profile()
    {
        $user_id = $this->session->userdata('user_id');

        $config = [
            'upload_path' => './profile_photos',
            'allowed_types' => 'jpg|jpeg|png|gif',
        ];
        $this->load->library('upload', $config);
        $result = $this->resources->get_resource_id();
        $res_id = $result->resource_id;
        if ($this->form_validation->run('profile_edit_rules')) {
            $post = $this->input->post();
            unset($post['submit']);
            if ($this->upload->do_upload('profile_photo')) {
                $image_name = $post['old_pic'];
                $image_path = "./profile_photos/".$image_name;
                if(unlink($image_path)){
                    unset($post['old_pic']);
                }
                $data = $this->upload->data();
                rename('./profile_photos/'.$data['file_name'],'./profile_photos/ProfilePic_'.$res_id.$data['file_ext']);
                $post['profile_photo'] = 'ProfilePic_'.$res_id.$data['file_ext'];
                $this->resources->id_increment($res_id);
            }
            else{
                unset($post['old_pic']);
            }

            return $this->_flashAndRedirect(
                $this->login->update_profile($user_id, $post),
                'Profile Updated Successfully.',
                'Profile Failed to Update,Please Try Again.');
        } else {
            $user = $this->login->find($user_id);
            $this->load->view('admin/edit_profile',['user'=>$user]);
        }
    }

    public function change_password(){
        $user_id = $this->session->userdata('user_id');
        $user = $this->login->find($user_id);
        $this->load->view('admin/admin_header',['user'=>$user]);
        $this->load->view('admin/change_password');
    }

    public function update_password(){
        $user_id = $this->session->userdata('user_id');
        if($this->form_validation->run('change_pwd_rules')){
            $post = $this->input->post();
            $old_pwd = $post['old_pwd'];
            $new_pwd = $post['new_pwd'];
            $re_pwd = $post['re_pwd'];
            if(!$this->login->valid_password($user_id,$old_pwd)){
                $this->session->set_flashdata('invalid_password','Invalid Current Password.');
                $user = $this->login->find($user_id);
                $this->load->view('admin/change_password',['user'=>$user]);
            }
            else{
                return $this->_flashAndRedirect(
                    $this->login->update_password($user_id,$new_pwd),
                    'Password Updated Successfully.',
                    'Password Failed to Update,Please Try Again.');
            }
        }
        else{
            $user = $this->login->find($user_id);
            $this->load->view('admin/change_password',['user'=>$user]);
        }

    }
    public function add_article()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->login->find($user_id);
        $this->load->view('admin/admin_header',['user'=>$user]);
        $this->load->view('admin/add_article');
    }

    public function store_article()
    {
        $config = [
            'upload_path' => './uploads',
            'allowed_types' => 'jpg|jpeg|png|gif',
        ];
        $this->load->library('upload', $config);
        $result = $this->resources->get_resource_id();
        $res_id = $result->resource_id;
        if ($this->form_validation->run('add_article_rules') && $this->upload->do_upload()) {
            $post = $this->input->post();
            unset($post['submit']);
            $data = $this->upload->data();
            rename('./uploads/'.$data['file_name'],'./uploads/ArticleImage_'.$res_id.$data['file_ext']);
            //$image_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
            $post['image_path'] = 'ArticleImage_'.$res_id.$data['file_ext'];
            //$post['body']= strip_tags($post['body']);
            $this->resources->id_increment($res_id);
            return $this->_flashAndRedirect(
                $this->articles->add_article($post),
                'Article Added Successfully.',
                'Article Failed to Add,Please Try Again.');
        } else {
            $upload_error = $this->upload->display_errors();
            $user_id = $this->session->userdata('user_id');
            $user = $this->login->find($user_id);
            $this->load->view('admin/admin_header',['user'=>$user]);
            $this->load->view('admin/add_article', compact('upload_error'));
        }
    }

    public function edit_article($article_id)
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->login->find($user_id);
        $this->load->view('admin/admin_header',['user'=>$user]);
        $article = $this->articles->find_article($article_id);
        $this->load->view('admin/edit_article', ['article' => $article]);
    }

    public function update_article($article_id)
    {
        $config = [
            'upload_path' => './uploads',
            'allowed_types' => 'jpg|jpeg|png|gif',
        ];
        $this->load->library('upload', $config);
        $result = $this->resources->get_resource_id();
        $res_id = $result->resource_id;
        if ($this->form_validation->run('add_article_rules')) {
            $post = $this->input->post();
            unset($post['submit']);
            if ($this->upload->do_upload()) {
                $data = $this->upload->data();
                rename('./uploads/'.$data['file_name'],'./uploads/ArticleImage_'.$res_id.$data['file_ext']);
                    $post['image_path'] = 'ArticleImage_'.$res_id.$data['file_ext'];
                $this->resources->id_increment($res_id);
            }
            //$post['body']= strip_tags($post['body']);

            return $this->_flashAndRedirect(
                $this->articles->update_article($article_id, $post),
                'Article Updated Successfully.',
                'Article Failed to Update,Please Try Again.');
        } else {
            $this->load->view('admin/add_article');
        }
    }

    public function delete_article($article_id)
    {
        $article = $this->articles->find_article($article_id);
        $image_name = $article->image_path;
        $image_path = "./uploads/".$image_name;
        unlink($image_path);
        return $this->_flashAndRedirect(
            $this->articles->delete_article($article_id),
            'Article Deleted Successfully.',
            'Article Failed to Delete,Please Try Again.');
    }

    private function _flashAndRedirect($successful, $successmsg, $failuremsg)
    {
        if ($successful) {
            $this->session->set_flashdata('feedback', $successmsg);
            $this->session->set_flashdata('feedback_class', 'alert-success');
        } else {
            $this->session->set_flashdata('feedback', $failuremsg);
            $this->session->set_flashdata('feedback_class', 'alert-danger');
        }
        return redirect('admin/dashboard');
    }
}