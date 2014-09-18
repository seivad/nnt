<div id="header">
	<div class="content">

		@yield('logo')

		{{ link_to_route('home', 'Not Normal Tours', null, array('class' => 'brandlogo')) }}

		{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'middleoftheworldlogo')) }}

		<div class="callnow">
			<h4>Call Now</h4>
			<h3>1300 669 664</h3>
		</div>

		<nav id="navigation">
			<ul>
				<li>{{ link_to_route('home', 'Home', null, null) }}</li>
				<li>{{ link_to_route('tours', 'Tours', null, null) }}</li>
				<li>{{ link_to_route('bookings', 'Bookings', null, null) }}</li>
				<li>{{ link_to_route('about', 'About', null, null) }}</li>
				<li>{{ link_to_route('contact', 'Contact', null, null) }}</li>
			</ul>
		</nav>

		<ul class="socialmedia">
			<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a></li>
			<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a></li>
			<li><a href="#"><i class="fa fa-2x fa-google-plus-square"></i></a></li>
		</ul>
	</div>
</div>	