const songImages = document.querySelectorAll('.song-img');

songImages.forEach((image) => {
  const caption = document.createElement('span');
  caption.innerText = 'Dinlemek için tıkla';
  caption.classList.add('caption');
  image.appendChild(caption);

  image.addEventListener('mouseleave', () => {
    caption.style.opacity = 0;
  });

  image.addEventListener('mouseenter', () => {
    caption.style.opacity = 1;
  });
});
