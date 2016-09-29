<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Plugin_Seller extends Plugin
{
	public $version = '1.0.0';

	public $name = array(
		'en'	=> 'Seller'
	);

	public $description = array(
		'en'	=> '???'
	);
        
        
        public function get_data(){
            $param = array(
                'stream'=> 'categories',
                'namespace'=>'seller',
                
            );
            
            $categories = $this->streams->entries->get_entries($param);
            $result = array();
             foreach ($categories["entries"] as $c){
                $result[] = array(
                    'name'=>$c["category_name"],
                    'image' =>$c["image_c"]["img"],
                    'description'=>$c["description_c"],
                    'id'=>$c["id"]
                );
                
            }
             return $result;
        }
        
        public function search(){
            
        }
}