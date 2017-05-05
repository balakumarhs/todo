<?php
echo "<h1> To do list system</h1><br/>";
echo "Welcome, ".$_COOKIE['login'].'<br/>';
echo "<br> ";

?>
<html>
  <body>
   <h3><strong>Task To Complete</strong></h3>
    <table>
       <tr>
      <th>Task</th>
      <th>Description</th>
      <th>Date</th>
      <th>Time</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      </tr>
        <?php foreach($result as $res):?>
      <tr>
        <td><input style="text-align: center" type="text" placeholder="Task" name="etask" value=" <?php echo $res['todo']; ?>">  </td>
	<td><input style="text-align: center" type="text" placeholder="description" name="edescription" value=" <?php echo $res['description']; ?>">  </td>
        <td><input style="text-align: center" type="text" placeholder="yyyy-mm-dd" name="edate" value=" <?php echo $res['date']; ?>">  </td>
	<td><input style="text-align: center" type="text" placeholder="HH:MM" name="etime" value=" <?php echo $res['time']; ?>"></td>

	<td><form style="margin-top: 15px;" action="index.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" value="Delete">
	    <input type="hidden" name='action' value="deletetask">
            </form>
        </td>
	<td><form style="margin-top: 15px;" action="index.php" method="post">
	    <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" value="Update Status">
	    <input type="hidden" name='action' value="statusupdate">
	    </form>
        </td>
        <td>
	   <form style="margin-top: 15px;" action="index.php" method= "post">
	   <input type="hidden" name= "user_id" value="<?php echo $res['id']; ?>">
	   <input type="submit" value = "Edit">
	   <input type="hidden" name='action' value="edittask">
	   </form>
	</td>
      </tr>  
	<?php endforeach;?>
      
    </table>
      <form method = 'post' action='addtask.php'>
   <br> <input type="submit" value="Add Task"/>
    </form>
 <h3><strong>Completed Task</strong></h3>
    <table>
           <tr>
	   <th>Task</th>
	   <th>Description</th>
	   <th>Date</th>
	   <th>Time</th>
	   <th>&nbsp;</th>
	   </tr>
	   <?php foreach($result2 as $res2):?>
	   <tr>
	   <td> <?php echo $res2['todo']; ?>  </td>
	   <td> <?php echo $res2['description']; ?>  </td>
	   <td> <?php echo $res2['date']; ?>  </td>
           <td> <?php echo $res2['time']; ?>  </td>
           <td><form style="margin-top: 15px;" action="index.php" method="post">
               <input type="hidden" name="user_id" value="<?php echo $res2['id']; ?>">
               <input type="submit" value="Delete">
	       <input type="hidden" name='action' value="deletetask">
	       </form>
	  </td>
          </tr>																									         <?php endforeach;?>
    </table>

  </body>
</html>
