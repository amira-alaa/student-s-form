<?php
$page_title='data';
$css_file='style.css';
include_once('./includes/templates/header.php');
require_once('./connection.php');

global $con;
$dt=$con->prepare('SELECT * FROM students');
$dt->execute();
$students=$dt->fetchAll();
?>

<div class="container">
  <h2>Student Data</h2>
  <!-- <p>The .table-bordered class adds borders to a table:</p>             -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">college</th>
        <th scope="col">department</th>
        <th scope="col">GPA</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
       
       <?php foreach($students as $student){
        // echo $student['name']; 
        ?>

      <tr>
        <td><?php echo $student['id']?></td>
        <td><?php echo $student['name']?></td>
        <td><?php echo $student['college']?></td>
        <td><?php echo $student['department']?></td>
        <td><?php echo $student['GPA']?></td>
        <td><a href="delete.php?stu_id=<?php echo $student['id']?>" class="btn-danger btn p-2">delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  
    <button class=""><a href="index.php">back to the form</a></button>
  
</div>



<?php
include_once('./includes/templates/footer.php');
?>