
<section class="content">
    <div class="box">
        <!-- <div class="box-header with-border">
            <h3 class="box-title">Rekap Penjualan Per Bulan</h3>
        </div> -->
        <div class="box-body">
            <div class="action">
                <a onClick="window.print();" class="btn btn-primary pull-right btn-print">Cetak Laporan</a>
            </div>
            <div id="print">
                <div class="text-center">
                    <h3 style="margin-bottom: 5px;">Laporan Pembelian</h3>
                    <h3 style="margin-top: 0; margin-bottom: 30px;">Dari <?php echo $viewModel[1]; ?> Sampai <?php echo $viewModel[2]; ?></h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pembelian</th>
                            <th>Kode Barang </th>
                            <th>Nama Barang</th>
                            <th>Nama Supplyer</th>
                            <th>Jumlah Pembelian</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <?php
                        $no=1;
                        $total=0;
                        $grand_total=0;
                        while ($row = $viewModel[0]->fetch()): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['buy_from_supplyer']; ?></td>
                                <td><?php echo $row['product_id']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['supplyer_name']; ?></td>
                                <td><?php echo $row['final_stock']; ?></td>
                                <td><?php echo number_format($row['product_price']); ?></td>
                                <?php $total = $row['final_stock'] * $row['product_price']; ?>
                                <td><?php echo number_format($total); ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <?php $grand_total += $total; ?>
                            </tr>
                        <?php $no++; ?>
                        <?php endwhile;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7"><b>Total Pembelian</b></td>
                            <td><b><?php echo number_format($grand_total); ?></b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>
