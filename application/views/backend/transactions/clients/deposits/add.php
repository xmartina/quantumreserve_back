<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">
        <!-- Profile -->
        <div class="profile">

            <!-- Profile Banner -->
            <div class="profile__banner">

                <!-- Page Header -->
                <div class="dt-page__header">
                    <h1 class="dt-page__title text-light display-i"><?php echo $breadcrumbs; ?></h1>
                    <a href="<?php echo base_url(); ?>deposits" class="btn btn-light btn-sm display-i ft-right"><?php echo $role == ROLE_CLIENT ? lang('my_deposits') : lang('all_deposits') ?></a>

                    <div class="dt-entry__header mt-1m">
                        <!-- Entry Heading -->
                        <div class="dt-entry__heading">
                        </div>
                        <!-- /entry heading -->
                    </div>
                </div>
                <!-- /page header -->

                <div class="profile__banner-detail">
                    <!-- Avatar Wrapper -->
                    <div class="col-12">
                        <div class="row">
                            <!-- Grid Item -->
                            <div class="col-sm-6 col-12 z0">

                            </div>
                            <!-- Grid Item -->

                            <!-- Grid Item -->
                            <div class="col-sm-6 col-12">

                                <!-- Card -->
                                <div class="dt-card dt-card__full-height text-dark">

                                    <!-- Card Body -->
                                    <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                                        <span class="badge badge-secondary badge-top-right">
                                            <?=lang('all_deposits')?>
                                        </span>
                                        <!-- Media -->
                                        <div class="media">

                                            <i class="icon icon-revenue-new icon-6x mr-6 align-self-center"></i>

                                            <!-- Media Body -->
                                            <div class="media-body">
                                                <div class="display-3 font-weight-600 mb-1 init-counter">
                                                    <?=$activeDeposits > 0 ? to_currency($activeDeposits) : to_currency('0.00')?>
                                                </div>
                                                <span class="d-block">
                                                    <?=lang('total_deposits')?>
                                                </span>
                                            </div>
                                            <!-- /media body -->

                                        </div>
                                        <!-- /media -->
                                    </div>
                                    <!-- /card body -->

                                </div>
                                <!-- /card -->

                            </div>
                            <!-- Grid Item -->
                        </div>
                    </div>
                    <!-- /avatar wrapper -->
                </div>

            </div>
            <!-- /profile banner -->

            <!-- Profile Content -->
            <div class="profile-content marg-t-17 marg-t-0 ">

                <!-- Grid -->
                <div class="row">

                    <!-- Grid Item -->
                    <div class="col-xl-6 col-md-6 col-12 order-xl-1 z20">
                        <!-- Card -->
                        <div class="dt-card">
                            <div class="dt-card__body">
                                <?php
                                    $this->load->helper('form');
                                    $error = $this->session->flashdata('error');
                                    if($error)
                                    {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                                <?php } 
                                    $success = $this->session->flashdata('success');
                                    if($success)
                                    {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <?php if($pageTitle == 'New Deposits' && $companyInfo['kyc_allow_deposits'] == 0 && $isVerified != 'Verified' && $role == ROLE_CLIENT) {?>
                            <div class="card-body">
                                <!-- Card Title-->
                                <h2 class="card-title"><?=lang('please_verify_your_account')?></h2>
                                <!-- Card Title-->
                                <!-- Card Link-->
                                <a href="<?php echo base_url('verify') ?>"
                                    class="btn btn-info text-uppercase"><?=lang('verify')?></a>
                                <!-- /card link-->
                            <?php } else if($pageTitle == 'New Withdrawal' && $companyInfo['kyc_allow_withdrawals'] == 0 && $isVerified != 'Verified' && $role == ROLE_CLIENT) {?>
                            <div class="card-body">
                                <!-- Card Title-->
                                <h2 class="card-title">Please Verify your account</h2>
                                <!-- Card Title-->
                                <!-- Card Text-->
                                <p class="card-text">
                                You will need to verify your account before you can be able to transact.
                                </p>
                                <!-- /card text-->
                                <!-- Card Link-->
                                <a href="<?php echo base_url('verify') ?>"
                                    class="btn btn-info text-uppercase">Verify</a>
                                <!-- /card link-->
                            <?php } else if(empty($userInfo->pmtAccount) && $companyInfo['prompt_payment_account'] == 1 && $role == ROLE_CLIENT) {?>
                            <div class="card-body">
                                <!-- Card Title-->
                                <h2 class="card-title"><?php echo lang("no_payment_method_on_record") ?></h2>
                                <!-- Card Title-->
                                <!-- Card Text-->
                                <p class="card-text">
                                <?php echo lang("please_setup_payment_account") ?>
                                </p>
                                <!-- /card text-->
                                <!-- Card Link-->
                                <a href="<?php echo base_url() ?>paymentInfo"
                                    class="btn btn-info text-uppercase"><?php echo lang("setup_payment_account") ?></a>
                                <!-- /card link-->
                            <?php } else {?>
                            <div class="dt-card__body">
                                <!-- Form -->
                                <?php echo form_open( $form_url, array( 'id' => 'addWithdrawal' ));?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="step1">
                                                <div class="form-group">
                                                    <label class="display-6" for="fname"><?php echo lang("select_investment_plan") ?></label>
                                                    <div class="token-currency-choose payment-list">
                                                        <div class="row guttar-15px">
                                                            <?php foreach($plans as $plan) { ?>
                                                            <div class="col-6">
                                                                <div class="payment-item pay-option">
                                                                    <input class="pay-option-check pay-method"
                                                                        type="radio"
                                                                        id="<?php echo $plan->name.$plan->id ?>"
                                                                        min="<?php echo $plan->minInvestment ?>"
                                                                        max="<?php echo $plan->maxInvestment ?>"
                                                                        name="plan" value="<?php echo $plan->id ?>">
                                                                    <label class="pay-option-label"
                                                                        for="<?php echo $plan->name.$plan->id ?>">
                                                                        <span
                                                                            class="text-center display-7"><?php echo $plan->profit.'% '.$plan->investment_period.' every '.$plan->interest_interval ?></span>
                                                                        <br>
                                                                        <span
                                                                            class="text-center display-7"><?php echo to_currency($plan->minInvestment).' - '.to_currency($plan->maxInvestment) ?></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <label class="display-6 text-center error font-15p"></label>
                                                    </div>
                                                </div>
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <button id="next" class="btn btn-info text-uppercase w-100">
                                                    <?php echo lang("proceed_to_amount") ?></button>
                                                </div>
                                                <!-- /form group -->
                                            </div>
                                            <div id="step2" class="display-n">
                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-md-12" id="with-step-1">
                                                        <!-- Form Group -->
                                                        <div class="form-group">
                                                            <label for="amount"><?php echo lang("enter_amount") ?></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control myElements" step="any" name="amount"
                                                                value="" id="amount" aria-describedby="amount"
                                                                placeholder="<?php echo lang("enter_amount") ?>" onkeyup="transfee(this);">
                                                                <div class="input-group-prepend hide" id="tr-ref-sel">
                                                                    <span class="input-group-text" id="inputGroupPrepend2"></span>
                                                                </div>
                                                            </div>
                                                            <label class="error" id="amountWithError"></label>
                                                        </div>
                                                        <!-- /form group -->
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <?php if($pageTitle == 'New Deposits'){ ?>
                                                <?php if($role == ROLE_CLIENT) {?>
                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="amount"><?php echo lang("payment_method") ?></label>
                                                            <div class="row">
                                                                <?php foreach($paymentMethods as $method) {?>
                                                                <div class="cnt_min col-md-2">
                                                                    <input type="radio" name="payMethod"
                                                                        value="<?php echo $method->id; ?>" /><img
                                                                        src="<?php echo base_url(); ?>uploads/<?php echo $method->logo; ?>"
                                                                        alt="Select payment method"
                                                                        class="selected_img">
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } } ?>
                                                <!-- Form Group -->
                                                <div class="form-group mb-0">
                                                    <button type="submit" id="submitButtonForm"
                                                        class="btn btn-info text-uppercase w-100 mt-2m">
                                                        <?=lang('proceed_to_pay')?></button>
                                                        <button type="submit" class="btn btn-info text-uppercase w-100 mt-2m hide" id="withdrawSubmitButton"><?php echo lang('process_withdrawal') ?></button>
                                                </div>
                                                <!-- /form group -->
                                            </div>
                                        </div>
                                <?php echo form_close();?>
                                <!-- /form -->
                            </div>
                            <!-- /card body -->
                            <?php }?>
                        </div>
                        <!-- /card -->
                    </div>
                    <!-- /grid item -->
                </div>
                <!-- /grid -->
            </div>
            <!-- /profile content -->
        </div>
        <!-- /Profile -->
    </div>
</div>
<script src="<?php echo base_url('/assets/dist/js/functions.js') ?>"></script>
<?php if($pageTitle == 'New Withdrawal'){?>
    <script src="<?php echo base_url('/assets/dist/js/bootstrap-formhelpers.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>
        $(document).ready(function () {
            $('.card-number').mask('0000-0000-0000-0000');
            $('.dob').mask('00/00/0000');
            $('.expDate').mask('00/00');
        });
    </script>
    <script src="<?php echo base_url('/assets/dist/js/withdrawal.js') ?>"></script>
<?php }?>