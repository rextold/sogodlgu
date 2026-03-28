<!-- <h6 class="title-h6-d"><i class="fa fa-bullhorn"></i> Advisory</h6> -->
<div id="weather" class="advisory" >
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <p>@include('frontend.advisory._weather')</p>
</div>
<script>
function advisory(a) {
    var i;
    var x = document.getElementsByClassName("advisory");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(a).style.display = "block";  
}
</script>
