<?php
require_once("app/view/view.php");
?>

<?php

class MainpageView extends View
{
    private $name;
    private $overview;

    public function output()
    {
        $this->name=$this->model->getName();
        for ($i=0;$i<count($this->name);$i++)
        {
            echo "<option value=''>".$this->name[$i]."</option>";
        }
    }

    public function outputfeatureheader()
    {
        $this->name=$this->model->getName();
        $this->overview=$this->model->getOverview();
        $this->featured=$this->model->getFeatured();
        
        for ($i=0;$i<count($this->name);$i++)
        {
            if ($this->featured[$i]=="header")
            {
                echo '  <div class="image" style="background-image: url(images/hotel_feture_1.jpg);">
                            <div class="descrip text-center">
                                <p><small>For as low as</small><span>$100/night</span></p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3>'.$this->name[$i].'</h3>
                            <p>'.$this->overview[$i].'</p>
                            <p><a href="single-hotel.php" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                        </div>';
            }
        }
                    
    }
    
    public function outputdivs()
    {
        $this->name=$this->model->getName();
        $this->overview=$this->model->getOverview();
        
        for ($i=0;$i<count($this->name);$i++)
        {  
            if ($this->featured[$i]=="feature")
            {
                echo '<div class="f-hotel">
                        <div class="image" style="background-image: url(images/hotel_feture_2.jpg);">
                            <div class="descrip text-center">
                                <p><small>For as low as</small><span>$99/night</span></p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3>'.$this->name[$i].'</h3>
                            <p>'.$this->overview[$i].'</p>
                            <p><a href="#" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                        </div>
                </div>';
            }
        }
    }
}

?>