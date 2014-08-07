<?php
event::register("killDetail_context_assembling", "api_verified::add");

class api_verified {
	function add($page)
	{
		$page->addBehind("points", "api_verified::show");
	}
  
  function show(){
  	global $smarty;
 		include_once('mods/api_verified_mod/api_verified.php');
  	$html .= $smarty->fetch("../../../mods/api_verified_mod/api_verified.tpl");
    return $html;
  }
}
?>
