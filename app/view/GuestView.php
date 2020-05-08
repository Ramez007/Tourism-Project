<script src="js/sweetalert.min.js"></script>
<script src="js/refresh.js"></script>
<style>
#inputBox {
    border-radius: 25px;
    border: 2px solid #FF4500;
    padding: 20px; 
    width: 200px;
    height: 15px;    
}
</style>

<link rel="stylesheet" href="css/profile.css">
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
                    <img id="Profile-Picture" src="'.$this->model->getImg().'" width="250" height="300">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary mb-2" style="margin-left: 50px; margin-top: 20px;" data-toggle="modal" data-target="#ModalPP" type="button"> Change Picture </button>
                            <button class="btn btn-primary mb-2" style="margin-top: 20px; margin-left: 700px;" data-toggle="modal" data-target="#ModalEdit" type="button"> Edit Profile </button>
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

    <div id="ModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">
        <form action="profile.php" method="post">
        <label for="fname">First name:</label><br>
        <input type="text" id="inputBox" minlength="3" name="fname" value="'.$_SESSION['fname'].'"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="inputBox" minlength="3" name="lname" value="'.$_SESSION['lname'].'"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="inputBox" name="email" value="'.$_SESSION['Email'].'"><br>
        <label for="BankAccount">Bank Account Number:</label><br>
        <input type="text" id="inputBox" minlength="3" name="BankAccount" value="'.$this->model->getBank_Account_No().'"><br>
        <label for="PassportNumber">Passport Number:</label><br>
        <input type="text" id="inputBox" minlength="3" name="PassportNumber" value="'.$this->model->getPassport_No().'"><br>
        <label for="NationalNumber">National ID Number:</label><br>
        <input type="text" id="inputBox" minlength="3" name="NationalNumber" value="'.$this->model->getNational_ID_No().'"><br>
        <label for="Phone">Phone Number: </label><br>
        <input type="text" id="inputBox" minlength="3" name="Phone" value="'.$this->model->getPhone().'"><br>
        <label for="Age">Age: </label><br>
        <input type="text" id="inputBox" minlength="2" name="Age" value="'.$this->model->getAge().'"><br>


      
        '.($this->model->getUsername()!=''?'<label for="Password">Password:</label><br>
        <input type="password" id="inputBox" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" value="'.$this->model->getPassword().'"><br>':'').'                                                                                                                    
         
        <input type="hidden" name="username" value="'.$this->model->getUsername().'">

        <label for="Country">Country:</label><br>

        <select id="Select" name="Country" class="Select">
        <option selected hidden>Choose country</option>
        <option value="Afganistan">Afghanistan</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="American Samoa">American Samoa</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Benin">Benin</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bonaire">Bonaire</option>
        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
        <option value="Botswana">Botswana</option>
        <option value="Brazil">Brazil</option>
        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
        <option value="Brunei">Brunei</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Canada">Canada</option>
        <option value="Canary Islands">Canary Islands</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic">Central African Republic</option>
        <option value="Chad">Chad</option>
        <option value="Channel Islands">Channel Islands</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmas Island">Christmas Island</option>
        <option value="Cocos Island">Cocos Island</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoros">Comoros</option>
        <option value="Congo">Congo</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Cote DIvoire">Cote DIvoire</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Curaco">Curacao</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Djibouti">Djibouti</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="East Timor">East Timor</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Estonia">Estonia</option>
        <option value="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands">Falkland Islands</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="Fiji">Fiji</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="French Guiana">French Guiana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="French Southern Ter">French Southern Ter</option>
        <option value="Gabon">Gabon</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Germany">Germany</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Great Britain">Great Britain</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guinea">Guinea</option>
        <option value="Guyana">Guyana</option>
        <option value="Haiti">Haiti</option>
        <option value="Hawaii">Hawaii</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="Indonesia">Indonesia</option>
        <option value="India">India</option>
        <option value="Iran">Iran</option>
        <option value="Iraq">Iraq</option>
        <option value="Ireland">Ireland</option>
        <option value="Isle of Man">Isle of Man</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Korea North">Korea North</option>
        <option value="Korea Sout">Korea South</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Laos">Laos</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Liberia">Liberia</option>
        <option value="Libya">Libya</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macau">Macau</option>
        <option value="Macedonia">Macedonia</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Malawi">Malawi</option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="Malta">Malta</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Martinique">Martinique</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Midway Islands">Midway Islands</option>
        <option value="Moldova">Moldova</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Morocco">Morocco</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Nambia">Nambia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherland Antilles">Netherland Antilles</option>
        <option value="Netherlands">Netherlands (Holland, Europe)</option>
        <option value="Nevis">Nevis</option>
        <option value="New Caledonia">New Caledonia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Niger">Niger</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value="Norfolk Island">Norfolk Island</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau Island">Palau Island</option>
        <option value="Palestine">Palestine</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Phillipines">Philippines</option>
        <option value="Pitcairn Island">Pitcairn Island</option>
        <option value="Poland">Poland</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Republic of Montenegro">Republic of Montenegro</option>
        <option value="Republic of Serbia">Republic of Serbia</option>
        <option value="Reunion">Reunion</option>
        <option value="Romania">Romania</option>
        <option value="Russia">Russia</option>
        <option value="Rwanda">Rwanda</option>
        <option value="St Barthelemy">St Barthelemy</option>
        <option value="St Eustatius">St Eustatius</option>
        <option value="St Helena">St Helena</option>
        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
        <option value="St Lucia">St Lucia</option>
        <option value="St Maarten">St Maarten</option>
        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
        <option value="Saipan">Saipan</option>
        <option value="Samoa">Samoa</option>
        <option value="Samoa American">Samoa American</option>
        <option value="San Marino">San Marino</option>
        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal">Senegal</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leone">Sierra Leone</option>
        <option value="Singapore">Singapore</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="Somalia">Somalia</option>
        <option value="South Africa">South Africa</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Sudan">Sudan</option>
        <option value="Suriname">Suriname</option>
        <option value="Swaziland">Swaziland</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syria">Syria</option>
        <option value="Tahiti">Tahiti</option>
        <option value="Taiwan">Taiwan</option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Tanzania">Tanzania</option>
        <option value="Thailand">Thailand</option>
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
        <option value="Tunisia">Tunisia</option>
        <option value="Turkey">Turkey</option>
        <option value="Turkmenistan">Turkmenistan</option>
        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Uganda">Uganda</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="Ukraine">Ukraine</option>
        <option value="United Arab Erimates">United Arab Emirates</option>
        <option value="United States of America">United States of America</option>
        <option value="Uraguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Vatican City State">Vatican City State</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Vietnam">Vietnam</option>
        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
        <option value="Wake Island">Wake Island</option>
        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
        <option value="Yemen">Yemen</option>
        <option value="Zaire">Zaire</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabwe">Zimbabwe</option>
     </select><br>

     <label for="Gender">Gender:</label><br>
     <select id="Select" name="Gender" class="Select">
        <option selected hidden>'.$this->model->getGender().'</option>
        <option value="MALE"> Male </option>
        <option value="FEMALE"> Female </option>
        <option value="OTHER"> Other </option>
     </select><br>

        <input class="btn btn-primary" type="submit" name="submitedit" value="Save Changes" style="margin-left: 37.5%; margin-top: 25px;">
        </form>
      </div>
    </div>

  </div>
