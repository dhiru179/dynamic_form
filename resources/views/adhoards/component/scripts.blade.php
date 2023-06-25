<script>
    function city_select(city) {
        location.href = "https://" + city + ".adhoards.com";
    }
</script>
<script src="//static.adhoards.com/assets/newassets/js/bootstrap-toggle.js"></script>

<div class="clearfix"></div>
<link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/jquery.mmenu.cityall.css" rel="stylesheet">
<link href="//static.adhoards.com/assets/jQuery.mmenu-master/css/extensions/jquery.mmenu.themes.css"
    type="text/css" rel="stylesheet" />
<script src="//static.adhoards.com/assets/javascripts/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//static.adhoards.com/assets/newassets/js/bootstrap.js"></script>
<script src="//static.adhoards.com/assets/javascripts/ie-emulation-modes-warning.js" async></script>
<script src="//static.adhoards.com/assets/javascripts/jquery.cookie.js"></script>
<script src="https:///statictbootbx.adhoards.com/assets/javascripts/bootbox.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="//static.adhoards.com/assets/javascripts/ie10-viewport-bug-workaround.js"></script>
<script src="https:///statictquer.adhoards.com/assets/jQuery.mmenu-master/js/jquery.mmenu.min.all.js"
    type="text/javascript"></script>
<script type="text/javascript">
    // <!--
    // $(".user-logout-btn").click(function() {
    //     bootbox.confirm({
    //         buttons: {
    //             confirm: {
    //                 label: '<i class="glyphicon glyphicon-ok"></i> <b>Yes please</b>',
    //                 className: 'btn btn-success'
    //             },
    //             cancel: {
    //                 label: '<i class="glyphicon glyphicon-remove"></i> <b>Not now</b>',
    //                 className: 'btn btn-danger'
    //             }
    //         },
    //         message: '<h3>Do you want to Logout now ?</h3>',
    //         callback: function(result) {
    //             if (result) {
    //                 bootbox.hideAll();
    //                 bootbox.dialog({
    //                     closeButton: false,
    //                     className: "loader",
    //                     size: "small",
    //                     message: '<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>'
    //                 });
    //                 $.ajax({
    //                     type: "POST",
    //                     dataType: "jsonp",
    //                     success: function(data) {
    //                         var delay = 900;
    //                         setTimeout(function() {
    //                             window.location = data.url;
    //                         }, delay);
    //                     }
    //                 });
    //             }
    //         }
    //     });
    // });
    // // 
    // -->
</script>

