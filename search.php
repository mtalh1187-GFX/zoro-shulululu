<?php 
require('./_config.php'); 
session_start();

 $keyword = $_GET['keyword'] ?? '';
 $keyword2 = $keyword;
 $keyword = str_replace(' ', '%20', $keyword);
 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

 $apiUrl = "$api/api/v2/hianime/search?q=$keyword&page=$page";
 $json = file_get_contents($apiUrl);
 $results = json_decode($json, true);

 $animes = [];
 $totalPages = 1;
 $hasNextPage = false;
 $currentPage = 1;

if (isset($results['data']['animes'])) {
    $animes = $results['data']['animes'];
    $totalPages = $results['data']['totalPages'] ?? 1;
    $hasNextPage = $results['data']['hasNextPage'] ?? false;
    $currentPage = $results['data']['currentPage'] ?? 1;
}
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Search Results for "<?= htmlspecialchars($keyword2) ?>" - <?= $websiteTitle ?></title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="Search Results for "<?= htmlspecialchars($keyword2) ?>" - <?= $websiteTitle ?>">
    <meta name="description" content="Search results for <?= htmlspecialchars($keyword2) ?> on <?= $websiteTitle ?>">
    <meta name="keywords" content="<?= $websiteTitle ?>, watch anime online, free anime, anime stream, anime hd, english sub">
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Language" content="en">
    <meta property="og:title" content="Search Results for "<?= htmlspecialchars($keyword2) ?>" - <?= $websiteTitle ?>">
    <meta property="og:description" content="Search results for <?= htmlspecialchars($keyword2) ?> on <?= $websiteTitle ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= $websiteTitle ?>">
    <meta itemprop="image" content="<?= $banner ?>">
    <meta property="og:image" content="<?= $banner ?>">
    <meta property="og:image:width" content="650">
    <meta property="og:image:height" content="350">
    <meta property="twitter:card" content="summary">
    <meta name="apple-mobile-web-app-status-bar" content="#202125">
    <meta name="theme-color" content="#202125">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?= $version ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?= $version ?>" type="text/css">
    <link rel="apple-touch-icon" href="<?= $websiteUrl ?>/favicon.png?v=<?= $version ?>" />
    <link rel="shortcut icon" href="<?= $websiteUrl ?>/favicon.png?v=<?= $version ?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $websiteUrl ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $websiteUrl ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $websiteUrl ?>/favicon-16x16.png">
    <link rel="mask-icon" href="<?= $websiteUrl ?>/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" sizes="192x192" href="<?= $websiteUrl ?>/files/images/touch-icon-192x192.png?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $websiteUrl ?>/files/css/style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="<?= $websiteUrl ?>/files/css/min.css?v=<?= $version ?>">
    <script type="text/javascript">
    setTimeout(function() {
        var wpse326013 = document.createElement('link');
        wpse326013.rel = 'stylesheet';
        wpse326013.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?= $version ?>';
        wpse326013.type = 'text/css';
        var godefer = document.getElementsByTagName('link')[0];
        godefer.parentNode.insertBefore(wpse326013, godefer);
        var wpse326013_2 = document.createElement('link');
        wpse326013_2.rel = 'stylesheet';
        wpse326013_2.href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?= $version ?>';
        wpse326013_2.type = 'text/css';
        var godefer2 = document.getElementsByTagName('link')[0];
        godefer2.parentNode.insertBefore(wpse326013_2, godefer2);
    }, 500);
    </script>
    <noscript>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?= $version ?>" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?= $version ?>" />
    </noscript>
</head>

