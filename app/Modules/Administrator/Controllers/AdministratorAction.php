<?php namespace App\Modules\Administrator\Controllers;

use App\Modules\Administrator\Models\AdministratorModel;
use App\Core\BaseController;

class AdministratorAction extends BaseController
{
    private $administratorModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->administratorModel = new AdministratorModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    function manmodul_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/administrator/manmodul_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manmodul_save()
    {
        parent::_authInsert(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/administrator/manmodul_save', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function manmodul_edit()
    {
        parent::_authEdit(function(){

            echo parent::_httpPost('/web/administrator/manmodul_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manmodul_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/administrator/manmodul_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function manmenu_load()
    {
        parent::_authLoad(function(){
            echo parent::_httpPost('/web/administrator/manmenu_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manmenu_save()
    {
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/administrator/manmenu_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function manmenu_edit()
    {
        parent::_authEdit(function(){

            echo parent::_httpPost('/web/administrator/manmenu_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manmenu_delete()
    {
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/administrator/manmenu_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function manjenisuser_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/administrator/manjenisuser_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manjenisuser_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/administrator/manjenisuser_save', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function manjenisuser_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/administrator/manjenisuser_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manjenisuser_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/administrator/manjenisuser_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function manuser_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/administrator/manuser_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manuser_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $data['tahun'] = '';
            
            echo parent::_httpPost('/web/administrator/manuser_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function manuser_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/administrator/manuser_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manuser_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/administrator/manuser_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }


    function manhakakses_save()
    {
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            
            echo parent::_httpPost('/web/administrator/manhakakses_save', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    


}
