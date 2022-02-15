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
                        <h1>Tambah Pesan</h1>

                    </div>
                    <!-- alert flashdata -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <!-- end alert flashdata -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <div class="row"> -->
                                    <!-- <div class="col-4 mx-auto"> -->
                                    <form action="<?= base_url("informasi/create") ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Kode Proyek</label>
                                                    <input type="text" class="form-control" name="informasi_code" id="informasi_code" value="<?= $informasi_code ?>" placeholder="" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Kategori Penerima</label>
                                                    <select name="id_pelanggan" id="id_pelanggan" class="multiselect-dropdown form-control <?= form_error('id_pelanggan') ? 'is-invalid' : ''; ?>" required>
                                                        <option value="" disabled selected>-- Kategori Penerima --</option>

                                                        <option value="pelanggan">Pelanggan</option>
                                                        <option value="pemasok">Pemasok</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Nilai Proyek</label>
                                                    <div class="input-group-prepend">

                                                        <input type="text" class="form-control <?= form_error('total') ? 'is-invalid' : ''; ?>" value="" name="total" id="total" placeholder="Total Biaya" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Isi Pesan</label>
                                                    <input type="text" class="form-control <?= form_error('tgl_mulai') ? 'is-invalid' : ''; ?>" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <div class="form-action">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>


                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                </section>
                <section class="section">
                    <div class="section-header d-flex justify-content-between">
                        <h1><?= $title; ?></h1>

                    </div>

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
                                                <th>Kode Informasi</th>
                                                <th>Nama Penerima</th>
                                                <th>Pesan</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($informasi as $info) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $info["kode_informasi"] ?></td>
                                                    <td><?= $info["nama_pelanggan"] ?><?= $info["nama_pemasok"] ?> </td>
                                                    <td><?= $info["isi_pesan"] ?></td>

                                                    </td>
                                                    <td><?= $info["created_data"] ?></td>
                                                    <td>
                                                        <a href="<?= base_url("informasi/notif" . $info["id_informasi"]) ?>" class="btn btn-round btn-info btn-sm"><i class="fas fa-eye"></i> Detail Pesan</a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                </section>
            </div>

        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view("components/main/_footer"); ?>
    <!-- ./footer -->

    </div>


    <!-- scripts -->
    <?php $this->load->view("components/main/_scripts"); ?>
    <!-- ./scripts -->

</body>

</html>