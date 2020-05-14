<html>
<body>
<?php
echo 'index';

?>
<h1>session--- index</h1>
<a href="/session/show?<?php echo session_name()."=".session_id(); ?>">show session</a>
<a href="/session/show">show session222</a>
</body>
</html>