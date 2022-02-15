<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("components/main/_head"); ?>
<!-- ./head -->

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- navbar -->
            <?php $this->load->view("components/main/_navbar"); ?>
            <!-- ./navbar -->
            <!-- sidebar -->
            <?php $this->load->view("components/main/_sidebar"); ?>
            <!-- ./sidebar -->

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header d-flex justify-content-between">
                        <h1><?= $title; ?></h1>
                        <a href="<?= base_url("proyek/create") ?>" class="btn btn-primary btn-lg">Tambah Data Proyek</a>
                    </div>
                    <!-- alert flashdata -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <!-- end alert flashdata -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        No
                                                    </th>
                                                    <th>Kode Proyek</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Customer</th>
                                                    <th>Progres</th>
                                                    <th>Total Biaya</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($proyek as $proyek) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $proyek["kode_proyek"] ?></td>
                                                        <td><?= $proyek["nama_proyek"] ?></td>
                                                        <td><?= $proyek["nama_pelanggan"] ?></td>
                                                        <!-- <td><?= $proyek["progres"] ?></td> -->
                                                        <td>

                                                            <?php if ($proyek["progres"] == 'Proses') : ?>
                                                                <div class="badge badge-warning">Proses</div>
                                                            <?php else : ?>
                                                                <div class="badge badge-success">Selesai</div>
                                                            <?php endif; ?>

                                                        </td>
                                                        <td><?= $proyek["total"] ?></td>
                                                        <td>
                                                            <a href="<?= base_url("proyek/edit/" . $proyek["id_proyek"]) ?>" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                                            <a href="<?= base_url("proyek/delete/" . $proyek["id_proyek"]) ?>" class="btn btn-danger btn-circle btn-sm btn-delete"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- footer -->
            <?php $this->load->view("components/main/_footer"); ?>
            <!-- ./footer -->
        </div>
    </div>


    <!-- scripts -->
    <?php $this->load->view("components/main/_scripts"); ?>
    <!-- ./scripts -->

</body>

</html>