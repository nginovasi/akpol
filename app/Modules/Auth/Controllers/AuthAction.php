<?php

namespace App\Modules\Auth\Controllers;

use App\Modules\Auth\Models\AuthModel;
use App\Core\BaseController;

class AuthAction extends BaseController
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

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        if ($username != '' && $password != '') {

            $param = [
                'username' => $username,
                'password' => $password
            ];

            $response = json_decode($this->_httpPost('/web/auth/login', $param), false);

            // echo json_encode($response);
            // if ($response==null) {
            //     $response = [
            //         "success" => false,
            //         "title" => "Error",
            //         "text" => "Username & Password Salah"
            //     ];
            // } else {

            if ($response->success) {
                $user = $response->user;
                $menu = $response->menu;
                $userdetail = $response->user_detail;
                $usertype = $response->usertype;
                $usertype_singkatan = $response->usertype_singkatan;

                $sessionData = array(
                    'logged_in' => true,
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'menu' => $menu,
                    'usertype' => $user->type_code,
                    'usertype_name' => $usertype,
                    'usertype_name_singkatan' => $usertype_singkatan,
                    'userdetail' => $userdetail,

                );

                $session->set($sessionData);
            }
            // }
        } else {
            $response = [
                "success" => false,
                "title" => "Error",
                "text" => "Username & Password Tidak Boleh Kosong"
            ];
        }

        echo json_encode($response);
    }

    public function login_as()
    {
        $session = \Config\Services::session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username != '') {

            $param = [
                'username' => $username
            ];

            $response = json_decode($this->_httpPost('/web/auth/login_as', $param), false);

            // if ($response==null) {
            //     $response = [
            //         "success" => false,
            //         "title" => "Error",
            //         "text" => "Username & Password Salah"
            //     ];
            // } else {
            if ($response->success) {
                $user = $response->user;
                $menu = $response->menu;
                $userdetail = $response->user_detail;
                $usertype = $response->usertype;

                $sessionData = array(
                    'logged_in' => true,
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'menu' => $menu,
                    'usertype' => $user->type_code,
                    'usertype_name' => $usertype,
                    'userdetail' => $userdetail,
                    'old_session' => $session->get()

                );

                $session->set($sessionData);

                parent::_log('login as', "Akses Diberikan");
            }
            // }
        } else {
            $response = [
                "success" => false,
                "title" => "Error",
                "text" => "Username & Password Tidak Boleh Kosong"
            ];
        }

        echo json_encode($response);
    }

    function logout()
    {
        $session = \Config\Services::session();
        if ($session->has('old_session')) {
            $session->set($session->get('old_session'));
            $session->remove('old_session');
            parent::_log('logout as', "Akses Diberikan");
        } else {
            $session->destroy();
        }

        return redirect()->to(base_url().'/main');
    }
}
