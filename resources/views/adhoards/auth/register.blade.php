<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<!--<![endif]-->

<head>

    <meta http-equiv="encoding" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 ,user-scalable=no">
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Adhoards Classified" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Adhoards" />


    <meta name="title" content="Adhoards  Classified | User Registration" />
    <meta name="description"
        content="Kolkata free classified ad posting site for Jobs, For sale, Service, Real Estate, Community, Business Opportunity, Automotive, Personals, Events" />
    <meta name="keywords"
        content="classified ads online,free classified ads online,free online classified ads,classified online ads,internet advertising,online internet advertising,business opportunity,real estate lead generation,jobs,real estate" />
    <link rel="canonical" href="http://my.adhoards.com/" />

    <title>Adhoards Classified | User Registration</title>

    <meta property="og:title" content="Kolkata Classified | Jobs Businesss Service | Online Classified Ads" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="my.adhoards.com" />
    <meta name="geo.placename" content="Kolkata" />
    <meta name="DC.Publisher" content="Adhoards">





    <!-- Bootstrap core CSS -->

    <link href="//static.adhoards.com/assets/stylesheets/front_theme.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/stylesheets/jquery.feedBackBox.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/jquery.mmenu.all.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/extensions/jquery.mmenu.themes.css" type="text/css"
        rel="stylesheet" />
    <link href="//static.adhoards.com/assets/mobassets/css/bootstrap.css" rel="stylesheet" />
    <style type="text/css">
        #menu {
            width: 100%;
            height: 100%;
        }

        .blur {
            background: url("//static.adhoards.com/assets/images/no_ad.png") no-repeat scroll 0 0 / 100% 100% transparent;
            height: 100%;
            position: absolute;
            width: 100%;
            z-index: 999;
        }

        /*div.fbFeedbackContent{min-height: 165px!important}*/
    </style>

    <!-- THE SHOWBIZ STLYES -->

    <link rel="stylesheet" type="text/css" href="//static.adhoards.com/assets/stylesheets/range.css" media="screen" />
    <script src="//static.adhoards.com/assets/javascripts/jquery-1.11.1.min.js"></script>


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="//static.adhoards.com/assets/javascripts/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="//static.adhoards.com/assets/javascripts/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="//static.adhoards.com/assets/javascripts/html5shiv.min.js"></script>
          <script src="//static.adhoards.com/assets/javascripts/respond.min.js"></script>
        <![endif]-->

    <link rel="shortcut icon" href="//static.adhoards.com/assets/images/favicon.ico" />
    <link rel="apple-touch-icon" href="//static.adhoards.com/assets/images/apple-touch-icon.png">

</head>

