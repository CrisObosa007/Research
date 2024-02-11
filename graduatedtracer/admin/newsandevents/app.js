/**
 * Show Drag & Drop multiple image preview
 * 
 * @author Anuj Kumar
 * @link https://instagram.com/webtricks.ak
 * @link https://github.com/wtricks
 * */

/** Variables */
let files = [],
dragArea = document.querySelector('.drag-area'),
input = document.querySelector('.drag-area input'),
button = document.querySelector('.card button'),
select = document.querySelector('.drag-area .select'),
container = document.querySelector('.container');
container2 = document.querySelector('.container2');

/** CLICK LISTENER */
select.addEventListener('click', () => input.click());

/* INPUT CHANGE EVENT */
input.addEventListener('change', () => {
	let file = input.files;
        
    // if user select no image
    if (file.length == 0) return;
         
	for(let i = 0; i < file.length; i++) {
        if (file[i].type.split("/")[0] != 'image') continue;
        if (!files.some(e => e.name == file[i].name)) files.push(file[i])
    }

	showImages();

});
function MyLastestImage() {
   let file = input.files;
   files.splice(0, file.length);
   showImages();
}
/** SHOW IMAGES */
function showImages() {
	container.innerHTML = files.reduce((prev, curr, index) => {
		return `${prev}
		    <div class="image">

			    <img src="${URL.createObjectURL(curr)}" />
			</div>`
	}, '');

	container2.innerHTML = files.reduce((prev, curr, index) => {
		return `${prev}
		    <div class="image">
			    <img src="${URL.createObjectURL(curr)}" />
			</div>`
	}, '');
}

/* DELETE IMAGE */


/* DRAG & DROP */
// dragArea.addEventListener('dragover', e => {
// 	e.preventDefault()
// 	dragArea.classList.add('dragover')
// })

/* DRAG LEAVE */
// dragArea.addEventListener('dragleave', e => {
// 	e.preventDefault()
// 	dragArea.classList.remove('dragover')
// });

/* DROP EVENT */
// dragArea.addEventListener('drop', e => {
// 	e.preventDefault()
//     dragArea.classList.remove('dragover');

// 	let file = e.dataTransfer.files;
// 	for (let i = 0; i < file.length; i++) {
// 		/** Check selected file is image */
// 		if (file[i].type.split("/")[0] != 'image') continue;
		
// 		if (!files.some(e => e.name == file[i].name)) files.push(file[i])
// 	}
// 	showImages();
// });
