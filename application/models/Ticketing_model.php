<?php 
class Ticketing_model extends CI_Model {
    public function saveLocale($locale){
        $data = array(
            'location'=>$locale,
            'date_c'=>date("Y-m-d h:i:s")
        );
        return $this->db->insert('locale', $data);
    }
    public function checkDuplicates($location){
        $query = $this->db->query('SELECT * FROM locale WHERE location = "'.$location.'"');
        if($query->num_rows() == 1){
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getLocale($limit,$start){
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('locale');
        // echo '<pre>';
        // var_dump($this->db);exit('at database');
        return $query->result();
    }
    public function getRoutesInfo($routeFrom,$routeTo){
        $query = $this->db->get_where('routes', array('route_from' => $routeFrom,'route_to'=>$routeTo));
        $num = $query->num_rows();
        if($num == 0){
            return $num;
        }
        else
        {
            return $query->result();
        }
    }
    public function checkDuplicatesRoutes($vid,$route_from,$route_to){
        $query = $this->db->get_where('routes', array('route_from' => $route_from,'route_to'=>$route_to,'vid'=>$vid));
        $num = $query->num_rows();
        if($num == 0){
            return false;
        }
        else
        {
            return true;
        }
    }
    public function saveRoute(
        $route_from,
        $route_to,
        $route_cost,
        $departure,
        $eta,
        $comments,
        $vid){
        $data = array(
            "route_from"=>$route_from,
            "route_to"=>$route_to,
            "routecost"=>$route_cost,
            "departure"=>$departure,
            "eta"=>$eta,
            "comments"=>$comments,
            "vid"=>$vid,
            'status'=>1,
            'date_c'=>date("Y-m-d h:i:s")
        );
        return $this->db->insert('routes', $data);
    }
    public function getAllRoutes(){
        $query = $this->db->get('routes');
        $num = $query->num_rows();
        if($num == 0){
            return $num;
        }
        else
        {
            return $query->result();
        }
    }

    public function saveDriver($driver_fname,$driver_lname,$driver_age,$driver_id_no,$driver_license){
        $data = array(
            "first_name"=>$driver_fname,
            "last_name"=>$driver_lname,
            "age"=>$driver_age,
            "id_no"=>$driver_id_no,
            "license_no"=>$driver_license,
            'date_c'=>date("Y-m-d h:i:s")
        );
        $this->db->insert('drivers', $data);
        return $this->db->insert_id();
    }
    public function saveVehichle($reg_no,$seats_vip,$seats_normal,$driver_id){
        $data = array(
            "reg_no"=>$reg_no,
            "normal_seats"=>$seats_normal,
            "vip_seats"=>$seats_vip,
            'date_c'=>date("Y-m-d h:i:s")
        );
        return $this->db->insert('vehichles', $data);
    }
    public function createSeats($vid){
        if($vid >=1)
        {
            while($vid >= 1){
                
            }
        }
    }
    public function isVehichleUnique($reg_no){
        $query = $this->db->get_where('vehichles', array('reg_no' => $reg_no));
        $num = $query->num_rows();
        if($num == 0){
            return false;
        }
        else
        {
            return true;
        }
    }
    public function isDriverUnique($driver_id_no){
        $query = $this->db->get_where('drivers', array('id_no' => $driver_id_no));
        $num = $query->num_rows();
        if($num == 0){
            return false;
        }
        else
        {
            return true;
        }
    }
}