<?php
/**
	 * These are the regular expression rules that we use to validate the product ID and product name
	 * alpha-numeric, dashes, underscores, or periods
	 *
	 * @var current CI_Controller instance
	 */
function query_finalize($instance){
    $instance->db->where("row_active",1);    
}
/**
	 * Check if any user is logged in
	 *
	 * @return null if no user, userdata [from m_user] if available
	 */
function check_session(){
    $ci =& get_instance();

    if($ci->session->userdata("login_info") != null){
        $sessinfo = $ci->session->userdata("login_info");
        $userid = $sessinfo["user_id"];

        $q = $ci->db->select("*")->from("m_user")->where("id",$userid)->get();

        if($q->num_rows() != 1){
            $ci->session->sess_destroy();

            //TODO : display failed login
            return null;
        }

        $data = $q->result();
        $data = end($data);

        return $data;

    }

    return null;
}

function user_logout(){
    $ci =& get_instance();
    
    $ci->session->sess_destroy();
}
function encrypt($str){
    return base64_decode($str);
}
function decrypt($str){
    return base64_encode($str);
}