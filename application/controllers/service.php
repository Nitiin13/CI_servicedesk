<?php
 class Service extends CI_Controller{
 	public  function __construct()
 	{
        parent::__construct();
        $this->load->model('service_model');
        $this->hooks =& load_class('Hooks', 'core');
        // $this->load->library('session');
        // //$this->load->helper('url');
        // $this->load->helper('form');
        //  $this->load->helper('Array');
        // $this->load->helper('security'); 
        // $this->load->library('output');
        // $this->load->library('form_validation'); 
       
      
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

    public function usertickets()
    {
        $this->check_Sess();
        $id=$this->session->userdata('ses_id');
        $jsonArray=$this->service_model->get_ticket($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($jsonArray));        
    }
    public function ticket_portal()
    {  // th$is->ticket_portal();
         $this->check_Sess();
        $this->load->view('templates/header');
        $this->load->view('service/ticket_portal');
        $this->load->view('templates/footer');
        
    
    }
    public function admin_view_tickets(){
        // $this->check_Sess();
        $all_tickets=$this->service_model->get_ticket();
        $this->output->set_content_type('application/json')->set_output(json_encode($all_tickets));
    }
  
    public function logout()
    {
        $this->session->unset_userdata('isloggedIn');
        $this->session->unset_userdata();
        // $this->output->clear_all_cache(); 
        $this->session->sess_destroy();
        // redirect('service/','refresh');
        echo true;
    }
    public function register()
    {

        $this->load->view('templates/header');
        $this->load->view('service/register');
        $this->load->view('templates/footer');  
    }
    public function authenticate()
    {
       
            $req=json_decode(file_get_contents('php://input'),true);
            $email=$req['email'];
            $pass=$req['pass']; 
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
                $this->output->set_content_type('application/json')->set_output(json_encode($role)); 
            }
            else
            {
                echo false;

            }
           
        }
        // $this->load->view('templates/header');
        // $this->load->view('service/login');
        // $this->load->view('templates/footer');  
       // }
    
    public function registerUser()
    {
        $req=json_decode(file_get_contents('php://input'),true);
        $name=$req['uname'];
        $email=$req['email'];
        $pass=$req['pass'];
        var_dump($req);
    //     // if($this->form_validation->run('signup'))
    // //   {
    //         $name=$this->input->post('name');
    //         $email=$this->input->post('email');
    // //         $pass=$this->input->post('pass');
        if($this->service_model->register($name,$email,$pass))
        {
            echo true;
        }
        else{
                echo false;        
            }
        // }
        // else{
        //     // redirect('service/register');
        // $this->load->view('templates/header');
        // $this->load->view('service/register');
        // $this->load->view('templates/footer');  
        // }
    }
    public function admin_portal()
    {
            $this->check_Sess();
         $this->load->view('templates/header');
        $this->load->view('service/admin_portal');
    }
    public function ticket_add()
    {
       
        // $this->form_validation->set_rules('title','Title:','required');
        // $this->form_validation->set_rules('desc','Description:','required');
        // if($this->form_validation->run('ticket-add'))
       // {
            $req=json_decode(file_get_contents('php://input'),true);
            var_dump($req);
            $title=$req['title'];
            $desc=$req['desc'];  
            $key=$req['key'];
            $image='';
     
        // $this->load->library('curl');
            // $title=$this->input->post('ticket-title');
            // $desc=$this->input->post('ticket-detail');  
            // $config['upload_path'] =APPPATH.'../uploads/';
            // $config['allowed_types']='jpg|png|pdf|jpeg';
            //  $new_name = date('Y-m-d') . '-' . $_FILES['attachment']['name'];
            //  $config['file_name']=$new_name;
            //     $this->upload->initialize($config);
            // if($_FILES['attachment']['error']==0) 
            // {
            //          if($this->upload->do_upload('attachment'))
            //         {
            //             $arr=$this->upload->data();
            //         }
            //         $image=$arr['file_name'];
            //     }
            //     else
            //     {
            //         $image='';
            //     }
            $userid=$this->session->userdata('ses_id');
            if($this->service_model->ticket_addition($title,$desc,$image,$userid))
            {
         
                echo true;
                $ABC=& load_class('Hooks','core');
                $ABC->add_hook('post_controller',array(
                    'class'=>'Service',
                    'function'=>'send_email_on_new_ticket',
                    'filename'=>'service.php',
                    'filepath'=>'controllers',
                    'params'=>array(
                        'title'=>$title,
                        'description'=>$desc,
                        'key'=>$key
                    )
                    ));
              
            }
            else
            {
               echo "failed";     
            }
    
}
public function send_email_on_new_ticket($param)
{
    var_dump($param);
    $title='help';
    // $param['title'];
    $desc='me'; 
    // $param['description'];
    $keyword='stolen';
    // $param['key'];
    // $CI=& get_instance();
    $this->load->helper('custom_email');
    $this->load->helper('curl');
    $resulttext=curl_request($keyword);
    $from='patilnitin9769@gmail.com';
    $to='nitu13122001@gmail.com';
    $subject='New Ticket has been created!';
    $message="Hi here is what we have received\n Title of Ticket:".$title."\n Description of Ticket:".$desc."\n Here is the list of companies".$resulttext; 
    sendMail($from,$to,$subject,$message);
}
}