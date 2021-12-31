<div class="col-6 col-md-4 mb-3">
            <div class="card" >
                <a href="{{route('frontend.categories.show',$category->id)}}" class="text-dark" style="text-decoration:none;">
                    <img src="{{url('images') . '/' . $category->image}}" class="card-img-top p-1" alt="..." >                
                    <div class="card-body p-3">
                        <h3 class="card-title">{{$category->name}}</h3>
                    </div>
                </a>
            </div>
        </div>  