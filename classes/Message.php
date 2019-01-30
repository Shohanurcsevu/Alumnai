<?php
/**
 * User Management
 */
class Message
{
    public $db;
    public $user;
    function __construct(){
        include_once('Database.php');
        $this->db = new Database();
        include_once('User.php');
        $this->user = new User();
    }

    //get list of persons name of chat
    public function chat_person_list(){
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT DISTINCT message_to_user_id FROM messages WHERE message_from_user_id='$user_id' ";

		$result = $this->db->connection->query($sql);
		$output = "";
        if($result->num_rows > 0){  
            foreach ($result as $person) {
            	$output .="
                        <div class='chat_list active_chat' id=".$person['message_to_user_id'].">
                            <div class='chat_people'>
                                <div class='chat_img'> 
                                    <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'>
                                </div>
                                <div class='chat_ib'>
                                    <h5>
                                        ".$this->user->get_name_by_id($person['message_to_user_id']);
                                        ?>

                                        <?php
                                            $user_activity = $this->user->user_active_status($person['message_to_user_id']);
                                            if($user_activity=='online'){
                                                $output .= "<i class='status-active'></i>";
                                            }else{
                                                $output .=  "<i class='status-inactive'></i>";
                                            }
                                            
                $output .="
                                    </h5>
                                    <p>
                                       	";
                     
                $output .=" 
                                    </p>
                                </div>
                            </div>
                        </div>
            	";
            }
        } else {
            return false;
        }
        echo $output;
    }

    //insert chat
    public function insert_chat($message_to_user_id, $message_from_user_id, $chat_message){
    	$status = 0;

    	$sql = "INSERT INTO messages (message_to_user_id , message_from_user_id, chat_message, status) VALUES ('$message_to_user_id', '$message_from_user_id', '$chat_message' , '$status')";
        if ($this->db->connection->query($sql) === TRUE) {
            return "Message Sent.";
        } else {
            return "Message Sending Failed.";
        }
    }

    //display chat history
	function fetch_user_chats($message_to_user_id, $message_from_user_id){
		$sql = "SELECT * FROM messages  WHERE
				(message_from_user_id = '".$message_from_user_id."' 
				AND message_to_user_id = '".$message_to_user_id."') 
				OR (message_from_user_id = '".$message_to_user_id."' 
				AND message_to_user_id = '".$message_from_user_id."') 
				ORDER BY timestamp ASC
				";
		$result = $this->db->connection->query($sql);
		$output = "<div class='msg_history' id='msg_history'>";
		if($result->num_rows > 0){
			$update_status_query = "UPDATE messages SET status='1' WHERE
				message_from_user_id = '$message_from_user_id' 
				AND message_to_user_id = '$message_to_user_id' ";
			$this->db->connection->query($update_status_query);
			foreach($result as $row){
				if($message_from_user_id == $row["message_from_user_id"]){
					$output .= "
	                    <div class='outgoing_msg'>
	                        <div class='sent_msg'>
	                            <p>".$row['chat_message']."</span>
	                            <span class='time_date'>".$row['timestamp']."</span> 
	                        </div>
	                    </div>
					";
				}else{
					$output .= "
	                    <div class='incoming_msg'>
	                        <div class='incoming_msg_img'>
	                            <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'>
	                        </div>
	                        <div class='received_msg'>
	                            <div class='received_withd_msg'>
	                                <p>".$row['chat_message']."</span>
	                                <span class='time_date'> 11:01 AM    |    June 9</span> 
	                            </div>
	                        </div>
	                    </div>
                    ";
				}
			}
		}	

		$output .="
				</div>
                <div class='type_msg'>
                    <div class='input_msg_write'>
                        <input type='text' class='write_msg' id='".$message_to_user_id."' placeholder='Type a message' />
                        <button class='msg_send_btn' id='".$message_to_user_id."' type='button'><i class='fa fa-arrow-right' aria-hidden='true'></i></button>
                    </div>
                </div>
		";

		return $output;
	}



}

