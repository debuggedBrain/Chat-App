<?php 
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   
   include 'account.php';
   
   $active = "SELECT name FROM chat WHERE id='0001' OR id='0002' ORDER BY timestamp";
   $fetch_active = $connection->query($active);
   while($row_active = $fetch_active->fetch_array()) :
   
   echo $row_active['name'];
   echo " is connected to this chat. <br>";
   
   endwhile;
   ?>
<html>
   <head>
      <title>Chat Application IT 202</title>
      <link rel="stylesheet" href="style.css" media="all" />
      <script> 
         function chat_ajax(){ 
         var req = new XMLHttpRequest(); 
         req.onreadystatechange = function(){ 
         	if(req.readyState == 4 && req.status == 200){ 
         		document.getElementById('chat_area').innerHTML = req.responseText; 
         	} 
         } 
         req.open('GET', 'chat.php', true); 
         req.send();
         } 
         setInterval(function(){chat_ajax()}, 1000) 
      </script>
   </head>
   <body>
      <div id="wrapper">
      <div id="menu">
         <p class="welcome">Welcome to the chat!<b></b></p>
      </div>
      <div id="container">
         <div id="chat_area"> 
         </div>
         <form method="post" action="index.php" name="sendData">
            <?php
	               if(isset($_POST['submit'])){ 
	               $name = $_POST['name']; 
	               $message = $_POST['message'];
	               $id = $_POST['id']; 
	               $query2 = "INSERT INTO chat (name,message,id) VALUES ('$name','$message',$id)"; 
	               $fetch2 = $connection->query($query2); 
               ?> 
            <input type="text" name="name" placeholder="Enter Your Name: " />
            <input type="text" name="id" placeholder="Enter Your id: " />  
            <textarea name="message" placeholder="Enter the Message: "></textarea> 
            <input type="submit" name="submit" value="Send Message" />
         </form>
         <?php
         foreach (array_keys($GLOBALS) as $k) unset($$k);
         unset($k);
         ?>
      </div>
   </body>
</html>

