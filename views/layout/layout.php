<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDU</title>
    <meta charset=utf-8" />

    <!--  Stylesheets  -->
    <?php
        if(isset($styles) && is_array($styles) && count($styles) > 0) {
            // echo style links for this route
            foreach ($styles as $style) {
                echo '<link rel="stylesheet" href="assets/css/' . $style . '.css">';
            }
        }
    ?>
</head>
<body>

    <!-- echo content -->
    <?= isset($content) ? $content : ''; ?>

    <!-- Scripts -->
    <!--    <script type="text/javascript" src="assets/lib/jquery.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php
        if(isset($scripts) && is_array($scripts) && count($scripts) > 0) {
            // echo script tags for this route
            foreach ($scripts as $script) {
                echo '<script type="text/javascript" src="assets/js/' . $script . '.js"></script>';
            }
        }
    ?>

</body>
</html>