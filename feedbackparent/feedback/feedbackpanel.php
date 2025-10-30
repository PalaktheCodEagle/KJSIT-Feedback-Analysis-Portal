<?php
include("header.php");
include("sidebar.php");

if (!isset($_SESSION['date'])) {
	$_SESSION['feedbacktopicid'] = $_GET['feedbacktopicid'];
	$_SESSION['date'] = date("Y-m-d H:i:s");

	$sql1 = "select * from  feedbackquestion_result where feedbacktopicid = '$_SESSION[feedbacktopicid]' and parentid = '$_SESSION[parentid]'";
	if ($result1 = mysqli_query($con, $sql1)) {
		$rowcount = mysqli_num_rows($result1);
	}
	if ($rowcount > 0) {
		echo "<script>window.location='feedbackquestion_success.php?feedbacktopicid=$_SESSION[feedbacktopicid]&parentid=$_SESSION[parentid]';</script>";
	}

	

	echo "<script>window.location='feedbackpanel.php?feedbacktopicid=$_GET[feedbacktopicid]';</script>";
}
if (isset($_SESSION['feedbacktopicid'])) {
	// $sqledit = "SELECT * FROM feedbacktopic where feedbacktopicid='$_SESSION[feedbacktopicid]'";
	// $qsqledit = mysqli_query($con, $sqledit);
	// $rsedit = mysqli_fetch_array($qsqledit);
	// //######
	// $sqlparent = "SELECT * FROM parent WHERE parentid='$rsedit[parentid]'";
	// $qsqlparent = mysqli_query($con, $sqlparent);
	// $rsparent = mysqli_fetch_array($qsqlparent);
	// //######
	// //######
	// $sqladmin = "SELECT * FROM admin WHERE adminid='$rsedit[adminid]'";
	// $qsqladmin = mysqli_query($con, $sqladmin);
	// $rsadmin = mysqli_fetch_array($qsqladmin);
	// //######
}

