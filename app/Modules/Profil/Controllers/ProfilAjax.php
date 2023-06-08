<?php namespace App\Modules\Profil\Controllers;

use App\Modules\Profil\Models\ProfilModel;
use App\Core\BaseController;

class ProfilAjax extends BaseController
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

    public function birthday_place_select_get(){
        echo parent::_httpGet('/web/administrator/birthday_place_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    public function agama_select_get(){
        echo parent::_httpGet('/web/administrator/agama_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_pendidikan_select_get(){
        echo parent::_httpGet('/web/administrator/tingkat_pendidikan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
}
