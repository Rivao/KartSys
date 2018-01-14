
$(document).ready(function() {



	var usable = $('#usable').get(0);
	var track = $('#on_track').get(0);
	var broken = $('#brokenCheckB').get(0);

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

		if(usable.value == 0) {

			$('#usable').attr("disabled", true);
			$('#broken').attr("disabled", true);
			usable.value = 1;

		}
		else {

			$('#usable').attr("disabled", false);
			$('#broken').attr("disabled", false);
			usable.value = 0;
		}

	});

	$('#broken').click( function() {

		if(usable.value == 0) {

			$('#on_track').attr("disabled", true);
			$('#usable').attr("disabled", true);
			usable.value = 1;

		}
		else {

			$('#on_track').attr("disabled", false);
			$('#usable').attr("disabled", false);
			usable.value = 0;
		}

	});
});
//te bus checkbox disablosana 