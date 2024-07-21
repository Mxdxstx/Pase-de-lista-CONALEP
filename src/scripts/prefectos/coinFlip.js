document.addEventListener('DOMContentLoaded', function() {
    var img = document.getElementById('imgPrefectos').querySelector('img');
    
    img.addEventListener('click', function() {
        // Remove the class if it already exists to allow re-triggering the animation
        img.classList.remove('flip');
        // Trigger reflow to restart the animation
        void img.offsetWidth;
        img.classList.add('flip');
    });
});