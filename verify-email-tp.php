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
							<div class="signup-dd mb-3 d-flex justify-content-center px-3 py-2">Email Verification Page</div>
							<h3 class="font-weight-bolder">
								Verify Your Email Address
							</h3>
							<p class="login-info-2">We've sent you a verification code to <?=$email?>. Please enter the code below.</p>
						</div>


						<?php echo form_open("", array('class' => 'mt-3', 'id' => 'verifyForm'));?>
							<div class="mb-3">
								<label for="Verification_code" class="form-label">Verification Code</label>
								<input type="text" class="form-control" name="code" placeholder="Verification Code" value="<?=set_value('email')?>">
								<label class="error" id="code"></label>
							</div>
						<p class="mb-3">Didn't receive the code? <a href="javascript:void(0)" id="resendverification" data-url="<?=base_url('resend-verification-email/'.$this->uri->segment(2))?>">Resend email</a></p>
							<button type="submit" id="submit" class="btn mb-4 w-75 btn-primary">Verify Account</button>
							<div class="py-3"></div>
						</form>
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
