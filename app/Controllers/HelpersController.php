<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class HelpersController extends BaseController
{
    public function formHelper()
    {
        return view('helpers/form');
    }
    public function submitForm(){
        $model = new UserModel();
        if($this->request->getMethod()=='post'){
        $data = $this->request->getVar();
        $data = [
            "name"=>$data['name'],
            "email"=>$data['email'],
            "gender"=>$data['gender'],
            "status"=>$data['status']
        ];
        $save = $model->insert($data);
        $sesion = session();
         if($save){
           $sesion->setFlashdata("success","Data has been submitted successfully");
         }
         else {
            $sesion->setFlashdata("error","Failed to save data");
         }
         return redirect()->to('/form-two');
        }
        return view('helpers/form-two');
    }

    public function listCall(){
        print_my_message("Online web tutor");
    }
    public function myLength(){
        find_my_length("Online web tutor");
    }
    public function listUsers(){
        echo "<pre>";
        print_r(get_users());
    }
}
