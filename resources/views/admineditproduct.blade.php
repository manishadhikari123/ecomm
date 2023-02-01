<h1>Update Product</h1>
<form action="/editProduct" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$data['id']}}"
             <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label><br>
                <input type="text" name="name" class="" value="{{$data['name']}}" placeholder="Enter name of product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label><br>
                <input type="text" name="price" class="" id="exampleInputEmail1" value="{{$data['price']}}" placeholder="Enter price of this product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">category</label><br>
                <input type="text" name="category" class="" id="exampleInputEmail1" value="{{$data['category']}}" placeholder="Enter category of this product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description</label><br>
                <input type="text" name="description" class="" id="exampleInputEmail1" value="{{$data['description']}}" placeholder="Enter a short description of this product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">gallery</label><br>
                <input type="file" name="gallery" class="" id="exampleInputEmail1" placeholder="upload an image">

            </div>



            
 
            <br><button type="submit" class="btn btn-primary">Update</button>
        </form>