<?php namespace App\Modules\Akademik\Controllers;

use App\Modules\Akademik\Models\AkademikModel;
use App\Core\BaseController;

class AkademikAjax extends BaseController
{
    private $akademikModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->akademikModel = new AkademikModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    // akademik done
    public function gedung_select_get(){
        echo parent::_httpGet('/web/akademik/gedung_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function prodi_select_get(){
        echo parent::_httpGet('/web/akademik/prodi_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function aspek_select_get(){
        echo parent::_httpGet('/web/akademik/aspek_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kurikulum_select_get(){
        echo parent::_httpGet('/web/akademik/kurikulum_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function bidang_select_get(){
        echo parent::_httpGet('/web/akademik/bidang_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function mata_pelajaran_select_get(){
        echo parent::_httpGet('/web/akademik/mata_pelajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function mata_pelajaran_batalyon_select_get(){
        echo parent::_httpGet('/web/akademik/mata_pelajaran_batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    

    public function pendidik_select_get(){
        echo parent::_httpGet('/web/akademik/pendidik_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_select_get(){
        echo parent::_httpGet('/web/akademik/tingkat_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function semester_select_get(){
        echo parent::_httpGet('/web/akademik/semester_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function semestertahunajaran_select_get(){
        echo parent::_httpGet('/web/akademik/semestertahunajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function datapaketmatakuliah_list_get(){
        echo parent::_httpGet('/web/akademik/datapaketmatakuliah_list_get', json_decode(json_encode($this->request->getPost()), true));
    }

    public function datatarunadiajar_list_get(){
        echo parent::_httpGet('/web/akademik/datatarunadiajar_list_get', json_decode(json_encode($this->request->getPost()), true));
    }

    public function datajadwal_select_get(){
        $session = \Config\Services::session();
        $data = $this->request->getGet();
        $data['usertype'] = $session->get('usertype');
        $data['userid'] = $this->session->get('id');
        echo parent::_httpGet('/web/akademik/datajadwal_select_get', json_decode(json_encode($data), true));
    }

    public function batalyon_select_get(){
        echo parent::_httpGet('/web/akademik/batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kompi_select_get(){
        echo parent::_httpGet('/web/akademik/kompi_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function peleton_select_get(){
        echo parent::_httpGet('/web/akademik/peleton_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function bulan_select_get(){
        echo parent::_httpGet('/web/akademik/bulan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function pendidik_batalandmapel_select_get(){
        echo parent::_httpGet('/web/akademik/pendidik_batalandmapel_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    

    // end akademik done
    




    public function satker_select_get(){
        echo parent::_httpGet('/web/masterdata/satker_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function birthday_place_select_get(){
        echo parent::_httpGet('/web/masterdata/birthday_place_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function agama_select_get(){
        echo parent::_httpGet('/web/masterdata/agama_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function suku_select_get(){
        echo parent::_httpGet('/web/masterdata/suku_select_get', json_decode(json_encode($this->request->getGet()), true));
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

    public function kelompok_select_get(){
        echo parent::_httpGet('/web/masterdata/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    

    public function jabatan_select_get(){
        echo parent::_httpGet('/web/masterdata/jabatan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function taruna_select_get(){
        echo parent::_httpGet('/web/masterdata/taruna_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function ruangkelas_select_get(){
        echo parent::_httpGet('/web/masterdata/ruangkelas_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function matapelajaran_select_get(){
        echo parent::_httpGet('/web/akademik/matapelajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function matapelajaran_list_get(){
        echo parent::_httpGet('/web/akademik/matapelajaran_list_get', json_decode(json_encode($this->request->getPost()), true));
    }

    public function pelanggarankompi_list_get(){
        echo parent::_httpGet('/web/akademik/pelanggarankompi_list_get', json_decode(json_encode($this->request->getPost()), true));
    }

    public function pujiankompi_list_get(){
        echo parent::_httpGet('/web/akademik/pujiankompi_list_get', json_decode(json_encode($this->request->getPost()), true));
    }


    public function withbatkompel_kelas_select_get(){
        echo parent::_httpGet('/web/akademik/withbatkompel_kelas_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function databatkomple(){
        echo parent::_httpGet('/web/akademik/databatkomple', json_decode(json_encode($this->request->getPost()), true));
    }

    


}
