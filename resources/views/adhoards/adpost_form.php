


<script type="text/javascript">
        $(function() {
            //    $('#ulogin_quick').click(function () {
            var validateForm = {
                'usr_mail': function() {
                    var user_email = $('#usr_mail');
                    var emailPatt = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                    if (user_email.val().length > 1) {
                        if (!emailPatt.test(user_email.val())) {
                            validateForm.errors = true;
                            $('#usr_mail_msg').html(
                                '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Invalid Email sss</span>'
                            );
                        } else {

                            $('#usr_mail_msg').html('');
                        }
                    } else {
                        validateForm.errors = true;
                        $('#usr_mail_msg').html(
                            '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Email Require</span>'
                        );
                    }

                },
                'usr_pass': function() {
                    var pass = $('#usr_pass').val();
                    if ($.trim(pass) == '') {
                        validateForm.errors = true;
                        $('#usr_pass_msg').html(
                            '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Password Require</span>'
                        );
                    } else {
                        $('#usr_pass_msg').html('');
                    }
                },
                'usrLogin': function() {
                    if (!validateForm.errors) {
                        $('#log_msg').html('');
                        $('.spiner').show();
                        var useremail = $('#usr_mail').val();
                        var userpass = $('#usr_pass').val();
                        $.ajax({
                            type: "POST",
                            url: "https://kolkata.adhoards.com/useraccount/account/dologin/quick/",
                            data: "usr_mail=" + useremail + "&usr_pass=" + userpass,
                            dataType: "json",
                            success: function(data) {
                                if (data.result == 'login') {
                                    $('#loginbtn').hide();
                                    $('#quick-register').hide();

                                    $('.quick_dash_btn').show();
                                    $('.welcome_txt').text('Welcome ' + data.usr_name);

                                    $('.spiner').hide();
                                    $('.mail_imp_msg').hide();
                                    $('#quick-login').modal('hide');
                                    $('#quick_log_success').modal('show');
                                } else {
                                    $('.spiner').hide();
                                    $('#log_msg').html(data.msg);
                                }
                            }
                        });
                    }

                }
            };
            $("#ulogin_quick").click(function() {
                validateForm.errors = false;
                validateForm.usr_mail();
                validateForm.usr_pass();
                validateForm.usrLogin();
                return false;
            });

            $('#usr_mail').blur(validateForm.usr_mail);



        });
    </script>

<script type="text/javascript">
                $(function() {
                    //    $('#ulogin_quick').click(function () {
                    var qk_validateForm = {
                        'qk_usr_pass': function() {
                            var pass = $('#qk_usr_pass').val();
                            if ($.trim(pass) == '') {
                                qk_validateForm.errors = true;
                                $('#log_msg').html('');
                                $('#qk_usr_pass_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Password Require</span>'
                                );
                            } else {
                                $('#qk_usr_pass_msg').html('');
                            }
                        },
                        'qk_usrLogin': function() {
                            if (!qk_validateForm.errors) {
                                $('#qk_log_msg').html('');
                                $('#qk_usr_pass_msg').html('');
                                $('.qk_spiner').show();
                                var useremail = $('#qk_usr_mail').val();

                                var userpass = $('#qk_usr_pass').val();
                                $.ajax({
                                    type: "POST",
                                    url: "https://my.adhoards.com/useraccount/account/quick_login/",
                                    data: "usr_mail=" + useremail + "&usr_pass=" + userpass +
                                        "&is_quick=yes",
                                    dataType: "jsonp",
                                    success: function(data) {
                                        if (data.result == 'login') {
                                            $("#userid_otp").val(data.usr_id);
                                            ad_otp_details_chk();
                                            $('#loginbtn').hide();
                                            $('#quick-register').hide();

                                            $('.quick_dash_btn').show();
                                            $('.welcome_txt').text('Welcome ' + data.usr_name);
                                            $('#ad_name').val(data.usr_name);
                                            $('#ad_name_msg').html('');

                                            $('.spiner').hide();
                                            $('.mail_imp_msg').hide();
                                            $('#quick_hide_email').hide();
                                            $('#quick-pass-input').modal('hide');
                                            $('#quick_log_success').modal('show');

                                            setTimeout(function() {
                                                $('#quick_log_success').modal('hide')
                                            }, 5000);

                                        } else {
                                            $('.spiner').hide();
                                            $('.qk_spiner').hide();
                                            $('#log_msg').html(data.msg);
                                        }
                                    }
                                });
                            }

                        }
                    };

                    $("#qk_ulogin_quick").click(function() {
                        qk_validateForm.errors = false;


                        qk_validateForm.qk_usr_pass();
                        qk_validateForm.qk_usrLogin();

                        return false;
                    });





                });


                //===============================newly added============================>

                $(function() {
                    var qk_validateForm = {
                        'qk_usr_pass': function() {
                            var pass = $('#qk_usr_pass').val();
                            //alert(pass);
                            if ($.trim(pass) == '') {
                                qk_validateForm.errors = true;
                                $('#log_msg').html('');
                                $('#qk_usr_pass_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Password Require</span>'
                                );
                            } else {
                                $('#qk_usr_pass_msg').html('');
                            }
                        },
                        'qk_usrLogin': function() {
                            var useremail = $('#qk_usr_mail_usrlog').val();
                            var userpass = $('#qk_usr_pass').val();
                            if (useremail == '') {
                                qk_validateForm.errors = true;
                                $('#qk_usrlog_mail_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Email Require</span>'
                                );

                            } else if (!qk_validateForm.errors) {
                                $('#qk_log_msg').html('');
                                $('#qk_usr_pass_msg').html('');
                                $('#qk_usrlog_mail_msg').html('');
                                $('.qk_spiner').show();
                                $.ajax({
                                    type: "POST",
                                    url: "https://my.adhoards.com/useraccount/account/quick_login/",
                                    data: "usr_mail=" + useremail + "&usr_pass=" + userpass +
                                        "&is_quick=yes",
                                    dataType: "jsonp",
                                    success: function(data) {
                                        if (data.result == 'login') {
                                            $("#userid_otp").val(data.usr_id);
                                            ad_otp_details_chk();
                                            $('#loginbtn').hide();
                                            $('#quick-register').hide();

                                            $('.quick_dash_btn').show();
                                            $('.welcome_txt').text('Welcome ' + data.usr_name);
                                            $('#ad_name').val(data.usr_name);
                                            $('#ad_name_msg').html('');

                                            $('.spiner').hide();
                                            $('.mail_imp_msg').hide();
                                            $('#quick_hide_email').hide();
                                            $('#quick-pass-input').modal('hide');
                                            $('#quick_log_success').modal('show');

                                            setTimeout(function() {
                                                $('#quick_log_success').modal('hide')
                                            }, 5000);

                                        } else {
                                            $('.spiner').hide();
                                            $('.qk_spiner').hide();
                                            $('#log_msg').html(data.msg);
                                        }
                                    }
                                });
                            }

                        }
                    };

                    $(".quick_usrlog").click(function() {
                        $('#enter_pass').trigger('click');
                        $('div#modal-header').hide();
                        $('div#usrmail_show').show();
                        $("#forgot_pass").hide();
                        $('#qk_ulogin_quick').hide();
                        return false;
                    });

                    $("#qk_ulogin_quick_usrlog").click(function() {
                        qk_validateForm.errors = false;
                        qk_validateForm.qk_usr_pass();
                        qk_validateForm.qk_usrLogin();

                        return false;
                    });



                });
            </script>
            <script>
                $(document).ready(function() {
                    $("#price_amt").removeAttr("type");
                    $("#price_amt").attr("type", "tel");
                    $(".fileinput-remove").hide();
                    $.post('https://kolkata.adhoards.com/postingad/file_count/3607725755980',
                        function(data) {
                            if (data >= 12) {
                                $("#input-700").hide();
                                $(".btn-file").hide();
                            }
                        });
                });
            </script>
            <script>
                $(document).ready(function() {
                    var $input = $("#input-700");
                    $input.fileinput({
                        uploadUrl: 'https://kolkata.adhoards.com/postingad/processimg/addnew/3607725755980',
                        maxFileCount: 1,
                        uploadAsync: true,
                        browseClass: "btn btn-primary",
                        showCaption: false,
                        showRemove: false,
                        showUpload: false,
                        showClose: false,
                        browseOnZoneClick: false,
                        dropZoneEnabled: false,
                        allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
                    }).on("filebatchselected", function(event, files) {
                        $input.fileinput("upload");
                    }).on('fileuploaded', function(event, data, previewId, index) {
                        var form = data.form,
                            files = data.files,
                            extra = data.extra,
                            response = data.response,
                            reader = data.reader;
                        var image = data.response;
                        $(".kv-file-zoom").hide();
                        //                                                                    $(".file-preview-image").css("width", "69%");
                        //                                                                    $(".progress").css("margin-right", "35px");
                        var str = 'deleteImg("' + image + '");';
                        $(".kv-file-remove").last().attr("onclick", str);
                        $.post('https://kolkata.adhoards.com/postingad/processimg/getfiles/3607725755980');
                        file_check();
                    });
                });

                function file_check() {
                    $.post('https://kolkata.adhoards.com/postingad/file_count/3607725755980',
                        function(data) {
                            if (data >= 3) {
                                $("#input-700").hide();
                                $(".btn-file").hide();
                            } else {
                                $("#input-700").show();
                                $(".btn-file").show();
                            }

                        });
                }

                function deleteImg(get_img) {
                    $.ajax({
                        url: "https://kolkata.adhoards.com/postingad/processimg_for_del/delete/3607725755980",
                        type: "GET",
                        data: {
                            name: get_img
                        },
                        success: function(data) {
                            file_check();
                            $.post('https://kolkata.adhoards.com/postingad/processimg/getfiles/3607725755980');
                        }
                    });

                }
            </script>

