let tabTitle = document.querySelectorAll('.tab-title');

for ( i = 0; i < tabTitle.length; i++ ) {
    tabTitle[i].addEventListener('click', activateContent);

    function activateContent() {
        tabActivate(this);
    }

}

let tabActivate = (elem) => {
    elemID = elem.getAttribute('id');


    elemContent = document.querySelector('.content-area.' + elemID );
    activeContent = document.querySelector('.content-area.activate');
    activeTitle = document.querySelector('.tab-title.active');

    // makes clicked title active
        elem.classList.add('active');
        elemContent.classList.add('activate');
        elemContent.classList.add('position-relative');
        elemContent.classList.remove('position-absolute');
        elemContent.style.opacity = "1";
// 	    elemContent.style.pointerEvents = "all";

    // makes all other titles inactive
        activeTitle.classList.remove('active');
        activeContent.classList.remove('activate');
        activeContent.classList.remove('position-relative');
        activeContent.classList.add('position-absolute');
        activeContent.style.opacity = "0";
// 	    elemContent.style.pointerEvents = "none";


}