<?php 
	Class SendEmail{

		function check_exit_class($conn){
			$sql="SELECT * FROM priv_backgroundtask WHERE class_name='SendEmail'";
			$data=$conn->query($sql);
			$date=date("Y-m-d h:i:s");
			if($data->num_rows){
				SendEmail::update_latest_run_date($conn,$date);
			}else{
				SendEmail::insert_backgroundtask($conn,$date);
			}
		}


		function update_latest_run_date($conn,$date){
			$sql = "UPDATE priv_backgroundtask SET latest_run_date='$date' WHERE class_name='SendEmail'";
			$conn->query($sql);
		}

		function insert_backgroundtask($conn,$date){
			$sql="INSERT INTO priv_backgroundtask (id,class_name,first_run_date,latest_run_date,next_run_date,total_exec_count,latest_run_duration,min_run_duration,max_run_duration,average_run_duration,running,status) VALUES ('', 'SendEmail', '$date', '$date','','','','','','',1,'active')";
			$conn->query($sql);
		}

		function get_email_body_with_status($conn,$status){
			$email_body_query="SELECT * FROM sttgdc_template WHERE template_name='$status'";
			$data=$conn->query($email_body_query);
			return $data;
		}

		function get_email_template_data($conn,$id){
			$email_template="SELECT  id,template_id,subject,body FROM sttgdc_email_template WHERE template_id='$id' ORDER BY id DESC LIMIT 1";
			$result=$conn->query($email_template);
			return $result;
		}

		function InsertEvent($conn,$message, $date, $userinfo, $realclass,$to,$from,$subject,$body){
			$inserteventquery = "INSERT INTO priv_event (id,message,date,userinfo,realclass) VALUES ('','$message','$date','$userinfo','$realclass')";
			$result=$conn->query($inserteventquery);
			if($result===TRUE){
				//========================= start InsertEventEmail=====================================
				$last_event_id= $conn->insert_id;
				$inserteventemail=SendEmail::InsertEventEmail($conn,$last_event_id,$to,$from,$subject,$body,$date);


				//=========================end ========================================================

			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}

		function InsertEventEmail($conn,$last_event_id,$to,$from,$subject,$body,$date){

			//========================= start InsertEventEmail=====================================

			$inserteventemailquery="INSERT INTO priv_event_email (id,`to`,cc,bcc,`from`,subject,body,attachments) VALUES ('$last_event_id','$to','','','$from','$subject','$body','')";
			$insert_event_email=$conn->query($inserteventemailquery);
			$last_eventemail_id= $conn->insert_id;

			//========================= End InsertEventEmail=====================================

			if($insert_event_email===TRUE){
				$event_id=$last_event_id;
				$insert_priv_async_task="INSERT INTO priv_async_task (id,status,created,started,planned,event_id,remaining_retries,last_error_code,last_error,last_attempt,realclass) VALUES ('','planned','$date','$date','$date','$event_id','','','','$date','SendEmail')";
				$conn->query($insert_priv_async_task);
			}

			//========================= End InsertEventEmail=====================================

			//========================= start priv_async_send_email=====================================
			$select_latest_eventemail="SELECT * FROM priv_event_email WHERE id='$last_eventemail_id'";
			$eventemail_data=$conn->query($select_latest_eventemail);
			$data=$eventemail_data->fetch_assoc();
			$eventemail_to=$data['to'];
			$eventemail_subject=$data['subject'];
			$eventemail_message="Testing from Kid Kid";
			$insert_asynctaskemail_query="INSERT INTO priv_async_send_email (id,version,`to`,subject,message) VALUES ('','2','$eventemail_to','$eventemail_subject','$eventemail_subject')";
			$conn->query($insert_asynctaskemail_query);
		}



	}

?>

