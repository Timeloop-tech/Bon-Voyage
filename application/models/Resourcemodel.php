<?php

class Resourcemodel extends CI_Model{
    public function get_resource_id(){
        $sql = $this->db->select('resource_id')->from('resources')->get();
        return $sql->row();
    }

    public function id_increment($res_id){
        $result = $this->db->update('resources',['resource_id'=> $res_id + 1]);
        return $result;
    }
}