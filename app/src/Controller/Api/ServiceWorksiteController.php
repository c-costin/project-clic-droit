<?php

namespace App\Controller\Api;

use App\Model\ServiceWorksiteModel;

class ServiceWorksiteController
{
    public function browse()
    {
        header('Content-type: application/json; charset=utf-8');

        $allServiceWorksite = ServiceWorksiteModel::findAll();

        echo json_encode($allServiceWorksite);
    }

    public function add()
    {

    }

    public function delete(int $id)
    {
        $serviceWorksite = ServiceWorksiteModel::find($id);

        $serviceWorksite->delete();

        echo http_response_code(204);
    }
}
