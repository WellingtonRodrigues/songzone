<div class="container">
	<div class="row well">
		<?php 
			echo '<form action="' . BASE_URL . '/admin" method="POST">';
		?>
		
			<div class="form-group">
				<label for="inputLinkVideo">Link</label>
				<input type="text" id="inputLinkVideo" name="link" class="form-control"></input>
				<select name="instrument" class="form-control">
					<?php 
						foreach ($data["instruments"] as $instrument){
							$id = $instrument->getId();
							$name = $instrument->getName();
							echo '<option value="' . $id . '">' . $name . '</option>';
						}
					?>
				</select>
				<select name="song" class="form-control">
					<?php 
						foreach ($data["songs"] as $song){
							$id = $song->getId();
							$name = $song->getSongName();
							echo '<option value="' . $id . '">' . $name . '</option>';
						}
					?>
				</select>
				<button type="submit">Save</button>
			</div>
		</form>
	</div>
</div>