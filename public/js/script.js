
const showButton = document.querySelectorAll('.show');
const deleteButton = document.querySelectorAll('.delete');

const showFormInput = document.querySelector('.showForm input[name="id"]');
const deleteFormInput = document.querySelector('.deleteForm input[name="id"]');


showButton.forEach((button)=>{
	button.addEventListener("click",function(event){
		const id = event.target.dataset.id;
		showFormInput.value = id;

    document.querySelector('.showForm').submit();
	})
})

deleteButton.forEach((button)=>{
	button.addEventListener("click",function(event){
		const id = event.target.dataset.id;
		deleteFormInput.value = id;
		if(confirm(`Quieres eliminar la nave con el id :${id}`))document.querySelector('.deleteForm').submit();
	})
})
