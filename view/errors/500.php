<?php
if (isset($exception)) {

    echo $exception->getMessage();
}
?>


<h2>
    <?php
    if (isset($file)) {
        echo 'file:'.$file;
    }
    ?>
</h2>

<h2>
    <?php
    if (isset($line)) {
        echo 'line:'.$line;
    }
    ?>
</h2>

<h2>
    <?php
    if (isset($code)) {
        echo 'code:' . $code;
    }
    ?>
</h2>

<h2>
    <?php
    if (isset($message)) {
        echo 'message:'.$message;
    }
    ?>
</h2>





<h2>
    <?php
    if (isset($context)) {
         print_r($context);
    }
    ?>
</h2>

?>