<script>
    function keytest(txt) {
        //var txt = $('.inp_by_keywords').val();
        var rex = /[&\/\\#,+()[\]$~%.@'":*?<>{}=]/ig;
        var txt_raw = txt.replace(rex, " ");
        var txt_fi = txt_raw.replace(/\s+/g, "+");
        var txt1 = txt_fi.trim();
        return txt1;
    }
    var myli_select = 0;
    $(".dropdown").keyup(function(event) {
        event.stopPropagation();
        var z = event.keyCode;
        if (z == 40 || z == 38) {

        } else if (z == 13) {
            var searchkey = $("#homeloc_main_srch").val();
            if ($(".li_selected").is(":visible")) {
                if (searchkey != null) {
                    if ($("#homeloc_main_srch").val() == "") {
                        $('#kb_menu').dropdown().hide();
                    } else {
                        search_start();
                    }
                }
            }
        } else if (z == 27) {
            opacity_loc_drop_remove();
        } else {
            var searchkey = $("#homeloc_main_srch").val();

            if (searchkey != null) {
                if ($("#homeloc_main_srch").val() == "") {
                    $('#kb_menu').dropdown().hide();
                } else {
                    searchkey = '<b>' + searchkey + '</b>';
                    darkall_from_srchbx();
                    $(".searchkey").addClass("searchkey_width");
                    $("#search").addClass("loc_off");
                    $("#homeloc_main_srch").addClass("loc_off_input_ht");
                    $("#homeloc_main_srch").addClass("drop_stat");
                    $("#li1").html(" " + searchkey + " in Services");
                    $("#li2").html(" " + searchkey + " in Sale");
                    $("#li3").html(" " + searchkey + " in Jobs");
                    $("#li4").html(" " + searchkey + " in Real Estate");
                    $("#li5").html(" " + searchkey + " in Automotive");
                    $("#li6").html(" " + searchkey + " in Business Opportunity");
                    $("#li7").html(" " + searchkey + " in Community");
                    $("#li8").html(" " + searchkey + " in Events");
                    $("#li9").html(" " + searchkey + " in Personals");
                    $('#kb_menu').dropdown().show();
                }
            } else {
                $('#kb_menu').dropdown().hide();
            }
        }

    });
    $("#homeloc_main_srch").keydown(function(event) {

        var x = event.keyCode;
        if (x == 40) {
            if (($("#homeloc_main_srch").hasClass("drop_stat"))) {
                myli_select++;
                if (myli_select >= 10) {
                    myli_select = 1;
                }
                //alert(myli_select);
                $(".li_border").removeClass("li_selected");
                $('#li' + myli_select).focus();
                $('#li' + myli_select).addClass("li_selected");
            }
        } else if (x == 27) {
            opacity_loc_drop_remove();
        } else if (x == 13) {
            if (!($(".li_selected").is(":visible"))) {
                search_start('all');
            }

        }
    });
    $("#homeloc_main_srch").keyup(function(event) {

        var y = event.keyCode;
        if (y == 38) {
            if (($("#homeloc_main_srch").hasClass("drop_stat"))) {
                myli_select--;
                if (myli_select <= 0) {
                    myli_select = 9;
                }
                $(".li_border").removeClass("li_selected");
                $('#li' + myli_select).focus();
                $('#li' + myli_select).addClass("li_selected");
            }
        } else if (y == 27) {
            opacity_loc_drop_remove();
        } else if (y == 13) {

            if (!($(".li_selected").is(":visible"))) {

                search_start('all');
            }

        }
    });

    function search_start(catid = '') {
        var serch_val = $("#homeloc_main_srch").val();
        if (catid != '') {
            var cat_id = catid;
        } else {
            var cat_id = $(".li_selected").attr("data-catid");
        }
        var nw_serch_val = keytest(serch_val);
        if (serch_val.length >= 2) {

            $.ajax({
                type: 'post',
                url: "https://kolkata.adhoards.com/homelocation/storekeyword/",
                data: "keyword=" + serch_val,
                success: function(data) {
                    search_redirect(cat_id, nw_serch_val);
                }
            });
        }
    }

    function click_search_start(cat_id) {
        var serch_val = $("#homeloc_main_srch").val();
        var nw_serch_val = keytest(serch_val);
        if (serch_val.length >= 2) {
            $.ajax({
                type: 'post',
                url: "https://kolkata.adhoards.com/homelocation/storekeyword/",
                data: "keyword=" + serch_val,
                success: function(data) {
                    search_redirect(cat_id, nw_serch_val);
                }
            });
        }
    }

    function search_redirect(cat_id, filter_by_keywords) {

        var filter_by_price = "";
        var filter_order = 1;
        //var filter_by_category= "";
        if (cat_id != 'all') {
            $("#filter_by_category").val(cat_id);

            $.ajax({
                type: "POST",
                url: "https://kolkata.adhoards.com/homelocation/mobgetaction_key_url/",
                data: "cat_id=" + cat_id,
                success: function(e) {
                    location.href = e + '?filter_by_price=&filter_order=1&filter_by_keywords=' + encodeURI(
                        filter_by_keywords) + '&filter_by_category=' + cat_id;

                }
            });

        } else {


            location.href =
                'https://kolkata.adhoards.com/all/search/?filter_by_price=&filter_order=1&filter_by_keywords=' +
                encodeURI(filter_by_keywords) + '&filter_by_category=' + cat_id;

        }
    }
</script>
<script type="text/javascript"
src="//static.adhoards.com/assets/newassets/plugins/easyResponsiveTabs/easyResponsiveTabs.js"></script>
<script type="text/javascript">
  
    $(document).ready(function() {
        $('#menu').mmenu({
            offCanvas: false,
            classes: "mm-light"
        });
        //Horizontal Tab
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
                


            }
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }

        });
        $('.scrollToTop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });


        $("li.tabb").mouseover(function() {
            $(".test").addClass("activate");
            $(".search-details").hide();
            var myli_id = $(this).attr("data-topcatli");
            $(".test").attr("data-hoveredli", myli_id);
            $(this).addClass("li_bg");
        });
        $("li.tabb").mouseout(function() {
            $(".test").removeClass("activate");
            $(".resp-tab-item").removeClass('resp-tab-active');
            var hovered_id = $(".test").attr("data-hoveredli");
            $("#" + hovered_id).removeClass("li_bg");
            
        });
        $(".resp-tab-content").mouseover(function() {
            $(".test").addClass("activate");
            var hovered_id = $(".test").attr("data-hoveredli");
            $("#" + hovered_id).addClass("li_bg");
            
        });
        $(".resp-tab-content").mouseout(function() {
            $(".test").removeClass("activate");
            var hovered_id = $(".test").attr("data-hoveredli");
            $("#" + hovered_id).removeClass("li_bg");
            
        });
        
    });


    $("#search").click(function() {
        $(".search-details").show();
        $("#search").addClass("dislay_cls");
        $("#search").removeClass("rmv_bg_loc_drpdwn");
        $("#other_mask").remove();
        darkall();
    });
    
    function darkall_from_srchbx() {
        $(".search-details").hide();
        $("#search").removeClass("dislay_cls");
        $("#search").addClass("rmv_bg_loc_drpdwn");
        $("#search").after(
            "<div id='other_mask' style='position:absolute;background: rgba(0, 0, 0, 0.8) none repeat scroll 0 0 !important;z-index:9999 !important;'></div>"
            );
            $(".searcharea").addClass("dislay_cls");
            $(".searcharea").addClass("srch_area_rmv_bordr")
        //darkall();
        $(".toggle_opacity").addClass("toggle_opacity_css");
        $('body').addClass("body_overflow");
        $('#kb_menu').addClass("srch_ul_scroll");
    }
    
    function darkall() {

        if ($(".toggle_opacity").hasClass("toggle_opacity_css")) {
            $(".toggle_opacity").removeClass("toggle_opacity_css");
            $(".search-details").hide();
            $('body').removeClass("body_overflow");
        } else {
            $(".toggle_opacity").addClass("toggle_opacity_css");
            $('body').addClass("body_overflow");
            $('#kb_menu').addClass("srch_ul_scroll");
        }
    }
 
    </script>

