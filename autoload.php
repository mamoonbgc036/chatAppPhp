<?php
function mamoon($className){
	include_once($className.".php");
}
spl_autoload_register("mamoon");
?>