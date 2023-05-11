<?php namespace App\Modules\Schedule\Controllers;

use App\Modules\Schedule\Models\ScheduleModel;
use App\Core\BaseController;

class ScheduleAjax extends BaseController
{
    private $scheduleModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->scheduleModel = new ScheduleModel();
    }

    public function kelompok_select_get(){
        echo parent::_httpGet('/web/schedule/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_select_get(){
        echo parent::_httpGet('/web/schedule/tingkat_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function semester_select_get(){
        echo parent::_httpGet('/web/schedule/semester_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function jabatan_select_get(){
        echo parent::_httpGet('/web/schedule/jabatan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function taruna_select_get(){
        echo parent::_httpGet('/web/schedule/taruna_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompoktaruna_list_get(){
        echo parent::_httpGet('/web/schedule/kelompoktaruna_list_get', json_decode(json_encode($this->request->getPost()), true));
    }


    public function mata_pelajaran_select_get(){
        echo parent::_httpGet('/web/schedule/mata_pelajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function pendidik_select_get(){
        echo parent::_httpGet('/web/schedule/pendidik_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompok_taruna_select_get(){
        echo parent::_httpGet('/web/schedule/kelompok_taruna_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function ruang_kelas_select_get(){
        echo parent::_httpGet('/web/schedule/ruang_kelas_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function jam_pertemuan_select_get(){
        echo parent::_httpGet('/web/schedule/jam_pertemuan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function bahan_ajar_select_get(){
        echo parent::_httpGet('/web/schedule/bahan_ajar_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tahun_ajaran_get(){
        echo parent::_httpGet('/web/schedule/tahun_ajaran_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function batalyon_select_get(){
        echo parent::_httpGet('/web/schedule/batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    
}
