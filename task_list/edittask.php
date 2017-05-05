<?php
foreach ($result3 as $res3):
echo $res3['todo'];
endforeach;
?>
<html>
<body>
<h3>Old Values</h3>
<strong>Task: </strong><input type="text" name="" value=" <?php echo $res3['todo']; ?>"><br><br>
<strong>Description: </strong><input type="text" name="" value=" <?php echo $res3['description']; ?>"><br><br>
<strong>Date: </strong><input type="text" name="" value=" <?php echo $res3['date']; ?>"><br><br>
<strong>Time: </strong><input type="text" name="" value=" <?php echo $res3['time']; ?>"><br><br>
<br>
 <h3>Enter New Values</h3>
 <form style="margin-top: 15px;" action="index.php" method="post">
 <strong>Task: </strong><input type="text" name="edtask"><br><br>
 <strong>Description: </strong><input type="text" name="edescription"><br><br>
 <strong>Date: </strong><input type="date" name="date" ><br><br>
 <strong>Time: </strong><input type="time" name="time" ><br><br>
 <input type="hidden" name="user_id" value="<?php echo $res3['id']; ?>">
 <input type="submit" value="Edit">
 <input type="hidden" name='action' value="etask">
 </form>


</body>
</html>
