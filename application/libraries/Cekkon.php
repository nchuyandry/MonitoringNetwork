<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekkon {
	
	public function Ping($ip){
		exec("ping -n 1 $ip", $output, $status);
            if ($status == 0){
                	$status = 1;
                	$totaldown = 0;
                    $packet_lost = explode(",",$output[5]);
                    $ping = explode(",",$output[7]);

                    $packet_lost = substr($packet_lost[2],7);
                    $ping = substr($ping[2],10);

                    $packet_lost = explode("(", $packet_lost);
                    $packet_lost = explode("%", $packet_lost[1]);
                    $packet_lost = $packet_lost[0];

                    $ping = str_replace('ms', '', $ping);
            }else{
                	$status = 0;
                	$totaldown = 1;
                    $ping = "0";
                    $packet_lost = "100";
            }
        return $ping;
        return $status;
        echo $ip. "= Latency is ". $ping ."ms <br />";
        
	}
}
