<?php 
if (!isset($trendingAnimes)) {
    return;
}
 $top10 = array_slice($trendingAnimes, 0, 10);
?>
<div id="anime-trending">
    <div class="container">
        <section class="block_area block_area_trending">
            <div class="block_area-header">
                <div class="bah-heading">
                    <h2 class="cat-heading">Trending</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="block_area-content">
                <div class="trending-list" id="trending-home">
                    <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper">
                            <?php 
                            foreach($top10 as $key => $anime) { ?>
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="number">
                                        <?php $number = $key + 1; ?>
                                        <span><?= $number <= 9 ? '0' . $number : $number ?></span>
                                        <div class="film-title dynamic-name" data-jname="<?= htmlspecialchars($anime['jname']) ?>">
                                            <?= htmlspecialchars($anime['name']) ?>
                                        </div>
                                    </div>
                                    <a href="/anime/<?= htmlspecialchars($anime['id']) ?>" class="film-poster"
                                        title="<?= htmlspecialchars($anime['name']) ?>">
                                        <img data-src="<?= htmlspecialchars($anime['poster']) ?>"
                                            src="<?= htmlspecialchars($websiteUrl) ?>/files/images/no_poster.jpg"
                                            class="film-poster-img lazyload" alt="<?= htmlspecialchars($anime['name']) ?>">
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="trending-navi">
                        <div class="navi-next swiper-button-disabled" tabindex="-1" role="button"
                            aria-label="Next slide" aria-disabled="true"><i class="fas fa-angle-right"></i>
                        </div>
                        <div class="navi-prev swiper-button-disabled" tabindex="-1" role="button"
                            aria-label="Previous slide" aria-disabled="true"><i class="fas fa-angle-left"></i></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>