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

/*document.querySelector('#close-edit').onclick = () => {
   document.querySelector('.products').style.display = 'none';
   window.location.href = 'index.php';
};*/

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

function enviarEmail() {

  const nome = document.getElementById('nome').value;
  const sobrenome = document.getElementById('sobrenome').value;
  const assunto = document.getElementById('subject').value;
  const mensagem = document.getElementById('message').value;

  Email.send({
    Host: "smtp.gmail.com",
    Username: "sender@email_address.com",
    Password: "Enter your password",
    To: 'receiver@email_address.com',
    From: "sender@email_address.com",
    Subject: assunto,
    Body: `E-mail enviado por ${nome} ${sobrenome}. 
      /${mensagem}`,
  })
    .then(function (message) {
      alert("E-mail enviado com sucesso!")
    });

}