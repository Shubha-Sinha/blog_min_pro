<?php
class Admin extends MY_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     if ($this->session->userdata('user_id')) {
    //         return redirect('admin/welcome');
    //     }
    // }
    #***///////// Auth //////////*** 
    protected function auth()
    {
        if (!$this->session->userdata('user_id')) {
            return redirect('Admin/login');
        }
    }
    /////////////// LOGIN  ///////////////////
    public function login()
    {   #///////// Auth //////////
        if ($this->session->userdata('user_id')) {
            return redirect('admin/welcome');
        }
        // ***** Form validation *****
        $this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[4]|max_length[25]');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[4]|max_length[20]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            // ***** take input data by post method *****
            $uname = $this->input->post('uname');
            $pass = md5($this->input->post('pass'));
            // ***** check uname and pass *****
            $this->load->model('Login_Model');
            $id = $this->Login_Model->isValid($uname, $pass);
            if ($id) {
                // ***** Set session variable *****
                // $this->session->set_userdata('username', $uname);
                $this->session->set_userdata('user_id', $id);
                return redirect('Admin/welcome');
            } else {
                $this->session->set_flashdata('login_failed', ' Invalid login credentials');
                //('key','value')
                return redirect('Admin/login');
            }
        } else {
            $this->load->view('Admin/loginV');
        }
    }
    /////////////// DASHBOARD  ///////////////////
    public function welcome()
    {
        $this->auth();
        $this->load->model('Login_Model');
        ///////// pagination /////////////
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('Admin/welcome'),
            'per_page' => 3,
            'total_rows' => $this->Login_Model->num_rows(),
            // ----------/////////////////////////////////////
            // 'num_links' => 2,
            // 'use_page_numbers' => true,
            // 'page_query_string' => true,
            // 'full_tag_open' => '<p class="pagination">',
            // 'full_tag_close' => '</p>',

            // 'first_link' => 'First',
            // 'first_tag_open' => '<div>',
            // 'first_tag_close' => '</div>',

            // 'last_link' => 'Last',
            // 'last_tag_open' => '<div>',
            // 'last_tag_close' => '</div>',

            // 'next_tag_open' => '<div>',
            // 'next_tag_close' => '</div>',
            // 'prev_tag_open' => '<div>',
            // 'prev_tag_close' => '</div>',

            // 'cur_tag_open' => '<b>',
            // 'cur_tag_close' => '</b>',

            // 'num_tag_open' => '<div>',
            // 'num_tag_close' => '</div>',
            // 'cur_tag_open' => '<div>',
            // 'cur_tag_close' => '</div>'

        ];
        $this->pagination->initialize($config);

        // *****************************
        $blogs = $this->Login_Model->blogList($config['per_page'], $this->uri->segment(3));
        $this->load->view('Admin/dashboard', ['blogs' => $blogs]); // pass *key(blogs)=>value($blogs)
    }

    function logout()
    {
        $this->session->unset_userdata('user_id');
        return redirect('Admin/login');
    }
    //*************/ Blog Part/*************** 
    function add_blog()
    {
        $this->auth();
        $this->load->view('Admin/add_new_blog');
    }
    function blog_validation()
    {
        $this->auth();
        ////////// img valid /////////////
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '1000';

        $this->load->library('upload', $config);

        //////////////////////////////////
        if ($this->form_validation->run('add_rules') && $this->upload->do_upload('img_upload')) {
            $post = $this->input->post(); //by this we will get all post data in array,and we can store it in one variable.
            $data = $this->upload->data();
            // echo "<pre>";
            // print_r($data);
            // exit;
            $img_path = base_url("upload/" . $data['raw_name'] . $data['file_ext']);
            $post['image_path'] = $img_path;
            $this->load->model('Login_Model', 'addBlog');
            if ($this->addBlog->add_blog($post)) {
                $this->session->set_flashdata('msg', 'Blog successfully added');
                $this->session->set_flashdata('msg_class', 'alert alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Upload unsuccessful. please try again.');
                $this->session->set_flashdata('msg_class', 'alert alert-danger');
            }
            return redirect('Admin/welcome');
        } else {
            $upload_error = $this->upload->display_errors();
            $this->load->view('Admin/add_new_blog', compact('upload_error'));
        }
    }

    function edit_blog()
    {
        $this->auth();
        $blog_id = $this->input->post('blog_id');
        $this->load->model('Login_Model', 'editBlog');
        $res = $this->editBlog->edit_Blog($blog_id);
        $this->load->view('Admin/edit_blog', ['blog' => $res]);
    }
    function update_blog()
    {
        $this->auth();
        if ($this->form_validation->run('add_rules')) {
            $post = $this->input->post();
            $blog_id = $post['blog_id'];
            $this->load->model('Login_Model', 'updateBlog');
            if ($this->updateBlog->update_blog($blog_id, $post)) {
                $this->session->set_flashdata('msg', 'Blog successfully updated');
                $this->session->set_flashdata('msg_class', 'alert alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Update unsuccessful. please try again.');
                $this->session->set_flashdata('msg_class', 'alert alert-danger');
            }
            return redirect('Admin/welcome');
        } else {
            $this->load->view('Admin/edit_blog');
        }
    }

    function delete_blog()
    {
        $this->auth();
        $blog_id = $this->input->post('blog_id');
        $this->load->model('Login_Model', 'delBlog');
        if ($this->delBlog->del_Blog($blog_id)) {
            $this->session->set_flashdata('msg', 'Blog successfully deleted');
            $this->session->set_flashdata('msg_class', 'alert alert-success');
        } else {
            $this->session->set_flashdata('msg', 'delete unsuccessful. please try again.');
            $this->session->set_flashdata('msg_class', 'alert alert-danger');
        }
        return redirect('Admin/welcome');
    }
    /////////////// User Register  ///////////////////
    function register()
    {
        $this->load->view('Admin/register');
    }

    // **************************************
    function formData()
    {
        // ***** Form validation *****
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|alpha|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|alpha|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[4]|max_length[25]');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            // ***** take input data by post method *****
            $new_user = [
                'username' => $this->input->post('uname'),
                'password' => md5($this->input->post('pass')),
                'f_name' => $this->input->post('fname'),
                'l_name' => $this->input->post('lname'),
                'email' => $this->input->post('email')
            ];
            // ***** Add new user *****
            $this->load->model('Login_Model', 'addUser');
            if ($this->addUser->add_user($new_user)) {

                $this->session->set_flashdata('user', 'Register successful');
                $this->session->set_flashdata('msg_class', 'alert alert-success');
            } else {

                $this->session->set_flashdata('user', 'Register unsuccessful. please try again.');
                $this->session->set_flashdata('msg_class', 'alert alert-danger');
            }
            return redirect('Admin/register');

            // ***** Send email *****
            $this->load->library('email');
            $this->email->from('shubhasinha77@gmail.com', 'Shubha Sinha');
            $this->email->to($new_user['email']);
            $this->email->subject('Here is your info ' . $new_user['f_name'] . ' ' . $new_user['l_name']);
            $this->email->message('Hi ' . $new_user['f_name'] . ' ' . $new_user['l_name'] . ' Here is the info you requested.');

            $this->email->send();
            if ($this->email->send()) {
                show_error($this->email->print_debugger());
            } else {
                echo "your email has been sent.";
            }
        } else {
            $this->load->view('Admin/register');
        }
    }
}
