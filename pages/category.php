<?php
    include_once('../includes/session.php');
    include_once('../templates/template_common.php');    
    include_once('../partials/category-page.php');

    // verifies if user is logged in
    if (!isset($_SESSION['username']))
        die(header('Location: login.php'));
        
    draw_header($_SESSION['username'], '');
    draw_category_page();
    draw_footer();
?>