@include('adhoards.component.head')

<body>

    <div class="toggle_opacity " onclick="opacity_loc_drop_remove();"></div>
    @include('adhoards.component.header')

    <div class="slider-sec bg_ht" id="homeloc_img_stl">
        <img data-original="//static.adhoards.com/assets/images/homelocation/kolkata.jpg" class="img-responsive alt_cls">

        <div class="fly-sec">
            <div class="container">
                <div class="header_top_search">
                    <div class="col-sm-12 searchcenter">
                        <div class="text-center"><strong>Search What You Want !</strong></div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="searcharea">
                                    <div class="options" style="" id="search"><i class="fa fa-map-marker"
                                            aria-hidden="true"></i> Kolkata&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <div class="searchkey">
                                        <div style="position:relative;">

                                            <input style="color:#000000;" id="homeloc_main_srch"
                                                onclick="darkall_from_srchbx();" name="filter_by_keywords"
                                                type="text" placeholder="Enter Your Keywords" class="search dropdown"
                                                autocomplete="off">
                                            <ul style="width:100%;padding: 15px;" id="kb_menu"
                                                class="dropdown-menu multi-level" role="menu"
                                                aria-labelledby="dropdownMenu">
                                                <li onmouseout="hover_li_selection_remove('li1');"
                                                    onmouseover="hover_li_selection('li1');"
                                                    onclick="click_search_start('78');" data-catid="78"
                                                    class="li_border" id="li1"></li>
                                                <li onmouseout="hover_li_selection_remove('li2');"
                                                    onmouseover="hover_li_selection('li2');" data-catid="77"
                                                    onclick="click_search_start('77');" class="li_border"
                                                    id="li2"></li>
                                                <li onmouseout="hover_li_selection_remove('li3');"
                                                    onmouseover="hover_li_selection('li3');" data-catid="76"
                                                    onclick="click_search_start('76');" class="li_border"
                                                    id="li3"></li>
                                                <li onmouseout="hover_li_selection_remove('li4');"
                                                    onmouseover="hover_li_selection('li4');" data-catid="79"
                                                    onclick="click_search_start('79');" class="li_border"
                                                    id="li4"></li>
                                                <li onmouseout="hover_li_selection_remove('li5');"
                                                    onmouseover="hover_li_selection('li5');" data-catid="74"
                                                    onclick="click_search_start('74');" class="li_border"
                                                    id="li5"></li>
                                                <li onmouseout="hover_li_selection_remove('li6');"
                                                    onmouseover="hover_li_selection('li6');" data-catid="75"
                                                    onclick="click_search_start('75');" class="li_border"
                                                    id="li6"></li>
                                                <li onmouseout="hover_li_selection_remove('li7');"
                                                    onmouseover="hover_li_selection('li7');" data-catid="81"
                                                    onclick="click_search_start('81');" class="li_border"
                                                    id="li7"></li>
                                                <li onmouseout="hover_li_selection_remove('li8');"
                                                    onmouseover="hover_li_selection('li8');" data-catid="209"
                                                    onclick="click_search_start('209');" class="li_border"
                                                    id="li8"><a href="#" id="lia8"></a></li>
                                                <li onmouseout="hover_li_selection_remove('li9');"
                                                    onmouseover="hover_li_selection('li9');" data-catid="80"
                                                    onclick="search_start('80');" class="li_border last_li_border"
                                                    id="li9"></li>
                                            </ul>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="search-details"
                            style="display:none;z-index: 9999;background: #ffffff none repeat scroll 0 0 !important;margin-right: 0px !important;">
                            <div id="new_loader" class="text-center" style="display: none;"></div>
                            <div class="col-md-12" id="search_loc_content"
                                style="position:relative;height: 288px;padding-top: 0px !important;">
                                <nav id='menu' style="position:absolute;top:0;margin-top: 0px !important;">
                                    <ul class="loc_ul">
                                        <li
                                            style="width:20%;float:left;padding:2px !important;border: 0px !important;">
                                            <span
                                                style="background-color: #fff;color:#2965be;font-size: 13px !important;"
                                                title="Andhra Pradesh" class="  child-pad ">
                                                state </span>
                                            <ul class="loc_ul">
                                                <li
                                                    style="width:20%;float:left;padding:2px !important;border: 0px !important;">
                                                    <a style="background-color: #fff;color:#2965be;padding:10px 5px;font-size: 13px !important;cursor: pointer;"
                                                        onclick="city_select('anantapur');" class="">dist</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabsearch">
                    <div id="horizontalTab">
                        <div class="resp-tabs-container test " style="display:none;">
                            @foreach ($categories as $parent)
                                <div>
                                    @foreach ($sub_category as $child)
                                        @if ($parent->id === $child->category_id)
                                            <div class="col-sm-3" style="padding: 8px;width: 25% !important;">
                                                <a class="sub_cat_a_style"
                                                    href="{{url("/$parent->slug/$child->slug")}}"
                                                    title="{{ucwords($parent->category_name)}}/ {{ucwords($child->sub_category_name)}}">{{ ucwords($child->sub_category_name) }}</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <ul class="resp-tabs-list">
                            @foreach ($categories as $item)
                                <li data-topcatli="li_{{ $item->id }}" class="tabb top_cat_cls"
                                    id="li_{{ $item->id }}">
                                    <i class="fa {{ $item->icon }}" aria-hidden="true"></i>
                                    <div class="clearfix"></div>{{ ucwords($item->category_name) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="main-container">
            <div class="container">
                <div class="col-sm-8" style="width:71% !important;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="blocks">
                                <div class="title"><a class="block_title"
                                        href="https://kolkata.adhoards.com/real-estate/">Latest Real Estate
                                        Listing</a></div>
                                <div class="desc">
                                    <!--<b class="custom_title_style"><a href="https://kolkata.adhoards.com/sale-residential-commercial-land-to-build-your-sweet-home-285381.htm" title="Sale residential & commercial land to build your sweet home.">Sale residential & commercial land to build your sweet home.</a></b>-->
                                    <div class="custom_title_style"><a
                                            href="https://kolkata.adhoards.com/sale-residential-commercial-land-to-build-your-sweet-home-285381.htm"
                                            title="Sale residential & commercial land to build your sweet home.">Sale
                                            residential & commercial land to build your sweet home.</a></div>
                                    <!--					<img src="http://www.adhoards.com/adimg/2017/08/24/285381/thumb_vap2025336242_2.jpg" style="margin-bpttom: 0px;">-->





                                    <div class="block_img_div"> <a
                                            href="https://kolkata.adhoards.com/sale-residential-commercial-land-to-build-your-sweet-home-285381.htm">
                                            <div
                                                style="background:url(https://apiadh.adhoards.com/adimg/2017/08/24/285381/thumb_vap2025336242_2.jpg) no-repeat;background-position: center center;background-size:cover;width:100%;height:100%;float: left;margin-bottom: 10px;margin-right: 15px;">
                                            </div>
                                        </a></div>
                                    <p class="custom_des_style">3 km distance from Ruby general hospital behind
                                        Heritage collage near Urbana project. 20 ft common passage are near by these
                                        land . It is situated under Kolkata . .<br><span class="special_style">Publish
                                            Date:</span> 2017-08-24<br></p>
                                    <div class="clearfix"></div>
                                    <!--<b class="custom_title_style"><a href="https://kolkata.adhoards.com/office-space-for-sale-esplanade-kolkata-245531.htm" title="Office space For Sale Esplanade Kolkata">Office space For Sale Esplanade Kolkata</a></b>-->
                                    <div class="custom_title_style"><a
                                            href="https://kolkata.adhoards.com/office-space-for-sale-esplanade-kolkata-245531.htm"
                                            title="Office space For Sale Esplanade Kolkata">Office space For Sale
                                            Esplanade Kolkata</a></div>
                                    <!--					<img src="http://www.adhoards.com/adimg/2017/02/22/245531/thumb_vap1513448617_67.jpg">-->
                                    <div class="block_img_div"> <a
                                            href="https://kolkata.adhoards.com/office-space-for-sale-esplanade-kolkata-245531.htm">
                                            <div
                                                style="background:url(https://apiadh.adhoards.com/adimg/2017/02/22/245531/thumb_vap1513448617_67.jpg) no-repeat;background-position: center center;background-size:cover;width:100%;height:100%;float: left;margin-bottom: 10px;margin-right: 15px;">
                                            </div>
                                        </a></div>
                                    <p class="custom_des_style">Buy Commercial Office Space in Esplanade Kolkata. Get
                                        details of Commercial Office Space For Sale in Kolkata at Zamin Property.1020
                                        Sq.ft. space for sale in . .<br><span class="special_style">Publish
                                            Date:</span> 2017-02-22</p>
                                    <div class="clearfix"></div>

                                    <!--<b class="custom_title_style"><a href="https://kolkata.adhoards.com/office-space-available-at-elgeen-road-kolkata-245537.htm" title="Office space Available at Elgeen Road Kolkata">Office space Available at Elgeen Road Kolkata</a></b>-->
                                    <div class="custom_title_style"><a
                                            href="https://kolkata.adhoards.com/office-space-available-at-elgeen-road-kolkata-245537.htm"
                                            title="Office space Available at Elgeen Road Kolkata">Office space
                                            Available at Elgeen Road Kolkata</a></div>
                                    <p style="margin-top: 0px;"><span class="special_style">Publish Date:</span>
                                        2017-02-22</p>
                                    <!--<b class="custom_title_style"><a href="https://kolkata.adhoards.com/commercial-office-space-for-sell-in-prime-location-of-gariahat-245541.htm" title="Commercial office space for sell in prime location of gariahat">Commercial office space for sell in prime location of . .</a></b>-->
                                    <div class="custom_title_style"><a
                                            href="https://kolkata.adhoards.com/commercial-office-space-for-sell-in-prime-location-of-gariahat-245541.htm"
                                            title="Commercial office space for sell in prime location of gariahat">Commercial
                                            office space for sell in prime location of gariahat</a></div>
                                    <p style="margin-top: 0px;"><span class="special_style">Publish Date:</span>
                                        2017-02-22</p>
                                    <!--<b class="custom_title_style"><a href="https://kolkata.adhoards.com/need-a-office-space-at-jadavpur-157467.htm" title="Need a office space at Jadavpur">Need a office space at Jadavpur</a></b>-->
                                    <div class="custom_title_style"><a
                                            href="https://kolkata.adhoards.com/need-a-office-space-at-jadavpur-157467.htm"
                                            title="Need a office space at Jadavpur">Need a office space at
                                            Jadavpur</a></div>
                                    <p style="margin-top: 0px;"><span class="special_style">Publish Date:</span>
                                        2015-12-01</p>
                                </div>
                            </div>


                            <div class="blocks">
                                <div class="title"><a class="block_title"
                                        href="https://kolkata.adhoards.com/jobs/">Latest Jobs</a></div>
                                <div class="desc">
                                    <b class="custom_title_style"><a
                                            href="https://kolkata.adhoards.com/urgently-need-web-designer-122868.htm"
                                            title="Urgently Need Web Designer">Urgently Need Web Designer</a></b>
                                    <p style="margin-top: 0px;"><span class="special_style">Publish Date:</span>
                                        2015-06-08</p>
                                    <ul class='recent_post_job_style'>
                                        <li><a href="https://kolkata.adhoards.com/jobs/accounting-finance">Accounting
                                                / Finance</a></li>

                                        <li><a
                                                href="https://kolkata.adhoards.com/jobs/admin-office-hr">Admin/Office/HR</a>
                                        </li>

                                        <li><a
                                                href="https://kolkata.adhoards.com/jobs/architect-engineer-autocad">Architect/Engineer/Autocad</a>
                                        </li>

                                        <li><a href="https://kolkata.adhoards.com/jobs/art-media-design-jobs">Art/Media/Design
                                                Jobs</a></li>

                                        <li><a href="https://kolkata.adhoards.com/jobs/business-mgmt-jobs">Business/Mgmt
                                                Jobs</a></li>

                                        <li><a
                                                href="https://kolkata.adhoards.com/jobs/construction-labour">Construction/Labour</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="blocks">
                                <div class="title"><a class="block_title"
                                        href="https://kolkata.adhoards.com/services/">Need Services?</a></div>
                                <div class="desc">
                                    <ul class="special_ul_style">
                                        <li><a href="https://kolkata.adhoards.com/services/beauty/"
                                                title="Beauty - Find Beauty Services">Beauty - Find Beauty
                                                Services</a></li>
                                        <li><a href="https://kolkata.adhoards.com/services/household-service/"
                                                title="Household - Search Household items">Household - Search
                                                Household items</a></li>
                                        <li><a href="https://kolkata.adhoards.com/services/health-medicine/"
                                                title="Health &amp; Medicine">Health &amp; Medicine</a></li>
                                        <li><a href="https://kolkata.adhoards.com/services/lessons/"
                                                title="Lessons - Find Lessons & Tutoring">Lessons - Find Lessons &
                                                Tutoring</a></li>
                                        <li><a href="https://kolkata.adhoards.com/event/" title="Event">Event</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blocks">
                                <div class="title"><a href="https://kolkata.adhoards.com/sale/"
                                        class="block_title">Want to Buy Or Sale ?</a></div>
                                <div class="desc">
                                    <ul class="special_ul_style">
                                        <li><a href="https://kolkata.adhoards.com/sale/baby-kids/"
                                                title="Baby+Kids - Find Baby & Kids Stuff">Baby+Kids - Find Baby &
                                                Kids Stuff</a></li>
                                        <li><a href="https://kolkata.adhoards.com/sale/computer-sales/"
                                                title="Computer">Computer</a></li>
                                        <li><a href="https://kolkata.adhoards.com/sale/jewellery/"
                                                title="Jewellery -  Upgrade your Jewellery closet">Jewellery - Upgrade
                                                your Jewellery closet</a></li>
                                        <li><a href="https://kolkata.adhoards.com/sale/softwares/"
                                                title="Softwares">Softwares</a></li>
                                        <li><a href="https://kolkata.adhoards.com/sale/electronics-sales/"
                                                title="Electronics">Electronics</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blocks">
                                <div class="title"><a class="block_title"
                                        href="https://kolkata.adhoards.com/automotive/">For Automotive</a></div>
                                <div class="desc">
                                    <!--				<h5><strong>Buy or Sell Cars</strong></h5>-->
                                    <ul class="block_title_ul">
                                        <li><a href="https://kolkata.adhoards.com/automotive/auto-parts/"
                                                title="Auto Parts">Auto Parts</a></li>
                                        <li><a href="https://kolkata.adhoards.com/automotive/bikes/"
                                                title="Bikes">Bikes</a></li>
                                        <li><a href="https://kolkata.adhoards.com/automotive/motorcycles/"
                                                title="Motorcycles">Motorcycles</a></li>
                                        <li><a href="https://kolkata.adhoards.com/automotive/rental-services/"
                                                title="Rental Services">Rental Services</a></li>
                                        <li><a href="https://kolkata.adhoards.com/automotive/trucks-vans/"
                                                title="Trucks & Vans">Trucks &amp; Vans</a></li>
                                    </ul>
                                    <br>
                                    <b class="custom_title_style"><strong>Recently posted </strong>
                                        <div class="recent_post_style"></div>
                                    </b>
                                    <b class="custom_title_style_1"><a
                                            href="https://kolkata.adhoards.com/best-car-repair-service-in-kolkata-279662.htm"
                                            title="Best Car Repair Service in Kolkata">Best Car Repair Service in
                                            Kolkata</a></b>
                                    <p style="margin-top: 0px;"><span class="special_style">Publish
                                            Date:</span>2015-06-08</p>
                                    <b class="custom_title_style_1"><a
                                            href="https://kolkata.adhoards.com/spotless-mint-condition-duke-390-279630.htm"
                                            title="Spotless & Mint Condition Duke 390">Spotless & Mint Condition Duke
                                            390</a></b>
                                    <p style="margin-top: 0px;"><span class="special_style">Publish
                                            Date:</span>1969-12-31</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Adhoard_hom_loc_footer -->
                            <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px"
                                data-ad-client="ca-pub-0517214939777280" data-ad-slot="9373944654"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script><br>
                            <div class="mtop20 meta_cnt">
                                <p>If you're searching for free ads posting in Kolkata, then register with Adhoards.
                                    Here, you can buy or sell apartments, furnitures, used cars and avail other
                                    services. Get health and medicine services and also assistance for travel and
                                    tourism. While, searching for pg or hostel, get excellent information here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-right" style="width:29%!important;">
                    <div class="col-md-12 text-left" style="padding:0px;">
                        <input type="checkbox" checked data-toggle="toggle"
                            data-on="<div class='col-sm-12'>
			   <div class='col-sm-5 no-pad text-right'>
			   <img  src='https://openweathermap.org/img/w/50n.png'>
			   </div>
			   <div class='col-sm-7 no-pad text-left weather_style'>
			   
			    Kolkata			   </div>
			   <div class='col-sm-12 weather_style_1'>32&nbsp;&deg;C /F</div>
			   <div class='col-sm-12 no-pad'>Haze</div>
			   <div class='col-sm-12 weather_style_cloud'>Cloud: 20%</div>

			   <div class='col-sm-12 weather_style_cloud'>Humidity: 79%</div>

			   <div class='col-sm-12 weather_style_cloud'>Wind: 5.66m/s</div>
			   </div>"
                            data-off="<div class='col-sm-12'>
			   <div class='col-sm-5 no-pad text-right'>
			   <img  src='https://openweathermap.org/img/w/50n.png'>
			   </div>
			   <div class='col-sm-7 no-pad text-left weather_style'>
			   Kolkata			   </div>
			   <div class='col-sm-12 weather_style_1'>89.5&nbsp;&deg;F /C</div>
			   <div class='col-sm-12 no-pad'>Haze</div>
			   <div class='col-sm-12 weather_style_cloud'>Cloud: 20%</div>

			   <div class='col-sm-12 weather_style_cloud'>Humidity: 79%</div>

			   <div class='col-sm-12 weather_style_cloud'>Wind: 5.66m/s</div>
			   </div>">
                    </div>





                    <div class="clearfix"></div>
                    <br />
                    <div class="col-md-12 text-left vd-player" style="padding:0px;">
                        <link href="//static.adhoards.com/assets/player/video-js.css" rel="stylesheet">
                        <link href="//static.adhoards.com/assets/player/videojs-overlay-hyperlink.css"
                            rel="stylesheet">
                        <style>
                            .vjs-texttrack-settings {
                                display: none;
                            }

                            .video-js .vjs-overlay-background {

                                width: 170px !important;
                            }
                        </style>

                        <video id="my-video" class="video-js" controls preload="auto" width="298"
                            height="190" poster="https://videopromotion.club/assets/images/logo.png"
                            data-setup="{}" muted="muted">
                            <source src="https://s3-us-west-2.amazonaws.com/adhoardsplayer/videoplayback.mp4"
                                type='video/mp4'>
                            <source src="https://s3-us-west-2.amazonaws.com/adhoardsplayer/videoplayback.webm"
                                type='video/webm'>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a web browser
                                that
                                <a href="https://videopromotion.club/create" target="_blank">supports HTML5
                                    video</a>
                            </p>



                        </video>

                        <script src="//static.adhoards.com/assets/player/video.js"></script>
                        <script src="//static.adhoards.com/assets/javascripts/jquery-1.11.1.min.js"></script>
                        <script src="//static.adhoards.com/assets/player/jquery.isonscreen.min.js"></script>

                        <script>
                            var $j = $.noConflict(true);
                        </script>
                        <script>
                            var ps = 0;
                            var options = {};
                            var pre = 0;
                            var player = videojs('my-video', options, function onPlayerReady() {
                                videojs.log('Your player is ready!');

                                // In this context, `this` is the player that was created by Video.js.
                                //this.play();
                                this.pause();







                                var link = 'https://videopromotion.club/create';
                                var display_link = 'https://videopromotion.club/create';
                                var org_campain_id = '5bd1ab6dc76c5';
                                var user_campain_id = 'camp2';
                                var video_url = 'https://s3-us-west-2.amazonaws.com/adhoardsplayer/videoplayback.mp4';




                                $j.post("https://static.adhoards.com/application/player/playerstat.php", {
                                    uniq_id: uniq_id,
                                    currentTime: 0,
                                    link: link,
                                    display_link: display_link,
                                    org_campain_id: org_campain_id,
                                    user_campain_id: user_campain_id,
                                    video_url: video_url
                                }, function(data) {
                                    console.log(0);
                                });






                                var whereYouAt = this.currentTime();

                                console.log(whereYouAt);

                                // How about an event listener?
                                this.on('ended', function() {
                                    videojs.log('Awww...over so soon?!');
                                });
                            });
                            player.autoplay('muted');


                            $j(document).scroll(function() {
                                if ($j('.vd-player').isOnScreen()) {
                                    console.log("ps" + ps);
                                    console.log("in");
                                    if (ps != 1) {
                                        player.play();
                                    }
                                } else {
                                    console.log("out");
                                    if (ps != 2) {
                                        player.pause();
                                    }
                                }

                            });

                            var focused = true;
                            document.addEventListener("visibilitychange", function() {
                                focused = !focused;
                                if (!focused)
                                    console.log("other");
                                player.pause();
                            });


                            $j('.vjs-button.vjs-playing').click(function() {
                                alert("play");
                                if (ps == 0) {
                                    ps = 1
                                } else if (ps == 1) {
                                    ps = 2
                                } else {
                                    ps = 1;
                                }
                            });




                            var uniq_id = '6478dbf0b5d77';
                            videojs('my-video').ready(function() {



                                this.on('timeupdate', function() {

                                    //console.log(this.currentTime());


                                    var min = parseInt(this.currentTime());
                                    if (pre != min) {




                                        var link = 'https://videopromotion.club/create';
                                        var display_link = 'https://videopromotion.club/create';
                                        var org_campain_id = '5bd1ab6dc76c5';
                                        var user_campain_id = 'camp2';
                                        var video_url = 'https://s3-us-west-2.amazonaws.com/adhoardsplayer/videoplayback.mp4';




                                        $j.post("https://static.adhoards.com/application/player/playerstat.php", {
                                            uniq_id: uniq_id,
                                            currentTime: min,
                                            link: link,
                                            display_link: display_link,
                                            org_campain_id: org_campain_id,
                                            user_campain_id: user_campain_id,
                                            video_url: video_url
                                        }, function(data) {
                                            console.log(min);
                                        });
                                        pre = min;
                                    }
                                })
                            });
                        </script>
                        <script src="//static.adhoards.com/assets/player/videojs-overlay-hyperlink.js"></script>

                        <!-- TARGET hyperlink -->
                        <script type='text/javascript'>
                            var yourLink = "https://videopromotion.club/create";
                        </script>

                        <!-- js for serving the title and positioning of the hyperlink, you can also leverage 'align' option to set it the desired position, see the style sheets for more options -->
                        <script>
                            (function(window, videojs) {
                                var player = window.player = videojs('my-video');
                                player.overlay({
                                    content: '<a href="' + yourLink +
                                        '" target="_blank" onclick="click_link();">https://videopromotion.club/create</a>',
                                    debug: true,
                                    overlays: [{
                                        start: 0,
                                        end: player.duration(),
                                        align: 'bottom-left'
                                    }]
                                });
                            }(window, window.videojs));


                            function click_link() {


                                var link = 'https://videopromotion.club/create';
                                var display_link = 'https://videopromotion.club/create';
                                var org_campain_id = '5bd1ab6dc76c5';
                                var user_campain_id = 'camp2';
                                var video_url = 'https://s3-us-west-2.amazonaws.com/adhoardsplayer/videoplayback.mp4';




                                $j.post("https://static.adhoards.com/application/player/linkclickstat.php", {
                                    uniq_id: uniq_id,
                                    currentTime: pre,
                                    link: link,
                                    display_link: display_link,
                                    org_campain_id: org_campain_id,
                                    user_campain_id: user_campain_id
                                }, function(data) {
                                    console.log(pre);
                                });

                            }
                        </script>
                    </div>









                    <div class="mtop20">
                        <a id="pageadSubmit" href="https://kolkata.adhoards.com/postingad/pagesubmit/1685642224">
                            <div class="post_free_btn_btm text-left">
                                <b class="pst_tle">Post Free Ad</b><br>
                                <span class="pst_sbtle">Classified Ads Online</span>
                                <div class="fa fa-pencil-square-o fa-4x post_icn"></div>
                            </div>

                        </a>

                    </div>



                    <div class="sidebar-box">
                        <a href="https://my.adhoards.com/useraccount/account/login/?redirect=a29sa2F0YS5hZGhvYXJkcy5jb20%3D"
                            value="Login or Register to apply" class="aply_job">
                            <div class="cvbox">
                                <aside class="cvtext">Login or Register to create your CV</aside>
                                <aside class="cvicon"><i class="fa fa-external-link" aria-hidden="true"></i>
                                </aside>
                            </div>
                        </a>
                    </div>



                    <div class="sidebar-box">

                        <div class="titlee text-left">Event Calender</div>
                        <div class="descbox">
                            <div id="datepicker"></div>
                        </div>

                    </div>
                    <div class="sidebar-box">
                        <div class="titlee text-left"><a class="block_titlee"
                                href="http://www.adhoards.com/safety-tips.htm">Staying safe on Adhoards</a></div>
                        <div class="descbox" style="text-align:left;">Safety Tips for Online Classified Sites -
                            Adhoards.We provide you tips on how you can use Adhoards safely and successfully.</div>
                    </div>



                </div>
            </div>
        </div>
    </section>

    @include('adhoards.component.footer')
    @include('adhoards.component.scripts')


</body>

</html>
