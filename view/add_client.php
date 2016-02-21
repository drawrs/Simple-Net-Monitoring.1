<div class="tab-content ">
<div class="active tab-pane">
<!-- Post -->
<div class="post">
<div class="box-body">
	<form class="form-horizontal" method="post" action="./asset/proses.php">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Host Name</label>
                <div class="col-sm-10">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa  fa-sort-alpha-asc"></i>
                      </div>
                      <input type="text" name="client" class="form-control" placeholder="Masukan Nama Host" required>
                    </div><!-- /.input group -->
                </div>
              </div>
              <div class="form-group">
                <label for="inputTelp" class="col-sm-2 control-label">IP Client</label>
                <div class="col-sm-10">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-laptop"></i>
                      </div>
                      <input type="text" placeholder="Masukan IP" name="ip" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" required>
                    </div><!-- /.input group -->
                </div>
              </div>
              <div class="form-group">
                <label for="inputTelp" class="col-sm-2 control-label">Stasiun</label>
                <div class="col-sm-10">
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-train"></i>
                      </div>
                  <select name="stasiun" class="form-control select2" style="width: 100%;">
                        <?php
                        $sql = "SELECT*FROM blok ORDER BY name_blok ASC";
                        $query = $conn->query($sql);
                        while ($get = $query->fetch_assoc()) {
                            extract($get);
                            echo "<option value='$id_blok'>$name_blok</option>";
                         } 
                         ?>
                      </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-warning" name="add_client">Simpan</button>
                  <button type="reset" class="btn btn-danger" name="add_client">Reset</button>
                </div>
              </div>
            </form>

</div>
</div>
</div>
</div>