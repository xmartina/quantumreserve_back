<!-- Modal -->
<div class="modal fade" id="depositModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Deposit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php echo form_open(base_url('deposits/new'), array( 
            'id' => 'depositModalForm', 
            'data-modal' => 'depositModal',
            'data-reload' => true,
            'data-curr-lang' => lang('proceed_to_deposit'), 
            'data-load-lang' => lang('processing') ));
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Group -->
                    <div class="form-group">
                        <label for="email"><?php echo lang("client_email") ?></label>
                        <input type="email" class="form-control <?=form_error('email') == TRUE ? 'is-invalid' : ''; ?>" name="email" value="<?=set_value('email')?>"
                            id="email"
                            placeholder="Enter email">
                    </div>
                    <!-- /form group -->
                    <!-- Form Group -->
                    <div class="form-group">
                        <label for="fname"><?php echo lang("investment_plan") ?></label>
                        <select class="form-control <?=form_error('plan') == TRUE ? 'is-invalid' : ''; ?>" name="plan" id="simple-select">
                            <option value="" selected disabled hidden><?php echo lang("select_investment_plan") ?></option>
                            <?php foreach($plans as $plan) { ?>
                            <option value="<?php echo $plan->id ?>" <?=set_value('plan') == $plan->id ? 'selected' : ''?>>
                                <?php echo $plan->name.' at '.$plan->profit.'% every '.$plan->interest_interval.' investment: '.to_currency($plan->minInvestment).' - '.to_currency($plan->maxInvestment)  ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- /form group -->
                    <!-- Form Group -->
                    <div class="form-group">
                        <label for="amount"><?php echo lang("enter_amount") ?></label>
                        <input type="number" class="form-control <?=form_error('amount') == TRUE ? 'is-invalid' : ''; ?>" step="any" name="amount"
                            value="<?=set_value('amount')?>" id="amount" aria-describedby="amount"
                            placeholder="<?=lang("enter_amount") ?>" onkeyup="transfee(this);">
                    </div>
                    <!-- /form group -->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" id="submitButtonForm" class="btn btn-primary"><?=lang('proceed_to_deposit')?></button>
        </div>
        <?php echo form_close();?>
        </div>
    </div>
</div>