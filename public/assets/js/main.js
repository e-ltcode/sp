    


    window.dataLayer = window.dataLayer || [];



  var announcementMobileActiveIndex = parseInt('0');
        customizationManager.loadCustomization('https://myquizhubblobcorewindowsnet-waveaccess.netdna-ssl.com/customization/');

        var customizationStorageUrl = 'https://myquizhubblobcorewindowsnet-waveaccess.netdna-ssl.com/customization/';
        customizationManager.loadCustomization(customizationStorageUrl);

        /*Lading video banner*/
        $(document).ready(function () {
            $(".partyVideo.modal svg").click(function () {
                $('#partyVideo').modal('hide');
            });
        });
        /*Lading video banner*/

        var global_haveNotViewedBookmarks = false;
        customizationManager.loadLogo(customizationStorageUrl);

       
        
        document.addEventListener("DOMContentLoaded", yall({
            observeChanges: true
        }));
        document.addEventListener("DOMContentLoaded", function () {
            loadScript('https://myquizhub-waveaccess.netdna-ssl.com/bundles/js_new/core?ver=20210910.6.37901', function () {
                loadSvg("allSVG", 'https://myquizhub-waveaccess.netdna-ssl.com/app/images/home/allsvg.svg?ver=20210910.6.37901');
                loadScript('https://myquizhub-waveaccess.netdna-ssl.com/bundles/js_new/landings/home/org?ver=20210910.6.37901', function () {
                    demoRequestPopupModule.init("TurnkeyServices");
                    loadScript('https://myquizhub-waveaccess.netdna-ssl.com/bundles/plugins/amp?ver=20210910.6.37901', function () { });
                });
                //loadScript('https://www.youtube.com/iframe_api', function () { });
                setTimeout(function () { fixNotLoadedImages(); }, 30000);
            });

        });
        function loadSvg(selector, url) {
            var target = document.getElementsByClassName(selector)[0];
            // Request the SVG file
            var ajax = new XMLHttpRequest();
            ajax.open("GET", url, true);
            ajax.send();

            // Append the SVG to the target
            ajax.onload = function (e) {
                target.innerHTML = ajax.responseText;
            }
        }
        function loadScript( url, callback ) {
          var script = document.createElement( "script" )
          script.type = "text/javascript";
          if(script.readyState) {  // only required for IE <9
            script.onreadystatechange = function() {
              if ( script.readyState === "loaded" || script.readyState === "complete" ) {
                script.onreadystatechange = null;
                callback();
              }
            };
          } else {  //Others
            script.onload = function() {
              callback();
            };
          }

          script.src = url;
          document.getElementsByTagName( "head" )[0].appendChild( script );
        }
        
        
        window.textResourse = {
            Popup_Lets: "Let's discuss <br /> your request <br /> in detail.",
            Popup_Lets_Please: "Please, fill in the form, and we'll get in touch soon!",
            Popup_Demo_HeaderText: "Seeing <br /> is believing!",
            Popup_Demo_HeaderText_desc_1: "Schedule a live demo with our quiz expert at your convenience, monday through friday 9am-5pm est. We can learn your requirements, answer your questions and review ways myquiz can help you and your project.",
            Popup_Demo_HeaderText_desc_2: "Please complete the form and we will be in touch shortly to set up a live demo."

        }

        
        var tryInitMessages = function () {
            if ($ === undefined) {
            setTimeout(tryInitMessages, 200);
            } else {
                initMessages();
            }
        }
        var initMessages = function () {
                var getCookieName = function(id) {
                return 'info_' + id;
            };
            var showMessages = function() {
                var mIds = [];
                $(mIds).each(function() {
                    var messageId = this;
                    var c = $.cookie(getCookieName(messageId));
                    if (!c) {
                        $('[data-info-message=' + messageId + ']').fadeIn();
                    }
                });
            };
    
            showMessages();
    
            $('.info-wrapper').on('click', '[data-info-message] .close', function() {
                var $this = $(this);
                var $message = $this.closest('[data-info-message]');
                var messageId = $message.attr('data-info-message');
                var d = (new Date).toISOString();
                var expiresAttr = $this.attr('data-expires');
                var expires = !!expiresAttr ? new Date(expiresAttr) : 365;
                $message.fadeOut(function() {
                    $.cookie(getCookieName(messageId), d, { path: '/', expires: expires });
                });
            });
        }

        window.addEventListener("load", function () {
            setTimeout(function () {
                var youtubePlayers = document.querySelectorAll(".youtubeIframe");

                for (var player = 0; player < youtubePlayers.length; player++) {
                    var src = youtubePlayers[player].getAttribute("data-src");
                    youtubePlayers[player].innerHTML = '<iframe src="' + src + '" class="embed-responsive-item lazy" frameborder = "0" allow = "autoplay; encrypted-media" allowfullscreen loading = "lazy" ></iframe >';
                }
            }, 2000);
        });
        GLOBAL = {}
        GLOBAL.NodeLocation = "US" == "RU"?"RU":"";
       

function myFunction() {
    var v = document.getElementById("brgr");
    var w = document.getElementById("cros");
    var x = document.getElementById("myDIV");
    var y = document.getElementById("hide")

    if (x.style.display === "block") {
      x.style.display = "none";
      y.style.display = "block";
      v.style.display = "block";
      w.style.display = "none";


    } else {
      x.style.display = "block";
      y.style.display = "none";
      v.style.display = "none";
      w.style.display = "block";
    }
  }

 