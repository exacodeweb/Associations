<?php
$password = 'G1i9e6t3';
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
echo $hashed_password;
?>
<br>
<?php
$plain_password = 'G1i9e6t3';
$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);
echo $hashed_password;
?>
