<html>

<head>
<script src="js/sweetalert.min.js"></script>
</head>

<body>
<?php
require_once("app/view/view.php");
?>

<?php

class MainpageView extends View
{
    private $name;
    private $overview;

    private $guestname;
    private $review;
    private $divsimgs;

    private $hotelsnum;
    private $reservenum;
    private $guestnum;
    private $reviewnum;

    public function output()
    {
        $this->name=$this->model->getName();
        $this->ids=$this->model->getIdarr();
        for ($i=0;$i<count($this->name);$i++)
        {
            echo "<option value='".$this->ids[$i]."'>".$this->name[$i]."</option>";
        }
    }

    public function outputavailiabilty()
    {
        $single=$this->model->getNoofsingle();
        $double=$this->model->getNoofdouble();
        $triple=$this->model->getNooftriple();
        $suites=$this->model->getNoofsuites();
    
        if (isset($_POST['hotelselect']))
        {
        echo '<script> swal("Availabilty","\nAvailable of Single Room:'.$single.' \n\n Available of Double Room:'.$double.' \n\n  Available of Triple Room:'.$triple.' \n\n Available of Suites:'.$suites.' \n\n If you want to book the hotel visit the hotel page");</script>';
        }
    }
    

    public function outputdatacount()
    {
        $this->hotelsnum=$this->model->hotelscount;
        $this->reservenum=$this->model->transactions;
        $this->guestnum=$this->model->guestscount;
        $this->reviewnum=$this->model->reviewcount;
        echo'<div class="col-md-3 text-center">
            <span class="fh5co-counter js-counter" data-from="0" data-to='.$this->guestnum.' data-speed="5000" data-refresh-interval="50"></span>
            <span class="fh5co-counter-label">User Access</span>
            </div>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to='.$this->hotelsnum.' data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Hotels</span>
            </div>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to='.$this->reservenum.' data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Transactions</span>
            </div>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to='.$this->reviewnum.' data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Rating &amp; Review</span>
            </div>';
    }

    public function outputfeatureheader()
    {
        $this->name=$this->model->getName();
        $this->overview=$this->model->getOverview();
        $this->featured=$this->model->getFeatured();
        $this->price=$this->model->getPrice();
        $this->divsimgs=$this->model->getdivsimgs();
        for ($i=0;$i<count($this->name);$i++)
        {
            if ($this->featured[$i]=="header")
            {
                echo '  <div class="image" style="background-image: url('.$this->divsimgs[$i].');">
                            <div class="descrip text-center">
                                <p><small>For as low as</small><span style="font-size:18px;">'.$this->price[$i].' EGP/night</span></p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3>'.$this->name[$i].'</h3>
                            <p style="word-wrap: break-word;">'.$this->overview[$i].'</p>
                            <p><a href="single-hotel.php?action='.$this->name[$i].'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                        </div>';
            }
        }
                    
    }
    
    public function outputslider()
    {
        $this->name=$this->model->getName();
        $this->featured=$this->model->getMainslider();
        $this->divsimgs=$this->model->getdivsimgs();
        $counter=1;
        for ($i=0;$i<count($this->name);$i++)
        {
        if($this->featured[$i]=="TRUE")
        {
        echo '
                    <li style="background-image: url('.$this->divsimgs[$i].');">
                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="col-md-12 col-md-offset-0 text-center slider-text">
                                <div class="slider-text-inner js-fullheight">
                                    <div class="desc">
                                        <p><span>'.$this->name[$i].'</span></p>
                                        <h2>Reserve Room for Family Vacation</h2>
                                        <p>
                                            <a href="single-hotel.php?action='.$this->name[$i].'" class="btn btn-primary btn-lg">Book Now</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>';
        $counter++;
        }
        }
    }



    public function outputreviews()
    {
        $this->guestname=$this->model->getGuestname();
        $this->review=$this->model->getReviews();

        for ($i=0;$i<count($this->guestname);$i++)
        {
            echo '
            <div class="col-md-4">
                <div class="testimony">
                    <blockquote  style="height: 150px;">
                        &ldquo;'.$this->review[$i].'&rdquo;
                    </blockquote>
                    <p class="author"><cite>'.$this->guestname[$i].'</cite></p>
                </div>
            </div>';
        }

    }
    public function outputdivs()
    {
        $this->name=$this->model->getName();
        $this->overview=$this->model->getOverview();
        $this->price=$this->model->getPrice();
        $this->divsimgs=$this->model->getdivsimgs();
        for ($i=0;$i<count($this->name);$i++)
        {  
            if ($this->featured[$i]=="feature")
            {
                echo '<div class="f-hotel">
                        <div class="image" style="background-image: url('.$this->divsimgs[$i].');">
                            <div class="descrip text-center">
                                <p><small>For as low as</small><span style="font-size:18px;">'.$this->price[$i].' EGP/night</span></p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3>'.$this->name[$i].'</h3>
                            <p  style="word-wrap: break-word;">'.$this->overview[$i].'</p>
                            <p><a href="single-hotel.php?action='.$this->name[$i].'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                        </div>
                </div>';
            }
        }
    }
}

?>


</body>
</html>