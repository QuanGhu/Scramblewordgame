
<section class="content">
    <div class="box">
        <!-- <div class="box-header with-border">
            <h3 class="box-title">Rekap Penjualan Per Bulan</h3>
        </div> -->
        <div class="box-body">
            <div class="action">
                <a onClick="window.print();" class="btn btn-primary pull-right btn-print">Cetak Laporan</a>
            </div>
            <div class="text-center">
                <h3 style="margin-top: 0; margin-bottom: 30px;">Laporan Penjualan Tahun <?php echo $viewModel[1]; ?></h3>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Faktur</th>
                        <th>Tanggal Penjualan</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Total Jumlah Penjualan</th>
                        <th>Harga Modal</th>
                        <th>Harga Jual</th>
                        <th>Profit</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $no=1;
                    $total=0;
                    while ($row = $viewModel[0]->fetch()): ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['create_at']; ?></td>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['qty']; ?></td>
                            <td><?php echo number_format($row['product_price']); ?></td>
                            <td><?php echo number_format($row['price']); ?></td>
                            <?php $profit = $row['price'] - $row['product_price']; ?>
                            <td><?php echo number_format($profit); ?></td>
                            <?php $total += $profit; ?>
                        </tr>
                    <?php $no++; ?>
                    <?php endwhile;?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8"><b>Total Profit</b></td>
                        <td><b><?php echo number_format($total); ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</section>
