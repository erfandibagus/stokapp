<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function index()
	{
		if (!$this->session->userdata('username')){ 
            redirect('data/login');
        }else{
        	$data = $this->Stokdb->GetData(); 
        	$this->load->view('tabeldata', array('databrg' => $data));
        } 
	}

	public function frm_insert()
    {
		if (!$this->session->userdata('username')){ 
            redirect('data/login');
        }else{
    		$this->load->view('frm_insert');
    	}
    }	

	public function insert_stk()
    {
		if (!$this->session->userdata('username')){ 
            redirect('data/login');
        }else{
        	$nama = $_POST['nm']; 
        	$stok = $_POST['stk']; 
        	$harga = $_POST['hrg']; 
        	$total = $_POST['ttl']; 

        	$post = array( 
                'nm' => $nama,
                'stk' => $stok,
                'hrg' => $harga,
                'ttl' => $total
        	);
 
        	$result = $this->Stokdb->InsertData('brg',$post); 
            	if($result >= 1) 
            {
                redirect('/data');
            }else{
                echo "<h2>Gagal Input Data</h2><br />";
                echo "<< <a href='".$base_url()."index.php/data/frm_insert'>Kembali</a>";
            }
        }
    }

    public function frm_edit($id) 
    {
		if (!$this->session->userdata('username')){ 
            redirect('data/login');
        }else{
        	$result = $this->Stokdb->GetData(" WHERE id = '$id'"); 
        	$data = array( 
            	'id' => $result[0]['id'],
            	'nama' => $result[0]['nm'],
            	'stok' => $result[0]['stk'],
            	'harga' => $result[0]['hrg'],
            	'total' => $result[0]['ttl']
        	);
 
        	$this->load->view('frm_edit',$data); 
    	}
    }

    public function updatedb() 
    {
    	if (!$this->session->userdata('username')){ 
            redirect('data/login');
        }else{
        	$id = $_POST['id']; 
        	$nama = $_POST['nm']; 
        	$stok = $_POST['stk']; 
        	$harga = $_POST['hrg']; 
        	$total = $_POST['ttl'];

        	$post = array( 
                'nm' => $nama,
                'stk' => $stok,
                'hrg' => $harga,
                'ttl' => $total
        	);
 
        	$where = array('id' => $id); 
        	$result = $this->Stokdb->UpdateData('brg',$post,$where); 
 
        	if($result >= 1) 
        	{
            	redirect('/data');
        	}else{
            	echo "<h2>Gagal Update Data</h2><br />";
            	echo "<< <a href='".$base_url()."index.php/data'>Kembali</a>";
        	}
    	}
    }
 
 
    public function deletedb($id) 
    {
    	if (!$this->session->userdata('username')){ 
            redirect('data/login');
        }else{
    		$where = array('id' => $id ); 
    		$result = $this->Stokdb->DeleteData('brg',$where); 
   
	    	if ($result >= 1) 
    	    {
        	   	redirect ('/data');
        	}else{
            	echo "<h2>Gagal Delete Data</h2><br />";
            	echo "<< <a href='".$base_url()."index.php/data/'>Kembali</a>";
        	}
        }  
    }

    public function login()
    {
        if (!$this->session->userdata('username')){ 
            $this->load->view('frm_login');
        }else{
            redirect('data');
        }
    }

    public function cek_login() 
    {
        $user = $_POST['user']; 
        $pass = $_POST['pass']; 

        $passmd5 = md5($pass);
 
        $where = array( 
            'user' => $user,
            'pass' => $passmd5
        );
 
        $re = $this->Stokdb->GetUser('login',$where)->num_rows(); 
 
        if ($re > 0) { 
            $ses = array('username' => $user);
            $cek = $this->session->set_userdata($ses);
            redirect('data');
        }else{ 
            redirect('data/login');
        }
    }
  
    public function logout() 
    {
        $this->session-session_destroy(); 
        redirect('data');
    }
}