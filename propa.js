document.addEventListener("DOMContentLoaded", function () {
    var popup = document.getElementById("popup");
    var closeButton = document.getElementById("close-button");
  
    closeButton.addEventListener("click", function () {
      popup.style.display = "none";
    });
  
    if (!localStorage.getItem('popupExibido')) {
    setTimeout(function () {
      popup.style.display = "block";
    }, 2000);
    localStorage.setItem('popupExibido', 'true');} // Exibe a propaganda após 2 segundos (você pode ajustar o tempo conforme necessário)
  });
  