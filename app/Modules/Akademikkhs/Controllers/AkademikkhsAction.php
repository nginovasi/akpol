<?php

namespace App\Modules\Akademikkhs\Controllers;

use App\Modules\Akademikkhs\Models\AkademikkhsModel;
use App\Core\BaseController;

class AkademikkhsAction extends BaseController
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

    public function download()
    {

        // $filename = 'assets/img/akpol_logo100.png';
        $filename = base_url() . '/assets/img/akpol_logo100.png';

        if (file_exists($filename)) {
            echo "The file $filename exists";
        } else {
            echo "The file $filename does not exist";
        }
    }

    public function pdfcek()
    {
// echo json_encode($this->request->getGet());
        parent::_authDownload(function () {
            // echo json_encode($this->request->getGet());
            $data = parent::_httpPost('/web/akademikkhs/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);

            // echo json_encode($data);
            $rsdata = json_decode($data, true);

            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\pdf\\' . explode("?", uri_segment(3))[0] . '_pdf';

            echo json_encode($rsdata);
        });
    }

    public function pdf()
    {

        parent::_authDownload(function () {
            $data = parent::_httpPost('/web/akademikkhs/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);
            $rsdata = json_decode($data, true);

            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\pdf\\' . explode("?", uri_segment(3))[0] . '_pdf';
            $mpdf = new \Mpdf\Mpdf();

            $dataarr['menuname'] = isset($_GET['nama_menu'])=='' ? explode("?", uri_segment(3))[0] : $_GET['nama_menu'];
            if (isset($_GET['nama_menu'])!='') {
                $datattd = parent::_httpPost('/web/portal/cekttd', ["param" => json_encode($dataarr)]);
                $_datattd = current(json_decode($datattd));
                $rsdata['datattd'] = $_datattd;
                $this->log_log($_GET['nama_menu'], $rsdata, $_datattd);
            }

            $html = view($view, $rsdata);


            if (isset($_GET['o'])) {
                $mpdf->AddPage(
                    $_GET['o'],
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
            } else {
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
            }
            $mpdf->WriteHTML($html);
            $this->response->setHeader('Content-Type', 'application/pdf');
            $mpdf->Output($rsdata['nama_file'] . '.pdf', 'I');
        });
    }

    public function pdfkartuujian()
    {

        parent::_authDownload(function () {
            // echo json_encode($this->request->getGet());
            $data = parent::_httpPost('/web/akademikkhs/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);

            // echo json_encode($data);
            $rsdata = json_decode($data, true);

            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\pdf\\' . explode("?", uri_segment(3))[0] . '_pdf';

            // echo json_encode($rsdata);
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 148]]);

            $dataarr['menuname'] = $_GET['nama_menu'];
            $datattd = parent::_httpPost('/web/portal/cekttd', ["param" => json_encode($dataarr)]);

            $_datattd = current(json_decode($datattd));
            $rsdata['datattd'] = $_datattd;
            $this->log_log($_GET['nama_menu'], $rsdata, $_datattd);


            $html = view($view, $rsdata);

            if (isset($_GET['o'])) {
                // $mpdf->AddPage($_GET['o']);
                $mpdf->AddPage(
                    $_GET['o'],
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
            } else {
                // $mpdf->AddPage('P');
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
            }

            $pagecount = $mpdf->SetSourceFile('assets/kartu ujian.pdf');
            $tplIdx = $mpdf->ImportPage($pagecount);
            // $mpdf->UseTemplate($tplIdx);
            $mpdf->useTemplate($tplIdx, 0, 0, 210, 148);

            $mpdf->WriteHTML($html);

            $this->response->setHeader('Content-Type', 'application/pdf');

            $mpdf->Output($rsdata['nama_file'] . '.pdf', 'I');
        });
    }

    public function excel()
    {

        parent::_authDownload(function () {

            $data = parent::_httpPost('/web/akademikkhs/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);

            $rsdata = json_decode($data, true);

            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\excel\\' .  explode("?", uri_segment(3))[0] . '_excel';

            echo view($view, $rsdata);
        });
    }


    function matapelajarantaruna_load()
    {
        parent::_authLoad(function () {

            $data = $this->request->getPost();

            $data['id_taruna'] = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/matapelajarantaruna_load', ["param" => json_encode($data)]);

            // echo parent::_httpPost('/web/akademikkhs/matapelajarantaruna_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function nilaipelajaran_load()
    {
        parent::_authLoad(function () {

            $data = $this->request->getPost();

            $data['id_taruna'] = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/nilaipelajaran_load', ["param" => json_encode($data)]);

        });
    }

    function cetakkhs_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/registrasitaruna/datataruna_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function cetakkhs_save(){}

    function cetakkhs_edit(){}

    function cetakkhs_delete(){}

    // Begin Data datajadwal

    function jadwaltaruna_load()
    {
        parent::_authLoad(function () {
            $data = $this->request->getPost();

            $data['id_taruna'] = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/jadwaltaruna_load', ["param" => json_encode($data)]);
        });
    }

    // End Data pengampu hanjar

    function absensiperkuliahan_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/absensiperkuliahan_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function absensiperkuliahan_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $arrData = array();

            for ($i = 0; $i < count($data['id_taruna']); $i++) {
                if (isset($data['keterangan'][$i])) {
                    if ($data['keterangan'][$i] == "Lain- lain") {
                        $keterangan = $data['keterangan_lain'][$i];
                    } else {
                        $keterangan = $data['keterangan'][$i];
                    }
                } else {
                    $keterangan = null;
                }
                $item = array(
                    'id' =>  $data['id'][$i],
                    'id_taruna' => $data['id_taruna'][$i],
                    'is_absen' => isset($data['is_absen'][$i]) ? '1' : '0',
                    'id_jadwal' => $data['id_jadwal'][$i],
                    'keterangan' => $keterangan
                );
                array_push($arrData, $item);
            };
            echo parent::_httpPost('/web/akademikkhs/absensiperkuliahan_save', ["param" => json_encode($arrData), "userid" => $userid]);
        });
    }


    function inputnilai_load()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademikkhs/inputnilai_load', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilai_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademikkhs/inputnilai_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaiketerampilan_load()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademikkhs/inputnilaiketerampilan_load', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaiketerampilan_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademikkhs/inputnilaiketerampilan_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaijasmani_load()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademikkhs/inputnilaijasmani_load', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaijasmani_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademikkhs/inputnilaijasmani_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaikesehatan_load()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademikkhs/inputnilaikesehatan_load', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaikesehatan_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademikkhs/inputnilaikesehatan_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaikarakter_load()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademikkhs/inputnilaikarakter_load', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function inputnilaikarakter_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademikkhs/inputnilaikarakter_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }


    function nilaiakhirsemester_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/nilaiakhirsemester_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    // Begin Data penjadwalanujian Najib 

    function penjadwalanujian_load()
    {
        parent::_authLoad(function () {
            echo parent::_httpPost('/web/akademik/datajadwal_load', ["param" => json_encode($this->request->getPost())]);

            // echo parent::_httpPost('/web/akademikkhs/penjadwalanujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function penjadwalanujian_save()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademikkhs/penjadwalanujian_save', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function penjadwalanujian_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademikkhs/penjadwalanujian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function penjadwalanujian_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademikkhs/penjadwalanujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
    // End Data pengampu hanjar

    function datapesertaujian_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/datapesertaujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapesertaujian_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $arrData = array();

            for ($i = 0; $i < count($data['id_user_taruna']); $i++) {
                $item = array(
                    'id' =>  $data['id'][$i] == 'null' ? '' : $data['id'][$i],
                    'id_user_taruna' => $data['id_user_taruna'][$i],
                    'is_uts' => isset($data['is_uts'][$i]) ? '1' : '0',
                    'is_uas' => isset($data['is_uas'][$i]) ? '1' : '0',
                    'id_mata_pelajaran' => $data['id_mata_pelajaran'][$i],
                    'id_semester' => $data['id_semester'][$i],
                    'tahun_ajaran' => $data['tahun_ajaran'][$i],
                    'keterangan' => $data['keterangan'][$i]
                );
                array_push($arrData, $item);
            };
            echo parent::_httpPost('/web/akademikkhs/datapesertaujian_save', ["param" => json_encode($arrData), "userid" => $userid]);
        });
    }

    function tugastaruna_load()
    {
        parent::_authLoad(function () {
            $session = \Config\Services::session();
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');


            echo parent::_httpPost('/web/akademikkhs/tugastaruna_load', [
                "param" => json_encode($this->request->getPost()),
                "userid" => $userid,
                "usertype" => $usertype
            ]);
        });
    }

    function tugastaruna_save()
    {
        parent::_authInsert(function () {
            $session = \Config\Services::session();
            $userdetail = $session->get('userdetail');
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $file_tugas = $this->request->getFile('file_tugas');

            $filetype = $file_tugas->getClientExtension();

            if ($file_tugas !== null) {
                if ($file_tugas->isValid()) {
                    $file = curl_file_create($file_tugas->getRealPath());
                } else {
                    $file = null;
                }
            } else {
                $file = null;
            }

            echo parent::_httpPost('/web/akademikkhs/tugastaruna_save', [
                "param" => json_encode($data),
                "userid" => $userid,
                "userdetail" => json_encode($userdetail),
                "usertype" => $usertype,
                "filetype" => $filetype,
                "file_tugas" => $file
            ]);
        });
    }

    // Begin Data pencapaianperkuliahan Najib 

    function pencapaianperkuliahan_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/pencapaianperkuliahan_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function pencapaianperkuliahan_save()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademikkhs/pencapaianperkuliahan_save', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function pencapaianperkuliahan_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademikkhs/pencapaianperkuliahan_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function pencapaianperkuliahan_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademikkhs/pencapaianperkuliahan_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function rekapnilaitugas_load()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/rekapnilaitugas_load', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function rekapnilaitugas_load_kelas()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/rekapnilaitugas_load_kelas', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function rekapnilaitugas_load_proses()
    {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/rekapnilaitugas_load_proses', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function rekapnilaitugas_save_savenilai()
    {

        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $arrData = array();

            for ($i = 0; $i < count($data['data']); $i++) {
                $item = array(
                    'id' => $data['data'][$i]['id'],
                    'id_mata_pelajaran' => $data['data'][$i]['id_mata_pelajaran'],
                    'id_user_taruna' => $data['data'][$i]['id_m_user'],
                    'id_semester' => $data['data'][$i]['id_semester'],
                    'id_batalyon' => $data['data'][$i]['id_batalyon'],
                    'tugas' => $data['data'][$i]['rata']
                );
                array_push($arrData, $item);
            };

            echo parent::_httpPost('/web/akademikkhs/rekapnilaitugas_save_savenilai', ["param" => json_encode($arrData), "userid" => $userid]);
        });
    }

    function nilaiproses_load() {
        parent::_authLoad(function () {
            $userid = $this->session->get('id');
            echo parent::_httpPost('/web/akademikkhs/nilaiproses_load', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function rekapnilaitugas_save_savenilaiproses()
    {

        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $arrData = array();

            for ($i = 0; $i < count($data['data']); $i++) {
                $item = array(
                    'id' => $data['data'][$i]['id'],
                    'id_mata_pelajaran' => $data['data'][$i]['id_mata_pelajaran'],
                    'id_user_taruna' => $data['data'][$i]['id_m_user'],
                    'id_semester' => $data['data'][$i]['id_semester'],
                    'id_batalyon' => $data['data'][$i]['id_batalyon'],
                    'proses_ajar' => $data['data'][$i]['rata']
                );
                array_push($arrData, $item);
            };

            echo parent::_httpPost('/web/akademikkhs/rekapnilaitugas_save_savenilai', ["param" => json_encode($arrData), "userid" => $userid]);
        });
    }


    function rankingtaruna_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingaspekpersemester_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingtaruna_edit()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingaspekpersemester_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingtaruna_load_nilai()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingtaruna_detail_nilai', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingpersemester_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingpersemester_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingpertingkat_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingpertingkat_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingpersemester_edit()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingaspekpersemester_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingpersemester_load_nilai()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingtaruna_detail_nilai', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingpertingkat_edit()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingaspekpertingkat_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rankingpertingkat_load_nilai()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademikkhs/rankingpertingkat_detail_nilai', ["param" => json_encode($this->request->getPost())]);
        });
    }
    // End Data pencapaianperkuliahan


    function log_log($nama_menu, $datacontent, $datattd)
    {

        // $dataarr['menuname'] = $nama_menu;
        //  $data = parent::_httpPost('/web/portal/cekttd', ["param" => json_encode($dataarr)]);

        //  $result = current(json_decode($data));

        // echo json_encode($result->nama);
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'http://siap.akpol.ac.id/portal/cekttd?menuname='.$nama_menu,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'GET',
        //   CURLOPT_HTTPHEADER => array(
        //     'Cookie: ci_session=g9gab7gdeojiu0alpr7u8df5kl6tllij; csrf_cookie_name=1a89619e83ecf664ec75c12f72d97f2a'
        //   ),
        // ));

        // $response = curl_exec($curl);
        // curl_close($curl);
        // $result = end(json_decode($response));

        $datalog =  array(
            'id' => '',
            'userid' => $this->session->get('id'),
            'ip' =>  $this->request->getIPAddress(),
            'data_content'  => $datacontent,
            'data_ttd'  => $datattd
        );

        parent::_httpPost('/web/akademikkhs/log_log', ["param" => json_encode($datalog), "userid" => $this->session->get('id')]);
    }
}
