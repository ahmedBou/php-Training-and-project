<?php 
require_once("pdo.php");

if(isset($_POST['email']) && isset($_POST['password'])){
    $sql = "SELECT name FROM users WHERE email=:email and password = :pass";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute(array(
        ':email' => $_POST['email'],
        ':pass' => $_POST['password']
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
    if($row === FALSE){
        echo "<h1> not connected</h1>";
    }else{
        echo "<h1> connected</h1>";
    }
}
?>

<?php

echo("<table border=1>"."\n");
$stmt = $pdo->query("SELECT * FROM users");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr><td>";
    echo($row['email']);
    echo "</td><td>";
    echo ($row['PASSWORD']);
    echo "</td>";

}
echo("</table>"."\n");
?>
    
    
    
<html>
<head></head>
<body>
    <!-- form for connecting -->
    <form action="" method="post">
        <p>Login</p>
        <p>Email :  <input type="text" name="email"></p>
        <p>Password:<input type="text" name="password"></p>
        <p><input type="submit" value="login"></p>
        <a href="<?php echo($_SERVER['PHP_SELF']); ?>">Refresh</a>
        
    </form>
</body>