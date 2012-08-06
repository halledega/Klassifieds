<section class="title"><h4><?php echo lang('klass.page_title'); ?></h4></section>
<section class="item">
<?php foreach($ads as $result):?>
  <div id="infoHolder">
  <h2 id="title"><?php echo $result['title']; ?></h2>
	<p><span class="infoTitle">Poster:</span><span class="info"><?php echo $result['userName']; ?></span></p>
	<p><span class="infoTitle">Category:</span><span class="info"> - <?php echo $result['category']; ?></span></p>
	<p><span class="infoTitle">Location:</span><span class="info"><?php echo $result['city']; ?>- <?php echo $result['title']; ?></span></p>
	<p><span class="infoTitle">Price:</span><span class="info"><?php echo $result['price']; ?></span></p>
	<p><span class="emailInfo"><a href="#">Contact Poster</a></span></p>
</div>
<div id="images">
  <p id="big">
  <?php
   //echo '<a href="#" rel="lightbox"><img src="'.$result['images'][0]['file'].'" alt="'.$result['images'][0]['caption'].'" width="'.$result['images'][0]['width'].'" height="'.$result['images'][0]['height'].'"/></a>';
  ?>
  </p>
  <p id="small">
  <?php
  //this re-sizes for images to fit the form ad view layout
  //if you do not know what this is don't touch it or the page may break
    $max = 75;
    foreach($result['images'] as $images) :
      $ratio = ($images['width']/$images['height']);
      if($ratio > 1) {
	$width = $max;
	$height = $width/$ratio;
      }
      elseif($ratio < 1) {
	$height = $max;
	$width = $height/$ratio;
      }
      else {
	$width = $max;
	$height = $max;
      }
      echo '<a href="#" rel="lightbox"><img src="'.$images['file'].'" alt="'.$images['caption'].'" width="'.$width.'" height="'.$height.'"/></a>';
  endforeach;
  ?>
  </p>
  <p id="caption"><?php //echo $result['images'][0]['caption']; ?></p>
</div>
<div id="description">
  <?php echo $result['descLong']; ?>
</div>
<!--small form to accept or delete ad-->
<a href="<?php echo BASE_URL.'index.php/admin/Klassifieds'; ?>" class="btn blue">Save Ad</a>
<a href="<?php echo BASE_URL.'index.php/admin/Klassifieds/deleteAd/'.$result['id']; ?>" class="btn red">Delete Ad</a>
<?php endforeach;?>
</section>

<?php
/*
'id'=>$ad['id'],
'user'=>$ad['user_id'],
'category'=> $category[0]['name'],
'subcategory'=>$subcategory[0]['name'],
'county'=>$ad['country'],
'state'=>$ad['state'],
'city'=>$ad['city'],
'title'=>$ad['adTitle'],
'descShort'=>$ad['descShort'],
'descLong'=>$ad['descLong'],
'images'->$iamges,
'price'=>$ad['price'],
'posted'=>$ad['start']
*/
?>