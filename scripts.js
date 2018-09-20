function showRecent() {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("recentPosts").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "getrecent.php", true);

		xmlhttp.send();
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
				document.getElementById("recentPosts").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "getrecent.php", true);

		xmlhttp.send();
	
	e.preventDefault();
}

function deleteItem(e) {
	console.log(e.target.parentElement.parentElement.firstElementChild);
	let img = e.target.parentElement.parentElement.firstElementChild;
	e.target.parentElement.parentElement.removeChild(img);
	e.target.parentElement.innerHTML = '<h5 class="card-title text-danger text-center">Item deleted</p>';
//	document.getElementById("recentPosts").innerHTML = this.responseText;
	e.preventDefault();
}