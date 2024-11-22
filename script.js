//Edit function
function edit(id){

    let name = document.querySelector(`#name${id}`);
    let age = document.querySelector(`#age${id}`);
    let grade = document.querySelector(`#grade${id}`);

    let editButton = document.querySelector(`#edit${id}`);
    let updateButton = document.querySelector(`#update${id}`);
    let deleteButton = document.querySelector(`#delete${id}`);

    let otherEditButtons = document.querySelectorAll("[id^=edit]");

    name.disabled = false;
    age.disabled = false;
    grade.disabled = false;

    // editButton.disabled=true;
    updateButton.disabled = false;
    deleteButton.disabled = false;

    otherEditButtons.forEach((button)=>{
        button.disabled=true;
    });
}

//Delete function
function deleteData(id){
    let form = document.querySelector(`#form${id}`);
    let actionB = document.querySelector(`#actionB${id}`);
    actionB.value='delete';
    form.submit();
}

//Update function
function update(id){
    let form = document.querySelector(`#form${id}`);
    let actionB = document.querySelector(`#actionB${id}`);
    actionB.value='update';
    form.submit();
}
