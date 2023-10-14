        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Join <?php echo $this->security->xss_clean($this->siteTitle); ?></h1>
                        <!-- /login title -->

                        <p class="f-16 text-capitalize"><?=lang("signup_and_explore") ?> <?php echo $this->security->xss_clean($this->siteTitle); ?>.</p>
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="<?php echo base_url() ?>">
                            <img class="dt-brand__logo-img" src="<?php echo $this->security->xss_clean($this->logoWhite) ?>" alt="Logo">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content">
                    <ul style="float: right;background-color: #f4f4f4;padding: 5px;">
                        <li class="dt-nav__item dropdown">

                            <!-- Dropdown Link -->
                            <a href="#" class="dt-nav__link dropdown-toggle" id="currentLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="width:20px;" class="flag-icon flag-icon-rounded flag-icon-lg mr-1m" src="<?php echo base_url('uploads/'.$this->site_lang->logo) ?>">
                            <span><?php echo $this->site_lang->code ?></span> </a>
                            <!-- /dropdown link -->

                            <!-- Dropdown Option -->
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(8px, 72px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <?php foreach($this->site_languages as $language) {?>
                                <button class="dropdown-item sitelangChange" type="button" data-id="<?php echo base_url('switchlang/').$language->name ?>">
                                    <img class="flag-icon flag-icon-rounded flag-icon-lg mr-2" style="width: 20px;" src="<?php echo base_url('uploads/').$language->logo ?>">
                                    <span><?php echo $language->name ?></span> 
                                </button>
                                <?php }?>
                            </div>
                            <!-- /dropdown option -->

                        </li>
                    </ul>

                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">
                        <h2 class="f-20 text-capitalize mb-0">Verify Your Email Address</h2>
                        <p class="mb-0 mt-2">We've sent you a verification code to <?=$email?>. Please enter the code below.</p>
                        <?php echo form_open("", array('class' => 'mt-3', 'id' => 'verifyForm'));?>
                            <!-- Form Group -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" placeholder="Verification Code" value="<?=set_value('email')?>">
                                <label class="error" id="code"></label>
                            </div>
                            <!-- /form group -->
                            <p>Didn't receive the code? <a href="javascript:void(0)" id="resendverification" data-url="<?=base_url('resend-verification-email/'.$this->uri->segment(2))?>">Resend email</a></p>
                            <button type="submit" id="submit" class="btn btn-info text-uppercase">Verify Account</button>
                        </form>
                    </div>
                    <!-- /login content inner -->

                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->
        <script src="<?php echo base_url('/assets/dist/js/functions.js') ?>"></script>