//
// Doi hinh anh cho banner
document.addEventListener('DOMContentLoaded', function () {
function switchImages(bannerId) {
    const banner = document.getElementById(bannerId);
    const images = banner.getElementsByTagName('img');
    let currentImageIndex = 0;

    setInterval(() => {
        images[currentImageIndex].classList.remove('active');
        images[currentImageIndex].classList.add('inactive');

        currentImageIndex = (currentImageIndex + 1) % images.length;

        images[currentImageIndex].classList.remove('inactive');
        images[currentImageIndex].classList.add('active');
    }, 3000); // Change image every 3 seconds
}
switchImages('banner-1');
switchImages('banner-2');
});

//