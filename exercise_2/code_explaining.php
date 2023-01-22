<?php
public function getServiceTimesForRestaurant(Restaurant $restaurant, Carbon $date, $ignoreBookingDuration=falsw)
{
	// Setup empty arrays for temporal data storage
	$booking_times = [];
	$filtered_booking_times = [];
	$opening_hours = [];

	// Get the day of this date in english
	$day = $date->englishDayOfWeek;
	// Fetch the value of the default booking time step in minutes
	$step = $restaurant->default_booking_time_step_minutes; // ex 15 or 30 minutes

	try {
		// Evaluate and assign to ssh if in special service hours
		// ssh is assigned only if the valye is not falsy (zero, null, empty string)
		if ($ssh = $restaurant->inSpecialServiceHoursActive($date)) {
			// Hide the restaurant special service hours for that day
			$service_hours = $restaurant->specialServiceHours($day, $ssh->id)
			->makeHidden('id', 'day', 'restaurant_id', 'created_at', 'updated_at');
		} else {
			// Hide the restaurant service hours for that day
			$service_hours = $restaurant->serviceHours($day)
			->makeHidden('id', 'day', 'restaurant_id', 'created_at', 'updated_at');
		}
		// throw if this hour assignment cannot be completed
	} catch (\Throwable $th) {
		// returns an empty booking time
		return $booking_times;
	}

	// Unused skip variable 
	$skip = [];

	// Cycle through each service hour
	foreach ($service_hours as $service_hour) {
		// Count helper variables starting at 1
		$c++;
		
		// Create open and close times with the given format
		// Format is 24 hours, Minutes with leading zeros, second with leading zeros
		// 23:00:00
		$open = Carbon::createFromFormat('H:i:s', $service_hour->open);
		$close = Carbon::createFromFormat('H:i:s', $service_hour->close);

		// If the service hour enforces one uninterrumpted use of the service
		if ($service_hour->enforce_one_sitting) {
			// Add the open hour to the booking times excluding the seconds
			$booking_times[] = $open->format('H:i');
			// Continue with the next hour of service
			continue;
		}
		// If the current service hour ignores the booking duration 
		if ($service_hour->ingore_booking_duration) {
			// Set this flag to true
			$ignoreBookingDuration = true;
		}
		// If the current counter is equal to the amount of the service hours
		// and the booking duration is not ignored
		if ($c == count($service_hours) && !$ignoreBookingDuration) {
			// Substract the total restaurant booking duration hours in minutes from the closing time
			$close->subMinutes($restaurant->default_booking_duration_hours);
		}

		// Define a difference in minutes between the opening and the closing time;
		$diff = $open->diffInMinutes($close);
		// Add the open hour to the booking times excluding the seconds
		$booking_times[] = $open->format('H:i');

		// While theres is a difference between closing and opening of the service time in minutes
		// and 
		// ------
		// the minute of closing is the ending minute of an hour (59) 
		// or
		// adding 15 or 30 minutes to the opening time ensures that is less than or equal to the closing time
		//
		// Meaning: If there is time between the closing and opening of the hour and adding the booking step wont overshoot the closing hour
		while($diff > 0 && ($close->format('i') == '59' || $open->copy()->addMinutes($step)->lte($close))) {
			// Add the added 15 / 30 minutes to the opening time to the booking times
			$booking_times[] = $open->addMinutes($step)->format('H:i');
			// Substract the added step from the current difference
			$diff -= $step;
		}
	}
	
	// If the given date is today
	if($date->isToday()) {
		// Set a booking time with the added booking minutes before setted by the restaurant
		$firstBookingTime = Carbon::now()->addMinutes($restaurant->widget_booking_minutes_before);

		// Cycle through all the current booking times
		foreach($booking_times as $idx => $bt) {
			// Create a carbon date for better date manipulation
			$bt_carbon = Carbon::createFromTimeString($bt);

			// If the firstBookingTime is after or equal to the current bookint time
			if($firstBookingTime >= $bt_carbon) {
				// Delete the current booking time
				unset($booking_times[$idx]);
			}
		}
	}

	// Remove all the duplicate booking times
	$booking_times = array_unique($booking_times);
	
	// Resets all the indexes of the booking times.
	// Removing the duplicates didn't reset the indexes.
	$booking_times = array_values($booking_times);

	// If the last booking times is the start of the day
	if (end($booking_times) == '00:00')
	{
		// Remove it
		array_pop($booking_times);
	}
	// Sort all the booking times, from 00:00 to 23:59
	sort($booking_times);

	// Return the values
	return $booking_times;
}
