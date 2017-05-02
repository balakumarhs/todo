<?php
echo "<h1> To do list system</h1><br/>";
echo "Welcome, ".$_COOKIE['login'].'<br/>';
echo "Below you may find your to-do items: ";
echo "<br> <br>";

?>
<html>
  <body>
    <table>
       <tr>
      <th>Task</th>
      <th>&nbsp;</th>
      </tr>
        <?php foreach($result as $res):?>
      <tr>
        <td> <?php echo $res['todo']; ?>  </td>
	<td><form action="." method="post">
	    <input type="hidden" name="action" value="delete_task">
            <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" value="Delete">
	    </form>
	</td>
      </tr>  
	<?php endforeach;?>
      
    </table>
    <form method = 'post' action='index.php'>
        <strong> Description: </strong> <input type='text' name='description'/><br>
	<input type="hidden" name="userid" value="<?php echo $_COOKIE['my_id']; ?>">

	<input type = 'hidden' name = 'action' value='add'><br>
	<input type="submit" value="Add"/>
    </form>
  </body>
</html>
