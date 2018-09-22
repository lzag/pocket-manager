function showRecent(e) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("recentPosts").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "getrecent.php", true);

		xmlhttp.send();
	document.getElementById('recentPosts').classList.remove('bg-secondary');
	e.preventDefault();
	}

function addSite(e) {
		
		let url = document.getElementById("inputUrl").value;
		
		let title = document.getElementById("inputTitle").value;
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("recentPosts").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "addsite.php?url=" + url + "&title=" + title, true);

		xmlhttp.send();
		e.preventDefault();
	}

function modify(e) {
	
	let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
//				document.getElementById("recentPosts").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "getrecent.php", true);

		xmlhttp.send();
	
	e.preventDefault();
}

function deleteItem(e) {
	let item_id = e.target.nextElementSibling.value;

	let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
//				document.getElementById("recentPosts").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "delete.php?id=" + item_id, true);

		xmlhttp.send();

	let img = e.target.parentElement.parentElement.firstElementChild;
	e.target.parentElement.parentElement.removeChild(img);
	e.target.parentElement.innerHTML = '<h5 class="card-title text-danger text-center">Item deleted</p>';
	e.preventDefault();
}
