<html>
<head><script src="js/sweetalert.min.js"></script>
</head>
<body>

<?php
  require_once("app/model/model.php");
  require_once("app/model/user.php");
  require_once("app/model/reservations.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'C:\xampp\composer\vendor\autoload.php';
?>

<?php

class Guest extends User {
    private $Bank_Account_No;
    private $Country;
    private $City;
    private $Passport_No;
    private $National_ID_No;
    private $reservations = array();
    private $img;
    private $age;
    private $phone;
    private $gender;

    function __construct() {
        $this->dbh = $this->connect();
    }

   
    function validate($value)
    {
        if(!filter_var($value, FILTER_VALIDATE_INT) === false||preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\].*[0-9]|[0-9]/', $value)||$value=="")
        {
            return false;
        }   
        else{
            return true;
        }
    }

    function validatenumb($value)
    {
        if(filter_var($value, FILTER_VALIDATE_INT) === false)
        {
            return false;
        }
        else 
        {
            return true;
        }
    }

    function register()
    {
        if ($_POST['SelecGender']=="0")
        {
            echo '<script>
                            alert("Please Select a valid gender")
                            </script>';
        }
        else{
        $user=$_POST['UserName'];
        $sql1="Select * from login where username='$user' ";
        $res=mysqli_query($this->dbh->getConn(),$sql1);
        $rowcount=mysqli_num_rows($res);
        $SQL = 'SELECT Email from guest WHERE Email="'.$_POST['Email'].'"';
        $Result = mysqli_query($this->dbh->getConn(),$SQL);
        $rowcount2 = mysqli_num_rows($Result);
        if ($rowcount<1 && $rowcount2 < 1){
            $chars=[];
            $fname=$_POST['FirstName'];
            $lname=$_POST['LastName'];
            $email=$_POST['Email'];
            $pass1=md5($_POST['Password']);
            $gend=$_POST['SelecGender'];
            $country = $_POST['Country'];

            if($this->validate($fname)===false)
            {
                echo'<script>
                    swal("Error Regestering!","Remove numbers or special characters from first name","error");
                    </script>';
                    return false;
            }
            else
            {
                if($this->validate($lname)===false)
                {
                    echo'<script>
                    swal("Error Regestering!","Remove numbers or special characters from last name","error");
                    </script>';
                    return false;
                }
                else
                {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)===false)
                    {
                        echo'<script>
                        swal("Error Regestering!","Please enter a valid email","error");
                        </script>';
                        return false;
                        
                    }
                    else
                    {
                        if($country=="")
                        {
                            echo'<script>
                            swal("Error Regestering!","Please select a valid country","error");
                            </script>';
                            return false;
                        }
                        else
                        {
                            if($gend=="MALE"||$gend=="FEMALE"||$gend=="OTHER")
                            {
                                $sql="INSERT INTO guest (FirstName,LastName,Gender,Email,Username,Password,Country) VALUES('$fname','$lname','$gend','$email','$user','$pass1','$country');";
                                $result=mysqli_query($this->dbh->getConn(),$sql);

                                $sql2="Select MAX(GuestID) as value from guest";
                                $result2=mysqli_query($this->dbh->getConn(),$sql2);
                                $row4=mysqli_fetch_assoc($result2);


                                $sql1="INSERT INTO login (GuestID,username,password) values('".$row4['value']."','$user','$pass1')";
                                $result1=mysqli_query($this->dbh->getConn(),$sql1);
                                $this->name=$fname;
                                $this->email=$email;
                                $this->password=$pass;
                                $this->username->$user;
                                $this->Country = $country;
                                header("Location:Login.php");
                            }
                            else
                            {
                                echo'<script>
                                swal("Error Regestering!","Select a valid gender from the drop down menu","error");
                                </script>';   
                            }
                        }
                    }
                }
            }



            
        }
        else {echo '<script> alert("Username and/or Email Already Exists")</script>';}
    
        }
    }

    public function GetProfileData($ID)
    {
        $SQL = 'SELECT ReserveID,HotelID,PackageID,DateIn,DateOut,reserves.Suspended,Status,NoOfSingleRooms,NoOfDoubleRooms,NoOfTripleRooms,NoOfSuits,BoardType,Ended FROM guest INNER JOIN reserves ON guest.GuestID ='.$ID.' AND reserves.GuestID = '.$ID.'';
        $Result = mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);        
        while ($row = $Result->fetch_assoc())
        {
        $Res = new Reservation();
        $Res->setReserveID($row['ReserveID']);
        $Res->setHotelID($row['HotelID']);
        $Res->setPackageID($row['PackageID']);
        $Res->setDateIn($row['DateIn']);
        $Res->setDateOut($row['DateOut']);
        $Res->setSuspended($row['Suspended']);
        $Res->setStatus($row['Status']);
        $Res->setSingleRooms($row['NoOfSingleRooms']);
        $Res->setDoubleRooms($row['NoOfDoubleRooms']);
        $Res->setTripleRooms($row['NoOfTripleRooms']);
        $Res->setSuits($row['NoOfSuits']);
        $Res->setBoardType($row['BoardType']);
        $Res->setEnded($row['Ended']);
        array_push($this->reservations,$Res);
        }
        $SQL2 = 'SELECT Country,BankAccount,NationalID,PassportNumber,Username,Password,Image,Phone,Age,Gender FROM guest WHERE GuestID='.$ID.'';
        $Res2 = mysqli_query($this->dbh->getConn(),$SQL2);
        $Data = $Res2->fetch_assoc();
        $this->setCountry($Data['Country']);
        $this->setBank_Account_No($Data['BankAccount']);
        $this->setPassport_No($Data['PassportNumber']);
        $this->setNational_ID_No($Data['NationalID']);
        $this->setUsername($Data['Username']);
        $this->setPassword($Data['Password']);
        $this->setImg($Data['Image']);
        $this->setPhone($Data['Phone']);
        $this->setAge($Data['Age']);
        $this->setGender($Data['Gender']);

       
        
    }


    public function validateall($Fname,$Lname,$Email,$BankAcc,$Passport,$NationalID,$User,$Pass,$Country,$Age,$Phone,$Gender)
    {
        if($this->validate($Fname)==false)
        {
            echo'<script>
                    swal("Error Editing Profile!","Remove numbers or special characters from first name","error");
                    </script>';
                    return false;
        }
        else
        {
            if($this->validate($Lname)==false)
            {
                echo'<script>
                    swal("Error Editing Profile!","Remove numbers or special characters from last name","error");
                    </script>';
                    return false;
            }
            else
            {
                if ($this->validatenumb($BankAcc)==false)
                {
                    echo'<script>
                    swal("Error Editing Profile!","Bank Account contains value other than a number","error");
                    </script>';
                    return false;
                }
                else
                {
                    if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $Passport))
                    {
                        echo'<script>
                        swal("Error Editing Profile!","Passport contains special characters","error");
                        </script>';
                        return false;
                    }
                    else
                    {
                        if ($this->validatenumb($NationalID)==false)
                        {
                            echo'<script>
                            swal("Error Editing Profile!","NationalID contains value other than a number","error");
                            </script>';
                            return false;
                        }
                        else
                        {
                            if ($this->validatenumb($Age)==false || $Age<18)
                            {
                                echo'<script>
                                swal("Error Editing Profile!","Age contains value other than a number","error");
                                </script>';
                                return false;
                            }
                            else
                            {
                                if ($this->validatenumb($Phone)==false)
                                {
                                    echo'<script>
                                    swal("Error Editing Profile!","Phone Number contains value other than a number","error");
                                    </script>';
                                    return false;
                                }
                                else
                                {
                                    if (filter_var($Email, FILTER_VALIDATE_EMAIL)==false)
                                    {
                                        echo'<script>
                                        swal("Error Editing Profile!","Please enter a valid email","error");
                                        </script>';
                                        return false;
                                    }
                                    else
                                    {
                                        if($Gender=="MALE"||$Gender=="FEMALE"||$Gender=="OTHER")
                                        {
                                            return true;
                                        }
                                        else
                                        {
                                            echo'<script>
                                            swal("Error Editing Profile!","Please select a valid gender from the drop down menu","error");
                                            </script>';
                                            return false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function EditProfile($Fname,$Lname,$Email,$BankAcc,$Passport,$NationalID,$User,$Pass,$Country,$Age,$Phone,$Gender)
    {

       if ($this->validateall($Fname,$Lname,$Email,$BankAcc,$Passport,$NationalID,$User,$Pass,$Country,$Age,$Phone,$Gender)==true)
       {
            if($Pass !="")
            {
                $SQL = 'UPDATE guest SET FirstName="'.$Fname.'",LastName="'.$Lname.'", Email="'.$Email.'", BankAccount="'.$BankAcc.'", PassportNumber="'.$Passport.'", NationalID="'.$NationalID.'", Country="'.$Country.'", Password="'.$Pass.'", Phone="'.$Phone.'", Age="'.$Age.'", Gender="'.$Gender.'" WHERE GuestID='.$_SESSION["ID"].'';
                $_SESSION["fname"]=$Fname;
                $_SESSION["lname"]=$Lname;
                $_SESSION["Email"]=$Email;
                mysqli_query($this->dbh->getConn(),$SQL) ;
                                        
                $sql1="UPDATE login set password='$Pass' where username='$User'";
                return mysqli_query($this->dbh->getConn(),$sql1);
            }
            else
            {
                $SQL = 'UPDATE guest SET FirstName="'.$Fname.'",LastName="'.$Lname.'", Email="'.$Email.'", BankAccount="'.$BankAcc.'", PassportNumber="'.$Passport.'", NationalID="'.$NationalID.'", Country="'.$Country.'", Phone="'.$Phone.'", Age="'.$Age.'", Gender="'.$Gender.'" WHERE GuestID='.$_SESSION["ID"].'';
                $_SESSION["fname"]=$Fname;
                $_SESSION["lname"]=$Lname;
                $_SESSION["Email"]=$Email;
                return mysqli_query($this->dbh->getConn(),$SQL) ;
            }
        }
                                
       
        
    }
    public function EditProfilePic($file)
    {
        $SQL = 'UPDATE guest SET Image="'.$file.'" WHERE GuestID='.$_SESSION["ID"].'';
        return mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
    }

    public function CancelPackage($PackageID,$ReserveID)
    {
        $SQL = 'DELETE FROM reserves WHERE PackageID='.$PackageID.' AND GuestID='.$_SESSION["ID"].' AND ReserveID='.$ReserveID.'';
        return mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
    }

    public function CancelHotel($HotelID,$ReserveID,$DateIn,$DateOut)
    {
        $SQL = 'DELETE FROM reserves WHERE HotelID='.$HotelID.' AND GuestID='.$_SESSION["ID"].' AND ReserveID='.$ReserveID.'';
        $SQL2= 'UPDATE rooms SET Status="Free", DateIn="2000-01-01", DateOut="2000-01-01", GuestID = NULL WHERE HotelID='.$HotelID.' AND GuestID='.$_SESSION["ID"].' AND DateIn="'.$DateIn.'" AND DateOut="'.$DateOut.'"';
        $RoomQuery = mysqli_query($this->dbh->getConn(),$SQL2) or die($this->dbh->getConn()->error);
        $ResQuery = mysqli_query($this->dbh->getConn(),$SQL) or die($this->dbh->getConn()->error);
        if($RoomQuery == true && $ResQuery == true)
        {
            return true;
        }
        else return false;
    }

    public function ReviewHotel($hotelname,$review)
    {
        $sql="SELECT HotelID from hotel where Name='$hotelname'";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row=$Result->fetch_assoc();

        $gid=$_SESSION["ID"];
        $hid=$row["HotelID"];

        $sql1="INSERT INTO reviews (GuestID,HotelID,Review,Featured) values ('$gid','$hid','$review','FALSE')";
        $Result1 = mysqli_query($this->db->getConn(),$sql1);
        if($Result1){
            echo'<script>swal("Successfully Added", "", "success");</script>';
        }
        else{
            echo'<script>
                                    swal("Oops","Error Adding Review !","error");
                                    </script>';
        }
    }

    public function ReviewPkg($pkgid,$review)
    {
        $gid=$_SESSION["ID"];
        $sql1="INSERT INTO reviews (GuestID,PackageID,Review,Featured) values ('$gid','$pkgid','$review','FALSE')";
        $Result1 = mysqli_query($this->db->getConn(),$sql1);
        if($Result1){
            echo'<script>swal("Successfully Added", "", "success");</script>';
        }
        else{
            echo'<script>
                                    swal("Oops","Error Adding Review !","error");
                                    </script>';
        }
    }


    public function validatebooking($children,$adults,$Datein,$Dateout, $single, $double,$triple,$suites,$board)
    {
        $date = date('Y-m-d');

        if($children<0)
        {
            echo'<script>
            swal("Error Booking","The number of children must be 0 or higher","error");
            </script>';
            return false;
        }
        else
        {
            if($adults<1)
            {
                echo'<script>
                swal("Error Booking","The number of adults must be 1 or higher","error");
                </script>';
                return false;
            }
            else
            {
                if($Datein<=$date)
                {
                    echo'<script>
                    swal("Error Booking","Please select a valid check in date","error");
                    </script>';
                    return false;
                }
                else
                {
                    if ($Dateout<=$Datein)
                    {
                        echo'<script>
                        swal("Error Booking","Please select a valid check out date","error");
                        </script>';
                        return false;
                    }
                    else
                    {
                        if($single<0)
                        {
                            echo'<script>
                            swal("Error Booking","Please Enter Number of single rooms equal 0 or higher","error");
                            </script>';
                            return false;
                        }
                        else
                        {
                            if($double<0)
                            {
                                echo'<script>
                                swal("Error Booking","Please Enter Number of double rooms equal 0 or higher","error");
                                </script>';
                                return false;
                            }
                            else
                            {
                                if($triple<0)
                                {
                                    echo'<script>
                                    swal("Error Booking","Please Enter Number of triple rooms equal 0 or higher","error");
                                    </script>';
                                    return false;
                                }
                                else
                                {
                                    if($suites<0)
                                    {
                                        echo'<script>
                                        swal("Error Booking","Please Enter Number of suites equal 0 or higher","error");
                                        </script>';
                                        return false;
                                    }
                                    else
                                    {
                                        if(($single+$double+$triple+$suites)<=0)
                                        {
                                            echo'<script>
                                            swal("Error Booking","Please Enter A valid number of rooms total number of rooms can\'t be 0 or less","error");
                                            </script>';
                                            return false;
                                        }
                                        else
                                        {
                                            if ($board=="Full"||$board=="Half")
                                            {
                                                return true;
                                            }
                                            else
                                            {
                                                echo'<script>
                                                swal("Error Booking","Please Enter A valid type of boarding","error");
                                                </script>';
                                                return false;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }
    }

    public function BookPackage($GuestID,$PackageID)
    {
        $sql="Select * from packages where PackageID='$PackageID'";
            $result=mysqli_query($this->db->getConn(),$sql);
            $row=mysqli_fetch_assoc($result);
            
        if($this->validatebooking($_POST['noofchildren'],$_POST['noofadults'],$row['DateIn'],$row['DateOut'],$_POST['singlerooms'],$_POST['doublerooms'],$_POST['triplerooms'],$_POST['suites'],$_POST['boardtype'])==true)
        {
            $mysql="select NoofChildren,NoofAdults from reserves where PackageId=$PackageID";
            $res=mysqli_query($this->db->getConn(),$mysql);
            $numberofadults=0;
            $numberofchildren=0;
            while ($row2=$res->fetch_assoc())
            {
                $numberofadults+=$row2['NoofAdults'];
                $numberofchildren+=$row2['NoofChildren'];
            }

            $sumofpeople=$numberofadults+$numberofchildren+$_POST['noofchildren']+$_POST['noofadults'];


            

            if ($sumofpeople<=$row['ReserveLimit'])
            {

                $sql5="Select Email from guest where GuestID=$GuestID";
                $result6=mysqli_query($this->db->getConn(),$sql5);
                $row6=mysqli_fetch_assoc($result6);

                $sql7="Select * From hotel where HotelID=".$row['HotelID'];
                $result7=mysqli_query($this->db->getConn(),$sql7);
                $row7=mysqli_fetch_assoc($result7);



                $children=$_POST['noofchildren'];
                $adults=$_POST['noofadults'];
                $Datein=$row['DateIn'];
                $Dateout=$row['DateOut'];
                $single=$_POST['singlerooms'];
                $double=$_POST['doublerooms'];
                $triple=$_POST['triplerooms'];
                $suites=$_POST['suites'];
                $board=$_POST['boardtype'];


                $priceofsingle=$row7['PriceSingle']*0.25*$_POST['singlerooms'];
                $priceofdouble=$row7['PriceDouble']*0.5*$_POST['doublerooms'];
                $priceoftriple=$row7['PriceTriple']*0.75*$_POST['triplerooms'];
                $priceofsuites=$row7['PriceSuites']*$_POST['suites'];
                

                $totalprice=$row['Price'];
                $totalprice=$totalprice*(int) $_POST['noofadults'];
                $price=($row['Price']/2)*(int) $children;
                $totalprice=$totalprice+$price+$priceofsingle+$priceofdouble+$priceoftriple+$priceofsuites;
                $confirmprice=$totalprice*0.1;

                // $hotelid=$row['HotelID'];

                $sql2="INSERT INTO reserves (GuestId,PackageId,NoofChildren,NoofAdults,DateIn,Suspended,DateOut,NoOfSingleRooms,NoOfDoubleRooms,NoOfTripleRooms,NoOfSuits,BoardType,price,Status,Ended) values ('$GuestID','$PackageID','$children','$adults','$Datein','Enabled','$Dateout','$single','$double','$triple','$suites','$board','$totalprice','Waiting for approval','FALSE')";
                $res4=mysqli_query($this->db->getConn(),$sql2);

                if ($res4)
                {
                    $Email_Body="<h2>Your Booking Has been Sent To SpeedoTours And Pending Approval</h2>
                    <br>
                    <h3> for ".$row['PackageName']."<h3>
                    <br>
                    Booking Detalis:
                    <br>
                    Single Rooms: $single 
                    <br>
                    Double Rooms: $double 
                    <br>
                    Triple Rooms: $triple 
                    <br>
                    Suites: $suites 
                    <br>
                    $board Board
                    <br>
                    Check In Date: $Datein 
                    <br>
                    Check Out Date: $Dateout 
                    <br>
                    Total Price: $totalprice EGP
                    <br>

                    <h3>Please Pay 10% of the total price which is $confirmprice EGP in order to confirm the booking</h3>
                    <h3>Please contact us by telephone number : 0212244553 in order to pay the deposit</h3>
                    <br>
                    <h3>For Other Inquires Please contact us through our contact us page or by using our email which is : Speedotourscentral@gmail.com</h3> 


                    <h4> May You Have A Pleasent Stay </h4>
                    <br>
                    <h4> Best Regards From Speedo Tours </h4>";
                    
                    include_once "serverdetails.php";
                    try{
                    $email->Subject="Book Package Request";
                    $email->Body=$Email_Body;
                    $email->addAddress($row6["Email"]);
                    $email->send();
                    }
                    catch(Exception $e)
                    {
                        echo $e->errorMessage();
                    }
                echo'<script>swal("Successfully Booked", "", "success");</script>';

                }
                else
                {
                    echo'<script>
                                            swal("Oops","Error Booking Package !","error");
                                            </script>';
                }
            }
            else
            {
                echo'<script>swal("Booking Error", "Package is already full", "Error");</script>';

            }
        }
    }

    public function BookHotel($id,$hotelname)
    {   
        if($this->validatebooking($_POST['children'],$_POST['adults'],$_POST['datein'],$_POST['dateout'],$_POST['single'],$_POST['doublerooms'],$_POST['triple'],$_POST['suites'],$_POST['boardtype'])==true)
        {
            $sql="Select * from hotel where Name='$hotelname'";
            $result=mysqli_query($this->db->getConn(),$sql);
            $row=mysqli_fetch_assoc($result);

            $sql1="Select count(RoomType)as single from rooms  where rooms.Status='Free' and HotelID='".$row['HotelID']."' and rooms.RoomType='Single' ";
            $result1=mysqli_query($this->db->getConn(),$sql1);
            $row1=mysqli_fetch_assoc($result1);

            $sql2="Select count(RoomType)as number from rooms where rooms.Status='Free' and HotelID='".$row['HotelID']."'and rooms.RoomType='Double' ";
            $result2=mysqli_query($this->db->getConn(),$sql2);
            $row2=mysqli_fetch_assoc($result2);

            $sql3="Select count(RoomType)as triple from rooms where rooms.Status='Free' and HotelID='".$row['HotelID']."'and rooms.RoomType='Triple' ";
            $result3=mysqli_query($this->db->getConn(),$sql3);
            $row3=mysqli_fetch_assoc($result3);

            $sql4="Select count(RoomType)as suites from rooms where rooms.Status='Free' and HotelID='".$row['HotelID']."'and rooms.RoomType='Suites' ";
            $result4=mysqli_query($this->db->getConn(),$sql4);
            $row4=mysqli_fetch_assoc($result4);


            $sql10="select Email from guest where GuestID='$id'";
            $result10=mysqli_query($this->db->getConn(),$sql10);
            $row10=mysqli_fetch_assoc($result10);

            $guestemail=$row10['Email'];
            
            $hotelid=$row['HotelID'];
            $datein=$_POST['datein'];
            $dateout=$_POST['dateout'];
            $adults=$_POST['adults'];
            $children=$_POST['children'];
            $board=$_POST['boardtype'];
            $single=(int)$_POST['single'];
            $double=(int)$_POST['doublerooms'];
            $triple=(int)$_POST['triple'];
            $suites=(int)$_POST['suites'];

            $totalprice=$row['PriceSingle']*(int)$single;
            $totalprice+=$row['PriceDouble']*(int)$double;
            $totalprice+=$row['PriceTriple']*(int)$triple;
            $totalprice+=$row['PriceSuites']*(int)$suites;
            $confirmprice=$totalprice*0.1;

            if ($single <= $row1['single'])
            {
                if ($double <= $row2['number'])
                {
                    if ($triple <= $row3['triple'])
                    {
                        if ($suites <= $row4['suites'])
                        {


                            $sql5="INSERT INTO reserves (GuestId,HotelId,NoofChildren,NoofAdults,DateIn,Suspended,DateOut,NoOfSingleRooms,NoOfDoubleRooms,NoOfTripleRooms,NoOfSuits,BoardType,price,Status,Ended) values ('$id','$hotelid','$children','$adults','$datein','Enabled','$dateout','$single','$double','$triple','$suites','$board','$totalprice','Waiting for approval','FALSE')";
                            $result5=mysqli_query($this->db->getConn(),$sql5);

                            $sql6="UPDATE rooms
                            SET Status='Pending', GuestID='$id',DateIn='$datein',DateOut='$dateout'
                            Where HotelID='$hotelid' and RoomType='Single' and Status='Free' limit $single
                            ";
                            $result6=mysqli_query($this->db->getConn(),$sql6);

                            $sql7="UPDATE rooms
                            SET Status='Pending', GuestID='$id',DateIn='$datein',DateOut='$dateout'
                            Where HotelID='$hotelid' and RoomType='Double' and Status='Free' limit $double
                            ";
                            $result7=mysqli_query($this->db->getConn(),$sql7);

                            $sql8="UPDATE rooms
                            SET Status='Pending', GuestID='$id',DateIn='$datein',DateOut='$dateout'
                            Where HotelID='$hotelid' and RoomType='Triple' and Status='Free' limit $triple
                            ";
                            $result8=mysqli_query($this->db->getConn(),$sql8);

                            $sql9="UPDATE rooms
                            SET Status='Pending', GuestID='$id',DateIn='$datein',DateOut='$dateout'
                            Where HotelID='$hotelid' and RoomType='Suites' and Status='Free' limit $suites
                            ";
                            $result9=mysqli_query($this->db->getConn(),$sql9);
                            

                            if ($result9)
                            {
                                $Email_Body="<h2>Your Booking Has been Sent To SpeedoTours And Pending Approval</h2>
                                <br>
                                <h3> for $hotelname <h3>
                                <br>
                                Booking Detalis:
                                <br>
                                Single Rooms: $single
                                <br>
                                Double Rooms: $double 
                                <br>
                                Triple Rooms: $triple 
                                <br>
                                Suites: $suites
                                <br>
                                $board Board
                                <br>
                                Check In Date: $datein  
                                <br>
                                Check Out Date: $dateout  
                                <br>
                                Total price : $totalprice EGP
                                <br>
                
                                <h3>Please Pay 10% of the total price which is $confirmprice EGP in order to confirm the booking</h3>
                                <h3>Please contact us by telephone number : 0212244553 in order to pay the deposit</h3>
                                <br>
                                <h3>For Other Inquires Please contact us through our contact us page or by using our email which is : Speedotourscentral@gmail.com</h3> 
                
                
                                <h4> May You Have A Pleasent Stay </h4>
                                <br>
                                <h4> Best Regards From Speedo Tours </h4>";
                                
                                include_once "serverdetails.php";
                                try{
                                $email->Subject="Book Hotel Request";
                                $email->Body=$Email_Body;
                                $email->addAddress($guestemail);
                                $email->send();
                                }
                                catch(Exception $e)
                                {
                                    echo $e->errorMessage();
                                }
                                echo'<script>swal("Successfully Booked", "", "success");</script>';
                
                            }
                            else
                            {
                                echo'<script>
                                                        swal("Oops","Error Booking Hotel !","error");
                                                        </script>';
                            }
                        }
                        else
                        {
                            echo'<script>
                            swal("Error Booking Hotel","There is no enough free Suites! \n free rooms :'.$row4['suites'].'","error");
                            </script>'; 
                        }
                    }
                    else
                    {
                        echo'<script>
                        swal("Error Booking Hotel","There is no enough free triple rooms! \n free rooms :'.$row3['triple'].' ","error");
                        </script>'; 
                    }
                }
                else
                {
                echo'<script>
                swal("Error Booking Hotel","There is no enough free double rooms! \n free rooms :'.$row2['number'].'","error");
                </script>'; 
                }
            }
            else
            {
                echo'<script>
                swal("Error Booking Hotel","There is no enough free single rooms! \n free rooms :'.$row1['single'].'","error");
                </script>'; 
            }
        }
    }

    /**
     * Get the value of Country
     */ 
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * Set the value of Country
     *
     * @return  self
     */ 
    public function setCountry($Country)
    {
        $this->Country = $Country;

        return $this;
    }

    /**
     * Get the value of reservations
     */ 
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Get the value of Bank_Account_No
     */ 
    public function getBank_Account_No()
    {
        return $this->Bank_Account_No;
    }

    /**
     * Set the value of Bank_Account_No
     *
     * @return  self
     */ 
    public function setBank_Account_No($Bank_Account_No)
    {
        $this->Bank_Account_No = $Bank_Account_No;

        return $this;
    }

    /**
     * Get the value of City
     */ 
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Set the value of City
     *
     * @return  self
     */ 
    public function setCity($City)
    {
        $this->City = $City;

        return $this;
    }

    /**
     * Get the value of Passport_No
     */ 
    public function getPassport_No()
    {
        return $this->Passport_No;
    }

    /**
     * Set the value of Passport_No
     *
     * @return  self
     */ 
    public function setPassport_No($Passport_No)
    {
        $this->Passport_No = $Passport_No;

        return $this;
    }

    /**
     * Get the value of National_ID_No
     */ 
    public function getNational_ID_No()
    {
        return $this->National_ID_No;
    }

    /**
     * Set the value of National_ID_No
     *
     * @return  self
     */ 
    public function setNational_ID_No($National_ID_No)
    {
        $this->National_ID_No = $National_ID_No;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }
}

?>

</body>
</html>