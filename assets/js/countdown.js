function count(waktuexpired){
	var timestamp = (waktuexpired) - Date.now();

	timestamp /= 1000; // from ms to seconds
	component(x, v);

	setInterval(function() { // execute code each second

	    timestamp--; // decrement timestamp with one second each second

	    var days    = component(timestamp, 24 * 60 * 60),      // calculate days from timestamp
	        hours   = component(timestamp,      60 * 60) % 24, // hours
	        minutes = component(timestamp,           60) % 60, // minutes
	        seconds = component(timestamp,            1) % 60; // seconds

	    return days + " days, " + hours + ":" + minutes + ":" + seconds; // display

	}, 1000); // interval each second = 1000 ms
}

function component(x, v) {
    return Math.floor(x / v);
}