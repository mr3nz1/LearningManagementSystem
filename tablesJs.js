let deleteBtn = document.querySelectorAll(".deleteBtn");

deleteBtn.forEach(btn => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    let bookId = btn.parentElement.parentElement.firstElementChild.textContent;

    if (confirm(`Are you sure you want to delete bookId ${bookId}`)) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", `delete.php?bookId=${bookId}`, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      
      xhr.onload = () => {
      if(xhr.status == 200) {
        location.reload();
      } else {
        console.log(xhr.responseText);
      }
      }
    }
  
    xhr.send();
  
  })
})