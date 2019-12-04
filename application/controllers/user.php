<?php
class User extends CI_Controller
{
		public function  index()
		{
			$this->load->helper('form');
			$this->load->library('pagination');
			$config= [
					'base_url'=> base_url('user/index'),
					'per_page'=> 5,
					'total_rows'=> $this->articlemodel->all_rows(),
					'full_tag_open'=>'<ul class="pagination">',
					'full_tag_close'=>'</ul>',
					'next_tag_open'=>'<li class="page-item "><span class="page-link">',
					'next_tag_close'=>'</span></li>',
					'first_tag_open'=>'<li class="page-item"><span class="page-link">',
					'first_tag_close'=>'</span></li>',
					'first_link'=>'&laquo;',
					'last_tag_open'=>'<li class="page-item"><span class="page-link">',
					'last_tag_close'=>'</span></li>',
					'last_link'=>'&raquo;',
					'prev_tag_open'=>' <li class="page-item "><span class="page-link">',
					'prev_tag_close'=>'</span></li>',
					'num_tag_open'=>'<li class="page-item"><span class="page-link">',
					'num_tag_close'=>'</span></li>',
					'cur_tag_open'=>' <li class="page-item active"><span class="page-link">',
					'cur_tag_close'=>'</span></li>',

		];
		$this->pagination->initialize($config);
		$articles=$this->articlemodel->all_articleList($config['per_page'],$this->uri->segment(3));
			$this->load->view('public/articles_list',compact('articles'));
		}

		public function search()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('query','Search','required');
			if(!$this->form_validation->run())
			{
				 
			}else{
			$query=$this->input->post('query');
			$articles=$this->articlemodel->search($query);
			$this->load->view('public/search_results',compact('articles'));
		}
		}

		public function article($id)
		{
			$this->load->helper('form');
			$articles = $this->articlemodel->find($id);
			//print_r($articles);die;
			$this->load->view('public/article_detail', compact('articles'));
		}
}
?>