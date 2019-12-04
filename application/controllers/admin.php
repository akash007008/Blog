<?php
class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) 
		{
			return redirect('login');
		}
	}

	public function dashboard()
	{
		$this->load->library('pagination');
		$config= [
					'base_url'=> base_url('admin/dashboard'),
					'per_page'=> 5,
					'total_rows'=> $this->articlemodel->num_rows(),
					'full_tag_open'=>'<ul class="pagination">',
					'full_tag_close'=>'</ul>',
					'next_tag_open'=>'<li class="page-item "><span class="page-link">',
					'next_tag_close'=>'</span></li>',
					'prev_tag_open'=>' <li class="page-item disabled"><span class="page-link">',
					'prev_tag_close'=>'</span></li>',
					'num_tag_open'=>'<li class="page-item"><span class="page-link">',
					'num_tag_close'=>'</span></li>',
					'cur_tag_open'=>' <li class="page-item active"><a class="page-link">',
					'cur_tag_close'=>'</a></li>',

		];
		$this->pagination->initialize($config);

		$this->load->helper('form');
		$data['articles']=$this->articlemodel->articleList($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/dashboard',$data);
	}

	public function add_article()
	{
		$this->load->helper('form');
		$this->load->view('admin/add_article');
	}

	public function store_article()
	{
		$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpeg|gif|png|jpg',
				];
		$this->load->library('upload',$config);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
		{
			$post =$this->input->post();
			//print_r( $post);die;
			unset($post['add_article']);
			$data=$this->upload->data();

			$img_path=$data['raw_name'].$data['file_ext'];
			//echo $img_path;die;
			$post['image']=$img_path;
			return $this->_notification($this->articlemodel->add_article($post),'Article added successfully',"Can't add Article, Please Try Again");
		}
		else
		{ 
			$upload_error=$this->upload->display_errors();
			$this->load->view('admin/add_article',compact('upload_error'));
		}
	}

	public function edit_article($article_id)
	{
		$this->load->helper('form');  
		$article=$this->articlemodel->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);

	}

	public function update_article($article_id)
	{
		$config=[
					'upload_path'=>'./uploads',
					'allowed_types'=>'jpeg|gif|png|jpg',
				];
		$this->load->library('upload',$config);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($_FILES['userfile']['name'])
		{
			//echo "received";
			//echo "<pre>";
			//print_r($_FILES['userfile']);
			//echo "</pre>";
			if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
			{
				//echo "received";
				$data=$this->upload->data();
				//echo "<pre>";
				//print_r($data);die;
				$article=$this->articlemodel->find_article($article_id);
				//print_r($article);die;
				unlink('uploads/'.$article->image);
				$edited=$this->input->post();
				unset($edited['edit_article']);
				
				$img_path=$data['raw_name'].$data['file_ext'];
				
				$edited['image']=$img_path;
				return $this->_notification($this->articlemodel->update_article($article_id,$edited),'Article Updated Successfully',"Can't Update Article, Please Try Again" );
			}
			else
			{   
				//echo " not received";die;
				$article=$this->articlemodel->find_article($article_id);
				$upload_error=$this->upload->display_errors();
				
				$this->load->view('admin/edit_article',['article'=>$article, 'upload_error'=>$upload_error]);
			}

		}
		else
		{	
			//echo " not received 111";die;
			if($this->form_validation->run('add_article_rules'))
			{
				$edited=$this->input->post();
				unset($edited['edit_article']);
				return $this->_notification($this->articlemodel->update_article($article_id,$edited),'Article Updated Successfully',"Can't Update Article, Please Try Again" );
			}
			else
			{
				$article=$this->articlemodel->find_article($article_id);
				$this->load->view('admin/edit_article',['article'=>$article]);
			}
		}
	}
		

	public function delete_article($article_id)
	{
		return $this->_notification($this->articlemodel->delete_article($article_id), 'Article Deleted Successfully', "Can't Delete Article, Please Try Again " );

	}


	public function article($id)
		{
			$this->load->helper('form');
			$articles = $this->articlemodel->find($id);
			$this->load->view('admin/article_view', compact('articles'));
		}


	private function _notification($condition,$success_message, $failure_message)
	{
		if($condition)
		{
				$this->session->set_flashdata('notification', $success_message);
					$this->session->set_flashdata('notification_class','alert-success');
				}else{
					$this->session->set_flashdata('notification',$failure_message);
					$this->session->set_flashdata('notification_class','alert-danger');
				}
				return redirect('admin/dashboard');
		}
}
?>