<?php
session_start();
if (!isset($_SESSION[''])) {
	echo "<script>Authentication Failed: Please Login Again !<script>";

	header('Location: .php');
	exit;
}
?>
