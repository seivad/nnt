@extends('layouts.master')

@section('styles')
	<link rel="stylesheet" href="{{ asset('/css/middle-of-the-world.css') }}">
@stop

@section('logo')
	{{ link_to_route('middle-of-the-world', 'Middle of the World Tour', null, array('class' => 'logo')) }}
@stop

@section('content')
<div class="container middle-of-the-world">
	<div class="content group">
		<div class="main">

		<img class="tour-logo" src="{{ $tour->text_logo }}" alt="{{ $tour->title }}" />

		<h1>{{ $tour->tagline }}</h1>

		<h2>{{ $tour->info['tour'] }}</h2>

		<p><strong>{{ $tour->description }}</strong></p>

		<ul class="itinerary">
		@forelse($tour->itinerary as $itinerary)
			<li>
				<h3>{{ $itinerary['day'] }}: {{ $itinerary['title'] }}</h3>
				<p>
				@forelse($itinerary['activities'] as $activities)
					{{ $activities }}<br />
				@empty

				@endforelse
				</p>
			</li>
		@empty

		@endforelse
		</ul>

		<div class="gallery">
			@forelse($tour->gallery as $gallery)
				<img src="{{ $gallery }}" alt="{{ $tour->title }}" />
			@empty
				<p>No Gallery Available</p>
			@endforelse
		</div>

		</div><!-- /main -->

		<div class="sidebar">

			<div class="info">
				<h3>What's Included</h3>
				<p>
					@forelse($tour->info['included'] as $inclusions)
					{{ $inclusions }},
				@empty
				No Info available on included items
				@endforelse
				</p>

				<h3>Not Included:</h3>
				<p>
				@forelse($tour->info['not_included'] as $noninclusions)
					{{ $noninclusions }},
				@empty
					No Info available on not included items
				@endforelse
				</p>

				<h3>Price:</h3>
				<p><a href="#">From {{ '$' . number_format(($tour->price['total']/100), 2) }} AUD Per Person</a></p>

				<p>
					<strong>Group Size:</strong> Maximum {{ $tour->info['group_size'] }} People<br />
					<strong>Tour:</strong> {{ $tour->info['tour'] }}<br />
					<strong>Begins:</strong> {{ $tour->info['begin'] }}<br />
					<strong>Finishes:</strong> {{ $tour->info['finish'] }}<br />
					<strong>Transportation:</strong> {{ implode(", ", $tour->info['transport']) }}<br />
					<strong>Accommodation:</strong> {{ implode(", ", $tour->info['accommodation']) }}<br />
					<strong>Optional Trips:</strong><br />{{ implode("<br />", $tour->additional_trips) }}
				</p>
					
				<p><strong>Terms &amp; Conditions:</strong> To secure your booking a deposit of $250 dollars has to be paid at the time of booking. The remainding amount has to be paid 2 weeks prior to the departure day.</p>


				<div id="bookings">
					<h3>Available Dates:</h3>

					<table>
						<thead>
							<tr>
								<th>Starts</th>
								<th>Spots</th>
								<th>Price</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						@forelse($tour->dates as $dates)
							@if($dates['spaces'] > 0)


								<tr class='clickableRow' title="{{ ($dates['spaces'] < 5) ? "Hurry less than 5 spots available" : $dates['spaces'] . " spots available"}}" href='{{ url('bookings', $parameters = array($tour->id, $dates['id'])) }}'>
									<td>{{ $dates['start_date'] }}</td>
									<td>{{ $dates['spaces'] }}</td>
									<td>${{ number_format(($dates['price']/100), 2) }} AUD</td>
									<td><i class="fa fa-arrow-circle-right"></i></td>
								</tr>
							@else
								<tr>
									<td class="strike">{{ $dates['start_date'] }}</td>
									<td class="strike">{{ $dates['spaces'] }}</td>
									<td class="strike">${{ number_format(($dates['price']/100), 2) }} AUD</td>
									<td>&nbsp;</td>
								</tr>							
							@endif
						@empty
							<tr>
								<td>-</td>
								<td>$0.00</td>
							</tr>
						@endforelse
						</tbody>
					</table>
				</div><!-- /bookings -->

				<hr />

				<a href="{{ route('contact') }}" class="button blue" id="booking-request">Booking Inquiry</a>

			</div><!-- /info -->

			<div class="reviews">
				<h3>Latest Reviews</h3>
				
				@forelse($tour->reviews as $review)
					<div class="star-rating"> 
					  <span class="fa fa-star-o" data-rating="1"></span>
					  <span class="fa fa-star-o" data-rating="2"></span>
					  <span class="fa fa-star-o" data-rating="3"></span>
					  <span class="fa fa-star-o" data-rating="4"></span>
					  <span class="fa fa-star-o" data-rating="5"></span>
					  <input type="hidden" name="whatever" class="rating-value" value="{{ $review['rating'] }}">
					</div>
					<ul>
						<li><p class="italics">"{{ $review['review'] }}, <span class="reviewer">{{ $review['name'] }}</span>"</p></li>
					</ul>
				@empty
					<ul>
						<li>No reviews have been left!</li>
					</ul>
				@endforelse
				
			</div><!-- /reviews -->

			<div class="map">
				<div id='location-canvas' style='width:100%;height:350px;'></div>
			</div><!-- /map -->

			<div class="quicklinks">
				<ul>
					<li><a href="{{ route('contact') }}"><i class="fa fa-2x fa-phone"></i> Request A Callback</a></li>
					<li><a href="{{ route('contact') }}"><i class="fa fa-2x fa-paper-plane"></i> Travel Map</a></li>
					<li><a href="{{ route('contact') }}"><i class="fa fa-2x fa-comments"></i> Questions?</a></li>
				</ul>
			</div><!-- /quicklinks -->

		</div><!-- /sidebar -->

	</div><!-- /content -->

	<div class="footergraphic"></div>

