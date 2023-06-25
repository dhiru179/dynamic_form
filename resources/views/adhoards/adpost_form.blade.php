<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="zOyhpE3IsnlORTESnZTEhCISVzrQ5D52Fkpfb5u48GQ" />
    <meta content="utf-8" http-equiv="encoding">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 ,user-scalable=no">
    <title> :: Addhoads Classified</title>


    <link rel="shortcut icon" href="//static.adhoards.com/assets/images/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="Latest Ads" href="http://www.adhoards.com/rss/" />

    <!-- Bootstrap core CSS -->
    <link href="//static.adhoards.com/assets/stylesheets/fonts.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/stylesheets/front_theme.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/stylesheets/jquery.feedBackBox.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/jquery.mmenu.all.css" rel="stylesheet">
    <style type="text/css">
        #menu {
            width: 100%;
            height: 100%;
        }

        #actions {
            margin: 2em 0;
        }


        /*Mimic table appearance*/
        /*            div.table {
                            display: table;
                        }
                        div.table .file-row {
                            display: table-row;
                        }
                        div.table .file-row > div {
                            display: table-cell;
                            vertical-align: top;
                            border-top: 1px solid #ddd;
                            padding: 8px;
                        }
                        div.table .file-row:nth-child(odd) {
                            background: #f9f9f9;
                        }*/



        /*The total progress gets shown by event listeners*/
        #total-progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

        /*Hide the progress bar when finished*/
        #previews .file-row.dz-success .progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

        /*Hide the delete button initially*/
        #previews .file-row .delete {
            display: none;
        }

        /*Hide the start and cancel buttons and show the delete button*/

        #previews .file-row.dz-success .start,
        #previews .file-row.dz-success .cancel {
            display: none;
        }

        #previews .file-row.dz-success .delete {
            display: inline-block;
            margin-top: 5px;
        }
    </style>
    <link href="//static.adhoards.com/assets/stylesheets/datepicker.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" type="text/css"
        href="//static.adhoards.com/assets/lighteditor/src/bootstrap-wysihtml5.css" />

    <script src="//static.adhoards.com/assets/javascripts/jquery-1.11.1.min.js"></script>
    <script src="//static.adhoards.com/assets/javascripts/ie-emulation-modes-warning.js"></script>


</head>

