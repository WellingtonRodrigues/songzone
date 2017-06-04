<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 well" id="playlist">
			<div id="" class="text-center">
				<img src="http://localhost/covercave/public/img/loading.gif" style="display:block;margin:0 auto;margin-top:6%">
				<p style="color:#FFF">Loading playlists...</p>
			</div>
		</div>
		<div class="col-md-8" id="videoContainer">
			<img src="http://localhost/covercave/public/img/bg169.jpg" class="img-responsive img-rounded">
		</div>
		<div class="col-md-2 text-center">
          <button class="btn btn-block btn-lg" data-toggle="modal" data-target="#modalAddVideo" data-backdrop="static" data-keyboard="false">
            <span class="glyphicon glyphicon-arrow-up"></span> Novo Vídeo
          </button>
          <p class="p-add-video"><strong>Não precisa ser seu!</strong></p>
          <p class="p-add-video">Basta possuir um link do Youtube!</p>
        </div>
	</div>
</div>

<hr>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 well text-center" id="containerListVideos">
			<ul class="nav navbar-nav">
            	<form class="navbar-form" role="search">
                	<div class="form-group">
						<select id="selectSearch" class="form-control input-lg">
                        	<option value="a">Artists</option>
                        	<option value="s">Songs</option>
                      	</select> 
                      	<input type="text" data-provide="typeahead" autocomplete="off" class="form-control input-lg" id="search" size="100">
                    </div>
				</form> 
			</ul>
			
	<!-- LIST VIDEOS -->
		<div class="loader"></div>
        <div class="list-videos">
        <p>Showing results for: <strong>Featured</strong></p>
          <?php
            foreach ($data["featuredVideos"] as $video){
              echo "<div class='video-info well col-md-3'>
                      <img src='http://img.youtube.com/vi/" . $video->getProviderVideoId() . "/mqdefault.jpg' class='img-rounded'>
                      <p class='p-music'><strong>" . $video->getSongName() . "</strong></p>
                      <p class='p-artist'>" . $video->getArtistName() . "</p>
                      <div class='btns-play-add'>
                        <button type='button' class='btn btn-default'>
                          <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
                        </button>
                        <button type='button' class='btn btn-default' onclick='play(" . $video->getId() . ")'>
                          <span class='glyphicon glyphicon-play' aria-hidden='true'></span>
                        </button>
                      </div>
                    </div>";
            }
          ?>
        </div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>