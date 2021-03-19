<?php
function checkArrayForHouse($value,$tent=array()){

}
function chekActive($data){
    if($data==1)
    {
        return '<span class="badge badge-success">Active</span>';
    }
    else
    {
        return '<span class="badge badge-danger">Inactive</span>';
    }
}
?>