<?php

class Admin extends Admin_Controller{
    protected $section = 'faq';
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('faq');
        $this->load->driver('Streams');
    }
    
    public function index(){
        $extra['title'] = 'FAQs';
      
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
        $this->streams->cp->entries_table('faqs', 'faq', 3, 'admin/faq/index', true, $extra);
        
        

        
    }
    
    public function create(){
        $extra = array(
            'return' => 'admin/faq',
            'success_message' => lang('uccess'),
            'failure_message' => lang('failure'),
            'title' => 'new',
         );

        $this->streams->cp->entry_form('faqs', 'faq', 'new', null, true, $extra);
    
    }
    
     public function edit($id = 0)
    {
        $extra = array(
            'return' => 'admin/faq',
            'success_message' => lang('success'),
            'failure_message' => lang('failure'),
            'title' => 'edit'
        );

        $this->streams->cp->entry_form('faqs', 'faq', 'edit', $id, true, $extra);
    }

    /**
     * Delete a FAQ entry
     * 
     * @param   int [$id] The id of FAQ to be deleted
     * @return  void
     */
    public function delete($id = 0)
    {
        $this->streams->entries->delete_entry($id, 'faqs', 'faq');
        $this->session->set_flashdata('error', lang('deleted'));
 
        redirect('admin/faq/');
    }

}