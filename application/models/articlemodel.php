<?php 
class Articlemodel extends CI_MODEL
{
	public function articleList($limit,$offset)
	{
		$user_id=$this->session->userdata('user_id');
		$this->db->order_by('articles.id','DESC')
					->limit($limit,$offset);
		$articles= $this->db->get_where('articles',['user_id'=>$user_id]);
		return $articles->result();
		
	}
	public function add_article($array)
	{
		return $this->db->insert('articles',$array);
	}
	public function find_article($article_id)
	{
		$article= $this->db->select(['id','title','body','image'])
			->where('id',$article_id)
			->get('articles');
		return $article->row();
	}
	public function update_article($article_id,$array)
	{
		//print_r($article_id);die;
		return $this->db->where('id',$article_id)
						->update('articles',$array);
	}
	public function delete_article($article_id)
	{
		$this->db->where('id',$article_id);
		return $this->db->delete('articles');
	}

	public function num_rows()
	{
		$user_id=$this->session->userdata('user_id');
		$articles= $this->db->get_where('articles',['user_id'=>$user_id]);
		return $articles->num_rows();
		
	}
	public function all_rows()
	{
		$articles= $this->db->get('articles');
		return $articles->num_rows();
		
	}

	public function all_articleList($limit,$offset)
	{
		$this->db->order_by('articles.id','DESC')
					->limit($limit,$offset);
		$articles= $this->db->get('articles');
		return $articles->result();
		
	}

	public function search($query)
	{
		$q=$this->db->from('articles')
					->like('title',$query)
					->get();
		return $q->result();
	}
	public function find($id)
	{
		$result=$this->db->from('articles')
				->where(['id'=>$id])
				->get();
		if($result->num_rows())
			return $result->row();
		return false;
	}
} 

?>