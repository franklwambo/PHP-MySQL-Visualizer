<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic System Data Transmission Updates</title>
<script type="text/javascript">
   setTimeout(function(){

       location.reload();

   },30000);

</script>

<script src="dist/jquery-1.11.1.min.js"></script>
<script   src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"   integrity="sha256-xI/qyl9vpwWFOXz7+x/9WkG5j/SVnSw21viy8fWwbeE="   crossorigin="anonymous"></script>
<!-- Include one of jTable styles. -->
<link href="dist/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
<!-- Include jTable script file. -->
<script src="dist/jquery.jtable.min.js" type="text/javascript"></script>
	
	<div class="container">
      <div class="">

      <?php
      //get the current date and time 
     
      date_default_timezone_set('Africa/Nairobi');

           $currentDateTime = date('Y-m-d H:i:s');

      ?>
        <h1><i>Daily data transmission updates as at </i> <b><?php if (isset($currentDateTime)) echo $currentDateTime; ?></b></h1>
        <!-- <div class="col-sm-8" id="employee_grid" style="height:400px;overflow:scroll;"> -->

        <div class="col-sm-8" id="employee_grid" style="height:60%;overflow:scroll;">
		
		</div>
      </div>
    </div>

<script type="text/javascript">
$( document ).ready(function() {
	$('#employee_grid').jtable({
            title: 'List of new SETS registrations',
            actions: {
                listAction: 'response.php?action=list'
            },
            fields: {
                Facility_Mflcode: {
                    title: 'Facility Mflcode',
                    width: '10%',
                    edit: false
                },
                Facility_Name: {
                    title: 'Facility Name',
                    width: '25%'
                },
                total_registered: {
                    title: 'Registration Count',
                    width: '20%'
                }
            }
        });
		$('#employee_grid').jtable('load');
});
</script>
