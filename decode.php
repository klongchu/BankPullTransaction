<?php
$info[key] = "nxZvx0pbc3tb";
$info[username] = "2i1NMrqwOwo+dIvqF9hdsssnAwdBr7f2RLEPrO93R1Q=";
$info[password] = "P7EAl0g+LEk9gXZFjQQfb7VkYlCL0Xzs4Uaa3nqrT60=";

$info[key] = "0HkzJ3Tiik2Y";
$info[username] = "Pj/sLzzMgJbonQKuNPOgvhcWMc68VGIytRkoFLq5/h0=";
$info[password] = "BJFkHCoGHFQoLxFQJINOwPGik9SoBIoFDuRdgqhmY2k=";



echo $USERNAME = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($info[key]), base64_decode($info[username]), MCRYPT_MODE_CBC, md5(md5($info[key]))), "\0");
echo "<br/>";
echo $PASSWORD = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($info[key]), base64_decode($info[password]), MCRYPT_MODE_CBC, md5(md5($info[key]))), "\0");

?>