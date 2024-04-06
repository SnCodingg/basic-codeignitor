<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function selectData(){
        $rowQuery = "Select * from users";
        // $data = $this->db->query($rowQuery)->getResult('array');
        $data = $this->db->query($rowQuery)->getResultArray();
        echo "<pre>";
        print_r($data);
        // get single data
        $data = $this->db->query("select * from users where id=6819264")->getRow();
        echo $data->name;

    }
    public function builderMethod(){
        $builder = $this->db->table('users');
        $data = $builder->get()->getResultArray();
        //instead of these two lines
        $data = $this->db->table('users')->get()->getResultArray();
        echo "<pre>";
        print_r($data);
    }
    public function builderMethodTwo(){
        $builder = $this->db->table('users');
        // $builder = $builder->where('id',2);
        // $builder = $builder->where('email',"sajid");
        $builder = $builder->where(array(
            "id"=>3,
            "email"=>"sajid@gmail.com"
        ));
        $data = $builder->get()->getResultArray();
        echo $this->db->getLastQuery();
        echo "<pre>";
        print_r($data);
    }
    public function builderMethodInsert(){
        $builder = $this->db->table('users');
        $data = [
            "name"=>"sajid",
            "email"=>"sajidgmail.com"
        ];
        $builder->insert($data);
        //for multiple row
        $data = [
            [
                "name"=>"sajid",
            "email"=>"sajidgmail.com"
            ],
            [
                "name"=>"sajid",
            "email"=>"sajidgmail.com"
            ],
            [
                "name"=>"sajid",
            "email"=>"sajidgmail.com"
            ]
        ];
        $builder->insertBatch($data);
    }

    public function builderMethodDelete(){
        $builder = $this->db->table('users');
        $data = [
            "id"=>1
        ];
        $builder->delete($data);
        //second method
        $builder->where(array(
            "id"=>1
        ));
        $builder->delete();
    }
    public function builderMethodUpdate(){
        $builder = $this->db->table('users');
        $data = [
          "name"=>"ansari",
          "email"=>"ansari@gmail.com"
        ];
        $builder->update($data,[
            "id"=>9
        ]);
        // other method
        $builder->where([
            "id"=>1
        ])->set($data)->update();
    }
    public function index(): string
    {
        return view('welcome_message');
    }

    public function urlMehod($val1 =null,$val2=null){
        echo "<h1>Hello this is test ".$val1." ".$val2."</h1>";
    }
    public function queryMehod(){
        $data = $this->request->getVar();
        print_r($data);
     }
}
