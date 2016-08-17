function autoFillAddress(scriptPath) {
    $('#postalCode').unbind().change(function () {
        var postalcodeId = $('#person-postalcode').val();
        $.get(scriptPath, {postalcodeId: postalcodeId}, function (data) {
            var data = $.parseJSON(data);
            if (data !== false) {
                $('#person-state').val(data.import_address_state);
                $('#person-city').attr('value', data.import_address_city);
                $('#person-neighborhood').attr('value', data.import_address_neighborhood);
                $('#person-streetname').attr('value', data.import_address_streetname);
            } else {
                $('#person-state').attr('value', '');
                $('#person-city').attr('value', '');
                $('#person-neighborhood').attr('value', '');
                $('#person-streetname').attr('value', '');
            }

        });
    });
}

function setActiveTab(divID2Enable) {
    $('.li_form_navs').removeClass('active');
    $('#' + divID2Enable).addClass('active');
}