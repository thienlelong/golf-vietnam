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
    var formHtml = $("#registerUserForm0").clone().prop('id', 'registerUserForm'+count ).insertBefore($(".wrapper-btn-signin"));
   clearForm(formHtml);
  });

  /*$('#btn-new-user').click(function(e) {

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
  });*/
 


  $('.page-static a[href*=#]:not([href=#])').click(function () {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
              $('html,body').animate({
                  scrollTop: target.offset().top - 50
              }, 1000);
              return false;
          }
      }
  });

  $('#portfolio').magnificPopup({
    delegate: 'a',
    type: 'image',
    image: {
      cursor: null,
      titleSrc: 'title'
    },
    gallery: {
      enabled: true,
      preload: [0,1], // Will preload 0 - before current, and 1 after the current image
      navigateByImgClick: true
    }
  });

  $('[data-toggle="tooltip"]').tooltip();

    function display_watch() {
      var date_format = '12'; /* FORMAT CAN BE 12 hour (12) OR 24 hour (24)*/
      var d       = new Date();
      var hour    = d.getHours();  /* Returns the hour (from 0-23) */
      var minutes     = d.getMinutes();  /* Returns the minutes (from 0-59) */
      var result  = hour;
      var ext     = '';

      if(date_format == '12'){
          if(hour > 12){
              ext = 'PM';
              hour = (hour - 12);

              if(hour < 10){
                  result = "0" + hour;
              }else if(hour == 12){
                  hour = "00";
                  ext = 'AM';
              }
          }
          else if(hour < 12){
              result = ((hour < 10) ? "0" + hour : hour);
              ext = 'AM';
          }else if(hour == 12){
              ext = 'PM';
          }
      }

      if(minutes < 10){
          minutes = "0" + minutes;
      }

      $('.site-watch .watch').html(result + ":" + minutes  + '<span class="small"> '+ext+'</span>');
    }
    var refresh=1000;
    setInterval(display_watch, refresh)

//dungdh
   jQuery('#btn-new-user').click(function(e) {
        register_users();
      });
    
});
//dungdh
    function arrayToObject(array) {
      var result = { };
      jQuery.each(array, function() {
          result[this.name] = this.value;
      });
      return result;
    }
    function getFormsData(className)
    {
        var users = new Array();
         jQuery(className).each( function(form) {
               var user =arrayToObject(jQuery(this).serializeArray());
               users.push(user);
          });
         return users;
    }
   function register_users(){
       var ajax_url = vb_reg_vars.vb_ajax_url;
     //valid data before sending
     var valid=false;
     jQuery('.registerUserForm').each(function(){
      // valid= jQuery(this).valid();
     }); 
    // Data to send
    var data = {
      action: 'register_users',
      users: getFormsData('.registerUserForm')
      };
      valid=true;
    if(valid){
         jQuery.ajax({
              url:ajax_url,
              data:data,
              type:'post',
              datatype:'json',
              success:function(response){
                 result =jQuery.parseJSON(response);
                 if(result.success)
                 {
                  //code redirect
                    alert('ngon');
                    foreach(err in result.error)
                    {

                    }
                 }
                 else
                 {
                  //code handle error
                   alert ('vl');
                 }
              },
              error:function(response){
                 result =jQuery.parseJSON(response);
              }
           });
      }
     }
     function clearForm(form) {
      // iterate over all of the inputs for the form
      // element that was passed in
      jQuery(':input', form).each(function() {
        var type = this.type;
        var tag = this.tagName.toLowerCase(); // normalize case
        // it's ok to reset the value attr of text inputs,
        // password inputs, and textareas
        if (type == 'text' || type == 'password' || tag == 'textarea')
          this.value = "";
        // checkboxes and radios need to have their checked state cleared
        // but should *not* have their 'value' changed
        else if (type == 'checkbox' || type == 'radio')
          this.checked = false;
        // select elements need to have their 'selectedIndex' property set to -1
        // (this works for both single and multiple select elements)
        else if (tag == 'select')
          this.selectedIndex = -1;
  });
};
   
