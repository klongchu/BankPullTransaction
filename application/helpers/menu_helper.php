<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('active_link')) {
  function activate_menu($controller) {
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    $class = $CI->router->fetch_class();
    return ($class == $controller) ? 'active' : '';
  }
  function activate_menu_li($controller) {
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    $class = $CI->router->fetch_class();
    return ($class == $controller) ? 'in' : '';
  }
  
  function activate_menu_sub($controller) {
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    $class = $CI->router->fetch_method();
    if(!$controller){
    	$controller = 'admin';
    	$class = 'admin';
    }
    return ($class == $controller) ? 'active' : '';
  }
  
  function activate_menu_c_m($controller,$controller2) {
    // Getting CI class instance.
    $CI1 = get_instance();
    // Getting router class to active.
    $class1 = $CI1->router->fetch_class();
    $CI2 = get_instance();
    // Getting router class to active.
    $class2 = $CI2->router->fetch_method();
    return ($class1 == $controller  and $class2 == $controller2) ? 'active opened' : '';
  }
  function activate_menu_sub2($controller,$controller2) {
    // Getting CI class instance.
    $obj =& get_instance();
    // Getting router class to active.
    $class = $obj->uri->segment(2);
    $class2 = $obj->uri->segment(3);
    return ($class == $controller and $class2 == $controller2) ? 'active' : '';
  }
  function activate_menu_sub3($controller) {
    // Getting CI class instance.
    $obj =& get_instance();
    // Getting router class to active.
     $class = $obj->uri->segment(3);
    return ($class == $controller) ? 'active' : '';
  }
  function activate_menu_sub4($controller,$controller2) {
    // Getting CI class instance.
    $obj =& get_instance();
    // Getting router class to active.
    $class = $obj->uri->segment(3);
    $class2 = $obj->uri->segment(4);
    return ($class == $controller and $class2 == $controller2) ? 'active' : '';
  }
  
////////////////////// End  
}