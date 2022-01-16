<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/>

        <?php
             if(isset($_SESSION['add']))  //Checking whether the session is set or not
             {
                 echo $_SESSION['add']; //Display Session message if Set
                 unset($_SESSION['add']); //Remove Session message
             }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" placeholder="Your Username">
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from Form and save it in Database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //Button clicked
        // echo "Button Clicked";

        //Get Data from Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);  //Password Encryption with MD5

        //SQL Query to save Data into Database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";
        
        //Executing Query and saving Data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //Check whether the data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Date inserted
            //echo "Data inserted";
            //Create a Session Variable to display message
            $_SESSION['add']="Admin Added Successfully";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to insert data
            //echo "Failed to insert data";
            //Create a Session Variable to display message
            $_SESSION['add']="Failed to Add Admin";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>