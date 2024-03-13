
window.onload = function () {
  if (localStorage.getItem('profileImage')) {
    document.getElementById('profileImage').src = localStorage.getItem('profileImage');
  }

  if (localStorage.getItem('userDescription')) {
    document.getElementById('userDescription').textContent = localStorage.getItem('userDescription');
  }
};

// Función para actualizar la imagen de perfil
function updateProfileImage() {
  const input = document.getElementById('imageInput');
  const profileImage = document.getElementById('profileImage');
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      profileImage.src = e.target.result;
      localStorage.setItem('profileImage', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// Función para mostrar el campo de entrada de la descripción
function showDescriptionInput() {
  document.getElementById('descriptionInputContainer').classList.remove('hidden');
  document.getElementById('userDescription').classList.add('hidden');
  document.getElementById('editDescriptionBtn').classList.add('hidden');
  document.getElementById('descriptionInput').value = document.getElementById('userDescription').textContent;
}

// Función para actualizar la descripción del usuario
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
const typeButton = document.querySelector('.dropdown-container > button');
const typeDropdown = document.getElementById('type-dropdown');

genreButton.addEventListener('click', function () {
  genreDropdown.style.display = genreDropdown.style.display === 'block' ? 'none' : 'block';
});

typeButton.addEventListener('click', function () {
  typeDropdown.style.display = typeDropdown.style.display === 'block' ? 'none' : 'block';
});

window.onclick = function (event) {
  if (!event.target.matches('#genre-button') && !event.target.matches('.dropdown-container > button')) {
    if (genreDropdown.style.display === 'block') {
      genreDropdown.style.display = 'none';
    }
    if (typeDropdown.style.display === 'block') {
      typeDropdown.style.display = 'none';
    }
  }
}
