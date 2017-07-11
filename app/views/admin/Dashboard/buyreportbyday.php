<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rekap Pembelian Per Hari</h3>
        </div>
        <div class="box-body">
            <form method="post" class="form-inline" id="day" action="dashboard/findbuybyday">
                  <div class="form-group">
                    <label for="email">Dari:</label>
                    <input type="text" name="from" id="from" class="form-control"/>
                  </div>
                  <div class="form-group">
                      <label for="email">Sampai:</label>
                      <input type="text" name="to" id="to" class="form-control"/>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Lihat Rekap</button>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
$(function() {
  $("#from").datepicker({ format: 'yyyy/mm/dd'});
  $("#to").datepicker({ format: 'yyyy/mm/dd'});
});
</script>
