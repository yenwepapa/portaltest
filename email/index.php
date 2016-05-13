<?php 
	// ======================= db connection start=====================================

	require_once('config.php');
	require_once('SendEmail.php');
	$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	mysqli_select_db($conn,$DB_NAME);

	// ======================= db connection end=====================================

	// ===========================check backgroundtask=============================== 


	SendEmail::check_exit_class($conn);

	// =============================================================================

	// ====================================start Insert Event =====================
	$userrequest_view="SELECT * FROM view_sttgdc_userrequest";
	$result=$conn->query($userrequest_view);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row =mysqli_fetch_array($result)) {
    	if($row['request_type']=="service_request"){
    		$customer_email=$row['caller_email'];
    		switch ($row['status']) {
    			case 'new':
    				if($customer_email){
    					$email_data_for_customer=SendEmail::get_email_body_with_status($conn,$row['status'].'_customer');
    					prepare_email($conn,$customer_email,$email_data_for_customer->fetch_assoc());
    				}
    				# code...
    				break;
    			case 'approved':
    				################for customer email#################################

    				if($customer_email){
    					$email_data_for_customer=SendEmail::get_email_body_with_status($conn,$row['status'].'_customer');
    					prepare_email($conn,$customer_email,$email_data_for_customer->fetch_assoc());
    				}

    				#########################for internal################################
    				// $email_data_for_internal=SendEmail::get_email_body_with_status($conn,$row['status'].'_internal');
    				break;
    			case 'waiting_for_approval':
    				# code...
    				break;
    			case 'pending':
    				# code...
    				break;
    			case 'rejected':
    				if($customer_email){
    					$email_data_for_customer=SendEmail::get_email_body_with_status($conn,$row['status'].'_customer');
    					prepare_email($conn,$customer_email,$email_data_for_customer->fetch_assoc());
    				}
    				# code...
    				break;
    			case 'closed':
    				if($customer_email){
    					$email_data_for_customer=SendEmail::get_email_body_with_status($conn,$row['status'].'_customer');
    					prepare_email($conn,$customer_email,$email_data_for_customer->fetch_assoc());
    				}
    				# code...
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}
    	
        // echo "id: " . $row["request_type"]."<br>";
    }
    die();
} else {
    echo "0 results";
}

function prepare_email($conn,$customer_email,$email_template){
	$email_template=SendEmail::get_email_template_data($conn,$email_template['id']);
	$email_template_data=$email_template->fetch_assoc();
	$message=$email_template_data['body'];
	$userinfo="moesusandar@proapps-solution.com";
	$date=date('Y-m-d h:i:s');
	$realclass="SendEmail";
	$to=$customer_email;
	$from="proapps-solution@gmail.com";
	$subject=$email_template_data['subject'];
	$body=$email_template_data['body'];
	SendEmail::InsertEvent($conn,$message,$date,$userinfo,$realclass,$to,$from,$subject,$body);

}
	// ====================================end=====================================


	
?>