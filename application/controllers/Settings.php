<?php

    class Settings extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("app_model");
        }

        public function index(){
            echo "This is sample message from Settings Controller";
        }

        public function profile_settings(){
            if($this->session->userdata("is_active") == 1){
                $data = array("page_content" => "pages/profile-settings");
                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }

        public function save_profile_data()
        {
            $name = $this->input->post("txt_name");
            $email = $this->input->post("txt_email");
            $password = $this->input->post("txt_password");

            $max_size = 1024;
            $max_width = 2048;
            $max_height = 1000;
            $allowed_types = "jpg|png|jpeg|gif";

            $image_attributes = get_option_value("product_image_settings");
            if(!empty($image_attributes)){
                $image_attributes = unserialize($image_attributes);
                $max_width = $image_attributes['width'];
                $max_size = $image_attributes['size'];
                $max_height = $image_attributes['height'];
                $allowed_types = implode("|", $image_attributes['extensions']); 
            }

            //image config
            $config["upload_path"] = "./assets/product-image";
            $config["allowed_types"] = $allowed_types;
            $config["max_size"] = $max_size;
            $config["max_width"] = $max_width;
            $config["max_height"] = $max_height;

            $this->load->library("upload", $config);
            $profile_image = "";

            if(isset($_FILES['file_image']) && !empty($_FILES['file_image'])){
                if($this->upload->do_upload("file_image")){
                    $file_arr = $this->upload->data();
                    $profile_image =  base_url()."assets/product-image/".$file_arr['file_name'];
                }else{
                    $display_errors = $this->upload->display_errors();
                }
            }

            $user_info = array(
                "name" => $name,
                "email" => $email,
                "password" => md5($password),
                "image" => $profile_image
            );

            if($this->app_model->edit_resource_data(tbl_users(), $user_info, array("email" => $this->session->userdata("email")))){
                // $this->session->set_userdata("email", $email);
                // $this->session->set_userdata("name", $name);
                // $this->session->set_userdata("image", $profile_image);
                $this->session->set_flashdata("success", "Profile Updated Successfully, to see updated information Signout Please.");   
            }else{
                $this->session->set_flashdata("error", "Failed to Update Profile");   
            }
            redirect("admin/profile-settings/");

        }

        public function currency_settings(){
            if($this->session->userdata("is_active") == 1){

                $currencies = $this->app_model->get_resource_data(tbl_currencies(), array("status" => 1));

                $data = array(
                    "page_content" => "pages/currency-settings",
                    "currencies" => $currencies
                );

                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }

        public function save_currency_settings()
        {
            $currency = $this->input->post("dd_currency");
            if(!empty($this->app_model->is_option_exists("site_currency"))){
                $this->app_model->update_option_value("site_currency", $currency);
                $this->session->set_flashdata("success", "Currency Updated Successfully");   
            }else{
                $this->app_model->insert_option_value("site_currency", $currency);
                $this->session->set_flashdata("success", "Currency Saved Successfully");   
            }
            redirect("admin/currency-settings");
        }

        public function product_image_settings(){
            if($this->session->userdata("is_active") == 1){
                $data = array("page_content" => "pages/product-image-settings");
                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }

        public function save_product_image_settings()
        {
            $width = $this->input->post("txt_width");
            $height = $this->input->post("txt_height");
            $size = $this->input->post("txt_max_size");

            $extensions = $this->input->post("chk_ext");

            $image_settings = array(
                "width" => $width,
                "height" => $height,
                "size" => $size,
                "extensions" => $extensions
            );

            if(!empty($this->app_model->is_option_exists("product_image_settings"))){
                $this->app_model->update_option_value("product_image_settings", serialize($image_settings));
                $this->session->set_flashdata("success", "Image Settings Updated Successfully");   
            }else{
                $this->app_model->insert_option_value("product_image_settings", serialize($image_settings));
                $this->session->set_flashdata("success", "Image Settings Saved Successfully");   
            }
            redirect("admin/product-image-settings");
        }

        public function footer_settings(){
            if($this->session->userdata("is_active") == 1){
                $data = array("page_content" => "pages/footer-settings");
                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }

        public function save_footer_settings()
        {
            $link = $this->input->post("txt_link");
            $name = $this->input->post("txt_name");

            $footer_data = array(
                "link" => $link,
                "name" => $name
            );

            if(!empty($this->app_model->is_option_exists("site_footer_settings"))){
                $this->app_model->update_option_value("site_footer_settings", serialize($footer_data));
                $this->session->set_flashdata("success", "Footer Settings Updated Successfully");   
            }else{
                $this->app_model->insert_option_value("site_footer_settings", serialize($footer_data));
                $this->session->set_flashdata("success", "Footer Settings Saved Successfully");   
            }
            redirect("admin/footer-settings");

        }
    }