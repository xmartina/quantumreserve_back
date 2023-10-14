$(".sitelangChange").click(function(e){
    var actionurl = $(this).attr("data-id");
    $.get(actionurl, function(data){
        var content = JSON.parse(data);
        setTimeout(
            function() {
                location.reload();
            }, 1000);
    });
});

$('.close').on('click', function(e){
    $('.drawer').removeClass('open');
})

$('.customizer-toggle').on('click', function(e){
    $('.drawer').addClass('open');
})

$('.choose-option__icon').on('click', function(e){
    var actionurl = $(this).attr("data-url");
    $.get(actionurl, function(data){
        var content = JSON.parse(data);

        setTimeout(
            function() {
                window.location.replace("./home");
            }, 1000);
    });
})

$('#envatopurchase').submit(function(e){
    e.preventDefault();
    var actionurl = e.currentTarget.action;
    var formid = e.currentTarget.id;
    $('.error').hide();
    $('.form-control').removeClass('inputTxtError');
    $.ajax({
        url: actionurl,
        type: "POST",
        data:new FormData(this),
        contentType: false,
        cache: false,
        
        processData: false,
        success: function(data) {
            $('#form-modal' + formid).modal('toggle');
            var content = JSON.parse(data);
            $("input[name="+content.csrfTokenName+"]").val(content.csrfHash);
            swal(
                content.success == true ? 'Success!' : 'Error!',
                content.msg,
                content.success == true ? 'success' : 'error'
            );
            if (content.success == false) {
                $.each(content.errors, function(key, value) {
                    // here you can access all the properties just by typing either value.propertyName or value["propertyName"]
                    // example: value.ri_idx; value.ri_startDate; value.ri_endDate;
                    var msg = '<label class="error" for="' + key + '">' + value +
                        '</label>';
                    $('input[name="' + key + '"], select[name="' + key + '"]').addClass(
                        'inputTxtError').after(msg);
                });
            } else {
                $('#envatopurchasemodal').hide();
            }
            $('#envatosave').prop('disabled', false);
        },
        error: function(data) {}
    });
})