<?php
class Data_m extends MY_Model{
    function __construct() {
        parent::__construct();
    }
    public function server(){
           
        $this->db->select("id,author,text");
        $this->db->from('author');
        $query = $this->db->get();
         if($query->num_rows() > 0)
        {
                return $query->result();
        }
        else
        {
                return $query->result();
        }

    }
    public function insert($data,$skip_validation = true){
            $this->db->insert('author',$data);
            return true;
    }
    
    public function search_p($searchT = null)
    {    $this->db->select("id, name, image, short_description,description,price,discount,code_product");
        $this->db->from('seller_products');
        $this->db->like('name',$searchT,'both');
        
        $query = $this->db->get();
       
        if($query->num_rows() > 0)
        {
                return $query->result();
        }
        else
        {
                return $query->result();
        }

    }
    
    public function search_c($searchT = null){
        $this->db->select("id, category_name, image_c, description_c");
        $this->db->from('seller_categories');
        $this->db->like('category_name',$searchT,'both');
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
                return $query->result();
        }
        else
        {
                return $query->result();
        }
    }
} 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

