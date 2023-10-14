
<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">

    <!-- Site Content -->
    <div class="dt-content">

    <!-- Page Header -->
    <div class="dt-page__header">
        <h1 class="dt-page__title" style="display: inline;"><?php echo lang('settings') ?></h1>
        <button id="editContent" class="btn btn-primary btn-sm display-i ft-right"><?php echo lang('save') ?></button>
    </div>
    <!-- /page header -->

    <!-- Grid -->
    <div class="row">

        <!-- Grid Item -->
        <div class="col-xl-12">
            <!-- Card -->
            <div class="dt-card">
                <!-- Card Header -->
                <div class="card-header card-nav bg-transparent border-bottom d-sm-flex justify-content-sm-between">
                    <ul class="card-header-links nav nav-underline" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-pane1" role="tab"
                                aria-controls="tab-pane1" aria-selected="true">Main Color</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-pane4" role="tab"
                                aria-controls="tab-pane4" aria-selected="true">Buttons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-pane2" role="tab"
                                aria-controls="tab-pane2" aria-selected="true">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-pane3" role="tab"
                                aria-controls="tab-pane3" aria-selected="true">Dashboard</a>
                        </li>
                    </ul>
                </div>
                <!-- /card header -->
                <!-- Card Body -->
                <div class="dt-card__body">
                <?php echo form_open('', array( 'id' => 'colorForm' ));?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ml-4">
                                <div class="mb-3">
                                    <h4 class="mb-0">Authentication Page Colors</h4>
                                    <small>Customize main login, registration, verification and page color scheme</small>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div clas="form-group">
                                            <label>Left Hand Side Background Color</label>
                                            <div class="input-group input-group-sm mb-3 w-65">
                                                <input type="color" class="form-control" name="login_lhs_bg" style="padding: 0px;width:30%">
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
                                                <input type="color" class="form-control" name="login_lhs_text" style="padding: 0px;width:30%">
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
                                                <input type="color" class="form-control" name="login_rhs_bg" style="padding: 0px;width:30%">
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
                                                <input type="color" class="form-control" name="login_rhs_text" style="padding: 0px;width:30%">
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
                            <h4 class="ml-4">Buttons</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Background Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="btn_primary_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Text Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="btn_primary_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Secondary Background Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="btn_secondary_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Secondary Text Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="btn_secondary_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Danger Background Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="btn_danger_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Danger Text Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="btn_danger_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="ml-4">Menu</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Menu Selected Bg</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_primary_selected_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Menu Selected Text</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_primary_selected_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Menu Normal Text</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_primary_normal_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Menu Hover Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_primary_hover_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Secondary Menu Selected Bg</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_secondary_selected_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Secondary Menu Selected Text</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_secondary_selected_text" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Primary Menu Background Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_primary_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12 row">
                                        <div class="col-md-12">
                                            <label>Secondary Menu Background Color</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input 
                                                type="color" 
                                                class="form-control" 
                                                name="menu_secondary_bg" 
                                                style="padding: 0px;width:30%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="ml-4">Dashboard Colors</h4>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Header Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="header_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Header Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="header_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Footer Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="footer_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Footer Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="footer_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Sub Header Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="subheader_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Sub Header Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="subheader_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Sub Header Card Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="subheader_card_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Sub Header Card Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="subheader_card_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Sub Header Card Badge Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="subheader_card_badge_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Sub Header Card Badge Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="subheader_card_badge_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Primary Card Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="primary_card_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Primary Card Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="primary_card_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Secondary Card Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="secondary_card_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Secondary Card Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="secondary_card_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Referral Card Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="ref_card_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Referral Card Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="ref_card_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Card Badge Background Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="card_badge_bg" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                    <label>Card Badge Text Color</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        class="form-control" 
                                        name="card_badge_text" 
                                        style="padding: 0px;width: 60%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary text-uppercase"><?php echo lang('save') ?></button>
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