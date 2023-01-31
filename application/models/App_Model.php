<?php

class App_Model extends CI_Model {
    public function is_admin_exists($email, $password){
        $this->db->select("*");
        $this->db->from(tbl_users());
        $this->db->where(array("email" => $email, "password" => md5($password)));
        
        $query = $this->db->get();
        // print_r(array("email" => $email, "password" => md5($password)));
        // echo $this->db->last_query(); die;
        $result = $query->row();

        if(!empty($result))
            return true;
        else
            return false;
    }

    public function save_resource_data($table_name, $data=array()){
        $this->db->insert($table_name, $data);
        return true;
    }

    public function buyer_information_data($table_name, $data=array()){
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    public function save_orders($table_name, $data = array()){
        $this->db->insert_batch($table_name, $data);
        return true;
    }

    public function get_order_products($buyer_id)
    {
        $this->db->select("SUM(quantity) as total_products, SUM(total_amount) as total_amount");
        $this->db->from(tbl_orders());
        $this->db->where("buyer_id", $buyer_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_order_product_list($buyer_id)
    {
        $this->db->select("product.name,product.amount,order.quantity,order.total_amount");
        $this->db->from(tbl_orders()." as order ");
        $this->db->join(tbl_products()." as product ", "product.id = order.product_id", "inner");
        $this->db->where([
            "buyer_id" => $buyer_id
        ]);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_resource_data($table_name, $conditions = array()){
        $this->db->select("*");
        $this->db->from($table_name);
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_category_data($category_id){
        $this->db->select("*");
        $this->db->where('id', $category_id);
        $this->db->from(tbl_categories());
        $query = $this->db->get();
        return $query->row();
    }

    public function get_brand_data($brand_id)
    {
        $this->db->select("*");
        $this->db->where('id', $brand_id);
        $this->db->from(tbl_brands());
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_resource_data($table_name, $data, $conditions){
        $this->db->where($conditions);
        $result = $this->db->update($table_name, $data);
        return true;
    }
    
    public function delete_resource_data($table_name, $conditions)
    {
        $result = $this->db->delete($table_name, $conditions);
        return true;
    }

    public function get_category_name_by_id($category_id)
    {
        $this->db->select("*");
        $this->db->where(array("id" => $category_id));
        $this->db->from(tbl_categories());
        $query = $this->db->get();
        return $query->row();
    }

    public function get_admin_details($email)
    {
        $this->db->select("*");
        $this->db->from(tbl_users());
        $this->db->where([
            "email" => $email
        ]);
        $query = $this->db->get();
        return $query->row();
    }

    public function is_option_exists($option_name)
    {
        $this->db->select("*");
        $this->db->from(tbl_options());
        $this->db->where([
            "option_name" => $option_name
        ]);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_option_value($option_name, $option_value)
    {   
        $this->db->where("option_name", $option_name);
        $this->db->update(tbl_options(), array(
            "option_value" => $option_value
        ));
        return true;
    }

    public function insert_option_value($option_name, $option_value)
    {
        $this->db->insert(tbl_options(), array(
            "option_name" => $option_name,
            "option_value" => $option_value,
        ));
        return true;
    }
}