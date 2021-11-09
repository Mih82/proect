function bigImage()//клик на картинку для увеличения
{
    let bigImage = document.querySelectorAll('.catalog_img_big');
    let body = document.querySelector('body');

    for( let hangingImage of bigImage ){
        hangingImage.addEventListener( 'click', function pictureFull(event){
            event.preventDefault();
            let div = document.createElement('div');
            let img = document.createElement('img');
            let a = document.createElement('a');

            img.src = hangingImage.firstElementChild.src;
            div.id = 'pictureFullWindow';
            a.href = '#';
            a.classList.add("class");
            a.innerHTML = 'Close X';
            div.appendChild(a);
            div.appendChild(img);
            body.insertAdjacentElement( 'afterbegin', div);

            this.removeEventListener('click',pictureFull );

            let pictureFullWindow = document.querySelector('#pictureFullWindow');
            let closeFullImage = document.querySelector('#pictureFullWindow img');

            closeFullImage.addEventListener('click', function removePictureFull(event){
                event.preventDefault();

                pictureFullWindow.parentNode.removeChild(pictureFullWindow);
                closeFullImage.removeEventListener('click', removePictureFull );
                hangingImage.addEventListener( 'click', pictureFull);
            });

        });
    }
}

