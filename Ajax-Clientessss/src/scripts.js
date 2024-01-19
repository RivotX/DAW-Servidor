document.addEventListener("DOMContentLoaded", function () {
  var campeones = document.getElementsByClassName("campeonn");
  Array.from(campeones).forEach(function (campeon) {
    campeon.addEventListener("click", function () {
      let cod = campeon.getAttribute("data-cod");
      const cargaElement = document.getElementById("carga");
      cargaElement.style.display = "block";
      document.getElementById("contenido").textContent = "";

      setTimeout(() => {
        fetch("./datos.json")
          .then((res) => res.json())
          .then((data) => {
            const campeonData = data[cod];
            if (campeonData) {
              document.getElementById("contenido").innerHTML = `
              <h2 class='mb-5 text-xl font-bold text-center'>${campeonData.champion}</h2>
              ${campeonData.description}
            `;
            } else {
              console.error("Código no proporcionado.");
            }
            cargaElement.style.display = "none";
          })
          .catch((error) => {
            console.error("Error:", error);
            cargaElement.style.display = "none";
          });
        // fetch(`datos.php?data-cod=${cod}`)
        //   .then((res) => res.text())
        //   .then((data) => {
        //     document.getElementById("contenido").innerHTML = data;
        //     cargaElement.style.display = "none";
        //   })
        //   .catch((error) => {
        //     console.error("Error:", error);
        //     cargaElement.style.display = "none";
        //   });
      }, 2000); // 2000 milisegundos = 2 segundos
    });
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var campeones = document.getElementsByClassName("campeonn");
  Array.from(campeones).forEach(function (campeon) {
    campeon.addEventListener("click", function () {
      let cod = campeon.getAttribute("data-cod");
      const cargaElement = document.getElementById("carga");
      cargaElement.style.display = "block";
      document.getElementById("contenido").textContent = "";

      setTimeout(() => {
        fetch("./datos.json")
          .then((res) => res.json())
          .then((data) => {
            const campeonData = data[cod];
            if (campeonData) {
              document.getElementById("contenido").innerHTML = `
              <h2 class='mb-5 text-xl font-bold text-center'>${campeonData.champion}</h2>
              ${campeonData.description}
            `;
            } else {
              console.error("Código no proporcionado.");
            }
            cargaElement.style.display = "none";
          })
          .catch((error) => {
            console.error("Error:", error);
            cargaElement.style.display = "none";
          });
        // fetch(`datos.php?data-cod=${cod}`)
        //   .then((res) => res.text())
        //   .then((data) => {
        //     document.getElementById("contenido").innerHTML = data;
        //     cargaElement.style.display = "none";
        //   })
        //   .catch((error) => {
        //     console.error("Error:", error);
        //     cargaElement.style.display = "none";
        //   });
      }, 2000); // 2000 milisegundos = 2 segundos
    });
  });
});