if (isset($_POST['submit'])) {

	$sql = "SELECT feedbackquestionid FROM `feedbackquestion` WHERE feedbacktopicid='$_SESSION[feedbacktopicid]' and status='Active'";

	$result  = mysqli_query($con, $sql);
	while ($rs = mysqli_fetch_array($result)) {
		$rowcount = 0;
		$sql1 = "select * from  feedbackquestion_result where feedbacktopicid = '$_SESSION[feedbacktopicid]' and feedbackquestionid = '$rs[0]' and parentid = '$_SESSION[parentid]'";
		if ($result1 = mysqli_query($con, $sql1)) {
			$rowcount = mysqli_num_rows($result1);
		}

		$answer = $_POST['option' . $rs[0]];


		if ($rowcount > 0) {
			$sqlupd  = "UPDATE feedbackquestion_result SET selectedanswer='$answer' WHERE feedbacktopicid = '$_SESSION[feedbacktopicid]' and feedbackquestionid = '$rs[0]' and parentid = '$_SESSION[parentid]'";
		} else {
			$sqlins = "INSERT INTO feedbackquestion_result SET feedbacktopicid='$_SESSION[feedbacktopicid]', parentid='$_SESSION[parentid]', date='. $_SESSION[date] . ', feedbackquestionid='$rs[0]', selectedanswer='$answer'";
			mysqli_query($con, $sqlins);
		}
	}
	echo "<script>window.location='participatefeedback.php?qtype=All';</script>";
}
?>
<style>
.error {
    color: red;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <br>
    <?php {

	?>

    <!-- Main content -->
    <section class="content">
        <form method="post" id="feedBackPanelForm" action="" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Feedback Panel </h3>
                </div>
                <div class="card-body">

                    <table id="tblquestionviewer" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <center>
                                        <?php echo $rsedit['feedback_topic']; ?>
                                    </center>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>
                                    <center>
                                        Number of Questions :
                                        <?php
											$sqlqz = "SELECT * FROM feedbackquestion WHERE feedbacktopicid='$_SESSION[feedbacktopicid]'";

											$qsqlqz  = mysqli_query($con, $sqlqz);
											echo mysqli_num_rows($qsqlqz);
											?>
                                        |
                                        Answered Questions :
                                        <span id="idansweredquestions"><?php

																			$date1 = $_SESSION['dttim'] ? $_SESSION['dttim'] : 'null';
																			$sqlqz = "SELECT *FROM feedbackquestion_result WHERE feedbacktopicid='$_SESSION[feedbacktopicid]' AND date='$date1' AND parentid='$_SESSION[parentid]' and selectedanswer != ''";

																			$qsqlqz  = mysqli_query($con, $sqlqz);
																			echo mysqli_num_rows($qsqlqz);
																			?></span>
                                        |
                                        Unanswered Questions :
                                        <span id="idunansweredquestions"><?php
																				$sqlqz = "SELECT * FROM feedbackquestion_result WHERE feedbacktopicid='$_SESSION[feedbacktopicid]' AND date='$date1' AND parentid='$_SESSION[parentid]' and selectedanswer=''";
																				$qsqlqz  = mysqli_query($con, $sqlqz);
																				echo mysqli_num_rows($qsqlqz);
																				?></span>
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
								$qno = 1;
								//$sqlqz = "SELECT feedbackquestion_result.*,  question, option1,feedbackquestion.option2,feedbackquestion.option3,feedbackquestion.option4,feedbackquestion.option5,feedbackquestion.option6,feedbackquestion.option7,feedbackquestion.option8,feedbackquestion.option9,feedbackquestion.option10,feedbackquestion.question_type,feedbackquestion.img FROM `feedbackquestion_result` LEFT JOIN feedbackquestion ON feedbackquestion_result.feedbackquestionid=feedbackquestion.feedbackquestionid WHERE feedbackquestion_result.feedbacktopicid='$_SESSION[feedbacktopicid]' AND feedbackquestion_result.parentid='$_SESSION[parentid]' AND feedbackquestion_result.date='$_SESSION[date]' ORDER BY feedbackquestion_result.feedbackquestion_resultid ASC";
								$sqlqz = "SELECT feedbackquestionid, question, option1, option2, option3, option4, option5, option6, option7, option8, option9, option10, question_type, img FROM `feedbackquestion` WHERE feedbacktopicid='$_SESSION[feedbacktopicid]' and status='Active'";

								$qsqlqz  = mysqli_query($con, $sqlqz);
								while ($rsqz = mysqli_fetch_array($qsqlqz)) {
								?>
                            <tr class="questions">
                                <td><?php echo $qno; ?></td>
                                <td>
                                    <input type="hidden" name="edfeedbackquestionid" id="edfeedbackquestionid"
                                        value="<?php echo $rsqz[0]; ?>">
                                    <table style='width: 100%;'>
                                        <tr>
                                            <td>

                                                <b>Question No. <?php echo $qno; ?> :- </b><br><b
                                                    style="color: #005baa;"><?php echo $rsqz['question']; ?></b>
                                            </td>
                                        </tr>

                                        <?php
												if (file_exists("imgquestion/" . $rsqz['img'])) {
												?>
                                        <tr>
                                            <td>
                                                <img src="imgquestion/<?php echo $rsqz['img']; ?>"
                                                    style='height: 200px;'>
                                            </td>
                                        </tr>
                                        <?php
												}
												if ($rsqz['question_type'] == 'Radio Button') {
													if ($rsqz['option1'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>1">Option
                                                    1:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>1"
                                                    value="<?php echo $rsqz['option1']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>1"><?php echo $rsqz['option1']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option2'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>2">Option
                                                    2:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>2"
                                                    value="<?php echo $rsqz['option2']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>2"><?php echo $rsqz['option2']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option3'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>3">Option
                                                    3:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>3"
                                                    value="<?php echo $rsqz['option3']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>3"><?php echo $rsqz['option3']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option4'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>4">Option
                                                    4:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>4"
                                                    value="<?php echo $rsqz['option4']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>4"><?php echo $rsqz['option4']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option5'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>5">Option
                                                    5:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>5"
                                                    value="<?php echo $rsqz['option5']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>5"><?php echo $rsqz['option5']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option6'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>6">Option
                                                    6:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>6"
                                                    value="<?php echo $rsqz['option6']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>6"><?php echo $rsqz['option6']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option7'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>7">Option
                                                    7:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>7"
                                                    value="<?php echo $rsqz['option7']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>7"><?php echo $rsqz['option7']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option8'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>8">Option
                                                    8:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>8"
                                                    value="<?php echo $rsqz['option8']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>8"><?php echo $rsqz['option8']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option9'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>9">Option
                                                    9:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>9"
                                                    value="<?php echo $rsqz['option9']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>9"><?php echo $rsqz['option9']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option10'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>10">Option
                                                    10:</b>
                                                <input type="radio" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>10"
                                                    value="<?php echo $rsqz['option10']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>10"><?php echo $rsqz['option10']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
												}
												if ($rsqz['question_type'] == 'Check Box') {
													if ($rsqz['option1'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>1">Option
                                                    1:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>1"
                                                    value="<?php echo $rsqz['option1']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>1"><?php echo $rsqz['option1']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option2'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>2">Option
                                                    2:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>2"
                                                    value="<?php echo $rsqz['option2']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>2"><?php echo $rsqz['option2']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option3'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>3">Option
                                                    3:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>3"
                                                    value="<?php echo $rsqz['option3']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>3"><?php echo $rsqz['option3']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option4'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>4">Option
                                                    4:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>4"
                                                    value="<?php echo $rsqz['option4']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>4"><?php echo $rsqz['option4']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option5'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>5">Option
                                                    5:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>5"
                                                    value="<?php echo $rsqz['option5']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>5"><?php echo $rsqz['option5']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option6'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>6">Option
                                                    6:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>6"
                                                    value="<?php echo $rsqz['option6']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>6"><?php echo $rsqz['option6']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option7'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>7">Option
                                                    7:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>7"
                                                    value="<?php echo $rsqz['option7']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>7"><?php echo $rsqz['option7']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option8'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>8">Option
                                                    8:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>8"
                                                    value="<?php echo $rsqz['option8']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>8"><?php echo $rsqz['option8']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option9'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>9">Option
                                                    9:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>9"
                                                    value="<?php echo $rsqz['option9']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>9"><?php echo $rsqz['option9']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
													if ($rsqz['option10'] != "") {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>10">Option
                                                    10:</b>
                                                <input type="checkbox" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>10"
                                                    value="<?php echo $rsqz['option10']; ?>"
                                                    style="display: inline-block; border: 1px solid #000;border-radius: 50%;margin: 0 0.5em;width: 30px;height: 15px;">
                                                <label
                                                    for="option<?php echo $rsqz[0]; ?>10"><?php echo $rsqz['option10']; ?></label>
                                            </td>
                                        </tr>
                                        <?php
													}
												}
												if ($rsqz['question_type'] == 'Text Box') {
													?>
                                        <tr>
                                            <td>
                                                <b style='color: #9b2928;' for="option<?php echo $rsqz[0]; ?>10">Kindly
                                                    enter your Answer here</b>
                                                <textarea class="form-control" name="option<?php echo $rsqz[0]; ?>"
                                                    id="option<?php echo $rsqz[0]; ?>10"></textarea>
                                            </td>
                                        </tr>
                                        <?php
												}
												?>
                                    </table>
                                    <span class="errormessage<?php echo $qno; ?>"></span>
                                    <!-- style="display: none;" -->
                                </td>
                            </tr>
                            <?php
									$qno = $qno + 1;
								}
								?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <center><input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info"></center>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </form>
    </section>
    <?php
	}
	?>
</div>
<!-- /.content-wrapper -->
<?php
include("footer.php");
?>
<div id="idansstatus"><?php $sqlqz = "SELECT * FROM feedbackquestion_result WHERE feedbacktopicid='$_SESSION[feedbacktopicid]' AND date='$_SESSION[dttim]' AND parentid='$_SESSION[parentid]' and selectedanswer != ''";
						$qsqlqz  = mysqli_query($con, $sqlqz); ?><input type="hidden" name="answereedq" id="answereedq"
        value="<?php echo mysqli_num_rows($qsqlqz); ?>"><?php $sqlqz = "SELECT * FROM feedbackquestion_result WHERE feedbacktopicid='$_SESSION[feedbacktopicid]' AND date='$_SESSION[dttim]' AND parentid='$_SESSION[parentid]' and selectedanswer=''";
																																										$qsqlqz  = mysqli_query($con, $sqlqz); ?><input type="hidden"
        name="unanswereedq" id="unanswereedq" value="<?php echo mysqli_num_rows($qsqlqz); ?>"></div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script src="dist/js/pages/dashboard3.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    var isValid = true;

    $('#feedBackPanelForm').submit(function(e) {
        isValid = validateForm();
        if (!isValid) {
            e.preventDefault();
        }
    });

    function validateForm() {
        isValid = true;
        var fieldType = "";
        var i = 1;

        $('.questions').each(function() {
            var question = $(this);
            var options = question.find(':input[type="radio"], :input[type="checkbox"], textarea');
            var textEmpty = false;
            var optionSelectedRadio = false;
            var optionSelectedCheckbox = false;

            options.each(function() {
                var field = $(this);
                fieldType = field.attr('type');
                if (field.is(':radio')) {
                    if (field.is(':checked')) {
                        optionSelectedRadio = true;
                        return false;
                    }
                } else if (field.is(':checkbox')) {
                    if (field.is(':checked')) {
                        optionSelectedCheckbox = true;
                        return false;
                    }
                } else if (field.is('textarea')) {
                    if (field.val().trim() === '') {
                        textEmpty = true;
                    } else {
                        textEmpty = false;
                    }
                }
            });

            if (textEmpty === true && fieldType === undefined) {
                question.addClass('error');
                $('.errormessage' + (i)).text("Text input cannot be empty.");
                isValid = false;
            } else if (textEmpty === false && fieldType === undefined) {
                $('.errormessage' + (i)).text('');
                question.removeClass('error');
                textEmpty = true;
            }

            if (optionSelectedRadio === false && fieldType === 'radio') {
                question.addClass('error');
                $('.errormessage' + (i)).text("No option is selected.");
                isValid = false;
            } else if (optionSelectedRadio === true && fieldType === 'radio') {
                $('.errormessage' + (i)).text('');
                question.removeClass('error');
                optionSelectedRadio = false;
            }

            if (optionSelectedCheckbox === false && fieldType === 'checkbox') {
                question.addClass('error');
                $('.errormessage' + (i)).text("No option is selected.");
                isValid = false;
            } else if (optionSelectedCheckbox === true && fieldType === 'checkbox') {
                $('.errormessage' + (i)).text('');
                question.removeClass('error');
                optionSelectedCheckbox = false;
            }

            i = i + 1;
        });

        return isValid;
    }
});
</script>
</body>

</html>