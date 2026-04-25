<?php 
if (!isset($genres, $top10Today, $top10Week, $top10Month)) {
    return;
}

 $genreMap = [
    "Action" => "action",
    "Adventure" => "adventure",
    "Cars" => "cars",
    "Comedy" => "comedy",
    "Dementia" => "dementia",
    "Demons" => "demons",
    "Drama" => "drama",
    "Ecchi" => "ecchi",
    "Fantasy" => "fantasy",
    "Game" => "game",
    "Harem" => "harem",
    "Historical" => "historical",
    "Horror" => "horror",
    "Isekai" => "isekai",
    "Josei" => "josei",
    "Kids" => "kids",
    "Magic" => "magic",
    "Martial Arts" => "martial+arts",
    "Mecha" => "mecha",
    "Military" => "military",
    "Music" => "music",
    "Mystery" => "mystery",
    "Parody" => "parody",
    "Police" => "police",
    "Psychological" => "psychological",
    "Romance" => "romance",
    "Samurai" => "samurai",
    "School" => "school",
    "Sci-Fi" => "sci-fi",
    "Seinen" => "seinen",
    "Shoujo" => "shoujo",
    "Shoujo Ai" => "shoujo+ai",
    "Shounen" => "shounen",
    "Shounen Ai" => "shounen+ai",
    "Slice of Life" => "slice+of+life",
    "Space" => "space",
    "Sports" => "sports",
    "Super Power" => "super+power",
    "Supernatural" => "supernatural",
    "Thriller" => "thriller",
    "Vampire" => "vampire"
];
?>

