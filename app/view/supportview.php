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
				    <option value = "'.$inqs[$i].'")>'.$emails[$i].'</option>
                ';
                
            
        }
        
    }
    
    
}
?>