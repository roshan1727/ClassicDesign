<?php


$conn=mysqli_connect("localhost","root","","details");
if (!$conn)
{
    die("connection Failed:" . mysqli_connect_error());
}

if(isset($_POST["Register"]))
{
    
    $sq="INSERT INTO details (name,email,phone,design) value('{$_POST["name"]}','{$_POST["email"]}','{$_POST["phone"]}','{$_POST['design']}')";

    if(mysqli_query($conn,$sq))
    {
        header("location:index.html");
    }
    else
    {
    echo "Error: ".$sql. "" .mysqli_error($conn); 
    }
mysqli_close($conn);
}
?>














?>