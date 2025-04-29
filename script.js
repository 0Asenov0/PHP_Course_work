const contactButton = document.getElementById('contact')
const contactPanel = document.getElementById('contactPanel')
const closeBtn = document.getElementById('closeBtn')


contactButton.addEventListener('click',() =>{

       contactPanel.style.display='block';

});

closeBtn.addEventListener('click',()=>{
    contactPanel.style.display = 'none';
});


