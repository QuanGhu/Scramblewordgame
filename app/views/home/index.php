
<section class="content">
    <div class="container">
        <div class="box-content">
            <h1 class="text1"> WELCOME TO SCRAMBLE GAME </h1>
            <div class="start-box transparant">
                <a href="#" class="btn btn-info f18" data-toggle="modal" data-target="#myModal">Click Here To Start</a>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Register</h4>
          </div>
          <div class="modal-body">
              <form method="post" action="home/start">
                <div class="form-group">
                  <label>Input Your Name Here:</label>
                  <input type="text" class="form-control" name="playername">
                </div>
          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-success">Proceed</button>
              </form>
          </div>
        </div>
      </div>
    </div>
</section>
