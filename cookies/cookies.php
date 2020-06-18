<?php 
// Note - cannot have any output before setcookie
// if(!isset($_COOKIE['zap'])){
//     setcookie('zap', '42', time()+360);
// }
if(!isset($_COOKIE['userId'])){
    $name ="userId";
    $value = '87';
    $expire = strtotime('+1 year');
    $path = '/';
    setcookie($name, $value, $expire, $path);
}
$userid = filter_input(INPUT_COOKIE, 'userId', FILTER_VALIDATE_INT);
?>

<pre>
    <?php print_r($_COOKIE); ?>
    <?php echo($userid); ?>
</pre>
<p><a href="cookies.php">Click me</a>or press Refresh</p>
