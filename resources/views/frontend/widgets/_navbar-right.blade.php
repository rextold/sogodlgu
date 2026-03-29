<style>
/* ---- Mobile Off-Canvas Nav ---- */
#offCanvasRight { background: #001f2d; }
#offCanvasRight .menu li a {
    color: #fff;
    font-weight: 600;
    font-size: 0.92rem;
    padding: 12px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
#offCanvasRight .menu li a:hover { color: #f4c542; background: rgba(234,82,17,0.15); }
#offCanvasRight .menu li.active > a, #offCanvasRight .menu li:hover { background: rgba(234,82,17,0.15); }
#offCanvasRight .is-drilldown-submenu { background: #0a2d3e; }
#offCanvasRight .is-drilldown-submenu li a { color: #fff; }
#offCanvasRight .js-drilldown-back > a::before { border-color: rgba(255,255,255,0.7) transparent transparent; }
</style>
<div id="offCanvasRight" class="off-canvas position-right hide-for-large" data-off-canvas data-position="right">
          
    <ul class="vertical menu" data-drilldown data-parent-link="true">
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
    </ul>
</div>