<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Theme_Mbtheme extends Theme
{
    public $name = 'MB';
    public $author = 'mb';
    public $author_website = 'http://zacvineyard.com';
    public $website = 'http://example.com/themes/foo';
    public $description = 'The antithesis theme to your Bar theme.';
    public $version = '1.0';
	public $options = array(
					'layout' => 			array('title' => 'Layout',
					'description'   => 'Which type of layout shall we use?',
					'default'       => '2 column',
					'type'          => 'select',
					'options'       => '2 column=Two Column|full-width=Full Width|full-width-home=Full Width Home Page',
					'is_required'   => true),);
}