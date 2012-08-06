<?php $address = "http://192.168.1.2/~michaelhalliday/pyrocms/index.php/admin/Klassifieds/categories"; ?>
<div class="left_cell">
	<section class="title">
		<h4><?php echo lang('pages.list_title'); ?></h4>
	</section>

	<section class="item">
		<div id="categories">
		<ul class="category_list parent-categories">
                    <?php foreach($cat_query as $category): ?>
                        <li id="<?php echo 'category_'.$category['id']; ?>">
                            <div>
                                <a class="" href="<?php echo $address ?>/<?php echo $category['id']; ?>" rel="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> - <?php echo $category['desc']; ?>
                            </div>
                            <?php //if (isset($page['children'])): ?>
                            <ul class="child-categories" style="margin-left: 15px;">
                                <?php foreach($category['children'] as $subcategory): ?>

                                    <li id="page_<?php echo $subcategory['id']; ?>">
                                        <div>
                                            <a href="<?php echo $address ?>/<?php echo $subcategory['id']; ?>" rel="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></a> - <?php echo $subcategory['desc']; ?>
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                            </ul>
                            <?php //endif; ?>
                        </li>
                    <?php endforeach; ?>
		</ul>
		</div>
	</section>
</div>

<div class="right_cell">
	<section class="title">
		<h4>Category Details</h4>
	</section>

	<section class="item">
  <?php
    if(!empty($single_cat)) {
    echo form_open_multipart('admin/Klassifieds/CreateAd');
  ?>
  <div class="form_inputs" id="info">
  <ul>
  <?php foreach($single_cat as $category): ?>
    <li class="<?php echo alternator('', 'odd'); ?>">
        <?php echo form_label('Category Name','name'); ?>
        <div class="input">
            <?php
                $info = array(
                              'name'=>'name',
                              'id'=>'name',
                              'value'=> $category['name']
                              );
                echo form_input($info);
            ?>
        </div>
    </li>
    <li class="<?php echo alternator('', 'even'); ?>">
        <?php echo form_label('Category Description','desc'); ?>
        <div class="input">
            <?php
                $info = array(
                              'name'=>'desc',
                              'id'=>'desc',
                              'value'=> $category['desc']
                              );
                echo form_input($info);
            ?>
        </div>
    </li>
    <?php endforeach;?>
    <li class="<?php echo alternator('', 'odd'); ?>">
        <div class="">
            <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Continue')); ?>
            <?php echo form_button(array('name'=>'reset','class'=>'btn red','value'=>'reset','type'=>'reset','content'=>'Reset Form')); ?>
        </div>
    </li>
  </ul>
  </div>

  <?php
    if($category['parent_id'] !== 0) {
      echo 'Select New Parent';
    }
    } else {
  ?>
  <p>Click any category on the left to see and edit it details.</p>
   <?php
    }
    echo form_close();
  ?>
	</section>
</div>