<?php

namespace App\Modules\Main\Controllers;

use App\Modules\Main\Models\MainModel;
use App\Core\BaseController;


class MainAction extends BaseController
{
    private $mainModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->mainModel = new MainModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }


    public function datadashboard_load()
    {
        echo parent::_httpPost('/web/main/data_main', []);
    }

    public function datataruna_load()
    {

        echo parent::_httpPost('/web/main/datataruna_load',  ["id_taruna" => $this->session->get('id')]);
    }

    public function datagubernur_load()
    {
        echo parent::_httpPost('/web/main/datagubernur_load', []);
    }

    public function pengumuman_save()
    {
        $userid = $this->session->get('id');
        $data = $this->request->getPost();
        $file_banner = $this->request->getFile('file_banner');

        if ($file_banner !== null) {
            if ($file_banner->isValid()) {
                $file = curl_file_create($file_banner->getRealPath());
            } else {
                $file = null;
            }
        } else {
            $file = null;
        }

        echo parent::_httpPost('/web/main/pengumuman_save', [
            "param" => json_encode($data), 
            "userid" => $userid,
            "file_banner" => $file
        ]);
    }
}
