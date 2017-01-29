<?php

/* 
 * Created by Exairie
 * Use of this script should be followed by knowledge of the author
 * Any application created by using this file shall be acknowledged
 * by the author
 * 2016 Exairie
 */

class Entity extends CI_Model{
    
}
abstract class EntityModel{
    protected $_attrib = array();
    protected function SetModelCRUD(){
        $this->_attrib['model_crud'] = true;
    }
    protected function SetModelCRU(){
        $this->_attrib['model_crud'] = false;
    }
    protected function IsModelCRUD(){
        return !isset($this->_attrib['model_crud']) || $this->_attrib['model_crud'] = true;
    }
    public function GetIDField(){
        return $this->_attrib['key'];
    }
    public static function GetData($obj,$wherequery = null, $orderby = null, $limit = null){
        $data = array();        
        
        $ci =& get_instance();
        
        $table = $obj->_attrib['table'];
        
        $classname;
        $props;
        
        if(is_string($obj)){
            $classname = $obj;
            $props = get_class_vars($obj);
        }
        else
        {
            $classname = get_class($obj);
            $props = get_object_vars($obj);
        }
        
        //Unset Non-data properties
        unset($props['_attrib']);
        
        
        $ci->db->select("*")
                ->from($table);
        if($wherequery != null){
            $ci->db->where($wherequery);
        }
        
        if($orderby != null){
            $ci->db->order_by($orderby);
        }
        
        if($limit != null){
            $this->db->limit($limit[1],$limit[0]);
        }
        
        $ci->db->where("_enable",1);
        
        $q = $ci->db->get();
        
        foreach ($q->result() as $d){
            $obj = new $classname;
            
            foreach ($props as $key => $value){
                $obj->$key = $d->$key;
            }
            
            array_push($data, $obj);
        }
        
        return $data;
    }
    public function Delete(){
        $ci =& get_instance();
        
        $idk = $this->_attrib['key'];
        $id = null;
        
        if($this instanceof IUseEncodedID){
            $id = $this->GetID();
        }else{
            $id = $this->$idk;
        }
        
        $ci->db->from($this->_attrib['table'])
                ->where("id",$id);
        if($this->IsModelCRUD()){
            $ci->db->delete();
        }
        else{
            $ci->db->set("_enable",0)
                ->update();
        }
                
    }
    public function Insert(){
        $ci =& get_instance();
        
        $table = $this->_attrib['table'];
        
        $attrs = get_object_vars($this);
        
        unset($attrs[$this->_attrib['key']]);
        unset($attrs['_attrib']);
        
        $cols = "";
        $values = "";
        
//        $pos = 0; $lim = count($attrs) - 1;
        foreach ($attrs as $key => $value) {
            if($value == null) continue;
            $ci->db->set($key,$value);
//            $cols += $key;
//            $values += "'"+$value+"'";
//            
//            if($pos < $lim){
//                $cols += ",";
//                $values += ",";
//            }
        }
        $ci->db->from($table);
        return $ci->db->insert();
                
    }
    public function ExactQuery(){
        $ci =& get_instance();
        
        $attrs = get_object_vars($this);
                
        unset($attrs['_attrib']);
        
        $ci->db->select("*")
                ->from($this->_attrib['table']);
        
        if($this instanceof IUseEncodedID){
            $idfield = $this->GetIDField();
            
            $attrs[$idfield] = $this->GetID();
                        
        }
        
        foreach ($attrs as $key => $value) {            
            if($value == null) continue;
            
            $ci->db->where($key, $value);
        }        
        return $ci->db->get();
               
    }
    public function Parse($obj){       
        $attrs = get_object_vars($this);
        
        unset($attrs['_attrib']);
        
        if($this instanceof IUseEncodedID){           
            $idfield = $this->GetIDField();
            if(isset($obj->$idfield)){
                $this->SetID($obj->$idfield);
            }else if(isset($obj[$idfield])){
                $this->SetID($obj[$idfield]);
            }
            //We no longer use ID Field here, since its encoded
            unset($attrs[$idfield]);
        }
        
        foreach ($attrs as $key => $value){                        
            
            if(is_array($obj)){
                if(isset($obj[$key])){
                    $this->$key = $obj[$key];
                }
            }
            else if(is_object($obj)){
                if(isset($obj->$key)){
                    $this->$key = $obj->$key;
                }
            }
        }
        
        
    }
    public function Update(){
        $ci =& get_instance();
        
        $table = $this->_attrib['table'];
        
        $attrs = get_object_vars($this);
        
        unset($attrs[$this->_attrib['key']]);
        unset($attrs['_attrib']);
        
        $idk = $this->_attrib['key'];
        $id = null;
                
        if($this instanceof IUseEncodedID){            
            $id = $this->GetID();            
        }else{
            $id = $this->$idk;
        }        
        
        $cols = "";
        $values = "";        
        $set = 0;
        foreach ($attrs as $key => $value) {
            if($value == null) continue;
            $ci->db->set($key,$value);
            $set++;
        }
        if($set == 0 ) show_error ("Error updating Entity : 0 Fields changed!");
        $ci->db->from($table);
        $ci->db->where($this->_attrib['key'], $id);
        
        $ci->db->update();
    }
    function __construct($tablename,$keyid = "id"){
        $this->_attrib['table'] = $tablename;
        $this->_attrib['key'] = $keyid;
        $this->_attrib['model_crud'] = false;
    }
}



