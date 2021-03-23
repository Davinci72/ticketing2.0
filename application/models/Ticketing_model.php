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
            //get vehichle and driver and date info
            $r = $query->result();
            $vehichle = $this->getVehichle($r[0]->vid);
            if($vehichle == 0 )
            {
                $vehichle = array(
                    "error_code"=>501,
                    "description"=>"This route has not been assigned a vehichle"
                );
            }
            
                //get driver info
            $driver = $this->getDriverInfo($r[0]->vid);
            if($driver == 0 )
            {
                $driver = array(
                    "error_code"=>502,
                    "description"=>"This Vehichle has not been assigned a driver"
                );
            }
            $availableSeats = $this->getAvailableSeats($r[0]->vid);
            if($availableSeats == 0 )
            {
                $availableSeats = array(
                    "error_code"=>503,
                    "description"=>"This Vehichle Is Fully Booked, Try a different date"
                );
            }
            return $routeInfo = array("route_info"=>$r,"vehichle_info"=>$vehichle,"available_seats"=>$availableSeats,"driver_info"=>$driver);
            // var_dump($r);
            // exit();
        }
    }
    public function getAvailableSeats($vid){
        $query = $this->db->get_where('vehichle_seating', array('vid' => $vid,'booked'=>0));
        $num = $query->num_rows();
        if($num == 0){
            return $num;
        }
        else
        {
            //get vehichle and driver and date info
             $r = $query->result();
             return $f = array(
                "available_seats"=>$r,"total"=>$num
             );
        }
    }
    public function getVehichle($vid){
        $query = $this->db->get_where('vehichles', array('id' => $vid));
        $num = $query->num_rows();
        if($num == 0){
            return $num;
        }
        else
        {
            //get vehichle and driver and date info
            return $r = $query->result();
        }
    }
    public function getDriverInfo($vid){
        $query = $this->db->get_where('drivers', array('vid' => $vid));
        $num = $query->num_rows();
        if($num == 0){
            return $num;
        }
        else
        {
            //get vehichle and driver and date info
            return $r = $query->result();
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
    public function saveVehichle($reg_no,$seats_vip,$seats_normal_price,$seats_vip_price,$seats_normal,$driver_id){
        $data = array(
            "reg_no"=>$reg_no,
            "normal_seats"=>$seats_normal,
            "vip_seats"=>$seats_vip,
            'date_c'=>date("Y-m-d h:i:s")
        );
        $vid = $this->db->insert('vehichles', $data);
        $this->createSeats($seats_vip,1,$vid,$seats_vip_price);
        $this->createSeats($seats_normal,2,$vid,$seats_normal_price);
        return $vid;
    }
    public function createSeats($seats,$seat_type,$vid,$price){
        if($seats >=1)
        {
            while($seats > 0 ){
                $data = array(
                    'vid'=>$vid,
                    'seat_no'=>$seats,
                    'seat_type'=>$seat_type,
                    'seat_price'=>$price,
                    'booked'=>0,
                    'date_c'=>date("Y-m-d h:i:s")
                );
                $this->db->insert('vehichle_seating', $data);
                $seats --;
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