document.addEventListener("DOMContentLoaded", function () {
  var campeones = document.getElementsByClassName("campeonn");
  Array.from(campeones).forEach(function (campeon) {
    campeon.addEventListener("click", function () {
      let cod = campeon.getAttribute("data-cod");
      const cargaElement = document.getElementById("carga");
      cargaElement.style.display = "block";
      document.getElementById("contenido").textContent = "";

      setTimeout(() => {
        fetch(`datos.php?data-cod=${cod}`)
          .then((res) => res.text())
          .then((data) => {
            document.getElementById("contenido").innerHTML = data;
            cargaElement.style.display = "none";
          })
          .catch((error) => {
            console.error("Error:", error);
            cargaElement.style.display = "none";
          });
      }, 2000); // 2000 milisegundos = 2 segundos
    });
  });
});
