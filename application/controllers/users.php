<?php
class Users extends CI_Controller{
    
    public function register(){
        if($this->session->userdata('logged_in')){
            redirect('home/index');
        }
        $this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
        
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            //Load view and layout
            $data['main_content'] = 'users/register';
            $this->load->view('layouts/main',$data);
        //Validation has ran and passed    
        } else {
           if($this->User_model->create_member()){
                $this->session->set_flashdata('registered', 'You are now registered, please log in');
                //Redirect to index page with error above
                redirect('home/index');
           }
        }
    }
    
}