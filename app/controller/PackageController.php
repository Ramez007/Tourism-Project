<?php
require_once("app/controller/controller.php");

class PackageController extends Controller
{
    public function ListPackageData()
    {
        $this->model->ListPackages();
    }
    public function ListSinglePackage($PKID)
    {
        $this->model->GetDetails($PKID);
    }
    public function ListPackageServices($PKID)
    {
        $this->model->FetchCruiseServices($PKID);
    }
}

?>