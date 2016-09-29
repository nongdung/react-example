<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Bannerfront extends Module {
	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Banner Front Đức V.A'
			),
			'description' => array(
				'en' => 'Module to create and edit slides for the home banner'
			),
			'frontend' => FALSE,
			'backend'  => TRUE,
			'menu' => 'content', // You can also place modules in their top level menu. For example try: 'menu' => 'Sample',
			'sections' => array(
				'slides' => array(
					'name' 	=> 'bannerfront:slides', // These are translated from your language file
					'uri' 	=> 'admin/bannerfront',
					'shortcuts' => array(
						'create' => array(
							'name' 	=> 'bannerfront:create',
							'uri' 	=> 'admin/bannerfront/create',
							'class' => 'add'
							)
						)
				),
				'fields' => array(
					'name' 	=> 'bannerfront:fields', // These are translated from your language file
					'uri' 	=> 'admin/bannerfront/fields/index',
					'shortcuts' => array(
						'create' => array(
							'name' 	=> 'bannerfront:create',
							'uri' 	=> 'admin/bannerfront/fields/add_field',
							'class' => 'add'
							)
						)
				),
			)
		);
	}

	public function install()
	{
		if(!$this->streams->streams->add_stream('Banner Front ','banner_front_slug', 'banner_front_namespace'))
		{
			return false;
		}
		return true;
	}

	public function uninstall()
	{
		$this->streams->utilities->remove_namespace('banner_front_namespace');
		return true;
	}

	public function upgrade($old_version)
	{
		return true;
	}

	public function help()
	{
		return "Help for this module";
	}
}