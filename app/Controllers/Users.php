<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $users;

    function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index()
    {
        $users = new UsersModel();
        $data['users'] = $users->paginate(5, 'users');
        $data['pager'] = $users->pager;
        $data['nomor'] = nomor($this->request->getVar('page_users'), 5);
        return view('admin/adminn', $data);
    }
    
}