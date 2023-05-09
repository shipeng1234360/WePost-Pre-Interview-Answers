<?php 

include('dbcon.php');

    if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];


    $sql = "INSERT INTO todo(title, description) VALUES ('$title', '$description')";
    $result=mysqli_query($con,$sql);
    header('Location: todolist.php');
    }


    else if (isset($_POST['btn_change'])) {

        $id = $_POST['id'];

        $sql = "SELECT isCompleted FROM todo WHERE id=". $id;
        $result=mysqli_query($con,$sql);
        $data = mysqli_fetch_column($result,0);

        if($data ==1){
             $sql = "UPDATE todo
             SET isCompleted = 0
             WHERE id=". $id;
        }

        else{
            $sql = "UPDATE todo
            SET isCompleted = 1
            WHERE id=". $id;
        }

        mysqli_query($con,$sql);

        $result=mysqli_query($con,$sql);
        header('Location: todolist.php');
        }
    
    else if (isset($_POST['btn_remove'])) {

        $id = $_POST['id'];

        $sql = "DELETE FROM todo WHERE id=". $id;
        $result=mysqli_query($con,$sql);

        }
?>
