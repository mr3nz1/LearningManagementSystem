// let books;
// (function() {
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "loadData.php", true);
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhr.onload = () => {
//     if(xhr.status == 200) {
//       books = JSON.parse(xhr.responseText);
      
//       console.log(books);
//       books.forEach(book => {
//         let tr = document.createElement("tr");
        
//         let id = document.createElement("th");
//         let title = document.createElement("th");
//         let author = document.createElement("th");
//         id.textContent = book.id;
//         title.textContent = book.author;
//         author.textContent = book.title;


//         tr.appendChild(id)
//         tr.appendChild(title)
//         tr.appendChild(author)
//       });
//     } else {
//       console.log("Not found");
//     }
//   }
//   xhr.send();


  

// } ())  

// // Inserting data in tables.php
// // console.log(books)
