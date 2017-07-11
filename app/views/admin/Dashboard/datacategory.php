
<?php $no=1; ?>
<?php foreach ($viewModel as $data): ?>
   <tr>
       <td><?php echo $no++; ?></td>
       <td><?php echo $data->category_name; ?></td>
       <td>
           <a class="btn btn-primary" href="dashboard/editcategory/<?php echo $data->category_id; ?>">Rubah Data</a>
           <a class="btn btn-danger" id="<?php echo $data->category_id; ?>">Hapus Data</a>
       </td>
   </tr>
<?php endforeach ?>
