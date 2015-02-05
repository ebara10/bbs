<?php
define("NONE_TITLE", "<p>タイトルがありません</p>");
define("OVER_TITLE", "<p>タイトルは64文字以内で入力してください。</p>");
define("NONE_BODY", "<p>本文がありません</p>");

//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

require_once('view/new.php');

session_start();

$error_msg = "";

//初回の判定
if(empty($_COOKIE["PHPSESSID"])){
	$_SESSION['error_message']['title']['none'] = '';
	$_SESSION['error_message']['title']['over'] = '';
	$_SESSION['error_message']['body']['none'] = '';
}
//new_kakunin.phpでエラーがあったかの処理
if(isset( $_SESSION['error_message']['title']['none']) &&  $_SESSION['error_message']['title']['none'] == 1){
	$error_msg .= NONE_TITLE;
}
if(isset($_SESSION['error_message']['title']['over'] ) && $_SESSION['error_message']['title']['over']  == 1){
	$error_msg .= OVER_TITLE;
}
if(isset($_SESSION['error_message']['body']['none']) &&  $_SESSION['error_message']['body']['none'] == 1){
	$error_msg .= NONE_BODY;
}

if(isset( $_COOKIE["title"])){
	$title = $_COOKIE["title"];
} else {
	$title = '件名を入力';
}
if(isset( $_COOKIE["body"])){
	$body = $_COOKIE["body"];
} else {
	$body = '本文をここに入力してください。';
}
$_SESSION['error_message']['title']['none'] = '';
$_SESSION['error_message']['title']['over']  = '';
$_SESSION['error_message']['body']['none'] = '';

?>

