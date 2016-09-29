<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Admin extends Admin_Controller
	{
		protected $section = "slides";

		public function __construct()
		{
			parent::__construct();
			$this->lang->load('bannerfront');
		}

		public function index()
		{
			$extra['title'] = "Slide";

			$extra['columns'] = array('id','image_slider','text_slider','created','updated','created_by');

			$extra['buttons'] = array(
			    array(
			        'label'     => lang('global:edit'),
			        'url'       => 'admin/bannerfront/edit/-entry_id-'
			    ),
			    array(
			        'label'     => lang('global:delete'),
			        'url'       => 'admin/bannerfront/delete/-entry_id-',
			        'confirm'   => true,
			    )
			);

			$this->streams->cp->entries_table('banner_front_slug', 'banner_front_namespace', null, null, true, $extra);
		}

		public function create()
		{
			$extra['title'] = " Tạo slide ";
			$extra['return'] = "admin/bannerfront";
			$this->streams->cp->entry_form('banner_front_slug', 'banner_front_namespace', 'new', null, true, $extra);
		}

		public function edit($id)
		{
			$extra['title'] = " Sửa thông tin ảnh slide ";
			$extra['return'] = "admin/bannerfront";
			$this->streams->cp->entry_form('banner_front_slug', 'banner_front_namespace', 'edit', $id, true, $extra);
		}

		public function delete()
		{
			$this->streams->entries->delete_entry($id,'banner_front_slug', 'banner_front_namespace' );
			redirect('admin/bannerfront');
		}
	}
?>