<?php 
require('../_config.php');
session_start();

if(!isset($_COOKIE['userID'])){
  $user_id = $_COOKIE['userID'];
  header('location:login.php');
};
if(isset($_COOKIE['userID'])){
  $user_id = $_COOKIE['userID'];
};
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Profile - <?=$websiteTitle?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="title" content="Profile - <?=$websiteTitle?>">
  <meta name="description" content="Anime in HD with No Ads. Watch anime online">
  <meta name="keywords"
    content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa">
  <meta name="charset" content="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Language" content="en">
  <meta property="og:title" content="Profile - <?=$websiteTitle?>">
  <meta property="og:description" content="Anime on <?=$websiteTitle?> in HD with No Ads. Watch anime online">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?=$websiteTitle?>">
  <meta itemprop="image" content="<?=$banner?>">
  <meta property="og:image" content="<?=$banner?>">
  <link rel="canonical" href="<?=$websiteUrl?>">
  <link rel="alternate" hreflang="en" href="<?=$websiteUrl?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>" type="text/css">
  <link rel="apple-touch-icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" />
    <link rel="shortcut icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$websiteUrl?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$websiteUrl?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$websiteUrl?>/favicon-16x16.png">
    <link rel="mask-icon" href="<?=$websiteUrl?>/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" sizes="192x192" href="<?=$websiteUrl?>/files/images/touch-icon-192x192.png?v=<?=$version?>">
  <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/style.css?v=<?=$version?>">
    
  <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/min.css?v=<?=$version?>">
  <style>
    .modal-backdrop {
      background-color: rgba(0, 0, 0, 0.85) !important;
    }
    
    #modalavatars .modal-dialog {
      max-width: 550px;
    }
    
    #modalavatars .modal-content {
      background-color: #2a2a2a;
      border-radius: 16px;
      border: none;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }
    
    #modalavatars .modal-header {
      background-color: #2a2a2a;
      border-bottom: none;
      padding: 25px 30px 15px;
      position: relative;
    }
    
    #modalavatars .modal-title {
      color: #ffffff;
      font-size: 22px;
      font-weight: 600;
      width: 100%;
      text-align: center;
      margin: 0;
    }
    
    #modalavatars .close {
      position: absolute;
      right: 20px;
      top: 20px;
      color: #999;
      opacity: 1;
      font-size: 28px;
      font-weight: 300;
      text-shadow: none;
      transition: color 0.2s;
    }
    
    #modalavatars .close:hover {
      color: #fff;
    }
    
    #modalavatars .modal-body {
      background-color: #2a2a2a;
      padding: 20px 30px 30px;
      max-height: 70vh;
      overflow-y: auto;
    }
    
    .avatar-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 20px;
      padding: 10px 0;
    }
    
    .avatar-option {
      cursor: pointer;
      border-radius: 50%;
      overflow: hidden;
      transition: all 0.3s ease;
      border: 3px solid transparent;
      width: 100%;
      aspect-ratio: 1;
      position: relative;
      background-color: #3a3a3a;
    }
    
    .avatar-option:hover {
      transform: scale(1.08);
      border-color: #666;
    }
    
    .avatar-option.selected {
      border-color: #ff69b4;
      box-shadow: 0 0 0 3px rgba(255, 105, 180, 0.3);
      transform: scale(1.05);
    }
    
    .avatar-option.selected::after {
      content: '✓';
      position: absolute;
      top: 5px;
      right: 5px;
      background-color: #ff69b4;
      color: white;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      font-weight: bold;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    
    .avatar-option img {
      width: 100%;
      height: 100%;
      display: block;
      object-fit: cover;
    }
    
    .modal-footer {
      background-color: #2a2a2a;
      border-top: none;
      padding: 0 30px 30px;
      justify-content: center;
    }
    
    .btn-close-modal {
      background-color: #4a4a6a;
      color: #ffffff;
      border: none;
      padding: 12px 50px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      min-width: 200px;
    }
    
    .btn-close-modal:hover {
      background-color: #5a5a7a;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(74, 74, 106, 0.4);
    }
    
    .btn-close-modal:active {
      transform: translateY(0);
    }
    
    .profile-avatar {
      cursor: pointer;
      transition: transform 0.2s;
      position: relative;
      display: inline-block;
    }
    
    .profile-avatar:hover {
      transform: scale(1.05);
    }
    
    .avatar-edit-icon {
      position: absolute;
      bottom: -5px;
      right: 5px;
      background-color: rgba(0, 0, 0, 0.7);
      color: white;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      transition: background-color 0.2s;
    }
    
    .avatar-edit-icon:hover {
      background-color: rgba(0, 0, 0, 0.9);
    }
    
    .avatar-edit-icon i {
      font-size: 14px;
    }
    
    #modalavatars .modal-body::-webkit-scrollbar {
      width: 8px;
    }
    
    #modalavatars .modal-body::-webkit-scrollbar-track {
      background: #1a1a1a;
      border-radius: 4px;
    }
    
    #modalavatars .modal-body::-webkit-scrollbar-thumb {
      background: #4a4a4a;
      border-radius: 4px;
    }
    
    #modalavatars .modal-body::-webkit-scrollbar-thumb:hover {
      background: #5a5a5a;
    }
    
    @media (max-width: 576px) {
      #modalavatars .modal-dialog {
        margin: 10px;
        max-width: calc(100% - 20px);
      }
      
      .avatar-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
      }
      
      #modalavatars .modal-header,
      #modalavatars .modal-body,
      .modal-footer {
        padding-left: 20px;
        padding-right: 20px;
      }
      
      #modalavatars .modal-title {
        font-size: 20px;
      }
      
      .btn-close-modal {
        min-width: 150px;
        padding: 10px 30px;
      }
    }
  </style>
  <script type="text/javascript">
    setTimeout(function () {
      var wpse326013 = document.createElement('link');
      wpse326013.rel = 'stylesheet';
      wpse326013.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>';
      wpse326013.type = 'text/css';
      var godefer = document.getElementsByTagName('link')[0];
      godefer.parentNode.insertBefore(wpse326013, godefer);
      var wpse326013_2 = document.createElement('link');
      wpse326013_2.rel = 'stylesheet';
      wpse326013_2.href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>';
      wpse326013_2.type = 'text/css';
      var godefer2 = document.getElementsByTagName('link')[0];
      godefer2.parentNode.insertBefore(wpse326013_2, godefer2);
    }, 500);
  </script>
  <noscript>
    <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>" />
    <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>" />
  </noscript>
  <scripts></scripts>
