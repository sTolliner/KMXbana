
<?php
session_start();
session_destroy();
// Redirect to the login page:
?><script> alert('Du har loggat ut');</script>
<script>window.location.href = 'index.html';</script><!doctype html>