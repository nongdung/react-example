<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Admin_fields extends Admin_Controller
	{
		protected $section = "fields";

		public function __construct()
		{
			parent::__construct();
			$this->lang->load('bannerfront');
		}

		public function index()
		{
			$extra['title'] = "Admin Slider Đức V.A";

			$extra['buttons'] = array(
			    array(
			        'label'     => lang('global:edit'),
			        'url'       => 'admin/bannerfront/fields/edit/-assign_id-'
			    ),
			    array(
			        'label'     => lang('global:delete'),
			        'url'       => 'admin/bannerfront/fields/delete/-assign_id-',
			        'confirm'   => true,
			    )
			);

			$this->streams->cp->assignments_table('banner_front_slug', 'banner_front_namespace', null, null, true, $extra );
		}

		public function add_field()
		{
			$extra['title'] = "Thêm thuộc tính slide";
			
			$this->streams->cp->field_form('banner_front_slug', 'banner_front_namespace','new', 'admin/bannerfront/fields/index', null, array(), true, $extra );
		}

		public function edit($id)
		{
			$extra['title'] = "Sửa thuộc tính slide";
			$this->streams->cp->field_form('banner_front_slug', 'banner_front_namespace','edit', 'admin/bannerfront/fields/index', $id, array(), true, $extra );
		}

		public function delete($id)
		{
			$this->streams->cp->teardown_assignment_field($id, true);
			redirect('admin/bannerfront/fields/index');
		}
	}
?>