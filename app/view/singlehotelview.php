<?php
require_once("app/view/view.php");
?>

<?php

class singlehotelview extends View
{

    private $services;


    public function output()
    {
        echo '<h1 class="text-center">'.$this->model->getHotelname().'</h1>';
       
    }

    public function outputdesc()
    {
        echo '<p>'.$this->model->getHoteldescription().'</p>';
    }

    public function outputservices()
    {   
        $services=$this->model->getHotelservices();

        if ($services[0]=="TRUE")
        {
            echo '<div class="services">
                    <span><i class="ti-rss-alt"></i></span>
                    <div class="desc"> Wifi</div>
                </div>';
        }
        if($services[1]=="TRUE")
        {
            echo '<div class="services">
                    <span><i class="flaticon-swimming icon"></i></span>
                    <div class="desc"> Swimming Pool</div>
                </div>';
        }
        if($services[2]=="TRUE")
        {
            echo '<div class="services">
                    <span><i class="flaticon-bicycle icon"></i></span>
                    <div class="desc"> Gym</div>
                </div>';
        }
        if($services[3]=="TRUE")
        {
            echo '<div class="services">
                    <span><i class="flaticon-massage icon"></i></span>
                    <div class="desc"> Spa</div>
                </div>';
        }
        if($services[4]=="TRUE")
        {
            echo '<div class="services">
                    <span><i class="flaticon-cup icon"></i></span>
                    <div class="desc"> Bar</div>
                </div>';
        }
        if($services[5]=="TRUE")
        {
            echo '<div class="services">
                    <span><i class="flaticon-restaurant icon"></i></span>
                    <div class="desc"> Resturant</div>
                </div>';
        }
    }


}

?>