</div><!-- /container -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

	$(document).ready(function() {
		//$('#booknow').click(function(e){
			//$('#bookings').slideToggle('slow');
			//e.preventDefault();
		//});

		$(".clickableRow").click(function() {
	            window.document.location = $(this).attr("href");
	      });

		var $star_rating = $('.star-rating .fa');

		var SetRatingStar = function() {
		  return $star_rating.each(function() {
		    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
		      return $(this).removeClass('fa-star-o').addClass('fa-star');
		    } else {
		      return $(this).removeClass('fa-star').addClass('fa-star-o');
		    }
		  });
		};

		SetRatingStar();

	});

	function init_map(){
		var myOptions = {disableDefaultUI: true,zoom:8,center:new google.maps.LatLng(-2.1709979,-79.92235920000002),mapTypeId: google.maps.MapTypeId.ROADMAP};
		map = new google.maps.Map(document.getElementById("location-canvas"), myOptions);
		marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-2.1709979, -79.92235920000002)});

		var flightPlanCoordinates = [
			new google.maps.LatLng(37.772323, -122.214897),
			new google.maps.LatLng(21.291982, -157.821856),
			new google.maps.LatLng(-18.142599, 178.431),
			new google.maps.LatLng(-27.46758, 153.027892)
		];
		var lineSymbol = {
		  path: 'M 0,-1 0,1',
		  strokeOpacity: 1,
		  scale: 4
		};

		var flightPath = new google.maps.Polyline({
		path: flightPlanCoordinates,
		geodesic: true,
		strokeColor: '#f89a1f',
		strokeOpacity: 0,
		strokeWeight: 1,
		icons: [{
			icon: lineSymbol,
			offset: '0',
			repeat: '20px'
		}],
			});

			flightPath.setMap(map);


	}
	google.maps.event.addDomListener(window, 'load', init_map);
	google.maps.event.addDomListener(window, 'resize', init_map);
</script>

@stop