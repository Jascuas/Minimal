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
$('#forgot-modal').on('hide.bs.modal', resetWelcome);
$('#forgot-modal').on('show.bs.modal', resetWelcome);

$.urlParam = function (name) {
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  if (results == null) {
    return null;
  } else {
    return decodeURI(results[1]) || 0;
  }
}
if ($.urlParam('modal_password')) {
  $('#reset-modal').modal('show');
  $('#password_token').val($.urlParam('token'));
  $('#resetemail').val($.urlParam('email'));
  $('#text-reset').text("Escriba la nueva contraseña para la cuenta con email: " + $.urlParam('email'));
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

function ajaxSuccess(data) {
  {
    if (data.error) {
      $('#I' + form).addClass('fas fa-times red-text').removeClass('fa-spin');
      if (form == "login" || form == "register")
        $('#alertas').addClass('bq-warning').removeClass('d-none').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>" + data.error + "</li></ul>");
      else
        $('#' + form + '-alert').removeClass('d-none').addClass('alert alert-warning').html("<ul class='list-unstyled text-left'>" + data.error + "</ul>");
    } else if (data.errors) {
      $('#I' + form).addClass('fas fa-times red-text').removeClass('fa-spin');
      jQuery.each(data.errors, function (key1, value1) {
        jQuery.each(value1, function (key, value) {
          notificaciones += "<li class='small'>" + value + "</li>";
          $('#' + form + '-form').closest('form').find("input[name=" + key1 + "]").addClass('invalid');
          if (key1 == "password")
            $('#' + form + '-form').closest('form').find("input[name=password_confirmation]").addClass('invalid');
        })
      });
      if (form == "login" || form == "register")
        $('#alertas').addClass('bq-warning').removeClass('d-none').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
      else
        $('#' + form + '-alert').removeClass('d-none').addClass('alert alert-warning').html("<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
    } else {
      if (form == "login") {
        window.location = urlhome;
      } else {
        $('#I' + form).addClass('fas fa-check green-text').removeClass('fa-spin');
        $('#' + form + '-form').closest('form').find("input").val("").removeClass('valid invalid');
        $('#' + form + '-form').closest('form').find("label").removeClass('active');
        if (form == "register")
          $('#alertas').addClass('bq-success').removeClass('d-none').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'><li class='small'>Usuario creado correctamente, comprueba tu correo electronico para activar tu cuenta. (Puede estar en la bandeja de spam)</li></ul>");
        else if (form == "forgot")
          $('#' + form + '-alert').addClass('alert alert-success').removeClass('d-none alert-warning').html("<ul class='list-unstyled text-left'>Email enviado correctamente, comprueba tu correo para confirmar el cambio de contraseña. (Puede estar en la bandeja de spam) <li class='small'></li></ul>");
        else
          $('#' + form + '-alert').addClass('alert alert-success').removeClass('d-none  alert-warning').html("<ul class='list-unstyled text-left'>Contraseña cambiada correctamente, pruebe a iniciar sesion.<li class='small'></li></ul>");

      }
    }
  }
}

$("#btn-register").click(function (e) {
  e.preventDefault();
  resetWelcome();
  form = "register"
  var name = $("input[name=name]").val();
  var password = $("input[name=password]").val();
  var password_confirmation = $("input[name=password_confirmation]").val();
  var username = $("input[name=username]").val();
  var email = $("input[name=email]").val();
  validateParams(params = {
    "name": name,
    "password": password,
    "password_confirmation": password_confirmation,
    "email": email,
    "username": username
  });
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
      success: function (data) {
        ajaxSuccess(data);
      }
    })
  }
});

$("#btn-login").click(function (e) {
  e.preventDefault();
  resetWelcome();
  form = "login"
  var identity = $("input[name=identity]").val();
  var password = $("input[id=password_login]").val();
  validateParams(params = {
    "identity": identity,
    "password": password,
  });
  if (val) {
    $('#I' + form).addClass('fas fa-spinner fa-spin');
    $.ajax({
      type: 'POST',
      url: urlLogin,
      data: {
        identity: identity,
        password: password,
      },
      success: function (data) {
        ajaxSuccess(data);
      }
    })
  }
});

$("#btn-forgot").click(function (e) {
  e.preventDefault();
  resetWelcome();
  form = "forgot"
  var email = $("input[id=forgot]").val();
  var token = $('#forgot-form').closest('form').find("input[name=_token]").val();
  validateParams(params = {
    "email": email,
  });
  if (val) {
    $('#I' + form).addClass('fas fa-spinner fa-spin');
    $.ajax({
      type: 'POST',
      url: urlForgot,
      data: {
        email: email,
        token: token,
      },
      success: function (data) {
        ajaxSuccess(data);
      }
    })
  }
});

$("#btn-reset").click(function (e) {
  e.preventDefault();
  resetWelcome();
  form = "reset"
  var password = $("input[id=reset_password]").val();
  var password_confirmation = $("input[id=resetpassword_confirmation]").val();
  var token = $('#password_token').val();
  var email = $('#resetemail').val();
  validateParams(params = {
    "password": password,
    "password_confirmation": password_confirmation,
    "email": email,
  });
  if (val) {
    $('#I' + form).addClass('fas fa-spinner fa-spin');
    $.ajax({
      type: 'POST',
      url: urlReset,
      data: {
        email: email,
        token: token,
        password: password,
        password_confirmation: password_confirmation,
      },
      success: function (data, responseText) {
        console.log(responseText);
        ajaxSuccess(data);
      }
    })
  }
});

function validateParams(params) {
  val = true;
  not = [];
  notificaciones = "";
  validar_required(params);
  if (form == "login" || form == "register" || form == "reset")
    validar_password(params.password, params.password_confirmation);
  if (form != "login")
    validar_email(params.email);
  if (!val) {
    $('#I' + form).removeClass('fa-spinner fa-spin far fa-share-square').addClass('fas fa-times red-text');
    jQuery.each(not, function (key, value) {
      notificaciones += "<li class='small'>" + value + "</li>";
    });
    if (form == "login" || form == "register")
      $('#alertas').addClass('bq-warning').removeClass('d-none').html("<p class='bq-title' style='font-size:1em'>Notificaciones</p>" + "<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
    else
      $('#' + form + '-alert').removeClass('d-none').addClass('alert alert-warning').html("<ul class='list-unstyled text-left'>" + notificaciones + "</ul>");
  }
}

function validar_email(email) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (!regex.test(email)) {
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
      $('#' + form + '-form').closest('form').find("input[name=" + key + "]").addClass('invalid');
    }
  });
  if (!val) not.push("No puedes dejar campos en blanco");
}

function resetWelcome() {
  $('#I' + form).removeClass('red-text green-text fas fa-spinner fa-spin').addClass('far fa-share-square');
  $('#alertas').addClass('d-none').removeClass('bq-warning bq-success');
  $('#' + form + '-alert').addClass('d-none');
  $('#' + form + '-form').closest('form').find("input").removeClass('invalid');
}

function resetOnChangeWelcome() {
  $('#I' + form).removeClass('red-text green-text').addClass('far fa-share-square');
  $('#alertas').addClass('d-none').removeClass('bq-warning bq-success');
  $('#' + form + '-form').closest('form').find("input").removeClass('invalid valid').val("");
  $('#' + form + '-form').closest('form').find("label").removeClass('active');
}


$( window ).on( "load", function() { $('.profile').masonry({
  itemSelector : '.images-profile'
})});