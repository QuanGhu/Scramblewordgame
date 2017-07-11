<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rekap Pembelian Per Tahun</h3>
        </div>
        <div class="box-body">
            <form method="post" class="form-inline" id="month" action="dashboard/findbuybyyear">
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
