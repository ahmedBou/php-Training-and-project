<?php
session_start();
if(isset($_POST['where'])){
if($_POST['where'] =='1'){
    
    header("Location: redir1.php");
    return;    
}elseif($_POST['where'] == '2'){
        header("Location: redire2.php?parm=123");
        return;
}else{
        header("Location: https://www.google.com/");
        return;
} }
?>
<html>
<body style="font-family: sans-serif;">
<p> I am Rooter Two ...</p>
<form method="post">
    <p><label for="inp9"> Where to go? (1-3)</label>
    <input type="text" name="where" id="inp9" size="5">
    <input type="submit"/></form>
</body>