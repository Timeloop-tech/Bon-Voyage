<?php

class User extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('articlesmodel','articles');
        $this->load->model('loginmodel','login');
    }

    public function index(){
        $this->load->library('pagination');
        $config = [
            'base_url'          => base_url('user/index'),
            'per_page'          => 10,
            'total_rows'        => $this->articles->count_all_articles(),
            'full_tag_open'     => "<ul class='pagination'>",
            'full_tag_close'    => "</ul>",
            'prev_tag_open'     => '<li>',
            'prev_tag_close'    => '</li>',
            'next_tag_open'     => '<li>',
            'next_tag_close'    => '</li>',
            'first_tag_open'     => '<li>',
            'first_tag_close'    => '</li>',
            'last_tag_open'     => '<li>',
            'last_tag_close'    => '</li>',
            'num_tag_open'     => '<li>',
            'num_tag_close'    => '</li>',
            'cur_tag_open'     => "<li class='active'><a>",
            'cur_tag_close'    => "</a></li>",
            'first_link'        => "First",
            'last_link'         => "Last",
            'prev_link'        => "Prev",
            'next_link'         => "Next",
        ];
        $this->pagination->initialize($config);
        $articles = $this->articles->all_articles_list($config['per_page'],$this->uri->segment(3));
        $users = $this->login->all_users();
        $this->load->view('/public/articles_list',compact('articles','users'));
    }

    public function search(){
        $this->form_validation->set_rules('query','Search','required');
        if(! $this->form_validation->run()) {
            return $this->index();
        }
        $query = $this->input->post('query');
        return redirect("user/search_results/$query");
    }

    public function search_results($query){
        $this->load->library('pagination');
        $config = [
            'base_url'          => base_url("user/search_results/$query"),
            'per_page'          => 5,
            'total_rows'        => $this->articles->count_search_results($query),
            'uri_segment'       => 4,
            'full_tag_open'     => "<ul class='pagination'>",
            'full_tag_close'    => "</ul>",
            'prev_tag_open'     => '<li>',
            'prev_tag_close'    => '</li>',
            'next_tag_open'     => '<li>',
            'next_tag_close'    => '</li>',
            'first_tag_open'     => '<li>',
            'first_tag_close'    => '</li>',
            'last_tag_open'     => '<li>',
            'last_tag_close'    => '</li>',
            'num_tag_open'     => '<li>',
            'num_tag_close'    => '</li>',
            'cur_tag_open'     => "<li class='active'><a>",
            'cur_tag_close'    => "</a></li>",
            'first_link'        => "First",
            'last_link'         => "Last",
            'prev_link'        => "Prev",
            'next_link'         => "Next",
        ];
        $this->pagination->initialize($config);
        $articles = $this->articles->search($query,$config['per_page'],$this->uri->segment(4));
        $users = $this->login->all_users();
        $this->load->view('public/search_results',compact('articles','users'));
    }

    public function article($id){
        $article = $this->articles->find($id);
        $user_id = $article->user_id;
        $login = $this->login->find($user_id);
        $this->load->view('public/article_detail',compact('article','login'));
    }
}