<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        echo "<pre>";
        print_r($model->where([
            "id"=>6819268
        ])->findAll());
        // i want to specific data
        print_r($model->where([
            "id"=>6819268
        ])->first());
        //if we want column specific
        print_r($model->select('name,email')->where([
            "id"=>6819268
        ])->first());
        // if we want all data by coumn
        print_r($model->select('name,email')->findAll());
        // if we want all data by asc
        print_r($model->select('name,email')->orderBy('id',"asc")->findAll());
        // other method
        $model->select('name,email');
        $model->where([
          "id"=>6819268
        ]);
        $data = $model->first();
        print_r($data);
    }
    public function insert(){
        $model = new UserModel();
        $data = [
            "id"=>14452,
            "name"=>"sajid",
            "email"=>"sajid@gmail.com",
            "gender"=>"male",
            "status"=>"active"
        ];
        $return_data = $model->insert($data); // for single row
        print_r($return_data); // return last id

        // $data = [
        //     [
        //         "name"=>"sajid",
        //         "email"=>"sajid@gmail.com",
        //         "gender"=>"male",
        //         "status"=>"active"
        //     ],
        //     [
                
        //         "name"=>"sajid",
        //         "email"=>"sajid@gmail.com",
        //         "gender"=>"male",
        //         "status"=>"active"
        //     ],
        //     [
            
        //         "name"=>"sajid",
        //         "email"=>"sajid@gmail.com",
        //         "gender"=>"male",
        //         "status"=>"active"
        //     ]
        // ];
       
        // $model->insertBatch($data); // for multiple row
    }

    public function update(){
        $model = new UserModel();
        $update_data = [
                "name"=>"ansari",
                "email"=>"ansari@gmail.com",
                "gender"=>"male",
                "status"=>"inactive"
        ];

        $updated_id = 6819283;
        $model->where([
            "id"=>$updated_id
        ])->set($update_data)->update();

    }

    public function delete(){
        $model = new UserModel();
        $deleted_id = 6819283;
        $model->where([
            "id"=>$deleted_id
        ])->delete();
    }

    public function paginationController(){
      $model = new UserModel();
    //   echo "<pre>";
    //   print_r($model->findAll());
    ?>
    <table>
        <tr>
        <th>Name</th>
        <th>Email</th>
        </tr>
        <?php foreach($model->paginate(5) as $data){ ?>
           <tr>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?></td>
           </tr>
        <?php } ?>
    </table>
    <?php echo $model->pager->links(); ?>
    <?php 
    }
    public function paginationView(){
        $model = new UserModel();
        $pagination = [
            "pagination"=>$model->paginate(5),
            "pager"=>$model->pager
        ];
        return view('pagination',$pagination);
      }

      public function userSession(){
        $session = \Config\Services::session();

        // settings of user session values
        // $session->set('username',"sajid_ansari");
        //reading session value
        // echo $session->get("username");
        // $session->remove("username");

        // $data = [
        //     "name"=>"sajid",
        //     "phone"=>45789
        // ];
        // $session->set("userinfo",$data);
        // $session->push("userinfo",[
        //     "subject"=>"programming"
        // ]);
        // print_r($session->get("userinfo"));
        //  print_r($session->get());     
         $session->destroy();   
      }

      public function fileUpload(){
        $session = session();
        if($this->request->getMethod()=='post'){
            $file = $this->request->getFile("file");
            $filetype = $file->getClientMimeType();
            $valid_file_type = array("image/png","image/jpg","image/jpeg","application/pdf");
            if(in_array($filetype,$valid_file_type)){
            // echo "<pre>";
            // print_r($file);
            $name = $file->getName();
            if($file->move("images",$name)){
               $session->setFlashdata("success","file has been uploaded");
            }
            else {
                $session->setFlashdata("error","file not uploaded");

            }
        }
        else {
            $session->setFlashdata("error","invalid file type");
        }
        return redirect()->to(site_url('my-file'));
        }
        return view('file-upload');
      }

      public function myFormData(){
        if($this->request->getMethod()=='post'){
            // print_r($this->request->getVar());
            $rules = [
                "name"=>"required|min_length[5]|max_length[10]",
                "email"=>"required",
                "mobile"=>"required",
            ];
            $message = [
                "name"=>[
                    "required"=>"name is required",
                    "min_length"=>"we need at least five character",
                    "max_length"=>"we need at least ten character"
                ],
                "email"=>[
                    "required"=>"email is required"
                ],
                "mobile"=>[
                    "required"=>"mobile is required"
                ]
                ];
            $validation = \Config\Services::validation();
            if(!$this->validate($rules,$message)){
              return view("my-form-data", [
                  "validation"=>$this->validator
              ]);
            }
            else {
               print_r($this->request->getVar());
            }
        }
        return view('my-form-data');
      }

      public function otherFileValidation(){
        if($this->request->getMethod()=='post'){
            // print_r($this->request->getVar());
            $rules = [
                "profile_image"=>"uploaded[profile_image]|max_size[profile_image,1024]",
            ];
            if(!$this->validate($rules)){
              return view("file-rule", [
                  "validation"=>$this->validator
              ]);
            }
            else {
               print_r($this->request->getFile('profile_image'));
            }
        }
        return view('file-rule');
      }

      public function myToken(){
        if($this->request->getMethod()=='post'){
            $data = $this->request->getVar();
            print_r($data);
        }
        return view('my-token');
      }
}
