<?php
 

$sys_logo = "assets/img/logo.png";
$each_bank = $this->Main_model->fetch_list_bank();
?>
<?php
$member_id = $this->session->userdata('member_id');
$s_seclect = array('*'); 
$s_conditions['where'] = array('id'=>$member_id); 
$s_order_by = array('id'=>'desc'); 
$member_profile = $this->Main_model->row_data("tbl_member",$s_seclect,$s_conditions,$s_order_by);
$profile_img = "uploads/profile/".($member_profile->s_img != NULL ? $member_profile->s_img : 'no-image.png');
$admin_title = ($member_profile->i_level == 1 ? "Admin":"Adminuser");
?>
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
          <div class="mm-logo-buttons-w">
            <a class="mm-logo" href="<?=base_url('');?>"><?=img($sys_logo);?><span><?=$this->session->userdata('wc_title');?></span></a>
            <div class="mm-buttons">
              <!--<div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
              </div>-->
              <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
              </div>
            </div>
          </div>
          <div class="menu-and-user">
            <div class="logged-user-w">
              <div class="avatar-w"><?=img($profile_img);?></div>
              <div class="logged-user-info-w">
                <div class="logged-user-name"><?=$member_profile->s_display_name;?></div>
                <div class="logged-user-role"><?php  echo $admin_title ; ?></div>
              </div>
            </div>
            <ul class="main-menu">
              <li>
                <a href="<?=base_url();?>">
                  <div class="icon-w">
                    <div class="os-icon os-icon-window-content"></div>
                  </div>
                  <span>Dashboard</span>
                </a>
              </li>
              <?php
              $ls = $this->input->get('ls');
              if($ls != 1){
              foreach($each_bank as $data){
              ?>
              <li>
                <a href="<?=base_url('bank/name/'.$data->id);?>">
                  <div class="icon-w">
                    <img src="<?=base_url('uploads/bank/'.$data->s_icon.'');?>" width="35" class="avatar-w" style="border-radius: 50px;"/>
                  </div>
                  <span><?=$data->s_name;?></span>
                </a>
              </li>
              <?php }} ?>
              
 
 
              <?php
              if($this->session->userdata('i_level') == 1){
								?>
							<li>
                <a href="<?=base_url('member/member_list');?>">
                  <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle"></div>
                  </div>
                  <span>Member List</span>
                </a>
              </li>	
								<?php
							}
              ?>
 
              <li>
                <a href="#" class="btnEditMember"  data-id="<?=$member_profile->id;?>"  data-i_level="<?=$member_profile->i_level;?>"  data-s_display_name="<?=$member_profile->s_display_name;?>"  data-s_nickname="<?=$member_profile->s_nickname;?>"  data-s_username="<?=$member_profile->s_username;?>"  data-s_password="<?=$member_profile->s_password;?>" data-s_img="<?=($member_profile->s_img != NULL ? $member_profile->s_img : 'no-image.png');?>" >
                  <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle2"></div>
                  </div>
                  <span>Profile</span>
                </a>
              </li>
              <li>
                <a href="<?=base_url('login/logout');?>">
                  <div class="icon-w">
                    <div class="os-icon os-icon-signs-11"></div>
                  </div>
                  <span>Logout</span>
                </a>
              </li>
            </ul>

          </div>
        </div>
        <div class="desktop-menu menu-side-w menu-activated-on-click">

          <div class="logo-w"><a class="logo" href="<?=base_url('');?>"><?=img($sys_logo);?><span><?=$this->session->userdata('wc_title');?></span></a></div>
          <div class="menu-and-user">
            <div class="logged-user-w">
              <div class="logged-user-i">
                <div class="avatar-w"><?=img($profile_img);?></div>
                <div class="logged-user-info-w">
                  <div class="logged-user-name"><?=$member_profile->s_display_name;?></div>
                  <div class="logged-user-role"><?php  echo $admin_title ; ?></div>
                </div>
                <div class="logged-user-menu">
                  <div class="logged-user-avatar-info">
                    <div class="avatar-w"><?=img($profile_img);?></div>
                    <div class="logged-user-info-w">
                      <div class="logged-user-name"><?=$member_profile->s_display_name;?></div>
                      <div class="logged-user-role">
                      <?php  echo $admin_title ; ?>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                  <ul>
                    
                    <li>

                    <a href="#" class="btnEditMember"  data-id="<?=$member_profile->id;?>"  data-i_level="<?=$member_profile->i_level;?>"  data-s_display_name="<?=$member_profile->s_display_name;?>"  data-s_nickname="<?=$member_profile->s_nickname;?>"  data-s_username="<?=$member_profile->s_username;?>"  data-s_password="<?=$member_profile->s_password;?>" data-s_img="<?=($member_profile->s_img != NULL ? $member_profile->s_img : 'no-image.png');?>">
                    <i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span>
                    </a>
                    </li>
                    
                    <li><a href="<?=base_url('login/logout');?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <ul class="main-menu">
              <li>
                <a href="<?=base_url();?>">
                  <div class="icon-w">
                    <div class="os-icon os-icon-window-content"></div>
                  </div>
                  <span>Dashboard</span>
                </a>
              </li>
              <?php
              $ls = $this->input->get('ls');
              if($ls != 1){
              foreach($each_bank as $data){
              ?>
              <li>
                <a href="<?=base_url('bank/name/'.$data->id);?>">
                  <div class="icon-w">
                    <img src="<?=base_url('uploads/bank/'.$data->s_icon.'');?>" width="35" class="avatar-w " style="border-radius: 50px;"/>
                  </div>
                  <span><?=$data->s_name;?></span>
                </a>
              </li>
              <?php 
              
              	} 
              } 
              
              ?>
              <?php
              if($this->session->userdata('i_level') == 1){
								?>
							<li>
                <a href="<?=base_url('member/member_list');?>">
                  <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle"></div>
                  </div>
                  <span>Member List</span>
                </a>
              </li>	
								<?php
							}
              ?>
              
              <li>
                <a href="<?=base_url('login/logout');?>">
                  <div class="icon-w">
                    <div class="os-icon os-icon-signs-11"></div>
                  </div>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>