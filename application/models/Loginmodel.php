<?php

class Loginmodel extends CI_Model{
    public function all_users(){
        $query = $this->db->select(['profile_photo','id','lname','fname','title'])
            ->from('users')
            ->get();
        return $query->result_array();
    }

    public function all_users_id(){
        $query = $this->db->select('id')
            ->from('users')
            ->get();
        return $query->result_array();
    }

    public function is_user_exist($username){
        $sql = "SELECT * FROM users WHERE BINARY uname = '$username'";
        $result = $this->db->query($sql);
        if($result->num_rows()){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function login_valid($username, $password){
        $sql = "SELECT * FROM users WHERE BINARY uname = '$username' and BINARY pword = '$password'";
        $result = $this->db->query($sql);
        if($result->num_rows()){
            return $result->row()->id;
        }else{
            return FALSE;
        }
    }

    public function add_user($array){
        $q = $this->db->insert('users',$array);
    }

    public function find($id){
        $q = $this->db->select(['fname','lname','title','profile_photo'])
            ->from('users')
            ->where('id',$id)
            ->get();

        return $q->row();
    }

    public function update_profile($id,$data){
        return $this->db->where('id',$id)
            ->update('users',$data);
    }

    public function valid_password($id,$pwd){
        $q = $this->db->get_where('users',['id'=>$id,'pword'=>$pwd]);
        if($q->num_rows())
            return TRUE;
        else
            return FALSE;
    }

    public function update_password($id,$pwd){
        return $q = $this->db->where('id',$id)
                    ->update('users',['pword'=>$pwd]);
    }
}