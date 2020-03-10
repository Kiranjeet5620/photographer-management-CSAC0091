<?php
include('config.php');
if(isset($_POST['Del'])){//to run PHP script on submit
    echo "asdfghj";
    
if(!empty($_POST['checkbox'])){
// Loop to store and display values of individual checked checkbox.
echo "selected";
foreach($_POST['checkbox'] as $selected){
echo $selected."</br>";
}
}
}
?>