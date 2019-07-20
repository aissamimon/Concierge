// $(document).ready(function(e){

// 	$("#saveNewIncident").click(function(e){

	

// 		e.preventDefault();
// 		$.ajaxSetup({
// 		  headers: {
// 		      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
// 		  }
// 		});

// 		jQuery.ajax({

// 	      url: "{{ url('/incident') }}",
// 	      method: 'post',
// 	      data: {
// 	         name: jQuery('#name').val(),
// 	         description: jQuery('#description').val(),
// 	         incident_type_id: jQuery('#incidentTypeId').val()
// 	      },
// 	      success: function(result){
// 	         console.log(result);
// 	  }});

	

// 	});

    
// });
