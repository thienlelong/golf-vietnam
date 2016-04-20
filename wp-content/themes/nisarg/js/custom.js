jQuery(document).ready(function($) {

  /**
   * When user clicks on button...
   *
   */
  function register_user( formId) {
    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }

    // Show 'Please wait' loader to user, so she/he knows something is going on
    $('.indicator').show();

    // If for some reason result field is visible hide it
    $('.result-message').hide();

    // Collect data from inputs
    /**
     * AJAX URL where to send data
     * (from localize_script)
     */
    var ajax_url = vb_reg_vars.vb_ajax_url;
    console.log($(formId + ' input[name=first_name]'));
    // Data to send
    var data = {
      action: 'register_user',
      first_name: $(formId + ' input[name=first_name]').val(),
      middle_name: $(formId + ' input[name=middle_name]').val(),
      last_name: $(formId + ' input[name=last_name]').val(),
      user_email: $(formId + ' input[name=user_email]').val(),
      user_login: $(formId + ' input[name=user_email]').val().split('@')[0],
      password: $(formId + ' input[name=password]').val(),
      club_member: $(formId + ' select[name=club_member]').val(),
      public_member: $(formId + ' select[name=public_member]').val(),
      association_member: $(formId + ' select[name=association_member]').val(),
      district: $(formId + ' input[name=district]').val(),
      province: $(formId + ' input[name=province]').val(),
      city: $(formId + ' input[name=city]').val(),
      nonce: $(formId + ' input[name=vb_new_user_nonce]').val(),
      langguage: $(formId + ' input[name=langguage]').val(),
      gender: $(formId + ' input[name=gender]').val()
    }
    // Do AJAX requestaction: 'register_user',
    $.post( ajax_url, data, function(response) {
      // If we have response
      if( response ) {
        // Hide 'Please wait' indicator
        $(formId + ' .indicator').hide();

        if( response === '1' ) {
          console.log("response", response);
          // If user is created
          $(formId).replaceWith( '<p>User register success full</p><input type="checkbox" name="'+formId+'" value="true">' );
        } else {
          console.log("response1", response);
          $(formId + ' .result-message').html( response ); // If there was an error, display it in results div
          $(formId + ' .result-message').addClass('alert-danger'); // Add class failed to results div
          $(formId + ' .result-message').show(); // Show results div
        }
      }
    });
  };

  var count = 0;
  $('#btn-addmore').click(function(e) {
    count++;
    var formHtml = $("#registerUserForm0").clone().prop('id', 'registerUserForm'+count ).insertBefore($("#wrapper-btn-signin"));
  });

  $('#btn-new-user').click(function(e) {

      for (var i = 0; i <  $(".registerUserForm").length; i++) {
        var formId = '#registerUserForm'+i;
        console.log(formId);
        register_user( formId);
      };
      setInterval(function() {
        if($(".registerUserForm").length ===0) {
          alert("success");
        }
      }, 1000);
  });
});
