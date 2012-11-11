<?php $address = BASE_URI."index.php/admin/Klassifieds/categories"; ?>
<div class="one_half">
	<section class="title">
		<h4><?php echo "Catgeories List"; ?></h4>
	</section>

	<section class="item">
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
	</section>
</div>

<div class="one_half last">
	<section class="title">
		<h4>Category Details</h4>
	</section>

	<section class="item">
            <?php include('partials/catform_partial.php'); ?>
	</section>
</div>