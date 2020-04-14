<!DOCTYPE html>
<html>
<head>
	<title>Task 3</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<fieldset><legend>Type your comment here!</legend><form method = "post" action = "<?php echo base_url()?>main/form_validation" name = 'commentForm'>
	<?php
	if($this->uri->segment(2) == "added"){
		echo '<p>Comment Added</p>';
	}
	?>
	<label>Username</label>
	<input type = 'text' name = 'username' placeholder = 'Enter username'><br><br>
	<label>E-Mail</label>
	<input type = 'text' name = 'mail' placeholder = 'Enter E-Mail'><br><br>
	<span><?php echo form_error("mail");?></span>
	<label>Comment*</label><br>
	<textarea maxlength="255" rows = "12" cols = "50" name = "text" placeholder = "Enter a comment..."></textarea><br>*Max length of the comment - 255 symbols<br>
	<span><?php echo form_error("text");?></span>
	<button type = 'submit' name = 'submit'>Send</button></form></fieldset>

	<fieldset><legend><h3>Comments section</h3></legend>
		<?php
		echo $pages;
		if(!isset($fetch_data)){
		?>
		<p>No Data Found</p>
		<?php
		}
		else{
			foreach($fetch_data as $row){
		?>
			<fieldset><legend><p align = 'left'><?php if(!empty($row['username'])) {echo $row['username']." / ".$row['email']; } else { echo $row['email'];  } ?></p></legend>
			<p align = 'left'><?php echo $row['text']; ?></p></fieldset>
		<?php
			}
		}
		?>
	</fieldset>
</body>
</html>