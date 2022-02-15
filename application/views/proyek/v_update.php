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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 mx-auto">
                                            <form action="<?= base_url("proyek/edit/" . $proyek["id_proyek"]) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="proyek_code">Kode Proyek</label>
                                                    <input type="text" class="form-control" name="proyek_code" id="proyek_code" placeholder="Kode Kode" value="<?= $proyek["kode_proyek"] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="proyek_name">Nama Proyek</label>
                                                    <input type="text" class="form-control <?= form_error('proyek_name') ? 'is-invalid' : ''; ?>" value="<?= $proyek["nama_proyek"] ?>" name="proyek_name" id="proyek_name" placeholder="Nama Proyek">
                                                    <?= form_error('proyek_name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_unit">Customer</label>
                                                    <select name="id_customer" id="id_customer" class="form-control select2 <?= form_error('id_customer') ? 'is-invalid' : ''; ?>">
                                                        <option value="" disabled selected>-- Customer --</option>
                                                        <?php foreach ($customers as $customer) : ?>
                                                            <?php if ($customer["id_pelanggan"] == $proyek["id_pelanggan"]) : ?>
                                                                <option value="<?= $customer["id_pelanggan"] ?>" selected><?= $customer["nama_pelanggan"] ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $customer["id_pelanggan"] ?>"><?= $customer["nama_pelanggan"] ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?> -->

                                                    </select>
                                                    <?= form_error('id_customer', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_price">Progres</label><br>
                                                    <!-- <input type="progres" class="form-control <?= form_error('progres') ? 'is-invalid' : ''; ?>" value="<?= $proyek["progres"] ?>" name="progres" id="progres" placeholder="Progres"> -->

                                                    <label class="custom-switch">
                                                        <input type="radio" name="progres" id="progres" value="Proses" <?php echo ($proyek["progres"] == 'Proses' ? ' checked' : ''); ?> class="custom-switch-input" checked>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Proses</span>
                                                    </label><br>
                                                    <label class="custom-switch">
                                                        <input type="radio" name="progres" id="progres" value="Selesai" <?php echo ($proyek["progres"] == 'Selesai' ? ' checked' : ''); ?> class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Selesai</span>
                                                    </label>
                                                    <?= form_error('progres', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>

                                                </div>

                                                <div class="form-group">
                                                    <label for="item_descriptrion">Deskripsi Barang <sup class="text-muted">(Opsional)</sup></label>
                                                    <textarea value="<?= $proyek["diskripsi"] ?>" name="item_description" id="item_description" rows="3" class="form-control 
                                                    <?= form_error('item_description') ? 'is-invalid' : ''; ?>"></textarea>
                                                </div>
                                                <div class="form-group">

                                                    <label for="item_price">Total Biaya</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                Rp.
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control <?= form_error('total') ? 'is-invalid' : ''; ?>" value="<?= $proyek["total"] ?>" name="total" id="total" placeholder="Total Biaya">
                                                        <?= form_error('total', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="item_price">Tanggal Mulai</label>
                                                    <input type="date" class="form-control <?= form_error('tgl_mulai') ? 'is-invalid' : ''; ?>" value="<?= $proyek["tgl_mulai"] ?>" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai">
                                                    <?= form_error('tgl_mulai', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_price">Tanggal Akhir</label>
                                                    <input type="date" class="form-control <?= form_error('tgl_akhir') ? 'is-invalid' : ''; ?>" value="<?= $proyek["tgl_selesai"] ?>" name="tgl_akhir" id="tgl_akhir" placeholder="Total Biaya">
                                                    <?= form_error('tgl_akhir', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>


                                                <hr>
                                                <div class="form-action">
                                                    <button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
                                                    <a href="<?= base_url("proyek/index") ?>" class="btn btn-info btn-lg">Kembali</a>
                                                </div>
                                            </form>
                                        </div>
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