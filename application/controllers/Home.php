<?php

/*
 * Created by Exairie
 * Use of this script should be followed by knowledge of the author
 * Any application created by using this file shall be acknowledged
 * by the author
 * 2016 Exairie
 */

/**
 * Description of Home
 *
 * @author exain
 */
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $dbm = new BaseDBModel();
        $dbm->getTable("m_user", array(30,0), "Try Searching");
    }
}
