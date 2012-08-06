<?php echo form_open(); ?>
<section class="new_ad_form">
    <p>
        <?php echo form_label('Ad Title','ad_title'); ?>
       <?php echo form_input('ad_title',10);?>
    </p>
    <p>
        <?php echo form_label('Price','ad_price'); ?>
       <?php echo form_input('ad_price',10);?>
    </p>
    <p>
        <?php echo form_label('Category','ad_category'); ?>
       <?php
               $categories = array(
                   'Select Category','For Sale','Wanted','Other'
               );
            echo form_dropdown('ad_category',$categories,'Select Category');
        ?>
    </p>
    <p>
        <?php echo form_label('Subcategory','ad_subcategory'); ?>
       <?php
               $categories = array(
                   'Select Subcategory','Widgets','Sports Stuff','Other'
               );
            echo form_dropdown('ad_category',$categories,'Select Subategory');
        ?>
    </p>
    <p>
        <?php echo form_label('Duration','ad_duration'); ?>
       <?php
               $categories = array(
                   10,30,60,90
               );
            echo form_dropdown('ad_duration',$categories,10);
        ?>
    </p>
    <p>
        <?php echo form_label('Short Description','ad_descshort'); ?>
        <?php echo form_textarea(array('name'=>'ad_descshort','class'=>'short')); ?>
    </p>
     <p>
        <?php echo form_label('Long Description','ad_desclong'); ?>
        <?php echo form_textarea(array('name'=>'ad_desclong','class'=>'long')); ?>
    </p>
    <p>
        <?php echo form_button(array('name'=>'submit','class'=>'form_button','value'=>'submit','type'=>'submit','content'=>'Save and Preview')); ?>
    </p>
</section>
<?php echo form_close(); ?>

