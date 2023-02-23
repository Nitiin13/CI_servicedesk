<?php
class Service_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}
	public function register($name,$email,$pass)
	{
		$data=array(
			'name'=>$name,
			'email'=>$email,
			'password'=>md5($pass));
		$query=$this->db->insert('users',$data);
		if($query)
		{	
			 $this->session->set_flashdata('reg-success','Successfully registered!');
			return true;
			
		}
		else
		{
		 $this->session->set_flashdata('reg-failed','Try Again!');
			return false;
			
		}
	}
	 public function checkLogin($email,$pass)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($pass));
		$query=$this->db->get('users');

		if($query->num_rows>0)
		{
			return $result=$query->result_array();
		}
		else{
			$this->session->set_flashdata('error','invalid creds');
		}
	}
	 public function ticket_addition($title,$desc,$image,$userid)
	{
		 // var_dump($image);
		 $this->load->helper('email');
			$data=array('title'=>$title,
			'description'=>$desc,
		'attachment'=>$image,
			'u_id'=>$userid);
			// var_dump($data);
			$query=$this->db->insert('tickets',$data);
			// var_dump($query);
			if($query)
			{
				
				return true;
			}
			else
			 {
			 	 $this->session->set_flashdata('ticket-error','something went wrong!');
			 }
	}
	public function get_ticket($id=FALSE)
	{
		if($id===FALSE)
		{
			$query=$this->db->get('tickets');
			if($query->num_rows>0)
			{
				$results=$query->result_array();
				foreach($results as $res=>$ticket )
           	{ 
            	if($ticket['t_status']=='0')
            	{
            		$results[$res]['t_status']='Pending';
            	}
            	elseif($ticket['t_status']=='1')
            	{
            		$results[$res]['t_status']='InProgess';
            	}
            	else
            	{
            		$results[$res]['t_status']='Done';
            	}	
     		 }
      
				return $results;
			}
			else
			{
				return false;
			}
		}
		else
		{
		$this->db->where('u_id',$id);
		$query=$this->db->get('tickets');
		if($query->num_rows > 0)
		{
			$results=$query->result_array();
				foreach($results as $res=>$ticket )
           	{ 
            	if($ticket['t_status']=='0')
            	{
            		$results[$res]['t_status']='Pending';
            	}
            	elseif($ticket['t_status']=='1')
            	{
            		$results[$res]['t_status']='InProgess';
            	}
            	else
            	{
            		$results[$res]['t_status']='Done';
            	}	
     		 }
      
				return $results;
		}
		else
		{
			return false;
		}
	}
	}
	public function send_email_on_new_ticket($param)
{
    $title=$param['title'];
    $desc= $param['description'];
    $keyword=$param['key'];
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
