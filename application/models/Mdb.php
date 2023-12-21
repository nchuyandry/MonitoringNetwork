<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdb extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function shhost()
	{
		//return $this->db->query('SELECT * FROM tbnetwork ORDER BY name ASC');
		return $this->db->query('SELECT * FROM network ORDER BY name ASC');
	}
	public function cctv()
	{
		//return $this->db->query('SELECT * FROM tbnetwork ORDER BY name ASC');
		return $this->db->query('SELECT * FROM cctv ORDER BY name ASC');
	}
	public function hostdown()
	{
		return $this->db->query("SELECT * FROM network WHERE status = 0");
	}
	public function shownet()
	{
		return $this->db->query('SELECT * FROM thostname ORDER BY name ASC');
	}
	public function updatenet($ip, $data)
	{
		$this->db->where('name',$ip);
		$this->db->update('tbnetwork',$data);
	}
	public function updatenet2($ip, $data)
	{
		$this->db->where('name',$ip);
		$this->db->update('thostname',$data);
	}
	public function netdetail($ip,$bulan)
	{
		//$bulan = date('Y-m')."-01";
		return $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
		/*if($result->num_rows() > 0){
			return $result->row();
		}else{
			return $result->result();
		}*/
		
	}
	public function insertdetail($data)
	{
		$this->db->insert('network_detail',$data);
	}
	public function updatedetail($ip, $detail)
	{
		$bulan = date('Y-m'). "-01";
		//$this->db->query("UPDATE network_detail SET lastfail='$detail' WHERE name='$ip' and bulan='$bulan'");
		$this->db->where('name', $ip);
		$this->db->where('bulan', $bulan);
		$this->db->update('network_detail',$detail);
		
	}
	public function updatefail($ip, $detail)
	{
		$bulan = date('Y-m'). "-01";
		$this->db->query("UPDATE network_detail SET fail='$detail' WHERE name='$ip' and bulan='$bulan'");
	}
	public function updatelastfail($ip, $detail)
	{
		$bulan = date('Y-m'). "-01";
		$this->db->query("UPDATE network_detail SET lastfail='$detail' WHERE name='$ip' and bulan='$bulan'");
	}
	public function insertlog($hasil)
	{
		$this->db->insert('network_log', $hasil);
	}
	public function addcctv($data)
	{
		$this->db->insert('cctv', $data);
	}
}