<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticketing extends CI_Controller {
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
        $this->load->model('Ticketing_model');
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
}