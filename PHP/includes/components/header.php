<style>
.cabecera{
	background-color: #262626;
}
.nav{
	position: relative;
}
.nav-brand{
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	color: #f5f5f5;
	text-decoration: none;
}
ul{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: flex-end;
}
ul li{
	list-style: none
}
ul li a{
	display: inline-block;
	padding: 20px;
	text-decoration: none;
	color: #f5f5f5;
	transition: .5s ;
}
ul li a:hover{
	color: #262626;
	background-color: #fff;
}
</style>
<!-- cabecera -->
<header class="cabecera">
	<nav class="nav container">
		<a href="#!" class="nav-brand"><?=$god?></a>
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="about-me.php">About me</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>
</header>