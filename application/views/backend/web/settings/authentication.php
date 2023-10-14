
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
                                    <h4 class="mb-0">Color Scheme</h4>
                                    <small>Customize main login, registration, verification and forgot password color schemes</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Left Hand Side Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="lhs_bg" value="<?=$this->web_model->getColorCode('lhs_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Left Hand Side Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="lhs_text" value="<?=$this->web_model->getColorCode('lhs_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Right Hand Side Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="rhs_bg" value="<?=$this->web_model->getColorCode('rhs_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Right Hand Side Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="rhs_text" value="<?=$this->web_model->getColorCode('rhs_text')?>" style="padding: 0px;width:30%">
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
                            <div class="ml-4">
                                <div class="mb-3">
                                    <h4 class="mb-0">Buttons</h4>
                                    <small>Customize button colors</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Primary Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="auth_btn_primary_bg" value="<?=$this->web_model->getColorCode('auth_btn_primary_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Primary Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="auth_btn_primary_text" value="<?=$this->web_model->getColorCode('auth_btn_primary_text')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Secondary Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="auth_btn_secondary_bg" value="<?=$this->web_model->getColorCode('auth_btn_secondary_bg')?>" style="padding: 0px;width:30%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Select Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Secondary Text Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="auth_btn_secondary_text" value="<?=$this->web_model->getColorCode('auth_btn_secondary_text')?>" style="padding: 0px;width:30%">
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