</div>

<div id="ModalPP" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change profile picture</h4>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" method="post">
        <input type="file" id="myFile" name="filename"><br>
        <input type="submit" name="submitpp" value="Upload Photo" style="margin-left: 37.5%; margin-top: 25px;">
      </form>
      </div>
    </div>

  </div>
</div>
        ';
        if (isset($_POST['submitedit']))
        {
            if($_POST['Country'] == "Choose country")
            {
                $_POST['Country'] = $this->model->getCountry();
            }
            if(isset($_POST['password']))
            {
                $pass=$_POST['password'];
                if($this->model->getPassword()!=$pass)
                {
                    $pass1=md5($pass);
                }
                
                
                if($this->model->EditProfile($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['BankAccount'],$_POST['PassportNumber'],$_POST['NationalNumber'],$_POST['username'],$pass1,$_POST['Country'], $_POST['Age'], $_POST['Phone'], $_POST['Gender']))
                {
                    echo '<script>swal("Edited profile successfully","","success")</script>';
                    echo '<script>
                    setTimeout(function(){location.reload()}, 1000);
                    </script>';
                }
            }
            else
            {
                if($this->model->EditProfile($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['BankAccount'],$_POST['PassportNumber'],$_POST['NationalNumber'],$_POST['username'],"",$_POST['Country'], $_POST['Age'], $_POST['Phone'], $_POST['Gender']))
                {
                    echo '<script>swal("Edited profile successfully","","success")</script>';
                    echo '<script>
                    setTimeout(function(){location.reload()}, 1000);
                    </script>';
                }
            }
        }
        if(isset($_POST['submitpp']))
        {
            $image_base64 = base64_encode(file_get_contents($_FILES['filename']['tmp_name']) );
            $target_file = basename($_FILES["filename"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
            if($this->model->EditProfilePic($image))
            {
                echo '<script>swal("uploaded photo successfully","","success")</script>';
                echo '<script>
                setTimeout(function(){location.reload()}, 1000);
                </script>';
            }
        }
    }

    public function HistoryOutput()
    {
        $date = date('Y-m-d');
        
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
            
            if($Res->getPackageID() != NULL && $Res->getHotelID()==NULL && $Res->getEnded()=="TRUE" )
            {
                $BodyEcho = 
                '
                <tbody>
                <tr>
                    <td>Package</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>Package Name: '.$Res->getPackageName().'<br> Single Rooms: '.$Res->getSingleRooms().'<br> Double Rooms: '.$Res->getDoubleRooms().' <br> Triple Rooms: '.$Res->getTripleRooms().' <br> Suits: '.$Res->getSuits().' <br> Board type: '.$Res->getBoardType().'</td>
                </tr>
            </tbody>
                ';

            }
            else if($Res->getHotelID() != NULL && $Res->getPackageID() == NULL &&  $Res->getEnded()=="TRUE"  )
            {
                $BodyEcho = 
                '
                <tbody>
                <tr>
                    <td>Hotel</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>Hotel Name: '.$Res->getHotelName().' <br> Single Rooms: '.$Res->getSingleRooms().'<br> Double Rooms: '.$Res->getDoubleRooms().' <br> Triple Rooms: '.$Res->getTripleRooms().' <br> Suits: '.$Res->getSuits().' <br> Board type: '.$Res->getBoardType().'</td>
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
        $date = date('Y-m-d');
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
            if($Res->getPackageID() != NULL && $Res->getHotelID() == NULL && $Res->getEnded()=="FALSE" )
            {
                $Body = 
                '
                <tbody>
                <tr>
                    <td>Package</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>Package Name: '.$Res->getPackageName().'<br> Single Rooms: '.$Res->getSingleRooms().'<br> Double Rooms: '.$Res->getDoubleRooms().' <br> Triple Rooms: '.$Res->getTripleRooms().' <br> Suits: '.$Res->getSuits().' <br> Board type: '.$Res->getBoardType().'</td>
                    <td>
                        <form method="post">
                        <input type="submit" name="TrackPackage" style="width:167px;" class="btn btn-success" value="Track Reservation">
                        <input type="hidden" name="PackageStatus" value="'.$Res->getStatus().'">
                        </form>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#ModalCancelPackage'.$Res->getReserveID().'" type="button">Cancel Reservation</button> 
                    </td>
                </tr>
            </tbody>

            <div id="ModalCancelPackage'.$Res->getReserveID().'" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="text-align:center;">Are you sure?</h4>
                </div>
                <div class="modal-body">
                <form method="post">
                <input type="submit" name="CancelPackage" value="Yes" class="btn btn-success" style="margin-left: 25%;padding-left:25px;padding-right:25px;">
                <input type="hidden" name="PackageID" value="'.$Res->getPackageID().'">
                <input type="hidden" name="ReserveID" value="'.$Res->getReserveID().'">
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left: 15%;padding-left:25px;padding-right:25px;">No</button>
                </div>
              </div>
          
            </div>
            </div>
                ';
            }
            else if($Res->getPackageID() == NULL && $Res->getHotelID() != NULL && $Res->getEnded()=="FALSE" )
            {
                $Body = 
                '
                <tbody>
                <tr>
                    <td>Hotel</td>
                    <td>'.$Res->getDateIn().'</td>
                    <td>'.$Res->getDateOut().'</td>
                    <td>Hotel Name: '.$Res->getHotelName().' <br> Single Rooms: '.$Res->getSingleRooms().'<br> Double Rooms: '.$Res->getDoubleRooms().' <br> Triple Rooms: '.$Res->getTripleRooms().' <br> Suits: '.$Res->getSuits().' <br> Board type: '.$Res->getBoardType().'</td>
                    <td>
                        <form method="post">
                        <input type="submit" name="TrackHotel" style="width:167px;" class="btn btn-success" value="Track Reservation">
                        <input type="hidden" name="HotelStatus" value="'.$Res->getStatus().'">
                        </form>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#ModalCancelHotel'.$Res->getReserveID().'" type="button">Cancel Reservation</button>
                    </td>
                </tr>
            </tbody>

            <div id="ModalCancelHotel'.$Res->getReserveID().'" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="text-align:center;">Are you sure?</h4>
                </div>
                <div class="modal-body">
                <form method="post">
                <input type="submit" name="CancelHotel" value="Yes" class="btn btn-success" style="margin-left: 25%;padding-left:25px;padding-right:25px;">
                <input type="hidden" name="HotelID" value="'.$Res->getHotelID().'">
                <input type="hidden" name="ReserveID" value="'.$Res->getReserveID().'">
                <input type="hidden" name="DateIn" value="'.$Res->getDateIn().'">
                <input type="hidden" name="DateOut" value="'.$Res->getDateOut().'">
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left: 15%;padding-left:25px;padding-right:25px;">No</button>
                </div>
              </div>
          
            </div>
            </div>
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

         if(isset($_POST['CancelPackage']))
         {
             if($this->model->CancelPackage($_POST['PackageID'], $_POST['ReserveID']))
             {
                 echo '<script>swal("Canceled Successfully!","","success")</script>';
                 echo '<script>
                 setTimeout(function(){location.reload()}, 5000);
                 </script>';
             }
             else
             {
                 echo '<script>swal("Something went wrong, please try again")</script>';
             }
         }

         if(isset($_POST['CancelHotel']))
         {
            if($this->model->CancelHotel($_POST['HotelID'], $_POST['ReserveID'],$_POST['DateIn'],$_POST['DateOut']))
            {
                echo '<script>swal("Canceled Successfully!","","success")</script>';
                echo '<script>
                setTimeout(function(){location.reload()}, 5000);
                </script>';
            }
            else
            {
                echo '<script>swal("Something went wrong, please try again")</script>';
            }
         }
         if(isset($_POST['TrackPackage']))
         {
            echo '<script> swal("Status"," '.$_POST['PackageStatus'].'","info"); </script>';
            
         }
         if(isset($_POST['TrackHotel']))
         {
            echo '<script> swal("Status"," '.$_POST['HotelStatus'].'","info"); </script>';
            
         }

    }
}

?>