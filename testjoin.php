<? php 
	$db = mysqli_connect('localhost', 'root', '', 'mydb');

	$query="SELECT * FROM `test`";
	$result =mysql_query($db,$query);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Join of 2 tables</title>
 	<style type="text/css">
 		body{
				font-size: 120%;
				width: 100%;
				background-image: url('img/wallpaper.jpg');
			}
 	</style>
 </head>
 <body>
 <div class='info'>
        <table class='table'>
          <tr>
            <th>Book</th>
            <th>Song</th>
            <th>Name</th>
          </tr>
          <? php 
          if (mysqli_num_rows($result)>0)
            { while($row = mysqli_fetch_array($result))
              {
          ?>
          <tr>
          	<td>
          		<?php echo $row['Name']; ?>          		
          	</td>
            <td>
            	<?php echo $row['Book']; ?>
            </td>
            <td>
            	<?php echo $row['Song']; ?>
            </td>
          </tr>
          <? php
            }
          }
          ?>
          
        </table>
      </div>
 </body>
 </html>
