<?php
require_once("app/view/view.php");
?>

<?php

class singlehotelview extends View
{

    private $services;
    private $reviews;


    public function output()
    {
        $stars=$this->model->getStars();
        echo '<h1 class="text-center">'.$this->model->getHotelname().'</h1>';
        echo "<br><h3 class='text-center'";

        for ($i=0;$i<=$stars;$i++)
        {
           echo " <span class='fa fa-star stars'></span>";
        }
        for($i=$stars;$i<5;$i++)
        {
            echo " <span class='fa fa-star'></span>";
        }
        echo "</h3>";



        // <h3 class="text-center">

        // <span class="fa fa-star test"></span>
        // <span class="fa fa-star test"></span>
        // <span class="fa fa-star test"></span>
        // <span class="fa fa-star test"></span>
        // <span class="fa fa-star test"></span>
        // </h3>
    }

    public function outputdesc()
    {
        echo '<p>'.$this->model->getHoteldescription().'</p>';
    }

    public function outputreviews()
    {
        $this->reviews=$this->model->getReviewsofhotel();
        // echo $this->model->reviews[0];
        echo "<ul>";
        for($i=0;$i<count($this->reviews);$i++){
            echo "<li>".$this->reviews[$i]."</li>";
            
        }
        echo "</ul>";
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