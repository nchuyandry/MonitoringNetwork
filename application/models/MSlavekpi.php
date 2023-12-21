<?php

class MSlavekpi extends CI_Model
{
	function kpidmsasa()
	{
		$query = $this->db->query("SELECT kalender.tanggal AS DATE, tabel_log.created_on AS datelog,  tabel_log.nama ,kalender.nama, tabel_total_jam_satu_bulan.total_jam, IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN kalender ON (DATE(tabel_log.created_on)) = kalender.tanggal AND tabel_log.nama = kalender.nama RIGHT JOIN tabel_total_jam_satu_bulan ON MONTH(kalender.tanggal) = tabel_total_jam_satu_bulan.id WHERE kalender.nama = 'dms3asakdy' AND (kalender.tanggal BETWEEN (SELECT MIN(DATE('2020-01-01')) FROM tabel_log) AND (SELECT MAX(DATE('2020-12-31')) FROM tabel_log)) GROUP BY MONTH(kalender.tanggal) ORDER BY DATE ASC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	function kpidmstvip()
	{
		$query = $this->db->query("SELECT kalender.tanggal AS DATE, tabel_log.created_on AS datelog,  tabel_log.nama ,kalender.nama, tabel_total_jam_satu_bulan.total_jam, IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN kalender ON (DATE(tabel_log.created_on)) = kalender.tanggal AND tabel_log.nama = kalender.nama RIGHT JOIN tabel_total_jam_satu_bulan ON MONTH(kalender.tanggal) = tabel_total_jam_satu_bulan.id WHERE kalender.nama = 'dms3tvipkdy' AND (kalender.tanggal BETWEEN (SELECT MIN(DATE('2020-01-01')) FROM tabel_log) AND (SELECT MAX(DATE('2020-12-31')) FROM tabel_log)) GROUP BY MONTH(kalender.tanggal) ORDER BY DATE ASC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	function kpihris()
	{
		$query = $this->db->query("SELECT kalender.tanggal AS DATE, tabel_log.created_on AS datelog,  tabel_log.nama ,kalender.nama, tabel_total_jam_satu_bulan.total_jam, IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN kalender ON (DATE(tabel_log.created_on)) = kalender.tanggal AND tabel_log.nama = kalender.nama RIGHT JOIN tabel_total_jam_satu_bulan ON MONTH(kalender.tanggal) = tabel_total_jam_satu_bulan.id WHERE kalender.nama = 'hris' AND (kalender.tanggal BETWEEN (SELECT MIN(DATE('2020-01-01')) FROM tabel_log) AND (SELECT MAX(DATE('2020-12-31')) FROM tabel_log)) GROUP BY MONTH(kalender.tanggal) ORDER BY DATE ASC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	function kpimodust()
	{
		$query = $this->db->query("SELECT kalender.tanggal AS DATE, tabel_log.created_on AS datelog,  tabel_log.nama ,kalender.nama, tabel_total_jam_satu_bulan.total_jam, IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN kalender ON (DATE(tabel_log.created_on)) = kalender.tanggal AND tabel_log.nama = kalender.nama RIGHT JOIN tabel_total_jam_satu_bulan ON MONTH(kalender.tanggal) = tabel_total_jam_satu_bulan.id WHERE kalender.nama = 'modust' AND (kalender.tanggal BETWEEN (SELECT MIN(DATE('2020-01-01')) FROM tabel_log) AND (SELECT MAX(DATE('2020-12-31')) FROM tabel_log)) GROUP BY MONTH(kalender.tanggal) ORDER BY DATE ASC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	function kpiwaterin()
	{
		$query = $this->db->query("SELECT kalender.tanggal AS DATE, tabel_log.created_on AS datelog,  tabel_log.nama ,kalender.nama, tabel_total_jam_satu_bulan.total_jam, IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN kalender ON (DATE(tabel_log.created_on)) = kalender.tanggal AND tabel_log.nama = kalender.nama RIGHT JOIN tabel_total_jam_satu_bulan ON MONTH(kalender.tanggal) = tabel_total_jam_satu_bulan.id WHERE kalender.nama = 'waterin' AND (kalender.tanggal BETWEEN (SELECT MIN(DATE('2020-01-01')) FROM tabel_log) AND (SELECT MAX(DATE('2020-12-31')) FROM tabel_log)) GROUP BY MONTH(kalender.tanggal) ORDER BY DATE ASC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	function kpiwaterout()
	{
		$query = $this->db->query("SELECT kalender.tanggal AS DATE, tabel_log.created_on AS datelog,  tabel_log.nama ,kalender.nama, tabel_total_jam_satu_bulan.total_jam, IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN kalender ON (DATE(tabel_log.created_on)) = kalender.tanggal AND tabel_log.nama = kalender.nama RIGHT JOIN tabel_total_jam_satu_bulan ON MONTH(kalender.tanggal) = tabel_total_jam_satu_bulan.id WHERE kalender.nama = 'waterout' AND (kalender.tanggal BETWEEN (SELECT MIN(DATE('2020-01-01')) FROM tabel_log) AND (SELECT MAX(DATE('2020-12-31')) FROM tabel_log)) GROUP BY MONTH(kalender.tanggal) ORDER BY DATE ASC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}
	function totalkpi()
	{
		$query = $this->db->query("SELECT calendar.datefield AS DATE,IFNULL(SUM(tabel_log.fail),0) AS tfail FROM tabel_log RIGHT JOIN calendar ON (DATE(tabel_log.created_on) = calendar.datefield) WHERE (calendar.datefield BETWEEN (SELECT MIN(DATE(datefield)) FROM tabel_log) AND (SELECT MAX(DATE(datefield)) FROM tabel_log))GROUP BY MONTH(DATE)");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}




	//	--------------------------------------------------------------------------------------------------------------------------------
	function showjam()
	{
		$query = $this->db->get('tabel_total_jam_satu_bulan');
		return $query->result_array();
	}
	function jamjan()
	{
		$query = $this->db->select('total_jam')->where('bulan', 'jan')->get('tabel_total_jam_satu_bulan');
		return $query->result_array();
	}
	////	=====================================================================HRIS======================================================================
}