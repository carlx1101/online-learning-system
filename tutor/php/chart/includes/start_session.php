<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
	echo "<script>Authentication Failed: Please Login Again !<script>";
	header('Location: ../../login.php');
	exit;
}
?>
