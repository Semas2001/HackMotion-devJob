<?php
/**
 * Header
 */
?>

<!doctype html>
<html lang="en">
    <head>
    <?php wp_head(); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <script src="<?php echo get_template_directory_uri(); ?>/js/analytics.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>HackMotion</title>
</head>
<body class = "bg-[#E6E6E6] w-[100%]">
    <div class='py-2 pl-5 justify-center'>
    <header class="flex container">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/public/Assets/images/Logo.png" 
            alt="Logo" 
            class="h-6 w-auto"
        />
    </header>
    </div>

