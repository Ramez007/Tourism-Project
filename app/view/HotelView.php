<?php
require_once("app/view/view.php");
?>

<?php

class HotelView extends View
{
    private $name;
    private $overview;

    public function output()
    {
        $this->name=$this->model->getViewNames();
        $this->overview=$this->model->getViewOverview();

        for ($i=0;$i<count($this->name);$i++)
        {
            echo '<div class="col-md-4">
                    <div class="hotel-content">
                        <div class="hotel-grid" style="background-image: url(images/image-1.jpg);">
                            <div class="price"><small>For as low as</small><span>$100/night</span></div>
                            <a class="book-now text-center" href="single-hotel.php"><i class="ti-calendar"></i> Book Now</a>
                        </div>
                        <div class="desc">
                            <h3><a href="single-hotel.php">'.$this->name[$i].'</a></h3>
                            <p>'.$this->overview[$i].'</p>
                        </div>
                    </div>
                </div>';
        }
    }

}

?>