<html>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    font-family: cursive;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #4c75af;
    color: white;
}
input[type=submit] {
    width: 120px;
    height: 30px;
    background-color: #4c75af;
    color: white;
    padding: 8px 20px;
    margin: -15px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #729edc;
    }
.welcome{
background:#4c75af;
}
h1 {
font-family: cursive;
color: #fff;
text-align: center;
}
h3 {
font-family: cursive;
text-align: center;
}
p {
font-family: cursive;
color: #fff;
text-align: rigth;
}


</style>
  <body>
  <div class="welcome">
 <h1> To do list system</h1>
  <p> Welcome,<?php echo $_COOKIE['login']?></p>
  </div>
   <h3><strong>Task To Complete</strong></h3>
    <table>
       <tr>
      <th style="text-align: center;">Task</th>
      <th style="text-align: center;">Description</th>
      <th style="text-align: center;">Date</th>
      <th style="text-align: center;">Time</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      </tr>
        <?php foreach($result as $res):?>
      <tr>
        <td style="text-align: center;"> <?php echo $res['todo']; ?> </td>
	<td style="text-align: center;"> <?php echo $res['description']; ?> </td>
        <td style="text-align: center;"> <?php echo $res['date']; ?>  </td>
	<td style="text-align: center;"> <?php echo $res['time']; ?> </td>

	<td><form style="margin-top: 15px;" action="index.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input style="text-align: center;" type="submit" value="Delete">
	    <input type="hidden" name='action' value="deletetask">
            </form>
        </td>
	<td><form style="margin-top: 15px;" action="index.php" method="post">
	    <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" style="text-align: center;" value="Update Status">
	    <input type="hidden" name='action' value="statusupdate">
	    </form>
        </td>
        <td>
	   <form style="margin-top: 15px;" action="index.php" method= "post">
	   <input type="hidden" name= "user_id" value="<?php echo $res['id']; ?>">
	   <input type="submit" style="text-align: center;" value = "Edit">
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
	   <th style="text-align: center;">Task</th>
	   <th style="text-align: center;">Description</th>
	   <th style="text-align: center;">Date</th>
	   <th style="text-align: center;">Time</th>
	   <th>&nbsp;</th>
	   </tr>
	   <?php foreach($result2 as $res2):?>
	   <tr>
	   <td style="text-align: center;"> <?php echo $res2['todo']; ?>  </td>
	   <td style="text-align: center;"> <?php echo $res2['description']; ?>  </td>
	   <td style="text-align: center;"> <?php echo $res2['date']; ?>  </td>
           <td style="text-align: center;"> <?php echo $res2['time']; ?>  </td>
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
