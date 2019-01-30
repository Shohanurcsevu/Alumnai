<?php 
include('lheader.php');
?>
    <div class="v-profile-bio">
        <div class="v-pro-img">
            <img src="img/1.png" alt="profile">
        </div>
        <div class="v-pro-details">
           <div class="member-head bg-info">
               <div class="row">
                   <div class="col-md-6">
                       <div class="class-time">
                           <b class="alert"><?php echo date('d-M-Y');?></b>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="class-admin text-right">
                           <b class="text-right alert">Hi, <?php echo $_SESSION['name'];?></b>
                       </div>
                   </div>
               </div>
           </div>
           <div class="member-form" style="margin-top:10px">
               <form action="" method="POST">
                   <input type="text" name="s" id="s" placeholder="Member Name" class="form-control" autocomplete="off">
               </form>
           </div>
            <div class="member-table" style="margin-top:10px">
               <table class="table table-responsive table-border table-striped text-center">
                   <thead class="bg-primary">
                       <tr>
                           <th class="text-center">Name</th>
                           <th class="text-center">Email</th>
                           <th class="text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody id="output">
                   </tbody>
               </table>
           </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<?php include('footer.php');?>
<!-- custom chat scripts -->
<script>
    $(document).ready(function(){
        var user_id = "<?php echo $_SESSION['user_id'];?>";

        fetch_user();
        //update data interval function
        setInterval(function(){
            update_last_activity();
            fetch_user();
        },5000);

        //fetch user
        function fetch_user()
        {
          $.ajax({
            url:"ajax_fetch_user.php",
            method:"POST",
            success:function(data){
            $('#output').html(data);
            }
          })
        }

        //update user last activity data function
        function update_last_activity(){
            $.ajax({
                url:"ajax_update_last_activity.php",
                data: { "user_id": user_id},
                method: "POST",
                success:function(data){
                    
                }
            })
        }

        //open sent message modal for new message
        $(document).on('click', '.start_chat', function(){

          /*
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
            */
        });


    });

</script>
<script>
$(document).ready(function(){
    $('#s').keyup(function(){
        var s = $('#s').val();
        $.ajax({
           url :'ajaxcall.php',
            method:'POST',
            data:{s:s},
            success:function(data){
                $('#output').html(data);
            }
        });
    });
});
</script>