$(document).ready(function() {
$('.center_list').hide();

var daTe = new Date();
var cDate = Number(daTe.getDate());
$('#date').val(cDate - 1);
$('#month').val(daTe.getMonth() + 1);
$('#year').val(daTe.getFullYear());

$('#csv_table').val($('#date').val() + '_' + $('#month').val() + '_' + $('#year').val());

$(window).on('keydown', function(e) {
	if(e.keyCode == 13) {
	    e.preventDefault();
		return false;
	}
});

$('#center').on('click', function() {
    $('.center_list').show();
});

$('.center_list').on('click', function() {
	$(this).hide();
});

$('.center_list ul li').on('click', function() {
	$('#center').val($(this).attr('id'));
	$('#tow1').focus();
});

$('#trw1, #trw2, #tow1, #tow2').on('keyup', function() {
	
    if($(this).attr('id') == 'trw1' || $(this).attr('id') == 'tow1') {
		$('#nw1').val(Number( $('#tow1').val() ) - Number( $('#trw1').val() ));
	}else {
		$('#nw2').val(Number( $('#tow2').val() ) - Number( $('#trw2').val() ));
	}
	$('#tnw').val( (Number($('#nw1').val()) + Number($('#nw2').val())) / 1000);
	
	if($(this).val().length == 4) {
		
		if($(this).attr('id') == 'tow1') {
			$('#trw1').val('');
			$('#trw1').focus();
		}else if($(this).attr('id') == 'trw1') {
			$('#tow2').val('');
			$('#tow2').focus();
		}else if($(this).attr('id') == 'tow2') {
			$('#trw2').val('');
			$('#trw2').focus();
		}else {
			$('#trw2').blur();
		}
	}
	
})
	
$('#caneH').validate({
    rules: {
		center: {
		    required: true
		},
		tow1: {
		    required: true,
			maxlength: 4
		},
		tow2: {
		    required: true,
			maxlength: 4
		},
		trw1: {
		    required: true,
			maxlength: 4
		},
		trw2: {
		    required: true,
			maxlength: 4
		},
		nw1: {
		    required: true,
			maxlength: 4
		},
		nw2: {
		    required: true,
			maxlength: 4
		},
		tnw: {
		    required: true
		}
	}
})

	
}); //End Line