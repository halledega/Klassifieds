<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * The classifieds module enables users of the site to post classifieds ads in various categories as set up in the PyroCMS backend
 * @author 	Michael Halliday
 * @package 	PyroCMS
 * @subpackage 	Classifieds Module
 * @category 	Modules
 * @license 	To be determined
 */
class Admin extends Admin_Controller {
    /**
    * Validation rules for modifying settings
    *
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
    *
    *CI validation rules        - required | matches[form_item] | is_unique[table.field] | min_length[6] | max_length[12] | exact_length[8]
    *                           - greater_than[8] | less_than[8] | alpha | alpha_numeric | alpha_dash | numeric |
    *                           - integer | decimal | is_natural | is_natural_no_zero | valid_email | valid_emails | valid_ip | valid_base64
    *- xss_clean | prep_for_form | prep_url | strip_image_tags | encode_php_tags
    *
    * @var array
    * @access private
    */
       private $validation_rules = array(
        'setting_modify_rules' => array(
            array(
                'field' => 'image_path',
                'label' => 'Path to Images',
                'rules' => 'required|alpha_dash',
            ),
            array(
                'field' => 'ad_durations',
                'label' => 'Ad Durations',
                'rules' => 'required',
            ),
            array(
                'field' => 'number_of_images',
                'label' => 'Number of Images',
                'rules' => 'required|numeric',
            ),
            array (
                'field' => 'ads_per_page',
                'label' => 'Ads per Page',
                'rules' => 'required|numeric'
            )
        ),
        'create_ad' => array(
            array(
                'field' => 'adTitle',
                'label' => 'Ad Title',
                'rules' => 'required|max_length[50]'
            ),
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required'
            ),
            array(
                'field' => 'subcategory',
                'label' => 'Subcategory',
                'rules' => 'required'
            ),
            array(
                'field' => 'adDuration',
                'label' => 'Ad Druation',
                'rules' => 'required'
            ),
            array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'required'
            ),
            array(
                'field' => 'state',
                'label' => 'State/Province',
                'rules' => 'required'
            ),
            array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required'
            ),
            array(
                'field' => 'shortDesc',
                'label' => 'Short Description',
                'rules' => 'max_length[140]'
            ),
            array(
                'field' => 'longDesc',
                'label' => 'Long Description',
                'rules' => 'max_length[500]'
            )
        )
    );
/**
 *
 *
 */
    public function __construct() {
        parent::__construct();

    //load required classes
        $this->load->model('ads_model');
        $this->load->model('category_m');
        $this->load->model('settings_model');

        $this->load->library('form_validation');

        //$this->config->load('files');
        //$this->load->library('files/files');

        $this->lang->load('klass');

        $this->klassifiedsettings = $this->settings_model->getSettings();

        $this->template
                //->append_css('module::Klassy_full.css')
                ->append_css('module::Klassy_main.css')
                ->append_js('module::categories.js');


    //Set the partials and metadata here since they're used everywhere
        $this->template->set_partial('shortcuts', 'admin/partials/shortcuts');
    }
/**
 *
 *
 */
    function index() {
        $data['ads'] = $this->ads_model->getAds(); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
        $data['cat_query'] = $this->category_m->getCategories();

        $this->template->active_section = 'ads';
        $this->template ->build('admin/ads_view',$data);
    }

/**
*
*
*
**/
    function CreateAd($action = NULL) {
        if(isset($_POST['save'])) {
            $action = $_POST['save'];
        }
        if(isset($_POST['delete'])) {
            $action = $_POST['delete'];
        }
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $data['ksett'] = $this->klassifiedsettings;
        $data['categories'] = $this->category_m->DDcategories(array('parent_id '=>0));
        $data['subcategories'] = $this->category_m->DDcategories(array('parent_id !='=>0));
    //if the action for this method is NULL then the ad is new so validtae the form and what not
        switch ($action):
            case "save":
                redirect(BASE_URL.'index.php/admin/klassifieds');
            break;

            case "delete":
                $this->ads_model->deleteAd($id);
                $this->template->active_section = 'ads';
                $this->template ->build('admin/ads_view',$data);
            break;

            case NULL:
            //if form has been submitted validate the form and other such things...
                if(isset($_POST["submitted"])) {
                // Set the validation rules
                    $this->form_validation->set_rules($this->validation_rules['create_ad']);
                //if validation passes get the post values if not send error
                    if ($this->form_validation->run()  == TRUE) {
                        $duration = $this->input->post("adDuration");
                        $data['new_ad'] = array(
                                        "user_id" => $this->input->post("user_id"),
                                        "category" => $this->input->post("category"),
                                        "subcategory" => $this->input->post("subcategory"),
                                        "city" => $this->input->post("city"),
                                        "country" => $this->input->post("country"),
                                        "state" => $this->input->post("state"),
                                        "adTitle" => $this->input->post("adTitle"),
                                        "descShort" => $this->input->post("descShort"),
                                        "descLong" => $this->input->post("descLong"),
                                        "price" => $this->input->post("price"),
                                        "duration" => $duration
                                    );
                    //insert new ad into database
                        $this->ads_model->NewAd($data['new_ad']);
                    //get new ad from db to preview
                        $query = $this->db->query("SELECT ID FROM ".$this->db->dbprefix('klassads')." ORDER BY ID DESC LIMIT 1");
                        $new_ad = $query->row();

                        $data['ads'] = $this->ads_model->getAds(array('id'=>$new_ad->ID)); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
                        $data['cat_query'] = $this->category_m->getCategories();
                        $this->template->active_section = 'ads';
                        $this->template ->build('admin/previewad_view',$data);
                    }
                //go back to form view if there are errors
                    else {
                        $this->template->active_section = 'ads';
                        $this->template ->build('admin/createad_view',$data);
                    }
                }
            //form has not been submitted
                else {
                    $this->template->active_section = 'ads';
                    $this->template ->build('admin/createad_view',$data);
                }
            break;
        endswitch;
    }
