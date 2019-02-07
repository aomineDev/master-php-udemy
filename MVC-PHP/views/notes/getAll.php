<h2>Notas</h2>
<?php while($note = $notes->fetch_object()) : ?>
	<h3><?=$note->titulo. ' | ' . $note->fecha ?></h3>
	<p><?= $note->descripcion ?></p>
<?php endwhile; ?>
