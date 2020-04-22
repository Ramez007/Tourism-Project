<?php
require_once("app/controller/Controller.php");

class BlogController extends Controller
{
    public function ListBlogPosts()
    {
        $this->model->ListContent();
    }
}
?>