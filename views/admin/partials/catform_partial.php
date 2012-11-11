<?php echo form_open_multipart('admin/Klassifieds/CreateCategory'); ?>
<input type="hidden" name="id" value="<?php if(isset($selected_cat)) {echo $selected_cat[0]['id'];} ?>" />
<ul>
    <li class="<?php echo alternator('', 'odd'); ?>">
        <?php echo form_label('Category Name','name'); ?>
        <div class="input">
            <?php
                $info['name']='name';
                $info['id']='name';
                if(isset($selected_cat)) {$info['value']= $selected_cat[0]['name'];}
                echo form_input($info);
            ?>
        </div>
    </li>
    <li class="<?php echo alternator('', 'even'); ?>">
        <?php echo form_label('Category desc','desc'); ?>
        <div class="input">
            <?php
                $info['name']='desc';
                $info['id']='desc';
                if(isset($selected_cat)) {$info['value']= $selected_cat[0]['desc'];}
                echo form_input($info);
            ?>
        </div>
    </li>
    <?php if(isset($selected_cat) && $selected_cat[0]['parent_id'] != 0) { ?>
    <li class="<?php echo alternator('', 'odd'); ?>">
        <?php echo form_label('Parent Category','parent_id'); ?>
        <div class="input">
            <?php
                $info['name']='parent_id';
                $info['id']='parent_id';
                if(isset($selected_cat)) {$info['value']= $selected_cat[0]['parent_id'];}
                echo form_dropdown('parent_id',$categories_list);
            ?>
        </div>
    </li>
</ul>
    <?php } else { ?>
    <input type="hidden" name="parent_id" value="<?php if(isset($selected_cat)) {echo $selected_cat[0]['parent_id'];} ?>" />
    <?php }?>
<ul>
    <li class="<?php echo alternator('', 'odd'); ?>">
        <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Save')); ?>
        <?php echo form_button(array('name'=>'delete','class'=>'btn red','value'=>'reset','type'=>'delete','content'=>'Delete')); ?>
    </li>
</ul>
<?php echo form_close(); ?>