<?php require_once 'global.php' ?>
<?php

$codigo = (string)$_GET['codigo'];
$nome = Cliente::getCache()->nomeUsuario;

$curso = new Curso();
$curso = $curso->cursosDoUsuario([$codigo])[0];

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 0, 0, 0);

$font1= realpath('bevan.ttf');

imagettftext($image, 32 , 0, 700, 550, $titleColor,$font1, $nome);
imagettftext($image, 32 , 0, 500, 550, $titleColor,$font1, $curso['nome']);
imagestring($image, 5, 700, 600,  utf8_decode("Concluido: ").date("d/m/y"), $titleColor);


header("Content-Type: image/jpg");

imagejpeg($image, "certificado".date("y-m-d").".jpg");

imagedestroy($image);
?>