<?php
require_once 'config.php';

// Sessie beëindigen
session_destroy();

redirect('index.php?message=uitgelogd');
?>