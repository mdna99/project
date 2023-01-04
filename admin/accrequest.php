<?php
// include_once("../config/config.php");
include_once("../config/functions.php");

	$id_peminjaman = $_GET["id"];
	$cekpeminjaman = squery("SELECT * FROM peminjaman WHERE id_peminjaman = $id_peminjaman");
	// $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row_array();

	$nowtime = strtotime(date('H:i:s')) + strtotime(date('Y-m-d'));

	$dbstart = strtotime($cekpeminjaman['jam_mulai']) + strtotime($cekpeminjaman['tanggal']);
	$dbend = strtotime($cekpeminjaman['jam_berakhir']) + strtotime($cekpeminjaman['tanggal']);

	if ($nowtime >= $dbstart and $nowtime <= $dbend) {
		$ruangan = $cekpeminjaman['id_ruangan'];
		$cekjadwal = squery("SELECT * FROM jadwal INNER JOIN peminjaman
		WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
		AND status_jadwal=1");

		if ($cekjadwal) {
			echo "
            <script>
                alert('Gagal diterima, jadwal bentrok!');
                document.location.href= 'pengajuan.php';
            </script>
            ";
		} else {
			query("UPDATE peminjaman SET
						status_peminjaman = 1
					WHERE
						id_peminjaman = $id_peminjaman
				");
			query("INSERT INTO jadwal ('id_jadwal', 'id_peminjaman', 'status_jadwal') 
						VALUES
					(NULL, '$id_peminjaman', 1)");
			// $this->db->update('peminjaman', array('status_peminjaman' => 1), array('id_peminjaman' => $id_peminjaman));
			// $this->db->insert('jadwal', array(
			// 	'id_jadwal' => null,
			// 	'id_peminjaman' => $id_peminjaman,
			// 	'status_jadwal' => 1
			// ));
			echo "
            <script>
                alert('Request diterima!');
                document.location.href= 'pengajuan.php';
            </script>
            ";
			// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request diterima!</div>');
			// redirect('admin/request');
		}
	} elseif ($nowtime < $dbstart) {
		$cekjadwal = squery("SELECT * FROM jadwal INNER JOIN peminjaman
		WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
		AND status_jadwal=2");

		$dbone = strtotime($cekjadwal['jam_mulai']) + strtotime($cekjadwal['jam_ berakhir']) + strtotime($cekjadwal['tanggal']);

		$dbtwo = strtotime($cekpeminjaman['jam_mulai']) + strtotime($cekpeminjaman['jam_ berakhir']) + strtotime($cekpeminjaman['tanggal']);

		if ($dbone == $dbtwo) {
			echo "
            <script>
                alert('Gagal diterima, jadwal bentrok!');
                document.location.href= 'pengajuan.php';
            </script>
            ";
			// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal diterima, jadwal bentrok!</div>');
			// redirect('admin/request');
		} else {
			query("UPDATE peminjaman SET status_peminjaman = 2 WHERE id_peminjaman = '$id_peminjaman'");
			query("INSERT INTO jadwal ('id_jadwal', 'id_peminjaman', 'status_jadwal')
						VALUES
					(NULL, '$id_peminjaman', 2)");
			// $this->db->update('peminjaman', array('status_peminjaman' => 2), array('id_peminjaman' => $id_peminjaman));
			// $this->db->insert('jadwal', array(
			// 	'id_jadwal' => null,
			// 	'id_peminjaman' => $id_peminjaman,
			// 	'status_jadwal' => 2
			// ));
			echo "
            <script>
                alert('Request diterima!');
                document.location.href= 'pengajuan.php';
            </script>
            ";
			// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request diterima!</div>');
			// redirect('admin/request');
		}
	} else {
		query("INSERT INTO jadwal ('id_jadwal', 'id_peminjaman', 'status_jadwal')
				VALUES
			(NULL, '$id_peminjaman', 1)");
		// $this->db->insert('jadwal', array(
		// 	'id_jadwal' => null,
		// 	'id_peminjaman' => $id_peminjaman,
		// 	'status_jadwal' => 1
		// ));
		echo "
            <script>
                alert('Request diterima!');
                document.location.href= 'pengajuan.php';
            </script>
            ";
		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request diterima!</div>');
		// redirect('admin/request');
	}
