function resetForm(form) {

    var inputs = document.getElementsByTagName('input');
    for (i = 0; i < inputs.length; i++) {
        switch (inputs[i].type) {
            case 'text':
                inputs[i].value = '';
                break;
            case 'radio':
            case 'checkbox':
                inputs[i].checked = false;   
        }
    }

    var selects = form.getElementsByTagName('select');
    for (var i = 0; i < selects.length; i++)
        selects[i].selectedIndex = 0;

    var text= form.getElementsByTagName('textarea');
    for (var i = 0; i < text.length; i++)
        text[i].innerHTML= '';

    searchForm.submit();
    
    return false;
}

/* VISNING AF SKJULTE SØGEKRITERIER */

function showFields(field) {
    var targetField = document.getElementById(field);
    targetField.classList.toggle("active");
}