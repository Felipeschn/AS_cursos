<?php require_once 'global.php' ?>
<?php


header("Content-Type: image/jpg");

$codigo = (string)$_GET['codigo'];
$nome = Cliente::getCache()->nomeUsuario;

$curso = new Curso();
$curso = $curso->cursosDoUsuario([$codigo])[0];

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 0, 0, 0);

$font1= realpath('bevan.ttf');

imagettftext($image, 32 , 0, 260, 550, $titleColor,$font1, "Atestamos que o aluno " . strtoupper($nome). " concluiu o curso:");
imagettftext($image, 32 , 0, 670, 625, $titleColor,$font1, $curso['nome']);
imagestring($image, 32, 720, 950,  utf8_decode("Concluído em: ").date("d/m/y"), $titleColor);

imagejpeg($image, "certificado-".strtolower($curso['nome']).".jpg");

imagedestroy($image);
?>