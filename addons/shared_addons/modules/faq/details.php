<?php  defined('BASEPATH') or exit('No direct script access allowed');

class Module_Faq extends Module{
    
    public $version = '1.0';
    
    public function info() {
    
        return array(
            'name'=>array(
              'en'  => 'FAQ'
            ),
            'description'   =>array(
                'en'=> 'This is FAQ module for questions and answers'
            ),
            'frontend'  =>true,
            'backend'   =>true,
            'menu'  =>'content',
            'sections'   =>array(
                'faq' =>array(
                    'name'  =>'FAQs',
                    'uri'   =>'admin/faq',
                    'shortcuts'=>array(
                        'create' => array(
                            'name' => 'faq:Create',
                            'uri' => 'admin/faq/create',
                            'class' => 'add'
                        ),
                    ),
                ),
                'categories'=> array(
                    'name'  => 'Categories',
                    'uri'   => 'admin/faq/categories/index',
                    'shortcuts' => array(
                       'create'=>array(
                            'name'  => 'faq:Create_c',
                            'uri'   => 'admin/faq/categories/create',
                            'class' => 'add',
                        ),
                    ),
                ),
            ),
        );
        
    }
    
    public function install() {
        
        $this->load->driver('Streams');
        $this->streams->utilities->remove_namespace('faq');
         if ( ! $this->streams->streams->add_stream('FAQs', 'faqs', 'faq', 'faq_', null)) return false;
        if ( ! $categories_stream_id = $this->streams->streams->add_stream('categories', 'categories', 'faq', 'faq_', null)) return false;
        $fields = array(
            array(
                'name'  =>'question',
                'slug'  =>'question',
                'namespace' =>'faq',
                'type'=> 'wysiwyg',
                'extra'	=> array('editor_type' => 'simple', 'allow_tags' => 'n'),
                'assign'=>'faqs',
                'title_column'  =>true,
                'required' => true,
                'unique'=>true,
            ),
            
            array(
                'name'=>'answer',
                'slug'=>'answer',
                'namespace'=>'faq',
                'type'  =>'textarea',
                'type'=> 'wysiwyg',
                'extra'		=> array('editor_type' => 'advanced', 'allow_tags' => 'n'),
                'assign'=>'faqs',
                'required' => true,
                'unique'=>true,
            ),
            array(
                'name' => 'Categories',
                'slug' => 'category_id',
                'namespace' => 'faq',
                'type' => 'relationship',
                'assign' => 'faqs',
                'extra' => array('choose_stream' => $categories_stream_id)
            )
        );
        
        $this->streams->fields->add_fields($fields);
        $this->streams->streams->update_stream('faqs','faq',array(
            'view_options'=>array(
                'question',
                'answer',
                'category_id'
            )
        ));
        
        $fields_c=array(
            array(
                'name' => 'name',
                'slug' => 'category_name',
                'namespace' => 'faq',
                'type' => 'text',
                'assign' => 'categories',
                'title_column' => true,
                'required' => true,
                'unique' => true
                
            ), 
        );
        $this->streams->fields->add_fields($fields_c);
        $this->streams->streams->update_stream('categories','faq',array(
            'view_options'=>array(
                'category_name'
            )
        ));
        return true;
    }
     public function uninstall() {
         
       $this->load->driver('Streams');
       $this->streams->utilities->remove_namespace('faq');
        
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