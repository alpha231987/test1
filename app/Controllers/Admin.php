<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{

    public function __construct(){
        helper(['form', 'url']);
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();    
        //echo "<pre>";print_r($session->get());die;
        $data=[];
        return view('admin/index', $data);
    }
    public function login()
    {        
        $data=[];
        return view('admin/login', $data);
    }
    public function sign_in(){
        $inputs = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$inputs) {
            return view('Admin/login', [
                'validation' => $this->validator
            ]);
        }else{            
            $session = session();            
			$email = $this->request->getVar('email');
			$password = $this->request->getVar('password');			
            $builder = $this->db->table('user');
            $builder->where('email', $email);
            $builder->where('password', md5($password));
            $user_data = $builder->get()->getRow();
			 //echo " user_data <pre>"; print_r($user_data); die;
			if(!empty($user_data)){                
				$ses_data = [
					'user_id' => $user_data->id,					
					'user_email' => $user_data->email,
					'isAdminLoggedIn' => true,					
				];
		        // echo " ses_data <pre>"; print_r($ses_data); die; 
				$session->set($ses_data);
				return redirect()->to('/admin');
			}else{
				$session->setFlashdata('error', 'Invalid credentials');				
                return redirect()->to('/admin/login');
			}
		}
    } 

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/admin/login');
    }

}
