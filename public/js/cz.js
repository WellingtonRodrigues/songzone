$(function() {
  $('.selectpicker').selectpicker();

  $('.video-info').on('click', function(){
  	$('#modalVideo').modal('show');
  });

  $('#modalAddVideo').on('shown.bs.modal', function() {
    $('.modalAddVideoErro').hide();
    $('.addVideoSubmit').prop('disabled', false);
  	$('.addVideoSubmit').text("Enviar");
	});

	$('.addVideoCancelar').on('click', function(){
  		$('#modalAddVideo').modal('hide');
  	});

  $('.addVideoSubmit').on('click', function(){
  	/*$('#modalAddVideo').modal({
		  backdrop: 'static',
		  keyboard: false
		});*/

  	$(this).prop('disabled', true);
  	$(this).text("Enviando...");
  	$('.modalAddVideoErro').hide();

  	var link = $('#inputLinkVideo').val();

  	$.ajax({
		type:"POST",
		data:{
			link:link
		},
		url:"http://localhost/testes/cz.php",
		success:function(response){
			$('.contentAddVideo').empty();
			$('.contentAddVideo').append(response);
			/*if(response.status=="success"){

			}
			else if(response.status=="error"){
				$('.modalAddVideoErro').text(response.msg);
				$('.modalAddVideoErro').show();
			}
			else{
				$('.modalAddVideoErro').text("Desculpe, ocorreu um erro inesperado.");
				$('.modalAddVideoErro').show();
			}*/
			//$("#selectArtista").empty();
			//$("#selectArtista").append(a);
		}
	});
  });

  $("#search").typeahead({
  	source: function(query, process){
  		var selected = $("#selectSearch").val();
  		
  		if(selected == "a"){
  			var url = base_url + "/services/getArtists";
  		}
  		else{
  			var url = base_url + "/services/getSongs";
  		}
  		
  		$.ajax({
  			url: url,
  			type: "POST",
  			data: "query=" + query,
  			dataType: "JSON",
  			async: true,
  			success: function(data){
  				//alert(data);
  				process(data);
  			}
  		});
  	}
  });
  
  $("#search").change(function() {
	    var current = $("#search").typeahead("getActive");
	    if (current) {
	        if (current.name == $("#search").val()) {
	        	$(".loader").fadeIn("fast");
	        	
	        	var selected = $("#selectSearch").val();
	      		
	        	$.ajax({
	        		type:"POST",
	        		data:{
	        			category:selected,
	        			id:current.id
	        		},
	        		url:base_url + "/home/videos",
	        		success:function(data){
	        			$(".list-videos" ).empty();
	        			$(".list-videos" ).append(data);
	        			$(".loader").fadeOut("fast");
	        		}
	        	});
	        	
	        	//alert(current.id);
	        }
	    }
	});

 });

function play(id){
	$.ajax({
		type:"POST",
		data:{
			id:id
		},
		url:base_url + "/services/getProviderId",
		success:function(response){
			if(response.status == "success"){
				$("#videoContainer").empty();
				$("#videoContainer").append('<div class="embed-responsive embed-responsive-16by9 video"><iframe class="embed-responsive-item" src="http://www.youtube.com/embed/' + response.providerVideoID + '?autoplay=1&color=white"></iframe></div>');
				$('html, body').animate({ scrollTop: 0 }, 'fast');
			}
		}
	});
}