class AuthTokenModel extends EntityModel{
    public $id;
    public $for_user;
    public $token;
    public $valid_until;
    
    function __construct() {
        parent::__construct("t_auth_token");
        
        $this->SetModelCRUD();
    }
}

class model_user extends EntityModel implements IUsePasswordField{
    public $id;
    public $_enable;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $address;
    public $province;
    public $city;
    public $postal_code;
    public $profile_img;
    public $bio;
    public $motto;
    public $fbm_token;
    public $user_activated;
    public $last_active;
    
    function __construct() {
        parent::__construct("m_user");
    }

    public function SetPassword($password) {
        $this->password = md5($password);
    }

}

class ModelUIAbout extends EntityModel implements IUseEncodedID{
    function __construct() {
        parent::__construct("ui_about");
    }

    public function GetID() {
        return base64_decode($this->id);
    }

    public function SetID($id) {
        $this->id = base64_encode($id);
    }

    public $id;
    public $about;
}

class ModelUIContact extends EntityModel implements IUseEncodedID{
    public $id;
    public $name;
    public $email;
    public $message;
    function __construct() {
        parent::__construct("ui_contact");
    }
    public function GetID() {
        return decrypt($this->id);
    }

    public function SetID($id) {
        $this->id = encrypt($id);
    }

}
class ModelUIBlog extends EntityModel implements IUseEncodedID{
    public function GetID() {
        return decrypt($this->id);
    }

    public function SetID($id) {
        $this->id = encrypt($id);
    }

    function __construct(){
      parent::__construct("ui_blog");
   }   
   public $id;
   public $judul;
   public $des;
   public $img;
}
class ModelUIServices extends EntityModel implements IUseEncodedID{
    public function GetID() {
        return decrypt($this->id);
    }

    public function SetID($id) {
        $this->id = encrypt($id);
    }
   function __construct(){
      parent::__construct("ui_services");
   }   
   public $id;
   public $judul;
   public $des;
   public $icon;
}
class ModelUISlider extends EntityModel implements IUseEncodedID{
    public function GetID() {
        return decrypt($this->id);
    }

    public function SetID($id) {
        $this->id = encrypt($id);
    }
   function __construct(){
      parent::__construct("ui_slider");
   }   
   public $id;
   public $judul;
   public $des;
   public $class;
}
class ModelUITeam extends EntityModel implements IUseEncodedID{
    public function GetID() {
        return decrypt($this->id);
    }

    public function SetID($id) {
        $this->id = encrypt($id);
    }
   function __construct(){
      parent::__construct("ui_team");
   }   
   public $id;
   public $nama;
   public $des;
   public $img;
   public $job;
}
class ModelUITestimoni extends EntityModel implements IUseEncodedID{
    public function GetID() {
        return decrypt($this->id);
    }

    public function SetID($id) {
        $this->id = encrypt($id);
    }
   function __construct(){
      parent::__construct("ui_testimoni");
   }   
   public $id;
   public $judul;
   public $des;
   public $nama;
}
