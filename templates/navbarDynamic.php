
<div class="inner">
  <nav>
    <ul class="nav masthead-nav">
      <li><a <?php if($thisPage=='home'){ ?>class="active" <?php } ?> href="index3.php?category=templates&page=home">HOME</a></li>
      <li><a href="index3.php?category=templates&page=about">ALL ABOUT ALISON</a></li>
      <li><a href="index3.php?category=templates&page=contact">CONTACT AND RÉSUMÉ</a></li>
      <li <?php if ($page == 'media') echo " class=\"active\""; ?>><a href="index3.php?category=templates&page=media">SOUND AND VIDEO</a></li>
      <li><a href="index3.php?category=templates&page=photos">GALLERY</a></li>
      <li><a href="index3.php?category=templates&page=press">PRESS</a></li>
      <li><a href="index3.php?category=templates&page=lessons">LESSONS</a></li>
    </ul>
  </nav>
</div>

<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($currect_page == $url){
      echo 'active'; //class name in css
  }
}
?>
<ul>
    <li><a class="<?php active('page1.php');?>" href="http://localhost/page1.php">page1</a></li>
    <li><a class="<?php active('page2.php');?>" href="http://localhost/page2.php">page2</a></li>
    <li><a class="<?php active('page3.php');?>" href="http://localhost/page3.php">page3</a></li>
    <li><a class="<?php active('page4.php');?>" href="http://localhost/page4.php">page4</a></li>
</ul>



<?php foreach($pages as $url=>$title):?>
  <li>
       <a <?php if($url === $activePage):?>class="active"<?php endif;?> href="<?php echo $url;?>">
         <?php echo $title;?>
      </a>
  </li>

<?php endforeach;?>

<?php foreach($pages as $url=>$title):?>
  <li>
       <a <?php if($url === $activePage):?>class="active"<?php endif;?> href="<?php echo $activeSection;?>">
         <?php echo $title;?>
      </a>
  </li>

<?php endforeach;?>
