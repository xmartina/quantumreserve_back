<div class="bd-wrapper px-4 px-sm-1 h-100">
	<div class="container ">
		<div class="row my-5 my-sm-2">
			<!--			form container-->
			<div class="col-lg-6 px-0 mx-0 my-5 my-sm-2 bg-white">
				<div class="card">
					<div class="card-header bg-white d-flex align-items-end">
						<img src="https://dashboard.quantumreserve.online/uploads/21.png" alt="" class="logo-img"> <div class=" d-flex align-items-center px-3 py-2 mx-2  logo-info">INVESTMENT</div>
					</div>
					<div class="card-body">
						<div class="mb-5">
							<h3 class="font-weight-bolder">
								Welcome Prestigious User !
							</h3>
							<p class="login-info-2">use the form below to log in to your account</p>
						</div>

						<div class="ext-link-wrap mx-auto mb-3">
							<div class="row ddd gx-5">
								<div class="col-5 px-2 bg-light py-2 mr-2 d-flex justify-content-between align-items-center">
									<div class="mr-3"><span class="material-symbols-outlined m-0 p-0">account_circle</span></div>
									<div class="m-0 pb-1">

										<a href="<?php echo base_url("signup") ?>" class="text-dark m-0 p-0"><?php echo lang("create_account") ?>
										</a>
									</div>
									<div class="m-0 p-0">
										<span class="material-symbols-outlined">chevron_right</span>
									</div>
								</div>
								<div class="col-6 px-2 ml-2 bg-light py-2 d-flex justify-content-between align-items-center">
									<div class="mr-3"><span class="material-symbols-outlined">warning</span></div>
									<div class="m-0 pb-1">

										<a href="<?php echo base_url('forgotPassword'); ?>" class="text-dark m-0 p-0">Recov Account</a>
									</div>
									<div class="m-0 p-0">
										<span class="material-symbols-outlined">chevron_right</span>
									</div>
								</div>
							</div>
						</div>

						<?php
						$this->load->helper('form');
						$error = $this->session->flashdata('error');
						if($error)
						{ ?>
							<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none"
								 role="alert">
								<?php echo $this->session->flashdata('error'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						<?php } ?>
						<?php
						$success = $this->session->flashdata('success');
						if($success)
						{
							?>
							<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none"
								 role="alert">
								<?php echo $this->session->flashdata('success'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						<?php } ?>
						<?php echo validation_errors('<div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">', ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>'); ?>

						<?php echo form_open(base_url( 'login' ), array( 'id' => 'loginForm' ));?>
						<div class="email-pass">
							<div class="errorClass">
								<label class="error" id="overallError"></label>
							</div>
							<div class="mb-3">
								<label for="username" class="form-label"><?php echo lang("email_address") ?></label>
								<input type="email" class="form-control" aria-describedby="email-1" name="email" id="email-1"
									   placeholder="<?php echo lang("email") ?>" value="<?=set_value('email')?>">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label"><?php echo lang("password") ?></label>
								<input type="password" class="form-control" name="password" id="password-1"
									   placeholder="<?php echo lang("password") ?>" value="<?=set_value('password')?>">
							</div>
							<div class="mb-3">
								<input type="checkbox" name="stay_logged_in" class="form-check-input" id="checkbox-1" value="agree">
								<label for="remember_me" class="form-check-label"><?php echo lang("keep_me_logged_in") ?></label>
							</div>

							<!-- /form group -->
							<?php if($companyInfo['google_recaptcha'] != 0) {?>
								<?php if($companyInfo['recaptcha_version'] == 'v2') {?>
									<input type="hidden" name="g-recaptcha-response">
									<div class="g-recaptcha" style="margin-bottom: 15px;" data-sitekey="<?php echo $recaptchaInfo->public_key; ?>"></div>
								<?php } else if($companyInfo['recaptcha_version'] == 'v3') {?>
									<input type="hidden" class="g-recaptcha" name="recaptcha_response" id="recaptchaResponse">
								<?php }?>
							<?php }?>
						</div>
						<div class="hide" id="google-auth">
							<!-- Form Group -->
							<div class="form-group">
								<div id="divOuter" class="<?php echo $companyInfo['two_factor_auth'] == 'Authy' ? 'authydivOuter' : ''; ?>">
									<div id="divInner">
										<input id="partitioned" class="<?php echo $companyInfo['two_factor_auth'] == 'Authy' ? 'authypartitioned' : ''; ?>" name="token" type="text" maxlength="<?php echo $companyInfo['two_factor_auth'] == 'Authy' ? '7' : '6'; ?>" />
										<label class="error google-auth-err"></label>
									</div>
								</div>
							</div>
						</div>


						<button type="button" id="confirm-user-pass" class="btn btn-primary text-uppercase mb-4 w-75" data-loading-text="<?php echo lang('processing_data') ?>" data-title="<?php echo lang("login") ?>"><?php echo lang("login") ?></button>
						<button type="button" id="authenticate" class="hide btn btn-primary text-uppercase mb-4 w-75"><?php echo lang("login") ?></button>

						<div class="py-3"></div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 d-none d-lg-block d-xl-block bg-dark dd mx-0 px-0">
				<div class="login-head my-5 p-4 d-flex align-items-center flew-column justify-content-center text-center">
					<div class="who-we">who we are</div>
					<h3 class="">we are investment</h3>
					<div class="px-5 ac justify-self-end align-self-end">
						<img src="https://affirm.uicore.co/business-consultant/wp-content/uploads/sites/2/2021/09/business-consultant-side-2.webp" alt="" class="h-auto w-100 rounded">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('/assets/dist/js/login.js') ?>"></script>
