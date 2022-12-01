<?php
      include('include.php');
      include('include/phanquyen.php');
      $arr_database = $classcsdl->selectAllDatabase();
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preload" href="bootstrap_4/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="bootstrap_4/css/bootstrap.min.css"></noscript>
    
    <link rel="icon" href="image/logo/favicon.ico" type="image/ico">

    <title>Tool Update Data</title>
   
    <link rel="preload" href="/css/index.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="css/index.css"></noscript>
    <script  src="/js/jquery-1.11.1.min.js"></script>
    <script  src="/ajax/index.js"></script>    
    <script src="/bootstrap_4/js/bootstrap-multiselect.js"></script>
    <link href="/bootstrap_4/css/bootstrap-multiselect.css" rel="stylesheet"/>
    <script src="codebase/grid.js"></script>   
    <link href="codebase/grid.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

  </head>
  
  <body>

    <div class="container-fluid sticky-top myheader">
      <div class="row">
        <div class="col-md-4 border_1">
          <div class="row">
            <div class="col-md-6">
              <form>
                <div class="row">
                  <label class="col-sm-4 border">Database: </label>
                  <select class="col-sm-8 form-control form-control-sm" id="fdatabasename" name="fdatabasename">
                    <?php
                      if (is_array($arr_database)) {
                        foreach ($arr_database as $key) {
                          $databasename=$key->getDataBaseName();
                          echo '<option value="'.$databasename.'">'.$databasename.'</option>';
                        }
                      }else{
                        echo '<option></option>';
                      }
                       
                    ?>
                  </select>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <form>
                <div class="row">
                  <label class="col-sm-3 border">Table: </label>
                  <select class="col-sm-9 form-control form-control-sm" id="ftablename" name="ftablename">
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8 border">
          <div class="row">
            <div class="col-md-5 border_column">
              <form id="form1" class="form_coloumn">
                <div class="row">
                  <div class="col-md-8 border">
                    <select class="mdb-select md-form" id="fcolumnname" name="fcolumnname" multiple>
                      <option value="" disabled selected>Chọn column</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <input type="button" class="btn btn-sm btn-outline-light" id="btnapdung" name="btnapdung" value="Tải Data vào lưới" disabled="true" />
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-3 border_button">
              <button type="button" id="btnquery" name="btnquery" data-toggle="modal" data-target="#modalquery" class="btn btn-sm btn-outline-light" disabled="true">Query</button>
              <!-- <button type="button" class="btn btn-sm btn-outline-light">Filter</button>
              <button type="button" class="btn btn-sm btn-outline-light">Clear filter</button> -->
            </div>
            <div class="col-md-2 border_button">
              <button type="button" class="btn btn-sm btn-outline-light" id="them_dong" name="them_dong" disabled="true">Thêm dòng</button>
              <button type="button" class="btn btn-sm btn-outline-light" id="xoa_dong" name="xoa_dong" disabled="true">Xóa dòng</button>
            </div>
            <div class="col-md-2 border_button">
              <a class="btn btn-sm btn-outline-secondary" <?php echo 'href="'.$domain.'"'; ?> >Home</a>
              <a class="btn btn-sm btn-outline-warning" href="/logout.php">Đăng Xuất</a>
            </div>
          </div>

          
        </div>
    </div>
      
    </div><!-- end header -->
    <div class="container-fluid mybody">
      <div id="spreadsheet_container"></div> <!-- /////////////////////////////////////////////HIEN THI DU LIEU///////////////////////////// -->
<div id="t__000"></div>
    </div><!-- end body -->
    <div class="container-fluid myfooter fixed-bottom">
      <div class="row">
        <div class="col-md-1">
         
        </div>
        <div class="col-md-2">
          <!-- <form>
              <input type="text" class="form-control form-control-sm" id="search" name="search" placeholder="Tìm kiếm">
          </form> -->
        </div>
        <div class="col-md-2 totalrecord">
          <small id="totalrecord" class="form-text">Total record: <b>0</b></small>
        </div>

        <div class="col-md-7 status">
          <small id="status" class="form-text">status: status tool</small>
        </div>
      </div>
    </div><!-- end footer -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script async src="/bootstrap_4/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- <script async src="/bootstrap_4/js/multiselect.js" crossorigin="anonymous"></script> -->
  </body>
</html>
<script type="text/javascript">
</script>
<style type="text/css">
 /*css cua select column*/
 .mdb-select>li>a>label {
  padding: 4px 20px 3px 20px;
}
</style>

<!-- Modal -->
<div class="modal fade" id="modalquery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Database Name: </span>
          </div>
          <input type="text" class="form-control" id="query_databasename" name="query_databasename" disabled="true">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Table Name: </label>
          </div>
          <select class="custom-select" id="query_tablename" name="query_tablename">
          </select>
        </div>
        <!-- <input type="text" class="form-control form-control-sm" id="query_tablename" name="query_tablename" disabled="true"> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form_body_query">
          <textarea class="form-control" aria-label="With textarea" name="query_body" id="query_body" cols="30" rows="3"></textarea>
        </form>
        <div class="border"></div>
        <div id="query_result" style="height: 600px;"></div>
      
      </div>
      <div class="modal-footer">
        <div id="query_status"></div>
        <button type="button" class="btn btn-sm btn-outline-primary" id="query_selectsao" name="query_selectsao" disabled="true">Select *</button>
        <button type="button" class="btn btn-sm btn-outline-secondary" id="query_select" name="query_select" disabled="true">Select</button>
        <button type="button" class="btn btn-sm btn-outline-success" id="query_insert" name="query_insert" disabled="true">Insert</button>
        <button type="button" class="btn btn-sm btn-outline-info" id="query_update" name="query_update" disabled="true">Update</button>
        <button type="button" class="btn btn-sm btn-outline-warning" id="query_delete" name="query_delete" disabled="true">Delete</button>
        <button type="button" class="btn btn-sm btn-outline-danger" id="query_clear" name="query_clear" disabled="true">Clear</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" id="query_runquery" name="query_runquery">Run Query</button>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  .a{
    background-color: red;
    height: 100px;
  }
</style>