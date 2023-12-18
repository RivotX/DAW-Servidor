const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});

function editar(boton) {
  var tr = boton.parentNode.parentNode;
  var tds = tr.querySelectorAll("td.td");

  var inputID = document.getElementById("inputID");
  var ID = tr.querySelector(".id").innerHTML;
  inputID.value = ID;
  console.log(inputID.value);

  tds.forEach((td, index) => {
    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "babuino");

    input.setAttribute("name", `campo${index + 1}`);
    input.setAttribute("required", "true"); // Añadir el atributo required
    td.innerHTML = "";
    td.appendChild(input); // Agregar input con atributo required
  });

  var form = document.getElementById("myForm");
  var submitButton = document.createElement("input");
  submitButton.setAttribute("type", "submit");
  submitButton.setAttribute("value", "Enviar");
  submitButton.style.width = "40px";
  submitButton.style.height = "25px";
  submitButton.style.cursor = "pointer";

  // Reemplazar el contenido del td del SVG con el input submit
  var celdaSvg = boton.parentNode;
  celdaSvg.innerHTML = "";
  celdaSvg.appendChild(submitButton);

  // Enviar formulario cuando se haga clic en el botón de enviar
  submitButton.addEventListener("click", function () {
    var inputs = document.querySelectorAll("input[type='text'].babuino");
    var valido = true;

    inputs.forEach((input) => {
      console.log(input);
      if (input.value.trim() === "") {
        valido = false;
      }
    });

    if (valido) {
      // Establecer los valores de los campos dentro del formulario
      inputs.forEach((input, index) => {
        form.querySelector(`input[name='campo${index + 1}']`).value =
          input.value;
      });

      form.submit();
    }
  });
}
function eliminar(boton) {
  var tr = boton.closest("tr");

  var id = tr.querySelector(".id").innerText.trim();

  borrar(id);
}
function borrar(ID) {
  var form = document.getElementById("formBorrar");
  var input = document.getElementById("borrar");

  input.value = ID;

  form.submit();
}

function pointer(element) {
  element.style.cursor = "pointer";
}
