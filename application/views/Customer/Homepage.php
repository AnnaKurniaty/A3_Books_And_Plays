<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("NAME"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>