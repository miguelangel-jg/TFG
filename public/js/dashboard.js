document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".post-gallery img");
    const modalImage = document.getElementById("modalImage");

    images.forEach(img => {
        img.style.cursor = "pointer";
        img.addEventListener("click", () => {
            modalImage.src = img.src;
            const imageModal = new bootstrap.Modal(document.getElementById("imageModal"));
            imageModal.show();
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-like').forEach(button => {
      button.addEventListener('click', function () {
        const postId = this.dataset.postId;
        const icon = this.querySelector('.like-icon');
        const count = this.querySelector('.like-count');

        fetch(`/posts/${postId}/like`, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
          // Cambia icono
          icon.classList.toggle('fas', data.liked);
          icon.classList.toggle('far', !data.liked);

          // Aplica animación
          icon.classList.add('animate-like');
          setTimeout(() => icon.classList.remove('animate-like'), 300);

          // Actualiza contador
          count.textContent = data.likes;
        });
      });
    });
  });
