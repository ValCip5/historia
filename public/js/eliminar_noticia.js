assignFunctions();

function assignFunctions() {
  const buttons = document.getElementsByClassName('noticia_eliminar');
  
  console.log("hola");
  for (let i=0; i<buttons.length; i++) {
    buttons[i].onclick = () => assignHref(buttons[i].getAttribute('value'));
  }
}

function assignHref(href) {

  dialogButton().setAttribute('href', href);
}

function dialogButton() {
  return document.getElementById('eliminar');
}