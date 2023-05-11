<?php namespace App\Modules\Registrasitaruna\Controllers;

use App\Modules\Registrasitaruna\Models\RegistrasitarunaModel;
use App\Core\BaseController;

class RegistrasitarunaAjax extends BaseController
{
    private $registrasitarunaModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->registrasitarunaModel = new RegistrasitarunaModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    public function tingkat_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/tingkat_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function tingkat_detail_by_smt_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/tingkat_detail_by_smt_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function peleton_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/peleton_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kompi_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/kompi_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function birthday_place_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/birthday_place_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function suku_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/suku_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function agama_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/agama_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function tingkat_pendidikan_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/tingkat_pendidikan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function prov_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/prov_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kec_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/kec_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kab_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/kab_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kel_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/kel_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function batalyon_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompok_select_get(){
        echo parent::_httpGet('/web/registrasitaruna/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function databatkomple(){
        echo parent::_httpGet('/web/akademik/databatkomple', json_decode(json_encode($this->request->getPost()), true));
    }
}
