<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    protected $contact;

    function __construct()
    {
        $this->contact = new ContactModel();
        
    }

    public function index()
    {
        
        $contact = new ContactModel();
        $data['booking'] = $contact->paginate(5, 'contact');
		$data['booking'] = $contact->where('status', 'Proses')->findAll();
        
        return view('ambulance/contact', $data);
    }
 
}