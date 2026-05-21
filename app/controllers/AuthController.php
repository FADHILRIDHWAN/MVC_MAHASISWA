<?php

class AuthController extends Controller
{

    public function login()
    {

        if (
            $_SERVER['REQUEST_METHOD']
            == "POST"
        ) {

            $userModel =
                $this->model(
                    'User'
                );

            $user =
                $userModel
                ->findByUsername(
                    $_POST['username']
                );

            if (

                $user
                &&
                password_verify(
                    $_POST['password'],
                    $user['password']
                )

            ) {

                $_SESSION['user'] = [

                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']

                ];

                header(
                    "Location:"
                        . BASEURL .
                        "/mahasiswa"
                );

                exit;
            }

            $this->setFlash(
                "Username atau password salah",
                "danger"
            );
        }

        $this->view(
            'auth/login'
        );
    }



    public function logout()
    {

        session_destroy();

        header(
            "Location:"
                . BASEURL .
                "/auth/login"
        );

        exit;
    }
}
