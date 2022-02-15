<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("components/main/_head"); ?>
<title>Grafik Stok Barang</title>


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
                    <div class="section-header">
                        <h1>Grafik</h1>
                    </div>



                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jumlah Stok Barang Per Kategori</h4>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart" height="158"></canvas> -->

                                    <canvas id="canvas" width="1000" height="280"></canvas>
                                    <?php
                                    foreach ($jml_stok as $data) {
                                        $nama_kategori[] = $data->nama_kategori;
                                        $stok_barang[] = (float) $data->stok_barang;
                                    }
                                    ?>
                                    <!--Load chart js-->
                                    <script type="text/javascript" src="<?php echo base_url() . 'assets/chartjs/chart.min.js' ?>"></script>

                                    <script>
                                        var lineChartData = {
                                            labels: <?php echo json_encode($nama_kategori); ?>,
                                            datasets: [

                                                {
                                                    fillColor: "rgba(60,141,188,0.9)",
                                                    strokeColor: "rgba(60,141,188,0.8)",
                                                    pointColor: "#3b8bba",
                                                    pointStrokeColor: "#fff",
                                                    pointHighlightFill: "#fff",
                                                    pointHighlightStroke: "rgba(152,235,239,1)",
                                                    data: <?php echo json_encode($stok_barang); ?>
                                                }

                                            ]

                                        }

                                        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
                                    </script>
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