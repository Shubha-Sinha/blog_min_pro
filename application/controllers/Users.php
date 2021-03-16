<?php
class Users extends MY_Controller
{
    public function index()
    {
        $this->load->model('Login_Model', 'user');
        $this->load->library('pagination');

        $config['base_url'] = base_url('Users/index');
        $config['total_rows'] = $this->user->total_num_rows();
        $config['per_page'] = 2;

        $this->pagination->initialize($config);
        $blog = $this->user->total_blogList($config['per_page'], $this->uri->segment(3));
        $this->load->view('Users/blogList', compact('blog'));
    }
}
