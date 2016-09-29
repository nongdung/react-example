<?php

class Data_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    public function data_f(){
        /*$this->db->select('id,question,answer,category_id');
        $this->db->from('faq_faqs');
        $query = $this->db->get();
        return $query->result();*/
        $this->db->select("id, question , answer , category_id");
			$query = $this->db->get("faq_faqs");
			return $query->result();
        
    }
    
    public function data_c(){
        $this->db->select('id,category_name');
        $this->db->from('faq_categories');
        $query = $this->db->get();
       
        return $query->result();
    }
}