document.onreadystatechange = function(){//window.addEventListener('readystatechange',function(){...}); (for Netscape) and window.attachEvent('onreadystatechange',function(){...}); (for IE and Opera) also work
    if(document.readyState=='loaded' || document.readyState=='complete')
        alert('<%: TempData["Resultat"]%>');
}