<?php
defined('BASEPATH') OR exit('No direct script access allowed');
interface IAuthenticator{
    
    function SetAuthOptions();
    function GetAuthOptions();
    function OnFailedAuthentication();
    function OnAfterAuthentication();
}
interface IUsePasswordField{
    function SetPassword($password);
}
class Ext_Controller extends CI_Controller{    
    protected $cfg = array();
    protected $cred = array();
    
    public function ParsePostData(EntityModel &$obj){
        $postarr = $this->input->post(null);
        $data = array();
        foreach ($postarr as $key=>$value){
            if(is_numeric(strpos($key, "form-"))){
                $tkey = str_replace("form-", "", $key);
                $data[$tkey] = $value;
            }
        }
        
        $obj->Parse($data);
    }
    
    public function ParseGetData(EntityModel &$obj){
        $postarr = $this->input->get(null);
        $data = array();
        foreach ($postarr as $key=>$value){
            if(is_numeric(strpos($key, "urd-"))){
                $tkey = str_replace("urd-", "", $key);
                $data[$tkey] = $value;
            }
        }
        
        $obj->Parse($data);
    }
    
    public function GetAuthOptions(){
        return $this->cred;
    }
    protected function RequireLogin($methodname){
        $this->SetCredential($methodname, true);
    }
    protected function RequireUserLevel($methodname,$level){
        $this->SetCredential($methodname, true, $level);
    }
    protected function SetCredential($methodname,$requirelogin = true,$userlevel = 1){
        $this->cred[$methodname]['authenticate'] = $requirelogin;
        $this->cred[$methodname]['level'] = $userlevel;
    }
}