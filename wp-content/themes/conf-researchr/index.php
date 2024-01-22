<!DOCTYPE html>
<html>
    <?php wp_head(); ?>
    <head>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
        />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link
            href="<?php echo get_site_icon_url();?>"
            rel="shortcut icon"
            type="image/x-icon"
        />
        
        <link
            href="<?php echo get_template_directory_uri()?>/assets/css/common_.css"
            rel="stylesheet"
            type="text/css"
        />
        <link href="<?php echo get_template_directory_uri() ?>/style.css" rel="stylesheet" type="text/css" ></link>
        <title>kse-conferences.org</title>
        <script type="text/javascript">
            var show_webdsl_debug = false;
        </script>
        <script type="text/javascript">
            var contextpath = "https://kse-conferences.org/";
        </script>
        <link
            rel="stylesheet"
            href="<?php echo get_template_directory_uri()?>/assets/css/bootstrap/bootstrap.min.css"
            type="text/css"
        />
        <link
            rel="stylesheet"
            href="<?php echo get_template_directory_uri()?>/assets/css/conf.css"
            type="text/css"
        />
        <link
            rel="stylesheet"
            href="<?php echo get_template_directory_uri()?>/assets/css/logobar.css"
            type="text/css"
        />
        <link
         U   rel="stylesheet"
            href="<?php echo get_template_directory_uri()?>/assets/css/bootstrap/theme.bootstrap.min.css"
            type="text/css"
        />
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/holder.js"
        ></script>
        <script
            type="text/javascript"
            src="https://code.jquery.com/jquery-3.5.1.min.js"
        ></script>
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/jquery/jquery.tablesorter.combined.min.js"
        ></script>
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/jquery/jquery.tablesorter.pager.min.js"
        ></script>
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/tablesorter-init.js"
        ></script>
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/bootstrap/bootstrap.min.js"
        ></script>
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/notify.min.js"
        ></script>
        <script
            type="text/javascript"
            src="<?php echo get_template_directory_uri()?>/assets/js/ajax.js"
        ></script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i["GoogleAnalyticsObject"] = r;
                (i[r] =
                    i[r] ||
                    function () {
                        (i[r].q = i[r].q || []).push(arguments);
                    }),
                    (i[r].l = 1 * new Date());
                (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m);
            })(
                window,
                document,
                "script",
                "//www.google-analytics.com/analytics.js",
                "ga"
            );
            var GATids = [];
            GATids.push("t0");
            ga("create", "UA-9607501-2", "auto", "t0");
            ga("t0.set", "anonymizeIp", true);
            ga("t0.send", "pageview");
        </script>
        <script type="text/javascript">
            function collapseIndicator(containerElemId) {
                $(document).ready(function () {
                    var colElem = $(
                        "#" + containerElemId + ":not([data-collapse-handler])"
                    )
                        .attr("data-collapse-handler", "true")
                        .find(".collapse")
                        .addBack(".collapse");
                    colElem.on(
                        "shown.bs.collapse hidden.bs.collapse",
                        function () {
                            $(this)
                                .prev()
                                .find(".glyphicon:first")
                                .toggleClass(
                                    "glyphicon-chevron-right glyphicon-chevron-down"
                                );
                        }
                    );
                });
            }
        </script>
        <script type="text/javascript">
            function accordionInit() {
                $(".panel-group.collapse-auto-url .collapse")
                    .on("shown.bs.collapse", function () {
                        var urlReplace = "#" + $(this).attr("id"); //make the hash the id of the modal shown
                        history.replaceState(undefined, undefined, urlReplace);
                    })
                    .on("hide.bs.collapse", function () {
                        if (
                            window.location.hash.indexOf($(this).attr("id")) >
                            -1
                        ) {
                            history.replaceState(undefined, undefined, "#");
                        }
                    });
                tryShowPanel();
            }
            function tryShowPanel() {
                // Open panel on hash in url
                if (location.hash !== "") {
                    $(".panel-group " + location.hash).collapse("show");
                }
                return false;
            }

            $(window).bind("hashchange.accordion", tryShowPanel);
            $(document).ready(accordionInit);
        </script>
        <style>
            tr:hover{
                background-color: #f5f5f5;
            }
        </style>
        <meta name="description" content="" />
        <meta
            prefix="og: http://ogp.me/ns#"
            property="og:description"
            content=""
        />
        <script type="text/javascript">
            function addEventModalLoadOnClick(containerNode) {
                $(containerNode)
                    .find("a[data-event-modal]")
                    .on("click", function (e) {
                        var eventId = $(this).data("event-modal");
                        var modalElem = $("#modal-" + eventId);
                        if (modalElem.length) {
                            modalElem.modal(
                                { backdrop: "static", keyboard: true },
                                "show"
                            );
                        } else {
                            var loaderElem = $("#event-modal-loader");
                            loaderElem
                                .find("input.event-id-input")
                                .val(eventId);
                            loaderElem.find("#load-modal-action").click();
                        }
                        e.preventDefault();
                    });
            }
        </script>
        <script type="text/javascript">
            function addStarredEventOnClick(containerNode) {
                $(containerNode)
                    .find("[data-event-star]")
                    .on("click", function (e) {
                        var eventId = $(this).data("event-star");
                        var starEventFormElem = $("#event-star-form");
                        starEventFormElem
                            .find("input.event-id-input")
                            .val(eventId);
                        starEventFormElem.find("#star-event-action").click();
                        e.preventDefault();
                        e.stopPropagation();
                    });
            }
        </script>
        <script type="text/javascript">
            function pauseOnCloseModal(modalid) {
                //pauses video (only youtube at the moment) when closing modal
                $("#" + modalid).on("hidden.bs.modal", function () {
                    $(this)
                        .find(".embed-container iframe[src*=enablejsapi]")
                        .each(function () {
                            this.contentWindow.postMessage(
                                '{"event":"command","func":"pauseVideo","args":""}',
                                "*"
                            );
                        });
                });
            }
        </script>
        <meta
            prefix="og: http://ogp.me/ns#"
            property="og:title"
            content="conf.researchr.org conference management system - "
        />
    </head>
    <?php
