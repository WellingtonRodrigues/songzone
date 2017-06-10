//Playlist global variables
nowPlaying = 0;
	
$(function() {
	loadPlaylist();	
	
	$('#playlist-items').sortable({
		  containment: "parent",
		  cursor: "move",
		  opacity: 0.8,
		  revert: true,
		  tolerance: "pointer",
		  stop: function(){
			  var videos = [];
			  $.map($(this).find("li"), function(el){ // returns items in the current order
				 console.log("Index: " + $(el).index() + " - ID: " + el.id);
				 
				 videos.push(el.id.split("_")[1]); // removes the "video-id" part of the id
			  });
			  $.ajax({
					type:"POST",
					data:{
						videos:videos
					},
					url:"http://localhost/songzone/public/services/updatePlaylist"
				});
		  }
	});
});

function showTextLoadingPlaylist(){
	$("#playlist-items").empty();
	$("#playlist-items").append(
		'<div id="text-loading-playlists" class="text-center"><img src="http://localhost/covercave/public/img/loading.gif" style="display:block;margin:0 auto;margin-top:6%"><p style="color:#FFF">loading playlist...</p></div>'
	);
}

function hideTextLoadingPlaylist(){
	$("#text-loading-playlists").hide();
}

function loadPlaylist(){
	showTextLoadingPlaylist();
	
	$.ajax({
		type:"POST",
		url:"http://localhost/songzone/public/services/getPlaylist",
		success:function(playlist){
			hideTextLoadingPlaylist();
			playlist = JSON.parse(playlist);
			if(playlist.length < 1){
				$("#playlist-items").append("<div class='text-center'><span id='text-no-videos-yet'>No videos yet</span></div>");
			}
			for(var i in playlist) {
				var video = playlist[i];
				$("#playlist-items").append(
					'<li class="list-group-item" id="video-id_' + video.video_id + '" onclick="play(' + video.video_id + ');"><span class="glyphicon glyphicon-music icone-item-playlist"></span> ' + video.song_name + '</li>'
				)
			}
		}
	});
}

function addToPlaylist(videoID){
	showTextLoadingPlaylist();
	
	$.ajax({
		type:"POST",
		data:{
			videoID:videoID
		},
		url:"http://localhost/songzone/public/services/addToPlaylist",
		success:function(){
			loadPlaylist();
		}
	});
}