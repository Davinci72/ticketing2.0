<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticketing extends CI_Controller {
    var $gError= array();
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ticketing_model');
        $this->load->model('Server');
    }
    public function createLocation()
    {
        $this->load->model('Ticketing_model');
        $string = file_get_contents('php://input');
        $arr = $this->returnArr($string);
        if(! empty($arr['location']))
        {
            if ($this->Ticketing_model->checkDuplicates($arr['location']) == true)
            {
                 $err = array(
                    "Error"=>"401",
                    "description"=>"Location Name Already Exists"
                );
                $this->contentOut($err);
            }
            else
            {
                /* save to database */
                $this->Ticketing_model->saveLocale($arr['location']);
                $err = array(
                    "Success"=>"200",
                    "description"=>"Location Name Saved"
                );
                $this->contentOut($err);
            }
        }
        else
        {
            $err = array(
                "Error"=>"200",
                "description"=>"empty string value location"
            );
            $this->contentOut($err);
        }
    }

    public function createRoute()
    {
        $string = file_get_contents('php://input');
        $arr = $this->returnArr($string);
        if  (
                ! empty($arr['route_from']) && 
                ! empty($arr['route_to']) && 
                ! empty($arr['route_cost']) && 
                ! empty($arr['departure']) && 
                ! empty($arr['eta']) && 
                ! empty($arr['comments']) && 
                ! empty($arr['vid']) 
            )

        {
            if ($this->Ticketing_model->checkDuplicatesRoutes($arr['vid'],$arr['route_from'],$arr['route_to']) == true)
            {
                 $err = array(
                    "Error"=>"401",
                    "description"=>"Route with vehichle :".$arr['vid'].', Already Exists'
                );
                $this->contentOut($err);
            }
            else
            {
                /* save to database */
                $this->Ticketing_model->saveRoute(
                    $arr['route_from'],
                    $arr['route_to'],
                    $arr['route_cost'],
                    $arr['departure'],
                    $arr['eta'],
                    $arr['comments'],
                    $arr['vid']);
                $err = array(
                    "Success"=>"200",
                    "description"=>"Route Plan Saved Successfully"
                );
                $this->contentOut($err);
            }
        }
        else
        {
            $err = array(
                "Error"=>"200",
                "description"=>"Ensure all fields have values"
            );
            $this->contentOut($err);
        }
    }


    public function returnArr($string)
    {
        return json_decode($string,true);
    }
    public function getLocale($limit,$start){
        $res = $this->Ticketing_model->getLocale($limit,$start);
        $this->contentOut($res);
    }
    public function getRouteInfo($routeFrom,$routeTo){
        $res = $this->Ticketing_model->getRoutesInfo($routeFrom,$routeTo);
        if(($res == 0)){
            $err = array(
                'Error'=>'402',
                'desc'=>'Empty Result'
            );
            $this->contentOut($err);
        }
        else
        { $this->contentOut($res); }
    }
    public function getLocaleByID($lid){
        $res = $this->Ticketing_model->getlocaleById($lid);
        if(($res == 0)){
            $err = array(
                'Error'=>'402',
                'desc'=>'Empty Result'
            );
            $this->contentOut($err);
        }
        else
        { $this->contentOut($res); }
    }
    public function contentOut($res){
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($res));
    }
    public function getAllRoutes(){
        $res = $this->Ticketing_model->getAllRoutes();
        if(($res == 0)){
            $err = array(
                'Error'=>'402',
                'desc'=>'Empty Result'
            );
            $this->contentOut($err);
        }
        else
        { $this->contentOut($res); }
    }
    public function addVehichle(){
        $string = file_get_contents('php://input');
        $arr = $this->returnArr($string);
        // var_dump($arr['seats'][0]['vip'][0]['price']);

        // exit();
        $reg_no = $arr['reg_no'];
        $seats_vip = $arr['seats'][0]['vip'][0]['seats'];
        $seats_vip_price = $arr['seats'][0]['vip'][0]['price'];
        $seats_normal = $arr['seats'][0]['normal'][0]['seats'];
        $seats_normal_price = $arr['seats'][0]['normal'][0]['price'];
        $driver_fname = $arr['driver'][0]['first_name'];
        $driver_lname = $arr['driver'][0]['last_name'];
        $driver_age = $arr['driver'][0]['age'];
        $driver_id_no = $arr['driver'][0]['id_no'];
        $driver_license = $arr['driver'][0]['license_no'];
        $this->getError($reg_no,'402','Field Registration Number is empty');
        $this->getError($seats_vip,'402','Field For VIP Seats is empty');
        $this->getError($seats_vip_price,'402','Field For VIP Seats price is empty');
        $this->getError($seats_normal,'402','Field Normal Seats is empty');
        $this->getError($seats_normal_price,'402','Field For normal Seats price is empty');
        $this->getError($driver_fname,'402','Field driver first name is empty');
        $this->getError($driver_lname,'402','Field driver last name is empty');
        $this->getError($driver_age,'402','Field driver Age is empty');
        $this->getError($driver_license,'402','Field driver license is empty');
        if(empty($this->gError))
        {
            if($this->Ticketing_model->isVehichleUnique($reg_no) == false)
            {
                if($this->Ticketing_model->isDriverUnique($driver_id_no) == false)
                {
                    $driver_id = $this->Ticketing_model->saveDriver($driver_fname,$driver_lname,$driver_age,$driver_id_no,$driver_license);
                    $this->Ticketing_model->saveVehichle($reg_no,$seats_vip,$seats_normal_price,$seats_vip_price,$seats_normal,$driver_id);
                    $success = array(
                        'success'=>200,
                        'desc'=>"Vehichle and driver successfully added"
                    );
                    $this->contentOut($success);
                }
                else
                {
                    $error = array(
                        'Error'=>403,
                        'desc'=>"Driver Already Exists"
                    );
                    $this->contentOut($error);
                }
                
            }
            else
            {
                $error = array(
                    'Error'=>403,
                    'desc'=>"Vehichle Already Exists"
                );
                $this->contentOut($error);
            }
            
        }
        else
        {
            $this->contentOut($this->gError);
        }
        
    }
    public function getError($field,$error_code,$error_desc){
        $error = array();
        if(empty($field)){
            $error[$error_code] =$error_desc;
            $this->gError = [$error];
        }
    }
    public function objCreator(){
        $user = array(
            "username"=>"davinci",
            "password"=>"password"
        );
        $access = array(
            "level"=>"admini"
        );
        $c = array($user,$access);
        $this->contentOut($c);
    }
    public function bookNcr(){
        $route = $this->input->post('route');
        switch($route)
        {
            case 'syokimau':
                $routeSyokimau = $this->input->post('route_za_syoki');
                if($routeSyokimau==1)
                {
                    //nairobi to syokimau departure time
                    $n_2_s_t = $this->input->post('n-2-s-t');
                }
                if($routeSyokimau==2)
                {
                    //syokimau to nairobi departure time
                    echo 'Departure Time Is '.$s_2_n_t = $this->input->post('r-t-z-s-2-n');
                }
            break;
            case 'embakasi':
                $routeEmbakasi = $this->input->post('route_za_emba');
                if($routeEmbakasi==1)
                {
                    //nairobi to embakasi departure time
                    $r_t_z_n_2_e = $this->input->post('r-t-z-n-2-e');
                }
                if($routeEmbakasi==2)
                {
                    //embakasi to nairobi departure time
                    $r_t_z_e_2_n = $this->input->post('r-t-z-e-2-n');
                }
            break;

        }
        
        //embakasi to nairobi departure time
        $r_t_z_e_2_n = $this->input->post('r-t-z-e-2-n');
    }
    
}