echo do_shortcode('[smartslider3 slider="2"]');
?>
    <body id="root">
        <div class="frame">

            <script type="text/javascript">
                $(document).ready(function () {
                    $(".carousel").carousel({
                        interval: 6000,
                    });
                });
            </script>
            <div
                id="carousel-5f72802c-fada-4f46-8555-f3c3be804d74"
                data-ride="carousel"
                class="carousel slide carousel-fade"
            >



            </div>
            <div id="content" class="container">
                <div class="page-header">
                    <h1>
                        <small>
                            <a
                                href="https://kse-conferences.org/"
                                class="overview-page-true navigate"
                                >Conferences</a
                            >
                            <!-- /
                            <a
                                href="https://conf.researchr.org/conferenceseries"
                                class="overview-page-false navigate"
                                >Series</a
                            >
                            /
                            <a
                                href="https://conf.researchr.org/submissiondates"
                                class="overview-page-false navigate"
                                >Submission Dates</a
                            >
                            /
                            <a
                                href="https://conf.researchr.org/blogs"
                                class="overview-page-false navigate"
                                >Blogs</a
                            > -->
                            </small>
                    </h1>
                    <h4>
                        <small
                            >This overview only lists conferences that use the
                            kse-conferences.org CMS.</small
                        >
                    </h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading clearfix">
                                <div class="panel-title">
                                    Current Conferences
                                </div>
                            </div>
                            <!-- <div class="panel-body">

                            </div> -->
                            <style>
                                td {
                                    padding: 10px;
                                }
                            </style>
                            <?php 
                                $page = get_page_by_title('Current Conferences');
                                if ($page) {

                                    $content = $page->post_content;
                                    $dom = new DOMDocument();
                                    @$dom->loadHTML($content);

                                    // Tìm bảng đầu tiên trong nội dung của page
                                    $table = $dom->getElementsByTagName('table')->item(0);
                                    if ($table) {
                                        // Lặp qua từng thẻ tr và thêm class vào
                                        foreach ($table->getElementsByTagName('tr') as $tr) {
                                            // $tr->setAttribute('href', '');
                                        }
                                        // In ra nội dung của bảng sau khi đã thêm class vào các thẻ tr
                                        $trs = $table->getElementsByTagName('tr');
                                        foreach ($trs as $tr) {
                                            // $h3 = $tr->getElementsByTagName('h1')->item(0);
                                            $a = $tr->getElementsByTagName('a')->item(0);
                                            $href = $a->getAttribute('href');
                                            
                                            // Thêm thuộc tính href vào thẻ tr
                                            $tr->setAttribute('class', 'clickable-row edition-row');
                                            $tr->setAttribute('href', $href);
                                        }
    
                                        echo $dom->saveHTML($table);
                                    }
                                }
                            ?>
  
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <div class="panel-title">Upcoming Conferences</div>
                            </div>
                            <!-- <div class="panel-body">
                          </div> -->
                          <?php 
                                        $page = get_page_by_title('Upcoming Conferences');
                                        if ($page) {
        
                                            $content = $page->post_content;
                                            $dom = new DOMDocument();
                                            @$dom->loadHTML($content);
        
                                            // Tìm bảng đầu tiên trong nội dung của page
                                            $table = $dom->getElementsByTagName('table')->item(0);
                                            if ($table) {
                                                // Lặp qua từng thẻ tr và thêm class vào
                                                foreach ($table->getElementsByTagName('tr') as $tr) {
                                                    // $tr->setAttribute('href', '');
                                                }
                                                // In ra nội dung của bảng sau khi đã thêm class vào các thẻ tr
                                                $trs = $table->getElementsByTagName('tr');
                                                foreach ($trs as $tr) {
                                                    // $h3 = $tr->getElementsByTagName('h1')->item(0);
                                                    $a = $tr->getElementsByTagName('a')->item(0);
                                                    $href = $a->getAttribute('href');
                                                    
                                                    // Thêm thuộc tính href vào thẻ tr
                                                    $tr->setAttribute('class', 'clickable-row edition-row');
                                                    $tr->setAttribute('href', $href);
                                                }
            
                                                echo $dom->saveHTML($table);
                                            }
                                        }
                                    ?>
  
                        </div>
                        <div
                            id="e6aa0ae9630dff06548f07be3a72a75c"
                            role="tablist"
                            aria-multiselectable="true"
                            class="panel-group collapse-auto-url"
                        >
                            <div class="panel panel-default">
                                <div
                                    role="tab"
                                    id="e6aa0ae9630dff06548f07be3a72a75c1ddcb70a9623b2ccc46c23503adfb45f"
                                    class="panel-heading clearfix"
                                >
                                    <h3 class="panel-title">
                                        <a
                                            role="button"
                                            data-toggle="collapse"
                                            data-parent="#e6aa0ae9630dff06548f07be3a72a75c"
                                            href="#collapsee6aa0ae9630dff06548f07be3a72a75c1ddcb70a9623b2ccc46c23503adfb45f"
                                            aria-expanded="false"
                                            aria-controls="collapsee6aa0ae9630dff06548f07be3a72a75c1ddcb70a9623b2ccc46c23503adfb45f"
                                            class="collapsed"
                                            ><span
                                                class="glyphicon glyphicon-chevron-right"
                                            ></span>
                                            <script type="text/javascript">
                                                collapseIndicator(
                                                    "e6aa0ae9630dff06548f07be3a72a75c"
                                                );
                                            </script>
                                            Past Conferences</a
                                        >
                                    </h3>
                                </div>
                                <div
                                    id="collapsee6aa0ae9630dff06548f07be3a72a75c1ddcb70a9623b2ccc46c23503adfb45f"
                                    role="tabpanel"
                                    aria-labelledby="e6aa0ae9630dff06548f07be3a72a75c1ddcb70a9623b2ccc46c23503adfb45f"
                                    class="panel-collapse collapse"
                                >
                                    <!-- <div class="panel-body">
                                    
                                    </div> -->
                                    <?php 
                                $page = get_page_by_title('Past Conferences');
                                if ($page) {

                                    $content = $page->post_content;
                                    $dom = new DOMDocument();
                                    @$dom->loadHTML($content);

                                    // Tìm bảng đầu tiên trong nội dung của page
                                    $table = $dom->getElementsByTagName('table')->item(0);
                                    if ($table) {
                                        // Lặp qua từng thẻ tr và thêm class vào
                                        foreach ($table->getElementsByTagName('tr') as $tr) {
                                            // $tr->setAttribute('href', '');
                                        }
                                        // In ra nội dung của bảng sau khi đã thêm class vào các thẻ tr
                                        $trs = $table->getElementsByTagName('tr');
                                        foreach ($trs as $tr) {
                                            // $h3 = $tr->getElementsByTagName('h1')->item(0);
                                            $a = $tr->getElementsByTagName('a')->item(0);
                                            $href = $a->getAttribute('href');
                                            
                                            // Thêm thuộc tính href vào thẻ tr
                                            $tr->setAttribute('class', 'clickable-row edition-row');
                                            $tr->setAttribute('href', $href);
                                        }
    
                                        echo $dom->saveHTML($table);
                                    }
                                }
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    id="messages-placeholder"
                    class="alert alert-warning"
                    style="display: none"
                >
                    <a data-dismiss="alert" class="close">x</a
                    ><em>Wed 26 Apr 11:10</em>
                </div>
            </div>
            <div id="notifications-ph" class="webdsl-placeholder"></div>
            <div id="event-modal-loader" class="webdsl-placeholder">
                <form
                    name="form_131600131703c411e65b13378d08eb1f6672b5a0259"
                    id="form_131600131703c411e65b13378d08eb1f6672b5a0259"
                    action="https://conf.researchr.org/eventDetailsModalByAjaxConferenceEdition?fbclid=IwAR1egjsgSnk9uKvC-ESVeNHeO_US6ohVG2dY4exBr7Y3d9vg7vJ2WQnnF8E"
                    accept-charset="UTF-8"
                    method="POST"
                    class="hidden"
                >
                    <input
                        type="hidden"
                        name="form_131600131703c411e65b13378d08eb1f6672b5a0259"
                        value="1"
                    /><input type="hidden" name="context" value="conf" /><input
                        name="ae03f7f6f951d515a297b161e922205d"
                        type="text"
                        value=""
                        class="inputString form-control event-id-input"
                    /><button
                        style="
                            position: absolute;
                            left: -9999px;
                            width: 1px;
                            height: 1px;
                        "
                        onclick='javascript:serverInvoke("https://conf.researchr.org/eventDetailsModalByAjaxConferenceEdition?fbclid=IwAR1egjsgSnk9uKvC-ESVeNHeO_US6ohVG2dY4exBr7Y3d9vg7vJ2WQnnF8E","eventDetailsModalByAjaxConferenceEdition_ia0_3c411e65b13378d08eb1f6672b5a0259", [{"name":"context", "value":"conf"},],"form_131600131703c411e65b13378d08eb1f6672b5a0259", this.nextSibling, false,"event-modal-loader"); return false;'
                    ></button
                    ><a
                        submitid="eventDetailsModalByAjaxConferenceEdition_ia0_3c411e65b13378d08eb1f6672b5a0259"
                        href="javascript:void(0)"
                        onclick="javascript:loadImageElem=this;$(this.previousSibling).click()"
                        id="load-modal-action"
                    ></a>
                </form>
            </div>
            <div id="event-star-form" class="webdsl-placeholder">
                <form
                    name="form_509860938088b48fd14544d4239b498a2cf339e02b"
                    id="form_509860938088b48fd14544d4239b498a2cf339e02b"
                    action="https://conf.researchr.org/eventStarByAjaxConferenceEdition?fbclid=IwAR1egjsgSnk9uKvC-ESVeNHeO_US6ohVG2dY4exBr7Y3d9vg7vJ2WQnnF8E"
                    accept-charset="UTF-8"
                    method="POST"
                    class="hidden"
                >
                    <input
                        type="hidden"
                        name="form_509860938088b48fd14544d4239b498a2cf339e02b"
                        value="1"
                    /><input type="hidden" name="context" value="conf" /><input
                        name="a0b55aa29cf9431a9461b359872014e3"
                        type="text"
                        value=""
                        class="inputString form-control event-id-input"
                    /><button
                        style="
                            position: absolute;
                            left: -9999px;
                            width: 1px;
                            height: 1px;
                        "
                        onclick='javascript:serverInvoke("https://conf.researchr.org/eventStarByAjaxConferenceEdition?fbclid=IwAR1egjsgSnk9uKvC-ESVeNHeO_US6ohVG2dY4exBr7Y3d9vg7vJ2WQnnF8E","eventStarByAjaxConferenceEdition_ia0_88b48fd14544d4239b498a2cf339e02b", [{"name":"context", "value":"conf"},],"form_509860938088b48fd14544d4239b498a2cf339e02b", this.nextSibling, false,"event-star-form"); return false;'
                    ></button
                    ><a
                        submitid="eventStarByAjaxConferenceEdition_ia0_88b48fd14544d4239b498a2cf339e02b"
                        href="javascript:void(0)"
                        onclick="javascript:loadImageElem=this;$(this.previousSibling).click()"
                        id="star-event-action"
                    ></a>
                </form>
            </div>
            <div id="event-modals" class="webdsl-placeholder"></div>
            <script type="text/javascript">
                (function () {
                    var post_process_function = function (n) {
                        var node = n && n.nodeType === 1 ? n : document;
                        addEventModalLoadOnClick(node);
                        addStarredEventOnClick(node);
                    };
                    var original_post_process_func = ajax_post_process;
                    ajax_post_process = function () {
                        original_post_process_func.apply(this, arguments);
                        post_process_function.apply(this, arguments);
                    };
                    $(document).ready(post_process_function);
                })();
            </script>
            <footer class="footer">
                <div class="container">
                    <div class="footer-box">
                        <div class="row">
                            <div class="col-sm-3">
                                using
                                <a
                                    href="https://kse-conferences.org/"
                                    class="navigate"
                                    >kse-conferences.org</a
                                >
                                (<a
                                    href="http://yellowgrass.org/roadmap/conf.researchr.org"
                                    class="navigate"
                                    >v1.60.0</a
                                >)<br /><small
                                    ><a
                                        href="https://conf.researchr.org/support"
                                        target="_blank"
                                        class="navigate"
                                        ><span
                                            class="glyphicon glyphicon-question-sign"
                                        ></span>
                                        Support page</a
                                    ></small
                                ><br /><small></small>
                            </div>
                            <div class="col-sm-5"></div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script type="text/javascript">
            (function () {
                var post_process_function = function (n) {
                    var node = n && n.nodeType === 1 ? n : document;
                    $(node)
                        .find("[title]")
                        .tooltip({
                            placement: function (tt, elem) {
                                return $(document).scrollLeft() > 100
                                    ? "auto left"
                                    : "auto top";
                            },
                            container: "body",
                            sanitize: false,
                        });
                    $(".tooltip.fade.in, .ui-tooltip-content").remove();
                };
                var original_post_process_func = ajax_post_process;
                ajax_post_process = function () {
                    original_post_process_func.apply(this, arguments);
                    post_process_function.apply(this, arguments);
                };
                $(document).ready(post_process_function);
            })();
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".clickable-row").click(function () {
                    var href = $(this).attr("href");
                    if (window.location.href.indexOf(href) < 0) {
                        if ($(this).hasClass("new-window")) {
                            window.open(href);
                        } else {
                            window.document.location = href;
                        }
                    }
                });
            });

        </script>
    </body>
    <style>
        html {
            margin-top: 0px !important;
        }
    </style>
</html>
