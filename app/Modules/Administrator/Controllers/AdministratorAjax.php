<?php namespace App\Modules\Administrator\Controllers;

use App\Modules\Administrator\Models\AdministratorModel;
use App\Core\BaseController;

class AdministratorAjax extends BaseController
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

    public function menu_select_get($module_id)
    {
        echo parent::_httpGet('/web/administrator/menu_select_get/'.$module_id , []);
    }

    public function moduleuser_get()
    {
        echo parent::_httpPost('/web/administrator/moduleuser_get', ["id" => $this->request->getPost('id')]);
    }

    public function menu_get($module_id)
    {
        echo parent::_httpGet('/web/administrator/menu_get/'.$module_id, []);
    }

    public function module_select_get(){
        echo parent::_httpGet('/web/administrator/module_select_get', []);
    }

    
}
