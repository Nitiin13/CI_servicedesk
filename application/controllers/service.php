<?php
 class Service extends CI_Controller{
 	public  function __construct()
 	{
        parent::__construct();
        $this->load->model('service_model');
        $this->load->helper('url');
        $this->load->helper('form');
         $this->load->helper('Array');
        $this->load->helper('security'); 
        // $this->load->library('output');
        //$this->load->library('form_validation'); 
        $this->load->library('session');
         $this->output->set_header('Last-Modified:'.gmdate("D, d M Y H:i:s").' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
           $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma:no-cache');
        
      
    }
    public function check_Sess()
    {
         $isloggedIn=$this->session->userdata('isloggedIn');
        // var_dump($isloggedIn);
        if(!$isloggedIn)
        {
             redirect('service/');
        }
        
      }
    public function index(){
      // $this->check_Sess();
        $this->load->view('templates/header');
        $this->load->view('service/login');
        $this->load->view('templates/footer');
    }    

    
    public function ticket_portal()
    {  // th$is->ticket_portal();
         $this->check_Sess();
        $id=$this->session->userdata('ses_id');
        $data['tickets']=$this->service_model->get_ticket($id);
        $this->load->view('templates/header');
        $this->load->view('service/ticket_portal',$data);
        $this->load->view('templates/footer');
    
    
    }
    // public function ticket_download()
    // {
        
    //      // load download helder
    // $this->load->helper('download');

    // // read file contents
    // $data = file_get_contents(base_url('/uploads/'.$filename));
    // force_download($filename, $data);
    // }
    public function logout()
    {
        $this->session->unset_userdata('isloggedIn');
        $this->session->unset_userdata();
        // $this->output->clear_all_cache(); 
        $this->session->sess_destroy();
        redirect('service/','refresh');
    }
    public function register()
    {

        $this->load->view('templates/header');
        $this->load->view('service/register');
        $this->load->view('templates/footer');  
    }
    public function authenticate()
    {
        if($this->form_validation->run('signin'))   
        {  
            $email=$this->input->post('email');
            $pass=$this->input->post('pass'); 
            if($this->service_model->checkLogin($email,$pass))
            {  
                        $user_array=$this->service_model->checkLogin($email,$pass);
                        foreach($user_array as $user)
                        {
                            $user_id=$user['userid'];
                            $user_email=$user['email'];
                            $user_role=$user['role'];
                        }
                        $session_array=array(
                                'ses_id'=>$user_id,
                                'ses_email'=>$user_email,
                                'ses_role'=>$user_role,
                                'isloggedIn'=>TRUE);
                        $this->session->set_userdata($session_array);
                        $role=$this->session->userdata('ses_role');
                                if($role=="admin")
                                {
                                     redirect('service/admin_portal'); 
                                }
                                else{
                                   redirect('service/ticket_portal');
                                }
            }
            else
            {
                    redirect('service/','refresh');
            }
        }
       
        $this->load->view('templates/header');
        $this->load->view('service/login');
        $this->load->view('templates/footer');  
       // }
    }
    public function registerUser()
    {
        if($this->form_validation->run('signup'))
      {
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $pass=$this->input->post('pass');
        if($this->service_model->register($name,$email,$pass))
        {
            redirect('service/'); 
        }
        else{
                return false;        
            }
        }
        else{
            // redirect('service/register');
        $this->load->view('templates/header');
        $this->load->view('service/register');
        $this->load->view('templates/footer');  
        }
    }
    public function admin_portal()
    {
            $this->check_Sess();
        $data['all_tickets']=$this->service_model->get_ticket();
        
         $this->load->view('templates/header');
        $this->load->view('service/admin_portal',$data);
    }
    public function ticket_add()
    {
        // $this->form_validation->set_rules('title','Title:','required');
        // $this->form_validation->set_rules('desc','Description:','required');
        if($this->form_validation->run('ticket-add'))
        {

            $title=$this->input->post('ticket-title');
            $desc=$this->input->post('ticket-detail');  
            $config['upload_path'] =APPPATH.'../uploads/';
            $config['allowed_types']='jpg|png|pdf|jpeg';
             $new_name = date('Y-m-d') . '-' . $_FILES['attachment']['name'];
             $config['file_name']=$new_name;
                $this->upload->initialize($config);
            if($_FILES['attachment']['error']==0) 
            {
                     if($this->upload->do_upload('attachment'))
                    {
                        $arr=$this->upload->data();
                    }
                    $image=$arr['file_name'];
                }
                else
                {
                    $image='';
                }
            $userid=$this->session->userdata('ses_id');
            if($this->service_model->ticket_addition($title,$desc,$image,$userid))
            {

                redirect('service/ticket_portal');
            }
            else
            {
               return false;     
            }
         }
         else{
            $this->ticket_portal();
         }
    
}
}