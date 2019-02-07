<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Herencia</h1>";		
require_once 'clases.php';

$persona = new Informatico();
$persona->setInformacion('aomine', 18, 1.72);
echo $persona->getInformacion();
echo '<p>Saludo: ' . $persona->hablar() . '</p>';
echo '<p>Caminando: ' . $persona->caminar() . '</p>';
$persona->setLenguajes('HTML, CSS, JS, PHP');
echo '<p>Lenguajes: ' . $persona->getLenguajes() . '</p>';
$persona->setExperienciaProgramando('Experto Front - end');
echo '<p>Experiencia Programando: ' . $persona->getExperienciaProgramando() . '</p>';
echo '<p>Programando: ' . $persona->programar() . '</p>';
echo '<p>Reparando pc: ' . $persona->repararOrdenador() . '</p>';

$tecnico = new TecnicoRedes();
$tecnico->setInformacion('akashi', 25, 1.82);
echo $tecnico->getInformacion();
echo '<p>Saludo: ' . $tecnico->hablar() . '</p>';
echo '<p>Caminando: ' . $tecnico->caminar() . '</p>';
echo '<p>Lenguajes: ' . $tecnico->getLenguajes() . '</p>';
echo '<p>Experiencia Programando: ' . $tecnico->getexperienciaProgramando() . '</p>';
echo '<p>Programando: ' . $tecnico->programar() . '</p>';
echo '<p>Reparando pc: ' . $tecnico->repararOrdenador() . '</p>';
$tecnico->setAuditarRedes('Activo');
echo '<p>Auditoria en Redes: ' . $tecnico->getAuditarRedes() . '</p>';
$tecnico->setExperienciaRedes('Intermedio');
echo '<p>Experiencia Redes: ' . $tecnico->getExperienciaRedes() . '</p>';
echo '<p>Auditoria: ' . $tecnico->auditoria() . '</p>';

?>