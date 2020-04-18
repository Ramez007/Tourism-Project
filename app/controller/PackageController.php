<?php
require_once("app/controller/controller.php");

class PackageController extends Controller
{
    public function ListPackageData()
    {
        $this->model->ListPackages();
    }
}

?>