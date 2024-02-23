
document.addEventListener('DOMContentLoaded', function() {
  // Selecciona todos los elementos de 'carousel-inner'
  const carousels = document.querySelectorAll('.carousel-inner');

  carousels.forEach(carousel => {
    const items = carousel.querySelectorAll('.carousel-item');
    items.forEach(item => {
      const clone = item.cloneNode(true); // Clona el elemento 
      carousel.appendChild(clone); // Añade el clon al final de '.carousel-inner'
    });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const toggleSidebar = () => {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('sidebar-open');
  };

  // Botón principal para filtrar que muestra el sidebar
  const filtrosButton = document.getElementById('filtros');
  filtrosButton.addEventListener('click', toggleSidebar);

  // Botón opcional dentro del sidebar que también podría controlar su visibilidad
  const filterButtonInsideSidebar = document.querySelector('.jjk');
  if (filterButtonInsideSidebar) {
    filterButtonInsideSidebar.addEventListener('click', toggleSidebar);
  }
});
