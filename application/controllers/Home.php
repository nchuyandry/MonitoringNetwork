<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		$CI =& get_instance();
		$this->load->library('Curl');
		$this->load->library('Cekkon');
		$this->load->library('ping');
		$this->load->library('Ppping');
		$this->load->helper('url');
		$this->load->model('Mdb');
	} 
	function tes()
	{
		/*error_reporting(0);
    	ini_set('display_errors', 0); 
		$this->Ppping = new Ppping();
		$this->Ppping->hostname = "10.32.0.6";
		$ip = "10.32.0.6";
		$ping = $this->Ppping->Ping();
		if (($this->Ppping < 0) || ($ping < 0)) {				
			echo $ip. " = Error: ".$this->Ppping->strError($ping)."<br/ >";
		}else{
			echo $ip." = ".$ping." ms<br/ >";
		}*/
		$ipc = $this->Mdb->cctv()->result();
		foreach($ipc as $row){
			$ip = $row->ip;
			exec("ping -n 1 $ip", $output, $status);
			echo $ip. " - " .$status. "<br/>";
		}
		
	}
	public function index()
	{
		error_reporting(E_ERROR | E_PARSE);
		$data['currentmonth'] = date('Y-m');
		$data['monthonly'] = date('m');
		if (isset($_REQUEST['month']) != "") {
			$data['currentmonth'] = $_REQUEST['year']."-".$_REQUEST['month'];
			$data['monthonly'] = $_REQUEST['month'];
		}
		$data['currentime'] = date('Y-m-d H:i:s');
		if ($data['currentmonth'] != date('Y-m')) {
			$data['currentime'] = date('Y-m-d H:i:s', strtotime($data['currentmonth'].'-01 00:00:00 +1 month -1 second'));
		}
		$data['down'] = $this->Mdb->hostdown()->result();
		$data['host'] = $this->Mdb->shhost()->result();
		$this->load->view('home2',$data);
	}
	public function cctv()
	{
		error_reporting(0);
    	ini_set('display_errors', 0); 
		$data['cctv'] = $this->Mdb->cctv();
		$this->load->view('cctv', $data);
	}
	public function savecctv()
	{
		$name = $this->input->post('name');
		$ip = $this->input->post('ip');
		$port = $this->input->post('port');
		$data = array(
			'name' => $name,
			'ip' => $ip,
			'port' => $port
		);
		var_dump($data);
		$this->Mdb->addcctv($data);
		redirect(base_url('cctv'));
	}
	function monitor()
	{
		error_reporting(0);
    	ini_set('display_errors', 0); 
		$jumlah = $this->Mdb->shhost()->num_rows();
        $net = $this->Mdb->shhost()->result();
        //$net = $this->Mdb->shownet()->result();
		$this->Ppping = new Ppping();
		foreach($net as $row){
			$this->Ppping->hostname = $row->name;
			$ping = $this->Ppping->Ping();
			$ip = $row->name;				
			$bulan = date('Y-m')."-01";
			$now = date('Y-m-d H:i:s');
			if (($this->Ppping < 0) || ($ping < 0)) {				
				
				echo $ip. " = Error: ".$this->Ppping->strError($ping)."<br/ >";
				$this->db->query("UPDATE tbnetwork SET response=-1 WHERE name='$ip'");
				$result = $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
				if ($result->num_rows() == 0) {
					$this->db->query("INSERT INTO network_detail(name,bulan,success,fail,lastfail) VALUES('$ip','$bulan',0,1,0)");
				} else {
					$fail = $result->row('fail') + 1;
					$this->db->query("UPDATE network_detail SET fail='$fail' WHERE name='$ip' and bulan='$bulan'");
				}
				
				$result2 = $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
				$lastfail = $result2->row('lastfail') + 1;
				$this->db->query("UPDATE network_detail SET lastfail='$lastfail' WHERE name='$ip' and bulan='$bulan'");
				
				if ($row->status == 1) {
					$this->db->query("UPDATE tbnetwork SET status=0 WHERE name='$ip'");
					$this->db->query("INSERT INTO network_log(name,status,time,response) VALUES('$ip','0','$now','$ping')");
				} else if (($result2->row('lastfail') + 1) == 5) {
					
					echo "5x timeout";
				}
			}else{
				echo $row->name." = ".$ping." ms<br/ >";
				$this->db->query("UPDATE tbnetwork SET response='$ping' WHERE name='$ip'");
				$result= $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
				//var_dump(!$result);
				if ($result->num_rows() == 0) {
					$this->db->query("INSERT INTO network_detail(name,bulan,success,fail,lastfail) VALUES('$ip','$bulan',1,0,0)");
				} else {
					$success = $result->row('success') + 1;
					//echo $ip. "-" .$bulan. "-" .$success. "<br/>";
					$this->db->query("UPDATE network_detail SET success='$success' WHERE name = '$ip' and bulan = '$bulan'");					
				}
				
				$result2= $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
				if ($row->status == 0) {
					$this->db->query("UPDATE tbnetwork SET status=1 WHERE name='$ip'");
					$totaldown = $result2->row('lastfail');
					$this->db->query("INSERT INTO network_log(name,status,time,response,totaldown) VALUES('$ip','1','$now','$ping','$totaldown')");
					$this->db->query("UPDATE network_detail SET lastfail=0 WHERE name='$ip' and bulan='$bulan'");
				}
			}
		}
	}
	function pingaddr()
	{

        $jumlah = $this->Mdb->cctv()->num_rows();
        $net = $this->Mdb->cctv()->result();
        $arr = [];
        $hasil = [];

        if ($jumlah != 0){
            foreach($net as $row){
                //mengambil ping dan packet lost setiap domain yang terdaftar
                $ip = $row->ip;
                exec("ping -n 1 $ip", $output, $status);
                if ($status == 0){
                    $packet_lost = explode(",",$output[5]);
                    $ping = explode(",",$output[7]);
					
					var_dump($packet_lost);
					echo "<br/>";
					var_dump($ping);
					
                    $packet_lost = substr($packet_lost[2],7);
                    $ping = substr($ping[2],10);

                    $packet_lost = explode("(", $packet_lost);
                    $packet_lost = explode("%", $packet_lost[1]);
                    $packet_lost = $packet_lost[0];

                    $ping = str_replace('ms', '', $ping);
                }else{
                    $ping = "0";
                    $packet_lost = "100";
                }
                //var_dump($ping);
		        /*if(($status == 0) || ($ping == 0)){
					echo $ip ." = Error: ". $status ."<br/ >";
					$result= $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
					
					$up = $result->row('success');
					$down = $result->row('fail');
					$down2 = $result->row('lastfail');
					if($result->num_rows() == 0 ){
	                	$detail = array(
	                		'name' => $ip,
	                		'bulan' => date('Y-m')."-01",
	                		'success' => 0,
	                		'fail' => 1,
	                		'lastfail' => 0                		
	                	);
						$this->Mdb->insertdetail($detail);
						//echo "insert<br/>";
					}else{
						$detail = array(
	                		'fail' =>  $down + 1            		
	                	);
	                	//var_dump($detail);
	                	//echo "update<br/>";
						$this->Mdb->updatedetail($ip, $detail);
					}
					$detail = array(
	                		'lastfail' =>  $down2 + 1            		
	                	);
	                	//var_dump($detail);
	                	//echo "update<br/>";
					$this->Mdb->updatedetail($ip, $detail);
					//var_dump($totaldown);
					if($status == 0){
						$log = array(
		                	'name' => $row->name,
		                	'status' => $status,
		                	'time' => date('Y-m-d H:i:s'),
		                	'response' => $ping,
		                	'totaldown' => $totaldown
		                );
		                $this->Mdb->insertlog($log);
					}
				}else{
					echo $ip ." = ". $ping." ms<br/ >";
					$net = array(
	                	'status' => $status,
	                	'response' => $ping
	                );
	                 $this->Mdb->updatenet($ip, $net);	                 
                	 $bulan = date('Y-m')."-01";
	                 $result= $this->db->query("SELECT * FROM network_detail where name = '$ip' and bulan = '$bulan'");
					
					$up = $result->row('success');
					$down = $result->row('fail');
					$down2 = $result->row('lastfail');
					if($result->num_rows() == 0 ){
	                	$detail = array(
	                		'name' => $ip,
	                		'bulan' => date('Y-m')."-01",
	                		'success' => 1,
	                		'fail' => 0,
	                		'lastfail' => 0                		
	                	);
						$this->Mdb->insertdetail($detail);
						//echo "insert<br/>";
					}else{
						$detail = array(
	                		'success' =>  $up + 1            		
	                	);
	                	//var_dump($detail);
	                	//echo "update<br/>";
						$this->Mdb->updatedetail($ip, $detail);
					}
					if ($status == 1) {
				 		$log = array(
		                	'name' => $row->name,
		                	'status' => $status,
		                	'time' => date('Y-m-d H:i:s'),
		                	'response' => $ping,
		                	'totaldown' => 0
		                );
		                $this->Mdb->insertlog($log);
						$detail = array(
	                		'lastfail' =>  $down2            		
	                	);
	                	//var_dump($detail);
	                	//echo "update<br/>";
						$this->Mdb->updatedetail($ip, $detail);					
				 	}
				}*/
                
                
				
                
                
            	/*echo "<pre>";
		      	var_dump($log);
		      	echo "</pre>";*/
		      	
                array_push($arr, $ip, $status);

                array_push($hasil, $arr);
                $arr = [];
                $output =[];
                $status =[];
                
                
          }
      }else {
          $hasil = 'kosong';
      }
    	
      
    
      	
        //echo json_encode($hasil);
		
    	//
	}
	
}