<body class="page">

    <div id="page-content">
        @include('adhoards.component.page_header')
        <!-- Begin page content -->
        <div class="container">
            <!--<div class="row">-->



            <style>
                .progress {
                    display: none !important;
                }

                .text-success {
                    display: none !important;
                }

                .kv-file-upload {
                    display: none !important;
                }

                .kv-file-zoom {
                    display: none !important;
                }

                .file-upload-indicator {
                    display: none !important;
                }

                .file-preview-frame {
                    border: 1px solid #ddd !important;
                    box-shadow: 1px 1px 5px 1px #a2958a !important;
                }

                .file-preview-frame:hover {
                    box-shadow: 1px 1px 5px 1px #a2958a !important;
                }

                @media (min-width: 361px) {
                    .control-label-tab {
                        margin-bottom: 0;
                        padding-top: 7px;
                    }

                    .address-tab {
                        width: 511px;
                        height: 56px;
                    }
                }

                @media (max-width:360px) {
                    .address-tab {
                        width: 252px;
                        height: 42px;
                    }
                }

                .badge {
                    font-size: 10px;
                }

                .post_phone_show {
                    margin-bottom: 5px;
                }

                #post_phone_show {
                    outline: 0px;
                }

                .ph_ht {
                    height: 38px !important;
                }

                #sizing-addon1 {
                    padding: 6px 16px !important;
                }
            </style>
            <link href="//static.adhoards.com/assets/mobassets/css/fileinput-desktop.css?v=3" media="all"
                rel="stylesheet" type="text/css" />
            <script src="//static.adhoards.com/assets/mobassets/js/fileinput-desktop.js" async></script>
            <div style="background-color:#fff;padding-bottom: 20px;" class="col-md-12 no-pad">
                <div style="color: rgb(3, 179, 203); padding: 10px; font-size: 15px;" class="col-md-2 no-pad">
                    <div style="text-align:center;width: 40px; height: 40px; border-radius: 50px; border: 1px solid rgb(3, 179, 203); margin-right: 5px;"
                        class="col-md-2 no-pad"><i class="fa fa-map-marker fa-lg"
                            style="margin-top: 13px;color: rgb(3, 179, 203);;"></i></div>
                    <div style="margin-left: 40px; margin-top: 10px;"> Location Selected </div>
                </div>
                <div class="col-md-2"
                    style="border: 1px solid rgb(173, 209, 174); border-radius: 153px; padding: 10px;">
                    <i class="fa fa-check fa-2x" style="color:#C0E1C2; margin-top: -8px;"></i>
                    <span>Country Selected</span><br>
                    <div style="color: rgb(29, 95, 31); font-size: 14px; padding-left: 32px; font-weight: bold;">India
                    </div>
                </div>
                <div class="col-md-3"
                    style="border: 1px solid rgb(173, 209, 174); border-radius: 153px; padding: 10px;margin-left: 10px;">
                    <i class="fa fa-check fa-2x" style="color:#C0E1C2; margin-top: -8px;"></i>
                    <span>State Selected</span><br>
                    <div style="color: rgb(29, 95, 31); font-size: 14px; padding-left: 32px; font-weight: bold;">West
                        Bengal</div>
                </div>
                <div class="col-md-3"
                    style="border: 1px solid rgb(173, 209, 174); border-radius: 153px; padding: 10px;margin-left: 10px;">
                    <i class="fa fa-check fa-2x" style="color:#C0E1C2; margin-top: -8px;"></i>
                    <span>City Selected</span><br>
                    <div style="color: rgb(29, 95, 31); font-size: 14px; padding-left: 32px; font-weight: bold;">
                        Kolkata</div>
                </div>
                <div id="loc_edit" class="mini_pad " style="float:right;">
                    <a style="text-decoration: none;" class="pull-right quick_check "
                        href="https://kolkata.adhoards.com/postingad/pagelocset/3607725755980">
                        <div
                            style="width: 40px;height: 40px;background: #dfdfdf;border-color: #71f6f6;-moz-border-radius: 50px;-webkit-border-radius: 50px;border-radius: 50px;border:1px solid #03B3CB;">
                            <i style="margin-top: 13px;padding-left: 13px;color: #000000;" aria-hidden="true"
                                class="fa fa-pencil-square-o fa-lg"></i>
                        </div>
                        fgfffffffffg
                    </a>
                </div>
            </div>
            <div style="background-color:#fff;padding-bottom: 20px;" class="col-md-12 no-pad">
                <div style="color: rgb(3, 179, 203); padding: 10px; font-size: 15px;" class="col-md-2 no-pad">
                    <div style="text-align:center;width: 40px; height: 40px; border-radius: 50px; border: 1px solid rgb(3, 179, 203); margin-right: 5px;"
                        class="col-md-2 no-pad"><i class="fa fa-folder-open-o fa-lg"
                            style="margin-top: 13px;color: rgb(3, 179, 203);;"></i></div>
                    <div style="margin-left: 40px; margin-top: 10px;">Category Selected </div>
                </div>
                <div class="col-md-2"
                    style="border: 1px solid rgb(173, 209, 174); border-radius: 153px; padding: 10px;">
                    <i class="fa fa-check fa-2x" style="color:#C0E1C2; margin-top: -8px;"></i>
                    <span>Main Category </span><br>
                    <div style="color: rgb(29, 95, 31); font-size: 14px; padding-left: 32px; font-weight: bold;">Jobs
                    </div>
                </div>
                <div class="col-md-3"
                    style="border: 1px solid rgb(173, 209, 174); border-radius: 153px; padding: 10px;margin-left: 10px;">
                    <i class="fa fa-check fa-2x" style="color:#C0E1C2; margin-top: -8px;"></i>
                    <span>Sub Category</span><br>
                    <div style="color: rgb(29, 95, 31); font-size: 14px; padding-left: 32px; font-weight: bold;">
                        Accounting / Finance</div>
                </div>
                <div id="loc_edit" class="mini_pad " style="float:right;">
                    <a style="text-decoration: none;" class="pull-right quick_check "
                        href="https://kolkata.adhoards.com/postingad/pagecatset/3607725755980">
                        <div
                            style="width: 40px;height: 40px;background: #dfdfdf;border-color: #71f6f6;-moz-border-radius: 50px;-webkit-border-radius: 50px;border-radius: 50px;border:1px solid #03B3CB;">
                            <i style="margin-top: 13px;padding-left: 13px;color: #000000;" aria-hidden="true"
                                class="fa fa-pencil-square-o fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="adposting-box">
                <div class="panel panel-primary">
                    <!--        <div class="panel-heading">-->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-paper-plane-o"></i> Post your AD -- Input your AD
                            Details</h3>
                        <input type="hidden" name="msgverified_stat" id="msgverified_stat" value="0">
                        <input type="hidden" name="userid_otp" id="userid_otp" value="">
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:20px">
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Job Title <sup><img
                                                src="//static.adhoards.com/assets/images/required_star.gif"
                                                alt="required" /></sup></label>
                                    <div class="col-sm-6 text-right"><span id="ad_title_msg"></span></div>
                                    <div class="col-sm-12 controls">
                                        <input class="form-control" type="text" name="ad_title" id="ad_title"
                                            style="width:100%" minlength="15" maxlength="100"
                                            onkeyup="title_space_remove()" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Type</label>
                                        <div class="col-sm-9 controls">
                                            <div class="radio inline col-sm-12">
                                                <input type="radio" value="offer" name="ad_post_type"
                                                    checked="checked">
                                                <div class="rad_check_text">Placing an Offer</div>
                                            </div>
                                            <div class="radio inline col-sm-12">
                                                <input type="radio" value="want" name="ad_post_type">
                                                <div class="rad_check_text">I Need</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label mini_pad">YouTube Video</label>
                                        <div class="col-sm-9 controls">
                                            <input type="text" class="form-control" name="ad_youtube_video"
                                                id="ad_youtube_video">
                                            <div class="vid_spin" style="display: none"><img
                                                    src="//static.adhoards.com/assets/images/ajax-spinner.gif"
                                                    width="20" style="padding-top:5px;"></div>
                                            <div class="col-sm-12 no-pad" style="padding-top: 10px;"
                                                id="ad_youtube_video_msg"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label mini_pad">Address</label>
                                        <div class="col-sm-8 text-right"><span id="ad_address_msg"></span></div>
                                        <div class="col-sm-8 controls">
                                            <textarea class="form-control" name="ad_place" id="ad_place" maxlength="140"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 mini_pad">
                                <div class="col-sm-12 control-label form-label"
                                    style="padding-left: 5px; padding-right: 5px;">
                                    <label class="col-sm-6 control-label pull-left">Job Description <sup><img
                                                src="//static.adhoards.com/assets/images/required_star.gif"
                                                alt="required" /></sup></label>
                                    <div id="ad_description_msg" class="pull-right"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-12 controls" style="padding-right: 0px;">
                                    <textarea class="ad_description form-control" name="ad_description" placeholder="Enter Description ..."
                                        cols="80" rows="10">&nbsp;</textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:20px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <form id="form_fields" class="form-horizontal">
                                    <div class="cat_fields row">
                                        @foreach ($inputOptions as $item)
                                            @php
                                                
                                                $pos = strpos($item->type, ' ');
                                                // echo !empty($pos)."-".$pos."<br>";
                                                
                                                if (!empty($pos)) {
                                                    $exp = explode(' ', $item->type);
                                                    $tagName = $exp[0];
                                                    $tagType = $exp[1];
                                                } else {
                                                    $tagName = $item->type;
                                                }
                                                
                                            @endphp
                                            @if ($tagName == 'input')
                                                <div class="mb-3 dynamic col-md-3">
                                                    
                                                    <label
                                                        for="form_input{{ $item->id }}">{{ $item->label }}</label>
                                                    <input type="{{ $tagType }}" class=""
                                                        id="form_input{{ $item->id }}">
                                                 
                                                </div>
                                            @elseif($tagName == 'dropdown')
                                                <div class="mb-3 col-md-3">
                                                    <label for="form_input{{ $item->id }}">{{ $item->label }}</label>

                                                    <select class="form-control" name="" id="form_input{{$item->id}}">
                                                        <option value="">--</option>

                                                        @if (count(json_decode($item->option)) > 0)
                                                            @foreach (json_decode($item->option) as $value)
                                                                <option value='{{ $value }}'>
                                                                    {{ $value }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                              
                                                </div>
                                            @elseif($tagName == 'textarea')
                                                <div class="mb-3 col-md-3">
                                                    <label for="form_input{{$item->id }}">{{ $item->label}}</label>
                                                    <textarea class="form-control" name="" id="form_input{{ $item->id }}" cols="3" rows="2"></textarea>
                                                
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>




                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div>
                                <div class="col-sm-3 text-primary"
                                    style="font-size: 20px; padding-left:0; padding-right:0">Upload Company Logo</div>
                                <div class="col-sm-5 text-center" style="padding-left:0; padding-right:0">
                                    <p style="padding-top:6px;" class="text-danger">
                                        Maximum image file size 2Mb, Only 1 file is allowed
                                    </p>
                                </div>
                                <div class="col-sm-4 controls text-right" style="padding-top: 5px;">
                                    <div class="label label-info ad-label" style="font-size: 13px;"><b>image format
                                            ::</b> .gif , .jpeg , .jpg , .png </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>


                            <input id="input-700" accept="image/*;capture=camera" name="file" type="file"
                                class="file-loading">
                            <div class="border-bot"></div>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                            <form class="form-horizontal">
                                <fieldset>
                                    <legend>Contact Information</legend>
                                    <div class="form-horizontal" id="quick_hide_email">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Email-id <span class="badge">published</span>
                                                <sup><img src="//static.adhoards.com/assets/images/required_star.gif"
                                                        alt="required" /></sup>
                                            </label>
                                            <div class="col-sm-5 controls"><input type="text" class="form-control"
                                                    name="ad_email" id="ad_email" value=""></div>
                                            <div class="col-sm-4 controls" style="padding-top: 5px;">
                                                <span class="mail_spin" style="display: none"><img
                                                        src="//static.adhoards.com/assets/images/ajax-spinner.gif"
                                                        width="20" style="padding-top:5px;"></span>
                                                <span id="ad_email_msg" style="padding-top: 5px;"></span>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-md-offset-4  controls">
                                                <div class="mail_imp_msg" style="display:none; font-size: 13px;">
                                                    This email id is not registered with us. If you had any account with
                                                    Adhoards then <a data-toggle="modal" href=""
                                                        class="btn-link quick_usrlog">Click Here</a> for login, or you
                                                    can register by activating your account when you click on "Submit
                                                    Ad" button.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Name <span class="badge">published</span>
                                                <sup><img src="//static.adhoards.com/assets/images/required_star.gif"
                                                        alt="required" /></sup>
                                            </label>
                                            <div class="col-sm-5 controls">
                                                <input type="text" class="form-control" name="ad_name"
                                                    id="ad_name" value="">
                                            </div>
                                            <div class="col-sm-4 controls" id="ad_name_msg"
                                                style="padding-top: 5px;"></div>
                                        </div>
                                    </div>

                                    <div class="form-horizontal" style="margin:0;">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-pad" style="text-align:left;">
                                                Phone number <span class="badge">published</span>
                                                <sup><img src="//static.adhoards.com/assets/images/required_star.gif"
                                                        alt="required" /></sup>
                                            </label>
                                            <div class="col-sm-5 controls">

                                                <div class="input-group input-group-lg ph_ht">
                                                    <span class="input-group-addon ph_ht"
                                                        id="sizing-addon1">+91</span>
                                                    <input type="text" class="form-control ph_ht" name="ad_phone"
                                                        onblur="ad_otp_details_chk();firstzerocheck();"
                                                        oninput="ad_otp_details_chk();firstzerocheck();"
                                                        id="ad_phone" maxlength="14"
                                                        onkeypress="return isNumberOnly(event);">
                                                    <input type="hidden" name="loc_isd_txt" id="loc_isd_txt"
                                                        value="+91">
                                                </div>

                                                <a id="getoptp_id"
                                                    onclick="sent_otp($('#ad_phone').val(), $('#loc_isd_txt').val())"
                                                    class="btn btn-default btn-md"
                                                    style="float:right;margin-top: 5px;display: none;">Get OTP</a>
                                            </div>
                                            <div class="col-sm-4 controls" style="padding-top: 5px;">

                                                <span class="phone_spin" style="display: none"><img
                                                        src="//static.adhoards.com/assets/images/ajax-spinner.gif"
                                                        width="20" style="padding-top:5px;"></span>
                                                <span id="ad_phone_msg" style="padding-top: 5px;"></span>

                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-3 hidden-xs hidden-sm post_phone_show"></div>
                                        <div class="col-md-3 hidden-xs hidden-sm post_phone_show"></div>
                                        <div class="clearfix"></div>

                                    </div>

                                    <div class="form-horizontal" id="enter_otp_sec" style="display:none;">
                                        <div class="col-md-12 col-sm-12 col-xs-12"
                                            style="font-size:12px;color: #868688;">Please input the One Time Password
                                            which was sent to your Phone Number</div><br /><br />
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Enter OTP
                                                <sup><img src="//static.adhoards.com/assets/images/required_star.gif"
                                                        alt="required" /></sup>
                                            </label>
                                            <div class="col-sm-4 controls">
                                                <input type="text" class="form-control" name="userotp"
                                                    id="userotp" maxlength="8">

                                                <a id="otp_btn" onclick="chk_my_otp()"
                                                    class="btn btn-default btn-md"
                                                    style="float:right;margin-top: 5px;">Verify</a>

                                            </div>
                                            <div class="col-sm-5 controls" style="padding-top: 5px;">
                                                <span class="otp_spin" style="display: none"><img
                                                        src="//static.adhoards.com/assets/images/ajax-spinner.gif"
                                                        width="20" style="padding-top:5px;"></span>
                                                <span id="ad_otp_msg" style="padding-top: 5px;"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3 hidden-xs hidden-sm post_phone_show"></div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 post_phone_show"
                                        style="font-size:12px;color: #868688;">
                                        <input type="checkbox" name="post_phone_show" id="post_phone_show"> Maintain
                                        my Privacy (Don't show my phone number) <i class="fa fa-lock fa-1x"></i>
                                    </div>
                                    <div class="col-md-3 hidden-xs hidden-sm post_phone_show"></div>
                                    <div class="clearfix"></div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="col-xs-12 col-sm-12" style="margin: 20px 0px 10px 0px;">
                            <div class="col-xs-12 col-md-8 text-center">
                                <div style="margin-top: 10px;">
                                    <p class="text-center">
                                        <span id="i_agree_msg"></span>
                                        <input type="checkbox" id="i_agree" name="i_agree" checked="checked"> By
                                        clicking <strong>Submit Ad</strong>, you agree to our <a
                                            href="http://www.adhoards.com/terms.htm" target="_blank"
                                            style="font-size:14px;text-decoration: underline">Terms</a> and that you
                                        have read our <a href="http://www.adhoards.com/privacy-policy.htm"
                                            target="_blank" style="font-size:14px;text-decoration: underline">Privacy
                                            Policy</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2 text-center">
                                <!--<a href="javascript:void(0)" id="preview-ad" class="btn btn-yellow btn-lg">-->
                                <a href="javascript:void(0)" class="btn btn-yellow btn-lg quick_check_preview_ad">
                                    <i class="fa fa-eye"></i> Preview Ad
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-2 text-center">
                                <!--<a href="javascript:void(0)" id="post_ad" class="btn btn-primary btn-lg">-->
                                <a href="javascript:void(0)" id="postAdSubmit"
                                    class="btn btn-primary btn-lg quick_check_post_ad">
                                    <i class="fa fa-upload"></i> Submit Ad
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style=""><a class="btn-link" id="enter_pass" href="#quick-pass-input"
                    data-toggle="modal"></a></div>

            <div class="modal fade" id="quick-pass-input" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!--<div class="modal-header" >-->
                        <div class="modal-header" id="modal-header">
                            <!--id newly add -->
                            <button type="button" class="close" id="quick-pass-close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Input password for "<span
                                    class='qk_usr_mail_show'></span>"</h4>
                        </div>
                        <div class="modal-header" id="modal-header_usrlog">
                            <!--newly add -->
                            <button type="button" class="close" id="quick-pass-close_usrlog" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">User Login </h4>
                        </div>
                        <div class="modal-body">
                            <form id="qck_login_form" class="form-horizontal">
                                <div class="form-group" style="display: none">
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-5 controls">
                                        <input class="form-control" type="text" name="qk_usr_mail"
                                            id="qk_usr_mail">
                                    </div>
                                    <div class="col-sm-4 mini_pad_t" id="qk_usr_mail_msg"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group" style="" id="usrmail_show">
                                    <!--newly add -->
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-5 controls">
                                        <input class="form-control" type="text" name="qk_usr_mail"
                                            id="qk_usr_mail_usrlog">
                                    </div>
                                    <div class="col-sm-4 mini_pad_t" id="qk_usrlog_mail_msg"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-5 controls">
                                        <input class="form-control" type="password" name="qk_usr_pass"
                                            id="qk_usr_pass">
                                    </div>
                                    <div class="col-sm-4 mini_pad_t" id="qk_usr_pass_msg"></div>
                                    <div class="col-sm-4 mini_pad_t" id="log_msg"></div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3">
                                        <span class="qk_spiner" style="display: none">
                                            <img src="//static.adhoards.com/assets/images/ajax-spinner.gif"
                                                width="20" style="padding-top:5px;">
                                        </span>
                                    </label>
                                    <div class="col-sm-3 controls">
                                        <a id='qk_ulogin_quick' href="javascript:void(0)" class="btn btn-success ">
                                            <i class="fa fa-lock"></i> Quick Login
                                        </a>
                                        <a id='qk_ulogin_quick_usrlog' href="javascript:void(0)"
                                            class="btn btn-success ">
                                            <i class="fa fa-lock"></i> Quick Login
                                        </a>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <!--                            <a id="forgot_pass" href="#quick-forgot-pass" data-toggle="modal" class="btn btn-sm btn-warning">
              <i class="fa fa-key"></i> Forgot My password !
              </a> -->
                                        <a id="forgot_pass" href="javascript:void(0)" data-toggle="modal"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-key"></i> Forgot My password !
                                        </a>
                                        <a id="forgot_pass_userlog" href="javascript:void(0)" data-toggle="modal"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-key"></i> Forgot My password !
                                        </a>
                                    </div>


                                    <div class="col-sm-9 col-sm-offset-3 controls mini_pad_t">


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="quick-forgot-pass" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" id="forgot-quick-pass-close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-5 controls">
                                        <input class="form-control" type="text" name="forgot_qk_usr_mail"
                                            id="forgot_qk_usr_mail">
                                    </div>
                                    <div class="col-sm-4 mini_pad_t" id="forgot_qk_usr_mail_msg"></div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3">
                                        <span class="forgt_qk_spiner" style="display: none"><img
                                                src="//static.adhoards.com/assets/images/ajax-spinner.gif"
                                                width="20" style="padding-top:5px;"></span>
                                    </label>
                                    <div class="col-sm-4 controls">
                                        <a href="javascript:void(0)" class="btn btn-primary"
                                            id='forgot_qk_ulogin_quick'><i class="fa fa-check"></i> Reset Password</a>
                                    </div>
                                    <div class="col-sm-5 controls">
                                        <a href="javascript:void(0)" class="btn btn-warning" id='goto_qk_ulogin'><i
                                                class="fa fa-arrow-left"></i> Input Password</a>
                                        <!--#########-->
                                    </div>
                                    <div class="col-sm-12 controls mini_pad_t text-center">
                                        <span id="reset_pass_msg"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div style=""><a class="btn-link" id="mail_update_msg" href="#mail_update_msg_box"
                    data-toggle="modal"></a></div>
            <div class="modal fade" id="mail_update_msg_box" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" id="quick-pass-close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Account activation</h4>
                        </div>
                        <div class="modal-body">
                            "<b><span id="update_usr_mail"></span></b>"
                            is an Inactive Account. We have already send an activation link to this email id. However,
                            you can continue to your ad posting process now.
                            After posting this ad you have to activate your account to get your posts live. <br>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="quick-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">User Login</h4>
                </div>
                <div class="modal-body">
                    <form id="login_form" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email </label>
                            <div class="col-sm-5 controls">
                                <input class="form-control" type="text" name="usr_mail" id="usr_mail">
                            </div>
                            <div class="col-sm-4 mini_pad_t" id="usr_mail_msg"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-5 controls">
                                <input class="form-control" type="password" name="usr_pass" id="usr_pass">
                            </div>
                            <div class="col-sm-4 mini_pad_t" id="usr_pass_msg"></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-3 controls">
                                <a href="javascript:void(0)" class="btn btn-success " id='ulogin_quick'><i
                                        class="fa fa-lock"></i> Authenticate</a>
                            </div>
                            <div class="col-sm-6 controls mini_pad_t">
                                <span id="log_msg"></span>
                                <span class="spiner" style="display: none"><img
                                        src="//static.adhoards.com/assets/images/ajax-spinner.gif" width="20"
                                        style="padding-top:5px;"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>








    @include('adhoards.component.page_footer')
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//static.adhoards.com/assets/javascripts/bootstrap.js"></script>
    <script src="//static.adhoards.com/assets/javascripts/bootbox.js"></script>
    <script src="//static.adhoards.com/assets/javascripts/jquery.cookie.js"></script>
    <script src="//static.adhoards.com/assets/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="//static.adhoards.com/assets/tinymce/tinymce.min.js"></script>
    <script src="//static.adhoards.com/assets/tinymce/tinymce_init.js?v=1" type="text/javascript"></script>
    <script src="https://kolkata.adhoards.com/assets/drpz/dropzone.js" type="text/javascript"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="//static.adhoards.com/assets/javascripts/ie10-viewport-bug-workaround.js"></script>
    <script src="//static.adhoards.com/assets/jQuery.mmenu-master/js/jquery.mmenu.min.all.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>

    <script>
        let validateForm = {
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
        };

        let useFunction = {
            saveDraftSubmit: () => {
                // bootbox.hideAll();
                console.log(validateForm.errors);
                if (!validateForm.errors) {
                    // bootbox.dialog({
                    //     closeButton: false,
                    //     className: "loader",
                    //     size: "small",
                    //     message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
                    // });


                    let form = $('#form_fields').serializeArray();

                    tinyMCE.triggerSave();
                    let privacy = $("#post_phone_show").is(':checked') ? 'inactive' : 'active';
                    let common_formData = {
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
                        'category_id': {{ $cat_id }},
                        'sub_category_id': {{ $sub_cat_id }}
                    };
                    for (const [key, val] of Object.entries(common_formData)) {
                        // console.log(`${key}: ${value}`);
                        form.push({
                            name: key,
                            value: val
                        });
                    };
                    const url = "{{ url('/adpost/adsubmit') }}";
                    useFunction.ajaxRequest(url, form);


                } else {
                    alert('All require form fields should be filled up properly');
                    return false;

                }
            },
            ajaxRequest: (url, data, method = "POST") => {
                $.ajax({
                    type: method,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: url,
                    data: data,
                    success: function(response) {

                        console.log("useFunction>ajaxRequest ", response);


                    },
                    error: (err) => console.log(err),
                });
            },
        };

        let ajaxResponse = {

        }





        $('#postAdSubmit').click((e) => {
            validateForm.errors = false;
            // validateForm.ad_title();
            // validateForm.ad_place();
            // validateForm.youtubeVideo();
            // validateForm.ad_description();
            // validateForm.upper_lower_case();
            // validateForm.ad_email_exist();
            // validateForm.i_agree();
            // validateForm.ad_name();
            // validateForm.phone_verification();
            // validateForm.otp_verification();
            useFunction.saveDraftSubmit();
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
        })
        $('#ad_title').blur(validateForm.ad_title);
        $('#ad_place').blur(validateForm.ad_place);
        $('#ad_youtube_video').blur(validateForm.youtubeVideo);
        // $('#ad_email').blur(validateForm.ad_email);
        $('#ad_name').blur(validateForm.ad_name);
        // $('#ad_phone').blur(validateForm.phone_verification);
        // $('#userotp').blur(validateForm.otp_verification);

        const title_space_remove = () => {
            var ad_title = $("#ad_title").val();
            ad_title = ad_title.replace(/ {2,}/g, ' ');
            $("#ad_title").val(ad_title);
        }

        String.prototype.isUpperCase = function() {
            var str = this.replace(/\d+/g, '');
            return str.valueOf().toUpperCase() === str.valueOf();
        };

        String.prototype.isLowerCase = function() {
            var str = this.replace(/\d+/g, '');
            return str.valueOf().toLowerCase() === str.valueOf();
        };

        $(".dynamic").each(function(e, elem) {
            // elem.children[0]//label
            // elem.children[1]//input,select,textarea
            let label = elem.children[0];
            let field = elem.children[1]
            if (field.tagName === "INPUT") {
                if (field.getAttribute("type") === "checkbox") {
                    label.classList.add("form-check-label");
                    field.classList.add("form-check-input");
                } else {
                    label.classList.add("form-label");
                    field.classList.add("form-control");
                }
            } else if (field.tagName === "SELECT") {
                label.classList.add("form-label");
                field.classList.add("form-select");
            } else if (field.tagName === "TEXTAREA") {
                label.classList.add("form-label");
                field.classList.add("form-control");
            }

        });

    </script>

</body>


</html>