<body data-page="page_anime">
    <div id="sidebar_menu_bg"></div>
    <div id="wrapper" data-page="page_home">
        <?php include('./_php/header.php'); ?>
        <div class="clearfix"></div>
        <div id="main-wrapper">
            <div class="container">
                <div id="main-content">
                    <section class="block_area block_area_category">
                        <div class="block_area-header">
                            <div class="float-left bah-heading mr-4">
                                <h2 class="cat-heading">Search Results for "<?= htmlspecialchars($keyword2) ?>"</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-content">
                            <div class="block_area-content block_area-list film_list film_list-grid film_list-wfeature">
                                <div class="film_list-wrap">
                                    <?php if (!empty($animes)): ?>
                                        <?php foreach($animes as $anime): ?>
                                            <div class="flw-item">
                                                <div class="film-poster">
                                                    <div class="tick ltr">
                                                        <div class="tick-item tick-eps amp-algn">
                                                            <?php 
                                                            $episodes = $anime['episodes']['sub'] ?? 0;
                                                            if ($episodes > 0) {
                                                                echo $episodes . ' eps';
                                                            } else {
                                                                echo 'Movie';
                                                            }
                                                            ?>
                                                        </div>

                                                    </div>
                                                    <img class="film-poster-img lazyload" 
                                                         data-src="<?= $anime['poster'] ?>" 
                                                         src="<?= $websiteUrl ?>/files/images/no_poster.jpg"
                                                         alt="<?= htmlspecialchars($anime['name']) ?>">
                                                    <a class="film-poster-ahref" 
                                                       href="/anime/<?= $anime['id'] ?>" 
                                                       title="<?= htmlspecialchars($anime['name']) ?>" 
                                                       data-jname="<?= htmlspecialchars($anime['jname']) ?>">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="film-detail">
                                                    <h3 class="film-name">
                                                        <a href="/anime/<?= $anime['id'] ?>" 
                                                           title="<?= htmlspecialchars($anime['name']) ?>" 
                                                           data-jname="<?= htmlspecialchars($anime['jname']) ?>">
                                                            <?= htmlspecialchars($anime['name']) ?>
                                                        </a>
                                                    </h3>
                                                    <div class="fd-infor">
                                                        <span class="fdi-item"><?= $anime['type'] ?></span>
                                                        <?php if (!empty($anime['rating'])): ?>
                                                            <span class="fdi-item"><?= $anime['rating'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="block_area-content block_area-list film_list film_list-grid film_list-wfeature">
                                            <div class="no-results">
                                                <h3>No results found for "<?= htmlspecialchars($keyword2) ?>"</h3>
                                                <p>Try searching with different keywords.</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="clearfix"></div>
                                
                                <?php if ($totalPages > 1): ?>
                                    <div class="pagination">
                                        <nav>
                                            <ul class="pagination">
                                                <?php if ($currentPage > 1): ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?keyword=<?= urlencode($keyword2) ?>&page=<?= $currentPage - 1 ?>">
                                                            <i class="fas fa-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                
                                                <?php 
                                                $startPage = max(1, $currentPage - 2);
                                                $endPage = min($totalPages, $currentPage + 2);
                                                
                                                if ($startPage > 1) {
                                                    echo '<li class="page-item">
                                                            <a class="page-link" href="?keyword=' . urlencode($keyword2) . '&page=1">1</a>
                                                          </li>';
                                                    if ($startPage > 2) {
                                                        echo '<li class="page-item disabled">
                                                                <span class="page-link">...</span>
                                                              </li>';
                                                    }
                                                }
                                                
                                                for ($i = $startPage; $i <= $endPage; $i++) {
                                                    $activeClass = ($i == $currentPage) ? 'active' : '';
                                                    echo '<li class="page-item ' . $activeClass . '">
                                                            <a class="page-link" href="?keyword=' . urlencode($keyword2) . '&page=' . $i . '">' . $i . '</a>
                                                          </li>';
                                                }
                                                
                                                if ($endPage < $totalPages) {
                                                    if ($endPage < $totalPages - 1) {
                                                        echo '<li class="page-item disabled">
                                                                <span class="page-link">...</span>
                                                              </li>';
                                                    }
                                                    echo '<li class="page-item">
                                                            <a class="page-link" href="?keyword=' . urlencode($keyword2) . '&page=' . $totalPages . '">' . $totalPages . '</a>
                                                          </li>';
                                                }
                                                ?>
                                                
                                                <?php if ($hasNextPage): ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?keyword=<?= urlencode($keyword2) ?>&page=<?= $currentPage + 1 ?>">
                                                            <i class="fas fa-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    
                                    <style>
                                    .pagination {
                                        display: flex;
                                        justify-content: center;
                                        margin-top: 30px;
                                        margin-bottom: 20px;
                                    }
                                    
                                    .pagination .pagination {
                                        display: flex;
                                        list-style: none;
                                        padding: 0;
                                        margin: 0;
                                        border-radius: 8px;
                                        overflow: hidden;
                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                    }
                                    
                                    .page-item {
                                        margin: 0 2px;
                                    }
                                    
                                    .page-link {
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        min-width: 40px;
                                        height: 40px;
                                        padding: 0 12px;
                                        color: #000;
                                        background: #cae962;
                                        border: none;
                                        text-decoration: none;
                                        font-weight: 600;
                                        font-size: 14px;
                                        position: relative;
                                        overflow: hidden;
                                    }
                                    
                                    .page-link:hover {
                                        box-shadow: 0 4px 12px rgba(202, 233, 98, 0.4);
                                        background: #b8d755;
                                        color: #000;
                                        text-decoration: none;
                                    }
                                    
                                    .page-item.active .page-link {
                                        background: #000;
                                        color: #cae962;
                                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
                                        transform: scale(1.05);
                                    }
                                    
                                    .page-item.disabled .page-link {
                                        background: #2a2a2a;
                                        color: #666;
                                        cursor: not-allowed;
                                        transform: none;
                                        box-shadow: none;
                                    }
                                    
                                    .page-item.disabled .page-link:hover {
                                        transform: none;
                                        box-shadow: none;
                                        background: #2a2a2a;
                                    }
                                    
                                    .page-link i {
                                        font-size: 12px;
                                    }
                                    
                                    /* Responsive adjustments */
                                    @media (max-width: 768px) {
                                        .page-link {
                                            min-width: 35px;
                                            height: 35px;
                                            font-size: 12px;
                                            padding: 0 8px;
                                        }
                                        
                                        .page-item {
                                            margin: 0 1px;
                                        }
                                    }
                                    
                                    @media (max-width: 480px) {
                                        .pagination {
                                            margin-top: 20px;
                                        }
                                        
                                        .page-link {
                                            min-width: 30px;
                                            height: 30px;
                                            font-size: 11px;
                                            padding: 0 6px;
                                        }
                                    }
                                    </style>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                </div>
                <?php include('./_php/sidenav.php'); ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php include('./_php/footer.php'); ?>
        <div id="mask-overlay"></div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?= $version ?>"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js?v=<?= $version ?>"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookies@rc/dist/js.cookie.min.js"></script>
        <script type="text/javascript" src="<?= $websiteUrl ?>/files/js/app.js?v=<?= $version ?>"></script>
        <script type="text/javascript" src="<?= $websiteUrl ?>/files/js/comman.js?v=<?= $version ?>"></script>
        <script type="text/javascript" src="<?= $websiteUrl ?>/files/js/movie.js?v=<?= $version ?>"></script>
        <link rel="stylesheet" href="<?= $websiteUrl ?>/files/css/jquery-ui.css?v=<?= $version ?>">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js?v=<?= $version ?>"></script>
        <script type="text/javascript" src="<?= $websiteUrl ?>/files/js/function.js?v=<?= $version ?>"></script>
    </div>
</body>
</html>