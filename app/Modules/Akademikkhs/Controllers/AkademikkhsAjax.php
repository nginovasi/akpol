<?php

namespace App\Modules\Akademikkhs\Controllers;

use App\Modules\Akademikkhs\Models\AkademikkhsModel;
use App\Core\BaseController;

class AkademikkhsAjax extends BaseController
{
    private $akademikkhsModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->akademikkhsModel = new AkademikkhsModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    public function kelompok_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompokbybatalandmatkul_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/kelompokbybatalandmatkul_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function kelompokwhere_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/kelompokwhere_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function matapelajaran_select_get()
    {
        // echo parent::_httpGet('/web/akademikkhs/matapelajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
        echo parent::_httpGet('/web/akademik/matapelajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
        
    }

    public function matapelajaranwhere_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/matapelajaranwhere_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function matapelajaranbysemester_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/matapelajaranbysemester_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function semesterbybatalyon_select_get(){
        echo parent::_httpGet('/web/akademikkhs/semesterbybatalyon_select_get', json_decode(json_encode($this->request->getGet()), true));

    }
    
    public function matapelajaranbyidsmt_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/matapelajaranbyidsmt_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function semester_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/semester_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function pertemuan_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/pertemuan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function pertemuanbykelas_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/pertemuanbykelas_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function alasantidakhadir_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/alasantidakhadir_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function syaratnilaijasmani_get()
    {
        echo parent::_httpGet('/web/akademikkhs/syaratnilaijasmani_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function  matapelajaranbybatalyon_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/matapelajaranbybatalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function  matapelajaranbybatalyonnoaspek_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/matapelajaranbybatalyonnoaspek_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function  batalyonsmt_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/batalyonsmt_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function  kompibybatalyon_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/kompibybatalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function  peletonbykompi_select_get()
    {
        echo parent::_httpGet('/web/akademikkhs/peletonbykompi_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    // najib

    public function matapelajaran_list_get(){
        echo parent::_httpGet('/web/akademikkhs/matapelajaran_list_get', json_decode(json_encode($this->request->getPost()), true));
    }

    public function taruna_select_get(){
        echo parent::_httpGet('/web/akademikkhs/taruna_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkat_select_get(){
        echo parent::_httpGet('/web/masterdata/tingkat_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkatsatusampaiempat_select_get(){
        echo parent::_httpGet('/web/masterdata/tingkatsatusampaiempat_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function tingkatbybatalyon_select_get(){
        echo parent::_httpGet('/web/masterdata/tingkatbybatalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function batalyon_select_get(){
        echo parent::_httpGet('/web/masterdata/batalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }

    public function datataruna_list_get(){
        $data = $this->request->getPost();
        $data['id_taruna'] = $this->session->get('id');
        echo parent::_httpGet('/web/akademikkhs/datataruna_list_get', json_decode(json_encode($data), true));
    }

    public function nilaipelajaran_list_get(){
        $data = $this->request->getPost();
        $data['id_taruna'] = $this->session->get('id');
        echo parent::_httpGet('/web/akademikkhs/nilaipelajaran_list_get', json_decode(json_encode($data), true));
    }

    public function nilaipelajarantugas_list_get(){
        $data = $this->request->getPost();
        $data['id_taruna'] = $this->session->get('id');
        echo parent::_httpGet('/web/akademikkhs/nilaipelajarantugas_list_get', json_decode(json_encode($data), true));
    }

    public function materibymapel_list_get(){
        $data = $this->request->getPost();
        $data['id_taruna'] = $this->session->get('id');
        echo parent::_httpGet('/web/akademikkhs/materibymapel_list_get', json_decode(json_encode($data), true));
    }

     public function ruangkelas_select_get(){
        echo parent::_httpGet('/web/masterdata/ruangkelas_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
}
