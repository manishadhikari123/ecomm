<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h1> Add Products </h1>

<form action="/addproduct" method="POST" onsubmit="validatesubmit(event)">
            @csrf
             <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label><br>
                <input type="text" name="name" class="" id="name" placeholder="Enter name of product" oninput="validateName()">
                <span id="name-message" style="color:red;"></span>

            </div>

            <div class="mb-3">
            <label for="price" class="form-label">Price</label><br>
            <input type="text" name="price" oninput="validatePrice()" placeholder="Enter price of product" class="" id="price">
            <span id="price-error" style="color:red;"></span>
            </div>

            <div class="mb-3">
              <label for="size" class="form-label">size</label><br>
              <input type="text" name="size" oninput="validateSize()" placeholder="Enter size of product" class="" id="size">
              <span id="size-error" style="color:red;"></span>
              </div>

            <div class="mb-3">
            <label for="category" class="form-label">category</label><br>
                <input type="text" name="category" class="" id="category" placeholder="Enter category of this product" oninput="validateCategory()">
                <span id="category-message" style="color:red;"></span>

            </div>
            <div class="mb-3">
            <label for="quantity" class="form-label">quantity</label><br>
                <input type="text" name="quantity" class="" id="quantity" placeholder="Enter no. of quantity of this product" oninput="validateQuantity()">
                <span id="quantity-message" style="color:red;"></span>

            </div>

            <div class="mb-3">
            <label for="description" class="form-label">description</label><br>
                <input  type="text" name="description" class="" id="description" placeholder="Enter a short description of this product" oninput="validateDescription()">
                <span id="description-message" style="color:red;"></span>

            </div>

            <!--<div class="mb-3">
              <label for="description" class="form-label">Description:</label><br>
              <textarea name="description" id="description" rows="5" style="width: 300px; height: 100px;" placeholder="Enter a short description of this product"></textarea>
              <span id="description-message" style="color:red;"></span>
            </div>
          -->


            <div class="mb-3">
            <label for="file" class="form-label">gallery</label><br>
            <input type="file" name="gallery" class="" id="file" placeholder="upload an image" onchange="validateFile()">

            <span id="file-error" style="color:red;"></span>
            </div>



            
 
            <button type="submit" class="btn btn-primary">Add product</button>
        </form>

        <a href="/adminproductscontrol"> Go Back to Control products</a><br>
      </center>

</div>
<script>

window.formvalid={name:false,price:false,size:false,category:false,quantity:false,description:false,file:false};

function validatesubmit(event){
    if(!formvalid.name || !formvalid.price || !formvalid.size ||!formvalid.category ||!formvalid.quantity ||!formvalid.description || !formvalid.file ){
      event.preventDefault();
      alert('invalid input');
    }  
}
    
    function validateName() {  
  var name = document.getElementById("name").value;
  var nameMessage = document.getElementById("name-message");
  
  if (/\d/.test(name)) {
    nameMessage.innerHTML = "Name cannot contain numbers.";
    formvalid.name=false;

  } else {
    nameMessage.innerHTML = "";
    formvalid.name=true;

  }
}


function validateCategory() {  
  var category = document.getElementById("category").value;
  var categoryMessage = document.getElementById("category-message");
  
  if (/\d/.test(category)) {
    categoryMessage.innerHTML = "Category cannot contain numbers.";
    formvalid.category=false;

  } else {
    categoryMessage.innerHTML = "";
    formvalid.category=true;

  }
}

function validateQuantity() {
    var quantity = document.getElementById("quantity").value;
    var quantityMessage = document.getElementById("quantity-message");

    if (isNaN(quantity)) {
      quantityMessage.innerHTML = "quantity must be a number.";
      formvalid.quantity=false;
    } else {
      quantityMessage.innerHTML = "";
      formvalid.quantity=true;
    }
}

function validateDescription() {  
  var description = document.getElementById("description").value;
  var descriptionMessage = document.getElementById("description-message");
  
  if (/\d/.test(description)) {
    descriptionMessage.innerHTML = "Description cannot contain numbers.";
    formvalid.description=false;

  } else {
    descriptionMessage.innerHTML = "";
    formvalid.description=true;

  }
}


function validatePrice() {
    var price = document.getElementById("price").value;
    var priceError = document.getElementById("price-error");

    if (isNaN(price)) {
      priceError.innerHTML = "Price must be a number.";
      formvalid.price=false;
    } else {
      priceError.innerHTML = "";
      formvalid.price=true;
    }
}

function validateSize() {
  var size = document.getElementById("size").value;
  var sizeError = document.getElementById("size-error");
  var sizePattern = /^[A-Za-z0-9]+$/; // pattern to match only letters and numbers

  if (size.match(sizePattern)) { // check if size matches pattern
    sizeError.innerHTML = "";
    formvalid.size = true;
  } else {
    sizeError.innerHTML = "Size can only contain letters and numbers.";
    formvalid.size = false;
  }
}

function validateFile() {
  var fileInput = document.getElementById("file").files[0];
  var fileError = document.getElementById("file-error");
  
  if (!fileInput) {
    fileError.innerHTML = "Please select a file.";
    formvalid.file = false;
  } else {
    fileError.innerHTML = "";
    formvalid.file = true;
  }
}




</script>
</body>

</html>