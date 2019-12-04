<?php
class Login extends CI_Controller
{
	public function index()
	{
        if ($this->session->userdata('user_id')) {
            return redirect('admin/dashboard');
        }
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}
	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		//$this->form_validation->set_rules('uname','Username','trim|required|alpha_numeric');
		//$this->form_validation->set_rules('pass','Password','trim|required|alpha_numeric');
		  if ($this->form_validation->run('admin_login') == FALSE)
                {
                        $this->load->view('public/admin_login');
                }else
                {
                	$username= $this->input->post('uname');
                    $password= $this->input->post('pass');
                    $this->load->model('loginmodel');
                    $id=$this->loginmodel->validateLogin($username,$password);

                    if($id>0)
                    {
                    	$this->session->set_userdata('user_id',$id);
                    	return redirect('admin/dashboard');
                    
                    
                    }else{
                        $this->session->set_flashdata('login_failed','Invalid Username/Password.');
                    	return redirect('login');
                    }
                }
	}
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        return redirect('login'); 
    }


    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
         if ($this->form_validation->run('register') == FALSE)
                {
                    $this->load->view('public/register');
                }else{
                        $data=$this->input->post();
                        unset($data['cpass']);
                        $this->load->model('loginmodel');
                        return $this->_notification($this->loginmodel->register($data),'User Registered Successfully',"Can't Create User, Please Try Again" );
                }
    }
    private function _notification($condition,$success_message, $failure_message)
    {
        if($condition)
        {
                $this->session->set_flashdata('notification', $success_message);
                    $this->session->set_flashdata('notification_class','alert-success');
                    return redirect('login/index');
                }else{
                    $this->session->set_flashdata('notification',$failure_message);
                    $this->session->set_flashdata('notification_class','alert-danger');
                    return redirect('login/register');
        }
    }
        
}
?>