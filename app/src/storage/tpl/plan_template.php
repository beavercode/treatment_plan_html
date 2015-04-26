<?php
use UTI\Core\System;

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form processing</title>
    <link rel="stylesheet" href="<?= URI_BASE . 'assets/css/screen.css' ?>"/>
</head>
<body>
<div class="header">Header</div>
<?php System::loadTpl(APP_TPL . 'form_login.tpl.php') ?>
<div class="footer">Header</div>
</body>
</html>