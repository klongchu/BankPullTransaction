<?php
session_start();
if($_SESSION[captcha][code] == $_POST[captcha]){
	echo 1;
}else{
	echo 0;
}