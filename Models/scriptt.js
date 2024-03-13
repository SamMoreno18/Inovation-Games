
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



function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const generoBtn = document.getElementById('genero-btn');
  const generoOptions = document.getElementById('genero-options');

  generoBtn.addEventListener('click', function() {
    generoOptions.classList.toggle('hidden');
  });
});


    document.addEventListener('DOMContentLoaded', function() {
        var accionButton = document.getElementById('accion');
            accionButton.addEventListener('click', function() {
            window.location.href = '/paginota/filtro_accion.html';
        });
    });




window.onload = function() {
  if (localStorage.getItem('profileImage')) {
      document.getElementById('profileImage').src = localStorage.getItem('profileImage');
  }
  
  if (localStorage.getItem('userDescription')) {
      document.getElementById('userDescription').textContent = localStorage.getItem('userDescription');
  }
};

document.getElementById('profileImage').addEventListener('click', function() {
  document.getElementById('imageInput').click();
});

document.getElementById('imageInput').addEventListener('change', updateProfileImage);

function updateProfileImage() {
  const input = document.getElementById('imageInput');
  const profileImage = document.getElementById('profileImage');
  if (input.files && input.files[0]) {
      let reader = new FileReader();
      reader.onload = function(e) {
          profileImage.src = e.target.result;
          localStorage.setItem('profileImage', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
  }
}

document.getElementById('editDescriptionBtn').addEventListener('click', showDescriptionInput);

function showDescriptionInput() {
  document.getElementById('descriptionInputContainer').classList.remove('hidden');
  document.getElementById('userDescription').classList.add('hidden');
  document.getElementById('editDescriptionBtn').classList.add('hidden');
  document.getElementById('descriptionInput').value = document.getElementById('userDescription').textContent;
}

function updateDescription() {
  const descriptionInput = document.getElementById('descriptionInput');
  const userDescription = document.getElementById('userDescription');
  userDescription.textContent = descriptionInput.value;
  localStorage.setItem('userDescription', descriptionInput.value);
  document.getElementById('descriptionInputContainer').classList.add('hidden');
  userDescription.classList.remove('hidden');
  document.getElementById('editDescriptionBtn').classList.remove('hidden');
}






const genreButton = document.getElementById('genre-button');
    const genreDropdown = document.getElementById('genre-dropdown');
    // Nuevo código para manejar el menú desplegable de "Tipo"
    const typeButton = document.querySelector('.dropdown-container > button'); // Ajusta si tienes varios botones similares
    const typeDropdown = document.getElementById('type-dropdown');

    genreButton.addEventListener('click', function() {
      genreDropdown.style.display = genreDropdown.style.display === 'block' ? 'none' : 'block';
    });

    typeButton.addEventListener('click', function() {
      typeDropdown.style.display = typeDropdown.style.display === 'block' ? 'none' : 'block';
    });

    window.onclick = function(event) {
      if (!event.target.matches('#genre-button') && !event.target.matches('.dropdown-container > button')) {
        if (genreDropdown.style.display === 'block') {
          genreDropdown.style.display = 'none';
        }
        if (typeDropdown.style.display === 'block') {
          typeDropdown.style.display = 'none';
        }
      }
    }