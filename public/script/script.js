function displaySuccessMsg(msg) {
  el = document.createElement("div");
  el.classList.add("successMsg");
  el.innerHTML = msg;
  document.querySelector("body").appendChild(el);

  setTimeout(() => { el.remove() }, 2000)
}