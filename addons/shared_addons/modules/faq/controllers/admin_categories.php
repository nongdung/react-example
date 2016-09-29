<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_categories extends Admin_Controller{
    
    protected $section = 'categories';
    
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('faq');
        $this->load->driver('Streams');
    }
    public function index(){
        $extra['title'] = 'lang:faq:categories';
        
        $extra['buttons'] = array(
            array(
                'label' => lang('global:edit'),
                'url' => 'admin/faq/categories/edit/-entry_id-'
            ),
            array(
                'label' => lang('global:delete'),
                'url' => 'admin/faq/categories/delete/-entry_id-',
                'confirm' => true
            )
        );

        $this->streams->cp->entries_table('categories', 'faq', 3, 'admin/faq/categories/index', true, $extra);

    }
    
    public function create()
    {
	$extra['title'] = 'new';

        $extra = array(
            'return' => 'admin/faq/categories/index',
            'success_message' => lang('success'),
            'failure_message' => lang('failure'),
            'title' => lang('new')
        );

        $this->streams->cp->entry_form('categories', 'faq', 'new', null, true, $extra);
    }

   /**
     * Edit a FAQ categories
     *
     * @access	public
     * @return	void
     */
    public function edit($id = 0)
    {
        $this->template->title(lang('edit'));

        $extra = array(
            'return' => 'admin/faq/categories/index',
            'success_message' => lang('success'),
            'failure_message' => lang('failure'),
            'title' => lang('edit')
        );

        $this->streams->cp->entry_form('categories', 'faq', 'edit', $id, true, $extra);
    }

    // --------------------------------------------------------------------------

    /**
     * Delete a FAQ entry
     * 
     * This uses the Streams API Entries driver which is
     * designed to work with entries within a Stream.
     * 
     * @access  public
     * @param   int $id The id of FAQ to be deleted
     * @return  void
     * @todo    This function does not currently hava any error checking.
     */
    public function delete($id = 0)
    {
        $this->streams->entries->delete_entry($id, 'categories', 'faq');
        $this->session->set_flashdata('error', lang('deleted'));
        redirect('admin/faq/categories/index');
    }

}

