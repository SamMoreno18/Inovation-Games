function changeToVideo() {
    document.getElementById('videoFrame').src = "https://www.youtube.com/embed/UAO2urG23S4?si=3nISNB10ob3MryQb";
}

function changeToImage(imageSrc) {
    document.getElementById('videoFrame').style.display = 'none'; // Ocultar el video
    const imgContainer = document.getElementById('image-container');
    let imgElement = document.getElementById('displayImage'); 
    if (!imgElement) {
        imgElement = document.createElement('img');
        imgElement.id = 'displayImage';
        imgElement.width = 560; // Ajustar imagen 
        imgElement.height = 315;
        imgContainer.insertBefore(imgElement, imgContainer.firstChild); 
    }
    imgElement.src = imageSrc;
    imgElement.style.display = 'block';
}

function showVideo() {
    var videoFrame = document.getElementById('videoFrame');
    videoFrame.style.display = 'block'; 

    var displayImage = document.getElementById('displayImage');
    if (displayImage) {
        displayImage.style.display = 'none'; 
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var hamburgerIcon = document.getElementById('hamburger-icon');
    var navLinks = document.querySelector('.nav-links');
  
    hamburgerIcon.addEventListener('click', function () {
        navLinks.classList.toggle('active');
    });
  });

document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const ratingKey = 'userRating'; 
    const savedRating = localStorage.getItem(ratingKey);
    if (savedRating) {
        updateStars(savedRating);
    }
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(ratingKey, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const stars1 = document.querySelectorAll('.star1');
    const rating1Key = 'userRating1'; 
    const savedRating1 = localStorage.getItem(rating1Key);
    if (savedRating1) {
        updateStars(savedRating1);
    }
    stars1.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating1Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars1.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const stars1 = document.querySelectorAll('.star1');
    const rating1Key = 'userRating1'; 
    const savedRating1 = localStorage.getItem(rating1Key);
    if (savedRating1) {
        updateStars(savedRating1);
    }
    stars1.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating1Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars1.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const stars2 = document.querySelectorAll('.star2');
    const rating2Key = 'userRating2'; 
    const savedRating2 = localStorage.getItem(rating2Key);
    if (savedRating2) {
        updateStars(savedRating2);
    }
    stars2.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating2Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars2.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const strars3 = document.querySelectorAll('.star3');
    const rating3Key = 'userRating3'; 
    const savedRating3 = localStorage.getItem(rating3Key);
    if (savedRating3) {
        updateStars(savedRating3);
    }
    strars3.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating3Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        strars3.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});



document.addEventListener('DOMContentLoaded', function() {
    const stars4 = document.querySelectorAll('.star4');
    const rating4Key = 'userRating4'; 
    const savedRating4 = localStorage.getItem(rating4Key);
    if (savedRating4) {
        updateStars(savedRating4);
    }
    stars4.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating4Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars4.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});



document.addEventListener('DOMContentLoaded', function() {
    const stars5 = document.querySelectorAll('.star5');
    const rating5Key = 'userRating5'; 
    const savedRating5 = localStorage.getItem(rating5Key);
    if (savedRating5) {
        updateStars(savedRating5);
    }
    stars5.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating5Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars5.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const stars6 = document.querySelectorAll('.star6');
    const rating6Key = 'userRating6'; 
    const savedRating6 = localStorage.getItem(rating6Key);
    if (savedRating6) {
        updateStars(savedRating6);
    }
    stars6.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating6Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars6.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const stars7 = document.querySelectorAll('.star7');
    const rating7Key = 'userRating7'; 
    const savedRating7 = localStorage.getItem(rating7Key);
    if (savedRating7) {
        updateStars(savedRating7);
    }
    stars7.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            updateStars(value);
            localStorage.setItem(rating7Key, value);
            this.classList.add('pop');
            setTimeout(() => {
                this.classList.remove('pop');
            }, 400);
        });
    });
    function updateStars(value) {
        stars7.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
});


