<?php defined('BASEPATH') or exit('No direct script access allowed');
class Module_Klassifieds extends Module {
    public $version = '1.0';
    public function info()
    {
            return array(
                    'name' => array(
                            'en' => 'Klassifieds'
                    ),
                    'description' => array(
                            'en' => 'A classified ads module for Pyro CMS'
                    ),
                    'frontend' => TRUE,
                    'backend' => TRUE,
                    'menu' => 'content',
                    'sections' => array(
                        'ads' => array(
                            'name' => 'klass.ads_list',
                            'uri' => 'admin/Klassifieds',
                            'shortcuts' => array(
                                'create' => array(
                                    'name' 	=> 'klass.create_ad',
                                    'uri' => 'admin/Klassifieds/createad',
                                    'class' => 'add'
                                )
                            )
                        ),
                        'categories' => array(
                            'name' => 'klass.categories',
                            'uri' => 'admin/Klassifieds/categories',
                            'shortcuts' => array(
                                'create' => array(
                                    'name' 	=> 'klass.create_category',
                                    'uri' => 'admin/Klassifieds/newcategory',
                                    'class' => 'add'
                                )
                            )
                        ),
                        'settings' => array(
                            'name' => 'klass.manage',
                            'uri' => 'admin/Klassifieds/settings'
                        )
                    )
            );
    }
    public function install()
    {
    // Create  classifieds tables
        $adsTable = $this->db->dbprefix('klassAds') ;
        $categoriesTable = $this->db->dbprefix('klassCategories') ;
        $settingsTable = $this->db->dbprefix('klassSettings') ;
        $imagesTable = $this->db->dbprefix('klassImages') ;
        $countriesTable = $this->db->dbprefix('klassCountries') ;
        $citiesTable = $this->db->dbprefix('klassCities') ;
        $statesTable = $this->db->dbprefix('klassStates') ;

    // ads table
        $sql ="
            CREATE TABLE $adsTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `user_id` int(11) NOT NULL,
                `category` int(11) NOT NULL,
                `subcategory` int(11) NOT NULL,
                `city` int(11) NOT NULL,
                `country` int(11) NOT NULL,
                `state` int(11) NOT NULL,
                `adTitle` text NOT NULL,
                `descShort` text NOT NULL,
                `descLong` text NOT NULL,
                `price` decimal(10,2) NOT NULL,
                `start` date NOT NULL,
                `end` date NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($adsTable);
        $query = $this->db->query($sql);
    //categories table
        $sql ="
            CREATE TABLE $categoriesTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `parent_id` int(11) NOT NULL,
                `name` text NOT NULL,
                `desc` text NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($categoriesTable);
        $query = $this->db->query($sql);
    //settings table
        $sql ="
                CREATE TABLE $settingsTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `setting` text NOT NULL,
                `value` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($settingsTable);
        $query = $this->db->query($sql);
    //images table
        $sql ="
            CREATE TABLE $imagesTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `ad_id` int(11) NOT NULL,
                `file` text NOT NULL,
                `type` text NOT NULL,
                `caption` text NOT NULL,
                `width` int(11) NOT NULL,
                `height` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($imagesTable);
        $query = $this->db->query($sql);
    //countries table
        $sql ="
            CREATE TABLE $countriesTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `country` text NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($countriesTable);
        $query = $this->db->query($sql);
    //cities table
        $sql ="
            CREATE TABLE $citiesTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `city` text NOT NULL,
                `country_id` int(11) NOT NULL,
                `state_id` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($citiesTable);
        $query = $this->db->query($sql);
    //states stable
        $sql ="
            CREATE TABLE $statesTable (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `state` text NOT NULL,
                `country_id` int(11) NOT NULL,
                PRIMARY KEY (`id`)
            )
        ";
        $this->dbforge->drop_table($statesTable);
        $query = $this->db->query($sql);

   //populate tables with some dummy data so users can see how it works
  //ads table values(id,user_id,category,subcategory,city,country,state,adTitle,descShort,descLong,price,start,end)
        $sql = "
                INSERT INTO $adsTable VALUES
                   (
                    NULL,
                    1,
                    1,
                    3,
                    1,
                    1,
                    1,
                    'Test Ad One',
                    '<p>This is an example of a short description it can be 140 cahracters long (That\'s good tweeting!!)</p>',
                    '<p>This is an example of a long description.  It can be 500 characters long.  This is what you seen when you veiw a full ad.</p>
                    <p>Like the short description it will be creating with the use of a WYSIWYG editor built inot PyroCMS.</p>
                    <p>Ads can sloe have as many pictures as is allowed by the admin in teh backend right now it is set too four.  Pictures are viewed in the full ad veiew with a nice lightbox</p>
                    <p>Ads can be edited by the user you made themby clicking the edit this ad button in the ads full view or by clicking edit on the My Ads page</p><p>More to come as I get more done.  Comments and sugestions too mhalliday82@gmail.com and follow or comtribute to the development @ mikeydangerous.kodingen.com/PyroCMS</p>',
                    1000000.00,
                    NOW(),
                    ADDDATE(NOW(),INTERVAL 30 DAY)
                ),(
                    NULL,
                    1,
                    1,
                    4,
                    1,
                    1,
                    1,
                    'Test Ad Two',
                    '<p>This is an example of a short description it can be 140 cahracters long (That\'s good tweeting!!)</p>',
                    '<p>This is an example of a long description.  It can be 500 characters long.  This is what you seen when you veiw a full ad.</p>
                    <p>Like the short description it will be creating with the use of a WYSIWYG editor built inot PyroCMS.</p>
                    <p>Ads can sloe have as many pictures as is allowed by the admin in teh backend right now it is set too four.  Pictures are viewed in the full ad veiew with a nice lightbox</p>
                    <p>Ads can be edited by the user you made themby clicking the edit this ad button in the ads full view or by clicking edit on the My Ads page</p>
                    <p>More to come as I get more done.  Comments and sugestions too mhalliday82@gmail.com and follow or comtribute to the development @ mikeydangerous.kodingen.com/PyroCMS</p>',
                    1000000.00,
                    NOW(),
                    ADDDATE(NOW(),INTERVAL 30 DAY)
                ),(
                    NULL,
                    1,
                    2,
                    5,
                    1,
                    1,
                    1,
                    'Test Ad Three',
                    '<p>This is an example of a short description it can be 140 cahracters long (That\'s good tweeting!!)</p>',
                    '<p>This is an example of a long description.  It can be 500 characters long.  This is what you seen when you veiw a full ad.</p>
                    <p>Like the short description it will be creating with the use of a WYSIWYG editor built inot PyroCMS.</p>
                    <p>Ads can sloe have as many pictures as is allowed by the admin in teh backend right now it is set too four.  Pictures are viewed in the full ad veiew with a nice lightbox</p>
                    <p>Ads can be edited by the user you made themby clicking the edit this ad button in the ads full view or by clicking edit on the My Ads page</p>
                    <p>More to come as I get more done.  Comments and sugestions too mhalliday82@gmail.com and follow or comtribute to the development @ mikeydangerous.kodingen.com/PyroCMS</p>',
                    1000000.00,
                    NOW(),
                    ADDDATE(NOW(),INTERVAL 30 DAY)
                ),(
                    NULL,
                    1,
                    2,
                    6,
                    1,
                    1,
                    1,
                    'Test Ad Four',
                    '<p>This is an example of a short description it can be 140 cahracters long (That\'s good tweeting!!)</p>',
                    '<p>This is an example of a long description.  It can be 500 characters long.  This is what you seen when you veiw a full ad.</p>
                    <p>Like the short description it will be creating with the use of a WYSIWYG editor built inot PyroCMS.</p>
                    <p>Ads can sloe have as many pictures as is allowed by the admin in teh backend right now it is set too four.  Pictures are viewed in the full ad veiew with a nice lightbox</p>
                    <p>Ads can be edited by the user you made themby clicking the edit this ad button in the ads full view or by clicking edit on the My Ads page</p>
                    <p>More to come as I get more done.  Comments and sugestions too mhalliday82@gmail.com and follow or comtribute to the development @ mikeydangerous.kodingen.com/PyroCMS</p>',
                    1000000.00,
                    NOW(),
                    ADDDATE(NOW(),INTERVAL 30 DAY)
                ),(
                    NULL,
                    1,
                    2,
                    7,
                    1,
                    1,
                    1,
                    'Test Ad Five',
                    '<p>This is an example of a short description it can be 140 cahracters long (That\'s good tweeting!!)</p>',
                    '<p>This is an example of a long description.  It can be 500 characters long.  This is what you seen when you veiw a full ad.</p>
                    <p>Like the short description it will be creating with the use of a WYSIWYG editor built inot PyroCMS.</p>
                    <p>Ads can sloe have as many pictures as is allowed by the admin in teh backend right now it is set too four.  Pictures are viewed in the full ad veiew with a nice lightbox</p>
                    <p>Ads can be edited by the user you made themby clicking the edit this ad button in the ads full view or by clicking edit on the My Ads page</p>
                    <p>More to come as I get more done.  Comments and sugestions too mhalliday82@gmail.com and follow or comtribute to the development @ mikeydangerous.kodingen.com/PyroCMS</p>',
                    1000000.00,
                    NOW(),
                    ADDDATE(NOW(),INTERVAL 30 DAY)
                )
                ";
        $query = $this->db->query($sql);
 //categories table
    $sql = "INSERT  $categoriesTable VALUES
                    (NULL,0,'For Sale','Stuff for sale'),
                    (NULL,0,'Services','Various Services'),
                    (NULL,1,'Widgets','By my widgets'),
                    (NULL,1,'Whoozits','What are Whoozits'),
                    (NULL,2,'Ego Booster','We boost egos'),
                    (NULL,2,'Foot Masseus','Sweet foot rubs here'),
                    (NULL,2,'Whatsitz','You really wany one')
                    ";
        $query = $this->db->query($sql);
 //cities table
        $sql = "INSERT INTO $citiesTable VALUES
                    (NULL,'Vancouver',1,1),
                    (NULL,'Toronto',1,2),
                    (NULL,'New York',2,3),
                    (NULL,'Chicago',2,4)
                ";
        $query = $this->db->query($sql);
 //countries table
        $sql = "INSERT INTO $countriesTable VALUES
                        (NULL,'Canada'),
                        (NULL,'United States')
                    ";
        $query = $this->db->query($sql);
 //states table
        $sql =  "INSERT INTO $statesTable VALUES
                    (NULL,'British Columbia',1),
                    (NULL,'Ontario',1),
                    (NULL,'New York',2),
                    (NULL,'Illinios',2)
                ";
        $query = $this->db->query($sql);
 //images table
        $sql = "INSERT INTO $imagesTable VALUES
                        (NULL,1,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,1,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,1,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,1,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,2,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,2,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,2,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,2,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,3,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,3,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,3,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,3,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,4,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,4,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,4,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,4,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,5,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,5,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,5,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,5,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,6,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,6,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,6,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,6,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,7,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,7,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,7,'http://lorempixel.com/','.png','This is an image caption',640,480),
                        (NULL,7,'http://lorempixel.com/','.png','This is an image caption',640,480)
                    ";
        $query = $this->db->query($sql);
       // $query = $this->db->query($sql);
 //settings table
        $sql = "INSERT INTO $settingsTable VALUES
                        (NULL,'number_of_images',4),
                        (NULL,'title_length',50),                
                        (NULL,'short_desc_length',140),           
                        (NULL,'long_desc_length',500),            
                        (NULL,'ad_durations','10,20,30'),                
                        (NULL,'ad_list','detailed'),                     
                        (NULL,'include_categories','yes'),              
                        (NULL,'include_subcategories','yes'),       
                        (NULL,'include_durations','yes'),           
                        (NULL,'include_locations','yes'),          
                        (NULL,'include_currencies','yes'),          
                        (NULL,'frontend_display','ads'),            
                        (NULL,'allow_unregistered_users','no'),    
                        (NULL,'ads_per_page',10),                
                        (NULL,'email_notifications','both'),         
                        (NULL,'ad_renewals','yes'),                 
                        (NULL,'image_path','klassifieds'),                  
                        (NULL,'thumb_path','thumbs')                  
                    ";
        $query = $this->db->query($sql);

    // you can create folders for your module using $this->site_ref or $this->upload_path (since v1.3.0)
    // Refer to the Constants & Globals docs for more information
        is_dir($this->upload_path.'klassifieds') OR mkdir($this->upload_path.'klassifieds', 0777, TRUE);
        is_dir($this->upload_path.'klassifieds/thumbs') OR mkdir($this->upload_path.'klassifieds/thumbs', 0777, TRUE);
    // It worked!
        return TRUE;
    }
    public function uninstall()
    {
        $adsTable = 'klassAds';
        $categoriesTable = 'klassCategories' ;
        $settingsTable = 'klassSettings' ;
        $imagesTable = 'klassImages' ;
        $countriesTable = 'klassCountries';
        $citiesTable = 'klassCities';
        $statesTable = 'klassStates' ;

        $this->dbforge->drop_table($adsTable);
        $this->dbforge->drop_table($categoriesTable);
        $this->dbforge->drop_table($settingsTable);
        $this->dbforge->drop_table($imagesTable);
        $this->dbforge->drop_table($countriesTable);
        $this->dbforge->drop_table($citiesTable);
        $this->dbforge->drop_table($statesTable);

        return TRUE;
    }
    public function upgrade($old_version)
    {
            // Your Upgrade Logic
            return TRUE;
    }
    public function help()
    {
            // You could include a file and return it here.
            include('help/help.php');
    }
}
/* End of file details.php */