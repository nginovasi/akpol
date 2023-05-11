<?php namespace App\Modules\Files\Controllers;

use App\Modules\Files\Models\FilesModel;
use App\Core\BaseController;

class FilesAjax extends BaseController
{
    private $filesModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->FilesModel = new FilesModel();
    }
    
    public function matapelajaran_select_get(){
        echo parent::_httpGet('/web/files/matapelajaran_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function pertemuanke_select_get(){
        echo parent::_httpGet('/web/files/pertemuanke_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function jabatan_select_get(){
        echo parent::_httpGet('/web/files/jabatan_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function matapelajaranbybatalyon_select_get(){
        echo parent::_httpGet('/web/files/matapelajaranbybatalyon_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
    
    public function batalyonsmt_select_get(){
        echo parent::_httpGet('/web/files/batalyonsmt_select_get', json_decode(json_encode($this->request->getGet()), true));
    }
}
