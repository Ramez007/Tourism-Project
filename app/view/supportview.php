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
				    <option value = "'."id= ".$ids[$i].'&'.$inqs[$i].'")>'.$emails[$i].'</option>
                ';
                
            
        }
        
    }
    public function output2()
    {
        $inqs=$this->model->getInquiries();
        echo '<input type="text" readonly class="form-control" style="padding-bottom: 150px;" id="staticEmail2" value="'.$inqs[0].'" >';
    }
    
    
}
?>