<?php

    class Products extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("app_model");
        }

        public function index(){
            echo "This is sample message from Products Controller";
        }

        public function list_products($report = ""){
            $report_val = 0;
            if(!empty($report)){
                $report_val = 1;
            }

            if($this->session->userdata("is_active") == 1){
                $products = $this->app_model->get_resource_data(tbl_products());

                $data = array(
                    "page_content" => "pages/list-products",
                    "products" => $products,
                    "product_controller" => $this,
                    "report" => $report_val 
                );
                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }

        public function add_product_layout()
        {
            if($this->session->userdata("is_active") == 1){

                $categories = $this->app_model->get_resource_data(tbl_categories(), array("status" => 1));
                $data = array(
                    "page_content" => "pages/add-product",
                    "categories" => $categories
                );
                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }

        public function submit_add_product(){
            $data = $this->input->post();

            $category_id = $data["dd_add_product_category"];
            $brand_id = $data["dd_add_product_brand"];
            $product_name = $data["txt_name"];
            $description = $data["txt_description"];
            $amount = $data["txt_amount"];
            $status = $data["dd_status"];
            $opt_type = $data["opt_type"];


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
            $product_image = "";

            if($opt_type == "add"){
                if(isset($_FILES['file_image']) && !empty($_FILES['file_image'])){
                    if($this->upload->do_upload("file_image")){
                        $file_arr = $this->upload->data();
                        $product_image =  base_url()."assets/product-image/".$file_arr['file_name'];
                    }else{
                        $display_errors = $this->upload->display_errors();
                    }
                }
    
                $product_arr = array(
                    "name" => $product_name,
                    "description" => $description,
                    "amount" => $amount,
                    "status" => $status,
                    "category_id" => $category_id,
                    "image" => $product_image,
                    "brand_id" => $brand_id
                );
    
                if($this->app_model->save_resource_data(tbl_products(), $product_arr)){
                    $this->session->set_flashdata("success", "Product Added Successfully");   
                }else{
                    $this->session->set_flashdata("error", "Failed to Save Product");   
                }
                redirect("admin/products/add-product");
            }elseif($opt_type == "edit"){
                $edit_id = $data["edit_id"];

                if(isset($_FILES['file_image']) && !empty($_FILES['file_image'])){
                    if($this->upload->do_upload("file_image")){
                        $file_arr = $this->upload->data();
                        $product_image =  base_url()."assets/product-image/".$file_arr['file_name'];
                    }else{
                        $display_errors = $this->upload->display_errors();
                    }
                }

                if(empty($product_image)){
                    $product_arr = array(
                        "name" => $product_name,
                        "description" => $description,
                        "amount" => $amount,
                        "status" => $status,
                        "category_id" => $category_id,
                        "brand_id" => $brand_id
                    );
                }else{
                    $product_arr = array(
                        "name" => $product_name,
                        "description" => $description,
                        "amount" => $amount,
                        "status" => $status,
                        "category_id" => $category_id,
                        "image" => $product_image,
                        "brand_id" => $brand_id
                    );
                }
    
                if($this->app_model->edit_resource_data(tbl_products(), $product_arr, array("id" => $edit_id))){
                    $this->session->set_flashdata("success", "Product Edited Successfully");   
                }else{
                    $this->session->set_flashdata("error", "Failed to Edit Product");   
                }
                redirect("admin/products/edit-product/".$edit_id);
            }

        }

        public function get_category_name($category_id)
        {
            return $this->app_model->get_category_name_by_id($category_id);
        }

        public function get_brand_name($brand_id)
        {
            return $this->app_model->get_brand_data($brand_id);
        }

        public function edit_product_layout($product_id)
        {
            if($this->session->userdata("is_active") == 1){

                $categories = $this->app_model->get_resource_data(tbl_categories(), array("status" => 1));
                $product_info = $this->app_model->get_resource_data(tbl_products(), array("id" => $product_id));
                $brands = $this->app_model->get_resource_data(tbl_brands(), array("status" => 1));
                $data = array(
                    "page_content" => "pages/edit-product",
                    "categories" => $categories,
                    "product" => $product_info[0],
                    "brands" => $brands
                );
                $this->load->view('layout/main_layout', $data);
            }else{
                $this->load->view('pages/login');
            }
        }
    }