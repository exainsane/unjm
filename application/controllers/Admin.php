<?php

/*
 * Created by Exairie
 * Use of this script should be followed by knowledge of the author
 * Any application created by using this file shall be acknowledged
 * by the author
 * 2016 Exairie
 */

/**
 * Description of Admin
 *
 * @author exain
 */
class Admin extends Ext_Controller {
    function __construct() {
        parent::__construct();
        
        $this->SetHeaderAndFooter("admin/header", "admin/footer");
    }
    function index(){
        $this->LoadUI("admin/pages/default");
    }
    function about($action = null, $id = null, $save = null){                  
        if($action == null){
            return $this->about_home();
        }
        
        $IOManager = new IOManager($this);
        $IOManager->Table("ui_about")
                ->IdFieldOnTable("id")
                ->PostTo(site_url("admin/contact/".$action."/".($action == "new"?1:$id)."/save"))
                ->RedirectTo(site_url("admin/about"))
                ->ViewOnAdd("admin/io/about");
                
        if($action == "edit" || $action == "new"){
            $data = new ModelUIAbout();
            
            if($action == "edit" && $save == null){
                $data->SetID(decrypt($id, true));
                $data->Parse(singlerow($data->ExactQuery()));                
            }else if($action == "edit" && $save == "save"){
                $this->ParsePostData($data);
            }
            
            $IOManager->SetMode($action)
                    ->Data($data);
            
            if($save == null){
                $IOManager->Show();
            }else if($save == "save"){
                $IOManager->Execute();
            }
            
            return;
        }        
        
        if($action == "delete"){
            $IOManager->UseID(base64_decode($id))
                    ->Execute();
        }
    }    
    private function about_home(){
        $q = $this->db->get("ui_about");
        $this->SetUIData("about",$q->result());
        $this->LoadUI("admin/pages/about");
    }
    
    function contact($action = null, $id = null, $save = null){                  
        if($action == null){
            return $this->contact_home();
        }
        
        $IOManager = new IOManager($this);
        $IOManager->Table("ui_contact")
                ->IdFieldOnTable("id")
                ->PostTo(site_url("admin/contact/".$action."/".($action == "new"?1:$id)."/save"))
                ->RedirectTo(site_url("admin/contact"))
                ->ViewOnAdd("admin/io/contact");
                
        if($action == "edit" || $action == "new"){
            $data = new ModelUIContact();
            
            if($action == "edit" && $save == null){
                $data->SetID(decrypt($id, true));
                $data->Parse(singlerow($data->ExactQuery()));                
            }else if($save == "save"){
                $this->ParsePostData($data);
            }
            
            $IOManager->SetMode($action)
                    ->Data($data);
            
            if($save == null){
                $IOManager->Show();
            }else if($save == "save"){
                $IOManager->Execute();
            }
            
            return;
        }        
        
        if($action == "delete"){
            $IOManager->UseID(base64_decode($id))
                    ->Execute();
        }
    }    
    private function contact_home(){
        $q = $this->db->get("ui_contact");
        $this->SetUIData("contact",$q->result());
        $this->LoadUI("admin/pages/contact");
    }
    
    function testimoni($action = null, $id = null, $save = null){                  
        if($action == null){
            return $this->testimoni_home();
        }
        
        $IOManager = new IOManager($this);
        $IOManager->Table("ui_testimoni")
                ->IdFieldOnTable("id")
                ->PostTo(site_url("admin/testimoni/".$action."/".($action == "new"?1:$id)."/save"))
                ->RedirectTo(site_url("admin/testimoni"))
                ->ViewOnAdd("admin/io/testimoni");
                
        if($action == "edit" || $action == "new"){
            $data = new ModelUITestimoni();
            
            if($action == "edit" && $save == null){
                $data->SetID(decrypt($id, true));
                $data->Parse(singlerow($data->ExactQuery()));                
            }else if($save == "save"){
                $this->ParsePostData($data);
            }
            
            $IOManager->SetMode($action)
                    ->Data($data);
            
            if($save == null){
                $IOManager->Show();
            }else if($save == "save"){
                $IOManager->Execute();
            }
            
            return;
        }        
        
        if($action == "delete"){
            $IOManager->UseID(base64_decode($id))
                    ->Execute();
        }
    }    
    private function testimoni_home(){
        $q = $this->db->get("ui_testimoni");
        $this->SetUIData("contact",$q->result());
        $this->LoadUI("admin/pages/contact");
    }
}
