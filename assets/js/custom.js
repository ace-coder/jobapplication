$(document).ready(function () {
    SetAddressAutoCompleteForControl(document.getElementById('currentaddress'));
    SetAddressAutoCompleteForControl(document.getElementById('companyaddress_1'));
    $('#employment').on('click', '.add-btn', function () {
        var html = "";
        var i = $('.employment').size() + 1;
        var newCompanyAddrID = 'companyaddress_' + i;
        var newCompanyNameID = 'companyname_' + i;
        var newPhoneNumberID = 'phonenumber_' + i;
        html += '<div class="employment"><h5 class="">Employment Info ' + i + '</h5><div class="form-group"><label class="col-md-4 control-label">Conpany Name<span>*</span></label><div class="col-md-8"><input  type="text" id="' + newCompanyNameID + '" name="companyname[]" class="form-control"  value="" placeholder="Conpany Name" required/></div></div><div class="form-group"><label class="col-md-4 control-label">Conpany Address<span>*</span></label><div class="col-md-8"><input type="text" id="companyaddress_' + i + '" name="companyaddress[]" class="form-control"  value="" placeholder="Conpany Address" required/></div></div><div class="form-group"><label class="col-md-4 control-label">Phone Number<span>*</span></label><div class="col-md-8"><input  type="number" id="' + newPhoneNumberID + '" name="phonenumber[]" class="form-control"  value="" placeholder="Phone Number" required/></div></div><div class="remove-btn"><i class="glyphicon glyphicon-minus " ></i></div></div>';

        $('#employment').append(html);
        SetAddressAutoCompleteForControl(document.getElementById(newCompanyAddrID));
        $('#jobApplication').find("#" + newCompanyAddrID).rules('add', {
            required: true,
            messages: {
                required: 'Company Address is required'
            }
        });
        $('#jobApplication').find("#" + newCompanyNameID).rules('add', {
            required: true,
            messages: {
                required: 'Company Name is required'
            }
        });
        $('#jobApplication').find("#" + newPhoneNumberID).rules('add', {
            required: true,
            messages: {
                required: 'Phone number is required'
            }
        });
    });
    $('#skill').on('click', '.add-btn', function () {
        var html = "";
        var i = $('.skill').size() + 1;
        var newskillNameID = 'skillname_' + i;
        var newskillExpID = 'skillexp_' + i;
        html += '<div class="skill"><h5 class="">Skill Info ' + i + '</h5><div class="form-group"><label class="col-md-4 control-label">Skill Name<span>*</span></label><div class="col-md-8"><input  type="text" id="' + newskillNameID + '" name="skillname[]" class="form-control"  value="" placeholder="Skill Name" required/></div></div><div class="form-group"><label class="col-md-4 control-label">Year Of Experience<span>*</span></label><div class="col-md-8"><select id="' + newskillExpID + '" name="skillexp[]" class="form-control" required></select></div></div><div class="remove-btn"><i class="glyphicon glyphicon-minus " ></i></div></div>';

        $('#skill').append(html);
        $('#' + newskillExpID).html($('#skillexp_1').html());
        $('#jobApplication').find("#" + newskillNameID).rules('add', {
            required: true,
            messages: {
                required: 'Skill Name is required'
            }
        });
        $('#jobApplication').find("#" + newskillExpID).rules('add', {
            required: true,
            messages: {
                required: 'Years of experience is required'
            }
        });
    });
    $('#employment,#skill').on('click', '.remove-btn', function () {
        $(this).parent().remove();
    });


    $('#jobApplication').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            confirmemail: {
                required: true,
                email: true,
                equalTo: ".email"
            }

        },
        messages: {
        },
        submitHandler: function (form) {
            $.ajax({
                type: "post",
                url: "action.php",
                data: $(form).serializeArray(),
                success: function () {

                }
            });
        }
    });
});

function SetAddressAutoCompleteForControl(input) {
    //Fix for Firefox.  Enter a location was not hiding on focus.
    $(input).focus(function () {
        if ($(this).val() == "Enter a location") {
            $(this).val('');
        }
    });

    lat = 40.4136377;
    long = -30.7290164;
    var defaultBounds = new google.maps.LatLngBounds(new google.maps.LatLng(lat, long));
    var options = {bounds: defaultBounds, types: ['geocode', 'establishment']};
    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        var address = place.formatted_address;
        $(input).val(address);
        //////SUBMIT FORM
//        var lat_address = place.geometry.location.lat();
//        var lng_address = place.geometry.location.lng();
    });
}