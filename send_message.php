<?php 
include('lheader.php');
    //get user_id from get method
    if($_SERVER['REQUEST_METHOD']== "GET" AND isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }

    //get user_id from post method
    if($_SERVER['REQUEST_METHOD']== "POST"){
    	$message_to_user_id = $_POST['message_to_user_id'];
    	$message_from_user_id = $_POST['message_from_user_id'];
    	$chat_message = $_POST['chat_message'];
    	$message->insert_chat($message_to_user_id, $message_from_user_id, $chat_message);
        //header("location: messages.php");
        echo "<script>window.location.href = 'messages.php';</script>";
    }
?>
<section class="msg-bio-area-start" style="padding-top:15px;">
    <div class="container">
        <div class="row">
            <div class="msg-bio-area">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <div class="msg-biography">
                        <h1><?php echo $user->get_name_by_id($user_id);?></h1>
                        <p>Enjoy your messagin.</p>
                        
			            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="message_to_user_id" value="<?php echo $user_id; ?> ">
                            <input type="hidden" name="message_from_user_id" value="<?php echo $_SESSION['user_id']; ?>" class="form-control">
                            <textarea name="chat_message" cols="30" rows="10" placeholder="Message Here" class="form-control"></textarea>
                            <button class="btn default-btn text-uppercase text-center" type="submit" id="msg-btnn"><i class="fa fa-check-circle"></i>send</button>
                            <b id="smsg"></b>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>

