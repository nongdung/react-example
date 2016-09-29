<?php

class Faq extends Public_Controller{
    public function __construct()
	{
		parent::__construct();
                $this->lang->load('faq');
                $this->load->driver('Streams');
                $this->load->model('data_m');
                $this->template->append_css('module::bootstrap.min.css');
                $this->template->append_css('module::mystyle.css');
	}
        
    public function index(){
        
        $data['f']=$this->data_m->data_f();
        
        $data['c']=$this->data_m->data_c();
        
        $this->template->title($this->module_details['name'])
                ->build('index', $data);
        
    }
    
     public function test(){
        
        $data['f']=$this->data_m->data_f();
        
        $data['c']=$this->data_m->data_c();
        
        $this->template->title($this->module_details['name'])
                ->build('testing', $data);
        
    }        
}