<div id="main-sidebar">
    <section class="block_area block_area_sidebar block_area-genres">
        <div class="block_area-header">
            <div class="float-left bah-heading mr-4">
                <h2 class="cat-heading">Genres</h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="block_area-content">
            <div class="cbox cbox-genres">
                <ul class="ulclear color-list sb-genre-list sb-genre-less">
                    <?php 
                    foreach ($genres as $genre) { 
                        $slug = strtolower(str_replace(' ', '+', $genre));
                        $slug = $genreMap[$genre] ?? $slug;
                    ?>
                        <li class="nav-item"> 
                            <a class="nav-link" href="../genre/<?= htmlspecialchars($slug) ?>" title="<?= htmlspecialchars($genre) ?>"><?= htmlspecialchars($genre) ?></a> 
                        </li>
                    <?php } ?>
                </ul>
                <div class="clearfix"></div>
                <button class="btn btn-sm btn-block btn-showmore mt-2"></button>
            </div>
        </div>
    </section>
    
    <section class="block_area block_area_sidebar block_area-realtime">
        <div class="block_area-header">
            <div class="float-left bah-heading mr-2">
                <h2 class="cat-heading">Top 10 Anime</h2>
            </div>
            <div class="float-right bah-tab-min">
                <ul class="nav nav-pills nav-fill nav-tabs anw-tabs">
                    <li class="nav-item"><a data-toggle="tab" href="#today" class="nav-link active">Today</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#week" class="nav-link">Week</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#month" class="nav-link">Month</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="block_area-content">
            <div class="cbox cbox-list cbox-realtime">
                <div class="cbox-content">
                    <div class="tab-content">
                        <div id="today" class="anif-block-ul anif-block-chart tab-pane active">
                            <ul class="ulclear">
                                <?php foreach ($top10Today as $key => $anime) { ?>
                                    <li class="<?php if($key < 3) echo "item-top"?>">
                                        <div class="film-number"><span><?= $anime['rank'] ?></span></div>
                                        <div class="film-poster">
                                            <img data-src="<?= htmlspecialchars($anime['poster']) ?>"
                                                class="film-poster-img lazyload tooltipEl" alt="<?= htmlspecialchars($anime['name']) ?>"
                                                src="<?= htmlspecialchars($anime['poster']) ?>" title="<?= htmlspecialchars($anime['name']) ?>">
                                        </div>
                                        <div class="film-detail">
                                            <h3 class="film-name">
                                                <a href="<?= $websiteUrl ?>/anime/<?= htmlspecialchars($anime['id']) ?>" 
                                                    title="<?= htmlspecialchars($anime['name']) ?>" data-jname="<?= htmlspecialchars($anime['jname']) ?>"><?= htmlspecialchars($anime['name']) ?></a>
                                            </h3>
                                            <div class="fd-infor">
                                                <span class="fdi-item">
                                                    <?php 
                                                    $epInfo = [];
                                                    if ($anime['episodes']['sub'] !== null) $epInfo[] = 'Sub ' . $anime['episodes']['sub'];
                                                    if ($anime['episodes']['dub'] !== null) $epInfo[] = 'Dub ' . $anime['episodes']['dub'];
                                                    echo implode(' | ', $epInfo);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                        <div id="week" class="anif-block-ul anif-block-chart tab-pane">
                            <ul class="ulclear">
                                <?php foreach ($top10Week as $key => $anime) { ?>
                                    <li class="<?php if($key < 3) echo "item-top"?>">
                                        <div class="film-number"><span><?= $anime['rank'] ?></span></div>
                                        <div class="film-poster">
                                            <img data-src="<?= htmlspecialchars($anime['poster']) ?>"
                                                class="film-poster-img lazyload tooltipEl" alt="<?= htmlspecialchars($anime['name']) ?>"
                                                src="<?= htmlspecialchars($anime['poster']) ?>" title="<?= htmlspecialchars($anime['name']) ?>">
                                        </div>
                                        <div class="film-detail">
                                            <h3 class="film-name">
                                                <a href="<?= $websiteUrl ?>/anime/<?= htmlspecialchars($anime['id']) ?>" 
                                                    title="<?= htmlspecialchars($anime['name']) ?>" data-jname="<?= htmlspecialchars($anime['jname']) ?>"><?= htmlspecialchars($anime['name']) ?></a>
                                            </h3>
                                            <div class="fd-infor">
                                                <span class="fdi-item">
                                                    <?php 
                                                    $epInfo = [];
                                                    if ($anime['episodes']['sub'] !== null) $epInfo[] = 'Sub ' . $anime['episodes']['sub'];
                                                    if ($anime['episodes']['dub'] !== null) $epInfo[] = 'Dub ' . $anime['episodes']['dub'];
                                                    echo implode(' | ', $epInfo);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                        <div id="month" class="anif-block-ul anif-block-chart tab-pane">
                            <ul class="ulclear">
                                <?php foreach ($top10Month as $key => $anime) { ?>
                                    <li class="<?php if($key < 3) echo "item-top"?>">
                                        <div class="film-number"><span><?= $anime['rank'] ?></span></div>
                                        <div class="film-poster">
                                            <img data-src="<?= htmlspecialchars($anime['poster']) ?>"
                                                class="film-poster-img lazyload tooltipEl" alt="<?= htmlspecialchars($anime['name']) ?>"
                                                src="<?= htmlspecialchars($anime['poster']) ?>" title="<?= htmlspecialchars($anime['name']) ?>">
                                        </div>
                                        <div class="film-detail">
                                            <h3 class="film-name">
                                                <a href="<?= $websiteUrl ?>/anime/<?= htmlspecialchars($anime['id']) ?>" 
                                                    title="<?= htmlspecialchars($anime['name']) ?>" data-jname="<?= htmlspecialchars($anime['jname']) ?>"><?= htmlspecialchars($anime['name']) ?></a>
                                            </h3>
                                            <div class="fd-infor">
                                                <span class="fdi-item">
                                                    <?php 
                                                    $epInfo = [];
                                                    if ($anime['episodes']['sub'] !== null) $epInfo[] = 'Sub ' . $anime['episodes']['sub'];
                                                    if ($anime['episodes']['dub'] !== null) $epInfo[] = 'Dub ' . $anime['episodes']['dub'];
                                                    echo implode(' | ', $epInfo);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
</div>