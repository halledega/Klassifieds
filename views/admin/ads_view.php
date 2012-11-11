<section class="title"><h4><?php echo lang('klass.page_title'); ?></h4></section>
<section class="item">
<?php if($ads[0]['adCount'] !== 0) {?>
    <table  border="0" cellspacing="0" cellpadding="0" class="table-list">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>User</th>
                <th>Description</th>
                <th>Start</th>
                <th>Status</th>
                <th class="actions">Check All</th>
                <th> <?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
            </tr>
        </thead>
    <tfoot>
        <tr>
            <td colspan="7">
                <div class="inner">Pagination goes here....</div>
            </td>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach($ads as $ad): ?>
        <tr>
            <td class="imageCell"><img src="<?php echo BASE_URL.ADDONPATH.'modules/Klassifieds/imgs/'.$ad['images'][0]['file']; ?>" width="50" height="<?php $h = 50*0.75; echo $h; ?>"/></td>
            <td class="titleCell"><?php echo $ad['title']; ?></td>
            <td class="userCell"><?php echo $ad['userName']; ?></td>
            <td class="descCell"><?php echo $ad['title']; ?></td>
            <td class="dateCell"><?php echo $ad['posted']; ?></td>
            <td class="statusCell">Active</td>
            <td class="actions">
                <?php echo
                    anchor('Klassifieds/full/'.$ad['id'], 'View', 'class="button" target="_blank"').' '.
                    anchor('admin/Klassifieds/edit/'.$ad['id'], 'Edit', 'class="button"').' '.
                    anchor('admin/Klassifieds/delete/'.$ad['id'], 'Delete', 'class="button"');
                ?>
            </td>
            <td><?php echo form_checkbox('action_to[]', $ad['id']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="table_action_buttons">
      <?php $this->load->view('admin/partials/buttons_partial', array('buttons' => array('delete'))); ?>;
    </div>
<?php } else { ?>
    <div class="no-data">
            <h2><?php echo lang('klass.no_ads')?></h2>
    </div>
<?php } ?>





<?php
/*
'id'          =>  $ad['id'],
'user'        =>  $ad['user_id'],
'category'    =>  $category[0]['name'],
'subcategory' =>  $subcategory[0]['name'],
'county'      =>  $ad['country'],
'state'       =>  $ad['state'],
'city'        =>  $ad['city'],
'title'       =>  $ad['adTitle'],
'descShort'   =>  $ad['descShort'],
'descLong'    =>  $ad['descLong'],
'images'      =>  $images, this is another array
'price'       =>  $ad['price'],
'posted'      =>  $ad['start']
*/

?>
</section>