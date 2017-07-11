<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rekap Pembelian Per Bulan</h3>
        </div>
        <div class="box-body">
            <form method="post" class="form-inline" id="month" action="dashboard/findbuybymonth">
                  <div class="form-group">
                    <label for="email">Bulan:</label>
                    <select class="form-control" name="month">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Tahun:</label>
                    <select class="form-control" name="year">
                        <?php
                            for ($i=2017; $i < 2040; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Lihat Rekap</button>
            </form>
        </div>
    </div>

</section>
