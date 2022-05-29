let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
};

window.onscroll = () => {
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
};

const btnClose = document.querySelector('#close-edit');

btnClose?.addEventListener('click', function () {
  document.querySelector('#form-modal').style.display = 'none';
  window.location.href = 'admin.php';
})

const searchInput = document.getElementById('txtBusca');
// store name elements in array-like object
const namesFromDOM = document.getElementsByClassName('box');
// listen for user events
searchInput.addEventListener('keyup', (event) => {
  const { value } = event.target;
  // get user search input converted to lowercase
  const searchQuery = value.toLowerCase();
  for (const nameElement of namesFromDOM) {
    // store name text and convert to lowercase
    let name = nameElement.textContent.toLowerCase();
    // compare current name to search input
    if (name.includes(searchQuery)) {
      // found name matching search, display it
      nameElement.style.display = "block";
    } else {
      // no match, don't display name
      nameElement.style.display = "none";
    }
  }
});

function limparFormulario() {
  parent.document.getElementById("contact-form").reset();
  parent.document.getElementById("name").focus();
}

function enviarEmail() {

  const nome = document.getElementById('name').value;
  const sobrenome = document.getElementById('sobrenome').value;
  const assunto = document.getElementById('subject').value;
  const mensagem = document.getElementById('message').value;

  var templateParams = {
    nome: nome,
    sobrenome: sobrenome,
    assunto: assunto,
    mensagem: mensagem
  };

  emailjs.send('gmail', 'template_padrao', templateParams)
    .then(function (response) {
      console.log('E-mail enviado com sucesso!', response.status, response.text);
      alert("E-mail enviado com sucesso!")
    }, function (error) {
      console.log('Falha ao enviar e-mail...', error);
      alert("Falha ao enviar e-mail!")
    });

  limparFormulario()
}


function enviarEmailConfirmacao() {

  const nome = document.getElementById('name_confirmacao').value;
  const email = document.getElementById('email_confirmacao').value;

  var templateParams = {
    nome_compra: nome,
    email_confirmacao: email
  };

  emailjs.send('gmail', 'template_confirmacao', templateParams)
    .then(function (response) {
      console.log('E-mail enviado com sucesso!', response.status, response.text);
      alert("Um e-mail de confirmação de pedido chegará em breve!")
    }, function (error) {
      console.log('Falha ao enviar e-mail de confirmação de pedido...', error);
    });

}

