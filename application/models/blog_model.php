<?php
	class Blog_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_blog($slug=FALSE){
			if ($slug===FALSE)
			 {
				$query=$this->db->get('blog');
				return $query->result_array();
			}
			$query=$this->db->get_where('blog',array('slug'=>$slug));
			return $query->row_array();
		}
		public function set_blog()
		{
				$this->load->helper('url');
				$slug=url_title($this->input->post('title'),'dash',TRUE);
				$data=array('title'=>$this->input->post('title'),
					'slug'=>$slug,
					'text'=>$this->input->post('text')
			);
				return $this->db->insert('blog',$data);

		}
	}
?>