<script type="text/javascript">
        function isNumberOnly(evt) { //allow only number
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        /*function isDecimalOnly(evt) { 

            var charCode = (evt.which) ? evt.which : evt.keyCode;
            
            if(charCode==8 || charCode==13|| charCode==99|| charCode==118 || charCode==46){
                return true;  
            }
            if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return false; 
            }
        }*/
        function isDecimalOnly(evt) {

            evt = (evt) ? evt : ((window.event) ? event : null);
            if (evt) {
                var elem = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);


                if (elem) {
                    var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);


                    if ((charCode < 32) || (charCode > 47 && charCode < 58) || charCode == 46 || charCode == 109 ||
                        charCode == 189 || charCode == 110 || charCode == 190 || (charCode > 95 && charCode < 106) ||
                        charCode == 8 || charCode == 35 || (charCode > 35 && charCode < 41) || charCode == 36 || charCode ==
                        118 || charCode == 116 || charCode == 38 || charCode == 40) {
                        return true;
                    } else {
                        // alert("Alphabets are not allowed here");
                        return false;
                    }

                }
            }
        }

        $(document).ready(function() {

            //        $(".gotoMain").on("click", function () {
            //            var date = new Date();
            //            date.setTime(date.getTime() + (6 * 1000)); 
            //            document.cookie = 'www_visit' +"=" + 'www' + ";expires=" + date 
            //                  + ";domain='.';path=/";
            //        });


            $(".gotoMain").on("click", function() {
                var date = new Date();
                date.setTime(date.getTime() + (6 * 1000));
                $.cookie('www_visit', 'www', {
                    expires: date,
                    path: "/",
                    domain: '.adhoards.com'
                });
            });

            //location dropdown
            $(".selStBtn").hover(function() {
                $(this).addClass("hover");
                $('#subMenudiv').show();
                $('.location_dropdown').css('border-bottom-right-radius', '0px');
                $('.selStBtn span').css('border-bottom-left-radius', '0px');
            }, function() {
                $(this).removeClass("hover");
                $('#subMenudiv').hide();
                $('.location_dropdown').css('border-bottom-right-radius', '4px');
                $('.selStBtn span').css('border-bottom-left-radius', '4px')
            });




        });


        $('.just-btn, .cross-btn').on('click', function() {
            $('.just-btn, .cross-btn').toggle('slow');
        });

        $(".key_quick_search").click(function() {
            var effect = 'slide';
            var options = {
                direction: "right"
            };
            var duration = 300;
            $('#key_search_form').toggle(effect, options, duration, function() {
                if ($(this).is(':visible')) {
                    $('body').css({
                        position: 'fixed',
                        right: 0,
                        left: 0
                    });
                    $('.just-btn-f').show();
                    $('.just-btn').hide();
                    $('.k_srch_btn_cross').show();
                    $('.k_srch_btn').hide();
                } else {
                    $('body').css({
                        position: 'static'
                    });
                    $('.just-btn-f').hide();
                    $('.just-btn').show();
                    $('.k_srch_btn_cross').hide();
                    $('.k_srch_btn').show();
                }
            });
            // $('#mob-main-menu-content').hide();
        });
        $(".quick_search").click(function() {
            var effect = 'slide';
            var options = {
                direction: "right"
            };
            var duration = 300;
            $('#search_form').toggle(effect, options, duration, function() {
                if ($(this).is(':visible')) {
                    $('body').css({
                        position: 'fixed',
                        right: 0,
                        left: 0
                    });
                    $('.just-btn-f').show();
                    $('.just-btn').hide();
                    $('.srch_btn_cross').show();
                    $('.srch_btn').hide();
                } else {
                    $('body').css({
                        position: 'static'
                    });
                    $('.just-btn-f').hide();
                    $('.just-btn').show();
                    $('.srch_btn_cross').hide();
                    $('.srch_btn').show();
                }
            });
            // $('#mob-main-menu-content').hide();
        });


        $(function() {
            var isOpen = false;
            $('#fpi_title').click(function() {
                if (isOpen) {
                    $('#fpi_feedback').animate({
                            "width": "+=5px"
                        }, "fast")
                        .animate({
                            "width": "55px"
                        }, "slow")
                        .animate({
                            "width": "60px"
                        }, "fast");
                    isOpen = !isOpen;
                } else {
                    $('.fbk_form').show();
                    $('.fbk_final_msg').html('');
                    $('.fbk_final_msg').hide();
                    $('#fpi_feedback').animate({
                            "width": "-=5px"
                        }, "fast")
                        .animate({
                            "width": "405px"
                        }, "slow")
                        .animate({
                            "width": "400px"
                        }, "fast");
                    isOpen = !isOpen;
                }
            });


            $("#fbk_submit").click(function() {

                $('.fbk_loader').show();
                $('#fbk_message_msg').html('');
                var form = $("#feedbackdata").serialize();
                var emailPatt = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var user_email = $.trim($("#fbk_usermail").val());

                if ($.trim($("#fbk_username").val()) == '') {
                    $('.fbk_loader').hide();
                    $('#fbk_message_msg').html(
                        '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Name Can not be blank</div>'
                    );
                } else if ($.trim($("#fbk_usermail").val()) == '') {
                    $('.fbk_loader').hide();
                    $('#fbk_message_msg').html(
                        '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Email Can not be blank</div>'
                    );
                } else if (!emailPatt.test(user_email)) {
                    $('.fbk_loader').hide();
                    $('#fbk_message_msg').html(
                        '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Invalid email iD </div>'
                    );
                } else if ($.trim($("#fbk_message").val()) == '') {
                    $('.fbk_loader').hide();
                    $('#fbk_message_msg').html(
                        '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> massage Can not be blank</div>'
                    );
                } else {
                    $.ajax({
                        type: "POST",
                        url: "https://kolkata.adhoards.com/homelocation/feedback/",
                        data: form,
                        dataType: "json",
                        success: function(data) {
                            if (data.stat == 'sucess') {
                                $('.fbk_loader').hide();
                                $('.fbk_form').hide();
                                $("#feedbackdata")[0].reset();
                                $('.fbk_final_msg').show();
                                $('.fbk_final_msg').html(data.msg);
                            }
                            return false;
                        }
                    });
                }
            });

        });

        function updateEmailAccount(userId) {
            bootbox.dialog({
                message: '<input type="text" class="form-control" value="" placeholder="Email ID" name="email" id="newemail"><br><div id="newemail_msg"></div><br>',
                title: "Change your email",
                buttons: {
                    success: {
                        label: '<i class="glyphicon glyphicon-ok"></i> <b>Update Email</b>',
                        className: "btn btn-success",
                        callback: function() {
                            var theResult = false;
                            var user_email = $('#newemail');
                            var emailPatt = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                            if ($.trim(user_email.val()).length > 0) {
                                if (!emailPatt.test(user_email.val())) {
                                    $('#newemail_msg').html(
                                        '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Invalid email iD </div>'
                                    );
                                } else {
                                    $('#newemail_msg').html('');
                                    // $('.spiner').show();
                                    $.ajax({
                                        type: "POST",
                                        url: "https://my.adhoards.com/useraccount/account/email_check/",
                                        dataType: "json",
                                        data: "emailID=" + $.trim(user_email.val()) + "&uid=" + userId,
                                        success: function(data) {
                                            if (data.result == 'email_exists') {
                                                $('#newemail_msg').html(
                                                    '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> This email id has benn already registered </div>'
                                                );
                                            } else {
                                                $('#newemail_msg').html('');
                                                bootbox.hideAll();
                                                bootbox.dialog({
                                                    closeButton: false,
                                                    className: "loader",
                                                    size: "small",
                                                    message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
                                                });
                                                bootbox.hideAll();
                                                bootbox.dialog({
                                                    closeButton: false,
                                                    message: data.message,
                                                    title: "Email Update",
                                                    buttons: {
                                                        success: {
                                                            label: '<i class="glyphicon glyphicon-ok"></i> <b>Close</b>',
                                                            className: "btn btn-success",
                                                            callback: function() {
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "https://my.adhoards.com/useraccount/dashboard/logout/",
                                                                    dataType: "jsonp",
                                                                    success: function(
                                                                        data
                                                                    ) {
                                                                        var delay =
                                                                            900;
                                                                        setTimeout
                                                                            (function() {
                                                                                    window
                                                                                        .location =
                                                                                        data
                                                                                        .url;
                                                                                },
                                                                                delay
                                                                            );

                                                                    }
                                                                });
                                                            }
                                                        }
                                                    },

                                                });
                                            }
                                        }
                                    });
                                }
                            } else {
                                $('#newemail_msg').html(
                                    '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Please input an email id</div>'
                                );
                            }
                            return theResult;
                        }
                    }
                },

            });
        }

        function showBEmailactive() {
            bootbox.dialog({
                closeButton: false,
                message: "Please change your email-id",
                title: "Email Verification require",
                buttons: {
                    success: {
                        label: '<i class="glyphicon glyphicon-ok"></i> <b>Close</b>',
                        className: "btn btn-success",
                        callback: function() {
                            return true
                        }
                    }
                },

            });
        }
    </script>


    <script type="text/javascript">
        $('.change_ctrl').click(function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            //get the href so we can navigate later
            bootbox.confirm({
                buttons: {
                    confirm: {
                        label: '<i class="glyphicon glyphicon-ok"></i> <b>Procede </b>',
                        className: 'btn btn-warning'
                    },
                    cancel: {
                        label: '<i class="glyphicon glyphicon-remove"></i> <b>Cancel</b>',
                        className: 'btn btn-primary'
                    }

                },
                message: "Are you sure to leave AD Posting Section ? <br> Warning: Your AD Data will be reset.",
                callback: function(result) {
                    if (result) {
                        bootbox.dialog({
                            closeButton: false,
                            className: "loader",
                            size: "small",
                            message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'


                        });
                        $.ajax({
                            type: "POST",
                            url: "https://kolkata.adhoards.com/postingad/resetAdpSes/",
                            success: function(data) {
                                window.location = href;
                            }
                        });
                    }
                }
            });
        });
        $(".user-logout-btn").click(function() {
            bootbox.confirm({
                buttons: {
                    confirm: {
                        label: '<i class="glyphicon glyphicon-ok"></i> <b>Yes please</b>',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        label: '<i class="glyphicon glyphicon-remove"></i> <b>Not now</b>',
                        className: 'btn btn-danger'
                    }

                },
                message: '<h3>Do you want to Logout now ?</h3><div style="font-size:16px; color: #db4360">If you logout then all post ad data will be deleted.</div>',
                callback: function(result) {
                    if (result) {
                        bootbox.hideAll();
                        bootbox.dialog({
                            closeButton: false,
                            className: "loader",
                            size: "small",
                            message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'

                        });

                        $.ajax({
                            type: "POST",
                            url: "https://my.adhoards.com/useraccount/dashboard/logout/",
                            dataType: "jsonp",
                            success: function(data) {
                                var delay = 900;
                                setTimeout(function() {
                                    window.location = data.url;
                                }, delay);

                            }
                        });
                    }
                }
            });

        });

        function forceNumber(element) {
            element
                .data("oldValue", '')
                .bind("paste", function(e) {
                    var validNumber = /^[-]?\d+(\.\d{1,2})?$/;
                    element.data('oldValue', element.val())
                    setTimeout(function() {
                        if (!validNumber.test(element.val()))
                            element.val(element.data('oldValue'));
                    }, 0);
                });
            element
                .keypress(function(event) {
                    var text = $(this).val();
                    if ((event.which != 46 || text.indexOf('.') != -1) && ((event.which < 48 || event.which > 57) && (
                            event.which != 45 || (element[0].selectionStart != 0 || text.indexOf('-') != -2)) && (
                            event.which != 0 && event.which != 8))) {
                        event.preventDefault();
                    }

                    if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && ((element[0]
                            .selectionStart - element[0].selectionEnd) == 0) && (element[0].selectionStart >= element
                            .val().length - 2) && (event.which != 45 || (element[0].selectionStart != 0 || text.indexOf(
                            '-') != -2)) && (event.which != 0 && event.which != 8)) {
                        event.preventDefault();
                    }
                });
        }

        forceNumber($("#area_val"));
    </script>

    <script type="text/javascript">
                                      
                                        function splRmv(strval) {
                                            strval = strval.replace(/[@#!\-$*~|\/<>,\[\]\\;+=_^(){}]/gi, '');
                                            return strval;
                                        }

                                        $("#ad_title").keyup(function(event) {
                                            var temp = this.value;
                                            var i;
                                            var sp = ['!', '[$]', '@', '#', '&', '%', '[*]', '[+]', '[-]', '[=]', '[\,/,^,`]', '[(]', '[)]', '[>]',
                                '[<]', '[;]', '[~]', '[,]', '[|]', '[_]', '[[]', '[{]', '[}]', ']'
                            ];
                            for (i = 0; i < sp.length; i++) {
                                var re = new RegExp(sp[i], 'g');
                                var count = (temp.match(re) || []).length;
                                if (count > 1) {
                                    var str = this.value;
                                    this.value = str.slice(0, str.length - 1);
                                }
                            }
                        });

                        function splRmv1(strval) {
                            strval = strval.replace(/[@#!\-$*~|\/<>,\[\]\\;+=_^(){}]/gi, '');
                            return strval;
                        }

                        function forceNumber(element) {
                            element
                                .data("oldValue", '').bind("paste", function(e) {
                                    var validNumber = /^[-]?\d+(\.\d{1,2})?$/;
                                    element.data('oldValue', element.val())
                                    setTimeout(function() {
                                        if (!validNumber.test(element.val())) element.val(element.data('oldValue'));
                                    }, 0);
                                });
                            element
                                .keypress(function(event) {
                                    var text = $(this).val();
                                    if ((event.which != 46 || text.indexOf('.') != -1) &&
                                        ((event.which < 48 || event.which > 57) && (event.which != 45 || (element[0].selectionStart !=
                                                0 || text.indexOf('-') != -2)) &&
                                            (event.which != 0 && event.which != 8))) {
                                        event.preventDefault();
                                    }

                                    if ((text.indexOf('.') != -1) && (text.substring(text.indexOf('.')).length > 2) && ((element[0]
                                            .selectionStart - element[0].selectionEnd) == 0) &&
                                        (element[0].selectionStart >= element.val().length - 2) && (event.which != 45 || (element[0]
                                            .selectionStart != 0 || text.indexOf('-') != -2)) &&
                                        (event.which != 0 && event.which != 8)) {
                                        event.preventDefault();
                                    }
                                });
                        }
                        //forceNumber($("#price_amt"));
                        $("#quick-pass-close_usrlog").click(function() {
                            $('#quick_hide_email').show();
                            $('#log_msg').html('');
                            $('#ad_name_msg').html('');
                            $('#qk_usr_pass').val('');
                        });
                        $("#quick-pass-close").click(function() {
                            $('#qk_usr_mail').val('');
                            $('#quick_hide_email').show();
                            $('#ad_email').val('');
                            $('#log_msg').html('');
                            $('#ad_name_msg').html('');
                            $('#qk_usr_pass').val('');
                        });
                        $("#forgot_pass_userlog").click(function() {
                            var usrlog_mail = $('#qk_usr_mail_usrlog').val();
                            if (usrlog_mail == '') {
                                $('#qk_usrlog_mail_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Email Require</span>'
                                );
                            } else if (usrlog_mail != '') {
                                $("#quick-pass-input").modal('hide');
                                $("#quick-forgot-pass").modal('show');
                                $("#forgot_qk_usr_mail").val($('#qk_usr_mail_usrlog').val());
                                $('#qk_usr_mail').val('');
                                $('#quick_hide_email').show();
                                $('#log_msg').html('');
                                $('#ad_name_msg').html('');
                                $('#qk_usr_pass').val('');
                            }
                        });
                        $("#forgot_pass").click(function() {
                            $("#quick-pass-input").modal('hide');
                            $("#quick-forgot-pass").modal('show');
                            $("#forgot_qk_usr_mail").val($('#ad_email').val());
                            $('#qk_usr_mail').val('');
                            $('#quick_hide_email').show();
                            $('#log_msg').html('');
                            $('#ad_name_msg').html('');
                            $('#qk_usr_pass').val('');
                        });
                        $("#goto_qk_ulogin").click(function() {
                            $("#quick-pass-input").modal('show');
                            $("#quick-forgot-pass").modal('hide');
                            if ($('#qk_usr_mail_usrlog').val() != '') {
                                $("#qk_usr_mail_usrlog").val($('#qk_usr_mail_usrlog').val());
                                $('#qk_usrlog_mail_msg').html('');
                                $("#reset_pass_msg").html('');
                                $(".qk_usr_mail_show").html($('#qk_usr_mail_usrlog').val());
                            } else {
                                $("#qk_usr_mail").val($('#ad_email').val());
                                $("#reset_pass_msg").html('');
                                $(".qk_usr_mail_show").html($('#ad_email').val());
                            }
                        });
                        $("#forgot-quick-pass-close").click(function() {
                            $("#forgot_qk_usr_mail").val('');
                            $('#ad_email').val('');
                            $('#forgot_qk_usr_mail_msg').html('');
                            $('#reset_pass_msg').html('');
                        });
                        $("#qk_usr_pass").keyup(function(event) {
                            if (event.keyCode == 13) {
                                $("#qk_ulogin_quick").click();
                            }
                        });
                        $("#forgot_qk_usr_mail").keyup(function(event) {
                            if (event.keyCode == 13) {
                                $("#forgot_qk_ulogin_quick").click();
                            }
                        });
                        $("#forgot_qk_ulogin_quick").click(function() {
                            var reset_email_id = $('#forgot_qk_usr_mail').val();
                            $('#forgot_qk_usr_mail_msg').html('');
                            $('#reset_pass_msg').html('');
                            if ($.trim(reset_email_id) == '') {
                                $('#forgot_qk_usr_mail_msg').html(
                                    '<span role="alert" class="alert alert-mini alert-danger"><i class="fa fa-warning"></i> Error, blank email address</span>'
                                );
                            } else {
                                $('.forgt_qk_spiner').show();
                                $.ajax({
                                    type: "POST",
                                    url: "https://my.adhoards.com/useraccount/account/q_resetpassword/",
                                    data: "reset_email_id=" + reset_email_id,
                                    dataType: "jsonp",
                                    success: function(data) {
                                        $('#forgot_qk_usr_mail_msg').html('');
                                        $('#reset_pass_msg').html(data.msg);
                                        $('.forgt_qk_spiner').hide();
                                    }
                                });
                            }
                        });

                        function limitText(field, maxChar) {
                            var ref = $(field),
                                val = ref.val();
                            if (val.length >= maxChar) {
                                ref.val(function() {
                                    return val.substr(0, maxChar);
                                });
                            } else {
                                return 'exceded';
                            }
                        }


                        function flash_save_data(link) {
                            bootbox.dialog({
                                closeButton: false,
                                className: "loader",
                                size: "small",
                                message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
                            });
                            var href = link;
                            var form = $('#form_fields').serializeArray();
                            form.push({
                                name: 'temp_random_number',
                                value: '3607725755980'
                            });
                            tinyMCE.triggerSave();
                            var privacy = $("#post_phone_show").is(':checked') ? 'inactive' : 'active';

                            var common_formData = {
                                'ad_title': $('#ad_title').val(),
                                'ad_post_type': $("input:radio[name=ad_post_type]:checked").val(),
                                'currency': $('#ad_curr_id').val(),
                                'ad_description': $('#ad_description').val(),
                                'ad_youtube_video': $('#ad_youtube_video').val(),
                                'ad_place': $('#ad_place').val(),
                                'ad_name': $('#ad_name').val(),
                                'ad_email': $('#ad_email').val(),
                                'ad_phone': $('#ad_phone').val(),
                                'post_phone_show': privacy,
                                'temp_random_number': 3607725755980
                            };
                            $.ajax({
                                type: "POST",
                                url: "https://kolkata.adhoards.com/postingad/ajax_postingad/postad/notreset/extra_fields/",
                                data: form,
                                success: function(data) {
                                    if (data == 'Data Saved') {
                                        $.ajax({
                                            type: "POST",
                                            url: "https://kolkata.adhoards.com/postingad/ajax_postingad/postad/notreset/common_data/",
                                            data: common_formData,
                                            dataType: "json",
                                            success: function(data) {
                                                if (data.msg == 'Data Saved') {
                                                    window.location.replace(href);
                                                } else if (data.msg == 'Data notSavedinactive') {
                                                    bootbox.dialog({
                                                        closeButton: false,
                                                        title: "",
                                                        message: "Your account is not active.An activation mail have been send to your email id.Please activate your account to continue posting.",
                                                        size: "big",
                                                        buttons: {
                                                            sucess: {
                                                                label: "<span class='glyphicon glyphicon-ok'></span> Ok",
                                                                className: "btn btn-success",
                                                                callback: function() {
                                                                    bootbox.hideAll();
                                                                }
                                                            }
                                                        }
                                                    });
                                                } else if (data.msg == 'Data notSavedactive') {
                                                    bootbox.dialog({
                                                        closeButton: false,
                                                        title: "",
                                                        message: "You have reached your maximum ad limit for today. Please try again tomorrow.",
                                                        size: "big",
                                                        buttons: {
                                                            sucess: {
                                                                label: "<span class='glyphicon glyphicon-ok'></span> Ok",
                                                                className: "btn btn-success",
                                                                callback: function() {
                                                                    bootbox.hideAll();
                                                                }
                                                            }
                                                        }
                                                    });
                                                } else if (data.msg == 'missingtitle') {
                                                    bootbox.dialog({
                                                        closeButton: false,
                                                        title: "",
                                                        message: "Title required. Please try again with title.",
                                                        size: "big",
                                                        buttons: {
                                                            sucess: {
                                                                label: "<span class='glyphicon glyphicon-ok'></span> Ok",
                                                                className: "btn btn-success",
                                                                callback: function() {
                                                                    bootbox.hideAll();
                                                                }
                                                            }
                                                        }
                                                    });
                                                }
                                            }
                                        });
                                    } else if (data == 'Data notSavedinactive') {
                                        bootbox.dialog({
                                            closeButton: false,
                                            title: "",
                                            message: "Your account is not active.An activation mail have been send to your email id.Please activate your account to continue posting.",
                                            size: "big",
                                            buttons: {
                                                sucess: {
                                                    label: "<span class='glyphicon glyphicon-ok'></span> Ok",
                                                    className: "btn btn-success",
                                                    callback: function() {
                                                        bootbox.hideAll();
                                                    }
                                                }
                                            }
                                        });
                                    } else if (data == 'Data notSavedactive') {
                                        bootbox.dialog({
                                            closeButton: false,
                                            title: "",
                                            message: "You have reached your maximum ad limit for today. Please try again tomorrow.",
                                            size: "big",
                                            buttons: {
                                                sucess: {
                                                    label: "<span class='glyphicon glyphicon-ok'></span> Ok",
                                                    className: "btn btn-success",
                                                    callback: function() {
                                                        bootbox.hideAll();
                                                    }
                                                }
                                            }
                                        });
                                    }
                                    //new
                                }
                            });
                        }



                        $(function() {
                            var nowDate = new Date();
                            var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
                            $('.input-append.date').datepicker({
                                weekStart: 1,
                                startDate: today,
                                format: 'dd MM yyyy',
                                todayHighlight: true
                            }).on('changeDate', function(e) {
                                $(this).datepicker('hide');
                            });
                            var validateForm = {
                                'ad_title': function() {
                                    var name = $('#ad_title');
                                    var nametm = $.trim(name.val());
                                    nametm = nametm.replace(/\s/g, "");
                                    if (nametm == '') {
                                        validateForm.errors = true;
                                        $('#ad_title_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Ad title required</span>'
                                        );
                                    } else if (nametm.length < 15) {
                                        validateForm.errors = true;
                                        $('#ad_title_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;position:relative;margin-left:-16%;">Title Should be Minimum 15 Characters </span>'
                                        );
                                    } else if (nametm.length <= 100) {
                                        $("#ad_title_msg").html('');
                                    } else {
                                        validateForm.errors = true;
                                        $('#ad_title_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;" > Title Can be Maximum 100 Characters</span>'
                                        );
                                    }
                                },

                                'upper_lower_case': function() {
                                    var ad_title = $('#ad_title').val();
                                    if (ad_title.isUpperCase()) {
                                        validateForm.errors = true;
                                        $('#ad_title_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;position:relative;margin-left:-16%;">All Uppercase are not allowed </span>'
                                        );
                                        $("#ad_title_msg").show();

                                    }

                                    if (ad_title.isLowerCase()) {
                                        validateForm.errors = true;
                                        $('#ad_title_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;position:relative;margin-left:-16%;">All Lowercase are not allowed </span>'
                                        );
                                        $("#ad_title_msg").show();

                                    }
                                },

                                'ad_place': function() {
                                    var add = $('#ad_place');
                                    var lenad = add.val().length;
                                    if (add.val().length <= 140) {
                                        $("#ad_address_msg").html('');
                                    } else {
                                        validateForm.errors = true;
                                        $('#ad_address_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Address Can be Maximum 140 Characters.</span>'
                                        );
                                    }
                                },
                                'ad_description': function() {
                                    var editorContent = tinymce.get('ad_description').getContent({
                                        format: 'raw'
                                    });

                                    var decoded = $('<div/>').html(editorContent).text();
                                    var txt = decoded;

                                    var rex = /(<([^>]+)>)/ig;

                                    var main = tinyMCE.activeEditor.getContent();
                                    main = main.replace(/(<p[^>]+?>|<p>|<\/p>)/g, '');
                                    main = main.replace(/\&amp;nbsp;/g, '');





                                    if ($.trim(main) == '') {



                                        validateForm.errors = true;

                                        $("#ad_description_msg").html(
                                            '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Description require</span>'
                                        );

                                    } else if (main.length < 20) {

                                        validateForm.errors = true;

                                        $("#ad_description_msg").html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Description should be minimum 20 characters</span>'
                                        );

                                    } else {

                                        validateForm.errors = false;

                                        $("#ad_description_msg").html('');

                                    }



                                },
                                'ad_email_exist': function() {
                                    $('#ad_email_msg').html('');
                                    $('.mail_imp_msg_fixed').html('');
                                    var user_email = $('#ad_email');
                                    var emailPatt = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                                    if (user_email.val().length > 1) {
                                        if (!emailPatt.test(user_email.val())) {
                                            validateForm.errors = true;
                                            $('#ad_email_msg').html(
                                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Invalid Email </span>'
                                            );
                                        } else {
                                            $('#ad_email_msg').html('');
                                        }
                                    } else {
                                        $(".mail_imp_msg").hide();
                                        validateForm.errors = true;
                                        $('#ad_email_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Email ID required</span>'
                                        );
                                    }
                                },
                                'ad_email': function() {
                                    $('#ad_email_msg').html('');
                                    $('.mail_imp_msg_fixed').html('');
                                    var user_email = $('#ad_email');
                                    var emailPatt = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                                    if (user_email.val().length > 1) {
                                        if (!emailPatt.test(user_email.val())) {
                                            validateForm.errors = true;
                                            $('#ad_email_msg').html(
                                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Invalid email iD</span>'
                                            );
                                        } else {
                                            $('#ad_email_msg').html('');
                                            $('.mail_spin').show();
                                            var post_data = $('#ad_email').val();
                                            $.ajax({
                                                type: "GET",
                                                url: "https://kolkata.adhoards.com/postingad/pagead_email_status/" +
                                                    post_data,
                                                dataType: "json",
                                                success: function(data) {
                                                    if (data.msg == 'new_email') {
                                                        $('.mail_spin').hide();
                                                        $('.mail_imp_msg').show();
                                                    } else if (data.msg == 'update_inactive_email') {
                                                        $('.mail_spin').hide();
                                                        $('#mail_update_msg_box').modal('show');
                                                        $('#update_usr_mail').html(user_email.val());
                                                        $('#ad_name').val(data.user_name);
                                                    } else {
                                                        $('.mail_spin').hide();
                                                        $('#qk_usr_mail').val(user_email.val());
                                                        $('#quick_hide_email').hide();
                                                        $("#enter_pass").trigger("click");
                                                        $('div#modal-header_usrlog').hide();
                                                        $('div#usrmail_show').hide();
                                                        $('#qk_ulogin_quick_usrlog').hide();
                                                        $("#forgot_pass_userlog").hide();
                                                        $(".qk_usr_mail_show").html($('#ad_email').val());
                                                        $(".mail_imp_msg").hide();
                                                    }
                                                }
                                            });
                                        }
                                    } else {
                                        $(".mail_imp_msg").hide();
                                        validateForm.errors = true;
                                        $('#ad_email_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert"><i class="fa fa-warning"></i> Email ID require</span>'
                                        );
                                    }
                                },
                                'ad_name': function() {
                                    var user_name = $('#ad_name').val();
                                    if ($.trim(user_name) == '') {
                                        validateForm.errors = true;
                                        $('#ad_name_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Name Can not be blank</span>'
                                        );
                                    } else {
                                        $('#ad_name_msg').html('');
                                    }
                                },

                                'phone_verification': function() {
                                    var loc_isd = $("#loc_isd_txt").val();
                                    var ad_phone = $('#ad_phone').val();
                                    var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
                                    //var phoneno_sa = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{3})$/
                                    var msgverified_stat = $('#msgverified_stat').val();

                                    if (loc_isd == '+55') { // For both 8 & 9 digits
                                        if ($.trim(ad_phone) == '') {
                                            validateForm.errors = true;
                                            $('#phone_no_set').text('');
                                            $('#ad_phone_msg').html(
                                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Phone Number Can not be blank</span>'
                                            );
                                            return 'otpsend';
                                        } else if (ad_phone.trim().length < 8 || ad_phone.trim().length > 9) {
                                            validateForm.errors = true;
                                            $('#phone_no_set').text('');
                                            $('#ad_phone_msg').html(
                                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                                            );
                                            return 'otpsend';
                                        } else {
                                            $('#ad_phone_msg').html('');
                                        }

                                    }
                                    if (loc_isd == '+65') { // For 8 digits only

                                        if ($.trim(ad_phone) == '') {
                                            validateForm.errors = true;
                                            $('#phone_no_set').text('');
                                            $('#ad_phone_msg').html(
                                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Phone Number Can not be blank</span>'
                                            );
                                            return 'otpsend';
                                        } else if (ad_phone.trim().length != 8) {

                                            validateForm.errors = true;
                                            $('#phone_no_set').text('');
                                            $('#ad_phone_msg').html(
                                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                                            );
                                            return 'otpsend';
                                        } else {
                                            $('#ad_phone_msg').html('');
                                        }

                                    } else { // For only 9 digits         

                                        if (loc_isd == '+27' || loc_isd == '+61' || loc_isd == '+254' || loc_isd ==
                                            '+971' || loc_isd == '+62' || loc_isd == '+256') {
                                            if ($.trim(ad_phone) == '') {
                                                validateForm.errors = true;
                                                $('#phone_no_set').text('');
                                                $('#ad_phone_msg').html(
                                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Phone Number Can not be blank</span>'
                                                );
                                                return 'otpsend';
                                            } else if (ad_phone.trim().length != 9) {
                                                validateForm.errors = true;
                                                $('#phone_no_set').text('');
                                                $('#ad_phone_msg').html(
                                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                                                );
                                                return 'otpsend';
                                            } else {
                                                $('#ad_phone_msg').html('');
                                            }

                                        }
                                        if (loc_isd != '+27' && loc_isd != '+61' && loc_isd != '+254' && loc_isd !=
                                            '+971' && loc_isd != '+62' && loc_isd != '+256' && loc_isd != '+55' &&
                                            loc_isd != '+3112') {
                                            //else {
                                            if ($.trim(ad_phone) == '') {
                                                validateForm.errors = true;
                                                $('#phone_no_set').text('');
                                                $('#ad_phone_msg').html(
                                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Phone Number Can not be blank</span>'
                                                );
                                                return 'otpsend';
                                            } else if (!($.trim(ad_phone).match(phoneno))) {
                                                validateForm.errors = true;
                                                $('#phone_no_set').text('');
                                                $('#ad_phone_msg').html(
                                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                                                );
                                                return 'otpsend';
                                            } else {
                                                $('#ad_phone_msg').html('');
                                            }

                                        }
                                    }
                                },
                                'otp_verification': function() {
                                    var user_entered_otp = '',
                                        otp_status = '0';
                                    user_entered_otp = $("#userotp").val();
                                    otp_status = $('#msgverified_stat').val();
                                    if (!($.trim(user_entered_otp))) {
                                        validateForm.errors = true;
                                        $('#phone_no_set').text('');
                                        $('#ad_otp_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter OTP</span>'
                                        );
                                    } else if (otp_status == '0') {
                                        validateForm.errors = true;
                                        $('#ad_otp_msg').html(
                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter OTP or verify your OTP</span>'
                                        );
                                    } else {
                                        $('#ad_otp_msg').html('');
                                    }
                                },

                                'i_agree': function() {
                                    if ($('#i_agree').is(":checked")) {
                                        $('#i_agree_msg').html('');
                                    } else {
                                        validateForm.errors = true;
                                        $('#i_agree_msg').html(
                                            '<span role="alert" class="alert alert-mini alert-danger" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please check this</span>'
                                        );
                                    }
                                },
                                'youtubeVideo': function() {
                                    $('#ad_youtube_video_msg').html('');
                                    var videoLink = $('#ad_youtube_video').val();
                                    if ($.trim(videoLink) != '') {
                                        $('.vid_spin').show();
                                        $.ajax({
                                            type: "POST",
                                            url: "https://kolkata.adhoards.com/postingad/validYVidlink/",
                                            data: 'link=' + videoLink,
                                            success: function(data) {
                                                if (data != '') {
                                                    $('.vid_spin').hide();
                                                    validateForm.errors = true;
                                                    $('#ad_youtube_video_msg').html(
                                                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">' +
                                                        data + '</span>');
                                                } else {
                                                    $('.vid_spin').hide();
                                                    $('#ad_youtube_video_msg').html('');
                                                }
                                            }
                                        });
                                    }
                                },

                                'saveDraft': function() {
                                    bootbox.hideAll();
                                    if (!validateForm.errors) {
                                        bootbox.dialog({
                                            closeButton: false,
                                            className: "loader",
                                            size: "small",
                                            message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
                                        });
                                    
                                        var form = $('#form_fields').serializeArray();
                                        form.push({
                                            name: 'temp_random_number',
                                            value: '3607725755980'
                                        });
                                        tinyMCE.triggerSave();
                                        var privacy = $("#post_phone_show").is(':checked') ? 'inactive' : 'active';
                                        var common_formData = {
                                            'ad_title': $('#ad_title').val(),
                                            'ad_post_type': $("input:radio[name=ad_post_type]:checked").val(),
                                            'currency': $('#ad_curr_id').val(),
                                            'ad_description': $('#ad_description').val(),
                                            'ad_youtube_video': $('#ad_youtube_video').val(),
                                            'ad_place': $('#ad_place').val(),
                                            'ad_name': $('#ad_name').val(),
                                            'ad_email': $('#ad_email').val(),
                                            'ad_phone': $('#ad_phone').val(),
                                            'post_phone_show': privacy,
                                            'temp_random_number': 3607725755980
                                        };
                                        $.ajax({
                                            type: "POST",
                                            url: "{{ url('/ad_preview') }}",
                                            data: form,
                                            success: function(data) {
                                             console.log(data);

                                            }
                                        });
                                    } else {
                                        alert('All require form fields should be filled up properly');
                                    }
                                },
                                'saveDraftSubmit': function() {
                                    bootbox.hideAll();
                                    console.log(validateForm.errors);
                                    if (!validateForm.errors) {
                                        bootbox.dialog({
                                            closeButton: false,
                                            className: "loader",
                                            size: "small",
                                            message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
                                        });
                                                             
                                           
                                        var form = $('#form_fields').serializeArray();
                                        
                                        tinyMCE.triggerSave();
                                        var privacy = $("#post_phone_show").is(':checked') ? 'inactive' : 'active';
                                        var common_formData = {
                                            'ad_title': $('#ad_title').val(),
                                            'ad_post_type': $("input:radio[name=ad_post_type]:checked").val(),
                                            'currency': $('#ad_curr_id').val(),
                                            'ad_description': $('#ad_description').val(),
                                            'ad_youtube_video': $('#ad_youtube_video').val(),
                                            'ad_place': $('#ad_place').val(),
                                            'ad_name': $('#ad_name').val(),
                                            'ad_email': $('#ad_email').val(),
                                            'ad_phone': $('#ad_phone').val(),
                                            'post_phone_show': privacy,
                                           };
                                                for (const [key, val] of Object.entries(common_formData)) {
                                                // console.log(`${key}: ${value}`);
                                                    form.push({ 
                                                    name:key,
                                                    value:val
                                                    });
                                                    };
                                                                       
                                                        // return false
                                                        $.ajax({
                                                            type: "POST",
                                                            headers: {
                                                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                                            },
                                                            //                      url: "postingad/draftpostNoreturn/create/quick_upd/", //$temp_save_val, $is_reset = null,$adpost_data = null
                                                            url: "{{ url('/adpost/adsubmit') }}",
                                                            data: form,
                                                            success: function(data) {

                                                                console.log(data);
                                                             

                                                            }
                                                        });
                                                    } else {
                                                        alert('All require form fields should be filled up properly');
                                                       
                                                    }
                                                }

                                            };

                                            function validxtrfld() {
                                                var inputID = '';
                                                var msg_id = '';
                                                var falseVal = '';
                                                var trueVal = '';
                                                $('#form_fields input.mandetory, select.mandetory, textarea.mandetory').each(function(index) {
                                                    var input = $(this);
                                                    var msg_id = '#' + input.attr('id') + '_msg';
                                                    var divID = '#' + input.attr('id');
                                                    if (($.trim($(this).val()) == "") || ($(this).val() <= 0)) {
                                                        $(msg_id).html(
                                                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;position:relative;">Required</span>'
                                                        );
                                                        falseVal = true;
                                                    } else {
                                                        $(msg_id).html('');
                                                        trueVal = true;
                                                    }
                                                    inputID = input.attr('id');
                                                    if (input.is('input')) {
                                                        $(divID).focus(function(e) {
                                                            $(msg_id).html('');
                                                        });
                                                    } else if (input.is('select')) {
                                                        $('select[id=' + inputID + ']').change(function(e) {
                                                            $(msg_id).html('');
                                                        });
                                                    }
                                                });
                                                var values = '';
                                                if (falseVal) {
                                                    values = {
                                                        stat: 'error'
                                                    };
                                                } else {
                                                    values = {
                                                        stat: 'ok'
                                                    };
                                                }
                                                return values;
                                            }

                                            $('#ad_title').focus(function(e) {
                                                $('#ad_title_msg').html('');
                                            })

                                            $("#preview-ad").click(function() {
                                                validateForm.errors = false;
                                                validateForm.ad_title();
                                                validateForm.ad_place();
                                                validateForm.youtubeVideo();
                                                validateForm.ad_description();
                                                validateForm.upper_lower_case();
                                                validateForm.ad_email_exist();
                                                validateForm.i_agree();
                                                validateForm.ad_name();
                                                validateForm.phone_verification();
                                                validateForm.otp_verification();
                                                var valid = validxtrfld();
                                                if (valid.stat == 'ok') {
                                                    if ($('#ad_title').val().trim().length < 15) {
                                                        validateForm.errors = true;
                                                    }

                                                    if (countwords_skill($('#skills').val()) !== true) {
                                                        return false;
                                                    }
                                                    validateForm.saveDraft();
                                                    return false;
                                                } else {
                                                    alert('All require form fields should be filled up properly');
                                                }
                                            });
                                            $("#postAdSubmit").click(function() {
                                                validateForm.errors = false;
                                                validateForm.ad_title();
                                                validateForm.ad_place();
                                                validateForm.youtubeVideo();
                                                validateForm.ad_description();
                                                validateForm.upper_lower_case();
                                                // validateForm.ad_email_exist();
                                                validateForm.i_agree();
                                                validateForm.ad_name();
                                                // validateForm.phone_verification();
                                                // validateForm.otp_verification();
                                                validateForm.saveDraftSubmit();
                                                console.log('ddd');
                                                return false;
                                                var valid = validxtrfld();
                                                if (valid.stat == 'ok') {
                                                    if ($('#ad_title').val().trim().length < 15) {
                                                        validateForm.errors = true;
                                                    }
                                                    if (countwords_skill($('#skills').val()) !== true) {
                                                        return false;
                                                    }
                                                    validateForm.saveDraftSubmit();
                                                    return false;
                                                } else {
                                                    alert('All require form fields should be filled up properly');
                                                    return false
                                                }
                                            });

                                            $('#ad_title').blur(validateForm.ad_title);
                                            $('#ad_place').blur(validateForm.ad_place);
                                            $('#ad_youtube_video').blur(validateForm.youtubeVideo);
                                            // $('#ad_email').blur(validateForm.ad_email);
                                            $('#ad_name').blur(validateForm.ad_name);
                                            // $('#ad_phone').blur(validateForm.phone_verification);
                                            // $('#userotp').blur(validateForm.otp_verification);
                                        });

                                       
                                  
                                        $(".quick_check").click(function(event) {
                                            var link = $(this).attr('href');
                                            event.preventDefault();
                                            $.ajax({
                                                type: "POST",
                                                url: "https://kolkata.adhoards.com/postingad/PageAdSubmit/",
                                                success: function(data) {
                                                    if (data != 'block') {
                                                        flash_save_data(link);
                                                    } else {
                                                        bootbox.dialog({
                                                            closeButton: false,
                                                            title: "User status block",
                                                            message: "You are deactivate user",
                                                            size: "small",
                                                            buttons: {
                                                                sucess: {
                                                                    label: "<span class='glyphicon glyphicon-ok'></span> Ok",
                                                                    className: "btn btn-success",
                                                                    callback: function() {
                                                                        bootbox.confirm({
                                                                            buttons: {
                                                                                confirm: {
                                                                                    label: '<i class="glyphicon glyphicon-ok"></i> <b>Yes please</b>',
                                                                                    className: 'btn btn-success'
                                                                                },
                                                                                cancel: {
                                                                                    label: '<i class="glyphicon glyphicon-remove"></i> <b>Not now</b>',
                                                                                    className: 'btn btn-danger'
                                                                                }
                                                                            },
                                                                            message: '<h3>Do you want to Logout now ?</h3>',
                                                                            callback: function(result) {
                                                                                if (result) {
                                                                                    bootbox.hideAll();
                                                                                    bootbox.dialog({
                                                                                        closeButton: false,
                                                                                        className: "loader",
                                                                                        size: "small",
                                                                                        message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
                                                                                    });
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url: "https://my.adhoards.com/useraccount/dashboard/logout/",
                                                                                        dataType: "jsonp",
                                                                                        success: function(
                                                                                            data) {
                                                                                            var delay =
                                                                                                900;
                                                                                            setTimeout
                                                                                                (function() {
                                                                                                        window
                                                                                                            .location =
                                                                                                            data
                                                                                                            .url;
                                                                                                    },
                                                                                                    delay
                                                                                                );
                                                                                        }
                                                                                    });
                                                                                }
                                                                            }
                                                                        });
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    }
                                                }
                                            });
                                        });

                                    </script>

    <script>
        function chk_my_otp() {
            //event.preventDefault();

            var user_entered_otp = '';
            user_entered_otp = $("#userotp").val();
            var ad_phone = $("#ad_phone").val();
            var loc_isd = $("loc_isd_txt").val();
            if ($.trim(user_entered_otp)) {
                $('.otp_spin').show();
                $.ajax({
                    type: "POST",
                    url: "https://kolkata.adhoards.com/postingad/otp_verification/" + $.trim(user_entered_otp) +
                        "/" + $.trim(ad_phone) + "/" + $.trim(loc_isd),
                    success: function(data) {
                        $('.otp_spin').hide();
                        $('#ad_phone_msg').html('');
                        $('#ad_otp_msg').html('');
                        if (data == 'otp_verified') {
                            $('#msgverified_stat').val('1');
                            $('#getoptp_id').hide();
                            $('#otp_btn').hide();
                            $('#ad_phone').attr('readonly', 'readonly');
                            $('#userotp').attr('readonly', 'readonly');
                            $('#ad_phone_msg').html(
                                '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">Verified</span>'
                            );
                            $('#ad_otp_msg').html(
                                '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">Verified</span>'
                            );
                        } else if (data == 'text_expired') {
                            $('#msgverified_stat').val('0');
                            $('#ad_otp_msg').html(
                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Text Or OTP Expired</span>'
                            );
                        } else {
                            $('#msgverified_stat').val('0');
                            $('#ad_otp_msg').html(
                                '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Invalid</span>'
                            );
                        }
                    }
                });
            } else {
                $('#ad_otp_msg').html(
                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter OTP</span>'
                );
            }
        }
    </script>

    <script>
        function sent_otp(ad_phone = '', loc_isd = '') {

            var loc_isd = $("#loc_isd_txt").val();

            var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;

            if (!($.trim(ad_phone))) {

                $('#phone_no_set').text('');

                $('#ad_phone_msg').html(
                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Phone Number Can not be blank</span>'
                );

            }

            if (loc_isd == '+55') {
                //alert('hi');
                //if(ad_phone.trim().length == 8 || ad_phone.trim().length == 9) {
                if (ad_phone.trim().length > 7 && ad_phone.trim().length < 10) {
                    $('#ad_phone_msg').html('');
                    $('.phone_spin').show();
                    $.ajax({
                        type: "POST",
                        url: "https://kolkata.adhoards.com/postingad/sent_otp/" + $.trim(ad_phone) + "/" + $.trim(
                            loc_isd),
                        success: function(data) {
                            $('.phone_spin').hide();
                            var dataarr = data.split('@@@');
                            var msg = dataarr[0];
                            var resend = dataarr[1];
                            if (resend == 'resend') {
                                $('#getoptp_id').html('Get Code');
                            }
                            if (msg == 'sent_three_times') {
                                $('#ad_otp_msg').html('');
                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Three Times Sent.Try With Other</span>'
                                );
                            } else if (msg == 'failure') {
                                $('#ad_otp_msg').html('');
                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Some Error.Try Again.</span>'
                                );
                            } else if (msg == 'success') {
                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">OTP Sent Successfully</span>'
                                );
                            }
                        }

                    });
                } else {
                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please enter a valid Number</span>'
                    );
                }
            }

            if (loc_isd == '+65') {

                if (ad_phone.trim().length != 8) {

                    $('#phone_no_set').text('');

                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                    );

                    return 'otpsend';

                }

                if (ad_phone.trim().length == 8) {

                    //alert("aaaaa");

                    $('#ad_phone_msg').html('');

                    $('.phone_spin').show();

                    $.ajax({

                        type: "POST",

                        url: "https://kolkata.adhoards.com/postingad/sent_otp/" + $.trim(ad_phone) + "/" + $.trim(
                            loc_isd),

                        success: function(data) {

                            $('.phone_spin').hide();

                            var dataarr = data.split('@@@');

                            var msg = dataarr[0];

                            var resend = dataarr[1];

                            if (resend == 'resend') {

                                $('#getoptp_id').html('Get Code');

                            }

                            if (msg == 'sent_three_times') {

                                $('#ad_otp_msg').html('');

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Three Times Sent.Try With Other</span>'
                                );

                            } else if (msg == 'failure') {

                                $('#ad_otp_msg').html('');

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Some Error.Try Again.</span>'
                                );

                            } else if (msg == 'success') {

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">OTP Sent Successfully</span>'
                                );

                            }

                        }

                    });

                }
            }

            if (loc_isd == '+27' || loc_isd == '+61' || loc_isd == '+254' || loc_isd == '+971' || loc_isd == '+62' ||
                loc_isd == '+256') { //for south africa,australia

                if (ad_phone.trim().length != 9) {

                    $('#phone_no_set').text('');

                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                    );

                    return 'otpsend';

                }

                if (ad_phone.trim().length == 9) {

                    $('#ad_phone_msg').html('');

                    $('.phone_spin').show();

                    $.ajax({

                        type: "POST",

                        url: "https://kolkata.adhoards.com/postingad/sent_otp/" + $.trim(ad_phone) + "/" + $.trim(
                            loc_isd),

                        success: function(data) {

                            $('.phone_spin').hide();

                            var dataarr = data.split('@@@');

                            var msg = dataarr[0];

                            var resend = dataarr[1];

                            if (resend == 'resend') {

                                $('#getoptp_id').html('Get Code');

                            }

                            if (msg == 'sent_three_times') {

                                $('#ad_otp_msg').html('');

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Three Times Sent.Try With Other</span>'
                                );

                            } else if (msg == 'failure') {

                                $('#ad_otp_msg').html('');

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Some Error.Try Again.</span>'
                                );

                            } else if (msg == 'success') {

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">OTP Sent Successfully</span>'
                                );

                            }

                        }

                    });

                }

            } else { ///south africa end
                if (!($.trim(ad_phone).match(phoneno))) {

                    $('#phone_no_set').text('');

                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Please Enter Vaild Phone Number </span>'
                    );

                    return 'otpsend';

                } else {

                    $('#ad_phone_msg').html('');

                    $('.phone_spin').show();

                    $.ajax({

                        type: "POST",

                        url: "https://kolkata.adhoards.com/postingad/sent_otp/" + $.trim(ad_phone) + "/" + $.trim(
                            loc_isd),

                        success: function(data) {

                            $('.phone_spin').hide();

                            var dataarr = data.split('@@@');

                            var msg = dataarr[0];

                            var resend = dataarr[1];

                            if (resend == 'resend') {

                                $('#getoptp_id').html('Get Code');

                            }

                            if (msg == 'sent_three_times') {

                                $('#ad_otp_msg').html('');

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Three Times Sent.Try With Other</span>'
                                );

                            } else if (msg == 'failure') {

                                $('#ad_otp_msg').html('');

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;">Some Error.Try Again.</span>'
                                );

                            } else if (msg == 'success') {

                                $('#ad_phone_msg').html(
                                    '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">OTP Sent Successfully</span>'
                                );

                            }

                        }

                    });

                }
            }
        }
    </script>
    <script>
        //$(document).ready(function(){

        function ad_otp_details_chk() {
            var uid = '';
            uid = $("#userid_otp").val();
            var email = $("#ad_email").val();
            var ad_phone = $('#ad_phone').val();
            var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            var loc_isd = $("#loc_isd_txt").val();

            if ($.trim(ad_phone) == '') {
                $('#phone_no_set').text('');
                $('#ad_phone_msg').html(
                    '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Phone Number Can not be blank</span>'
                );
            }

            if (loc_isd == '+55') {
                if (ad_phone.trim().length < 8 || ad_phone.trim().length > 9) {
                    $('#phone_no_set').text('');
                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Phone Number</span>'
                    );
                    $('#getoptp_id').hide();
                    $('#enter_otp_sec').hide();
                } else {
                    $('#ad_phone_msg').html('');
                    if ($.trim(uid)) {
                        $('#ad_phone_msg').html('');
                        $.ajax({
                            type: "POST",
                            url: "https://kolkata.adhoards.com/postingad/check_otp_verified_no/" + $.trim(ad_phone),
                            success: function(data) {
                                if (data == 'verified') {
                                    $("#enter_otp_sec").hide();
                                    $("#getoptp_id").hide();
                                    $('#msgverified_stat').val('1');
                                    $("#userotp").val('1');
                                    $('#ad_phone_msg').html(
                                        '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">Phone No Verified</span>'
                                    );
                                } else {
                                    $('#msgverified_stat').val('0');
                                    $('#userotp').val('');
                                    $("#enter_otp_sec").show();
                                    $("#enter_otp_sec").show();
                                    $("#getoptp_id").show();
                                }
                            }
                        });
                    } else {
                        $('#msgverified_stat').val('0');
                        $('#userotp').val('');
                        $("#enter_otp_sec").show();
                        $("#enter_otp_sec").show();
                        $("#getoptp_id").show();
                        $('#ad_email_msg').html(
                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Email ID</span>'
                        );
                    }
                }
            }

            if (loc_isd == '+65') {
                if (ad_phone.trim().length != 8) {
                    $('#phone_no_set').text('');
                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Phone Number</span>'
                    );
                    $('#getoptp_id').hide();
                    $('#enter_otp_sec').hide();
                } else {
                    $('#ad_phone_msg').html('');
                    if ($.trim(uid)) {
                        $('#ad_phone_msg').html('');
                        $.ajax({
                            type: "POST",
                            url: "https://kolkata.adhoards.com/postingad/check_otp_verified_no/" + $.trim(ad_phone),
                            success: function(data) {
                                if (data == 'verified') {
                                    $("#enter_otp_sec").hide();
                                    $("#getoptp_id").hide();
                                    $('#msgverified_stat').val('1');
                                    $("#userotp").val('1');
                                    $('#ad_phone_msg').html(
                                        '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">Phone No Verified</span>'
                                    );
                                } else {
                                    $('#msgverified_stat').val('0');
                                    $('#userotp').val('');
                                    $("#enter_otp_sec").show();
                                    $("#enter_otp_sec").show();
                                    $("#getoptp_id").show();
                                }
                            }
                        });
                    } else {
                        $('#msgverified_stat').val('0');
                        $('#userotp').val('');
                        $("#enter_otp_sec").show();
                        $("#enter_otp_sec").show();
                        $("#getoptp_id").show();
                        $('#ad_email_msg').html(
                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Email ID</span>'
                        );
                    }

                }

            }
            if (loc_isd == '+27' || loc_isd == '+61' || loc_isd == '+254' || loc_isd == '+971' || loc_isd == '+62' ||
                loc_isd == '+256') {
                if (ad_phone.trim().length != 9) {
                    $('#phone_no_set').text('');
                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Phone Number</span>'
                    );
                    $('#getoptp_id').hide();
                    $('#enter_otp_sec').hide();
                } else {
                    $('#ad_phone_msg').html('');
                    if ($.trim(uid)) {
                        $('#ad_phone_msg').html('');
                        $.ajax({
                            type: "POST",
                            url: "https://kolkata.adhoards.com/postingad/check_otp_verified_no/" + $.trim(ad_phone),
                            success: function(data) {
                                if (data == 'verified') {
                                    $("#enter_otp_sec").hide();
                                    $("#getoptp_id").hide();
                                    $('#msgverified_stat').val('1');
                                    $("#userotp").val('1');
                                    $('#ad_phone_msg').html(
                                        '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">Phone No Verified</span>'
                                    );
                                } else {
                                    $('#msgverified_stat').val('0');
                                    $('#userotp').val('');
                                    $("#enter_otp_sec").show();
                                    $("#enter_otp_sec").show();
                                    $("#getoptp_id").show();
                                }

                            }
                        });
                    } else {
                        $('#msgverified_stat').val('0');
                        $('#userotp').val('');
                        $("#enter_otp_sec").show();
                        $("#enter_otp_sec").show();
                        $("#getoptp_id").show();
                        $('#ad_email_msg').html(
                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Email ID</span>'
                        );
                    }

                }

            }
            if (loc_isd != '+65' && loc_isd != '+55' && loc_isd != '+27' && loc_isd != '+61' && loc_isd != '+254' &&
                loc_isd != '+971' && loc_isd != '+62' && loc_isd != '+256') {
                if (!($.trim(ad_phone).match(phoneno))) {
                    $('#phone_no_set').text('');
                    $('#ad_phone_msg').html(
                        '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Phone Number</span>'
                    );
                } else {
                    $('#ad_phone_msg').html('');
                    if ($.trim(uid)) {
                        $('#ad_phone_msg').html('');
                        $.ajax({
                            type: "POST",
                            url: "https://kolkata.adhoards.com/postingad/check_otp_verified_no/" + $.trim(ad_phone),
                            success: function(data) {
                                if (data == 'verified') {
                                    $("#enter_otp_sec").hide();
                                    $("#getoptp_id").hide();
                                    $('#msgverified_stat').val('1');
                                    $("#userotp").val('1');
                                    $('#ad_phone_msg').html(
                                        '<span class="alert alert-mini alert-success" role="alert" style="color:#457A25;font-size:12px;font-weight:500px;">Phone No Verified</span>'
                                    );
                                } else {
                                    $('#msgverified_stat').val('0');
                                    $('#userotp').val('');
                                    $("#enter_otp_sec").show();
                                    $("#enter_otp_sec").show();
                                    $("#getoptp_id").show();
                                }
                            }

                        });
                    } else {
                        $('#msgverified_stat').val('0');
                        $('#userotp').val('');
                        $("#enter_otp_sec").show();
                        $("#enter_otp_sec").show();
                        $("#getoptp_id").show();
                        $('#ad_email_msg').html(
                            '<span class="alert alert-mini alert-danger" role="alert" style="color:#b94a48;font-size:12px;font-weight:500px;"> Please Enter Valid Email ID</span>'
                        );
                    }

                }
            }
        }

        function firstzerocheck() {
            var ad_phone = $("#ad_phone").val();
            ad_phone = $.trim(ad_phone);
            if (ad_phone.charAt(0) == '0') {
                if (ad_phone.length > 1) {
                    $('#ad_phone').val(ad_phone.slice(1));
                } else {
                    $('#ad_phone').val('');
                }
            }
        }

        function title_space_remove() {
            var ad_title = $("#ad_title").val();
            ad_title = ad_title.replace(/ {2,}/g, ' ');
            $("#ad_title").val(ad_title);
        }

        function select_salary_unit() {

            if ((($('#price_amt').val()) > 0) && ($('#price_amt').length > 0)) {
                $('#salary-unit').addClass('mandetory');
                $('#sal_unit').addClass('mandetory');
                $('#salary-unit_amt').html(
                    '<label for="salary-unit" id="salary-unit_amt">Salary Unit<sup><img alt="required" src="https://www.adhoards.com/assets/images/required_star.gif"></sup></label>'
                );
            } else {
                $('#salary-unit_amt').removeClass('mandetory');
            }
        }

        $('#price_amt').on('blur', function() {
            select_salary_unit();
        })

        $(function() {
            $('#price_amt').on('blur', function() {
                var ammount = $('#price_amt').val();
                //alert(ammount);
                var currency = $('#ad_curr_id').val();
                $.ajax({
                    type: "POST",
                    url: "https://kolkata.adhoards.com/postingad/currency_change/" + currency +
                        "/" + ammount,
                    success: function(data) {
                        //alert(data);
                        //$('#price_amt').val("");
                        $('#price_amt').val(data);
                    }
                });
            });


        });

        function countwords_skill(str) {
            var count = 0;
            var error = 0;
            var str2 = str.split(',');
            var str1 = str.replace(/,/g, '');
            if (str1 == '') {
                error++;
            }
            var i, str3;
            for (i = 0; i < str2.length; i++) {
                str3 = str2[i].replace(/,/g, '');
                if (str3 == '') {
                    error++;
                }
            }
            if (error == 0 && str2.length >= 2 && str2.length <= 15) {
                return true;
            } else {
                alert("minimum 2 Skill with maximum of 15 skills");
                return false;
            }
        }


        String.prototype.isUpperCase = function() {
            var str = this.replace(/\d+/g, '');
            return str.valueOf().toUpperCase() === str.valueOf();
        };

        String.prototype.isLowerCase = function() {
            var str = this.replace(/\d+/g, '');
            return str.valueOf().toLowerCase() === str.valueOf();
        };
    </script>
    <script type="text/javascript">
        //Dropzone.autoDiscover = false;
        // Get the template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        document.querySelector(".just_hide").style.display = "block";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            //url: "", // Set the url
            url: "https://kolkata.adhoards.com/postingad/processimg/addnew/3607725755980", //new
            maxFiles: 4,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoProcessQueue: true,
            maxFilesize: 256,
            autoDiscover: false,
            //        addRemoveLinks: true,
            autoQueue: true, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
            init: function() {
                thisDropzone = this;
                var fc = 0;
                $.getJSON('https://kolkata.adhoards.com/postingad/processimg/getfiles/3607725755980', function(
                    data) {
                    $.each(data, function(index, val) {
                        var mockFile = {
                            name: val.name,
                            size: val.size
                        };
                        //$(".cancel").hide();
                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                        //file.previewTemplate.appendChild(document.createTextNode(responseText));
                        thisDropzone.options.success.call(thisDropzone, mockFile);
                        thisDropzone.on("success", function(file, response) {
                            file.serverId = response;
                            //$(file.previewTemplate).append('<span class="server_file">' + response + '</span>');
                        });
                        //myDropzone.files.push(mockFile);

                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile,
                            "http://www.adhoards.com/adimgtemp/2023/06/03/1685xzb2/" + val
                            .name)
                        fc += 1;
                    });
                    thisDropzone.options.maxFiles -= fc;
                    //alert(fc);
                });

                this.on("success", function(file, response) {
                    file.serverId = response;
                });

                this.on("removedfile", function(file) {
                    if (!file.serverId) {
                        return;
                    }
                    //$.get("" + file.serverId);
                    $('.del_loader').show();
                    $.ajax({
                        url: "https://kolkata.adhoards.com/postingad/processimg/delete/3607725755980", // Set the url
                        type: "GET",
                        data: {
                            'name': file.serverId
                        },
                        success: function(data) {
                            //if(data=='deleted file'){
                            $('.del_loader').hide();
                            myDropzone.options.maxFiles += 1;
                            //}
                        }
                    });
                });
            }
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file);
            };
        });
        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });
        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1";
            //document.querySelector(".just_hide").style.display = "block";
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });
        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0";
        });

        myDropzone.on("maxfilesexceeded", function(file) {
            alert("Maximum 4 files are allowed");

        });

        myDropzone.on("removedfile", function(file) {
            //alert(file.name);
            $('.del_loader').show();
            $.ajax({
                url: "https://kolkata.adhoards.com/postingad/processimg/delete/3607725755980", // Set the url
                type: "GET",
                data: {
                    'name': file.name
                },
                success: function(data) {
                    //if(data=='deleted file'){
                    $('.del_loader').hide();
                    myDropzone.options.maxFiles += 1;
                    //}
                }
            });
        });
    </script>