<?php namespace App\Modules\Portal\Controllers;

use App\Modules\Portal\Models\PortalModel;
use App\Core\BaseController;

class PortalAjax extends BaseController
{
    private $portalModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->portalModel = new PortalModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    public function batalyon_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompok_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function peleton_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/peleton_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kompi_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/kompi_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function birthday_place_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/birthday_place_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function suku_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/suku_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function agama_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/agama_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_pendidikan_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/tingkat_pendidikan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function prov_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/prov_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kec_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/kec_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kab_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/kab_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function kel_select_get(){
        echo parent::_httpGets('/web/registrasitaruna/kel_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
}
