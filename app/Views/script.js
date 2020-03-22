
//changes which form fields are visible according to which product type is selected in create product form
function changeOptions(selectEl) {
    let selectedValue = selectEl.options[selectEl.selectedIndex].value;
    let subForms = document.getElementsByClassName('type')
    for (let i = 0; i < subForms.length; i += 1) {
        if (selectedValue === subForms[i].id) {
            subForms[i].setAttribute('style', 'display:block')
        } else {
            subForms[i].setAttribute('style', 'display:none')
        }
    }
}