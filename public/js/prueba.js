//  Animations initialization 
new WOW().init();

var postId = 0;
var postBodyElement = null;
var welcome = false;
var val = true;
var not = [];
var notificaciones = "";
var form = "";


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
    form = "register";
    $('#registro').toggleClass('d-none');
    $('#login').addClass('d-none');
  } else {
    welcome = true;
    form = "login";
    $('#login').toggleClass('d-none');
    $('#registro').addClass('d-none');
  }
  resetOnChangeWelcome();
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
  resetWelcome();
  notificaciones = "";
  var name = $("input[name=name]").val();
  var password = $("input[name=password]").val();
  var password_confirmation = $("input[name=password_confirmation]").val();
  var email = $("input[name=email]").val();
  validateParams(params = {
    "name": name,
    "password": password,
    "password_confirmation": password_confirmation,
    "email": email
  }, form = "register");
  if (val) {
    $('#I' + form).addClass('fas fa-spinner fa-spin');
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
        if (data.error) {
          $('#alertas').addClass('bq-warning').removeClass('d-none');
          $('#I' + form).addClass('fas fa-times red-text').removeClass('fa-spin');
          $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>" + data.error + "</li></ul>");
        } else if (data.errors) {
          $('#alertas').addClass('bq-warning').removeClass('d-none');
          $('#I' + form).addClass('fas fa-times red-text').removeClass('fa-spin');
          jQuery.each(data.errors, function (key1, value1) {
            jQuery.each(value1, function (key, value) {
              notificaciones += "<li class='small'>" + value + "</li>";
              $('#' + form + '-form').closest('form').find("input[name=" + key1 + "]").addClass('invalid');
              if (key1 == "password")
              $('#' + form + '-form').closest('form').find("input[name=password_confirmation]").addClass('invalid');
            })
          });
          $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
        } else {
          $('#I' + form).addClass('fas fa-check green-text').removeClass('fa-spin');
          $('#' + form + '-form').closest('form').find("input").val("").removeClass('valid invalid');
          $('#' + form + '-form').closest('form').find("label").removeClass('active');
          $('#alertas').addClass('bq-success').removeClass('d-none');
          $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>Usuario creado correctamente, comprueba tu correo electronico para activar tu cuenta. (Puede estar en la bandeja de spam)</li></ul>");
        }
      }
    })
  }
});

$("#btn-login").click(function (e) {
  e.preventDefault();
  resetWelcome();
  notificaciones = "";
  var identity = $("input[name=identity]").val();
  var password = $("input[id=password_login]").val();
  validateParams(params = {
    "identity": identity,
    "password": password,
  }, form = "login");
  if (val) {
    $('#I' + form).addClass('fas fa-spinner fa-spin');
    $.ajax({
      type: 'POST',
      url: urlLogin,
      data: {
        identity: identity,
        password: password,
      },
      success: function (data, textStatus) {
        if (data.error) {
          $('#alertas').addClass('bq-warning').removeClass('d-none');
          $('#I' + form).addClass('fas fa-times red-text').removeClass('fa-spin');
          $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>" + data.error + "</li></ul>");
        } else if (data.errors) {
          $('#alertas').addClass('bq-warning').removeClass('d-none');
          $('#I' + form).addClass('fas fa-times red-text').removeClass('fa-spin');
          jQuery.each(data.errors, function (key1, value1) {
            jQuery.each(value1, function (key, value) {
              notificaciones += "<li class='small'>" + value + "</li>";
              $('#' + form + '-form').closest('form').find("input[name=" + key1 + "]").addClass('invalid');
            })
          });
          $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
        } else {
          // $('#I' + form).addClass('fas fa-check green-text').removeClass('fa-spin');
          // $('#' + form + '-form').closest('form').find("input").val("").removeClass('valid invalid');
          // $('#' + form + '-form').closest('form').find("label").removeClass('active');
          // $('#alertas').addClass('bq-success').removeClass('d-none');
          // $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>Usuario creado correctamente, comprueba tu correo electronico para activar tu cuenta. (Puede estar en la bandeja de spam)</li></ul>");
          window.location = urlhome;
        }
      }
    })
  }
});

function validateParams(params) {
  val = true;
  not = [];
  notificaciones = "";
  validar_required(params);
  validar_password(params.password, params.password_confirmation);
  validar_email(params.email);
  console.log(params);
  if (!val) {
    $('#alertas').addClass('bq-warning').removeClass('d-none');
    $('#I' + form).removeClass('fa-spinner fa-spin far fa-share-square').addClass('fas fa-times red-text');
    jQuery.each(not, function (key, value) {
      notificaciones += "<li class='small'>" + value + "</li>";
    });
    $('#alertas').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
  }
  return val;
}

function validar_email(email) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (regex.test(email)) {
    not.push("Email invalido");
    val = false;
    $('#' + form + '-form').closest('form').find("input[name=email]").addClass('invalid');
  }
}

function validar_password(password, password_confirmation) {

  if (form == "register" || form == "reset") {
    if (password != password_confirmation) {
      not.push("Las contraseñas no coinciden.");
      val = false;
      $('#' + form + '-form').closest('form').find("input[name=password]").addClass('invalid');
      $('#' + form + '-form').closest('form').find("input[name=password_confirmation]").addClass('invalid');
    }
    if (password.length < 5 && password.length > 1) {
      not.push("La contraseña debe contener minimo 5 caracteres.");
      $('#' + form + '-form').closest('form').find("input[name=password]").addClass('invalid');
      $('#' + form + '-form').closest('form').find("input[name=password_confirmation]").addClass('invalid');
      val = false;
    }
  } else if (password.length < 5 && password.length > 1) {
    not.push("La contraseña debe contener minimo 5 caracteres.");
    $('#' + form + '-form').closest('form').find("input[name=password]").addClass('invalid');
    val = false;
  }


}

function validar_required(params) {
  jQuery.each(params, function (key, value) {
    if (value == "") {
      val = false;
      if (key != "identity")
        not.push("El campo " + key + " es requerido.");
      else
        not.push("Debes introducir un email o nombre de usuario");
      $('#' + form + '-form').closest('form').find("input[name=" + key + "]").addClass('invalid');
    }
  });
}

function resetWelcome() {
  $('#I' + form).removeClass('red-text');
  $('#I' + form).removeClass('green-text');
  $('#I' + form).addClass('far fa-share-square');
  $('#alertas').addClass('d-none');
}

function resetOnChangeWelcome() {
  $('#I' + form).removeClass('red-text');
  $('#I' + form).removeClass('green-text');
  $('#I' + form).addClass('far fa-share-square');
  $('#alertas').addClass('d-none');
  $('#' + form + '-form').closest('form').find("input").removeClass('invalid valid').val("");
  $('#' + form + '-form').closest('form').find("label").removeClass('active');
}