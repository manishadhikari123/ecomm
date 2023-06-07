@extends('master')
@section("content")
<h1><center>{{$heading}} products<center></h1>

@if ($category_name)
  <h3>Category: {{$category_name}}</h3>
@endif

<div class="sort-by">
  <form action="{{ route('sort', $category_name) }}" method="POST">
    @csrf
    <label for="sort">Sort by price:</label>
    <select name="sort" id="sort">
        <option value="low">Low to High</option>
        <option value="high">High to Low</option>
    </select>
    <button type="submit" class="btn btn-primary">Sort</button>
  </form>
</div>

<div class="trending-wrapper">
  <div class="row">
    @foreach($products as $item)
      <div class="col-md-3 product-card">
        <a href="/detail/{{$item['id']}}">
          <div class="card">
            <img src="{{asset('/images/'.$item->gallery)}}" class="card-img-top" height="150" width="100%" alt="{{$item->name}}">
            <div class="card-body">
              <h5 class="card-title">{{$item['name']}}</h5>
            </a>

              <p class="card-text">{{$item['description']}}</p>
              <p class="card-text">Price: {{$item['price']}}</p>
            </div>
            
          </div>
          
        </a>
        
      </div>
    @endforeach
  </div>
</div>

<style>
.product-card {
  width:20%;
  margin: 30px;
  padding: 10px;
}

.product-card .card {
  border: none;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.product-card .card:hover {
  transform: translateY(-5px);
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.4);
}

.card-title {
  font-size: 1.2rem;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.card-text {
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

.card-img-top {
  object-fit: cover;
  border-radius: 0.25rem;
}

.sort-by {
  margin-bottom: 1rem;
}

.sort-by label {
  margin-right: 0.5rem;
}

.sort-by select {
  margin-right: 0.5rem;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

h1, h3 {
  text-align: center;
}

@media (max-width: 767px) {
  .product-card {
    width: 100%;
    max-width: 280px;
  }
}
</style>

@stop


