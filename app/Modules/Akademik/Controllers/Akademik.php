<?php namespace App\Modules\Akademik\Controllers;

use App\Modules\Akademik\Models\AkademikModel;
use App\Core\BaseController;

class Akademik extends BaseController
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

    public function datapendidik()
    {
        return parent::_authView();
    }

    public function datakelompoktaruna()
    {
        return parent::_authView();
    }

    public function datakurikulum()
    {
        return parent::_authView();
    }

    public function datamatapelajaran()
    {
        return parent::_authView();
    }

    public function dataruangkelas()
    {
        return parent::_authView();
    }
    
    public function configparameter()
    {
        return parent::_authView();
    }

    public function datajadwal()
    {
        return parent::_authView();
    }

    public function dataprogramstudi()
    {
        return parent::_authView();
    }

    public function golongankepangkatan()
    {
        return parent::_authView();
    }

    public function rekapjammengajar()
    {
        return parent::_authView();
    }

    public function datapaketmatakuliah()
    {
        return parent::_authView();
    }

    public function tarunaaktif()
    {
        return parent::_authView();
    }

    public function datatugasmengajar()
    {
        return parent::_authView();
    }

    public function palajarandiajar()
    {
        return parent::_authView();
    }

    public function jadwalpendidik()
    {
        return parent::_authView();
    }

    public function pelanggarandanpujian()
    {
        return parent::_authView();
    }

    public function rekapnsp()
    {
        return parent::_authView();
    }

    public function datansp()
    {
        return parent::_authView();
    }

    public function verifnsp()
    {
        return parent::_authView();
    }


}