/**
 *
 *
 */
    function Categories() {
        $data['cat_query'] = $this->category_m->getCategories();
        $data['categories_list'] = $this->category_m->DDcategories(array('parent_id '=>0));
        $data['id'] = $this->uri->segment(4);
        if(!empty($data['id'])) {
            $data['selected_cat'] = $this->category_m->getCategories($data['id']);
        }
        $this->template->active_section = 'categories';
        $this->template ->build('admin/categories_view',$data);
    }
/**
 *
 *
 */
    function CreateCategory() {
    //delete category if delete button clicked
        if(isset($_POST['delete'])) {
            $id = $this->input->post("id");
            $this->category_m->deleteCategory($id);
        }
        else {
        //if an id has been posted update the category otherwise it's a new one so add it
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $data['category'] = array(
                    "id" => $this->input->post("id"),
                    "parent_id" => $this->input->post("parent_id"),
                    "name" => $this->input->post("name"),
                    "desc" => $this->input->post("desc")
                );
            //update category
                if($this->category_m->updateCategory($data['category'])) {
                    redirect('admin/klassifieds/categories/'.$id);
                }
            }
            else {
                $data['category'] = array(
                    "parent_id" => $this->input->post("parent_id"),
                    "name" => $this->input->post("name"),
                    "description" => $this->input->post("description")
                );
            //build a new category
                if($this->category_m->createCategory($data['category'])) {
                    echo 'fart';
                    //redirect('admin/klassifieds/categories');
                }
            }
        }
    }
/**
 *
 *
 */
    function Settings() {
        $data['klassifiedsettings'] = $this->klassifiedsettings;
        $this->template->active_section = 'settings';
        $this->template->build('admin/settings_view',$data);

    }
/**
 *
 *
 */
    function updateSettings() {
    // Set the validation rules
        $this->form_validation->set_rules($this->validation_rules['setting_modify_rules']);
        if ($this->form_validation->run()  == TRUE)
        {
            $ns = array(
                    1=>$this->input->post('number_of_images'),
                    2=>$this->input->post('title_length'),
                    3=>$this->input->post('short_desc_length'),
                    4=>$this->input->post('long_desc_length'),
                    5=>$this->input->post('ad_durations'),
                    6=>$this->input->post('ad_list'),
                    7=>$this->input->post('include_categories'),
                    8=>$this->input->post('include_subcategories'),
                    9=>$this->input->post('include_durations'),
                    10=>$this->input->post('include_locations'),
                    11=>$this->input->post('include_currencies'),
                    12=>$this->input->post('frontend_display'),
                    13=>$this->input->post('allow_unregistered_users'),
                    14=>$this->input->post('ads_per_page'),
                    15=>$this->input->post('email_notifications'),
                    16=>$this->input->post('ad_renewals'),
                    17=>$this->input->post('image_path'),
                    18=>$this->input->post('thumb_path')
                );

            if($this->settings_model->updateSettings($ns)) {
                redirect('admin/klassifieds/settings');
            }
        }
        else {
            $data['klassifiedsettings'] = $this->klassifiedsettings;
            $this->template->active_section = 'settings';
            $this->template->build('admin/settings_view',$data);
        }
    }

/**
 *
 *
 */
    function uploadFile() {
      $this->template->active_section = 'ads';
      $this->template->build('admin/uploadform');
    }

/**
 *
 *
 */
    function doUpload(){
      $file_path = realpath(BASEPATH.'../../'.ADDONPATH.'modules/Klassifieds/imgs/');

      $config = array(
                  'allowed_types' => 'jpg|jpeg|gif|png',
                  //'upload_path'   => UPLOAD_PATH.'klassifieds/'
                  'upload_path'   => $file_path
                );
      $this->load->library('upload',$config);

      if($this->upload->do_upload('file')) {

        $file_data = $this->upload->data();
        echo "<pre>";
          print_r($file_data);
        echo "</pre>";

        $config = array(
                    'source_image'    => $file_data['full_path'],
                    'new_image'       => $file_data['file_path'].'thumbs/',
                    //'new_image'       => $file_path.'/thumbs/',
                    'maintain_ratio'  => TRUE,
                    'width'           => 50,
                    'height'          => 50
                  );

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();

      }
      else {
        $this->upload->display_errors();
      }

    }




/**
    function doUpload() {

      $file = $_FILES['file'];

      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

      $size = strlen( $chars );
      for( $i = 0; $i < 5; $i++ ) {
        $name .= $chars[ rand( 0, $size - 1 ) ];
      }

      echo $name;

      //we need to the the if for the Klassifieds folder -> this so far is really dumb
        $sql = "SELECT id FROM default_file_folders WHERE name = 'Klassifieds' LIMIT 1";
        $query = $this->db->query($sql);

        $folder_id = $query->result_array();
      //upload files also suposed to rename the fucking thing
        $upload = FILES::upload($folder_id[0]['id'],$name,'file',640,480,TRUE);

        //createThumb($file['name']);


    }

    function createThumb($file) {
      $config['image_library'] = 'gd2';
      $config['source_image'] = UPLOAD_PATH . 'files/'.$file;
      $config['create_thumb'] = TRUE;
      $config['maintain_ratio'] = TRUE;
      $config['width'] = 75;
      $config['height'] = 50;

      $this->load->library('image_lib');
      $this->image_lib->initialize($config);

      $this->image_lib->resize();
    }

    function rand_string( $length ) {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

      $size = strlen( $chars );
      for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
      }

      return $str;
    }
 **/
}