<?php get_header() ?>
    <div class="breadcrumbs container">
        <a href="<?php echo site_url()?>" class="breadcrumbs__button btn-circle"></a>
        <a href="<?php echo site_url()?>">Вернуться на главную</a></div>

    <section class="blogger-profile">
        <div class="blogger-profile__container container">
            <div class="blogger-profile__bio">
                <h1 class="blogger-profile__h1 title_h1"><?php the_title()?></h1>
                <h2 class="blogger-profile__h2 title_h2"><?php the_field('full_name')?></h2>
                <div class="blogger-profile__subscribe-stat">
                    <ul class="subscribe-stat-table">
                        <li class="subscribe-stat-table__header">
                            <span>Социальная сеть</span><span>Число подписчиков</span>
                        </li>
                        <?php foreach (get_field('social_networks') as $soc):?>
                        <li class="subscribe-stat-table__row progress-bar-<?php echo $soc['progress_bar']?>">
                            <span><?php echo $soc['soc']['label']?></span><span><?php echo $soc['audience_reach']?></span>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="blogger-profile__content-types content-types">
                    <div class="content-types__title">Вид контента</div>
                    <ul class="content-types__list">
                        <?php foreach (get_field('content_types') as $type):?>
                        <li class="content-types__item" style="background-image: url(<?php the_field('icon', $type->ID)?>)">
                          <?php echo $type->post_title?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="blogger-profile__avatar-callback">
                <div class="blogger-profile__avatar"><img src="<?php the_field('main_avatar')?>" alt="Фото <?php the_title()?>">
                </div>
                <div class="blogger-profile__callback callback btn btn_blue">заказать рекламу</div>
            </div>
            <ul class="blogger-profile__socials">
                <?php foreach (get_field('social_networks') as $soc):?>
                <li>
                    <a href="<?php echo $soc['link']?>"
                       target="_blank"
                       style="display: block;"
                       class="soc-btn_circle <?php echo $soc['soc']['value']?>-circle"
                    >
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </section>
    <section class="blogger-about">
        <div class="container">
            <div class="title-section title-section_hidden">О блогере</div>
            <div class="blogger-about__content">
                <div class="blogger-about__photo"><img src="<?php the_field('about_avatar')?>" alt="Фото блогера <?php the_title()?>"></div>
                <div class="blogger-about__text"><?php the_field('description')?></div>
            </div>
        </div>
    </section>
    <section class="callback-form">
        <div class="container">
            <div class="callback-form__wrapper"><?php get_template_part('parts/view/form-pink') ?></div>
        </div>
    </section>
<?php get_footer() ?>