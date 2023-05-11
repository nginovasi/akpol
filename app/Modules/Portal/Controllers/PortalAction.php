<?php

namespace App\Modules\Portal\Controllers;

use App\Modules\Portal\Models\PortalModel;
use App\Core\BaseController;

class PortalAction extends BaseController
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
        return redirect()->to(base_url());
    }

    public function tes()
    {
        return redirect()->to(base_url());
    }

    public function pdf()
    {
        parent::_authDownload(function () {
            $data = parent::_httppos('/web/portal/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);
            $rsdata = json_decode($data, true);
            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\pdf\\' . explode("?", uri_segment(3))[0] . '_pdf';

            $mpdf = new \Mpdf\Mpdf();
            $html = view($view, $rsdata);
            if (isset($_GET['o'])) {
                $mpdf->AddPage(
                    $_GET['o'],
                    '',
                    '',
                    '',
                    '',
                    20,
                    // margin_left
                    20,
                    // margin right
                    5,
                    // margin top
                    10,
                    // margin bottom
                    90,
                    // margin header
                    10
                ); // margin footer
            } else {
                $mpdf->AddPage(
                    'P',
                    '',
                    '',
                    '',
                    '',
                    20,
                    // margin_left
                    20,
                    // margin right
                    5,
                    // margin top
                    10,
                    // margin bottom
                    90,
                    // margin header
                    10
                ); // margin footer
            }
            $mpdf->WriteHTML($html);
            $this->response->setHeader('Content-Type', 'application/pdf');
            $mpdf->Output($rsdata['nama_file'] . '.pdf', 'I');
        });
    }

    function datataruna_save()
    {
        //----------------------------------------------------
     

        // $input = $this->validate([
        //     'photopath_file' => [
        //         'uploaded[photopath_file]',
        //         'mime_in[file,image/jpg,image/jpeg,image/png]',
        //         'max_size[photopath_file,1024]',
        //     ]
        // ]);

        // if (!$input) {
        //     $file = $this->request->getFile('photopath_file');
        //     $data['ext'] = $file->getClientExtension(); // Mengetahui extensi File
        //     $data['type'] = $file->getClientMimeType(); // Mengetahui Mime File
        //     $data['size_kb'] = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
        //     $data['size_mb'] = $file->getSize('mb'); // Mengetahui Ukuran File dalam mb
        //     print_r('Choose a valid file');
        //     echo json_encode($data);

            $data = $this->request->getPost();
            $photopath = $this->request->getFile('photopath_file');

            if ($photopath !== null) {
                if ($photopath->isValid()) {
                    $taruna_file = curl_file_create($photopath->getRealPath());
                } else {
                    $taruna_file = null;
                }
            } else {
                $taruna_file = null;
            }

        // } else {

        // }

        $param = [
            "photo_taruna" => $taruna_file
        ];

        // echo json_encode($this->request->getFiles());
        if ($imagefile = $this->request->getFiles()) {
            if (isset($imagefile['photo_kerabat_file'])) {
                foreach ($imagefile['photo_kerabat_file'] as $key => $img) {
                    if ($img->isValid()) {
                        $photo_kerabat = curl_file_create($img->getRealPath());
                        $param['photo_kerabat_array[' . $key . ']'] = $photo_kerabat;
                    } else {
                        $param['photo_kerabat_array[' . $key . ']'] = null;
                    }
                }
            }
        }

        if ($data['id'] == '') {

            $datataruna = array(
                "id" => '',
                "username" => $data['noaklong'],
                "password" => $data['noaklong'],
                "name" => $data['namataruna'],
                "email" => $data['email'],
                "tahun" => $data['tahun_masuk'],
                "type_code" => "trn"
            );
            $data_m_user = parent::_httppos('/web/administrator/manuser_save', ["param" => json_encode($datataruna)]);
            $data_m_user_decode = json_decode($data_m_user);

            if (isset($data_m_user_decode->success)) {
                if ($data_m_user_decode->success == true) {
                    unset($data['tahun_masuk']);
                    $data['noakshort'] = $data['noaklong'];
                    $param['param'] = json_encode($data);

                    echo parent::_httppos('/web/portal/datataruna_save', $param);
                } else {

                    echo json_encode($data_m_user_decode);
                }
            } else {

                echo json_encode($data_m_user_decode);
            }
        } else {

            unset($data['tahun_masuk']);
            $param['param'] = json_encode($data);
            echo parent::_httppos('/web/portal/datataruna_save', $param);
        }
    }
    // function datataruna_save()
    // {
    //     //----------------------------------------------------
    //     $data = $this->request->getPost();
    //     // var_dump($data);
    //     $photopath = $this->request->getFile('photopath_file');

    //     $input = $this->validate([
    //         'photopath_file' => [
    //             'uploaded[photopath_file]',
    //             'mime_in[file,image/jpg,image/jpeg,image/png]',
    //             'max_size[photopath_file,1024]',
    //         ]
    //     ]);

    //     if (!$input) {
    //         $file = $this->request->getFile('photopath_file');
    //         // $data['ext'] = $file->getClientExtension(); // Mengetahui extensi File
    //         // $data['type'] = $file->getClientMimeType(); // Mengetahui Mime File
    //         // $data['size_kb'] = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
    //         // $data['size_mb'] = $file->getSize('mb'); // Mengetahui Ukuran File dalam mb
    //         // print_r('Choose a valid file');
    //         // echo json_encode($data);

    //         if ($photopath !== null) {
    //             if ($photopath->isValid()) {
    //                 $taruna_file = curl_file_create($photopath->getRealPath());
    //             } else {
    //                 $taruna_file = null;
    //             }
    //         } else {
    //             $taruna_file = null;
    //         }

    //     } else {

    //     }

    //     $param = [
    //         "photo_taruna" => $taruna_file
    //     ];

    //     // echo json_encode($this->request->getFiles());
    //     if ($imagefile = $this->request->getFiles()) {
    //         if (isset($imagefile['photo_kerabat_file'])) {
    //             foreach ($imagefile['photo_kerabat_file'] as $key => $img) {
    //                 if ($img->isValid()) {
    //                     $photo_kerabat = curl_file_create($img->getRealPath());
    //                     $param['photo_kerabat_array[' . $key . ']'] = $photo_kerabat;
    //                 } else {
    //                     $param['photo_kerabat_array[' . $key . ']'] = null;
    //                 }
    //             }
    //         }
    //     }

    //     if ($data['id'] == '') {

    //         $datataruna = array(
    //             "id" => '',
    //             "username" => $data['noaklong'],
    //             "password" => $data['noaklong'],
    //             "name" => $data['namataruna'],
    //             "email" => $data['email'],
    //             "tahun" => $data['tahun_masuk'],
    //             "type_code" => "trn"
    //         );

    //         // echo json_encode($data);

    //         $data_m_user = parent::_httppos('/web/administrator/manuser_save', ["param" => json_encode($datataruna)]);

    //         $data_m_user_decode = json_decode($data_m_user);

    //         if (isset($data_m_user_decode->success)) {
    //             if ($data_m_user_decode->success == true) {
    //                 // echo json_encode($data_m_user_decode);
    //                 unset($data['tahun_masuk']);
    //                 $data['noakshort'] = $data['noaklong'];
    //                 $param['param'] = json_encode($data);

    //                 echo parent::_httppos('/web/portal/datataruna_save', $param);
    //             } else {

    //                 echo json_encode($data_m_user_decode);
    //             }
    //         } else {

    //             echo json_encode($data_m_user_decode);
    //         }
    //     } else {

    //         unset($data['tahun_masuk']);
    //         $param['param'] = json_encode($data);

    //         // echo json_encode($param);

    //         echo parent::_httppos('/web/portal/datataruna_save', $param);
    //     }
    // }

    function cektaruna()
    {
        // $csrf_token = $this->security->get_csrf_hash();
        // setcookie("csrf_cookie_name", $csrf_token);

        // Patched on 25 Nov 22 by adit, jika $noak bukan dari hasil posting (direct access via url, bukan parsing dr button post), maka akan redirect ke history sebelumnya
        $noak = $this->request->getGetPost('noak');

        if ($noak != '') {

            $param = [
                'noak' => $noak
                //  'esdlc_token' => md5(time() . $noak) 
            ];

            $response = json_decode($this->_httpPos('/web/portal/cektaruna', $param), false);

            if ($response->success) {
                $user = $response->user;

                // Set a cookie named "esdlc_token" with a value of "01d76b845e770338ee89e77a4c657d26"
            // setcookie("esdlc_token", "01d76b845e770338ee89e77a4c657d26", time() + (86400 * 30), "/"); 
            }
            echo json_encode($response);
            // } else {
            //     $response = [
            //         "success" => false,
            //         "title" => "Error",
            //         "text" => "Nomor AK Tidak Boleh Kosong"
            //     ];
            // }  
        } else {
            echo "<script> history.back() </script>";
        }

        // echo json_encode($response);
    }

    function req_otp()
    {
        $userid = $this->session->get('id');
        $data = $this->request->getPost();

        echo parent::_httppos('/web/portal/generateOTP', [
            "param" => json_encode($data),
            "userid" => $userid
        ]);
    }

    function datapendidik_save()
    {

        $userid = $this->session->get('id');
        $data = $this->request->getPost();


        $rs = parent::_httppos('/web/akademik/datapendidiklengkapi_save', [
            "param" => json_encode($data),
            "userid" => $userid
        ]);

        $decode = json_decode($rs);

        if ($decode->success == true) {

            $getgdk = parent::_httppos('/web/akademik/getdetailpendidik', [
                "param" => json_encode($data),
                "userid" => $userid
            ]);
            $gdkdecode = json_decode($getgdk);

            $userdetail = $gdkdecode->user_detail;
            $_SESSION['userdetail'] = $userdetail;
        }
        echo json_encode($decode);
    }

    public function dropzoneStore()
    {
        $file = $this->request->getFile('file');

        $originalName = $file->getClientName();
        $extension = $file->getClientExtension();
        $size = $file->getSize();

        $data = array(
            'extension' => $extension,
            'originalName' => $originalName,
            'size' => $size,
        );

        echo parent::_httppos('/web/portal/prestasi_upload', ["param" => json_encode($data), "file" => curl_file_create($file->getRealPath())]);
    }
}