<?php namespace App\Modules\Auth\Controllers;

use App\Modules\Auth\Models\AuthModel;
use App\Core\BaseController;

class Auth extends BaseController
{
    private $authModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function login()
    {   
        $session = \Config\Services::session();

        if(!$session->get('logged_in')){
            return view('App\Modules\Auth\Views\login');
        }else{
            return redirect()->to(base_url());
        }
    }

    public function login1()
    {   
        $session = \Config\Services::session();

        if(!$session->get('logged_in')){
            return view('App\Modules\Auth\Views\login1');
        }else{
            return redirect()->to(base_url());
        }
    }

    public function login2()
    {   
        $session = \Config\Services::session();

        if(!$session->get('logged_in')){
            return view('App\Modules\Auth\Views\login2');
        }else{
            return redirect()->to(base_url());
        }
    }
    
    public function login3()
    {   
        $session = \Config\Services::session();

        if(!$session->get('logged_in')){
            return view('App\Modules\Auth\Views\login3');
        }else{
            return redirect()->to(base_url());
        }
    }

    public function test()
    {
        return view('App\Modules\Auth\Views\test'); 
    }

    public function test1()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = view('App\Modules\Auth\Views\test',[]);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('arjun.pdf','I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
        //return view('welcome_message');
    }

     public function testauth()
    {
        $data = [
            'status' => 1,
            'message' => "Success",
            'token' => "Bearer ".base64_encode("enjiay-akpol-".date('Y-m-d H:i:s'))
        ];

        return $this->response->setJSON($data);
    }

    public function telegram(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://devel.nginovasi.id/akpol-api/web/telegram/tindaklaporan',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer dev',
            'Cookie: ci_session=sb6c9oagopfueso835l8bjdelfro9g0c'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

}
