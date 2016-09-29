<?php defined('BASEPATH') or exit('No direct script access allowed');


            
class Seller extends Public_Controller{
   
    public function __construct()
	{
		parent::__construct();
                $this->lang->load('seller');
                $this->load->driver('Streams');
                $this->load->model('data_m');
                $this->template->append_css('module::bootstrap.min.css');
                $this->template->append_css('module::mystyle.css');
	}
        
        public function index(){
            
            $param = array(
                'stream'=> 'categories',
                'namespace'=>'seller',
                
            );
            
            $data['categories'] = $this->streams->entries->get_entries($param);
            $param1 = array(
                'stream'=>'products',
                'namespace'=>'seller',
            );
            
            $data['product'] = $this->streams->entries->get_entries($param1);
            
            $this->template->title($this->module_details['name'])
                ->build('categories', $data); 
            }
             
             
        public function category($id = null)
	{
            if(!$id){
                redirect ('seller');
            }         
            //get products data
            $param = array(
                'stream'=>'products',
                'namespace'=>'seller',
                'where'=>"category_id = '". $id . "'",
                
            );
            
            $data['product'] = $this->streams->entries->get_entries($param);
            
            
           
            $this->template->title($this->module_details['name'])
                    
                    ->build('product',$data);
            
	}
        
        public function product($id = null)
	{
            $product = $this->streams->entries->get_entry($id,'products','seller');
            
            
            $this->template->title($this->module_details['name'])
                    ->build('detail',$product);
            
            
        }
        
        public function search_s(){
            if($this->input->get('search')){
            $searchT = $this->input->get('search');
            
            $result['Term'] = $this->data_m->search_p($searchT);
            
            $result['Term2'] = $this->data_m->search_c($searchT);
            $this->template->build('search',$result);
            }
            else{exit;}
        }
                    
        
        public function timkiem(){
            $dbHost = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName = 'pyrocms';

                //connect with the database
            $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
              
            if(!isset($_GET['term'])){ exit;}
            else {
                //get search term
            $searchTerm = $_GET['term'];
            
                //get matched data from skills table
            $query = $db->query("SELECT * FROM default_seller_products WHERE name LIKE '%$searchTerm%'");
            $q = $db->query("SELECT * FROM default_seller_categories WHERE category_name LIKE '%$searchTerm%'");
            while ($row = $query->fetch_assoc() ) {
                $data[] = $row['name'];
            }
            while ($row = $q->fetch_assoc() ) {
                $data[] = $row['category_name'];
                
            }
                //return json data
            echo json_encode($data);
            //$data['a'] = json_encode($data);
            }
        }

        public function comment(){
           $this->load->view('commentbox/index');
            
        }

        public function server(){
            $data = array(
            );
            array_push($data, $this->input->post());
            $data = $this->data_m->server();
            echo json_encode($data);
       } 
}