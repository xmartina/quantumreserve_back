<div class="bd-wrapper px-4 px-sm-1 h-100">
	<div class="container ">
		<div class="row my-5 my-sm-2">
			<!--			form container-->
			<div class="col-lg-6 px-0 mx-0 my-5 my-sm-2 bg-white">
				<div class="card">
					<div class="card-header bg-white d-flex align-items-end">
						<img src="https://dashboard.quantumreserve.online/uploads/21.png" alt="" class="logo-img">
						<div class=" d-flex align-items-center px-3 py-2 mx-2  logo-info">INVESTMENT</div>
					</div>
					<div class="card-body">
						<div class="mb-5">
							<div class="signup-dd mb-3 d-flex justify-content-center px-3 py-2">Signup Page</div>
							<h3 class="font-weight-bolder">
								Welcome Prestigious User !
							</h3>
							<p class="login-info-2">use the form below to create an account</p>
						</div>

						<div class="ext-link-wrap mx-auto mb-3">
							<div class="row ddd gx-5">
								<div
									class="col-7 px-2 bg-light py-2 mr-2 d-flex justify-content-between align-items-center">
									<div class="mr-3"><span
											class="material-symbols-outlined m-0 p-0">account_circle</span></div>
									<div class="m-0 pb-1">
										<a href="<?php echo base_url("login") ?>"
										   class="text-dark m-0 p-0"><?php echo lang("login") ?></a>
									</div>
									<div class="m-0 p-0">
										<span class="material-symbols-outlined">chevron_right</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
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
							if($success){
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
						</div>

						<?php echo form_open(base_url( 'signup' ), array( 'id' => 'registerForm' ));?>
						<div class="mb-3">
							<div class="row">
								<div class="col-lg-6">
									<label for="username" class="form-label"><?php echo lang("first_name") ?></label>
									<input type="text" class="form-control" name="firstname" id="f-name"
										   aria-describedby="f-name" placeholder="<?php echo lang("first_name") ?>" value="<?=set_value('firstname')?>">
									<label class="error" id="firstname"></label>
								</div>
								<div class="col-lg-6">
									<label for="username" class="form-label"><?php echo lang("last_name") ?></label>
									<input type="text" class="form-control" name="lastname" id="l-name"
										   aria-describedby="l-name" placeholder="<?php echo lang("last_name") ?>" value="<?=set_value('lastname')?>">
									<label class="error" id="lastname"></label>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label"><?php echo lang("email_address") ?></label>
							<input type="email" class="form-control" name="email" id="email-1"
								   aria-describedby="email-1" placeholder="<?php echo lang("email") ?>" value="<?=set_value('email')?>">
							<label class="error" id="email"></label>
						</div>

						<?php if($companyInfo['require_phone_for_signup'] == 1) {?>
							<div class="mb-3">
								<label for="email" class="form-label">Phone Number</label>
								<input type="tel" value="<?=set_value('phonefull')?>" class="form-control" id="phoneit" aria-describedby="phone"
									   name="phone"
									   placeholder="Enter Phone">
								<label class="error" id="phone"></label>
							</div>
						<?php }?>

						<div class="mb-3">
							<div class="row">
								<div class="col-lg-6">
									<label for="password" class="form-label"><?php echo lang("password") ?></label>
									<input type="password" class="form-control" name="password" id="password-1"
										   placeholder="<?php echo lang("password") ?>" value="<?=set_value('password')?>">
									<label class="error" id="password"></label>
								</div>
								<div class="col-lg-6">
									<label for="password" class="form-label"><?php echo lang("confirm_password") ?></label>
									<input type="password" class="form-control" name="cpassword" id="password-2"
										   placeholder="<?php echo lang("confirm_password") ?>" value="<?=set_value('cpassword')?>">
									<label class="error" id="cpassword"></label>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label"><?php echo lang("referral_code") ?></label>
							<input type="password" class="form-control" name="ref" id="ref"
								   aria-describedby="ref" placeholder="<?php echo lang("referral_code") ?>" value="<?php echo $this->security->xss_clean($code) ?>">
						</div>

						<!--						terms section-->
						<div>
							<checkbox class="dt-checkbox dt-checkbox-icon dt-checkbox-only" style="margin-bottom: 20px;">
								<input type="checkbox" name="accept_terms" id="accept_terms" value="agree" class="checkbox-check ng-pristine ng-valid ng-touched" style="width: 20%;">
								<label class="font-weight-light dt-checkbox-content" for="accept_terms">
                                        <span class="unchecked">
                                            <i name="box-o" size="xl" class="icon icon-box-o icon-xl icon-fw"></i>
                                        </span>
									<span class="checked ng-star-inserted">
                                            <i name="box-check-o" size="xl" class="text-primary icon icon-box-check-o icon-xl icon-fw"></i>
                                        </span>
								</label>
								<?php echo lang("agree_terms") ?> <?php echo $this->security->xss_clean($companyName)."'s" ; ?> <a target="_blank" href="<?php echo base_url(); ?>privacy" class="checkbox-link text-capitalize"><?php echo lang("privacy_policy") ?></a> &
								<a target="_blank" href="<?php echo base_url(); ?>terms" class="checkbox-link text-capitalize"><?php echo lang("terms_of_service") ?></a>
							</checkbox>
							<label class="error red" id="terms" for="password"></label>
						</div>
						<!--						End terms section-->

						<!--						Google Recaptcha-->
						<?php if($companyInfo['google_recaptcha'] != 0) {?>
							<?php if($companyInfo['recaptcha_version'] == 'v2') {?>
								<input type="hidden" name="g-recaptcha-response">
								<div class="g-recaptcha" style="margin-bottom: 15px;" data-sitekey="<?php echo $recaptchaInfo->public_key; ?>"></div>
							<?php } else if($companyInfo['recaptcha_version'] == 'v3') {?>
								<input type="hidden" class="g-recaptcha" name="recaptcha_response" id="recaptchaResponse">
							<?php }?>
						<?php }?>
						<!--						End Google Recaptcha-->

						<button type="submit" id="submit" class="btn btn-primary mb-4 w-75 btn-primary" data-loading-text="<?php echo lang('processing_data') ?>" data-title="<?php echo lang("create_account") ?>"><?php echo lang("create_account") ?></button>
						<div class="py-3"></div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 d-none d-lg-block d-xl-block bg-dark dd mx-0 px-0">
				<div
					class="login-head my-5 p-4 d-flex align-items-center flew-column justify-content-center text-center">
					<div class="who-we">who we are</div>
					<h3 class="">we are investment</h3>
					<div class="px-5 ac justify-self-end align-self-end">
						<img
							src="https://affirm.uicore.co/business-consultant/wp-content/uploads/sites/2/2021/09/business-consultant-side-2.webp"
							alt="" class="h-auto w-100 rounded">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('/assets/dist/js/functions.js') ?>"></script>
<script src="<?php echo base_url('/assets/dist/js/intlTelInput.js') ?>"></script>
<script src="<?php echo base_url('/assets/dist/js/utils.js') ?>"></script>
<script>
	$(document).ready(function () {
		var input = document.querySelector("#phoneit");

		window.intlTelInput(input,
			{
				separateDialCode: true,
				hiddenInput: "fullMobile"
			});

		// listen to the telephone input for changes
		input.on('countrychange', function(e) {
			// change the hidden input value to the selected country code
			country.val(iti.getSelectedCountryData().dialCode);
		});
	});
</script>