</head>

<body data-page="page_profile">
  <div id="sidebar_menu_bg"></div>
  <div id="wrapper" data-page="page_home">
    <?php include '../_php/header.php'; ?>
    <div class="clearfix"></div>

    <div id="main-wrapper" class="layout-page layout-profile">
      <div class="profile-header">
        <div class="profile-header-cover"
          style="background-image: url(<?php echo $websiteUrl.'/files/avatar/'.$fetch['image'] ?>);"></div>
        <div class="container">
          <div class="ph-title"><?=$fetch['name']?></div>
          <div class="ph-tabs">
            <div class="bah-tabs">
              <ul class="nav nav-tabs pre-tabs">
                <li class="nav-item"><a class="nav-link active" href="<?=$websiteUrl?>/user/profile"><i
                      class="fas fa-user mr-2"></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/watchlist"><i class="fas fa-heart mr-2"></i>Watch
                    List</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/changepass"><i class="fas fa-key mr-2"></i>Change
                    Password</a></li>
              </ul>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="profile-content">
        <div class="container">
          <div class="profile-box profile-box-account makeup">
            <h2 class="h2-heading mb-4"><i class="fas fa-user mr-3"></i>Your Profile</h2>
            <div class="block_area-content">
              <div class="show-profile-avatar text-center mb-3">
                <div class="profile-avatar d-inline-block" data-toggle="modal" data-target="#modalavatars">
                  <?php
                   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                   if(mysqli_num_rows($select) > 0){
                      $fetch = mysqli_fetch_assoc($select);
                   }
                  if($fetch['image'] == ''){
   echo '<img id="preview-avatar" src="'.$websiteUrl.'/files/avatar/default/default.jpeg">';
}else{
   echo '<img id="preview-avatar" src="'.$websiteUrl.'/files/avatar/'.$fetch['image'].'">';
}?>
                  <div class="avatar-edit-icon" data-toggle="modal" data-target="#modalavatars">
                    <i class="fas fa-pencil-alt"></i>
                  </div>
                </div>
              </div>
              <form class="preform" method="post" id="profile-form">
                <input type="hidden" name="avatar_id" id="selected-avatar" value="<?php echo $fetch['image']; ?>">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-email">Email address</label>
                      <input type="email" name="email" class="form-control" disabled id="pro5-email"
                        value="<?php echo $fetch['email']; ?>">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-name">Username</label>
                      <input type="text" class="form-control" disabled id="pro5-name" name="name" required
                        value="<?php echo $fetch['name']; ?>">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-join">Joined</label>
                      <input type="text" class="form-control" disabled id="pro5-join" value="<?php echo $fetch['date']; ?>">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>

    <?php include '../_php/footer.php' ?>
    <div id="mask-overlay"></div>
    
    <!-- Avatar Selection Modal -->
    <div class="modal fade" id="modalavatars" tabindex="-1" role="dialog" aria-labelledby="avatarModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="avatarModalLabel">Choose Avatar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="avatar-grid">
              <?php
                $avatarFolder = '../files/avatar/';
                $avatarFiles = glob($avatarFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                
                foreach($avatarFiles as $avatar) {
                  $avatarName = basename($avatar);
                  $avatarUrl = $websiteUrl . '/files/avatar/' . $avatarName;
                  $isSelected = ($fetch['image'] == $avatarName) ? 'selected' : '';
                  echo '<div class="avatar-option ' . $isSelected . '" data-avatar="' . $avatarName . '">';
                  echo '<img src="' . $avatarUrl . '" alt="Avatar">';
                  echo '</div>';
                }
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-close-modal" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js.Cookies@rc/dist/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/app.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/comman.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/movie.js?v=<?=$version?>"></script>
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/jquery-ui.css?v=<?=$version?>">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/function.js?v=<?=$version?>"></script>
    
    <script>
      $(document).ready(function() {
        $('.avatar-option').click(function() {
          $('.avatar-option').removeClass('selected');
          $(this).addClass('selected');
          var selectedAvatar = $(this).data('avatar');
          $('#selected-avatar').val(selectedAvatar);
          
          updateAvatar(selectedAvatar);
        });
        
        function updateAvatar(selectedAvatar) {
          if (selectedAvatar) {
            $('#preview-avatar').attr('src', '<?=$websiteUrl?>/files/avatar/' + selectedAvatar);
            
            $.ajax({
              type: 'POST',
              url: 'update_avatar.php',
              data: { avatar: selectedAvatar, user_id: '<?=$user_id?>' },
              success: function(response) {
                $('.profile-header-cover').css('background-image', 'url(<?=$websiteUrl?>/files/avatar/' + selectedAvatar + ')');
                
                setTimeout(function() {
                  $('#modalavatars').modal('hide');
                  
                  var alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                  'Avatar updated successfully!' +
                                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                  '<span aria-hidden="true">&times;</span>' +
                                  '</button>' +
                                  '</div>';
                  $('.profile-box-account').prepend(alertHtml);
                  
                  setTimeout(function() {
                    $('.alert').fadeOut('slow', function() {
                      $(this).remove();
                    });
                  }, 3000);
                }, 300);
              },
              error: function(xhr, status, error) {
                var alertHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                'Error updating avatar. Please try again.' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '</div>';
                $('.profile-box-account').prepend(alertHtml);
              }
            });
          }
        }
      });
    </script>
    
    <div style="display:none;">
    </div>
  </div>
</body>

</html>