/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery( document ).ready(function( $ ) {
    $.ajax({
        type: "POST",
        url: 'get_news_post'
//        data: $(that).serialize()
        })
        .done(function( results ) {
//            $(target).html(data);
                console.log(results);
                $.each(results, function(){
                    console.log('co to');
                    $("#posts").append('<div class="unity post">'
                    +'<input type="hidden" name="user_id" value="'+this.user_id+'">'
                    +'<input type="hidden" name="=id" value="'+this.id+'">'
                    +'<div class="date">'+this.time_add+'</div>'
                    +'<div class="post">'+this.post+'</div>'
                    +'</div>');
                })
        });
});
