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
                        <a href="<?= base_url("barangkeluar/create") ?>" class="btn btn-primary btn-lg">Tambah Barang Masuk</a>
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
                                                    <th>Tanggal</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Jumlah</th>
                                                    <th>Total Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($barangkeluar as $barangkeluar) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $barangkeluar["barangkeluar_date"] ?></td>
                                                        <td><?= $barangkeluar["barangkeluar_code"] ?></td>
                                                        <td><?= $barangkeluar["proyek_name"] ?></td>
                                                        <td><?= $barangkeluar["barangkeluar_jml"] ?></td>
                                                        <td><?= $barangkeluar["barangkeluar_total"] ?></td>

                                                        <td>
                                                            <a href="<?= base_url("barangkeluar/detail/" . $barangkeluar["id_barangkeluar"]) ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                                                            <a href="<?= base_url("barangkeluar/delete/" . $barangkeluar["id_barangkeluar"]) ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>

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