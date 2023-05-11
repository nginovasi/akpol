<?php namespace App\Modules\Administrator\Controllers;

use App\Modules\Administrator\Models\AdministratorModel;
use App\Core\BaseController;

class Administrator extends BaseController
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

    public function test()
    {
        $data['load_view'] = "App\Modules\Administrator\Views\\test";
        return view('App\Modules\Main\Views\layout', $data); 
    }

    public function manmodul()
    {
        return parent::_authView();
    }

    public function manmenu()
    {
        $data['modules'] = json_decode(parent::_httpGet('/web/administrator/modules_get', []), false);

        return parent::_authView($data);
    }

    public function manjenisuser()
    {
        return parent::_authView();
    }

    public function manhakakses()
    {
        $data['jenisusers'] = json_decode(parent::_httpGet('/web/administrator/usertypes_get', []), false);

        return parent::_authView($data);
    }

    public function manuser()
    {
        $data['jenisusers'] = json_decode(parent::_httpGet('/web/administrator/usertypes_get', []), false);

        return parent::_authView($data);
    }


}
