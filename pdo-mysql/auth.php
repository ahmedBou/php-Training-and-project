<?php 
// echo "<pre>\n";
// echo('<table border="1">'."\n");
// while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
//     // print_r($row);
//     echo ("<tr><td>");
//     echo ($row['name']);
//     echo ("</td><td>");
//     echo ($row['email']);
//     echo ("</td><td>");
//     echo ($row['PASSWORD']);
//     echo ("</td></tr>\n");
// }
// echo "</table>"."\n";
// // echo "<pre>\n";

require_once "pdo.php";

// insert
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    
    $sql = "INSERT INTO users(name,email,password)VALUES(:name, :email, :password)";
    echo("<pre>\n".$sql."\n</pre>\n");
    // we're going to do what's called a prepared statement. So we're going to prepare it which prepares kind of looking at it, seeing if you've got the syntax right, etc, etc. You know what's going on. So prepare can blow up. But then we're going to actually execute the statement. So it sort of parses it and make sense of it. You might prepare it once and then in a loop use it over and over again. But for now, we're just going to prepare it and then execute. So this is actually sending it to the database server. And what we're basically giving it is an array execute the parameter so execute we pass in an array. This is the array, pass in with the string with the placeholder :name mapped to the actual string we want.
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' =>$_POST['password']
    ));
}

?>
<?php 

if(isset($_POST['user_id'])){
    $sql = "DELETE from users WHERE user_id= :id";
    echo("<pre>".$sql."<pre>");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' =>$_POST['user_id']
    ));
}


?>
<?php 
// echo "<pre>\n";
echo('<table border="1">'."\n");
$stmt = $pdo->query("SELECT * FROM users");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    // print_r($row);
    echo ("<tr><td>");
    echo ($row['name']);
    echo ("</td><td>");
    echo ($row['email']);
    echo ("</td><td>");
    echo ($row['PASSWORD']);
    echo ("</td><td>");
    echo('<form method="post"><input type="hidden" ');
    echo('name="user_id" value =" '.$row['user_id'].' ">'. "\n");
    echo('<input type="submit" value = "Del" name="delete">');
    echo('</form>');
    echo ("</td></tr>");
}
echo "</table>"."\n";
// // echo "<pre>\n";

?>
<html><head></head>
<body>
    <form action="" method="post">
        <p>Add a new user</p>
        <p>Name :  <input type="text"name="name"></p>
        <p>Email :  <input type="text" name="email"></p>
        <p>Password:<input type="text" name="password"></p>
        <p><input type="submit" name="Add_New"></p>
        
    </form>

    
</body>
    

</form>