  <?php

    require_once("app/controller/Controller.php");

  class SubscribeController extends Controller
      {

        public function subscribe(){
              $this->model->subscribe_news_wire();
        }

      }
  ?>