<?php
include_once("../template/head.php");
include_once("../template/bodyA.php");
$jadwal = query("SELECT * FROM peminjaman");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Peminjaman</h1>
    </div>

    <div class="card shadow">
        <div class="card-header text-center">
            <h2>Kelola Jadwal</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>Jam Mulai</th>
                            <th>Jam Berakhir</th>
                            <th>Tanggal</th>
                            <th>Keterangan Peminjaman</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyjadwal">
                        <?php $no = 1; ?>
                        <?php foreach ($jadwal as $q) : ?>
                            <?php
                            // atur jadwal
                            $nowtime = strtotime(date('H:i:s')) + strtotime(date('Y-m-d'));
                            $dbstart = strtotime($q->jam_mulai) + strtotime($q->tanggal);
                            $dbend = strtotime($q->jam_berakhir) + strtotime($q->tanggal);
                            $id_jadwal = $q->id_jadwal;
                            ?>
                            <?php if ($dbend < $nowtime) {
                                $this->db->update('ruangan', ['status_ruangan' => 'Nganggur'], ['id_ruangan' => $q->id_ruangan]);
                                $this->db->update('jadwal', ['status_jadwal' => 3], ['id_jadwal' => $id_jadwal]);
                            } elseif ($nowtime >= $dbstart and $nowtime <= $dbend) {
                                $this->db->update('ruangan', ['status_ruangan' => 'Dipakai'], ['id_ruangan' => $q->id_ruangan]);
                                $this->db->update('jadwal', ['status_jadwal' => 1], ['id_jadwal' => $id_jadwal]); ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $q->username; ?></td>
                                    <td><?php echo substr($q->jam_mulai, 0, 5); ?></td>
                                    <td><?php echo substr($q->jam_berakhir, 0, 5); ?></td>
                                    <td><?php $date = date_create($q->tanggal);
                                        echo date_format($date, 'd/m/Y'); ?></td>
                                    <td><?php echo $q->keterangan; ?></td>
                                    <td>
                                        <?php
                                        switch ($q->status_jadwal) {
                                            case 1:
                                                echo "<span class='text-success text-bold'>Sedang berlangsung...</span>";
                                                break;
                                            case 2:
                                                echo "<span class='text-primary text-bold'>Akan datang...</span>";
                                                break;
                                            case 3:
                                                echo "<span class='text-danger text-bold'>Sudah lewat, harap hapus jadwal ini..</span>";
                                            default:
                                                # code...
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/hapusjadwal/0/' . $q->id_jadwal) ?>" onclick="return confirm('Hapus jadwal?')" class="badge badge-danger" title="Batalkan jadwal">Hapus Jadwal</a>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $q->username; ?></td>
                                    <td><?php echo substr($q->jam_mulai, 0, 5); ?></td>
                                    <td><?php echo substr($q->jam_berakhir, 0, 5); ?></td>
                                    <td><?php $date = date_create($q->tanggal);
                                        echo date_format($date, 'd/m/Y'); ?></td>
                                    <td><?php echo $q->keterangan; ?></td>
                                    <td>
                                        <?php
                                        switch ($q->status_jadwal) {
                                            case 1:
                                                echo "<span class='text-success text-bold'>Sedang berlangsung...</span>";
                                                break;
                                            case 2:
                                                echo "<span class='text-primary text-bold'>Akan datang...</span>";
                                                break;
                                            case 3:
                                                echo "<span class='text-danger text-bold'>Sudah lewat, harap hapus jadwal ini..</span>";
                                            default:
                                                # code...
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/hapusjadwal/0/' . $q->id_jadwal) ?>" onclick="return confirm('Hapus jadwal?')" class="badge badge-danger" title="Batalkan jadwal">Hapus Jadwal</a>
                                    </td>
                                </tr>
                        <?php };
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include_once("../template/bodyAa.php");
include_once("../template/foot.php");
?>