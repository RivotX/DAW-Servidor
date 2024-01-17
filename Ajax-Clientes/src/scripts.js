document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("h3").forEach(function (campeon) {
    campeon.addEventListener("click", function (event) {
      let cod = campeon.getAttribute("data-cod");
      fetch(`datos.php?data-cod=${cod}`)
        .then((res) => res.text())
        .then((data) => {
          document.getElementById("contenido").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
    });
  });
});
