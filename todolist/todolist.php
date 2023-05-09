<?php 
include('dbcon.php'); 

$sql = "SELECT * FROM todo";
$results=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Create Task</title>
    </head>

    <body>
        <h1>Create Task</h1>

        <div id="header">

          <form action="code.php" method="POST">
              <label>Title:</label>
              <input type="text" name="title" required>
              <label>Description:</label>
              <input type="text" name="description" required>
              <button type="submit" name="submit" >Add</button>
          </form>
       </div>

       <div id="content">
        <table>
          
         <tr>
              <th> Title</th>
              <th> Description</th>
              <th> Complete</th>
              <th> Action</th>
             
        </tr>
            
          <?php 
              
          foreach( $results as $data){ ?>

            <tr>
              <td> <?=$data['title'];?></td>
              <td> <?=$data['description'];?></td>
              <td> <input type="checkbox" name="isCompleted" onchange="change(<?=$data['id'];?>)" <?= ($data['isCompleted']==1)? 'checked':'' ?> > </td>
              <td> <button name="cancel" id="btn_cancel" onclick="cancel(<?=$data['id'];?>)"> remove </button></td>
            </tr>

          <?php }; ?> 

        </table>
       </div>

    </body>

    </html>

</body>

<script>
function change(id){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      window.location.href = "todolist.php";
    } else {
      console.log('Error: ' + xhr.status);
    }
  }
};
xhr.open('POST', 'code.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.send("btn_change=true&id="+id); 

}

function cancel(id){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      window.location.href = "todolist.php";
    } else {
      console.log('Error: ' + xhr.status);
    }
  }
};
xhr.open('POST', 'code.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.send("btn_remove=true&id="+id); 

}

</script>


</html>