<!-- Ends Here -->
<script>
    $(document).ready(function() {
        $(".toggle").css("width", "96px").css("height", "54px").css("margin", "0 0 10px");
    });
</script>
<script>
    $(document).ready(function() {

        $(window).bind('scroll', function() {

            var navHeight = 79;
            if ($(window).scrollTop() > navHeight) {
                $('#search_bar').addClass('goToTop');
                $('#next_sec_id').addClass('nxt_sec');
                $(".header_bottom_section").addClass('sticky_header_bottom_section');
                $(".header_bottom_section h1").addClass('sticky_header_bottom_section_h1');
                $(".search-sec-two").addClass('sticky_search-sec-two');
                $("#subcat_left_sidebar").addClass("left_sidebar");
            } else {
                $('#search_bar').removeClass('goToTop');
                $('#next_sec_id').removeClass('nxt_sec');
                $(".header_bottom_section").removeClass('sticky_header_bottom_section');
                $(".header_bottom_section h1").removeClass('sticky_header_bottom_section_h1');
                $(".search-sec-two").removeClass('sticky_search-sec-two');
                $("#subcat_left_sidebar").removeClass("left_sidebar");
            }
            if ($(this).scrollTop() > 100) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }

        });
    });

    function opacity_loc_drop_remove() {
        $(".search-details").hide();
        $(".toggle_opacity").removeClass("toggle_opacity_css");
        $("#search").removeClass("rmv_bg_loc_drpdwn");
        $(".searcharea").removeClass("dislay_cls");
        $(".searcharea").removeClass("srch_area_rmv_bordr");
        $('#kb_menu').dropdown().hide();
        $("#homeloc_main_srch").removeClass("drop_stat");
        $(".searchkey").removeClass("searchkey_width");
        $("#search").removeClass("loc_off");
        $("#homeloc_main_srch").removeClass("loc_off_input_ht");
        $('body').removeClass("body_overflow");
        $('#kb_menu').removeClass("srch_ul_scroll");
    }

    
    $(document).ready(
        function() {
            $(".resp-tab-item").removeClass('resp-tab-active');
            //$(".slider-sec")
            $.getScript('//static.adhoards.com/assets/newassets/js/jquery.lazyload.min.js', function() {

                $('.slider-sec .img-responsive').lazyload({});


            });

            
            
            
            setTimeout(
                function() {
                    $(".alt_cls").attr("alt", "Free Classified Kolkata");
                }, 5000);
        });
        
    $('.loc_ul').bind('contextmenu', function(e) {
        return false;
    });

    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // Esc
            opacity_loc_drop_remove(); // or whatever you want
        }
    });
    $(document).keydown(function(e) {
        if (e.keyCode == 27) { // Esc
            opacity_loc_drop_remove(); // or whatever you want
        }
    });
    
    function hover_li_selection(hoverliid) {
        $(".li_border").removeClass("hover_li_selected");
        $(".li_border").removeClass("li_selected");
        $("#" + hoverliid).addClass("hover_li_selected");
    }

    function hover_li_selection_remove(hoverliid) {
        $(".li_border").removeClass("hover_li_selected");
    }

    $(".gotoMain").on("click", function() {
        var date = new Date();
        date.setTime(date.getTime() + (6 * 1000));
        $.cookie('www_visit', 'www', {
            expires: date,
            path: "/",
            domain: '.adhoards.com'
        });
    });
    
    
    $(document).ready(
        function() {
            //console.log($( window ).width());//browser viewport
            var screen_width = parseInt($(window).width());
            var height = '';
            height = parseInt(Math.round(((576 / 1349) * screen_width)));
            //console.log(screen_width);
            //console.log(height);
            if (screen_width && height) {
                $("#homeloc_img_stl").css("height", height + "px").css("width", screen_width + "px");
                $("#homeloc_img_stl").removeClass("bg_ht");
            }
        });
        </script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script src="//static.adhoards.com/assets/javascripts/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        
        $("#datepicker").datepicker({
            dateFormat: "yy-m-d",
            minDate: 0,
            onSelect: function(date) {
                //alert(date);
                window.location.href =
                "https://kolkata.adhoards.com/events/search/?filter_by_keywords=&parent_cat=209&sub_cat=&child_cat=&urlpage=1&event_date=" +
                date;
            }
        });
        $(".ui-icon").each(function(index) {
            $(this).text("");
        });
    });
    
    
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