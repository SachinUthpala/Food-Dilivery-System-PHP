const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);

        if(entry.isIntersecting){
            entry.target.classList.add('showx');
        }else{
            entry.target.classList.remove('showx');
        }

    });
});

const hiddenElements = document.querySelectorAll('.hiddenx');

hiddenElements.forEach((el) => observer.observe(el));


//yside
const observery = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);

        if(entry.isIntersecting){
            entry.target.classList.add('showy');
        }else{
            entry.target.classList.remove('showy');
        }

    });
});

const hiddenElementsy = document.querySelectorAll('.hiddeny');

hiddenElementsy.forEach((ely) => observery.observe(ely));