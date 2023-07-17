<?php
$page_title='student data';
$css_file='style.css';
include_once('./includes/templates/header.php');
require_once('./connection.php');

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_SERVER['REQUEST_METHOD'])){
    $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $college=filter_var($_POST['college'],FILTER_SANITIZE_STRING);
    $dep=filter_var($_POST['dep'],FILTER_SANITIZE_STRING);
    $gpa=filter_var($_POST['gpa'],FILTER_SANITIZE_NUMBER_FLOAT);

    global $con;
    $d=$con->prepare("INSERT INTO students(name,college,department,GPA) VALUE(?,?,?,?)");
    $d->execute(array($name,$college,$dep,$gpa));

    
}
?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container mt-5 ">
        <div class="mt-3">
            <label for="name">name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="mt-3">
            <label for="college">college name:</label>
            <input type="text" id="college" name="college">
        </div>
        <div class="mt-3">
            <label for="dep">department name:</label>
            <input type="text" id="dep" name="dep">
        </div>
        <div class="mt-3">
            <label for="GPA">GPA:</label>
            <input type="text" id="GPA" name="gpa">
        </div>
        <button type="submit" class="btn btn-default mt-2">Submit</button>
    </div>
</form>
<form action="student.php" class="mt-2">
    <div class="container">
    <button type="submit" class="btn btn-default">check the data</button>
    </div>
</form>


<?php
include_once('./includes/templates/footer.php');
?>