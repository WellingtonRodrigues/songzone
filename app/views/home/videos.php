<p>Showing results for: <strong>Featured</strong></p>
<?php

if(empty($data["videos"])){
	echo '<div class="alert alert-info" role="alert"><strong>No videos found :(</strong></div>';
}

foreach ($data["videos"] as $video){
	echo "<div class='video-info well col-md-3'>
                      <img src='http://img.youtube.com/vi/" . $video->getProviderVideoId() . "/mqdefault.jpg' class='img-rounded'>
                      <p class='p-music'><strong>" . $video->getSongName() . "</strong></p>
                      <p class='p-artist'>" . $video->getArtistName() . "</p>
                      <div class='btns-play-add dropdown'>
                        <button type='button' class='btn btn-default dropdown-toggle btn-add-to-playlist' id='btn-add-" . $video->getId() ."' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                          <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
                        </button>" .
                      		
                      	'<ul class="dropdown-menu" aria-labelledby="btn-add-' . $video->getId() .'">
						    <li><a href="#" onclick="addToPlaylist(' . $video->getId() .')">Add to Playlist</a></li>
						  </ul>' .
                      		
                        "<button type='button' class='btn btn-default btn-play-video' onclick='play(" . $video->getId() . ")'>
                          <span class='glyphicon glyphicon-play' aria-hidden='true'></span>
                        </button>
                      </div>
                    </div>";
}
?>
