const dropMenu = document.getElementById('user-menu-button');
if(dropMenu){
    const dropNav = document.getElementById('dropNav');

    dropMenu.addEventListener('click', () => {
        dropNav.classList.toggle('hidden');
    })
    window.document.addEventListener('click', function(event) {
        const isClickOutsideMenu = !dropMenu.contains(event.target) && !dropNav.contains(event.target);
        if (isClickOutsideMenu && !dropNav.classList.contains('hidden')) {
            dropNav.classList.add('hidden');
        }
    });
}

const hamburger = document.getElementById('hamburger');
if(hamburger){
    const mobileMenu = document.getElementById('mobile-menu');
    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    })
    window.document.addEventListener('click', (event)=> {
        const isClickOutsideMenu = !hamburger.contains(event.target) && !mobileMenu.contains(event.target);
        if (isClickOutsideMenu && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
        }
    })
}
