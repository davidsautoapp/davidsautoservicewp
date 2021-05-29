var btn = document.getElementById('sendBtn').addEventListener('click', function() {
  // alert('Clicked')
  var xhr = new XMLHttpRequest();
  var params = 'email=ipsum&name=binny';

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.open('post', '/mail', true)
  xhr.send(params)
})

// function sendEmail() {
//   var email = {
//     email: $("#email").val(),
//     message: $("#message").val()
//   }
//   $.post('/mail', email).done(() => {
//     $('#emailForm').html('<p>Your message was sent successfully!<br>We will contact you soon.<br>Please give us also a call if you do not hear from us!</p>')
//     localStorage.setItem('email', "");
//     localStorage.setItem('message', "");
//   });
// }