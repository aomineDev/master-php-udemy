<h2>Usuarios</h2>
<?php while($user = $users->fetch_object()) : ?>
	<h3><?=$user->nombre. ' ' . $user->apellidos ?></h3>
	<p><?= $user->email . ' | ' . $user->fecha ?></p>
<?php endwhile; ?>
