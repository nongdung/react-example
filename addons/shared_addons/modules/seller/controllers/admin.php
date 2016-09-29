<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_Controller {
    
    protected $section = 'products';
    
    public function __construct(){
        
        parent::__construct();
        $this->lang->load('seller');
        $this->load->driver('Streams');
    }
    
    public function index(){
        
        $extra['title'] = 'lang:seller:products';
      
        $extra['buttons'] = array(
            array(
                'label' => lang('global:edit'),
                'url' => 'admin/seller/edit/-entry_id-'
            ),
            array(
                'label' => lang('global:delete'),
                'url' => 'admin/seller/delete/-entry_id-',
                'confirm' => true
            )
        );

       
        $this->streams->cp->entries_table('products', 'seller', 3, 'admin/seller/index', true, $extra);

    }
    
    public function create()
    {
        $extra['title'] = 'Create Products';
        $extra = array(
            'return' => 'admin/seller',
            'success_message' => lang('Success'),
            'failure_message' => lang('Failed'),
            'title' => 'New Product',
         );

        $this->streams->cp->entry_form('products', 'seller', 'new', null, true, $extra);
    }
    
    
     public function edit($id = 0)
    {
        $this->template->title(lang('Edit Product'));

        $extra = array(
            'return' => 'admin/seller',
            'success_message' => lang(' successfully.'),
            'failure_message' => lang(' failed.'),
            'title' => lang('Edit Product')
        );

        $this->streams->cp->entry_form('products', 'seller', 'edit', $id, true, $extra);
       }


      
    public function delete($id = 0){
        $this->streams->entries->delete_entry($id, 'products', 'seller');
        $this->session->set_flashdata('error', lang('Seller has deleted'));
        redirect('admin/seller');
    }

}
