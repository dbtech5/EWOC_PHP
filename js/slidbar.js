
function toggleMenuLeft(){
    if(document.getElementsByClassName('MenuLeft')[0].style.width == '65px' || document.getElementsByClassName('MenuLeft')[0].style.width == ''){
        document.getElementsByClassName('MenuLeft')[0].style.width = '20vw'
        //document.getElementsByClassName('title-logo')[0].style.display = 'inline-block'
        setTimeout(()=>{
            document.getElementsByClassName('list-menu-show')[0].style.display = 'block'
            document.getElementsByClassName('list-menu-hide')[0].style.display = 'none'
        },200)
        
    }else{
        //document.getElementsByClassName('title-logo')[0].style.display = 'none'
        document.getElementsByClassName('MenuLeft')[0].style.width = '65px'
        document.getElementsByClassName('list-menu-show')[0].style.display = 'none'
        document.getElementsByClassName('list-menu-hide')[0].style.display = 'block'
    }
}