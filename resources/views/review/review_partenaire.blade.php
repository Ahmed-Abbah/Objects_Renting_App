

<form action="{{route('store_review_partenaire',$id = Route::current()->parameter('id'))}}" method="POST">

@csrf

    <div class="d-flex justify-content-between align-items-center mt-7">
        <label for="exampleInputPassword1">Note de partenaire</label>                   
        <div class="rating">
            <input type="radio" name="stars" value="5" id="star5">
            <label for="star5"></label>
            <input type="radio" name="stars" value="4" id="star4">
            <label for="star4"></label>
            <input type="radio" name="stars" value="3" id="star3">
            <label for="star3"></label>
            <input type="radio" name="stars" value="2" id="star2">
            <label for="star2"></label>
            <input type="radio" name="stars" value="1" id="star1">
            <label for="star1"></label>
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">comment partenaire</label>
            <input type="text" class="form-control" id="exampleInputPassword1"  name="comment_part">
        </div>
        

    </div>  

    <button type="submit" class="btn btn-primary">Submit</button>
</form>