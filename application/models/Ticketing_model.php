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
    public function saveRoute($route_from,$route_to,$route_cost,$vid){
        $data = array(
            "route_from"=>$route_from,
            "route_to"=>$route_to,
            "routecost"=>$route_cost,
            "vid"=>$vid,
            'status'=>1,
            'date_c'=>date("Y-m-d h:i:s")
        );
        return $this->db->insert('routes', $data);
    }
}