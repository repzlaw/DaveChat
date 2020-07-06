var postId = 0;
var postBodyElement = null;


    //ajax codes
        //edit modal
$('.post').find('.interaction').find('.edit').on('click',function(event){
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[0];
    postId = event.target.parentNode.parentNode.dataset['postid'];

    var postBody = postBodyElement.textContent;
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function(){
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data:{body: $('#post-body').val(), postId: postId, _token: token}

    })
    .done(function(msg){
        $(postBodyElement).text(msg['new_body']);
        $('#edit-modal').modal('hide');
    });
});
        //like and dislike code
$('.like').on('click', function(event) {
    // var isLike =  event.target.previousElementSibling ==null;
    // console.log(isLike);
     event.preventDefault();
     postId = event.target.parentNode.parentNode.dataset['postid'];
     var isLike = event.target.previousElementSibling ==null;
    $.ajax({
        method: 'POST',
        url: urlLike,
       data: {isLike: isLike, postId: postId, _token: token}
     })
        .done(function () {
             event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Post Liked' : 'Like' : event.target.innerText == 'Dislike' ? 'Post Disliked' :'Dislike';
                if (isLike) {
                    event.target.nextElementSibling.innerText = 'Dislike';

                }else{
                    event.target.previousElementSibling.innerText = 'Like';
                }

            });
    
});