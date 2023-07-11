<section class="content-header">
  <h1>
    <i class="fa fa-list icon-title"></i> Ver logs
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Nombre de usuario</th>
                <th class="center">Nombre</th>
                <th class="center">Email</th>
                <th class="center">Entrada</th>
                <th class="center">Salida</th>
                <th class="center">Tiempo de conexión</th>
              </tr>
            </thead>
            <tbody>
              <?php  
              $no = 1;
              $query = mysqli_query($mysqli, "SELECT l.usuario, u.username, u.name_user, u.email, l.entrada, l.salida, TIMEDIFF(l.salida, l.entrada) AS connection_time
                FROM historico l
                INNER JOIN usuarios u ON l.usuario = u.id_user")
                or die('error: '.mysqli_error($mysqli));
              while ($data = mysqli_fetch_assoc($query)) { 
                echo "<tr>
                        <td width='50' class='center'>$no</td>
                        <td>".$data['username']."</td>
                        <td>".$data['name_user']."</td>
                        <td>".$data['email']."</td>
                        <td>".$data['entrada']."</td>
                        <td>";
                if ($data['salida'] === NULL) {
                  echo "<span style='color:red'>Sin salida</span>";
                } else {
                  echo $data['salida'];
                }
                echo "</td>
                      <td>";
                if ($data['connection_time'] === NULL) {
                  echo "<span style='color:red'>Sin conexión</span>";
                } else {
                  echo $data['connection_time'];
                }
                echo "</td>
                    </tr>";
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
