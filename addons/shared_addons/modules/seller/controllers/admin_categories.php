<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_categories extends Admin_Controller{
    
    protected $section = 'categories';
    
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('seller');
        $this->load->driver('Streams');
    }
    
    public function index()
    {
        
        $extra['title'] = 'lang:seller:categories';
        
        $extra['buttons'] = array(
            array(
                'label' => lang('global:edit'),
                'url' => 'admin/seller/categories/edit/-entry_id-'
            ),
            array(
                'label' => lang('global:delete'),
                'url' => 'admin/seller/categories/delete/-entry_id-',
                'confirm' => true
            )
        );

        $this->streams->cp->entries_table('categories', 'seller', 3, 'admin/seller/categories/index', true, $extra);
    }
    public function create(){
        $extra['title'] = 'Create Category';

        $extra = array(
            'return' => 'admin/seller/categories/index',
            'success_message' => lang('New Seller submitted successfully.'),
            'failure_message' => lang('New Seller submitted failed.'),
            'title' => lang('New category')
           );

           $this->streams->cp->entry_form('categories', 'seller', 'new', null, true, $extra);
       }

    
    public function edit($id = 0)
    {
        $this->template->title(lang('Edit Category'));

        $extra = array(
            'return' => 'admin/seller/categories/index',
            'success_message' => lang('New Seller submitted successfully.'),
            'failure_message' => lang('New Seller submitted failed.'),
            'title' => lang('Edit Seller')
        );

        $this->streams->cp->entry_form('categories', 'seller', 'edit', $id, true, $extra);
       }


      
    public function delete($id = 0){
        $this->streams->entries->delete_entry($id, 'categories', 'seller');
        $this->session->set_flashdata('error', lang('Seller has deleted'));
        redirect('admin/seller/categories/index');
    }
    
    
   }
