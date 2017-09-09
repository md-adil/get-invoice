<?php
require 'includes/header.php';
use App\PDFCrowd\PDFCrowd;
use App\Mailer;

if($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('Location: form.php');
	die();
}


Mailer::instance();
$client = new PDFCrowd("kamna", "5598da22b8d1da175ac42ae15bdb61f6");
$pdf = $client->convertHtml($_POST['content']);

Mailer::instance()->attach($pdf, 'print.pdf')->html('Please find the')->send($_POST['email']);

header("Location: success.php");
