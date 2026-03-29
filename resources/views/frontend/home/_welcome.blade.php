<style>
/* ===== Mayor's Welcome Card ===== */
.mayors-welcome-wrap {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.09);
    display: flex;
    flex-direction: column;
}

/* Left photo panel */
.mayors-welcome-wrap .mw-photo-panel {
    background: linear-gradient(160deg, #003d7a 0%, #0052a5 50%, #ea5211 100%);
    padding: 28px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-width: 200px;
}
.mayors-welcome-wrap .mw-photo-panel .mw-avatar {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    object-position: top;
    border: 4px solid #f4c542;
    box-shadow: 0 4px 14px rgba(0,0,0,0.35);
    margin-bottom: 12px;
}
.mayors-welcome-wrap .mw-photo-panel .mw-name {
    font-size: 1rem;
    font-weight: 800;
    color: #fff;
    line-height: 1.25;
    margin-bottom: 4px;
}
.mayors-welcome-wrap .mw-photo-panel .mw-position {
    font-size: 0.78rem;
    color: #f4c542;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.mayors-welcome-wrap .mw-photo-panel .mw-seal {
    width: 52px;
    margin-top: 14px;
    opacity: 0.9;
}

/* Right message panel */
.mayors-welcome-wrap .mw-message-panel {
    padding: 22px 24px;
    flex: 1;
    position: relative;
}
.mayors-welcome-wrap .mw-message-panel .mw-quote-icon {
    font-size: 3.5rem;
    line-height: 1;
    color: #ea5211;
    opacity: 0.18;
    position: absolute;
    top: 14px;
    left: 18px;
    font-family: Georgia, serif;
}
.mayors-welcome-wrap .mw-message-panel .mw-subtitle {
    display: inline-block;
    background: #ea5211;
    color: #fff;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    margin-bottom: 8px;
}
.mayors-welcome-wrap .mw-message-panel h3 {
    font-size: 1.35rem;
    font-weight: 800;
    color: #0052a5;
    margin-bottom: 10px;
    line-height: 1.3;
}
.mayors-welcome-wrap .mw-message-panel p {
    font-size: 0.9rem;
    color: #444;
    line-height: 1.7;
    margin-bottom: 14px;
}
.mayors-welcome-wrap .mw-read-more {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #0052a5, #003d7a);
    color: #fff;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 8px 18px;
    border-radius: 25px;
    text-decoration: none;
    transition: background 0.25s, transform 0.2s;
    box-shadow: 0 3px 10px rgba(0,82,165,0.3);
}
.mayors-welcome-wrap .mw-read-more:hover {
    background: linear-gradient(135deg, #ea5211, #c9460e);
    color: #fff;
    transform: translateY(-2px);
}

/* Row layout on md+ */
@media (min-width: 768px) {
    .mayors-welcome-wrap { flex-direction: row; }
    .mayors-welcome-wrap .mw-photo-panel { min-width: 190px; max-width: 190px; }
}
</style>

<div class="mayors-welcome-wrap">
    <div class="mw-photo-panel">
        <img src="{{ asset('images/people/mayor/1.jpg') }}"
             onerror="this.src='{{ asset('adminfiles/assets/images/users/default.png') }}'"
             class="mw-avatar" alt="Municipal Mayor">
        <div class="mw-name">Hon. Imelda U. Tan</div>
        <div class="mw-position">Municipal Mayor</div>
        <img src="{{ asset('images/logo/logo2.png') }}"
             onerror="this.style.display='none'"
             class="mw-seal" alt="Sogod Seal">
    </div>
    <div class="mw-message-panel">
        <div class="mw-quote-icon">&ldquo;</div>
        <span class="mw-subtitle"><i class="fa fa-star"></i> Mayor's Message</span>
        <h3>Welcome to the Official Website of Sogod, Southern Leyte</h3>
        <p>
            On behalf of the Municipal Government of Sogod, Southern Leyte, I warmly welcome you to our official website.
            This portal is dedicated to providing you with timely information about our services, programs, and the beautiful
            municipality we are privileged to call home. Our administration remains committed to transparent, accountable,
            and people-centered governance — always in service of every Sogodnon.
        </p>
        <a href="{{ route('about') }}" class="mw-read-more">
            <i class="fa fa-arrow-right"></i> Read Full Message
        </a>
    </div>
</div>
  <!-- 
	</div>
</div>

<div class="w3-card-1">
	<div class="w3-container welcome">
		<h2>Welcome to Sogod Southern leyte portal</h2>
	</div>
	<br>
	<div class="w3-container welcome-msg">
		<p class="w-msg-header">MAYOR'S MESSAGE<p>
		<div class="w-msg-body">
			<img src="{{ asset('images/officials/mayor.jpg') }}" alt="Avatar" class="w3-left w3-margin-right" style="max-width: 120px;">   
			<p>Mayors and other municipal officials are not elected by the general electorate every three years to execute the Rule of Law only.  Stated otherwise, they are elected to manage the development of their respective municipalities.  Thus, mayors are inherently mandated BY THE 1991 Local Government Code and its amendments to fulfill their roles as development managers.Mayors and other municipal officials are not elected by the general electorate every three years to execute the Rule of Law only.  Stated otherwise, they are elected to manage the development of their respective municipalities.  Thus, mayors are inherently mandated BY THE 1991 Local Government Code and its amendments to fulfill their roles as development managers.Mayors and other municipal officials are not elected by the general electorate every three years to execute the Rule of Law only.  Stated otherwise, they are elected to manage the development of their respective municipalities.  Thus, mayors are inherently mandated BY THE 1991 Local Government Code and its amendments to fulfill their roles as development managers.</p>
		</div>
	</div>
	<hr>
	<div class="w3-container welcome-msg">
		<p class="w-msg-header" style="font-weight: bold;">FEATURED NEWS<p>
		<div class="w-msg-body">
			<img src="{{ asset('images/nmr.jpg') }}" alt="Avatar" class="w3-left w3-margin-right" style="width: 100%;height: 250px;">
			<span style="">Published on Aug 30, 2018 10:40:04 PM</span>
			<p style="font-weight: 600"><br>THE QUICK BROWN FOX JUMPS</p>
			<p>
				The quick brown fox jumps over the lazy dog" is an English-language pangram—a sentence that contains all of the letters of the alphabet [...]
			</p>
		</div>
	</div>
</div> -->