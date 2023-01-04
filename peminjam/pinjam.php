<?php
include_once("../config/config.php");
include_once("../config/functions.php");


    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_berakhir = $_POST['jam_berakhir'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $array = [
        'id_peminjaman' => null,
        'id_user' => $id_user,
        'jam_mulai' => $jam_mulai,
        'jam_berakhir' => $jam_berakhir,
        'tanggal' => $tanggal,
        'keterangan' => $keterangan,
        'status_peminjaman' => 0
    ];

    $pinjam = tambah($_POST);
    // $this->m_siplabs->add_data('peminjaman', $array);
    // var_dump($pinjam);
    if ($pinjam > 0) {
        echo "
        <script>
            alert('Pemesanan berhasil! Harap tunggu konfirmasi admin untuk menerima jadwal');
            document.location.href= 'https://api.whatsapp.com/send?phone=+6285727886700';
        </script>
        "; }
    // $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
    //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //     <h5><i class="icon fas fa-check"></i> Pemesanan berhasil!</h5>
    //     <span>Harap tunggu konfirmasi admin untuk menerima jadwal</span></div>');
    $tanggalformatted=date_create($tanggal);

    $admin = query("SELECT * FROM `user` WHERE level = 'Admin'");
    // $admin = $this->db->get_where('user', ['level'=>'Admin'])->row_array();

    // $url = 'https://api.whatsapp.com/send?phone=+6285727886700&text=Assalumalaikum%20Admin.%0A%0ARequest%20Peminjaman%20dengan%20Info%0Ausername%20%3A%20'.$username.'%0Ajam%20mulai%20%3A%20'.$jam_mulai.'%0Ajam%20selesai%20%3A%20'.$jam_berakhir.'%0Atanggal%20%3A%20'.date_format($tanggalformatted, 'd / m / Y').'%0Aketerangan%20%3A%20'.$keterangan;
    
    // redirect($url);