<article>
<ul>
<?php
    foreach($cat_query as $cat) {
        echo '<li><h3><a href="'.base_url().'index.php/'.$this->module.'/adFilter/category/'.$cat['id'].'">'.$cat['name'].'</a></h3></li>';
        echo '<ul>';
        foreach($cat_query[$cat['id']-1]['children'] as $sub) {
            echo '<li><a href="'.base_url().'index.php/'.$this->module.'/adFilter/subcategory/'.$sub['id'].'/category/'.$sub['parent_id'].'">'.$sub['name'].'</a></li>';
        }
        echo '</ul>';
    }
?>
</ul>

