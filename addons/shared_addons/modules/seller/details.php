<?php  defined('BASEPATH') or exit('No direct script access allowed');

class Module_Seller extends Module{
    
    public $version = '1.0';
    
    public function info(){
        
        return array(
            'name' => array(
              'en' => 'Seller'  
            ),
            'description' => array(
                'en'=>'this is a seller managerment'
            ),
            'frontend' => true,
            'backend' => true,
            'menu' => 'content',
            'sections' => array(
                'products'=> array(
                    'name'  => 'Products',
                    'uri'   => 'admin/seller',
                    'shortcuts' => array(
			        'create'=>array(
                            'name'  => 'seller:Create',
                            'uri'   => 'admin/seller/create',
                            'class' => 'add',
			),
                    ),   
                ),
                'categories'=> array(
                    'name'  => 'Categories',
                    'uri'   => 'admin/seller/categories/index',
                    'shortcuts' => array(
                       'create'=>array(
                            'name'  => 'seller:Create',
                            'uri'   => 'admin/seller/categories/create',
                            'class' => 'add',
                        ),
                    ),
                ),
            ),
        );
    }
    
    public function install() {
        //$this->dbforge->drop_table('seller_categories');
        
        $this->load->driver('Streams');
        $this->lang->load('seller/seller');
        
        //$this->streams->utilities->remove_namespace('seller');
        
        if ( ! $this->streams->streams->add_stream('Seller', 'products', 'seller', 'seller_', null)) return false;
        if ( ! $categories_stream_id = $this->streams->streams->add_stream('categories', 'categories', 'seller', 'seller_', null)) return false;
        
        $fields_products = array(
            array(
                'name' => 'name',
                'slug' => 'name',
                'namespace' => 'seller',
                'type' => 'text',
                'extra' => array('max_length' => 200),
                'assign' => 'products',
                'title_column' => true,
                'required' => true,
                'unique' => true
            ),
            array(
                'name' => 'price',
                'slug' => 'price',
                'namespace' => 'seller',
                'type' => 'integer',
                'extra' => array('max_length' <= 30),
                'assign' => 'products',
                'required' => true
            ),
            array(
                'name' => 'description',
                'slug' => 'description',
                'namespace' => 'seller',
                'type' => 'textarea',
                'assign' => 'products',
                'required' => FALSE
            ),
            array(
                'name' => 'short description',
                'slug' => 'short_description',
                'namespace' => 'seller',
                'type' => 'textarea',
                'assign' => 'products',
                'required' => true
            ),
            
            array(
              'name'    =>'image',
                'slug'  =>'image',
                'namespace'=>'seller',
                'type'  => 'image',
                'extra'=>   array('folder'=>1,'allowed_types'=>'jpg|gif|png'),
                'assign' => 'products',
                'required' => true
            ),
            
            array(
                'name'    =>'highlight',
                'slug'  =>'highlight',
                'namespace'=>'seller',
                'type'  => 'integer',
                'assign' => 'products',
                'required' => FALSE
            ),
            
            array(
                'name' => 'Rating',
                'slug' => 'rating',
                'namespace' => 'seller',
                'type' => 'integer',
                'extra' => array('max_length' <= 30),
                'assign' => 'products',
                'required' => FALSE
            ),
            
            array(
                'name' => 'discount',
                'slug' => 'discount',
                'namespace' => 'seller',
                'type' => 'integer',
                'extra' => array('max_length' <= 30),
                'assign' => 'products',
                'required' => FALSE
            ),
            
            array(
                'name' => 'unit',
                'slug' => 'unit',
                'namespace' => 'seller',
                'type' => 'integer',
                'extra' => array('max_length' <= 30),
                'assign' => 'products',
                'required' => FALSE
            ),
            array(
                'name' => 'Code Product',
                'slug' => 'code_product',
                'namespace' => 'seller',
                'type' => 'text',
                'extra' => array('max_length' <= 50),
                'assign' => 'products',
                'required' => true
            ),

            array(
                'name' => 'Categories',
                'slug' => 'category_id',
                'namespace' => 'seller',
                'type' => 'relationship',
                'assign' => 'products',
                'extra' => array('choose_stream' => $categories_stream_id)
            )
        );
            
       
        $this->streams->fields->add_fields($fields_products);
        $this->streams->streams->update_stream('products', 'seller', array(
            'view_options' => array(
                'name',
                'price',
                'short_description',
                'category_id',
                'created_by',
                'image',
                'discount',
                'code_product'
            )
        ));
        
        $fields_categories = array(
            array(
                'name' => 'name',
                'slug' => 'category_name',
                'namespace' => 'seller',
                'type' => 'text',
                'assign' => 'categories',
                'title_column' => true,
                'required' => true,
                'unique' => true
            ),
            
            array(
                'name' => 'description',
                'slug' => 'description_c',
                'namespace' => 'seller',
                'type' => 'textarea',
                'assign' => 'categories',
                'title_column' => FALSE,
                'required' => false,
                'unique' => true
            ),
            
            array(
                'name' => 'image',
                'slug' => 'image_c',
                'namespace' => 'seller',
                'type' => 'image',
                'extra'=>   array('folder'=>1,'allowed_types'=>'jpg|gif|png'),
                'assign' => 'categories',
                'title_column' => false,
                'required' => true,
                'unique' => true
            ),);
        $this->streams->fields->add_fields($fields_categories);
        $this->streams->streams->update_stream('categories', 'seller', array(
            'view_options' => array(
                
                'image_c',
                'category_name',
                'description_c',
                
            )
        ));
       
        return true;
    }
    
     public function uninstall() {
         
         $this->load->driver('Streams');
       $this->streams->utilities->remove_namespace('seller');
        
        return true;
    }
    
     public function upgrade($old_version) {
        
        return true;
    }
    
     public function help() {
        return  "Here you can enter HTML with paragrpah tags or whatever you like";
    }
}
?>


