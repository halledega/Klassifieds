<?php
/*
number_of_images            => numeric
title_length                => numeric
short_desc_length           => numeric
long_desc_length            => numeric
ad_durations                => csv ie 1,2,3,4 etc
ad_list                     => options detailed or list
include_categories          => boolean yes,no
include_subcategories       => boolean yes,no
include_durations           => boolean yes,no
include_locations           => boolean yes,no
include_currencies          => boolean yes,no
frontend_display            => options ads or categories
allow_unregistered_users    => boolean yes,no
ads_per_page                => numeric
email_notifications         => options admin,user,both,none
ad_renewals                 => boolean yes,no
image_path                  => string
thumb_path                  => string
*/
?>
<section class="title"><h4><?php echo lang('klass.page_title'); ?></h4></section>
<section class="settings">
<?php echo form_open_multipart('admin/Klassifieds/updateSettings'); ?>
<div class="tabs" style="width:100%">
    <ul class="tab-menu">
        <li>
            <a href="#general" title=""><span>General Settings</span></a>
        </li>
        <li>
            <a href="#backend" title=""><span>Backend Settings</span></a>
        </li>
    </ul>
    <div class="form_inputs" id="general">
        <fieldset>
    <!--general settings-->
        <ul>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Ad List Display:'); ?>
                <div class="input">
                    <?php
                    $data = array('name'=> 'ad_list','value'=> 'detailed');
                    if($klassifiedsettings['ad_list'] == 'detailed'){$data['checked'] = TRUE;}

                    echo '<span><label class="radioLabel">Detailed: </label>'.form_radio($data).'</span>';

                    $data = array('name'=> 'ad_list','value'=> 'list');
                    if($klassifiedsettings['ad_list'] == 'list'){$data['checked'] = TRUE;}

                    echo '<span><label class="radioLabel">List: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Title Length:'); ?>
                <div class="input"><?php echo form_input(array('name'=>'title_length','id'=>'title_length','class'=>'input','value'=>$klassifiedsettings['title_length'])); ?></div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Short Desc Length:'); ?>
                <div class="input"><?php echo form_input(array('name'=>'short_desc_length','id'=>'short_desc_length','class'=>'input','value'=>$klassifiedsettings['short_desc_length'])); ?></div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Long Desc Length:'); ?>
                <div class="input"><?php echo form_input(array('name'=>'long_desc_length','id'=>'long_desc_length','class'=>'input','value'=>$klassifiedsettings['long_desc_length'])); ?></div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Ad Durations');?>
                <div class="input"><?php echo form_input(array('name'=>'ad_durations','id'=>'ad_durations','class'=>'input','value'=>$klassifiedsettings['ad_durations'])); ?></div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Include Categories');?>
                <div class="input">
                    <?php
                        $data = array('name'=>'include_categories','value'=>'yes');
                        if($klassifiedsettings['include_categories'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=>'include_categories','value'=>'no');
                        if($klassifiedsettings['include_categories'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Include Subcategories');?>
                <div class="input">
                    <?php
                        $data = array('name'=>'include_subcategories','value'=>'yes');
                        if($klassifiedsettings['include_subcategories'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=>'include_subcategories','value'=>'no');
                        if($klassifiedsettings['include_subcategories'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Include Currencies');?>
                <div class="input">
                    <?php
                        $data = array('name'=>'include_currencies','value'=>'yes');
                        if($klassifiedsettings['include_currencies'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=>'include_currencies','value'=>'no');
                        if($klassifiedsettings['include_currencies'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Include Durations');?>
                <div class="input">
                    <?php
                        $data = array('name'=>'include_durations','value'=>'yes');
                        if($klassifiedsettings['include_durations'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=>'include_durations','value'=>'no');
                        if($klassifiedsettings['include_durations'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Include Locations');?>
                <div class="input">
                    <?php
                        $data = array('name'=>'include_locations','value'=>'yes');
                        if($klassifiedsettings['include_locations'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=>'include_locations','value'=>'no');
                        if($klassifiedsettings['include_locations'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Number of Images:');?>
                <div class="input"><?php echo form_input(array('name'=>'number_of_images','id'=>'number_of_images','class'=>'input','value'=>set_value('number_of_images',$klassifiedsettings['number_of_images']))); ?></div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <div class="buttons align-right padding-top">
                    <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Save Settings')); ?>
                    <?php echo form_button(array('name'=>'reset','class'=>'btn red','value'=>'submit','type'=>'reset','content'=>'Reset Settings')); ?>
                </div>
            </li>
        </ul>
        </fieldset>
    </div>
    <div class="form_inputs" id="backend">
        <fieldset>
    <!--Backend Settings-->
        <ul>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Ads Per Page:'); ?>
                <div class="input"><?php echo form_input(array('name'=>'ads_per_page','id'=>'number_of_images','value'=>  set_value('ads_per_page',$klassifiedsettings['ads_per_page']))); ?></div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Allow Unregistered Users?'); ?>
                <div class="input">
                    <?php
                        $data = array('name'=> 'allow_unregistered_users','value'=> 'yes');
                        if($klassifiedsettings['allow_unregistered_users'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=> 'allow_unregistered_users','value'=> 'no');
                        if($klassifiedsettings['allow_unregistered_users'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Path to Images:'); ?>
                <div class="input"><?php echo form_input(array('name'=>'image_path','id'=>'image_path','class'=>'input','value'=>set_value('image_path', $klassifiedsettings['image_path'])));?></div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Path to Thumnbnails:'); ?>
                <div class="input"><?php echo form_input(array('name'=>'thumb_path','id'=>'thumb_path','class'=>'input','value'=>set_value('thumb_path', $klassifiedsettings['thumb_path'])));?></div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Front End View:'); ?>
                <div class="input">
                    <?php
                        $data = array('name'=> 'frontend_display','value'=> 'ads');
                        if($klassifiedsettings['frontend_display'] == 'ads'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Ads: </label>'.form_radio($data).'</span>';

                        $data = array('name'=> 'frontend_display','value'=> 'list');
                        if($klassifiedsettings['frontend_display'] == 'list'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Categoroies: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'odd'); ?>">
                <?php echo form_label('Allow Ad Renewals','ad_renewal',array('class'=>'mainLabel')); ?>
                <div class="input">
                    <?php
                        $data = array('name'=> 'ad_renewals','value'=> 'yes');
                        if($klassifiedsettings['ad_renewals'] == 'yes'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Yes: </label>'.form_radio($data).'</span>';

                        $data = array('name'=> 'ad_renewals','value'=> 'no');
                        if($klassifiedsettings['ad_renewals'] == 'no'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">No: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <?php echo form_label('Email Notifications:'); ?>
                <div class="input">
                    <?php
                        $data = array('name'=> 'email_notifications','value'=> 'admin');
                        if($klassifiedsettings['email_notifications'] == 'admin'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Admin Only: </label>'.form_radio($data).'</span>';

                        $data = array('name'=> 'email_notifications','value'=> 'user');
                        if($klassifiedsettings['email_notifications'] == 'user'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Users Only: </label>'.form_radio($data).'</span>';

                        $data = array('name'=> 'email_notifications','value'=> 'both');
                        if($klassifiedsettings['email_notifications'] == 'both'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">Both: </label>'.form_radio($data).'</span>';

                        $data = array('name'=> 'email_notifications','value'=> 'none');
                        if($klassifiedsettings['email_notifications'] == 'none'){$data['checked'] = TRUE;}

                        echo '<span><label class="radioLabel">None: </label>'.form_radio($data).'</span>';
                    ?>
                </div>
            </li>
            <li class="<?php echo alternator('', 'even'); ?>">
                <div class="buttons align-right padding-top">
                    <?php echo form_button(array('name'=>'submit','class'=>'btn blue','value'=>'submit','type'=>'submit','content'=>'Save Settings')); ?>
                    <?php echo form_button(array('name'=>'reset','class'=>'btn red','value'=>'reset','type'=>'reset','content'=>'Reset Settings')); ?>
                </div>
            </li>
        </ul>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
</div>
</section>


