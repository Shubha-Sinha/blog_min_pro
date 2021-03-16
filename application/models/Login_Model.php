<?php
class Login_Model extends CI_Model
{
    // //////////  Login model(user check) ///////////////
    public function isValid($username, $password)
    {
        $q = $this->db->where(['username' => $username, 'password' => $password])->get('user');
        if ($q->num_rows())
            return $q->row()->user_id;  #return true.
        else
            return false;
    }
    // ///////////////////// DASHBOARD /////////////////

    // ***************  pagination *********************
    function blogList($limit, $offset) //use for admin
    {
        $user_id = $this->session->userdata('user_id');
        $q = $this->db->select()
            ->from('blog')
            ->where(['user_id' => $user_id])
            ->limit($limit, $offset) // get rows by limit.
            ->get();
        return $q->result();
    }
    function num_rows() // use for pagination->get the total number of rows.
    {
        $user_id = $this->session->userdata('user_id');
        $q = $this->db->select()
            ->from('blog')
            ->where(['user_id' => $user_id])
            ->get();
        return $q->num_rows();
    }
    // ********************  USer **************************
    function total_num_rows() // use for pagination->get the total number of rows for user.
    {
        $q = $this->db->select()
            ->from('blog')
            ->get();
        return $q->num_rows();
    }

    function total_blogList($limit, $offset) //use for user
    {
        $q = $this->db->select()
            ->from('blog')
            ->limit($limit, $offset) // get rows by limit.
            ->get();
        return $q->result();
    }

    // ***************  pagination end *********************
    function add_blog($array)
    {
        return $this->db->insert('blog', $array);
    }
    function add_user($array)
    {
        return $this->db->insert('user', $array);
    }
    function edit_Blog($blog_id)
    {
        $q = $this->db->select(['blog_title', 'blog_content', 'blog_id'])
            ->from('blog')
            ->where(['blog_id' => $blog_id])
            ->get();
        return $q->row();
    }
    function update_blog($blog_id, $new_data)
    {
        return $this->db->where('blog_id', $blog_id)
            ->update('blog', $new_data);
    }
    function del_Blog($id)
    {
        return $this->db->delete('blog', ['blog_id' => $id]);
    }
}
