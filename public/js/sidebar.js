document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("postModal");
    modal.style.display = "none";

    const openModalBtn = document.getElementById("openModal");
    const closeModal = document.getElementById("btn-close");

    // Abrir modal
    openModalBtn.addEventListener("click", function () {
      modal.style.display = "flex";
    });

    // Cerrar modal
    closeModal.addEventListener("click", function () {
      modal.style.display = "none";
    });

    // Cerrar al hacer click fuera del modal
    window.addEventListener("click", function (event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });

  document.getElementById('image').addEventListener('change', function () {
        const count = this.files.length;
        const label = document.getElementById('image-count');
        label.textContent = count === 0 ? '' :
            count === 1 ? '1 imagen seleccionada' :
            `${count} imágenes seleccionadas`;
    });
