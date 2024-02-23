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