<?php

namespace App\Controller\Api;

use App\Models\ServiceWorksiteModel;

class ServiceWorksiteController
{
    public function browse()
    {
        $allServiceWorksite = ServiceWorksiteModel::findAll();

        $json = json_encode($allServiceWorksite);

        echo $json;
    }

    public function add()
    {
    }

    public function delete(int $id)
    {
    }
}
