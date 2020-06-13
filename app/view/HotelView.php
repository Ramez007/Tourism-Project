<?php
require_once("app/view/view.php");
?>

<?php

class HotelView extends View
{
    private $name;
    private $overview;
    private $mainimgs;

    public function output()
    {
        $this->name=$this->model->getViewNames();
        $this->overview=$this->model->getViewOverview();
        $this->price=$this->model->getPrice();
        $this->mainimgs=$this->model->getprimaryimgs();
    
        for ($i=0;$i<count($this->name);$i++)
        {
            echo '<div class="col-md-4">
                    <div class="hotel-content">
                        <div class="hotel-grid" style="background-image: url('.$this->mainimgs[$i].');">
                            <div class="price"><small>For as low as</small><span style="font-size:18px;">'.$this->price[$i].' EGP/night</span></div>
                            <a class="book-now text-center" href="single-hotel.php?action='.$this->name[$i].'"><i class="ti-calendar"></i> Book Now</a>
                        </div>
                        <div class="desc">
                            <h3><a href="single-hotel.php?action='.$this->name[$i].'">'.$this->name[$i].'</a></h3>
                            <p  style="word-wrap: break-word;">'.$this->overview[$i].'</p>
                        </div>
                    </div>
                </div>';
        }
    }

    public function headerhotellist()
    {
        $this->name=$this->model->getViewNames();
        

        for ($i=0;$i<count($this->name);$i++)
        {
            echo '<li><a href="single-hotel.php?action='.$this->name[$i].'">'.$this->name[$i].'</a></li>';
        }
    }

}

?>