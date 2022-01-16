<?php
    
    //Include constants.php
    include('../config/constants.php');

    //Get the id of admin to be deleted
    $id = $_GET['id'];

    //Create SQL Query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether he Query is executed successfully
    if($res==true)
    {
        //Query executed successfully and admin deleted
        //echo "Admin Deleted";
        //Create Session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to delete admin
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }

    //Redirect to Manage admin page with a message (success/error)



?>