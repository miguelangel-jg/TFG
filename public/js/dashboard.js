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
