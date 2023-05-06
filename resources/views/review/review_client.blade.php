

<form action="{{route('store_review_client',$id = Route::current()->parameter('id'))}}" method="POST">

    @csrf
    
        <div class="d-flex justify-content-between align-items-center mt-7">
            <label for="exampleInputPassword1">Note sur le partenaire</label>                   
            <div class="rating">
                <input type="radio" name="note_partenaire" value="5" id="star5">
                <label for="star5"></label>
                <input type="radio" name="note_partenaire" value="4" id="star4">
                <label for="star4"></label>
                <input type="radio" name="note_partenaire" value="3" id="star3">
                <label for="star3"></label>
                <input type="radio" name="note_partenaire" value="2" id="star2">
                <label for="star2"></label>
                <input type="radio" name="note_partenaire" value="1" id="star1">
                <label for="star1"></label>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">comment sur le partenaire</label>
                <input type="text" class="form-control" id="exampleInputPassword1"  name="comment_client_partenaire">
            </div>


            <label for="exampleInputPassword1">Note sur l'objet</label>                   
            <div class="rating">
                <input type="radio" name="note_objet" value="5" id="star5">
                <label for="star5"></label>
                <input type="radio" name="note_objet" value="4" id="star4">
                <label for="star4"></label>
                <input type="radio" name="note_objet" value="3" id="star3">
                <label for="star3"></label>
                <input type="radio" name="note_objet" value="2" id="star2">
                <label for="star2"></label>
                <input type="radio" name="note_objet" value="1" id="star1">
                <label for="star1"></label>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">comment sur l'objet</label>
                <input type="text" class="form-control" id="exampleInputPassword1"  name="comment_client_objet">
            </div>
            
    
        </div>  
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>