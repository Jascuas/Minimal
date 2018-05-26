var postId = 0;
var postBodyElement = null;
var welcome = false;
// var login = false;


$('.edit').on('click', function (event) {
  event.preventDefault();
  postBodyElement = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1];
  var postBody = postBodyElement.textContent;
  postId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
  $('#post-body').val(postBody);
  $('#edit-modal').modal();
});

$('#modal-save').on('click', function () {
  $.ajax({
      method: 'POST',
      url: urlEdit,
      data: {
        new_post: $('#post-body').val(),
        postId: postId,
        _token: token
      }
    })
    .done(function (msg) {
      $(postBodyElement).text(msg['new_body']);
      $('#edit-modal').modal('hide');
    });
});

$('.like').on('click', function (event) {
  event.preventDefault();
  var isLike = event.target.parentNode.id;
  postId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
  $.ajax({
      method: 'POST',
      url: urlLike,
      data: {
        isLike: isLike,
        postId: postId,
        _token: token
      }
    })
    .done(function (msg) {

      if (isLike == 'like')
        $(event.target).toggleClass('far fas');
      else
        $(event.target).toggleClass('fas far');
      $('#contid' + postId).text(msg);
    });
});

 function cambiar() {
  if (welcome) {
    welcome = false;
    $('#registro').toggleClass('d-none');
    $('#login').addClass('d-none');
  } else {
    welcome = true;
    $('#login').toggleClass('d-none');
    $('#registro').addClass('d-none');
  }
}

$('.cambiar').on('click', cambiar);

