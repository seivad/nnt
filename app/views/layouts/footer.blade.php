<div id="footer">
	<div class="content">
		{{ link_to_route('home', 'Not Normal Tours', null, array('class' => 'footerlogo')) }}


		<div class="linkgroup">
			<h3>Handy Links</h3>
			<ul class="links">
				<li>{{ link_to_route('home', 'Home', null, array('class' => 'link')) }}</li>
				<li>{{ link_to_route('tours', 'Tours', null, array('class' => 'link')) }}</li>
				<li>{{ link_to_route('bookings', 'Bookings', null, array('class' => 'link')) }}</li>
				<li>{{ link_to_route('about', 'About', null, array('class' => 'link')) }}</li>
				<li>{{ link_to_route('contact', 'Contact', null, array('class' => 'link')) }}</li>
			</ul>
		</div>

		<div class="linkgroup">
			<h3>South America Tours</h3>
			<ul class="links">
				<li>{{ link_to_route('middle-of-the-world', 'The Middle Of The World', null, array('class' => 'link')) }}</li>
				<li>Volcano Hopping (Coming Soon)</li>
				<li>Another World (Coming Soon)</li>
			</ul>
		</div>

		<div class="linkgroup">
			<h3>Connect With Us</h3>
			<ul class="links">
				<li><a href="mailto:info@notnormaltours.com">info@NotNormalTours.com</a></li>
				<li><a href="http://www.notnormaltours.com">www.NotNormalTours.com</a></li>
				<li><a href="https://www.facebook.com/notnormaltours">Facebook</a></li>
				<li><a href="#">Twitter</a></li>
				<li><a href="#">Google+</a></li>
			</ul>
		</div>

		<div class="linkgroup quicklinks">
			<h3>Connect With Us</h3>
			<a href="tel:1300367376">1300 367 376</a>

			<h3>Email</h3>
			<a href="{{ route('contact') }}">Quick Inquiry</a>

			<h3>Socialmedia</h3>
			<a href="{{ route('contact') }}">Like Us</a>
		</div>

	</div><!-- /content -->
</div>

<div id="copyright">
	<div class="content">
		<p>ABN: 30 324 455 454 | {{ link_to_route('terms', 'Terms &amp; Agreements') }} | {{ link_to_route('privacy', 'Privacy') }}</p>
	</div><!-- /content -->
</div><!-- /copyright -->