<?php
session_start();
if (!isset($_SESSION['account_id'])) {
	echo "<script>Authentication Failed: Please Login Again !<script>";

	header('Location: .php');
	exit;
}
?>
