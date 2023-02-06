<?php 
class Blog extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
	}
	public function view($slug)
	{
		$data['blog']=$this->blog_model->get_blog($slug);
		if(empty($data['blog']))
		{
			show_404();
		}
			$data['title'] = $data['blog']['title'];

				$this->load->view('templates/header', $data);
				$this->load->view('blog/view', $data);
				$this->load->view('templates/footer');
	}
	public function index()
	{
		$data['blog']=$this->blog_model->get_blog();
		
		$data['title']="Blogs";
		$this->load->view('templates/header',$data);
		$this->load->view('blog/blog_view',$data);
		$this->load->view('templates/footer');

	}	
		public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title']="Blog Creation!";
			$this->form_validation->set_rules('title','title','required');
			$this->form_validation->set_rules('text','text','required');
			if($this->form_validation->run()===FALSE)
			{
					$this->load->view('templates/header',$data);
					$this->load->view('blog/blog_create');
					$this->load->view('templates/footer');
			}
			else
			{
				$this->blog_model->set_blog();
				$this->load->view('blog/success');	
			}
			}
		}