
<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

    <!-- Grid -->
    <div class="row">

        <!-- Grid Item -->
        <div class="col-xl-12">
            <!-- Card -->
            <div class="dt-card">
                <?php $this->load->view('backend/web/settings/nav') ?>
                <!-- Card Body -->
                <div class="dt-card__body">
                <?php echo form_open('', array( 'id' => 'colorForm' ));?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ml-4 mb-4">
                                <div class="mb-3">
                                    <h4 class="mb-0">Admin: Client Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Clients Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_clients_card_bg" value="<?=$this->web_model->getColorCode('admin_clients_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Clients Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_clients_card_text" value="<?=$this->web_model->getColorCode('admin_clients_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Clients Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_clients_card_badge_bg" value="<?=$this->web_model->getColorCode('admin_clients_card_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Clients Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_clients_card_badge_text" value="<?=$this->web_model->getColorCode('admin_clients_card_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">Admin: Deposits Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Deposits Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_deposits_card_bg" value="<?=$this->web_model->getColorCode('admin_deposits_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Deposits Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_deposits_card_text" value="<?=$this->web_model->getColorCode('admin_deposits_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Deposits Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_deposits_card_badge_bg" value="<?=$this->web_model->getColorCode('admin_deposits_card_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Deposits Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_deposits_card_badge_text" value="<?=$this->web_model->getColorCode('admin_deposits_card_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">Admin: Payouts Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Payouts Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_payouts_card_bg" value="<?=$this->web_model->getColorCode('admin_payouts_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Payouts Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_payouts_card_text" value="<?=$this->web_model->getColorCode('admin_payouts_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Payouts Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_payouts_badge_bg" value="<?=$this->web_model->getColorCode('admin_payouts_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Payouts Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_payouts_badge_text" value="<?=$this->web_model->getColorCode('admin_payouts_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">Admin: Withdrawals Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Withdrawals Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_withdrawals_card_bg" value="<?=$this->web_model->getColorCode('admin_withdrawals_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Withdrawals Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_withdrawals_card_text" value="<?=$this->web_model->getColorCode('admin_withdrawals_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Withdrawals Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_withdrawals_badge_bg" value="<?=$this->web_model->getColorCode('admin_withdrawals_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Withdrawals Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_withdrawals_badge_text" value="<?=$this->web_model->getColorCode('admin_withdrawals_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">Admin: Default Card</h4>
                                    <small>Located on transactions, users and plans pages</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_default_card_bg" value="<?=$this->web_model->getColorCode('admin_default_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_default_card_text" value="<?=$this->web_model->getColorCode('admin_default_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_default_badge_bg" value="<?=$this->web_model->getColorCode('admin_default_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_default_card_badge_text" value="<?=$this->web_model->getColorCode('admin_default_card_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Icon Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="admin_default_card_icon" value="<?=$this->web_model->getColorCode('admin_default_card_icon')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ml-4 mb-4">
                                <div class="mb-3">
                                    <h4 class="mb-0">User: Default</h4>
                                    <small>Located on deposits, earnings, withdrawals and referrals pages</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_default_card_bg" value="<?=$this->web_model->getColorCode('user_default_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_default_card_text" value="<?=$this->web_model->getColorCode('user_default_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_default_card_badge_bg" value="<?=$this->web_model->getColorCode('user_default_card_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_default_card_badge_text" value="<?=$this->web_model->getColorCode('user_default_card_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Icon Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_default_card_icon" value="<?=$this->web_model->getColorCode('user_default_card_icon')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">User: Earnings</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Earnings Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_earnings_card_bg" value="<?=$this->web_model->getColorCode('user_earnings_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Earnings Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_earnings_card_text" value="<?=$this->web_model->getColorCode('user_earnings_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Earnings Badge Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_earnings_card_badge_bg" value="<?=$this->web_model->getColorCode('user_earnings_card_badge_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Earnings Badge Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_earnings_card_badge_text" value="<?=$this->web_model->getColorCode('user_earnings_card_badge_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">User: Refer Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Referrals Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_refer_card_bg" value="<?=$this->web_model->getColorCode('user_refer_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Referrals Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_refer_card_text" value="<?=$this->web_model->getColorCode('user_refer_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">User: Portfolio Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Portfolio Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_portfolio_card_bg" value="<?=$this->web_model->getColorCode('user_portfolio_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Portfolio Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_portfolio_card_text" value="<?=$this->web_model->getColorCode('user_portfolio_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-2">
                                    <h4 class="mb-0">User: History Card</h4>
                                    <small>Located on dashboard</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>History Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_history_card_bg" value="<?=$this->web_model->getColorCode('user_history_card_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>History Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="user_history_card_text" value="<?=$this->web_model->getColorCode('user_history_card_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-0 ml-4">
                                <button type="submit" class="btn btn-primary text-uppercase"><?php echo lang('save') ?></button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>   
                </div>
                <!-- /card body -->

            </div>
            <!-- /card -->

        </div>
        <!-- /grid item -->

    </div>
    <!-- /grid -->
</div>
<!-- /site content -->
<script>
    $('#colorForm').on('submit', function(e){
        e.preventDefault();
        var actionurl = $(this).attr('action');

        $.ajax({
            url: actionurl,
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                var content = JSON.parse(data);
                $("input[name="+content.csrfTokenName+"]").val(content.csrfHash);
                
                if(content.success == true){
                    swal(
                        content.success == true ? 'Success!' : 'Error!',
                        content.msg,
                        content.success == true ? 'success' : 'error'
                    );
                    $('.dt-drawer').removeClass('open');
                    location.reload()
                } else if(content.success == false)
                {
                    swal({
                        title: "Error!",
                        text: content.msg,
                        type: "error"
                    }, function() {
                        window.location = "redirectURL";
                    });
                    $.each(content.errors, function(key, value){
                        // here you can access all the properties just by typing either value.propertyName or value["propertyName"]
                        // example: value.ri_idx; value.ri_startDate; value.ri_endDate;
                        var msg = '<label class="error" for="'+key+'">'+value+'</label>';
                        $('input[name="' + key + '"], select[name="' + key + '"], textarea[name="' + key + '"]').addClass('inputTxtError').after(msg);
                    });
                }
            },
            error: function(data) {}
        })
    })
</script>