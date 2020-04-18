<?php
require_once("app/view/view.php");

class PackageView extends View
{
    private $PackageName;
    private $PackageOverview;


    public function output()
    {
        $this->PackageName = $this->model->getPackageViewName();
        $this->PackageOverview = $this->model->getPackageViewOverview();


        for($i = 0; $i < count($this->PackageName); $i++)
        {
            echo 
            '
            <div class="col-md-4">
            <div class="hotel-content">
                <div class="hotel-grid" style="background-image: url(images/abu-simble.jpg);">
                    <div class="price"><small>For as low as</small><span>100$/night</span></div>
                    <a class="book-now text-center" href="Single-Package.php"><i class="ti-calendar"></i> Book Now</a>
                </div>
                <div class="desc">
                    <h3><a href="Single-Package.php">'.$this->PackageName[$i].'</a></h3>
                    <p>'.$this->PackageOverview[$i].'</p>
                </div>
            </div>
        </div>
            ';
        }
    }
}

?>