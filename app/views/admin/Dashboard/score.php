<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Player Score List Data</h3>
        </div>
        <div class="box-body">
            <table class="table table-hover" id="datascores">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Player Name</th>
                    <th>Scores</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
             </table>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#datascores').dataTable({
        "bProcessing": true,
        responsive: true,
        "sAjaxSource": 'dashboard/getSavedScore'
    });
});
</script>
