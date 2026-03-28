
<div class="title-bar" data-responsive-toggle="gwt-menu" data-hide-for="large" style="">
    <div class="title-bar-left">
        <a href="https://www.sogodlgu.gov.ph"><h1 class="title-bar-title">SOGODLGU</h1></a>
    </div>
    <div class="title-bar-right">
        <span class="title-bar-title">MENU</span>
        <button id="me" type="button" data-open="offCanvasRight">
        <i class="fa fa-bars" aria-hidden="true"></i>
        </button>  
    </div>
</div>
<!-- Sticky Top Bar navigation -->
<div id="main-nav" class="show-for-large">
    <div data-sticky-container>
        <div class="sticky" data-sticky data-margin-top="0" style="width:100%;">
            <div class="row">
                <div id="gwt-menu" class="top-bar">
                    <nav class="top-bar-left">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <li id="govph" class="name menu-text" role="menuitem"><h1><a href="https://www.sogodlgu.gov.ph">SOGODLGU</a></h1></li>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <a href="#">Government</a>
                                <ul class="vertical menu"  data-aos="fade-down">
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
                                    <li><a href="{{ route('fdp.index') }}" class="block px-4 py-2 hover:bg-gray-100">FDP Reports</a></li>
                                    <li><a href="{{ route('citizenscharter') }}" class="block px-4 py-2 hover:bg-gray-100">Citizen's Charter</a></li>
                                    <li><a href="{{ route('gov.legislative.ordinances') }}" class="block px-4 py-2 hover:bg-gray-100">Ordinances</a></li>
                                    <li><a href="{{ route('gov.legislative.resolutions') }}" class="block px-4 py-2 hover:bg-gray-100">Resolutions</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="{{ route('events') }}">Events</a></li> -->
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
                            <li>
                                <button id="acc-button" type="button">
                                    <span class="show-for-sr">Accessibility Button</span>
                                    <i class="fa fa-universal-access fa-2x" aria-hidden="true"></i>
                                </button>
                                <ul id="acc-widget" class="menu">
                                    <li>
                                        <a href="#" id="accessibility-statement" class="toggle-statement" data-toggle="a11y-modal" title="Accessibility Statement">
                                            <span class="show-for-sr">Accessibility Statement</span>
                                            <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="accessibility-contrast" class="toggle-contrast" title="Toggle High Contrast">
                                            <span class="show-for-sr">Toggle High Contrast</span>
                                            <i class="fa fa-low-vision fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="accessibility-grayscale" class="toggle-grayscale" title="Toggle Gray Scale">
                                            <span class="show-for-sr">Toggle Gray Scale</span>
                                            <i class="fa fa-adjust fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="stc" href="#" title="Skip to Content">
                                            <span class="show-for-sr">Skip to Content</span>
                                            <i class="fa fa-arrow-circle-o-down fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="stf" href="#" title="Skip to Footer">
                                            <span class="show-for-sr">Skip to Footer</span>
                                            <i class="fa fa-chevron-down fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>         
            </div>
        </div>
    </div>  
</div>    
<!-- top bar navigation end -->