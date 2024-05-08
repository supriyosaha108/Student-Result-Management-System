window.onload=()=>{
   const transition_ei=document.querySelector('.transition');
   const anchors=document.querySelectorAll('a');
    
   setTimeout(() => {
       transition_ei.classList.remove('is-active');
    }, 10);
    for (let i=0;i<anchors.length;i++){
       const anchor=anchors[i];

       anchor.addEventListener('click',e => {
           e.preventDefault();
           let target = e.target.href;
       
           transition_ei.classList.add('is-active');

          setTimeout(() => {
              window.location.href = target;
          }, 10);
       });
    }
}