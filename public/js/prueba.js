//  Animations initialization 
new WOW().init();

var postId = 0;
var postBodyElement = null;
var welcome = false;



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
$('input, label').addClass('text-white');
$('.modal-color').toggleClass('text-white');

$.urlParam = function (name) {
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  if (results == null) {
    return null;
  } else {
    return decodeURI(results[1]) || 0;
  }
}
if ($.urlParam('modal_password')) {
  $('#resetpassword').modal('show');
  $('#password_token').val($.urlParam('token'));
}


$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  error: function (jqXHR, textStatus, errorThrown) {

    if (jqXHR.status === 0) {

      alert('Not connect: Verify Network.');

    } else if (jqXHR.status == 404) {

      alert('Requested page not found [404]');

    } else if (jqXHR.status == 500) {

      alert('Internal Server Error [500].');

    } else if (textStatus === 'parsererror') {

      alert('Requested JSON parse failed.');

    } else if (textStatus === 'timeout') {

      alert('Time out error.');

    } else if (textStatus === 'abort') {

      alert('Ajax request aborted.');

    } else {

      alert('Uncaught Error: ' + jqXHR.responseText);

    }

  }
});


$("#btn-register").click(function (e) {
  e.preventDefault();
  $('#Iregistro').removeClass('red-text');
  $('#Iregistro').removeClass('green-text');
  $('#Iregistro').addClass('fas fa-spinner fa-spin');
  $('#alertas').addClass('d-none');
  var name = $("input[name=name]").val();
  var password = $("input[name=password]").val();
  var password_confirmation = $("input[name=password_confirmation]").val();
  var email = $("input[name=email]").val();
  var notificaciones = "";
  $.ajax({
    type: 'POST',
    url: urlRegister,
    data: {
      name: name,
      email: email,
      password: password,
      password_confirmation: password_confirmation
    },
    success: function (data, textStatus) {
      if(data.error){
        $('#alertas').addClass('bq-warning').removeClass('d-none');
        $('#Iregistro').addClass('fas fa-times red-text').removeClass('fa-spin');
        $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>No se ha podido crear el usuario, vuelva a intentarlo mas tarde.</li></ul>");
        $('#register-form').closest('form').find("input").addClass('invalid');
      }
      else if (data.errors) {
        $('#alertas').addClass('bq-warning').removeClass('d-none');
        $('#Iregistro').addClass('fas fa-times red-text').removeClass('fa-spin');
        jQuery.each(data.errors, function (key1, value1) {
          jQuery.each(value1, function (key, value) {
          notificaciones += "<li class='small'>" + value + "</li>";
          $('#register-form').closest('form').find("input[name=" + key1 + "]").addClass('invalid');
          if (key1 == "password")
            $('#register-form').closest('form').find("input[name=password_confirmation]").addClass('invalid');
          })});
        $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
      } else {
        $('#Iregistro').addClass('fas fa-check green-text').removeClass('fa-spin');
        $('#register-form').closest('form').find("input").val("").removeClass('valid invalid');
        $('#register-form').closest('form').find("label").removeClass('active');
        $('#alertas').addClass('bq-success').removeClass('d-none');
        $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>Usuario creado correctamente, comprueba tu correo electronico para activar tu cuenta. (Puede estar en la bandeja de spam)</li></ul>");
      }
    }
  })
});