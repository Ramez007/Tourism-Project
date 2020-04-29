<?php
require_once("app/view/view.php");

class PackageView extends View
{

    public function output()
    {
        $PackageName = $this->model->getPackageViewName();
        $PackageOverview = $this->model->getPackageViewOverview();
        $PackageID = $this->model->getPackageIDs();


        for($i = 0; $i < count($PackageName); $i++)
        {
            echo 
            '
            <div class="col-md-4">
            <div class="hotel-content">
                <div class="hotel-grid" style="background-image: url(images/abu-simble.jpg);">
                    <div class="price"><small>For as low as</small><span>100$/night</span></div>
                    <a class="book-now text-center" href="Single-Package.php?action='.$PackageID[$i].'"><i class="ti-calendar"></i> Book Now</a>
                </div>
                <div class="desc">
                    <h3><a href="Single-Package.php?action='.$PackageID[$i].'">'.$PackageName[$i].'</a></h3>
                    <p>'.$PackageOverview[$i].'</p>
                </div>
            </div>
        </div>
            ';
        }
    }
    public function PackageHeader()
    {
        echo ''.$this->model->getPackageName().'';
    }

    public function DetailsOutput()
    {
        echo 
        '
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4> '.$this->model->getDescription().' </h4>
                
            </div>
            <div class="services"style="top: 12px;">
                <span style="margin-bottom:20px;top: 39px;"><img id="News" src="images\sun.png" width="50" height="50"style="margin-bottom:20px"></span>
                    <div class="desc"> Number of days:'.$this->model->getNumberOfDays().'</div>
                </div>
                <div class="services">
                <span style="margin-bottom:20px;top: 5px;"><img id="News" src="images\moon.png" width="50" height="50"style="margin-bottom:40px"></span>
                    <div class="desc"style=""> Number of nights:'.$this->model->getNumberOfNights().'</div>
                </div>
                <div class="services">
                <span><img id="News" src="images\dollar.png" width="50" height="50"style="margin-bottom:40px"></span>
                    <div class="desc"style="padding-top: 45px;"> Basic cost:'.$this->model->getPrice().'</div>
                </div>
        </div>
    </div>
        ';
    }
    public function CruiseServicesOutput()
    {
        $services = $this->model->GetCruiseServices();
        if($services == false)
        {
            echo '';
        }
        else
        {
        echo '<h3 class="heading">Cruise includes</h3>';
        if($services[0] == "TRUE")
        {
            echo 
            '
            <div class="services">
            <span><i class="ti-medall"></i></span>
            <div class="desc">Pets</div>
        </div>
            ';
        }
        if($services[1] == "TRUE")
        {
            echo 
            '
            <div class="services">
            <span><i class="ti-bag"></i></span>
            <div class="desc">Fishing</div>
        </div>
            ';
        }
        if($services[2] == "TRUE")
        {
            echo 
            '
            <div class="services">
            <span><i class="ti-shine"></i></span>
            <div class="desc" >Sunbathing</div>
        </div>
            ';
        }
        if($services[3] == "TRUE")
        {
            echo 
            '
            <div class="services">
            <span><i class="flaticon-swimming icon"></i></span>
            <div class="desc">Pool</div>
        </div>
            ';
        }

        
        }
    }
    public function HotelHyperlink()
    {
        echo 
        '
        <a href="single-hotel.php?action='.$this->model->GetHotelName().'" style="color:orangered"><b>hotel/cruise details here</b></a>
        ';
    }
}

?>