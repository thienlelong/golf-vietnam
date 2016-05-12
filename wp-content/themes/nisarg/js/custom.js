jQuery(document).ready(function($) {
  jQuery('.date-of-birth').datepicker();
    var count = 0;
    $('#btn-addmore').click(function(e) {
        count++;
        var formID = 'registerUserForm' + count;
        var formHtml = $("#registerUserForm0").clone().prop('id', formID).insertBefore($(".wrapper-btn-signin"));
        clearForm(formHtml, formID);
        jQuery(formHtml).find("input[name='form_id']").each(function(){
          jQuery(this).val(formID);
        });
    });

    $('.page-static a[href*=#]:not([href=#])').click(function() {
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
            preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
            navigateByImgClick: true
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    //dungdh
    jQuery('#btn-new-user').click(function(e) {
        register_users();
    });

    jQuery('.file_avatar').live('change',function(e){

      var file=jQuery(this)[0].files[0];
     // var canvas =document.getElementById('cavas_avatar');
     var formId=jQuery(this.form).attr("id");
     var canvas= jQuery('#'+formId+' .canvas_avatar')[0];
      showThumbnail(file,canvas);
  });
});
//dungdh
function arrayToObject(array) {
    var result = {};
    jQuery.each(array, function() {
        result[this.name] = this.value;
    });
    return result;
}

function getFormsData(className) {
    var users = new Array();
    jQuery(className).each(function(form) {
        var user = arrayToObject(jQuery(this).serializeArray());
        users.push(user);
    });
    return users;
}

function register_users() {
    var ajax_url = vb_reg_vars.vb_ajax_url;
    //valid data before sending
    var valid = false;
    jQuery('.registerUserForm').each(function() {
        var validator = jQuery(this).validate({
            rules: {
                password: "required",
                password2: {
                  equalTo: "#password"
                }
            }
        });
        valid = validator.form();
    });
    // Data to send
    var users= getFormsData('.registerUserForm');
    for(var i=0;i<users.length;i++)
    {
        var canvas =jQuery('#'+users[i].form_id+' .canvas_avatar')[0];
        var base64Url=getCanVasBase64(canvas);
        var bas64=base64Url.split(',')[1];
        users[i].avatar=bas64;
    }
    var data = {
        action: 'register_users',
        users:users
    };

    if (valid) {
        jQuery.ajax({
            url: ajax_url,
            data: data,
            type: 'post',
            datatype: 'json',
            success: function(response) {
                console.log("response", response);
                result = jQuery.parseJSON(response);
                console.log("result", result);
                if (result.success) {
                    //code redirect
                    location.href= result.redirectLink;
                } else {
                    //code handle error
                    result.error.forEach(function(error){
                        jQuery('#' + error.form_id).find('.result-message').each(function(){
                            if(error.user_email=="email_exists") {
                                jQuery(this).css('display', 'block');
                            }
                            else {
                                jQuery(this).find('#fieldRequired').css('display', 'block');
                            }
                        });
                    });
                }
            },
            error: function(response) {
                result = jQuery.parseJSON(response);
            }
        })
    }
}

function clearForm(form, formID) {
    // iterate over all of the inputs for the form
    // element that was passed in
    jQuery(':input', form).each(function() {
      jQuery(this).removeClass('error');

        var type = this.type;
        var tag = this.tagName.toLowerCase(); // normalize case
        // it's ok to reset the value attr of text inputs,
        // password inputs, and textareas
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'email')
            this.value = "";
        // checkboxes and radios need to have their checked state cleared
        // but should *not* have their 'value' changed
        else if (type == 'checkbox' || type == 'radio') {
            this.checked = false;
            if(this.id === 'male') {
              this.checked = true;
            }
            var id = Math.random().toString(36).substring(5);

            if(this.id == 'clubMember' || this.id == 'publicMember' ||  this.id == 'associationMember') {
              jQuery(this).prop('id', id);
              jQuery(this).next().prop('for', id);
              jQuery('#' + formID + ' .checkbox-golf-club').removeClass("active");

              jQuery('#' + formID + ' input[name="golf_club"').click(function() {
                jQuery('#' + formID + ' .checkbox-golf-club').removeClass("active");
                jQuery('#' + formID + ' .golf-club-list').css("display", "none");
                jQuery('#'+ id +' + label').html('Association Member');
                jQuery('#'+ id +' + label').html('Public Member');
                jQuery('#'+ id +' + label').html('Club Member');

                    if(this.checked) {
                        jQuery(this).parent().addClass("active");
                        jQuery('#' + formID + ' .active + .golf-club-list').css("display", "block");
                    }
              });

              jQuery('#' + formID + ' .golf-club-list li').on('click', function(event){
                  var clubId = jQuery(this).attr("data-clubId");
                  jQuery('#' + formID + ' .golf-club-list').css("display", "none");
                  jQuery('#' + formID + ' input[name=golf_club]:checked').val(clubId);
                  jQuery('#' + formID + ' input[name=golf_club]:checked + label').html(jQuery(this).html());
              });
            } else {
              jQuery(this).prop('id', id);
              jQuery(this).next().prop('for', id);
            }
        }
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};

function getCanVasBase64(canvas)
{
  if(typeof canvas!=undefined)
    {
      return canvas.toDataURL();
    }
    return "";
}
function showThumbnail(file,canvas){
        if(canvas==null||file==null)
        {
          return;
        }
        var imageType = /image.*/
        if(!file.type.match(imageType)){
            return ;
        }
        var image = new Image();
        // image.classList.add("")
        image.file = file;
        //thumbnail.appendChild(image)
        var reader = new FileReader()
        reader.onload = (function(aImg){
          return function(e){
            aImg.src = e.target.result;
          };
        }(image))
        var ret = reader.readAsDataURL(file);
        ctx = canvas.getContext("2d");
        image.onload= function(){
          //clear canvas
          ctx.clearRect(0, 0, canvas.width, canvas.height);
          ctx.drawImage(image, 0, 0, 60, 80 * image.height / image.width);
        }
    }

