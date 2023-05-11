<?php namespace App\Modules\Masterdata\Controllers;

use App\Modules\Masterdata\Models\MasterdataModel;
use App\Core\BaseController;

class MasterdataAjax extends BaseController
{
    private $masterdataModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->masterdataModel = new MasterdataModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    public function birthday_place_select_get(){
        echo parent::_httpGet('/web/masterdata/birthday_place_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_select_get(){
        echo parent::_httpGet('/web/masterdata/tingkat_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_detail_select_get(){
        echo parent::_httpGet('/web/masterdata/tingkat_detail_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function batalyon_select_get(){
        echo parent::_httpGet('/web/masterdata/batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kompi_select_get(){
        echo parent::_httpGet('/web/masterdata/kompi_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kompi_all_select_get(){
        echo parent::_httpGet('/web/masterdata/kompi_all_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function peleton_select_get(){
        echo parent::_httpGet('/web/masterdata/peleton_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function agama_select_get(){
        echo parent::_httpGet('/web/masterdata/agama_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function suku_select_get(){
        echo parent::_httpGet('/web/masterdata/suku_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_pendidikan_select_get(){
        echo parent::_httpGet('/web/masterdata/tingkat_pendidikan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function prov_select_get(){
        echo parent::_httpGet('/web/masterdata/prov_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kab_select_get(){
        echo parent::_httpGet('/web/masterdata/kab_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kec_select_get(){
        echo parent::_httpGet('/web/masterdata/kec_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kel_select_get(){
        echo parent::_httpGet('/web/masterdata/kel_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function satker_select_get(){
        echo parent::_httpGet('/web/masterdata/satker_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function pendidik_select_get(){
        echo parent::_httpGet('/web/masterdata/pendidik_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kategori_pelanggaran_select_get(){
        echo parent::_httpGet('/web/masterdata/kategori_pelanggaran_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function karakter_penilaian_select_get(){
        echo parent::_httpGet('/web/masterdata/karakter_penilaian_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function aspek_select_get(){
        echo parent::_httpGet('/web/masterdata/aspek_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function semester_select_get(){
        echo parent::_httpGet('/web/masterdata/semester_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kurikulum_select_get(){
        echo parent::_httpGet('/web/masterdata/kurikulum_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function taruna_select_get(){
        echo parent::_httpGet('/web/masterdata/taruna_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompok_select_get(){
        echo parent::_httpGet('/web/masterdata/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function jabatan_select_get(){
        echo parent::_httpGet('/web/masterdata/jabatan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function pujian_select_get(){
        echo parent::_httpGet('/web/masterdata/pujian_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function config_select_get(){
        echo parent::_httpGet('/web/masterdata/config_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function gedung_select_get(){
        echo parent::_httpGet('/web/masterdata/gedung_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function variabelpujian_select_get(){
        echo parent::_httpGet('/web/masterdata/variabelpujian_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function indikatorpujian_select_get(){
        echo parent::_httpGet('/web/masterdata/indikatorpujian_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function itempujian_select_get(){
        echo parent::_httpGet('/web/masterdata/itempujian_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function namattd_select_get(){
        echo parent::_httpGet('/web/masterdata/namattd_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function namamenu_select_get(){
        echo parent::_httpGet('/web/masterdata/namamenu_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function ttdjabatan_select_get(){
        echo parent::_httpGet('/web/masterdata/ttdjabatan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }


}
