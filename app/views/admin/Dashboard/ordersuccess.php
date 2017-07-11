<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title text-center">Order Berhasil</h3>
        </div>
        <div class="box-body">
            <a onClick="window.print();" class="btn btn-primary btn-print pull-right">Cetak Laporan</a>
            <div class="order-details">
                <div class="row" id="print">
                    <div class="col-md-6">
                    <b>NO Faktur</b> <?php echo $_GET['id']; ?>
                    </div>
                    <div class="col-md-6">
                    <b>Tanggal Pembelian</b> <?php echo date('d - M - Y'); ?>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total = 0;
                            while ($row = $viewModel->fetch()): ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['product_id']; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['total_price']; ?></td>
                                    <?php $total += $row['total_price']; ?>
                                </tr>
                            <?php $no++; ?>
                            <?php endwhile;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total Pembelian</td>
                                <td>
                                    <?php
                                    echo $total;
                                     ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- <div class="copy hide">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-6">
                        <label for="email">Nama Menu</label>
                        <select class="form-control" name="order_name[]">
                            <?php foreach ($viewModel as $data) : ?>
                                <option value="<?php echo $data->menu_id; ?>"><?php echo $data->menu_name; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="email">Jumlah</label>
                        <input type="text" class="form-control" name="quantity[]">
                    </div>
                    <div class="col-md-2">
                        <label for="email">Delivery</label>
                        <select class="form-control" name="price[]">
                            <option value="">Pilih</option>
                            <option value="1">Iya</option>
                            <option value="2">Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-top: 25px;">
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>
