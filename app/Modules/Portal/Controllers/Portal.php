<?php

namespace App\Modules\Portal\Controllers;

use App\Modules\Portal\Models\PortalModel;
use App\Core\BaseController;

class Portal extends BaseController
{
    private $portalModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->portalModel = new PortalModel();
    }

    public function index()
    {
        header('location: '.base_url().'/portal/registrasitaruna', true, 301);
        exit();
    }

    public function pdftaruna()
    {
        date_default_timezone_set('Asia/Jakarta');
        $expired = 10 * 60;

        $data = parent::_httpPost('/web/portal/' . explode("?", uri_segment(2))[0] . '_download', ["param" => json_encode($this->request->getPost())]);
        $rsdata = json_decode($data, true);
        $view = 'App\Modules\Portal\Views\pdf\\'.explode("?", uri_segment(2))[0] .'_pdf';
        
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5']);
        $html = view($view, $rsdata);
        // print_r($html);
        $mpdf->AddPage(
            'L',
            '',
            '',
            '',
            '',
            20, // margin_left
            20, // margin right
            5, // margin top
            10, // margin bottom
            90, // margin header
            10
        ); // margin footer

        $mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');

        $mpdf->Output($rsdata['nama_file'] . '.pdf', 'I');
        // $encrypted_id = $_GET['id'];
        // $id = decrypt(urldecode($encrypted_id));
    }

    public function pdf()
    {
        date_default_timezone_set('Asia/Jakarta');
        $expired = 10 * 60;

        if (isset($_SERVER['HTTP_AUTHORIZATION']) || isset($_SERVER['Authorization'])) {
            $bearer = str_replace("Bearer ", "", $_SERVER["HTTP_AUTHORIZATION"]);
            $token = base64_decode($bearer);
            $time = str_replace("enjiay-akpol-", "", $token);
            $requestTime = strtotime($time);
            $currentTIme = strtotime(date('Y-m-d H:i:s'));
            $diff = $currentTIme - $requestTime;

            if ($bearer != 'dev' && $diff > $expired) {
                header("HTTP/1.1 401 Unauthorized");
                die("Token Expired");
            } else {
                $data = parent::_httpPost('/web/portal/' . explode("?", uri_segment(2))[0] . '_download', ["param" => json_encode($this->request->getGetPost())]);
                $rsdata = json_decode($data, true);

                $view = 'App\Modules\Portal\Views\pdf\\' . explode("?", uri_segment(2))[0] . '_pdf';
                $mpdf = new \Mpdf\Mpdf();
                $html = view($view, $rsdata);
                $mpdf->AddPage(
                    'P',
                    '',
                    '',
                    '',
                    '',
                    20, // margin_left
                    20, // margin right
                    5, // margin top
                    10, // margin bottom
                    90, // margin header
                    10
                ); // margin footer

                $mpdf->WriteHTML($html);

                $this->response->setHeader('Content-Type', 'application/pdf');

                $mpdf->Output($rsdata['nama_file'] . '.pdf', 'I');
            }
        } else {
            header("HTTP/1.1 401 Unauthorized");
            die("Token Not Available");
        }
    }

    public function download()
    {

        return view('App\Modules\Portal\Views\test');
    }

    public function faq()
    {

        return view('App\Modules\Portal\Views\faq');
    }

    public function terms()
    {

        return view('App\Modules\Portal\Views\terms');
    }

    public function privacy()
    {

        return view('App\Modules\Portal\Views\privasi');
    }

    public function registrasitaruna()
    {

        return parent::_portalView();
    }

    public function cekttd()
    {

        $data = parent::_httpPost('/web/portal/cekttd', ["param" => json_encode($this->request->getGet())]);

        echo $data;
    }

    public function telegram(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://devel.nginovasi.id/akpol-api/web/telegram/BotTelegram',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('text' => 'asdasddasdas'),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer dev',
            'Cookie: ci_session=ojsu3cd9e5219t2sejkmc9bp0u0a68vq'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


    }
}
