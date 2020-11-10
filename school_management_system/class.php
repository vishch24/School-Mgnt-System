<?php
  require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CLASS - School Mgnt System</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/repeater.js"></script>
</head>
<body>
	<div class="container">
		<img class="img-responsive" src="img/logo.jpg" width="200px"><br><br>

		<h4 class="text-center">Add Class:</h4><br>
		  <div class="row">
		    <div class="col-md-3">
		      
		    </div>
		    <div class="col-md-6">
		      <form method="POST">
		        <div class="form-group">
		          <label for="cls_name">Class Name:</label>
		          <input class="form-control" type="text" name="cls_name" placeholder="Enter Class Name">
		        </div>
		        
		      <div class="form-group">
		        <!-- <input class="form-control" type="text" name="class" placeholder="Class"> -->
		        <label for="subjects">Subjects:</label>
		        <select class="form-control" name="subjects[]" multiple="multiple">
		          <option disabled="disabled" selected="selected">Select Subjects:</option>
		          <?php
		            $sel_subj = "SELECT * FROM subjects";
		            $res_subj = mysqli_query($con, $sel_subj);
		            if (mysqli_num_rows($res_subj) > 0)
		            {
		              while ($row_subj = mysqli_fetch_array($res_subj))
		              {
		                $subj_id = $row_subj["id"];
		                $subj_name = $row_subj["name"];
		              
		          ?>
		          <option value="<?php echo $subj_id; ?>"><?php echo $subj_name; ?></option>
		          <?php
		              }
		            }
		          ?>
		        </select>
		      </div>
		      
		      <div class="form-group">
		        <input class="btn btn-primary form-control" type="submit" name="add_cls" value="Add">
		      </div>
		      </form>
		    </div>
		    <div class="col-md-3"></div>
		  </div>
    <br><br>

    <h2>Class Details:</h2>
    <table class="table table-bordered text-center">
    	<thead>
	      <tr>
	        <th>Sr.No.</th>
	        <th>Class Name</th>
	        
	        <th>Subjects</th>
	        <th>Passing Marks</th>
	        <th>Out of Marks</th>
	        
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$sel_cls = "SELECT * FROM class";
	    		$res_cls = mysqli_query($con, $sel_cls);
	    		if (mysqli_num_rows($res_cls) > 0)
	    		{
	    			$i = 1;
	    			while ($row_cls = mysqli_fetch_array($res_cls))
	    			{
	    				$class_id = $row_cls["id"];
	    				$class_name = $row_cls["class_name"];
	    				$subjectid = explode(',',$row_cls["subj_id"]);

	    				
	    	?>
	    	<tr>
	    		<td><?php echo $i; ?></td>
	    		<td><?php echo $class_name ."<br>"; ?></td>
	    		<td>
	    			<?php
	    			foreach ($subjectid as $key1 => $subj1)
				        {
				            $sel_subj="SELECT * From subjects where id IN ($subj1)";
				              // echo $sel_subj."<br>";
				              $res_subj = mysqli_query($con,$sel_subj);
				              if (mysqli_num_rows($res_subj) > 0)
				              {
				                $row_subj=mysqli_fetch_array($res_subj);

				                $subj_name = $row_subj["name"];
				                // $marks = $row_subj["pass_marks"];
				                // $out_of_marks = $row_subj["out_of_marks"];
				                // echo $subj_name." ".$marks1." ".$out_of_marks."<br>";
				                echo $subj_name."<br>";
				            ?>
				            
				        <!-- <?php echo $marks1; ?> -->
				        <!-- <?php echo $out_of_marks; ?> -->
				            <?php
				              }
				        }
	    			// echo $subj_name."<br>"; 
	    			?>
	    		</td>
	    		<td>
	    			<?php
	    			foreach ($subjectid as $key1 => $subj1)
				        {
				            $sel_subj="SELECT * From subjects where id IN ($subj1)";
				              // echo $sel_subj."<br>";
				              $res_subj = mysqli_query($con,$sel_subj);
				              if (mysqli_num_rows($res_subj) > 0)
				              {
				                $row_subj=mysqli_fetch_array($res_subj);

				                // $subj_name = $row_subj["name"];
				                $marks = $row_subj["pass_marks"];
				                // $out_of_marks = $row_subj["out_of_marks"];
				                // echo $subj_name." ".$marks1." ".$out_of_marks."<br>";
				                echo $marks."<br>";
				            ?>
				            
				        <!-- <?php echo $marks1; ?> -->
				        <!-- <?php echo $out_of_marks; ?> -->
				            <?php
				              }
				        }
	    			// echo $subj_name."<br>"; 
	    			?>
	    		</td>
	    		<td>
	    			<?php
	    			foreach ($subjectid as $key1 => $subj1)
				        {
				            $sel_subj="SELECT * From subjects where id IN ($subj1)";
				              // echo $sel_subj."<br>";
				              $res_subj = mysqli_query($con,$sel_subj);
				              if (mysqli_num_rows($res_subj) > 0)
				              {
				                $row_subj=mysqli_fetch_array($res_subj);

				                // $subj_name = $row_subj["name"];
				                // $marks = $row_subj["pass_marks"];
				                $out_of_marks = $row_subj["out_of_marks"];
				                // echo $subj_name." ".$marks1." ".$out_of_marks."<br>";
				                echo $out_of_marks."<br>";
				            ?>
				            
				        <!-- <?php echo $marks1; ?> -->
				        <!-- <?php echo $out_of_marks; ?> -->
				            <?php
				              }
				        }
	    			// echo $subj_name."<br>"; 
	    			?>
	    		</td>

	    		<td>
		          <button class="btn-danger" data-toggle="modal" data-target="#Del_cls<?php echo $class_id; ?>">DELETE </button>
		          <!-- Modal -->
					<!-- The Modal -->
					<div class="modal" id="Del_cls<?php echo $class_id; ?>">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <!-- <h4 class="modal-title">Modal Heading</h4> -->
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					     <form method="POST"> 
					      <!-- Modal body -->
					      <div class="modal-body">
					        Are you sure you want to delete this class?
					        <input type="hidden" name="cls_id" value="<?php echo $class_id; ?>">
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

					<?php
						  if (isset($_POST['del_submit']))
						  {
						    $cls_id = mysqli_real_escape_string($con, $_POST['cls_id']);
						    $del_sql = "DELETE FROM class where id = '$cls_id'";
						    // echo $del_sql;exit;
						    $res_del = mysqli_query($con, $del_sql);
						    if ($res_del)
						    {
						      echo '
						        <script language="javascript">
						          alert("Class deleted successfully!");
						         window.location.href="";
						        </script>
						      ';
						    }
						    else
						    {
						      echo '
						        <script language="javascript">
						          alert("There was a problem deleting class");
						         
						        </script>
						      ';
						    }
						  }
						?>
		          <br>
		          <button class="btn-success" data-toggle="modal" data-target="#upd_cls<?php echo $class_id; ?>">UPDATE</button>

		          <!-- The Modal -->
					<div class="modal" id="upd_cls<?php echo $class_id; ?>">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title">Edit Class</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>


					      
					      		<form method="POST" class="repeater"> 
						      <!-- Modal body -->
						      <div class="row">
					      	<div class="col-md-3"></div>
					      	<div class="col-md-6">
						      <div class="modal-body">
						        <!-- Are you sure you want to delete this class? -->
						        <div data-repeater-list="category-group">
						        	<div data-repeater-item>
						        <input type="hidden" name="cls_id" value="<?php echo $class_id; ?>">
						        <div class="form-group">
						        	<label for="cls_name">Class Name: </label>
						        	<input class="form-control" type="text" name="cls_name" placeholder="<?php echo $class_name; ?>">
						        </div>
						        <div class="form-group">
						        	<label for="subjects">Subjects: </label>
						        	<?php

							        	foreach ($subjectid as $key1 => $subj1)
								        {
								            $sel_subj="SELECT * From subjects where id IN ($subj1)";
								              // echo $sel_subj."<br>";
								              $res_subj = mysqli_query($con,$sel_subj);
								              if (mysqli_num_rows($res_subj) > 0)
								              {
								                while($row_subj=mysqli_fetch_array($res_subj))
								                {
									                $subj_name = $row_subj["name"];
									                // $marks = $row_subj["pass_marks"];
									                // $out_of_marks = $row_subj["out_of_marks"];
									                // echo $subj_name." ".$marks1." ".$out_of_marks."<br>";
									                // echo $subj_name."<br>";
									            ?>
									            
									        <!-- <?php echo $marks1; ?> -->
									        <!-- <?php echo $out_of_marks; ?> -->
									    <form method="POST">     
								        	<input type="hidden" name="sub_id" value="<?php echo $subj1; ?>">
								        	<div class="container-fluid">
								        		<div class="row">
										        	<input class="form-control col-8" type="text" name="subjects[]" placeholder="<?php echo $subj_name; ?>">
										        	<button type="submit" name="del_sub" data-repeater-delete class="btn btn-danger col-2">X</button>
										        	<input class="btn btn-success col-2" data-repeater-create type="button" value="+"/>
										        </div>
									        </div>
									    </form>
							        	 <?php
							        	 		if (isset($_POST["del_sub"]))
										        {
										        	$sub = explode(',',$_POST["sub_id"]);
										        	// print_r($sub);
										        	foreach ($sub as $key => $subj) 
										        	{
										        		$del_subj = "UPDATE class set subj_id = REPLACE(subj_id, '$subj,' ,''), subj_id = REPLACE(subj_id, ',$subj' ,''), subj_id = REPLACE(subj_id, '$subj' ,'') where subj_id LIKE '%$subj' OR subj_id LIKE '$subj%' OR subj_id LIKE '%$subj%' AND id = '$class_id'";	
											        	// echo $del_subj;
											        	$res_sub = mysqli_query($con, $del_subj);
											        	if ($res_sub)
											        	{
											        		echo '
														        <script language="javascript">
														          alert("Class updated successfully!");
														         
														        </script>
														      ';
											        	}
										        	}
										        	
										        }

						        	 			}
								              }
								              
								              
								        }


								    ?>
						        </div>
						      </div>




						      </div>
					      	<div class="col-md-3"></div>
						     
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

					<?php
						  if (isset($_POST['del_submit']))
						  {
						    $cls_id = mysqli_real_escape_string($con, $_POST['cls_id']);
						    $del_sql = "DELETE FROM class where id = '$cls_id'";
						    // echo $del_sql;exit;
						    $res_del = mysqli_query($con, $del_sql);
						    if ($res_del)
						    {
						      echo '
						        <script language="javascript">
						          alert("Class deleted successfully!");
						         window.location.href="";
						        </script>
						      ';
						    }
						    else
						    {
						      echo '
						        <script language="javascript">
						          alert("There was a problem deleting class");
						         
						        </script>
						      ';
						    }
						  }
						?>
		        </td>
	    	</tr>
	    	<?php
	    			$i++;
	    			}
	    		}
	    	?>
	    </tbody>
    </table>

	</div>
</body>
</html>
<?php
	if (isset($_POST["add_cls"]))
	{
		$cls_name = mysqli_real_escape_string($con, $_POST["cls_name"]);
		$subjects = implode(',', $_POST["subjects"]);

		$insert = "INSERT INTO class (class_name, subj_id) VALUES ('$cls_name', '$subjects')";
		// echo $insert;exit;
		$res = mysqli_query($con, $insert);
		if ($res)
		{
			echo '
		        <script language="javascript">
		          alert("Class added Successfully!");
		          window.location.href="";
		        </script>
		      ';
		}
		else
		{
			echo '
		        <script language="javascript">
		          alert("There was a problem adding class");
		         
		        </script>
		      ';
		}
	}

?>