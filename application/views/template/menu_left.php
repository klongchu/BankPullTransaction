<?php
$profile_img = "assets/img/avatar1.jpg";
$sys_logo = "assets/img/logo.png";
$each_bank = $this->Main_model->fetch_list_bank();
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
                <div class="logged-user-name"><?=$this->session->userdata('s_display_name');?></div>
                <div class="logged-user-role">Administrator</div>
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
              <?php } ?>
              
 
 
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
                  <div class="logged-user-name"><?=$this->session->userdata('s_display_name');?></div>
                  <div class="logged-user-role">Administrator</div>
                </div>
                <div class="logged-user-menu">
                  <div class="logged-user-avatar-info">
                    <div class="avatar-w"><?=img($profile_img);?></div>
                    <div class="logged-user-info-w">
                      <div class="logged-user-name"><?=$this->session->userdata('s_display_name');?></div>
                      <div class="logged-user-role">Administrator</div>
                    </div>
                  </div>
                  <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                  <ul>
                    
                    <li><a href="<?=base_url('member/profile');?>"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                    
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
              <?php } ?>
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