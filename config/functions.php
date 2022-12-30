<?php

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function accrequest($id_peminjaman)
	{

		$cekpeminjaman = $this->db->get_where('peminjaman', ['id_peminjaman' => $id_peminjaman])->row_array();

		$nowtime = strtotime(date('H:i:s')) + strtotime(date('Y-m-d'));

		$dbstart = strtotime($cekpeminjaman['jam_mulai']) + strtotime($cekpeminjaman['tanggal']);
		$dbend = strtotime($cekpeminjaman['jam_berakhir']) + strtotime($cekpeminjaman['tanggal']);

		if ($nowtime >= $dbstart and $nowtime <= $dbend) {
			$ruangan = $cekpeminjaman['id_ruangan'];
			$cekjadwal = $this->db->query('SELECT * FROM jadwal INNER JOIN peminjaman, ruangan 
			WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
			AND peminjaman.id_ruangan=ruangan.id_ruangan
			AND status_jadwal=1
			AND peminjaman.id_ruangan=' . $ruangan)->row_array();

			if ($cekjadwal) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal diterima, jadwal bentrok!</div>');
				redirect('admin/request');
			} else {
				$this->db->update('ruangan', ['status_ruangan' => 'Dipakai'], ['id_ruangan' => $cekpeminjaman['id_ruangan']]);
				$this->db->update('peminjaman', array('status_peminjaman' => 1), array('id_peminjaman' => $id_peminjaman));
				$this->db->insert('jadwal', array(
					'id_jadwal' => null,
					'id_peminjaman' => $id_peminjaman,
					'status_jadwal' => 1
				));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request diterima!</div>');
				redirect('admin/request');
			}
		} elseif ($nowtime < $dbstart) {
			$ruangan = $cekpeminjaman['id_ruangan'];
			$cekjadwal = $this->db->query('SELECT * FROM jadwal INNER JOIN peminjaman, ruangan 
			WHERE jadwal.id_peminjaman=peminjaman.id_peminjaman
			AND peminjaman.id_ruangan=ruangan.id_ruangan
			AND status_jadwal=2
			AND peminjaman.id_ruangan=' . $ruangan)->row_array();

			$dbone = strtotime($cekjadwal['jam_mulai']) + strtotime($cekjadwal['jam_ berakhir']) + strtotime($cekjadwal['tanggal']);

			$dbtwo = strtotime($cekpeminjaman['jam_mulai']) + strtotime($cekpeminjaman['jam_ berakhir']) + strtotime($cekpeminjaman['tanggal']);

			if ($dbone == $dbtwo) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal diterima, jadwal bentrok!</div>');
				redirect('admin/request');
			} else {
				$this->db->update('peminjaman', array('status_peminjaman' => 2), array('id_peminjaman' => $id_peminjaman));
				$this->db->insert('jadwal', array(
					'id_jadwal' => null,
					'id_peminjaman' => $id_peminjaman,
					'status_jadwal' => 2
				));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request diterima!</div>');
				redirect('admin/request');
			}
		} else {
			$this->db->insert('jadwal', array(
				'id_jadwal' => null,
				'id_peminjaman' => $id_peminjaman,
				'status_jadwal' => 1
			));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request diterima!</div>');
			redirect('admin/request');
		}
}