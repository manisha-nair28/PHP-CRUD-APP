<?php
session_start();
require 'dbcon.php';

// Delete Student Details

if(isset($_POST['delete_student']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['delete_student']);
    $query="DELETE from students WHERE id='$student_id' ";
    $query_run=mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message']="Record Deleted Sucessfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Error! Unable to delete record!";
        header("Location: index.php");
        exit(0);
    }
}



// Update Student Details

if(isset($_POST['update_student']))
{
    $student_id=mysqli_real_escape_string($con,$_POST['student_id']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    $query_run=mysqli_query($con, $query);


    if($query_run)
    {
        $_SESSION['message']="Student Data Updated Sucessfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']=" Error! Unable to update data!";
        header("Location: student-create.php");
        exit(0);
    }

}



// Insert Student Details

if(isset($_POST['save_student']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $course=mysqli_real_escape_string($con,$_POST['course']);

    $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name','$email','$phone','$course')";

    $query_run=mysqli_query($con, $query);


    if($query_run)
    {
        $_SESSION['message']="Student Data Inserted Sucessfully!";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Error! student data not inserted.";
        header("Location: student-create.php");
        exit(0);
    }

}
?>