<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('siswa_model');
    }

    public function index()
    {
		if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
		{
			redirect('/');
		}
        $data['nilai'] = $this->siswa_model->ambil_data_nilai();
		$this->load->view('home',$data);
        
    } 
      public function datasiswa()
    {
         if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $ids = $this->session->userdata('logined');
        $data['siswa'] = $this->siswa_model->ambil_data_siswax($ids);
         

        $this->load->view('datasiswa',$data);
        
    } 
     public function dataortu()
    {
         if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $ids = $this->session->userdata('logined');
        $data['ortu'] = $this->siswa_model->ambil_data_ortux($ids);
         

        $this->load->view('dataortu',$data);
        
    } 
   
     public function index2()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $idx = $this->session->userdata('logined');
        $data['nilai'] = $this->siswa_model->ambil_data_nilaix($idx);
        $this->load->view('home2',$data);
        
    } 
    public function index3()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $idx = $this->session->userdata('logined');
        $idp = $this->siswa_model->select_siswa_ortu($idx);
      
        $data['nilai'] = $this->siswa_model->ambil_data_nilais($idp->nis);
        
        $this->load->view('home3',$data);
        
    } 
     public function siswa()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }

        $data['siswaa'] = $this->siswa_model->ambil_data_siswa();

        $this->load->view('siswa',$data);
        
    } 
     public function mapel()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }

        $data['mapel'] = $this->siswa_model->ambil_data_mapel();

        $this->load->view('mapel',$data);
        
    } 
     public function ortu()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $data['ortu'] = $this->siswa_model->ambil_data_ortu();
        $this->load->view('ortu',$data);
        
    } 
     public function input()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }

        
        $data['guru'] = ($this->siswa_model->ambil_data_guru());
        $data['siswa'] = ($this->siswa_model->ambil_data_siswa());
        $data['mapel'] = ($this->siswa_model->ambil_data_mapel());
        $data['action'] =  site_url('home/input_aksi');

        $this->load->view('input',$data);
        
    } 
    public function guru()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $data['guru'] = $this->siswa_model->ambil_data_guru();
        $this->load->view('guru',$data);
        
    }
    public function kelas()
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $data['kelas'] = $this->siswa_model->ambil_data_kelas();
        $this->load->view('kelas',$data);
        
    }
    function input_aksi()
    {
    
       
        $data = array(
            'nis' => $this->input->post('nis'),
            'nik' => $this->input->post('nik'),
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nilai_harian' => $this->input->post('nilai_harian'),
            'nilai_ulangan' => $this->input->post('nilai_ulangan'),
            'nilai_uts' => $this->input->post('nilai_uts'),
            'nilai_uas' => $this->input->post('nilai_uas'),
            );
        $this->siswa_model->tambah_data($data);
        redirect(site_url('home/index'));
    }
    function hapus($id)
    {
        $this->siswa_model->hapus_data($id);
        redirect(site_url('home/index'));
    }
    public function edit($id_nilai)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $nilai_hariann = $this->siswa_model->select_nilai($id_nilai);
       $data = array(
            'nis' => set_value('nis',$nilai_hariann->nis),
            'id_nilai' => set_value('id_nilai',$nilai_hariann->id_nilai),
            'nik' => set_value('nik',$nilai_hariann->nilai_uas),
            'nilai_ulangan' => set_value('nilai_ulangan',$nilai_hariann->nilai_ulangan),
            'nilai_harian' => set_value('nilai_harian',$nilai_hariann->nilai_harian),
            'nilai_uas' => set_value('nilai_uas',$nilai_hariann->nilai_uas),
            'nilai_uts' => set_value('nilai_uts',$nilai_hariann->nilai_uts),
            
            
            'mapel' => $this->siswa_model->ambil_data_mapel(),
            'action' => site_url('home/edit_aksi')
            );
        

        $this->load->view('edit',$data);
        
    } 
    function edit_aksi()
    {
    
       
        $data = array(
         
            
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nilai_harian' => $this->input->post('nilai_harian'),
            'nilai_ulangan' => $this->input->post('nilai_ulangan'),
            'nilai_uts' => $this->input->post('nilai_uts'),
            'nilai_uas' => $this->input->post('nilai_uas'),
            );
        $ha =  $this->input->post('id_nilai');
        $this->siswa_model->edit_data($ha,$data);
        redirect(site_url('home/index'));
    }
     public function edit_kelas($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $kelas = $this->siswa_model->select_kelas($id);
       $data = array(
            'kode_kelas' => set_value('nis',$kelas->kode_kelas),
            'nama_kelas' => set_value('id_nilai',$kelas->nama_kelas),
            'nik' => set_value('nik',$kelas->nik),
            'guru' => $this->siswa_model->ambil_data_guru(),
            'action' => site_url('home/edit_kelas_aksi')
            );
        

        $this->load->view('edit_kelas',$data);
        
    } 
    function edit_kelas_aksi()
    { 
         $data = array(
            'nik' => $this->input->post('nik'),
            'nama_kelas' => $this->input->post('nama_kelas'),    
            );
       $ha =  $this->input->post('kode_kelas');
        $this->siswa_model->edit_data_kelas($ha,$data);
        redirect(site_url('home/kelas'));
    }
     public function edit_mapel($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $mapel = $this->siswa_model->select_mapel($id);
       $data = array(
            'kode_mapel' => set_value('kode_mapel',$mapel->kode_mapel),
            'nama_mapel' => set_value('nama_mapel',$mapel->nama_mapel),
           
            'action' => site_url('home/edit_mapel_aksi')
            );
        

        $this->load->view('edit_mapel',$data);
        
    } 
     function edit_mapel_aksi()
    { 
         $data = array(
            'kode_mapel' => $this->input->post('kode_kelas'),
            'nama_mapel' => $this->input->post('nama_mapel'),    
            );
       $ha =  $this->input->post('kode_mapel');
        $this->siswa_model->edit_data_mapel($ha,$data);
        redirect(site_url('home/mapel'));
    }
    public function edit_guru($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $guru = $this->siswa_model->select_guru($id);
       $data = array(
            
            'nik' => set_value('nik',$guru->nik),
            'nama_guru' => set_value('nama_guru',$guru->nama_guru),
            'alamat_guru' => set_value('alamat_guru',$guru->alamat_guru),
            'tmp_lahir' => set_value('tmp_lahir',$guru->tmp_lahir),
            'tgl_lahir' => set_value('tgl_lahir',$guru->tgl_lahir),
            'gender' => set_value('gender',$guru->gender),
            'agama' => set_value('agama',$guru->agama),
            'telp' => set_value('telp',$guru->telp),
            'pendidikan' => set_value('pendidikan',$guru->pendidikan),
            'status' => set_value('status',$guru->status),
            'pass_guru' => set_value('pass_guru',$guru->pass_guru),
            
            
            'action' => site_url('home/edit_guru_aksi')
            );
        

        $this->load->view('edit_guru',$data);
        
    } 
     function edit_guru_aksi()
    { 
         $data = array(
            'nik' => $this->input->post('nik'),
            'nama_guru' => $this->input->post('nama_guru'),
            'alamat_guru' => $this->input->post('alamat_guru'),
            'tmp_lahir' => $this->input->post('tmp_lahir'), 
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'gender' => $this->input->post('gender'), 
            'agama' => $this->input->post('agama'),
            'status' => $this->input->post('status'), 
            'pendidikan' => $this->input->post('pendidikan'),
            'pass_guru' => $this->input->post('pass_guru'), 
            'telp' => $this->input->post('telp'), 
            );
       $ha =  $this->input->post('nik');
        $this->siswa_model->edit_data_guru($ha,$data);
        redirect(site_url('home/guru'));
    }
    public function edit_ortu($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $ortu = $this->siswa_model->select_ortu($id);
       $data = array(
            
            'id_ortu' => set_value('id_ortu',$ortu->id_ortu),
            'nama_ortu' => set_value('nama_ortu',$ortu->nama_ortu),
            'alamat_ortu' => set_value('alamat_ortu',$ortu->alamat_ortu),
            
            'gender' => set_value('gender',$ortu->gender),
            'agama' => set_value('agama',$ortu->agama),
            'telp' => set_value('telp',$ortu->telp),
            'pekerjaan' => set_value('pekerjaan',$ortu->pekerjaan),
            'status' => set_value('status',$ortu->status),
            'pass' => set_value('pass',$ortu->pass),
            
            
            'action' => site_url('home/edit_ortu_aksi')
            );
        

        $this->load->view('edit_ortu',$data);
        
    } 
     public function edit_ortu_2($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $ortu = $this->siswa_model->select_ortu($id);
       $data = array(
            
            'id_ortu' => set_value('id_ortu',$ortu->id_ortu),
            'nama_ortu' => set_value('nama_ortu',$ortu->nama_ortu),
            'alamat_ortu' => set_value('alamat_ortu',$ortu->alamat_ortu),
            
            'gender' => set_value('gender',$ortu->gender),
            'agama' => set_value('agama',$ortu->agama),
            'telp' => set_value('telp',$ortu->telp),
            'pekerjaan' => set_value('pekerjaan',$ortu->pekerjaan),
            'status' => set_value('status',$ortu->status),
            'pass' => set_value('pass',$ortu->pass),
            
            
            'action' => site_url('home/edit_ortu_2_aksi')
            );
        

        $this->load->view('edit_ortu_2',$data);
        
    } 
    function edit_ortu_2_aksi()
    { 
         $data = array(
            'id_ortu' => $this->input->post('id_ortu'),
            'nama_ortu' => $this->input->post('nama_ortu'),
            'alamat_ortu' => $this->input->post('alamat_ortu'),
            
            'gender' => $this->input->post('gender'), 
            'agama' => $this->input->post('agama'),
            'status' => $this->input->post('status'), 
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pass' => $this->input->post('pass'), 
            'telp' => $this->input->post('telp'),
            );
       $ha =  $this->input->post('id_ortu');
        $this->siswa_model->edit_data_ortu($ha,$data);
        redirect(site_url('home/dataortu'));
    }
    function edit_ortu_aksi()
    { 
         $data = array(
            'id_ortu' => $this->input->post('id_ortu'),
            'nama_ortu' => $this->input->post('nama_ortu'),
            'alamat_ortu' => $this->input->post('alamat_ortu'),
            
            'gender' => $this->input->post('gender'), 
            'agama' => $this->input->post('agama'),
            'status' => $this->input->post('status'), 
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pass' => $this->input->post('pass'), 
            'telp' => $this->input->post('telp'),
            );
       $ha =  $this->input->post('id_ortu');
        $this->siswa_model->edit_data_ortu($ha,$data);
        redirect(site_url('home/ortu'));
    }
    public function edit_siswa($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $siswa = $this->siswa_model->select_siswa($id);
       $data = array(
            'nis' => set_value('nis',$siswa->nis),
                'nama_siswa' => set_value('nama_siswa',$siswa->nama_siswa),
                'alamat' => set_value('alamat',$siswa->alamat),
                'tmp_lahir' => set_value('tmp_lahir',$siswa->tmp_lahir),
                'tgl_lahir' => set_value('tgl_lahir',$siswa->tgl_lahir),
                'gender' => set_value('gender',$siswa->gender),
                'agama' => set_value('agama',$siswa->agama),
                'kode_kelas' => set_value('kode_kelas',$siswa->kode_kelas),
                'id_ortu' => set_value('id_ortu',$siswa->id_ortu),
                'pass_siswa' => set_value('pass_siswa',$siswa->pass_siswa),
            'ortu' => $this->siswa_model->ambil_data_ortu(),
            
            
            'kelas' => $this->siswa_model->ambil_data_kelas(),
            'action' => site_url('home/edit_siswa_aksi')
            );
        

        $this->load->view('edit_siswa',$data);
        
    } 
    public function edit_siswa_2($id)
    {
        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $siswa = $this->siswa_model->select_siswa($id);
       $data = array(
            'nis' => set_value('nis',$siswa->nis),
                'nama_siswa' => set_value('nama_siswa',$siswa->nama_siswa),
                'alamat' => set_value('alamat',$siswa->alamat),
                'tmp_lahir' => set_value('tmp_lahir',$siswa->tmp_lahir),
                'tgl_lahir' => set_value('tgl_lahir',$siswa->tgl_lahir),
                'gender' => set_value('gender',$siswa->gender),
                'agama' => set_value('agama',$siswa->agama),
                'kode_kelas' => set_value('kode_kelas',$siswa->kode_kelas),
                'id_ortu' => set_value('id_ortu',$siswa->id_ortu),
                'pass_siswa' => set_value('pass_siswa',$siswa->pass_siswa),
            'ortu' => $this->siswa_model->ambil_data_ortu(),
            
            
            'kelas' => $this->siswa_model->ambil_data_kelas(),
            'action' => site_url('home/edit_siswa_aksi_2')
            );
        

        $this->load->view('edit_siswa_2',$data);
        
    } 
     function edit_siswa_aksi()
    {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'alamat' => $this->input->post('alamat'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'gender' => $this->input->post('gender'),
            'agama' => $this->input->post('agama'),
            'kode_kelas' => $this->input->post('kode_kelas'),
            'id_ortu' => $this->input->post('id_ortu'),
            'pass_siswa' => $this->input->post('pass_siswa'),
            
            );
        $ha =  $this->input->post('nis');
        $this->siswa_model->edit_data_siswa($ha,$data);
        redirect(site_url('home/siswa'));
    }
    function edit_siswa_aksi_2()
    {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'alamat' => $this->input->post('alamat'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'gender' => $this->input->post('gender'),
            'agama' => $this->input->post('agama'),
            'kode_kelas' => $this->input->post('kode_kelas'),
            'id_ortu' => $this->input->post('id_ortu'),
            'pass_siswa' => $this->input->post('pass_siswa'),
            
            );
        $ha =  $this->input->post('nis');
        $this->siswa_model->edit_data_siswa($ha,$data);
        redirect(site_url('home/datasiswa'));
    }

    function tambah_kelas()
    {
       if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $data['guru'] = $this->siswa_model->ambil_data_guru();
        $data['action'] = site_url('home/tambah_kelas_aksi');
        $this->load->view('tambah_kelas',$data);
       
    }

    function tambah_kelas_aksi()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_kelas' => $this->input->post('nama_kelas'),    
            );
       
        $this->siswa_model->tambah_data_kelas($data);
        redirect(site_url('home/kelas'));
    }
    function tambah_mapel()
    {
       if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        
        $data['action'] = site_url('home/tambah_mapel_aksi');
        $this->load->view('tambah_mapel',$data);
       
    }
     function tambah_mapel_aksi()
    {
        $data = array(
            
            'nama_mapel' => $this->input->post('nama_mapel'),    
            );
       
        $this->siswa_model->tambah_data_mapel($data);
        redirect(site_url('home/mapel'));
    }
    function tambah_guru()
    {
       if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
       
        $data['action'] = site_url('home/tambah_guru_aksi');
        $this->load->view('tambah_guru',$data);
       
    }
    function tambah_guru_aksi()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_guru' => $this->input->post('nama_guru'),
            'alamat_guru' => $this->input->post('alamat_guru'),
            'tmp_lahir' => $this->input->post('tmp_lahir'), 
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'gender' => $this->input->post('gender'), 
            'agama' => $this->input->post('agama'),
            'status' => $this->input->post('status'), 
            'pendidikan' => $this->input->post('pendidikan'),
            'pass_guru' => $this->input->post('pass_guru'), 
            'telp' => $this->input->post('telp'),
              
            );
       
        $this->siswa_model->tambah_data_guru($data);
        redirect(site_url('home/guru'));
    }
    function tambah_ortu()
    {
       if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
       
        $data['action'] = site_url('home/tambah_ortu_aksi');
        $this->load->view('tambah_ortu',$data);
       
    }
    function tambah_ortu_aksi()
    {
        $data = array(
            'id_ortu' => $this->input->post('id_ortu'),
            'nama_ortu' => $this->input->post('nama_ortu'),
            'alamat_ortu' => $this->input->post('alamat_ortu'),
            
            'gender' => $this->input->post('gender'), 
            'agama' => $this->input->post('agama'),
            'status' => $this->input->post('status'), 
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pass' => $this->input->post('pass'), 
            'telp' => $this->input->post('telp'),
              
            );
       
        $this->siswa_model->tambah_data_ortu($data);
        redirect(site_url('home/ortu'));
    }
    function tambah_siswa()
    {
       if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }
        $data['ortu'] = $this->siswa_model->ambil_data_ortu();
       $data['kelas'] = $this->siswa_model->ambil_data_kelas();
        $data['action'] = site_url('home/tambah_siswa_aksi');
        $this->load->view('tambah_siswa',$data);
       
    }
    function tambah_siswa_aksi()
    {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tmp_lahir' => $this->input->post('tmp_lahir'), 
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'), 
            'agama' => $this->input->post('agama'),
             'kode_kelas' => $this->input->post('kode_kelas'),
             'id_ortu' => $this->input->post('id_ortu'),   
            'pass_siswa' => $this->input->post('pass_siswa'), 
           
            );
       
        $this->siswa_model->tambah_data_siswa($data);
        redirect(site_url('home/siswa'));
    }
}

/* End of file Workflows.php */
/* Location: ./application/controllers/Workflows.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 00:43:10 */
/* http://harviacode.com */