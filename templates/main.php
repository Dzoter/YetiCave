<?php
/**@var array $categories  */
/**@var array $catalogs */
?>

<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
        снаряжение.</p>

    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach ($categories as $category => $categoryName): ?>
            <li class="promo__item promo__item--<?= $category; ?>">
                <a class="promo__link" href="pages/all-lots.html"><?= $categoryName; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach ($catalogs as $catalog => $catalogName): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $catalogName["image"]; ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $catalogName["category"]; ?></span>
                    <h3 class="lot__title"><a class="text-link"
                                              href="pages/lot.html"><?= htmlspecialchars($catalogName["title"]); ?></a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= formatPrice(htmlspecialchars($catalogName["price"])); ?></span>
                        </div>
                        <?php getTimeLeft(htmlspecialchars($catalogName["expiration"])) ?>
                        <div class="lot__timer timer <?php if (getTimeLeft(htmlspecialchars($catalogName["expiration"]))["hours"] < 1 ) : ?>timer--finishing<?php endif; ?>">
                            <?= getTimeLeft(htmlspecialchars($catalogName["expiration"]))["hours"] . ":" . getTimeLeft(htmlspecialchars($catalogName["expiration"]))["minutes"] ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>