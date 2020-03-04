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

function openSignInWindow(url, name) {
	// remove any existing event listeners
	// window.removeEventListener('message', receiveMessage);
 
	// window features
	const strWindowFeatures =
	  'toolbar=no, menubar=no, width=600, height=700, top=100, left=100';
 
	if (windowObjectReference === null || windowObjectReference.closed) {
	  /* if the pointer to the window object in memory does not exist
	   or if such pointer exists but the window was closed */
	  windowObjectReference = window.open(url, name, strWindowFeatures);
	} else if (previousUrl !== url) {
	  /* if the resource to load is different,
	   then we load it in the already opened secondary window and then
	   we bring such window back on top/in front of its parent window. */
	  windowObjectReference = window.open(url, name, strWindowFeatures);
	  windowObjectReference.focus();
	} else {
	  /* else the window reference must exist and the window
	   is not closed; therefore, we can bring it back on top of any other
	   window with the focus() method. There would be no need to re-create
	   the window or to reload the referenced resource. */
	  windowObjectReference.focus();
	}
  };

  document.getElementById('oauth').addEventListener('click', (e) => {
	  window.open('https://getpocket.com/v3/oauth/request', 'New window', 'toolbar=no, menubar=no, width=600, height=700, top=100, left=100');
	  e.preventDefault();
  })