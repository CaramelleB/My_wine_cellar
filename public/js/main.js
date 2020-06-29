//Effect onload //
window.onload = function addEffect()
{
    var load = document.getElementsByClassName('load');
    for (i = 0; i < load.length; i++) 
    {
        load.item(i).className += " load-effect";
    }
}

//Menu Effect//
function openMenu()
{
    var menu = document.getElementById('open-menu');
    menu.style.animation = "anim-burger 0.3s";
    var toShow = document.getElementsByClassName('hide');
    var toHide = document.getElementsByClassName('show');
    for (i = 0; i < toShow.length; i++) 
    {
        toShow.item(i).style.display = 'block';
    }
    for (i = 0; i < toHide.length; i++) 
    {
        toHide.item(i).style.display = 'none';
    }    
}

function hideMenu()
{
    var menu = document.getElementById('hide-menu');
    menu.style.animation = "anim-burger 0.3s";
    var toShow = document.getElementsByClassName('show');
    var toHide = document.getElementsByClassName('hide');
    for (i = 0; i < toShow.length; i++)
    {
        toShow.item(i).style.display = 'block';
    }
    for (i = 0; i < toHide.length; i++) 
    {
        toHide.item(i).style.display = 'none';
    }    
}

//Show password//
function showPassword() 
{
    var x = document.getElementById("Password");
    var y  = document.getElementById("y");
    if (x.type === "password") 
    {
        x.type = "text";
        y.classList.replace("fa-eye", "fa-eye-slash");
    } else 
    {
        x.type = "password";
        y.classList.replace("fa-eye-slash", "fa-eye");                   
    }
}

function confirmDelete(idWine) 
{
    var deletePopUp = document.getElementById("deletePopup");
    var popBack = document.getElementById("pop");
    deletePopUp.style.display = "block";
    popBack.style.display = "block";
    var newAction = '?url=wines.delete&id=' + idWine;
    if (deletePopUp) 
    {
      document.getElementById("delete_form").action = newAction;
    }
}
    
function closePopUp()
{
    var popup = document.getElementsByClassName('pop');
    for (i = 0; i < popup.length; i++) 
    {
        popup.item(i).style.display = 'none';
    }
}
  
function searchWine() 
{
    var input, filter, card, h2, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    card = document.getElementById("all");
    h2 = card.getElementsByTagName("h2");
    for (i = 0; i < h2.length; i++) 
    {
        a = h2[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) 
        {
            h2[i].parentElement.parentElement.parentElement.style.display = "";
        } else 
        {
            h2[i].parentElement.parentElement.parentElement.style.display = "none";
        }
    }
}

function changeOutputUser(x)
{
    document.activeElement.value = x;
}
      
console.log('🏁 Scripts Done _ Enjoy your visit in 🍷 My Wine Cellar 🍷 🏁');