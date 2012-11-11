<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="title"><h4><?php echo lang('klass.page_title'); ?></h4></section>
<section class="item">
		<div id="files-uploader">
      <div class="files-uploader-browser">
        <?php echo form_open_multipart('admin/Klassifieds/doUpload'); ?>
          <label for="file" class="upload">Upload File:</label>
          <?php echo form_upload('file', NULL, 'multiple="multiple"'); ?>
        <ul id="files-uploader-queue" class="ui-corner-all"></ul>
      </div>

      <div class="buttons align-right padding-top">
        <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Continue')); ?>
        <?php echo form_button(array('name'=>'reset','class'=>'btn red','value'=>'reset','type'=>'reset','content'=>'Reset Form')); ?>
      </div>
      <?php echo form_close(); ?>
		</div>
</section>