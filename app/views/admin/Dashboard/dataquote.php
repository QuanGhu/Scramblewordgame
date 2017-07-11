
<?php if($viewModel) : ?>
    <?php $no=1; ?>
    <?php while ($row = $viewModel->fetch()): ?>
        <tr>
            <input type="hidden" class="form-control" name="order_id" value="<?php echo $row['order_id']; ?>"/>
            <input type="hidden" class="form-control" name="product_id[]" value="<?php echo $row['product_id']; ?>"/>
            <input type="hidden" class="form-control" name="qty[]" value="<?php echo $row['qty']; ?>"/>
            <input type="hidden" class="form-control" name="price[]" value="<?php echo $row['price']; ?>" />
            <input type="hidden" class="form-control" name="total_price[]" value="<?php echo $row['total_price']; ?>" />
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
            <td>
                <a class="btn btn-danger" id="<?php echo $row['id']; ?>">BATAL</a>
            </td>
            <?php $total += $row['total_price']; ?>
        </tr>
    <?php $no++; ?>
    <?php endwhile;?>
        <tr>
            <td colspan="4"><b>Total Belanja</b></td>
            <td><b><?php if(!empty($total)) {echo $total; } ?></b></td>
        </tr>
<?php else : ?>
    <tr>
        Belum ada Data
    </tr>
<?php endif; ?>
