let returnBookBtns = document.querySelectorAll(".returnBook");

returnBookBtns.forEach(returnBookBtn => {
  returnBookBtn.addEventListener("click", e => {
    e.preventDefault();

    if(confirm("Are your sure the borrower is returning the book")) {
      
      
      let borrowedBookId = parseInt(returnBookBtn.parentElement.parentElement.firstElementChild.textContent);
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", `returnBook.php?borrowedBookId=${borrowedBookId}`, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      
      xhr.onload = () => {
        if (xhr.status == 200) {
          if(xhr.responseText == '1') {
            alert("Successfully returned");
          } else {
            alert("Not added");
          }
          console.log(xhr.responseText)
        } else {
          alert("Not added");
        }
      } 
      xhr.send();    
    }
  })
})