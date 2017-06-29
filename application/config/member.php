<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$member_id =  $this->session->userdata('member_id');
		if(!$member_id){
			redirect('', 'refresh');
		}
