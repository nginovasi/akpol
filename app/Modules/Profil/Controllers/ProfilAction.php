<?php

namespace App\Modules\Profil\Controllers;

use App\Modules\Profil\Models\ProfilModel;
use App\Core\BaseController;

class ProfilAction extends BaseController
{
    private $profilModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    function change_pass()
    {
        $username = $this->session->get('username');
        $data = $this->request->getPost();
        $data['username'] = $username;

        // echo json_encode($data);
        echo parent::_httpPost('/web/administrator/changepass_save', ["param" => json_encode($data)]);
    }


    function change_info()
    {
        $userid = $this->session->get('id');
        $data = $this->request->getPost();
        $data['id'] = $userid;
        $photopath = $this->request->getFile('file_foto');

        if ($photopath !== null) {
            if ($photopath->isValid()) {
                $file_foto = curl_file_create($photopath->getRealPath());
            } else {
                $file_foto = null;
            }
        }

        echo parent::_httpPost('/web/administrator/changeinfo_save', [
            "param" => json_encode($data),
            "userid" => $userid,
            "file_foto" => $file_foto
        ]);
    }
}
