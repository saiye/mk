<html>
<body>


<h1>
    show session data:
    <?php
    echo $str;
    ?>
</h1>

<a href="/session/index?<?php echo session_name()."=".session_id(); ?>">index session</a>
<a href="/session/index">index session--222</a>
</body>
</html>