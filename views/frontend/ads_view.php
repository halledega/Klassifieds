<section>
    <?php //echo $this->pagination->create_links();?>
    <?php if($ads[0]['adCount'] == 0) {
        echo "<h4>There are currently no ads posted.  Please check back again.</h4>";
    }
    else {
?>
    <?php foreach($ads as $result):?>
    <div class="klassyAd">
        <div class="klassyImage">
            <img src="<?php echo BASE_URL.ADDONPATH.'modules/Klassifieds/imgs/'.$result['images'][0]['file']; ?>" alt="<?php echo $result['images'][0]['caption']; ?>" width="150" height="<?php $h = 150*0.75; echo $h; ?>"/>
        </div>
        <div class="klassyStats">
            <ul class="klassyStatsList">
                <li class="klassyStat"><?php echo $result['category'].' - '.$result['subcategory']; ?></li>
                <li class="klassyStat">Posted By: <?php echo $result['userName']; ?></li>
                <li class="klassyStat">Price: $ <?php echo $result['price'];?></li>
                <li class="klassyStat">Location: <?php echo $result['city'].', '.$result['country'];?></li>
                <li class="klassyStat">Click <a href="<?php echo base_url()."index.php/".$this->module."/fullAd/".$result['id']; ?>">here</a> to see more...</li>
            </ul>
        </div>
        <div class="klassyMainInfo">
            <h2><?php echo $result['title']; ?></h2>
            <p>
                <?php echo $result['descShort'];?>
            </p>
        </div>
    </div>
    <?php endforeach;?>
    <?php } //echo $this->pagination->create_links();?>
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

<img src="<?php echo BASE_URL.ADDONPATH.'modules/Klassifieds/imgs/'.$ad['images'][0]['file']; ?>" width="50" height="<?php $h = 50*0.75; echo $h; ?>"/>