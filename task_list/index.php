<?php
//$id = $_SESSION['userid'];
//echo $id;
require('../model/db_connection.php');
require('../model/db.php');
$action = filter_input(INPUT_POST, "action");
if($action == NULL)
{
  $action = "show_login_page";
}
if($action == "show_login_page")
{
  include('./index.php');
}else if($action == 'test_user')
{
  $username = $_POST['email'];
  $password = $_POST['password'];
  $suc = isUserValid($username,$password);
  if($suc == true)
  {
   $id = $_SESSION['id'];
   $result = getTodoItems($id);
   $result2 = completedItems($id);
    include('list.php');
   
    
   
  }else{
    header("Location: ../error/badinfo.php");
  }
}else if ($action == 'register')
{
// echo " we want to create a new account";
       $fname = filter_input(INPUT_POST, 'firstname');
       $lname = filter_input(INPUT_POST, 'lastname');
       $contact = filter_input(INPUT_POST, 'contact');
       $email = filter_input(INPUT_POST, 'mailid');
       $username = filter_input(INPUT_POST, 'user');
       $password = filter_input(INPUT_POST, 'password');
       $birth = filter_input(INPUT_POST, 'dob');
       $gender = filter_input(INPUT_POST, 'gender');
       $exit = registerUser($fname,$lname,$contact,$email,$username,$password,$birth,$gender);
       if($exit == true)
       {
      // echo "already exist";
        header("Location: ../error/userexist.php");
   }else{
       header("Location: ../index.php");

   }
  }
else if ($action == 'add')
{
      $user_id = filter_input(INPUT_POST, 'userid',FILTER_VALIDATE_INT);
      $description = filter_input(INPUT_POST, 'description');
     // echo $user_id;
     // echo $description;
      $add = addTodoItem($user_id,$description);
      if ($add == true){
      $id = $_SESSION['id'];
      $result = getTodoItems($id);
      $result2 = completedItems($id);

      include('list.php');
      }

}

else if ($action == 'addtask')
{
 $user_id = filter_input(INPUT_POST, 'userid',FILTER_VALIDATE_INT);
 $task = filter_input(INPUT_POST, 'task');
 $description = filter_input(INPUT_POST, 'description');
 $date = filter_input(INPUT_POST, 'datetodo');
 $time = filter_input(INPUT_POST, 'timetodo');
 $status = "incomplete";
 $addtask = addTodoItems($user_id,$description,$task,$date,$time,$status);
      if($addtask == true){
      $id = $_SESSION['id'];
         $result = getTodoItems($id);
	 $result2 = completedItems($id);
      include('list.php');
      
      }

}

else if($action == 'edittask'){
     $editid = filter_input(INPUT_POST, 'user_id');
  // echo $editid;
     $result3 = getTask($editid);
     include('edittask.php');

   //  header("Location: edittask.php")
}
else if ($action == 'deletetask'){
    //echo "hgdsa";
     $taskid = filter_input(INPUT_POST, 'user_id');
    // echo $taskid;
     $task = deleteTask($taskid);
     if($task == true){
     $id = $_SESSION['id'];
        $result = getTodoItems($id);
	$result2 = completedItems($id);
	   
     include('list.php');
     }
     }
else if ($action == 'etask'){
     $etask = filter_input(INPUT_POST, 'edtask');
     $edescription = filter_input(INPUT_POST, 'edescription');
     $edate = filter_input(INPUT_POST, 'date');
     $etime = filter_input(INPUT_POST, 'time');
     $eid = filter_input(INPUT_POST, 'user_id');
    // echo $eid;
     $editvalue = editValue($etask,$edescription,$etime,$edate,$eid);
     if($editvalue == true){
     $id = $_SESSION['id'];
     $result = getTodoItems($id);
     $result2 = completedItems($id);
	   
     include('list.php');
     }

}
else if ($action == 'statusupdate'){
      $id = filter_input(INPUT_POST, 'user_id');
      $status = "complete";
      $statusupdate = updateStatus($status,$id);
      if($statusupdate == true){
         $id = $_SESSION['id'];
	 $result = getTodoItems($id);
	 $result2 = completedItems($id);

	 include('list.php');
     }

     }
?>
