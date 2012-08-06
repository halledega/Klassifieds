<article>
<?php foreach($ads as $result):?>
  <div id="infoHolder">
	<div id="adTitle"><?php echo $result['title']; ?></div>
	<div class="infoItem"><span class="infoTitle">Poster:</span><span class="info"><?php echo $result['userName']; ?></span></div>
	<div class="infoItem"><span class="infoTitle">Category:</span><span class="info"><?php echo $result['category']; ?> - <?php echo $result['subcategory']; ?></span></div>
	<div class="infoItem"><span class="infoTitle">Location:</span><span class="info"><?php echo $result['city']; ?>- <?php echo $result['country']; ?></span></div>
	<div class="infoItem"><span class="infoTitle">Price:</span><span class="info"><?php echo $result['price']; ?></span></div>
	<div class="infoItem"><span class="emailInfo"><a href="#">Contact Poster</a></span></div>
  </div>
<div id="images">
  <p id="big">
  <?php
    echo '<a href="#" rel="lightbox"><img src="'.$result['images'][0]['file'].'150/150/" alt="'.$result['images'][0]['caption'].'"/></a>';
  ?>
  </p>
  <p id="small">
  <?php
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
      echo '<a href="#" rel="lightbox"><img src="'.$result['images'][0]['file'].'50/50/" alt="'.$images['caption'].'"/></a>';
  endforeach;
  ?>
  </p>
  <p id="caption"><?php echo $result['images'][0]['caption']; ?></p>
</div>
<div id="description">
  <?php echo $result['descLong']; ?>
</div>
<?php endforeach;?>
</article>

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