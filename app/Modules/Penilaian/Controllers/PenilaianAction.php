<?php namespace App\Modules\Penilaian\Controllers;

use App\Modules\Penilaian\Models\PenilaianModel;
use App\Core\BaseController;

class PenilaianAction extends BaseController
{
    private $penilaianModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->penilaianModel = new PenilaianModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    function penilaiantugas_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/penilaian/penilaiantugas_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function penilaiantugas_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/penilaian/penilaiantugas_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function penilaiantugas_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/penilaian/penilaiantugas_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function penilaiantugas_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/penilaian/penilaiantugas_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
}
