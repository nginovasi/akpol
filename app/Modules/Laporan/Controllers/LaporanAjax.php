<?php namespace App\Modules\Laporan\Controllers;

use App\Modules\Laporan\Models\LaporanModel;
use App\Core\BaseController;

class LaporanAjax extends BaseController
{
    private $laporanModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }


    public function kelompok_select_get(){
        echo parent::_httpGet('/web/schedule/kelompok_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
}
