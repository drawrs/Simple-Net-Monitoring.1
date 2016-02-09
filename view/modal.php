<?php 
$query = $conn->query("SELECT*FROM client WHERE id_blok='$id_st'");
while ($ambil = $query->fetch_assoc()) {
    extract($ambil);
    // Modal Edit
    echo '<div class="modal fade" id="modalEdit'.$id_client.'">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit '.$name_client.'</h4>
                  </div>
                  <div class="modal-body">
                    <!-- Start form -->
                   <form class="form-horizontal" role="form" style="width:80%" name="add_client" method="post" action="./asset/proses.php">
                   <input type="hidden" name="id_client" value="'.$id_client.'" />
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="IP">IP:</label>
                        <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-laptop"></i>
                          </div>
                          <input type="text" value="'.$ip_client.'" placeholder="Masukan IP" name="ip" class="form-control" data-inputmask="\'alias\': \'ip\'" data-mask="" required>
                        </div><!-- /.input group -->
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Host">Host name:</label>
                        <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-sort-alpha-asc"></i>
                          </div>
                          <input type="text" name="client"  value="'.$name_client.'" class="form-control" placeholder="Masukan Nama Host" required>
                        </div><!-- /.input group --> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="stasiun">Stasiun:</label>
                        <div class="col-sm-10">
                         <div class="input-group">
                            <div class="input-group-addon">
                             <i class="fa fa-train"></i>
                            </div>
                          <select class="form-control select2" style="width: 100%;" name="stasiun">';
                            $sql = "SELECT*FROM blok ORDER BY name_blok ASC";
                            $list_blok = $conn->query($sql);
                            while ($get2 = $list_blok->fetch_assoc()) {
                                if ($get2['id_blok'] == "$id_blok") {
                                    $active = "SELECTED";
                                } else {
                                    $active = "";
                                }
                                echo "<option value='$get2[id_blok]' $active>$get2[name_blok]</option>";
                             } 

                          echo '</select>
                          </div>
                          <br />
                          <br />
                          <a href="./add_stasiun" title="Add Stasiun">Add Stasiun</a>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="edit_client">Save changes</button>
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>';
    // Modal Delete client
    echo '<div class="modal modal-success fade" id="modalDel'.$id_client.'">
              <div class="modal-dialog">
                <div class="modal-content">
                <form method="post" action="./asset/proses.php">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Anda yakin ingin menghapus <strong><?php echo "$name_blok"; ?></strong> ?</h4>
                  </div>
                  <div class="modal-body">
                    <p><h4>Anda yakin ingin menghapus <strong>'.$name_client.'</strong> ?</h4>
                    <input type="hidden" name="id_client" value="'.$id_client.'">
                    <input type="hidden" name="id_blok" value="'.$id_blok.'"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-outline" name="del_cln">Hapus</button>
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Batal</button>
                  </div>
                </div></form><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>';

    }
 ?>
 
                                
<!-- Modal edit info stasiun -->
<div class="modal fade" id="editSt">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Info</h4>
                  </div>
                  <div class="modal-body">
                  <!-- Form edit -->
                      <!-- Hidden input -->
                  <form class="form-horizontal" role="form" style="width:100%" method="post" action="./asset/proses.php">
                  <input type="hidden" name="id_st" value="<?php echo "$id_blok"; ?>">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nama Stasiun</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-train"></i>
                            </div>
                            <input type="text" value="<?php echo $name_blok; ?>" class="form-control" name="name_st" placeholder="Nama Stasiun" required>
                          </div><!-- /.input group -->
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputTelp" class="col-sm-2 control-label">Telp Stasiun</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" value="<?php echo "$telp_blok"; ?>" class="form-control" name="telp_st" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" required>
                          </div><!-- /.input group -->
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAdd" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="add_st" rows='10' placeholder='Alamat Stasiun' required><?php echo "$add_blok"; ?></textarea>
                        </div>
                      </div>
                      <!-- / Form edit -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="edit_stasiun">Save changes</button>
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
<!-- / Modal delete info stasiun -->
<div class="modal modal-success fade" id="delSt">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Anda yakin ingin menghapus <strong><?php echo "$name_blok"; ?></strong> ?</h4>
                  </div>
                  <div class="modal-body">
                    <p>Semua data client dengan nama stasiun <strong><?php echo "$name_blok"; ?></strong> juga akan dihapus.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="window.location.href='./asset/proses.php?del_st=<?php echo $id_blok; ?>';" class="btn btn-outline">Hapus</button>
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Batal</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>      
<!-- / Modal Delete -->