<?php namespace App\Modules\Laporan\Controllers;

use App\Modules\Laporan\Models\LaporanModel;
use App\Core\BaseController;

class LaporanAction extends BaseController
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


    // Begin Data kelompokruangkelas

    function kelompokruangkelas_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/schedule/kelompokruangkelas_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function kelompokruangkelas_save()
    {   
        
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                
                // echo json_encode($data);
                echo parent::_httpPost('/web/schedule/kelompokruangkelas_save', ["param" => json_encode($data), "userid" => $userid]);
            });

    }

    function kelompokruangkelas_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/schedule/kelompokruangkelas_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function kelompokruangkelas_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/schedule/kelompokruangkelas_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
    // End Data kelompokruangkelas
}
