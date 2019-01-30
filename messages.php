<?php
    include('header.php');
    if(!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }
?>
<div class="container" >
    <h3 class="text-center messaging_div" style="margin:20px 0;">Messaging</h3>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Recent</h4>
                </div>
                
              </div>
                <div class="inbox_chat">

                </div>
            </div>
            <div class="mesgs" id="msg_body">

            </div>
        </div>
    </div>
</div>


<?php include('footer.php');?>
<script>
    $(document).ready(function(){

        // jump to chat div immediately on document load
        $('html, body').animate({
            scrollTop: $('.messaging_div').offset().top
        }, 'slow');

        //fetch chat user list
        function fetch_chat_user_list(){
            $.ajax({
                url:"ajax_fetch_chat_user_list.php",
                method:"POST",
                success:function(data){
                    $('.inbox_chat').html(data);
                }
            });
        }

        //fetch user chat history
        function fetch_user_chat_history(message_to_user_id,message_from_user_id){
            $.ajax({
                url:"ajax_fetch_user_chat_history.php",
                method:"POST",
                data:{message_to_user_id:message_to_user_id, message_from_user_id: message_from_user_id},
                success:function(data){
                $('.mesgs').html(data);
                    var objDiv = document.getElementById("msg_history");
                    objDiv.scrollTop = objDiv.scrollHeight; 
                }
            });
        }

        //go to user chat
        $(document).on('click', '.active_chat', function(){
            $('.active_chat').css("background-color", "#ebebeb");
            $(this).css("background-color", "#fdfdfd");
            let message_to_user_id = $(this).attr('id');
            let message_from_user_id = "<?php echo $_SESSION['user_id'];?>";
            fetch_user_chat_history(message_to_user_id, message_from_user_id);

            //setInterval(function(){
            //    fetch_user_chat_history(message_to_user_id, message_from_user_id);
            //},1000);
        });

        //insert chat into database
        $(document).on('click', '.msg_send_btn', function(){
            let message_to_user_id = $(this).attr('id');
            let message_from_user_id = "<?php echo $_SESSION['user_id'];?>";
            let chat_message = $(this).parent(".input_msg_write").children('.write_msg').val();

            $.ajax({
                url:"ajax_insert_chat.php",
                method:"POST",
                data:{message_to_user_id:message_to_user_id, chat_message:chat_message, message_from_user_id:message_from_user_id},
                success:function(data)
                {
                    fetch_user_chat_history(message_to_user_id, message_from_user_id);
                }
            })
        });

        //update data interval function
        setInterval(function(){
            fetch_chat_user_list();
            /*
            let message_from_user_id = "<?php echo $_SESSION['user_id'];?>";
            $('.active_chat').each(function(){
                let message_to_user_id = parseInt($(this).attr('id'));
                fetch_user_chat_history(message_to_user_id, message_from_user_id);
            });
            */
        },1000);
    });
</script>