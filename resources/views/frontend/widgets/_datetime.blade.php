<style type="text/css">
    .pstbg{background-color: #ea5211; padding: 6px;color: #fefefe;}
</style>
<br>
<div class="callout secondary" style="border: 1px solid rgba(255, 255, 255, 0.25);">
     <div id="pst" class="text-center">
        <div id="pst-container" style="display:block;">
            <div style="font-style:Roboto; color:#333;">
                <div style="font-size:1rem;" class="pstbg"> <b>Philippine Standard Time</b></div>
                <div style="font-size:0.875rem;">
                    <span id="pst-date"></span>
                    <span id="pst-time"></span>
                </div>
            </div>
        </div>
          <script type="text/javascript" id="gwt-pst">
          (function(d, eId) {
            var js, gjs = d.getElementById(eId);
            js = d.createElement("script"); js.id = "gwt-pst-jsdk";
            js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
            gjs.parentNode.insertBefore(js, gjs);
          }(document, "gwt-pst"));

          var gwtpstReady = function(){
            var otherFormat = "dddd, mmmm dd, yyyy h:mm:ss TT";
            var firstPst = new gwtpstTime("pst-date", {format: otherFormat});
          }
          </script>
      </div>
</div>