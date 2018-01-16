
$(document).ready(function() {

	var usable = $('#usable').get(0);
	var onTrack = $('#on_track').get(0);
	var broken = $('#broken').get(0);

	if(usable.value == 1) { //Checks if any field is already checked, needed when editing

		$('#on_track').attr("disabled", true);
		$('#broken').attr("disabled", true);

	}

	if(onTrack.value == 1) {

		$('#broken').attr("disabled", true);
		$('#usable').attr("disabled", true);

	}

	if(broken.value == 1) {

		$('#on_track').attr("disabled", true);
		$('#usable').attr("disabled", true);

	}

	$('#usable').click( function() {

		if(usable.value == 0) {

			$('#on_track').attr("disabled", true);
			$('#broken').attr("disabled", true);
			usable.value = 1;

		}
		else {

			$('#on_track').attr("disabled", false);
			$('#broken').attr("disabled", false);
			usable.value = 0;
		}

	});

	$('#on_track').click( function() {

		if(onTrack.value == 0) {

			$('#usable').attr("disabled", true);
			$('#broken').attr("disabled", true);
			onTrack.value = 1;

		}
		else {

			$('#usable').attr("disabled", false);
			$('#broken').attr("disabled", false);
			onTrack.value = 0;
		}

	});

	$('#broken').click( function() {

		if(broken.value == 0) {

			$('#on_track').attr("disabled", true);
			$('#usable').attr("disabled", true);
			broken.value = 1;

		}
		else {

			$('#on_track').attr("disabled", false);
			$('#usable').attr("disabled", false);
			broken.value = 0;
		}

	});
});
//te bus checkbox disablosana 