<?php
?>
<section class="title">
    <h4><?php echo lang('klass.page_title'); ?></h4>
</section>
<section class="item">
<?php echo form_open_multipart('admin/Klassifieds/CreateAd'); ?>
<input type="hidden" name="user_id" value="1"/>
<input type="hidden" name="submitted" value="submitted"/>

<div class="tabs" style="width:100%">
    <ul class="tab-menu">
        <li>
            <a href="#info" title=""><span>Ad Information</span></a>
        </li>
        <li>
            <a href="#images" title=""><span>Images</span></a>
        </li>
    </ul>
    <div class="form_inputs" id="info">
        <fieldset>
        <!--Backend Settings-->
            <ul>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Ad Title','adTitle'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'adTitle',
                                          'id'=>'adTitle',
                                          'value'=>set_value('adTitle')
                                          );
                            echo form_input($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Price','price'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'price',
                                          'id'=>'price',
                                          'value'=>set_value('price')
                                          );
                            echo form_input($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Category','category'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'category',
                                          'id'=>'category',
                                          'value'=>set_select('category')
                                          );
                            echo form_dropdown('category',$categories);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Subcategory','subcategory'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'subcategory',
                                          'id'=>'subcategory',
                                          'value'=>set_select('subcategory')
                                          );
                            echo form_dropdown('subcategory',$subcategories);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Ad Duration'); ?>
                    <div class="input">
                        <?php
                        //get ad durations for settings
                            $durs = explode(',',$ksett['ad_durations']);
                            $i = 0;
                            $nodurs = count($durs);
                            while($i+1<=$nodurs) {
                                $durations[$durs[$i]] = $durs[$i]." Days";
                                $i++;
                            }
                            $info = array(
                                          'name'=>'adDuration',
                                          'id'=>'adDuration',
                                          'value'=>set_select('adDuration')
                                          );
                            echo form_dropdown('adDuration',$durations);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Country'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'country',
                                          'id'=>'country',
                                          'value'=>set_value('country')
                                          );
                            echo form_input($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('State/Province'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'state',
                                          'id'=>'state',
                                          'value'=>set_value('state')
                                          );
                            echo form_input($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('City'); ?>
                    <div class="input">
                        <?php
                            $info = array(
                                          'name'=>'city',
                                          'id'=>'city',
                                          'value'=>set_value('city')
                                          );
                            echo form_input($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Short Description'); ?>
                    <div class="input">
                        <span class="word_counter">Words Left:</span>
                        <?php
                            $info = array(
                                          'name'=>'descShort',
                                          'id'=>'descShort',
                                          'value'=>set_value('descShort'),
                                          'rows'=>5,
                                          'cols'=>8
                                          );
                            echo form_textarea($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <?php echo form_label('Long Description'); ?>
                    <div class="input">
                        <span class="word_counter">Words Left:</span>
                        <?php
                            $info = array(
                                          'name'=>'descLong',
                                          'id'=>'descLong',
                                          'value'=>set_value('descLong'),
                                          'rows'=>15,
                                          'cols'=>8
                                          );
                            echo form_textarea($info);
                        ?>
                    </div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <div class="buttons align-right padding-top">
                        <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Continue')); ?>
                        <?php echo form_button(array('name'=>'reset','class'=>'btn red','value'=>'reset','type'=>'reset','content'=>'Reset Form')); ?>
                    </div>
                </li>
            </ul>
        </fieldset>
    </div>
        <div class="form_inputs" id="images">
        <fieldset>
            <ul>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <div class="buttons align-right padding-top">
                        <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Save Settings')); ?>
                        <?php echo form_button(array('name'=>'reset','class'=>'btn red','value'=>'reset','type'=>'reset','content'=>'Reset Settings')); ?>
                    </div>
                </li>
            </ul>
        </fieldset>
    </div>
<?php echo form_close(); ?>
</section>
