<?php
   function addTodoItem($user_id,$description){
     global $db;
     $query = 'insert into todo_list(todo, user_id) values (:todo_text, :userid)';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->bindValue(':todo_text',$description);
     $statement->execute();
     $statement->closeCursor();
     return true;
    
   }
   function deleteTask($taskid){
     global $db;
     $query = 'delete from todo_list where id = :task';
     $statement = $db->prepare($query);
     $statement->bindValue(':task',$taskid);
     $statement->execute();
     $statement->closeCursor();
     return true;
   }
   function getTodoItems($user_id){
     global $db;
     $query = 'select * from todo_list where user_id= :userid';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();
     return $result;
   }

   function registerUser($fname,$lname,$contact,$email,$username,$password){
   global $db;
   $query = 'select * from user_info where username = :uname';
   $statement = $db->prepare($query);
   $statement->bindValue(':fname',$fname);
   $statement->bindValue(':lname',$lname);
   $statement->bindValue(':cont',$contact);
   $statement->bindValue(':emailid',$email);
   $statement->bindValue(':uname',$usename);
   $statement->bindValue(':pass',$password);
   $statement->execute();
   $result = $statment->featchAll();
   $statment->closeCursor();
   $count= $statement->rowCount();
   if($count > 0){
   return true;
   }
  /* else{/
   $query = 'insert into user_info(first_name,last_name,contact_no,email,username,password)
             values
	     (:fname,:lname,:cont,:emailid,:uname,:pass)';
   $statement = $db->prepare($query);
   $statement->bindValue(':fname',$fname);
   $statement->bindValue(':lname',$lname);
   $statement->bindValue(':cont',$contact);
   $statement->bindValue(':emailid',$email);
   $statement->bindValue(':uname',$username);
   $statement->bindValue(':pass',$password);
   $statement->execute();
   $statement->closeCursor();
   return false;
  // }*/
   
   }

   function isUserValid($username,$password){
     global $db;
     $query = 'select * from user_info where username = :name and 
     password = :pass';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->bindValue(':pass',$password);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();

     $count = $statement->rowCount();
     if($count == 1){
       setcookie('login',$username);
       setcookie('my_id',$result[0]['id']);
       setcookie('islogged',true);
       return true;
     }else{
       unset($_COOKIE['login']);
       setcookie('login',false);
       setcookie('islogged',false);
       setcookie('id',false);
       return false;
     }

   }

?>
