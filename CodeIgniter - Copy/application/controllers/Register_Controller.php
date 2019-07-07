<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url'); // for CSS and JS file add
		$this->load->model('U_Model'); 
		$this->load->library('session');  
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->load->view("register_view");
	}

	public function register() // User Registration save into databse
	{
		$data = array(
			'name' 		=>$this->input->post('name'), 
			'email' 	=>$this->input->post('email'), 
			'password' 	=>md5($this->input->post('password'))
		); 

		$rePassword = array( 
			'rePassword' 	=>md5($this->input->post('rePassword')) 
		);

		if (!$data['name']=='' && !$data['email']=='' && !$data['password']=='')
		{			
	    	$this->load->model('U_Model'); 
	    	if ($this->U_Model->CheckExitUser($data['email'])) // Data Already Exit, more comma separetor
	    	{
	    		$this->session->set_flashdata('emsg','Data Already Exit');
				redirect("Register_Controller"); 
	    	}
	    	else
	    	{
	    		if ($rePassword['rePassword']==$data['password']) // Confirm password
				{
					$this->U_Model->register_model($data);  
		    		$this->session->set_flashdata('smsg','Registration Success');
					redirect('Register_Controller');
				}
				else{
					$this->session->set_flashdata('emsg','Password do not match');
					redirect("Register_Controller"); 
				}	    		 	   
	    	}
	    	       
		}
		else{
			$this->session->set_flashdata('emsg','Name and email and password can not be blank');
			redirect('Register_Controller');
		} 
	}
 
	public function login_view()
	{
		$this->load->view("login_view");
	}

	public function loginFunction() // for Login 
	{
		$this->load->view("login_view");
		$loginData=array(
		'email'		=> $this->input->post('email'),
		'password'	=> md5($this->input->post('password'))
		);

		$data = $this->U_Model->loginFunctionModel($loginData['email'], $loginData['password']);
		if ($data) 
		{
			$this->session->set_userdata('sid', $data['id']);
			$this->session->set_userdata('name', $data['name']);
			$this->session->set_userdata('email', $data['email']);
			redirect('Register_Controller/home');
		}
		else
		{
			$this->session->set_flashdata('emsg','Please enter your correct Email and Password');   	
		}
	}

	public function home() // pagination with data show in home page
	{
		// $this->load->view('home'); 
		$config['base_url']		=	"http://[::1]/codeIgniter/index.php/register_Controller/home";
		$config['per_page']		=	5;
		$config['num_links']	=	5;
		$config['total_rows']	=	$this->db->get('baby')->num_rows();
 
 		// For using Bootstrap below
		/*$config['base_url'] = "http://[::1]/codeIgniter/index.php/register_Controller/home";
		$config['total_rows'] = $this->db->get('baby')->num_rows();
		$config['per_page'] = 5;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';*/
		// For using Bootstrap end

		$this->pagination->initialize($config);
		$data['query']	=	$this->db->get('baby', $config['per_page'], $this->uri->segment(3));
		$data["links"] = $this->pagination->create_links();
		$this->load->view('home', $data);
	}

	public function savingdata()  //insert home page Message data into database table.
    {
        //this array is used to get fetch data from the view page.  
        $data = array(  
                        'name'     => $this->input->post('name'),  
                        'meaning'  => $this->input->post('meaning'),  
                        'gender'   => $this->input->post('gender'),  
                        'religion' => $this->input->post('religion'),  
                        'txtMsg' => $this->input->post('txtMsg')  
                        );

    	if (!$data['name']=='' && !$data['gender']=='')
		{
        	$this->load->model('U_Model'); 
        	if ($this->U_Model->CheckExitData($data['name'])) // Data Already Exit, more comma separetor
        	{
        		$this->session->set_flashdata('emsg','Data Already Exit');
				redirect("Register_Controller/home"); 
        	}
        	else
        	{
        		$this->U_Model->add_new($data);  	  
        		$this->session->set_flashdata('smsg','Data Save Success');
				redirect("Register_Controller/home"); 
        	}
        	       
		}
		else
		{
			$this->session->set_flashdata('emsg','Name and gender can not be blank');
			redirect("Register_Controller/home"); 
		}   
    } 

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Register_Controller/login_view', 'refresh');
	}

}
