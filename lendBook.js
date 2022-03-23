let lendBtns = document.querySelectorAll(".lendBook");

lendBtns.forEach(lendBtn => {
  lendBtn.addEventListener("click", (e) => {
    e.preventDefault();
    let bookId = parseInt(prompt("Enter bookId"));
    let borrowerId = parseInt(lendBtn.parentElement.parentElement.firstElementChild.textContent);


    

    if(bookId && borrowerId) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", `borrowBook.php?bookId=${bookId}&borrowerId=${borrowerId}`, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = () => {
        if (xhr.status == 200) {
          console.log(xhr.responseText)
        } else {
          console.log(xhr.responseText);
        }
      }

      xhr.send();
    }

  })
})