<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <h1 class="text-4xl font-extrabold text-white bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 p-6 rounded-lg shadow-lg text-center">
        Tailwind carregado com sucesso 🎉
    </h1>