<body class="page">

    <div id="page-content">
        @include('adhoards.component.page_header')

        <!-- Begin page content -->
        <div class="container">
            <!--<div class="row">-->




            <link href="https:///fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
            <style type="text/css">
                @media (min-width: 361px) {
                    .tab-height-register {
                        min-height: 600px;
                    }
                }

                span.label {
                    font-family: serif;
                    font-weight: normal;
                }

                span.buttonText {
                    display: inline-block;
                    vertical-align: middle;
                    padding-left: 42px;
                    padding-right: 42px;
                    font-size: 14px;
                    /* Use the Roboto font that is loaded in the <head> */
                    font-family: 'Roboto', sans-serif;
                }

                .btn_google {
                    -moz-user-select: none;
                    background-image: none;

                    border-radius: 4px;
                    cursor: pointer;


                    font-weight: normal;
                    line-height: 1.42857;
                    margin-bottom: 0;
                    padding: 6px 12px;
                    text-align: center;

                    white-space: nowrap;
                }
            </style>
            <style>
                .btn-primary_google {
                    background-color: #C53929;
                    border-color: #C53929;
                    color: #fff;
                }

                .gplus-margin {
                    margin-top: -10px;
                }
            </style>
            <style>
                .heading {
                    padding-bottom: 10px;
                    margin-bottom: 3px;
                    border-bottom: 1px solid #ccc;
                    font-size: 17px;
                    padding: 0px 0px 0px 86px;
                }
            </style>
            <script src="https:///apis.google.com/js/api:client.js"></script>
            <script>
                var googleUser = {};
                var startApp = function() {
                    gapi.load('auth2', function() {
                        auth2 = gapi.auth2.init({
                            client_id: '522715201731-95mh2uepq6rrrava063g1sstids0c9v6.apps.googleusercontent.com',
                            cookiepolicy: 'single_host_origin',
                        });
                        attachSignin(document.getElementById('customBtn'));
                    });
                };

                function attachSignin(element) {
                    console.log(element.id);
                    auth2.attachClickHandler(element, {},
                        function(googleUser) {
                            var profile = googleUser.getBasicProfile();
                            var email = profile.getEmail();
                            var name = profile.getName();
                            var google_plus_id = profile.getId();

                            if (typeof email != 'undefined' || email != null && typeof name != 'undefined' || name != null &&
                                typeof google_plus_id != 'undefined' || google_plus_id != null) {

                                $('#fb-login').hide();
                                $('#other_login_id').val($('#other_login_id').val() + google_plus_id);
                                $.post("https://my.adhoards.com/useraccount/account/google_plus_login/", {
                                    usr_mail: email,
                                    usr_name: name,
                                    other_login_id: google_plus_id
                                }, function(data) {
                                    if (data == "error") {
                                        alert("This Email id is already exists but it is in inactive mode");
                                    }
                                    location.href = data;


                                });
                            }
                        },
                        function(error) {
                            alert(JSON.stringify(error, undefined, 2));
                        });
                }
            </script>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pad">
                <div style="padding-bottom:10px; margin-bottom: 30px; border-bottom: 1px solid #ccc; font-size: 20px">
                    User Registration
                </div>



                <div class="col-xs-12 col-md-6 reg-form-block" style="margin-top:7px;">
                    <p class="text-primary" id="fld_rqur_txt"><span class="glyphicon glyphicon-star"></span> All
                        fields are required</p>
                    <font color="red"></font>
                    <form id="reg_form" class="">

                        <div class="form-group marg-bot" style="margin-top:-9px;">
                            <!--<label class="col-sm-3 control-label">Name <sup><img src="required_star.gif" alt="required" /></sup></label>-->
                            <div class="col-xs-10 no-pad" id="user_name_msg"></div>
                            <div class="col-xs-10 controls no-pad">
                                <input type="text" class="form-control" name="user_name" id="user_name"
                                    placeholder="Your Name ..." value="">
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group marg-bot">
                            <!--<label class="col-sm-3 control-label">Email <sup><img src="required_star.gif" alt="required" /></sup></label>-->
                            <div class="col-xs-10 no-pad" id="user_email_msg"></div>
                            <div class="col-xs-10 controls no-pad">
                                <input type="text" class="form-control" name="user_email" id="user_email"
                                    placeholder="Your email id ..." value="">
                            </div>
                            <div class="col-xs-2 mini_pad_t" id='emailldr' style="display:none"><img
                                    src="//static.adhoards.com/assets/images/ajax-spinner.gif" width="20"></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group marg-bot">
                            <div class="col-xs-10 no-pad" id="user_pass_msg"></div>
                            <div class="col-xs-10 controls no-pad">
                                <input type="password" class="form-control" name="user_pass" id="user_pass"
                                    placeholder="Input your password ...">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group marg-bot">
                            <div class="col-xs-10 no-pad" id="captcha_code_msg"></div>
                            <div class="col-xs-10 controls no-pad">
                            </div>
                            <div class="col-xs-2 mini_pad_t">
                                <div class="code_spin" style="display:none"><img
                                        src="//static.adhoards.com/assets/images/ajax-spinner.gif" width="20"
                                        style="padding-top:2px;"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group marg-bot">
                            <div class="col-xs-10 no-pad">
                                <div style="position: relative">
                                    <div id="recaptcha"
                                        style="transform:scale(0.88);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0;">
                                    </div>

                                    <div style="position: absolute; left:180px; bottom:40px;width:100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group marg-bot">
                            <div class="col-xs-12 no-pad">
                                <div class="col-xs-10 no-pad" id="i_agree_reg_msg"></div>
                                <label for="i_agree" class="checkbox inline col-sm-12" style="font-weight:normal">
                                    <input type="checkbox" id="i_agree_reg" name="i_agree" value=""
                                        checked="checked">
                                    <div class="rad_check_text">I Accept <a href="http://www.adhoards.com/terms.htm"
                                            target="_blank">Terms</a> of Adhoards</div>
                                </label>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group marg-bot">

                            <div class="col-xs-12 controls">
                                <a href="javascript:void(0)" id="doRegister" class="btn btn-success">
                                    <span class="glyphicon glyphicon-save"></span> Register
                                </a>
                            </div>
                            <div class="col-xs-12 final_msg" style="margin-top:5px;"></div>
                            <div class="clearfix"></div>
                        </div>
                        <input type="hidden" id="other_login_id" name="other_login_id" value="">
                    </form>
                </div>
                <!--	</div>-->
                <div class="col-xs-12 col-md-6">
                    <div class="panel" style="box-shadow: none">

                        <p class="text-primary">Or you can register / login your Adhoards accounts by your social
                            accounts</p>

                        <div class="panel-body">
                            <div class="col-xs-6 col-sm-6 col-md-12" style='margin-bottom: 5px;padding: 0px;'>
                                <button id="fb-login" class="btn btn-primary btn-block"> <span
                                        class="fa fa-facebook"></span> Register / Login with
                                    Facebook</button><br /><br />
                                <div id="gSignInWrapper">
                                    <span class="label"></span>
                                    <div id="customBtn" class="customGPlusSignIn">
                                        <span class="buttonText btn_google btn-primary_google" style="width:100%;"><i
                                                class="fa fa-google-plus"></i>Register</span>
                                    </div>
                                </div>
                                <div id="name"></div>
                            </div>

                            <br />

                        </div>
                    </div>

                </div>
            </div>

            <!--	    <div class="clearfix"></div>

    </div>-->



            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no-pad">
                <div class="side_bar pull-right">

                </div>
            </div>
            <script>
                startApp();
            </script>
        </div>
    </div>

    <div class="clearfix"></div>

    <div id="test">
        <div id="fpi_feedback">
            <div id="fpi_title" class="rotate">
                <div class="fb_btn">Feedback</div>
            </div>
            <div id="fpi_content">
                <div class="fbk_final_msg" style="display: none"></div>
                <div class="fbk_form">
                    <div id="fpi_header_message">Please feel free to leave us feedback.</div>
                    <form id="feedbackdata">
                        <div class="form-group"><input type="text" class="form-control" id="fbk_username"
                                name="fbk_username" placeholder="Name">
                            <div id="fbk_username_msg"></div>
                        </div>
                        <div class="form-group"><input type="text" class="form-control" name="fbk_usermail"
                                id="fbk_usermail" placeholder="Email">
                            <div id="fbk_usermail_msg"></div>
                        </div>
                        <div class="form-group"><select id="fbk_type" name="fbk_type" class="form-control">
                                <option value="fbk" selected="selected">Feedback</option>
                                <option value="rb">Report an Error</option>
                                <option value="sgs">Suggestion</option>
                            </select></div>
                        <div class="form-group">
                            <textarea name="fbk_message" id="fbk_message" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">

                            <div style="float: left; width: 50%;"><a id="fbk_submit" class="btn btn-success "
                                    rel="nofollow"><i class="fa fa-envelope"></i> Send Feedback</a></div><span
                                class="fbk_loader" style="display: none"><img
                                    src="//static.adhoards.com/assets/images/ajax-spinner.gif" width="30"
                                    alt="Feedback Form"></span>
                            <div style="float: left;  width: 50%" id="fbk_message_msg"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/jquery.mmenu.all.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/extensions/jquery.mmenu.themes.css"
        type="text/css" rel="stylesheet" />
    <script src="//static.adhoards.com/assets/javascripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https:///code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
    <script src="//statictbootbx.adhoards.com/assets/javascripts/bootstrap.js"></script>
    <script src="//static.adhoards.com/assets/javascripts/ie-emulation-modes-warning.js" async></script>
    <script src="//static.adhoards.com/assets/javascripts/jquery.cookie.js"></script>
    <script src="//statictbootbx.adhoards.com/assets/javascripts/bootstrap-typeahead.min.js"></script>
    <script src="//statictbootbx.adhoards.com/assets/javascripts/bootbox.js"></script>
    <link href="https:///statictdtsvwfd.adhoards.com/assets/stylesheets/jquery.feedBackBox.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="//static.adhoards.com/assets/javascripts/ie10-viewport-bug-workaround.js"></script>
    <script src="//statictquer.adhoards.com/assets/jQuery.mmenu-master/js/jquery.mmenu.min.all.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        <!--
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
        // 
        -->
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
                        url: "https://my.adhoards.com/homelocation/feedback/",
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
        function genCaptcha_cmpl() {
            $('.cmpl_captcha_spin').show();
            $("#cmpl_printCaptcha").attr("src", "http://www.adhoards.com/system/process/showCaptcha/");
            $("#cmpl_printCaptcha").on("load", function() {
                $('.cmpl_captcha_spin').hide();
            });

        }


        $(function() {
            var validateForm = {
                'userName': function() {
                    var user_name = $('#user_name').val();
                    var alphaOnly = /^[a-zA-Z\.\() ]*$/;
                    if ($.trim(user_name) == '') {
                        validateForm.errors = true;
                        $('#user_name_msg').html(
                            '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Name Can not be blank</div>'
                            );
                    } else {
                        if (!alphaOnly.test($.trim(user_name))) {
                            validateForm.errors = true;
                            $('#user_name_msg').html(
                                '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Require Alphabet Only</div>'
                                );
                        } else {
                            $('#user_name_msg').html('');
                        }
                    }
                },
                'userEmail': function() {
                    $('div#emailldr').show();
                    var user_email = $('#user_email');
                    var emailPatt = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

                    if (user_email.val().length > 0) {

                        if (!emailPatt.test(user_email.val())) {
                            $('div#emailldr').hide();
                            validateForm.errors = true;
                            $('#user_email_msg').html(
                                '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Invalid email iD </div>'
                                );
                        } else {
                            $('#user_email_msg').html('')


                            var emailID = $.trim(user_email.val());
                            //$.post("", {email_id: emailID}, 
                            $.ajax({
                                type: "POST",
                                url: "https://my.adhoards.com/useraccount/account/unique_active_email/",
                                //async: false,
                                data: 'emailID=' + emailID,
                                success: function(data) {
                                    //alert(data);
                                    $('div#emailldr').hide();
                                    if (data == 'email_exists') {
                                        validateForm.errors = true;
                                        $('#user_email_msg').html(
                                            '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> This email id has benn already registered </div>'
                                            );
                                    } else {
                                        $('#user_email_msg').html('');
                                    }
                                }
                            });

                        }
                    } else {
                        $('div#emailldr').hide();
                        validateForm.errors = true;
                        $('#user_email_msg').html(
                            '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Email ID required</div>'
                            );
                    }

                },

                'userPass': function() {
                    var user_pass = $('#user_pass');
                    $('#user_pass_msg').html('');

                    if ($.trim(user_pass.val()).length < 1) {
                        validateForm.errors = true;
                        //$('#user_pass').attr("readonly", true);
                        $('#user_pass_msg').html(
                            '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Password Required</div>'
                            );
                    } else {
                        if (user_pass.val().length >= 6 && user_pass.val().length <= 18) {
                            var alpha = /^[a-zA-Z]+$/;
                            var number = /^[0-9]+$/;
                            var letters = true;
                            var numbers = true;

                            if (letters == true && numbers == true) {
                                $('#user_pass_msg').html('');

                            } else {
                                validateForm.errors = true;
                                $('#user_pass_msg').html(
                                    '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Should be alpha-numeric</div>'
                                    );
                            }
                        } else {
                            validateForm.errors = true;
                            $('#user_pass_msg').html(
                                '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Required length 6-18</div>'
                                );
                        }
                    }
                },
                'userCPass': function() {
                    var user_cpass = $('#user_cpass');
                    var user_pass = $('#user_pass');
                    $('#user_cpass_msg').html('');


                    if (user_cpass.val().length < 1) {
                        validateForm.errors = true;
                        $('#user_cpass_msg').html(
                            '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Confirm Password required</div>'
                            );
                    } else {
                        if (user_cpass.val() == user_pass.val()) {
                            $('#user_cpass_msg').html('');
                        } else {
                            validateForm.errors = true;
                            $('#user_cpass_msg').html(
                                '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> Confirm Password not match</div>'
                                );
                        }
                    }

                },

                'captcha_verify': function() {
                    if (grecaptcha.getResponse() == "") {
                        validateForm.errors = true;
                        $('#captcha_code_msg').html(
                            "<div role='alert' class='alert alert-mini alert-short'><i class='fa fa-warning'></i>Please Verify Your Captcha</div> "
                            )
                    } else {
                        $('#captcha_code_msg').html('')
                    }
                },
                'i_agree_reg': function() {
                    //var agree = $('#i_agree').val();

                    if ($('#i_agree_reg').is(":checked")) {
                        $('#i_agree_reg_msg').html('');
                    } else {
                        validateForm.errors = true;
                        $('#i_agree_reg_msg').html(
                            '<div role="alert" class="alert alert-mini alert-short"><i class="fa fa-warning"></i> You have to accept Terms</div>'
                            );
                    }
                },
                'sendIt': function() {
                    //$('#doRegister').hide();
                    $('#quick-register').modal('hide');
                    bootbox.dialog({
                        closeButton: false,
                        className: "loader",
                        size: "small",
                        message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'

                    });

                    if (!validateForm.errors) {
                        var form = $("#reg_form").serialize();

                        $.ajax({
                            type: "POST",
                            url: "https://my.adhoards.com/useraccount/account/doregister/",
                            data: form,
                            dataType: "json",
                            success: function(data) {

                                if (data.result == 'success') {
                                    if (typeof data.result1 != 'undefined' && data.result1 ==
                                        'success') {
                                        var google_login = data.redirect1;
                                        $.ajax({
                                            url: google_login,
                                            success: function(data1) {
                                                location.href = data1;
                                            }
                                        });
                                    } else {
                                        window.location.replace(data.redirect);
                                    }
                                } else {
                                    bootbox.hideAll();
                                    //$('#doRegister').show();
                                    $('.final_msg').html(
                                        '<span role="alert" class="alert alert-mini alert-danger"><i class="fa fa-warning"></i>Please correct all errors before submit form</span>'
                                        );

                                }
                            }
                        });
                    } else {
                        bootbox.hideAll();
                        //$('#doRegister').show();
                        $('.final_msg').html(
                            '<span role="alert" class="alert alert-mini alert-danger"><i class="fa fa-warning"></i>Please correct all errors before submit form</span>'
                            );
                    }

                }

            };

            $('#doRegister').on('click', function() {
                validateForm.errors = false;
                validateForm.userName();
                validateForm.userEmail();
                validateForm.userPass();
                //validateForm.userCPass();
                validateForm.captcha_verify();
                validateForm.i_agree_reg();

                validateForm.sendIt();

                return false;
            });


            $('#user_name').blur(validateForm.userName);
            $('#user_email').blur(validateForm.userEmail);
            $('#user_pass').blur(validateForm.userPass);
            $('#user_pass').keyup(validateForm.userPass);
            //$('#user_cpass').blur(validateForm.userCPass);
            //$('#user_cpass').keyup(validateForm.userCPass);
            //$('#captcha_code').blur(validateForm.captchaVal);

            //        $("#user_name, #user_email, #user_pass, #user_cpass, #captcha_code").keyup(function (event) {
            $("#user_name, #user_email, #user_pass").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#doRegister").click();
                }
            });

        });
    </script>
    <script>
        //Load the Facebook JS SDK FOR LOGIN FACEBOOK
        (function(d) {
            var js, id = 'facebook-jssdk',
                ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement('script');
            js.id = id;
            js.async = true;
            js.src = "https:///connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));

        // Init the SDK upon load
        window.fbAsyncInit = function() {
            FB.init({
                appId: 521417071238488, // App ID'521417071238488',
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true // parse XFBML
            });


            // Specify the extended permissions needed to view user data
            // The user will be asked to grant these permissions to the app (so only pick those that are needed)
            var permissions = [
                'email',
            ].join(',');

            // Specify the user fields to query the OpenGraph for.
            // Some values are dependent on the user granting certain permissions
            var fields = [
                'id',
                'name',
                'email'
            ].join(',');

            function showDetails() {
                FB.api('/me', {
                    fields: fields
                }, function(details) {
                    // output the response
                    $('#userdata').html(JSON.stringify(details, null, '\t'));
                    $('#fb-login').attr('style', 'display:none;');
                    $.post("https://my.adhoards.com/useraccount/account/fblogin/", {
                        usr_mail: details.email,
                        usr_name: details.name,
                        other_login_id: details.id
                    }, function(data) {
                        if (data == "error") {
                            $('#user_name').val(details.name);
                            $('#user_email').val(details.email);
                        } else {
                            //            if(data != 'error'){
                            //             document.getElementById('user_email').attributes.add("readonly","readonly");
                            //            }
                            bootbox.dialog({
                                closeButton: false,
                                className: "loader",
                                size: "small",
                                message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'

                            });
                            location.href = data;
                        }
                    });


                });
            }


            $('#fb-login').click(function() {
                //initiate OAuth Login
                FB.login(function(response) {
                    // if login was successful, execute the following code
                    if (response.authResponse) {
                        showDetails();
                    }
                }, {
                    scope: permissions
                });
            });

        };
    </script>


    <script>
        function un_conf() {
            var unsub = $('#ud').val();
            //var confrm = $("input[name=unsub]:checked").val();
            var confrm = document.querySelector('input[name="unsub"]:checked').value;
            // alert('ud'+unsub);
            // alert(confrm);
            if (confrm == 'y') {
                $.ajax({
                    url: "unsub_process",
                    type: 'post',
                    data: {
                        value: unsub
                    },
                    success: function(res) {
                        if (res == 'success') {
                            alert('Successfully Unsubscribe');
                        } else {
                            alert('Unsuccessful');
                        }
                    }
                });
            }
        }
    </script>
@include('adhoards.component.page_footer')

    <!-- Google Code for Remarketing Tag -->
    <!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 878916553;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt=""
                src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/878916553/?guid=ON&amp;script=0" />
        </div>
    </noscript>

    <script src='https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit' async defer></script>
    <script>
        var recaptcha;
        var myCallBack = function() {

            recaptcha = grecaptcha.render('recaptcha', {
                'sitekey': '6LfpxjUUAAAAAK6FmCtiNjZwihY0cAxFywUVe1Ey',
                'theme': 'light'
            });
        };
    </script>


</body>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-36731567-1', 'auto', {
        'legacyCookieDomain': '.adhoards.com'
    });
    ga('send', 'pageview');
</script>

</html>
