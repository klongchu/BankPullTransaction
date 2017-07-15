<body class="auth-wrapper">
   <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
         <div class="logo-w"><a href="<?php echo base_url('login'); ?>">
         <img src="<?=base_url();?>assets/img/logo-login.png?v=1" width="170"/>
          </a></div>
         <h4 class="auth-header" style="display: none;">Login Form</h4>
         <form action="<?=base_url('login/validlogin');?>" method="post">
            <div class="form-group">
               <label for="s_username">Username</label><input class="form-control" placeholder="Enter your username" name="s_username" id="s_username" type="text">
               <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="form-group">
               <label for="s_password">Password</label><input class="form-control" placeholder="Enter your password" name="s_password" id="s_password" type="password">
               <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
               <button class="btn btn-primary" style="cursor: pointer;">Log me in</button>
               <div class="form-check-inline"><label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label></div>
            </div>
         </form>
      </div>
   </div>
</body>