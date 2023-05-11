<?php

namespace App\Core;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Core\BaseModel;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['extension'];

    protected $session;

    private $baseModel;


    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
        $this->baseModel = new BaseModel();
        $this->session = \Config\Services::session();
    }

    protected function _authView($data = array())
    {
        $url = uri_segment(1);
        $menu = $this->session->get('menu');

        $authentication = array_filter($menu, function ($arr) use ($url) {
            return strtolower($arr->menu_url) == strtolower($url);
        });

        if (count($authentication) == 1) {
            if (array_values($authentication)[0]->v != "1") {
                // $this->_log("view", "Akses Ditolak");

                $data['load_view'] = 'App\Modules\Main\Views\error';
                return view('App\Modules\Main\Views\layout', $data);
            } else {
                // $this->_log("view", "Akses Diberikan");

                $data['page_title'] = array_values($authentication)[0]->module_name . " > " . array_values($authentication)[0]->menu_name;
                $data['titles'] = array_values($authentication)[0]->menu_name;
                $data['load_view'] = 'App\Modules\\' . ucfirst(array_values($authentication)[0]->module_url) . '\Views\\' . array_values($authentication)[0]->menu_url;
                $data['rules'] = array_values($authentication)[0];
                return view('App\Modules\Main\Views\layout', $data);
            }
        } else {
            // $this->_log("view", "Akses Ditolak");

            $data['load_view'] = 'App\Modules\Main\Views\error';
            return view('App\Modules\Main\Views\layout', $data);
        }
    }

    protected function _view($data = array())
    {
        $session = \Config\Services::session();
        $url = uri_segment(1);

        $data['page_title'] = ucfirst($url);
        $data['username'] = $session->get('username');
        $data['name'] = $session->get('name');
        $data['email'] = $session->get('email');
        $data['usertype'] = $session->get('usertype');
        $data['userdetail'] = $session->get('userdetail');
        $data['load_view'] = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\\' . uri_segment(1);
        $data['rules'] = '';
        // echo json_encode($session->get('userdetail'));
        return view('App\Modules\Main\Views\layout', $data);
    }

    protected function _auth($action, $var_action, callable $authenticated)
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referers = explode("/", $_SERVER['HTTP_REFERER']);
            $referer = end($referers);
            $menu = $this->session->get('menu');

            $authentication = array_filter($menu, function ($arr) use ($referer) {
                return strtolower($arr->menu_url) == strtolower($referer);
            });

            $akses = false;
            $actions = explode(",", $var_action);

            foreach($actions as $act) {
                if(array_values($authentication)[0]->$act == "1"){
                    $akses = true;
                    break;
                }
            }

            if (count($authentication) == 1 && $referer != "" && $akses) {
                $this->_log($action, "Akses Diberikan");

                $authenticated();
            } else {
                $this->_log($action, "Akses Ditolak");

                if ($action == "load") {
                    die(json_encode(array("data" => [], "recordsTotal" => 0, "recordsFiltered" => 0)));
                } else {
                    die(json_encode(array('success' => false, 'message' => 'Anda tidak mempunyai hak akses untuk ini', 'debug' => array_values($authentication)[0])));
                }
            }
        } else {
            $this->_log($action, "Akses Ditolak");

            die("403 Access denied");
        }
    }

    protected function _authInsert(callable $authenticated)
    {
        $this->_auth("insert", "i,e", $authenticated);
    }

    protected function _authEdit(callable $authenticated)
    {
        $this->_auth("edit", "e", $authenticated);
    }

    protected function _authDelete(callable $authenticated)
    {
        $this->_auth("delete", "d", $authenticated);
    }

    protected function _authLoad(callable $authenticated)
    {
        $this->_auth("load", "v", $authenticated);
    }

    protected function _authUpload(callable $authenticated)
    {
        $this->_auth("upload", "i", $authenticated);
    }

    protected function _authDownload(callable $authenticated)
    {
        $this->_auth("download", "v", $authenticated);
    }

    protected function _authOtoritasi(callable $authenticated)
    {
        $this->_auth("otorisasi", "o", $authenticated);
    }

    protected function _log($action, $result)
    {
        $url = $_SERVER['REQUEST_URI'];
        $userid = $this->session->get('id');
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $this->request->getUserAgent();
        $data = $this->request->getPost();

        $param = [
            'action' => $action,
            'url' => $url,
            'result' => $result,
            'userid' => $userid,
            'ip' => $ip,
            'param' => json_encode($data),
            'user_agent' => $agent
        ];

        return $this->_httpPost('/web/logaction', $param);
    }

    protected function _httpPost($url, $postdata)
    {

        
        $baseUrl = 'http://devel.nginovasi.id/akpol-api';

        $ch = curl_init($baseUrl . $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', 'Authorization: Bearer ' . bearer_token()));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    protected function _httpPos($url, $postdata)
    {
        // penambahan setelah di pentest zainal 8 september 2022
        $aman = 0;
        // $whereStrOne = "database";
        // $whereStrTwo = "select";
        
        //DIMATIKAN SEMENTARA BY ADIT - SENIN 21 NOV 2022
    //     foreach ($postdata as $key => $value ) {
    //     //     if (strpos($value,"'")!==false || strpos($value," ")!==false || strpos($value,'"')!==false || strpos(strtolower($value),"databases")!==false || strpos(strtolower($value),"select")!==false ) {
    //     //         $aman= 1;
    //     //     }
                
    //     if(strpos($value, $whereStrOne)!==false){
    //         $aman = 1;
    //     } else if(strpos($value, $whereStrTwo)!==false){
    //         $aman = 1;
    //     } else {
    //         $aman = 0;
    //     }
    // }
        // end penambahan setelah di pentest zainal 8 september 2022

        if ($aman==0) {        
            $baseUrl = 'http://devel.nginovasi.id/akpol-api';

            $ch = curl_init($baseUrl . $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', 'Authorization: Bearer ' . bearer_token()));
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        } else {
        // penambahan setelah di pentest zainal 8 september 2022

            $baseUrl = 'http://devel.nginovasi.id/akpol-api/web/portal/wrongdata';

            $ch = curl_init($baseUrl);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', 'Authorization: Bearer ' . bearer_token()));
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        // end penambahan setelah di pentest zainal 8 september 2022

        }



    }

    protected function _httpGet($url, $param)
    {

        // if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){
            
            $baseUrl = 'http://devel.nginovasi.id/akpol-api';

            $ch = curl_init($baseUrl . $url . '?' . http_build_query($param));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . bearer_token()));
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;

        // } else {
        //     header("HTTP/1.1 401 Unauthorized");
        //     die("Unauthorized access");
        // }
        
    }

    protected function _httpGets($url, $param)
    {

        if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ){

            // penambahan setelah di pentest zainal 8 september 2022
            $aman = 0;
            foreach ($param as $key => $value ) {
                if (strpos($value,"'")!==false || strpos($value," ")!==false || strpos($value,'"')!==false || strpos(strtolower($value),"databases")!==false || strpos(strtolower($value),"select")!==false ) {
                    $aman= 1;
                }
            } 

            if ($aman==0) {        

            // end penambahan setelah di pentest zainal 8 september 2022
                
                $baseUrl = 'http://devel.nginovasi.id/akpol-api';

                $ch = curl_init($baseUrl . $url . '?' . http_build_query($param));
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . bearer_token()));
                $result = curl_exec($ch);
                curl_close($ch);

                return $result;

            }  else {
            // penambahan setelah di pentest zainal 8 september 2022

                $baseUrl = 'http://devel.nginovasi.id/akpol-api/web/portal/wrongdata';

                $ch = curl_init($baseUrl);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', 'Authorization: Bearer ' . bearer_token()));
                $result = curl_exec($ch);
                curl_close($ch);

                return $result;
            // end penambahan setelah di pentest zainal 8 september 2022

            }

        } else {
            header("HTTP/1.1 401 Unauthorized");
            die("Unauthorized access");
        }
        
    }
    
    protected function _portalView($data = array())
    {
        $url = uri_segment(1);

        $data['page_title'] = ucfirst($url);
        $data['load_view'] = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\\' . uri_segment(1);
        $data['rules'] = '';
        // echo json_encode($session->get('userdetail'));
        return view('App\Modules\Main\Views\portal_layout', $data);
    }
}
