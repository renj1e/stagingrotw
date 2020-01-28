 'user strict'
 $(document).ready(function () {

     /* sidebar size */
     if ($.type($.cookie("sidebarsize")) != 'undefined' && $.cookie("sidebarsize") != '') {
         $('.sidebar').removeClass('smalls compact');
         $('.sidebar').addClass($.cookie("sidebarsize"));

         if ($.type($.cookie("sidebarsize")) === 'smalls') {
             $('#navigation1').prop('checked', true);
         } else {
             $('#navigation2').prop('checked', true);
         }
     } else {
         $('.sidebar').removeClass('smalls compact');
         $('#navigation3').prop('checked', true);
     }

     $('#navigation1').on('click', function () {
         $.cookie("sidebarsize", 'smalls', {
             expires: 7
         });
         if ($(this).is(':checked') === true) {
             $('.sidebar').addClass('smalls').removeClass('compact');
         } else {
             $('.sidebar').removeClass('smalls');
         }
     });
     $('#navigation2').on('click', function () {
         $.cookie("sidebarsize", 'compact', {
             expires: 7
         });

         if ($(this).is(':checked') === true) {
             $('.sidebar').addClass('compact').removeClass('smalls');
         } else {
             $('.sidebar').removeClass('compact');
         }
     });
     $('#navigation3').on('click', function () {
         $.removeCookie("sidebarsize");
         if ($(this).is(':checked') === true) {
             $('.sidebar').removeClass('smalls compact');
         }
     });



     /* Container size */
     if ($.type($.cookie("containersize")) != 'undefined' && $.cookie("containersize") != '') {

         if ($.type($.cookie("containersize")) != 'container' && $.cookie("containersize") != 'container') {
             $('#container2').prop('checked', true);
             $('#main-container > .row > .container').addClass('container-fluid').removeClass('container');
             $('.footer > .container').addClass('container-fluid').removeClass('container');
         }
     }

     $('#container1').on('click', function () {
         $.cookie("containersize", 'container', {
             expires: 7
         });
         if ($(this).is(':checked') === true) {
             $('#main-container > .row > .container-fluid').addClass('container').removeClass('container-fluid');
             $('.footer > .container-fluid').addClass('container').removeClass('container-fluid');
         } else {

             $('#main-container > .row > .container-fluid').addClass('container-fluid').removeClass('container');
             $('.footer > .container-fluid').addClass('container-fluid').removeClass('container');
         }
     });
     $('#container2').on('click', function () {
         $.cookie("containersize", 'container-fluid', {
             expires: 7
         });
         if ($(this).is(':checked') === true) {
             $('#main-container > .row > .container').addClass('container-fluid').removeClass('container');
             $('.footer > .container').addClass('container-fluid').removeClass('container');
         } else {
             $('#main-container > .row > .container').addClass('container').removeClass('container-fluid');
             $('.footer > .container').addClass('container').removeClass('container-fluid');
         }
     });

     /* layout style */
     if ($.type($.cookie("layouttype")) != 'undefined' && $.cookie("layouttype") != '') {
         $('.wrapper').addClass($.cookie("layouttype"));
         $('#layout2').prop('checked', true);
     }

     $('#layout1').on('click', function () {
         $.cookie("layouttype", '', {
             expires: 7
         });

         if ($(this).is(':checked') === true) {
             $('.wrapper').removeClass('boxed-page');
         } else {
             $('.wrapper').addClass('boxed-page');
         }
     });

     $('#layout2').on('click', function () {
         $.cookie("layouttype", 'boxed-page', {
             expires: 7
         });

         if ($(this).is(':checked') === true) {
             $('.wrapper').addClass('boxed-page');
         } else {
             $('.wrapper').removeClass('boxed-page');
         }
     });

     /* background sidebar */
     if ($.type($.cookie("sidebarimgrepeat")) != 'undefined' && $.cookie("sidebarimgrepeat") != '') {
         $('body .wrapper > .sidebar').css({
             'background-image': 'url(' + $.cookie("sidebarimgrepeat") + ')',
             'background-repeat': 'repeat',
             'background-size': 'auto',
             'background-position': 'center bottom'
         });
         $('.sidebar-image input[type="radio"]').prop("checked", false);
         $("label[data-title='" + $.cookie("sidebarimgrepeat") + "']").prev().prop("checked", true);

     }
     if ($.type($.cookie("sidebarimg")) != 'undefined' && $.cookie("sidebarimg") != '') {
         $('body .wrapper > .sidebar').css({
             'background-image': 'url(' + $.cookie("sidebarimg") + ')',
             'background-repeat': 'no-repeat',
             'background-size': '100%',
             'background-position': 'center bottom'
         });
         $('.sidebar-image input[type="radio"]').prop("checked", false);
         $("label[data-title='" + $.cookie("sidebarimg") + "']").prev().prop("checked", true);
     }
     $('.sidebarbackgroundtextureselect input[type="radio"]').on('click', function () {

         $.cookie("sidebarimgrepeat", $(this).next().attr('data-title'), {
             expires: 7
         });
         $.removeCookie('sidebarimg');
         $('body .wrapper > .sidebar').css({
             'background-image': 'url(' + $(this).next().attr('data-title') + ')',
             'background-repeat': 'repeat',
             'background-size': 'auto',
             'background-position': 'center bottom'
         });
     });
     $('.sidebarbackgroundselect input[type="radio"]').on('click', function () {
         $.cookie("sidebarimg", $(this).next().attr('data-title'), {
             expires: 7
         });
         $.removeCookie('sidebarimgrepeat');
         $('body .wrapper > .sidebar').css({
             'background-image': 'url(' + $(this).next().attr('data-title') + ')',
             'background-repeat': 'no-repeat',
             'background-size': '100%',
             'background-position': 'center bottom'
         });

     });


     /* page level background js*/
     if ($.type($.cookie("backgroundimg")) != 'undefined' && $.cookie("backgroundimg") != '') {
         $('body').css({
             'background-image': 'url(' + $.cookie("backgroundimg") + ')',
             'background-repeat': 'no-repeat',
             'background-size': 'cover',
             'background-attachment': 'fixed',
             'background-position': 'center top'
         });
         $('.mainbackground input[type="radio"]').prop("checked", false);
         $("label[data-title='" + $.cookie("backgroundimg") + "']").prev().prop("checked", true);

     }

     $('.mainbackground input[type="radio"]').on('click', function () {
         var radioactive = $(this);
         if (radioactive.attr('id') != 'mainbackground1') {            
             $.cookie("backgroundimg", $(this).next().attr('data-title'), {
                 expires: 7
             });
             $('body').css({
                 'background-image': 'url(' + $(this).next().attr('data-title') + ')',
                 'background-repeat': 'no-repeat',
                 'background-size': 'cover',
                 'background-attachment': 'fixed',
                 'background-position': 'center top'
             });
         } else {
             $.removeCookie('backgroundimg');
             $('body').css({
                 'background-image': 'none'
             });
         }


     });


     /* template color scheme */
     /* sidebar fill checkbox check state */
     if ($.type($.cookie("sidebarfill")) != 'undefined' && $.cookie("sidebarfill") != '') {
         $('#sidebarfill').prop("checked", true);
     } else {
         $('#sidebarfill').prop("checked", false);
         $.cookie("sidebarfill", "", {
             expires: 1
         });
     }
     $('#sidebarfill').on('click', function () {
         $('.theme-color input[type="radio"]').prop("checked", false);
         if ($(this).is(':checked')) {


             $.cookie("sidebarfill", "sidebar", {
                 expires: 1
             });
         } else {
             $.cookie("sidebarfill", "", {
                 expires: 1
             });
             $('#fullcolorfill').prop("checked", false);
             $.cookie("fullcolorfill", "", {
                 expires: 1
             });
         }
     });

     /* header fill checkbox check state */
     if ($.type($.cookie("headerfill")) != 'undefined' && $.cookie("headerfill") != '') {
         $('#headerfill').prop("checked", true);
     } else {
         $('#headerfill').prop("checked", false);
         $.cookie("headerfill", "", {
             expires: 1
         });
     }
     $('#headerfill').on('click', function () {
         $('.theme-color input[type="radio"]').prop("checked", false);
         if ($(this).is(':checked')) {

             $.cookie("headerfill", "header", {
                 expires: 1
             });
         } else {
             $.cookie("headerfill", "", {
                 expires: 7
             });
             $('#fullcolorfill').prop("checked", false);
             $.cookie("fullcolorfill", "", {
                 expires: 1
             });
         }
     });

     /* full body fill checkbox check state */
     if ($.type($.cookie("fullcolorfill")) != 'undefined' && $.cookie("fullcolorfill") != '') {
         $('#fullcolorfill').prop("checked", true);
     } else {
         $('#fullcolorfill').prop("checked", false);
         $.cookie("fullcolorfill", "", {
             expires: 1
         });
     }

     $('#fullcolorfill').on('click', function () {
         $('.theme-color input[type="radio"]').prop("checked", false);
         if ($(this).is(':checked')) {
             $.cookie("fullcolorfill", "content", {
                 expires: 1
             });
             $('#headerfill').prop("checked", true);
             $.cookie("headerfill", "header", {
                 expires: 1
             });
             $('#sidebarfill').prop("checked", true);
             $.cookie("sidebarfill", "sidebar", {
                 expires: 1
             });

         } else {
             $.cookie("fullcolorfill", "", {
                 expires: 1
             });
         }
     });


     /* Stylesheet combined */
     if ($.type($.cookie("stylesheetname")) != 'undefined' && $.cookie("stylesheetname") != '') {
         var linkurl;
         linkurl = $('#link');

         $('head').append("<link id='link' rel='stylesheet' href='" + $.cookie("stylesheetname") + "' type='text/css'>");
         $('.theme-color input[type="radio"]').prop("checked", false);
         $("label[data-title='" + $.cookie("themecolor") + "']").prev().prop("checked", true);
         setTimeout(function () {
             linkurl.remove();
         }, 500);
     }

     $('.colorselect input[type="radio"]').on('click', function () {
         $.cookie("themecolor", $(this).next().attr('data-title'), {
             expires: 7
         });

         var stylesheetname = "../../assets/css/" + $(this).next().attr('data-title') +  ".css";
         $.cookie("stylesheetname", stylesheetname, {
             expires: 7
         });
         var linkurl;
         linkurl = $('#link');

         $('head').append("<link id='link' rel='stylesheet' href='" + stylesheetname + "' type='text/css'>");

         // $(".loader-logo").show();
         setTimeout(function () {
             //     $(".loader-logo").fadeOut();
             linkurl.remove();
         }, 1500);
     });



 });
