<?php
require_once("app/view/View.php");

class supportview extends View{	
    public function output()
    {
        $emails=$this->model->getInqemail();
        $ids=$this->model->getInqId();
        $inqs=$this->model->getInquiries();

        for ($i=0;$i<count($emails);$i++)
        {
            echo 
				'
				    <option key='.$ids[$i].' value = "'."id= ".$ids[$i].'&'.$inqs[$i].'")>'.$emails[$i].'</option>
                ';
                
            
        }
        
    }
    public function output2()
    {
        $inqs=$this->model->getInquiries();
        echo '<input type="text" readonly class="form-control" style="padding-bottom: 150px;" id="staticEmail2" value="'.$inqs[0].'" >';
    }
    
    public function fetchguestemails()
    { $emails=$this->model->getguestmail();
    
        for ($i=0;$i<count($emails);$i++)
        {
            echo 
				'
				    <option  value = "'.$emails[$i].'")>'.$emails[$i].'</option>
                ';
                
            
        } 
    }
    public function fetchPackages()
    {
        $packnames=$this->model->getPackagesnames();
        $ids=$this->model->getpackagesids();

        for ($i=0;$i<count($packnames);$i++)
        {
            echo 
				'
				    <option key='.$ids[$i].' value = "'.$ids[$i].'")>'.$packnames[$i].'</option>
                ';
                
            
        }
}


public function FetchNewswireHistory()
    {
        $newswirehistory=$this->model->getnewswirehistory();
        $count=1;
        for ($i=0;$i<count($newswirehistory);$i++)
        {
            
           
            echo 
				'
				    <p>'.$count.') '.$newswirehistory[$i].'</p>
                ';
        $count++;
            
        }
}
public function FetchInquiryHistory()
    {
        $inquiryhistory=$this->model->getinquiryhistory();
        $inquiryAuthor=$this->model->getAuthor();
        $inquiryreply=$this->model->getinquiryreply();
        $Mail=$this->model->getinquirymail();
        $Employeename=$this->model->getnames();
        $count=1;
        for ($i=0;$i<count($inquiryhistory);$i++)
        {
            echo 
				'   
				    <p>'.$count.') Answered by : '.$Employeename[$i].' <br> Author: '.$inquiryAuthor[$i].' <br> Email: '.$Mail[$i].' <br> Inquiry: '.$inquiryhistory[$i].'<br> Reply :  '.$inquiryreply[$i].' <hr> .</p>
                ';
                $count++;
            
        }
}

}

?>