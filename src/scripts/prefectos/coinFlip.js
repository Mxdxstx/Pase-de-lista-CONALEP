document.addEventListener('DOMContentLoaded', function() {
    var img = document.getElementById('imgPrefectos').querySelector('img');
    
    img.addEventListener('click', function() {
        img.classList.remove('flip');
        void img.offsetWidth;
        img.classList.add('flip');
    });
});