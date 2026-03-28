<div id="offCanvasRight" class="off-canvas position-right hide-for-large" data-off-canvas data-position="right">
          
    <ul class="vertical menu" data-drilldown data-parent-link="true" style="color: black;">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li>
            <a href="#">Government</a>
            <ul class="vertical menu">
                <li><a href="{{ route('gov.elected.officials') }}">Elected Officials</a></li>
                <li>
                    <a href="#">Legislative</a>
                    <ul class="horizontal menu">
                        <li><a href="{{ route('gov.legislative.officials') }}">SB Officials</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('barangay') }}">Barangays</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Transactions</a>
            <ul class="vertical menu">
                <li><a href="{{ route('bpermit') }}">Business Permit</a></li>
                <li><a href="#">Building Permit</a></li>
                <li><a href="https://eservices.sogodlgu.gov.ph/">Sanitary Permit</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Transparency</a>
            <ul class="vertical menu">
                <li><a href="{{ route('fdp.index') }}">FDP Reports</a></li>
                <li><a href="{{ route('citizenscharter') }}">Citizen's Charter</a></li>
                <li><a href="{{ route('gov.legislative.ordinances') }}">Ordinances</a></li>
                <li><a href="{{ route('gov.legislative.resolutions') }}">Resolutions</a></li>
            </ul>
        </li>
        <li><a href="{{ route('news') }}">News</a></li>
        <li><a href="{{ route('tourism') }}">Tourism</a></li>
        <li>
            <a href="#">About us</a>
            <ul class="vertical menu">
                <li><a href="{{ route('about') }}">About Sogod</a></li>
                <li><a href="{{ route('about.missionvision') }}">Mission and Vision</a></li>
                <!-- <li><a href="">Former Key officials</a></li> -->
            </ul>
        </li>
        <li><a href="{{ route('news.covid19') }}">COVID-19 Updates</a></li>
    </ul>
</div>