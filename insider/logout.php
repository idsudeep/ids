<?php 
session_start();
if(isset($_SESSION['faculty_id'])&& isset($_SESSION['facultyName'])){


     unset($_SESSION['faculty_id']);
     unset($_SESSION['facultyName']);
     header('location:../index.php');
     die();

}
if(isset($_SESSION['userid'])&& isset($_SESSION['fname'])){

  unset($_SESSION['userid']);
  unset($_SESSION['fname']);
  header('location: login.php');
}




?>