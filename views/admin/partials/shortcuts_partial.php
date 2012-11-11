<?php $admin_url = base_url().'index.php/admin/'.$this->module; ?>
<nav id="shortcuts">
    <h6><?php echo lang('cp_shortcuts_title'); ?></h6>
    <ul>
        <li><a href="<?php echo $admin_url;?>">List Ads</a></li>
        <li><a class="add" href="<?php echo $admin_url;?>">Create Ads</a></li>
        <li><a href="<?php echo $admin_url; ?>/categories">Categories</a></li>
        <li><a class="add" href="<?php echo $admin_url; ?>/categories">Create Category</a></li>
        <li><a href="<?php echo $admin_url; ?>/settings">Settings</a></li>
    </ul>
    <br class="clear-both" />
</nav>

