<?php
require_once("app/view/view.php");

class BlogView extends View
{
    private $PostMonth;
    private $PostYear;
    private $PostTitle;
    private $PostText;

    public function output()
    {
        $this->PostMonth = $this->model->getPostMonth();
        $this->PostYear = $this->model->getPostYear();
        $this->PostTitle = $this->model->getPostTitle();
        $this->PostText = $this->model->getPostText();

        for($i = 0; $i < count($this->PostTitle); $i++)
        {
            echo
            '
            <div class="col-md-4">
            <div class="blog-grid" style="background-image: url(images/image-1.jpg);">
                <div class="date text-center">
                    <span>'.$this->PostMonth[$i].'</span>
                    <small>'.$this->PostYear[$i].'</small>
                </div>
            </div>
            <div class="desc desc-blog">
                <h3>'.$this->PostTitle[$i].'</h3>
                <p style="margin-top: 8px;word-wrap: break-word;">'.$this->PostText[$i].'</p>
            </div>
        </div>
            ';
        }
    }
}

?>