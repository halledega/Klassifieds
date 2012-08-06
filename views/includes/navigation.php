<nav id="klassyNav">
    <ul>
        <li class="main">
            <a href="<?php echo base_url().'index.php/'.$this->module; ?>">Home</a>
        </li>
        <li class="main">
            <a href="<?php echo base_url();?>index.php/<?php echo $this->module; ?>/categories">Categories</a>
            <!--
            <div class="sub categories">
                <table>
                    <tr>
                <?php
                    if($cat_query[0]['catCount'] == 0) {
                        echo "<h4>No Categories Returned</h4>";
                    }
                    else {
                        foreach($cat_query as $cat) {
                            echo '<td><h3><a href="'.base_url().'index.php/'.$this->module.'/adFilter/category/'.$cat['id'].'">'.$cat['name'].'</a></h3>';
                            echo '<hr/>';
                            foreach($cat_query[$cat['id']-1]['subs'] as $sub) {
                                echo '<p><a href="'.base_url().'index.php/'.$this->module.'/adFilter/subcategory/'.$sub['id'].'/category/'.$sub['parent_id'].'">'.$sub['name'].'</a></p>';
                            }
                            echo '</tr>';
                        }
                    }
                ?>
                     </tr>
                </table>
            </div>
            -->
        </li>
        <li class="main">
            <a href="">Locations</a>
            <div class="sub categories">

            </div>
        </li>
        <li class="main">
            <a href="">User Menu</a>
            <ul class="sub">
                <li><a href="<?php echo base_url();?>index.php/<?php echo $this->module; ?>/myads">My Ads</a></li>
                <li><a href="<?php echo base_url();?>index.php/<?php echo $this->module; ?>/postad">Post Ad</a></li>
            </ul>
        </li>
    </ul>
</nav>

