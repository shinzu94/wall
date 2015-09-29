<div class="post-box unity">
    
        
        <?php $attr = 'id="post_form"'; //The form will have the id 'my_form'
        echo form_open('home/post_form',$attr);
        ?>
        <div class="top">
                <div class="photo standard-radius flex-center"><span class="glyphicon glyphicon-camera">
                    <?php form_upload(); ?>
                </span></div>
        <?php
        $data = array(
                      'user_id'  => '1',
                    );

        echo form_hidden($data);
        $data = array(
           'name'        => 'new_post',
           'id'          => 'new_post',
           'value'       => '',
           'rows'        => '7',
           'cols'        => '50',
          'placeholder'        => 'Twoja wiadomość...',
          'class'     =>'new_post standard-radius'         );
       echo form_textarea($data);?>
        </div>
    <div class='bottom'>
    <?php $options = array(
                  '0'   => 'Post użytkownika',
                );

    echo form_dropdown('user', $options, '0');?>
    
    <?php $options = array(
                  '0'   => 'Publiczne',
                  '1'   => 'Znajomi znajomych',
                  '2'   => 'Znajomi',
                  '3'   => 'Prywatne',
                );

    echo form_dropdown('publiced_opt', $options, '0');?>
        <button type="submit" id="submit-post">Opubikuj</button>
    </div>
        <?php echo form_close(); ?>

</div>
<div class="smg"></div>
<div class="posts" id="posts"></div>
<script>
    $(function(){
       
            url = '<?php echo base_url(); ?>index.php/';
            console.log(url);
            console.log('<?php $this->load->helper('url');?>');
        $('#post_form').submit(function(evnt){
            console.log($("form#post_form #new_post").val());
            evnt.preventDefault(); //Avoid that the event 'submit' continues with its normal execution, so that, we avoid to reload the whole page
            $.post($("#post_form").attr('action'), $("#post_form").serialize(),function(json){
            }, 'json');
   
            $("#new_post").val('');
            
            return false;
        });
    });
    
    $function (){
    var url = '<?php echo base_url(); ?>index.php/';
        function check(){
            $.ajax({
                url: url+'home/get_new_post',
              }).done(function() {
              });
        }
    };
    
</script>