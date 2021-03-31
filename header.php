<!doctype html>
<html lang="ru">
<head>
	<?php wp_head()?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Блогеры</title>
</head>
<body>
<div class="blue-gradient-background">
    <header class="header">
        <div class="container">
            <div class="header__row">
                <a href="/" class="logo header__logo"><img src="<?php echo get_template_directory_uri() ?>/img/icons/svg/logo.svg" alt="Логотип"></a>
                <nav class="nav-menu header__menu">
                    <ul class="nav-menu__list">
                        <li class="<?php echo is_front_page() ? 'active' : ''?>">
                            <a href="<?php site_url()?>">главная</a>
                        </li>
                        <li><a href="<?php echo is_front_page() ? '#bloggers' : site_url('#bloggers') ?>">блогеры</a></li>
                        <li><a href="<?php echo is_front_page() ? '#clients' : site_url('#clients') ?>">клиенты</a></li>
                        <li><a href="<?php echo is_front_page() ? '#review' : site_url('#review') ?>">отзывы</a></li>
                        <li><a href="#contacts">контакты</a></li>
                    </ul>
                </nav>
                <button class="btn btn_coral callback header__callback">связаться</button>
                <button class="burger"><span></span><span></span><span></span></button>
            </div>
        </div>
    </header>