<footer id="contacts" class="footer">
    <?php $setting_id = 109;?>
    <div class="container footer__container">
        <div class="footer__title title-section title-section_hidden">Контакты</div>
        <div class="footer-card">
            <ul class="footer-card__contacts">
                <li class="footer-card__contact footer-card__contact_address"><?php the_field('adress', $setting_id)?></li>
                <li class="footer-card__contact footer-card__contact_phone"><a href="tel:<?php the_field('phone_link', $setting_id)?>"><?php the_field('phone', $setting_id)?></a></li>
                <li class="footer-card__contact footer-card__contact_email"><a href="mailto:<?php the_field('email', $setting_id)?>"><?php the_field('email', $setting_id)?></a></li>
            </ul>
            <div class="footer-card__socials-title">Мы в социальных сетях:</div>
            <ul class="footer-card__socials">
                <?php foreach (get_field('socials', $setting_id) as $soc):?>
                <li class="footer-card__social">
                    <a href="<?php echo $soc['link']?>" target="_blank"
                       class="soc-btn soc-btn_square <?php echo $soc['soc']?>">
                    </a>
	                <?php echo $soc['label']?>
                </li>
                <?php endforeach;?>
            </ul>
            <a href="#" target="_blank" class="btn btn_blue footer-card__button">построить маршрут</a>
        </div>
    </div>
    <div id="map"></div>
</footer>
<div class="modal">
    <div class="callback-form__wrapper">
	    <?php get_template_part('parts/view/form-pink') ?>
    </div>
</div>
<?php wp_footer()?>
</body>
</html>