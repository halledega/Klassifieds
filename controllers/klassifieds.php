<?php
class Klassifieds extends Public_Controller {

    private  $klassifiedsettings;

    public function __construct() {
        parent::__construct();
        $this->load->model('ads_model');
        $this->load->library('table');
        $this->load->model('category_m');
        $this->load->model('settings_model');

                $this->template
                ->append_css('module::Klassy.css')
                ->append_css('module::Klassy_full.css')
                ->append_css('module::Klassy_form.css')
                ->append_css('module::Klassy_main.css')
                ->append_css('module::Klassy_menu.css');

        $this->klassifiedsettings = $this->settings_model->getSettings();
    }


    function index() {
        $data['title'] = 'Klassyphides - Powered by Codeignitor';
        $data['ads'] = $this->ads_model->getAds(); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
        $data['cat_query'] = $this->category_m->getCategories();
        $data['klassifiedsettings'] = $this->klassifiedsettings;
        $data['main_content'] = 'frontend/ads_view';

        $this->template ->build('index',$data);
    }

    function fullAd() {

        $ad = $this->uri->segment(3);
        $data['title'] = 'Klassyphides - Powered by Codeignitor';

        $data['ads'] = $this->ads_model->getAds(array('id'=>$ad)); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
        $data['cat_query'] = $this->category_m->getCategories();

        $data['main_content'] = 'frontend/full_ad_view';
        $this->template ->build('index',$data);
    }

    function adFilter() {
        $data['cat_query'] = $this->category_m->getCategories();

        $filter = $this->uri->segment(3);
        $filter_id = $this->uri->segment(4);

        $filter2 = $this->uri->segment(5);
        $filter2_id = $this->uri->segment(6);

        switch ($filter) {
            case "category":
                $data['ads'] = $this->ads_model->getAds(array('category'=>$filter_id)); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
            break;
            case "subcategory":
                $data['ads'] = $this->ads_model->getAds(array('category'=>$filter2_id,'subcategory'=>$filter_id)); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
            break;
            case "country":
                 echo "<p>".$filter." - ".$filter_id."</p>";
            break;
            case "state":
                 echo "<p>".$filter." - ".$filter_id."</p>";
            break;
            case "city":
                 echo "<p>".$filter." - ".$filter_id."</p>";
            break;
            case "date":
                 echo "<p>".$filter." - ".$filter_id."</p>";
            break;
            default:
            break;
        }

        $data['main_content'] = 'frontend/ads_view';
        $this->template ->build('index',$data);
    }

    function categories() {
        $data['cat_query'] = $this->category_m->getCategories();
        $data['main_content'] = 'frontend/categories_view';
        $this->template ->build('index',$data);
    }

    function myads() {
        $user = $this->user->id;

        $data['ads'] = $this->ads_model->getAds(array('user_id'=>$user)); //method parameters = array(id,category,subcategory,user),limit,offset leave blank for all ads
        $data['cat_query'] = $this->category_m->getCategories();

        $data['main_content'] = 'frontend/user_ads_view';
        $this->template ->build('index',$data);
    }

    function postad() {
        $data['cat_query'] = $this->category_model->getCategories();

        $data['main_content'] = 'frontend/post_ad_view';
        $this->template ->build('index',$data);
    }

}
