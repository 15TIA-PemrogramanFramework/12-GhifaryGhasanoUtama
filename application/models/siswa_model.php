<?php
/**
 * 
 */
 class siswa_model extends CI_Model
 {
 	public $nama_table = 'siswaa';
 	public $id = 'nis';
 	public $nama_table_guru = 'guru';
 	public $id_guru = 'nik';
 	public $nama_table_ortu = 'ortu';
 	public $id_ortu = 'id_ortu';
 	public $nama_table_nilai = 'nilai';
 	public $id_nilai = 'id_nilai';
 	public $nama_table_kelas = 'kelas';
 	public $id_kelas = 'kode_kelas';
 	public $nama_table_mapel = 'mapel';
 	public $id_mapel = 'kode_mapel';
 	public $nis = 'nis';
 	public $order = 'DESC';

 	function __construct()
 	{

 		parent::__construct();
 	}

 	//untuk mengambil data seluruh mahasiswa
 	function ambil_data_siswa()
 	{
 		$this->db->distinct();
 		$this->db->select('a.nama_siswa ,a.nis ,  a.alamat , a.tmp_lahir , a.gender, a.tgl_lahir , a.agama , b.nama_kelas , c.nama_ortu , a.pass_siswa');
 		$this->db->from('siswaa a');
 		$this->db->join('kelas b', 'b.kode_kelas = a.kode_kelas');
 		$this->db->join('ortu c', 'c.id_ortu = a.id_ortu');
 		
 		return $this->db->get($this->nama_table)->result();
 	}
 	function ambil_data_siswax($id)
 	{
 		$this->db->distinct();
 		$this->db->select('a.nama_siswa ,a.nis ,  a.alamat , a.tmp_lahir , a.gender , a.tgl_lahir , a.agama , b.nama_kelas , c.nama_ortu , a.pass_siswa');
 		$this->db->from('siswaa a');
 		$this->db->join('kelas b', 'b.kode_kelas = a.kode_kelas');
 		$this->db->join('ortu c', 'c.id_ortu = a.id_ortu');
 		$this->db->where('a.nis',$id);
 		
 		return $this->db->get($this->nama_table)->result();
 	}

 	function ambil_data_ortu()
 	{
 		$data['ortu'] = $this->db->order_by($this->id_ortu, $this->order);
 		return $this->db->get($this->nama_table_ortu)->result();
 	}
 	
 	function ambil_data_ortux($ido)
 	{
 	
 		
 		$this->db->where($this->id_ortu,$ido);
 		return $this->db->get($this->nama_table_ortu)->result();
 	}
 	function ambil_data_guru()
 	{
 		$data['guru'] = $this->db->order_by($this->id_guru, $this->order);
 		return $this->db->get($this->nama_table_guru)->result();
 	}
 	function ambil_data_nilai()
 	{
 		$this->db->distinct();
 		$this->db->select('a.nama_siswa nasis,c.id_nilai, b.nama_mapel napel, d.nama_guru ,  c.nilai_harian, c.nilai_ulangan, c.nilai_uts , c.nilai_uas');
 		$this->db->from('nilai c');
 		$this->db->join('siswaa a', 'a.nis = c.nis');
 		$this->db->join('mapel b', 'b.kode_mapel = c.kode_mapel');
 		$this->db->join('guru d', 'd.nik = c.nik');
 		
 		return $this->db->get($this->nama_table_nilai)->result();
 	}
 	function ambil_data_nilaix($idx)
 	{

 		$this->db->distinct();
 		$this->db->select('b.nama_mapel napel, d.nama_guru ,  c.nilai_harian, c.nilai_ulangan, c.nilai_uts , c.nilai_uas');
 		$this->db->from('nilai c');
 		
 		$this->db->join('siswaa a', 'a.nis = c.nis');
 		$this->db->join('mapel b', 'b.kode_mapel = c.kode_mapel');
 		$this->db->join('guru d', 'd.nik = c.nik');
 		$this->db->where('a.nis',$idx);
 		
 		
 		return $this->db->get($this->nama_table_nilai)->result();
 	}
 	function ambil_data_nilais($idx)
 	{

 		$this->db->distinct();
 		$this->db->select('b.nama_mapel napel, d.nama_guru ,  c.nilai_harian, c.nilai_ulangan, c.nilai_uts , c.nilai_uas');
 		$this->db->from('nilai c');
 		
 		$this->db->join('siswaa a', 'a.nis = c.nis');
 		$this->db->join('mapel b', 'b.kode_mapel = c.kode_mapel');
 		$this->db->join('guru d', 'd.nik = c.nik');
 		$this->db->where('a.nis',$idx);
 		
 		
 		return $this->db->get($this->nama_table_nilai)->result();
 	}
 	function ambil_data_kelas()
 	{
 		$this->db->distinct();
 		$this->db->select('a.nama_kelas , b.nama_guru , a.kode_kelas' );
 		$this->db->from('kelas a');
 		$this->db->join('guru b', 'b.nik = a.nik');
 		
 		
 		return $this->db->get($this->nama_table_kelas)->result();
 	}
 	function select_nama_guru($id)
 	{
 	
 		$this->db->select('nik , pass_guru');
 		$this->db->where($this->id_guru, $id);
 		
 		
 		return $this->db->get($this->nama_table_guru)->row();
 	}
 	function select_nama_ortu($id)
 	{
 	
 		$this->db->select('id_ortu , pass');
 		$this->db->where($this->id_ortu, $id);
 		
 		
 		return $this->db->get($this->nama_table_ortu)->row();
 	}
 	function select_nama_siswa($id)
 	{
 	
 		$this->db->select('nis , pass_siswa');
 		$this->db->where($this->id, $id);
 		
 		
 		return $this->db->get($this->nama_table)->row();
 	}

 	function ambil_data_id($id)
 	{
 		$this->db->where($this->id,$id);
 		return $this->db->get($this->nama_table)->row();
 	}
 	function ambil_data_mapel()
 	{
 		$data['mapel'] = $this->db->order_by($this->id_mapel, $this->order);
 		return $this->db->get($this->nama_table_mapel)->result();
 	}
 	function tambah_data($data)
 	{
 		return $this->db->insert($this->nama_table_nilai, $data);
 	}
 	function tambah_data_kelas($data)
 	{
 		return $this->db->insert($this->nama_table_kelas, $data);
 	}
 	function tambah_data_mapel($data)
 	{
 		return $this->db->insert($this->nama_table_mapel, $data);
 	}
 	function tambah_data_guru($data)
 	{
 		return $this->db->insert($this->nama_table_guru, $data);
 	}
 	function tambah_data_ortu($data)
 	{
 		return $this->db->insert($this->nama_table_ortu, $data);
 	}
 	function tambah_data_siswa($data)
 	{
 		return $this->db->insert($this->nama_table, $data);
 	}
 	function hapus_data($id)
 	{
 		$this->db->where($this->id_nilai, $id);
 		$this->db->delete($this->nama_table_nilai);
 	}
 	function select_nilai($ide)
 	{
 		$this->db->where($this->id_nilai,$ide);
 		return $this->db->get($this->nama_table_nilai)->row();
 	}
 	function select_mapel($ide)
 	{
 		$this->db->where($this->id_mapel,$ide);
 		return $this->db->get($this->nama_table_mapel)->row();
 	}
 	function select_kelas($ide)
 	{
 		$this->db->where($this->id_kelas,$ide);
 		return $this->db->get($this->nama_table_kelas)->row();
 	}
 	function select_siswa($id)
 	{
 		$this->db->where($this->id,$id);
 		return $this->db->get($this->nama_table)->row();
 	}
 	function select_siswa_ortu($id)
 	{
 		
 		$this->db->where($this->id_ortu, $id);
 		return $this->db->get($this->nama_table)->row();
 	}
 	function select_guru($id)
 	{
 		$this->db->where($this->id_guru,$id);
 		return $this->db->get($this->nama_table_guru)->row();
 	}
 	function select_ortu($id)
 	{
 		$this->db->where($this->id_ortu,$id);
 		return $this->db->get($this->nama_table_ortu)->row();
 	}
 	function edit_data($id_nilai,$data)
 	{
 		$this->db->where($this->id_nilai, $id_nilai);
 		$this->db->update($this->nama_table_nilai,$data);
 	}
 	function edit_data_siswa($id,$data)
 	{
 		$this->db->where($this->id, $id);
 		$this->db->update($this->nama_table,$data);
 	}
 	function edit_data_kelas($id,$data)
 	{
 		$this->db->where($this->id_kelas, $id);
 		$this->db->update($this->nama_table_kelas,$data);
 	}
 	function edit_data_guru($id,$data)
 	{
 		$this->db->where($this->id_guru, $id);
 		$this->db->update($this->nama_table_guru,$data);
 	}
 	function edit_data_ortu($id,$data)
 	{
 		$this->db->where($this->id_ortu, $id);
 		$this->db->update($this->nama_table_ortu,$data);
 	}
 	function edit_data_mapel($id,$data)
 	{
 		$this->db->where($this->id_mapel, $id);
 		$this->db->update($this->nama_table_mapel,$data);
 	}
 	
 	
 } 
 ?>