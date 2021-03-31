<?php get_header()?>
    <section class="order-adv">
        <div class="container">
            <div class="order-adv__content">
                <h1 class="order-adv__title title_h1">Закажи рекламу у блогеров</h1>
                <p class="order-adv__p title_h2">
                    Проверенные блогеры, лидеры мнений, амбассадоры, инфлюенсеры.
                    Все этапы переговоров и решение проблем берём на себя!
                </p>
                <ul class="order-adv__statistics">
                    <li><span class="count text-color_coral">200 000</span><span class="text">охват</span></li>
                    <li><span class="count text-color_orange">400 000</span><span class="text">подписчиков</span></li>
                    <li><span class="count text-color_blue">1500</span><span class="text">рекламодателей</span></li>
                </ul>
                <div class="order-adv__buttons">
                    <button class="btn btn_blue callback order-adv__callback">заказать рекламу</button>
                    <button class="btn-circle order-adv__btn-circle"></button>
                </div>
            </div>
        </div>
    </section>
    <section id="bloggers" class="bloggers">
        <div class="container">
            <div class="title-section title-section_hidden">Наши блогеры</div>
            <div class="swiper-container bloggers__slider">
                <div class="swiper-wrapper bloggers__wrapper">
	                <?php $bloggers = new WP_Query(array(
		                'posts_per_page' => -1,
		                'post_type' => 'blogger',
		                'order' => 'date'));
	                ?>
                    <?php while($bloggers->have_posts()): $bloggers->the_post();?>
                    <div class="swiper-slide bloggers__slide">
                        <div class="blogger-card">
                            <div class="blogger-card__top">
                                <div class="avatar"><img src="<?php the_field('avatar')?>" alt="#">
                                </div>
                                <div class="name"><?php the_title()?></div>
                            </div>
                            <div class="blogger-card__cover"><img src="<?php the_field('photo')?>"
                                                                  alt="#"></div>
                            <div class="blogger-card__text"><?php the_field('short_text')?></div>
                            <div class="blogger-card__soc">
                                <div class="title">Популярность в соц.сетях</div>
                                <ul>
	                                <?php foreach (get_field('social_networks') as $soc):?>
                                    <li>
                                        <div class="soc-btn_square <?php echo $soc['soc']['value']?>"></div>
	                                    <?php echo $soc['audience_reach']?>
                                    </li>
		                            <?php endforeach;?>
                                </ul>
                            </div>
                            <a href="<?php the_permalink()?>" class="blogger-card__button btn btn_blue">Подробнее</a>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
                <div class="swiper-pagination bloggers__pagination"></div>
                <div class="swiper-button-next bloggers__button-next"></div>
                <div class="swiper-button-prev bloggers__button-prev"></div>
            </div>
        </div>
    </section>
    </div>

    <section id="clients" class="clients">
        <div class="container">
            <div class="clients__title title-section">Наши клиенты</div>
            <ul class="clients__list">
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/1.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/2.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/3.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/4.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/5.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/6.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/7.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/8.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/9.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/10.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/11.png" alt="логотип"></li>
                <li class="clients__item"><img src="<?php echo get_template_directory_uri() ?>/img/content/partners/12.png" alt="логотип"></li>
            </ul>
        </div>
    </section>
    <?php $review = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'review',
        'order' => 'ASC'));
    ?>
    <section id="review" class="review">
        <div class="container">
            <div class="title-section title-section_hidden">Отзывы</div>
            <ul class="review__list">
                <?php while($review->have_posts()): $review->the_post();?>
                <li class="review__item review-card">
                    <div class="review-card__avatar bc_grey"><img src="<?php the_post_thumbnail_url()?>" alt=""></div>
                    <div class="review-card__content">
                        <div class="review-card__name"><?php the_title()?></div>
                        <div class="review-card__text"><?php the_content()?></div>
                    </div>
                </li>
                <?php endwhile;?>
            </ul>
            <button class="review__button btn btn_coral">больше отзывов</button>
        </div>
    </section>
    <section class="callback-form">
        <div class="container">
            <div class="callback-form__wrapper">
	            <?php get_template_part('parts/view/form-pink') ?>
            </div>
        </div>
    </section>
<?php get_footer()?>