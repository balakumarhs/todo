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
      <th>&nbsp;</th>
      </tr>
        <?php foreach($result as $res):?>
      <tr>
        <td> <?php echo $res['todo']; ?>  </td>
	 <td> <?php echo $res['todo']; ?>  </td>

	<td><form action="index.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" value="Delete">
	    <input type="hidden" name='action' value="deletetask">
            </form>
        </td>
	<td><form action="index.php" method="post">
	    <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" value="Update Status">
	    <input type="hidden" name='action' value="statusupdate">
	    </form>
        </td>
      </tr>  
	<?php endforeach;?>
      
    </table>
      <form method = 'post' action='addtask.php'>
   <br> <input type="submit" value="Add Task"/>
    </form>
    
  </body>
</html>
