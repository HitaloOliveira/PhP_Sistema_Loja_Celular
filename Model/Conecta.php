<?php
$db = mysqli_connect("localhost", "root", "", "tp") or die("Servidor Fora do ar.");
mysqli_select_db($db, "tp") or die("Banco fora do ar.");

