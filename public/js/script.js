
const showButton = document.querySelectorAll('.show');
const deleteButton = document.querySelectorAll('.delete');

const showFormInput = document.querySelector('.showForm input[name="id"]');

showButton.forEach((button)=>{
	button.addEventListener("click",function(event){
		const id = event.target.dataset.id;
		showFormInput.value = id;

    document.querySelector('.showForm').submit();
	})
})
