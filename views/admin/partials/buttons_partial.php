<?php
$data = array(
    'name' => 'edit',
    'id' => 'button',
    'value' => 'edit',
    'type' => 'submit',
    'content' => 'Edit Ad'
);

echo form_button($data);

$data = array(
    'name' => 'delete',
    'id' => 'button',
    'value' => 'delete',
    'type' => 'submit',
    'content' => 'Delete Ads'
);

echo form_button($data);
?>
