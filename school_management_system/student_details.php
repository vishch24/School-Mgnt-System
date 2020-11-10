<?php
  require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME - School Mgnt System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <img class="img-responsive" src="img/logo.jpg" width="200px"><br><br>
  <h4 class="text-center">Add Student Details:</h4><br>
  <div class="row">
    <div class="col-md-3">
      
    </div>
    <div class="col-md-6">
      <form method="POST">
        <div class="form-group">
          <label for="std_name">Student Name:</label>
          <input class="form-control" type="text" name="std_name" placeholder="Enter Student Name">
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <input class="form-control" type="text" name="gender" placeholder="Enter Gender">
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth">
        </div>
      <div class="form-group">
        <!-- <input class="form-control" type="text" name="class" placeholder="Class"> -->
        <label for="class">Class:</label>
        <select class="form-control" name="class">
          <option disabled="disabled" selected="selected">Select Class:</option>
          <?php
            $sel_cls = "SELECT * FROM class";
            $res_cls = mysqli_query($con, $sel_cls);
            if (mysqli_num_rows($res_cls) > 0)
            {
              while ($row_cls = mysqli_fetch_array($res_cls))
              {
                $cls_id = $row_cls["id"];
                $cls_name = $row_cls["class_name"];
              
          ?>
          <option value="<?php echo $cls_id; ?>"><?php echo $cls_name; ?></option>
          <?php
              }
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="subjects">Subjects:</label>
        <div class="container-fluid">
          <div class="row">
            
            <!-- <option value="<?php echo $sub_id; ?>"><?php echo $sub_name; ?></option> -->
            <input class="form-control col-3" type="hidden" name="subjects" value="">
            <input class="form-control col-3" type="text" name="" placeholder="" disabled="disabled">
            
          </div>
        </div>

      </div>
      <div class="form-group">
        <label for="marks">Marks:</label>
        <input class="form-control" type="text" name="marks" placeholder="Enter Marks">
      </div>
      <div class="form-group">
        <label for="out_of_marks">Out of Marks:</label>
        <!-- <input class="form-control" type="text" name="out_of_marks" placeholder="Enter Out of Marks"> -->

        <div class="container-fluid">
          <div class="row">
            
            <!-- <option value="<?php echo $sub_id; ?>"><?php echo $sub_name; ?></option> -->
            <input class="form-control col-3" type="hidden" name="out_of_marks" value="">
            <input class="form-control col-3" type="text" name="" placeholder="" disabled="disabled">
            
          </div>
        </div>

      </div>
      <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" name="add_std" value="Add">
      </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
    <br><br>


 <!--  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"> -->
      <br><br>
  <h2>Student Details:</h2>
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>Sr.No.</th>
        <th>Student Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Class</th>
        <th>Subjects</th>
        <th>Marks</th>
        <th>Out of Marks</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $select  = "SELECT c.id AS CLASS_ID, st.subj_id AS SUBJ_ID, st.id AS STD_ID, st.std_name, st.gender, st.dob, c.class_name, st.marks, st.status FROM students st, class c, subjects su WHERE st.class_id = c.id AND st.subj_id = su.id";
      $res_sel = mysqli_query($con, $select);

      if (mysqli_num_rows($res_sel) > 0)
      {
        $i = 1;
        while ($row = mysqli_fetch_array($res_sel))
        {

          $std_name = $row["std_name"];
          $gender = $row["gender"];
          $dob = $row["dob"];
          $class_name = $row["class_name"];
          $subj_id = explode(',',$row["SUBJ_ID"]);
          
          // print_r($subj_id);exit;
          $marks = explode(',', $row["marks"]);
          $status = $row["status"];
    ?>  
      <tr>
        <td><?php echo $row['STD_ID']; ?></td>
        <td><?php echo $std_name; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $dob; ?></td>
        <td><?php echo $class_name; ?></td>
        
        <td>
    <?php

        foreach ($subj_id as $key1 => $subj1)
        {
            $sel_subj="SELECT * From subjects where id IN ($subj1)";
              // echo $sel_subj."<br>";
              $res_subj = mysqli_query($con,$sel_subj);
              if (mysqli_num_rows($res_subj) > 0)
              {
                $row_subj=mysqli_fetch_array($res_subj);

                $subj_name = $row_subj["name"];
                $out_of_marks = $row_subj["out_of_marks"];
                // echo $subj_name." ".$marks1." ".$out_of_marks."<br>";
            ?>
            <?php echo $subj_name."<br>"; ?>
        <!-- <?php echo $marks1; ?> -->
        <!-- <?php echo $out_of_marks; ?> -->
            <?php
              }
        }
        ?>
        </td>

        <td>
    <?php

        foreach ($marks as $key2 => $marks1)
        {            
          echo $marks1."<br>";
        }
        ?>
        </td>

        <td>
    <?php

        foreach ($subj_id as $key1 => $subj1)
        {
            $sel_subj="SELECT * From subjects where id IN ($subj1)";
              // echo $sel_subj."<br>";
              $res_subj = mysqli_query($con,$sel_subj);
              if (mysqli_num_rows($res_subj) > 0)
              {
                $row_subj=mysqli_fetch_array($res_subj);

                // $subj_name = $row_subj["name"];
                $out_of_marks = $row_subj["out_of_marks"];
                // echo $subj_name." ".$marks1." ".$out_of_marks."<br>";
            ?>
            <?php echo $out_of_marks."<br>"; ?>
        <!-- <?php echo $marks1; ?> -->
        <!-- <?php echo $out_of_marks; ?> -->
            <?php
              }
        }
        ?>
        </td>

        <td><?php echo $status; ?></td>
        <td>
          <button class="btn-danger" data-toggle="modal" data-target="#Del_std<?php echo $row['STD_ID']; ?>">DELETE </button>
          <!-- Modal -->
          <!-- The Modal -->
          <div class="modal" id="Del_std<?php echo $row['STD_ID']; ?>">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

               <form method="POST"> 
                <!-- Modal body -->
                <div class="modal-body">
                  Are you sure you want to delete this student?
                  <input type="text" name="std_id" value="<?php echo $row['STD_ID']; ?>">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" name="del_submit" class="btn btn-success">OK</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </form>

              </div>
            </div>
          </div>
          <br>





          <button class="btn-success" data-toggle="modal" data-target="#upd_std<?php echo $row['STD_ID']; ?>">UPDATE</button>

          <div class="modal" id="upd_std<?php echo $row['STD_ID']; ?>">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

               <form method="POST"> 
                <!-- Modal body -->
                <div class="modal-body">
                  <div class="form-group">
                    <label for="std_name">Student Name: </label>
                    <input class="form-control" type="text" name="std_name" value="<?php echo $row['STD_ID']; ?>">
                  </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" name="upd_submit" class="btn btn-success">OK</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </form>

              </div>
            </div>
          </div>
        </td>
      </tr>
        <?php
        $i++;
        }
      }
    ?>
    </tbody>
  </table><br><br>
<?php
  if (isset($_POST['del_submit']))
  {
    $std_id = mysqli_real_escape_string($con, $_POST['std_id']);
    $del_sql = "DELETE FROM students where id = '$std_id'";
    // echo $del_sql;exit;
    $res_del = mysqli_query($con, $del_sql);
    if ($res_del)
    {
      echo '
        <script language="javascript">
          alert("Student deleted successfully!");
         window.location.href="";
        </script>
      ';
    }
    else
    {
      echo '
        <script language="javascript">
          alert("There was a problem deleting student");
         
        </script>
      ';
    }
  }
?>
<!-- </div>
<div class="col-md-2"></div>
</div> -->
</div>
</body>
</html>
