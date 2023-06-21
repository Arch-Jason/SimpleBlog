let nav = document.getElementById('nav');
let initialTopValue = nav.offsetTop;
window.addEventListener('scroll', () => {
    if(initialTopValue <= window.scrollY) {
        nav.style.position = 'fixed';
    } else {
        nav.style.position = 'static';
    }
});

// aside on mobile
let isHidden = true;
let infoButton = document.getElementById('infoButton');
let asideInfo = document.getElementById('asideInfo');
infoButton.addEventListener('click', () => {
    if(isHidden) {
        asideInfo.style.display = 'block';
        isHidden = false;
    } else {
        asideInfo.style.display = 'none';
        isHidden = true;
    }
});
window.addEventListener('scroll', () => {
    if(!isHidden) {
        asideInfo.style.display = 'none';
        isHidden = true;
    }
});
