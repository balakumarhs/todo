<html>
<body>
<div>
<form method = 'post' action='index.php'>
<strong> Task: </strong> <input type='text' name='task'/><br><br>
<strong> Description: </strong> <input type='text' name='description'/><br><br>
<strong> Date: </strong> <input type="date" name = "datetodo"><br><br>
<strong> Time: </strong><input type="time" name="timetodo"><br><br>
<input type="hidden" name="userid" value="<?php echo $_COOKIE['my_id']; ?>">
<input type = 'hidden' name = 'action' value='addtask'><br>
<input type="submit" value="Add Task"/>
</form>
</div>
</body>
</html>
