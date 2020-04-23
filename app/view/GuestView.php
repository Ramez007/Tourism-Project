<?php
require_once("app/view/view.php");


class GuestView extends View
{
    public function output()
    {
        echo'
        <div class="tab-content active show" data-tab-content="tab1" id="tab1">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img id="Profile-Picture" src="images\blank-profile-picture.jpg" width="250" height="300">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary mb-2" style="margin-left: 50px; margin-top: 20px;"> Change Picture </button>
                            <button class="btn btn-primary mb-2" style="margin-top: 20px; margin-left: 700px;"> Edit Profile </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <p> First Name: '.$_SESSION['fname'].'</p><br>
                    <p> Last Name: '.$_SESSION['lname'].'</p><br>
                    <p> Email: '.$_SESSION['Email'].'</p><br>
                    <p> Country: '.$this->model->getCountry().'</p>
                </div>
            </div>
        </div>
    </div>
        ';
    }

    public function HistoryOutput()
    {
        $Reservations = $this->model->getReservations();
        $InitialEcho = 
        '
        <div class="tab-content" data-tab-content="tab2" id="tab2">
        <div class="container">
            <h2>Past reservations</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Type of reservation</th>
                        <th>Date in</th>
                        <th>Date out</th>
                        <th>Notes</th>
                    </tr>
                </thead>
        ';

        foreach($Reservations as $Res)
        {
            if($Res->getPackageID() != NULL && $Res->getHotelID() != NULL && $Res->getSuspended() == "Enabled")
            {
                $BodyEcho = 
                '
                <tbody>
                <tr>
                    <td>Package</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>None</td>
                </tr>
            </tbody>
                ';

            }
            else if($Res->getHotelID() != NULL && $Res->getPackageID() == NULL  && $Res->getSuspended() == "Enabled")
            {
                $BodyEcho = 
                '
                <tbody>
                <tr>
                    <td>Hotel</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>None</td>
                </tr>
            </tbody>
                ';

            }
            else 
            {
                $BodyEcho = 
                '
                <tbody>
                <tr>
                </tr>
            </tbody>
                
                ';
            }
            $InitialEcho .= $BodyEcho;

        }
        $EndEcho = '
        </table>
        </div>
    </div>
        ';
        $InitialEcho .= $EndEcho;
        echo $InitialEcho;
    }

    public function ReservationOutput()
    {
        $Reservations = $this->model->getReservations();
        $Initial = 
        '
        <div class="tab-content" data-tab-content="tab4" id="tab4">
        <div class="container">
            <h2>Current/Upcoming reservations</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Type of reservation</th>
                        <th>Date in</th>
                        <th>Date out</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
        ';
        foreach($Reservations as $Res)
        {
            if($Res->getPackageID() != NULL && $Res->getHotelID() != NULL && $Res->getSuspended() == "Disabled")
            {
                $Body = 
                '
                <tbody>
                <tr>
                    <td>Package</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>None</td>
                    <td>
                        <button class="btn btn-danger">Cancel Reservation</button>
                        <button class="btn btn-success">Track Reservation</button>
                    </td>
                </tr>
            </tbody>
                ';
            }
            else if($Res->getPackageID() == NULL && $Res->getHotelID() != NULL && $Res->getSuspended() == "Disabled")
            {
                $Body = 
                '
                <tbody>
                <tr>
                    <td>Hotel</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>None</td>
                    <td>
                        <button class="btn btn-danger">Cancel Reservation</button>
                        <button class="btn btn-success">Track Reservation</button>
                    </td>
                </tr>
            </tbody>
                ';
            }
            else 
            {
                $Body = 
                '
                <tbody>
                <tr>
                </tr>
            </tbody>
                ';
            }
            $Initial .= $Body;
        }
         $End = 
         '
         </table>
         </div>
     </div>
         ';
         $Initial .= $End;
         echo $Initial;
    }
}

?>