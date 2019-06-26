<div class="col-sm-7 text-left"> 
		
		<?php
		
		while ($row = mysqli_fetch_array($result)) {
		$height_total=$row["Height"];
		$height_feet=intdiv($height_total, 12);
		$height_inch=$height_total%12;
		
		$_age = floor((time() - strtotime($row["dob"])) / 31556926);
		$post_id=$row["id"];
		?>
			
		<div id="card">
			<div id="card_image">
			<img src="images/<?php echo $row["photo"];?>" style="width:100%; height:100%">
			</div>
			<div id ="card_details">
			<h5>Name: <?php echo $row["Name"]; ?> (<?php echo $row["gender"];?>)</h5>
			<h5>Age & Height : <?php echo $_age;?> , <?php echo "$height_feet' $height_inch\"";?> </h5>
			<h5>Religion: <?php echo $row["Religion"];?></h5>
			<h5>Location: <?php echo $row["Location"];?></h5>
			<h5>Education: <?php echo $row["Education"];?></h5>
			<h5>Profession: <?php echo $row["Profession"];?></h5>
			<a href ="details.php?post_id=<?php echo $post_id?>" id="btn_view_details">View Details</a>
			</div>
		  </div>
		  
		  <?php
		  
		}
		
		?>
		  
		  
		</div>