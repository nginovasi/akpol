<?php

namespace App\Modules\Akademikkhs\Controllers;

use App\Modules\Akademikkhs\Models\AkademikkhsModel;
use App\Core\BaseController;

class Akademikkhs extends BaseController
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

    public function test()
    {
        return view('App\Modules\Akademikkhs\Views\test');
    }


    public function absensiperkuliahan()
    {
        return parent::_authView();
    }

    public function pencapaianperkuliahan()
    {
        return parent::_authView();
    }

    public function penjadwalanujian()
    {
        return parent::_authView();
    }

    public function inputnilai()
    {
        return parent::_authView();
    }

    public function cetakkartuujian()
    {
        return parent::_authView();
    }

    public function cetakkhs()
    {
        return parent::_authView();
    }

    public function cetaktranskrip()
    {
        return parent::_authView();
    }

    public function cetakkrs()
    {
        return parent::_authView();
    }

    public function inputnilaiketerampilan()
    {
        return parent::_authView();
    }

    public function inputnilaijasmani()
    {
        return parent::_authView();
    }

    public function inputnilaikesehatan()
    {
        return parent::_authView();
    }

    public function datapesertaujian()
    {
        return parent::_authView();
    }

    public function cetakabsensiperkuliahan()
    {
        return parent::_authView();
    }

    public function cetakabsensiujian()
    {
        return parent::_authView();
    }

    public function inputnilaikarakter()
    {
        return parent::_authView();
    }
    
    public function nilaiakhirsemester()
    {
        return parent::_authView();
    }

    public function jadwaltaruna()
    {
        return parent::_authView();
    }

    public function absensitaruna()
    {
        return parent::_authView();
    }

    public function tugastaruna()
    {
        return parent::_authView();
    }

    public function matapelajarantaruna()
    {
        return parent::_authView();
    }

    public function rekapnilaitugas()
    {
        return parent::_authView();
    }
    
    public function rankingtaruna()
    {
        return parent::_authView();
    }
    
    public function rankingpersemester()
    {
        return parent::_authView();
    }
    
    public function rankingpertingkat()
    {
        return parent::_authView();
    }

    public function materipembelajaran()
    {
        return parent::_authView();
    }

    public function nilaiproses()
    {
        return parent::_authView();
    }

    public function nilaipelajaran()
    {
        return parent::_authView();
    }

}
