<?php
	include 'account.php';
 
	$query1 = "SELECT * FROM chat ORDER BY timestamp";
	$fetch1 = $connection->query($query1);
	while($row = $fetch1->fetch_array()) :
?>

<div id="chat_in_out">
	<span style="color:blue;"><?php echo $row['name']; ?> : </span> 
	<span style="color:green;"><?php echo $row['message']; ?></span>
</div>

<?php
	echo '<br>'; 
	endwhile; 
?> 

