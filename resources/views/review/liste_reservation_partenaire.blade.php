@include('header')
@include('navbar3')
<link rel="stylesheet" href="../assets/css/star.css" />
<section>
	<div class="container-fluid">
			<div class="container">
				@if(count($query1) > 0)
					<div class="row">
						@foreach($query1 as $key=> $row)
							<div class="col-sm-4">
								<div class="glisser">
									<div class="card text-center">
											<div class="title">
															<i class="fas fa-paper-plane" aria-hidden="true"></i>
															<h2>{{$row->nom_objet}} </h2>
											</div>
                                            @php
                                            // dd($row->id_client);
                                            $id_client=$row->id_client;
                                            // dd($id_partenaire)
                                            $info = DB::table('users')->find($id_client);
                                            // dd($info)
                                        @endphp
                                        <div class="price">
                                            <p><span style="color: black;front-size:12px;">Client :</span> {{$info->name}} {{$info->prenom}} </p>
                                        </div>
											<div class="option">
											<ul>
													<li> <p> {{$row->description}}</p> </li>
													<li> vous avez jusqu'a {{ date('Y-m-d', strtotime($row->date_fin.' +7 day')) }} pous ajouter votre evaluation</li>

											</ul>
											</div>
											<a style="text-decoration: none;"href="{{route('add_review_partenaire',$row->id)}}"  id="payBtn">Ajouter review</a>
										</div>
									</div>
							</div>
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h4 class="modal-title"><h3>Evaluation de partenaire sur le client</h3></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            

                                            <form action="{{route('store_review_partenaire',$row->id)}}" method="POST">

                                                @csrf
                                                
                                                    {{-- <div class="d-flex justify-content-between align-items-center mt-7" style="width:600px"> --}}
                                                        <label for="exampleInputPassword1">Note sur client</label>                   
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
                                                        <br>
                                                    
                                                    
                                                        
                                                
                                                    {{-- </div>  --}}
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">commentaire sur client</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1"  name="comment_part" style="width:55%">
                                                    </div> 
                                                
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

						@endforeach
					</div>
				@else
                    <div class="no-results">
                        <h2>Aucun enregistrement trouvé</h2>
                    </div>
				@endif
			</div>
	</div>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300');

section{
    width: 100%;
    box-sizing: border-box;
    padding: 60px 0;
}

.card{
    position: relative;
    max-width: 300px;
    height: auto;
    border: none;
    margin: 0 auto;
    margin-bottom: 15px;
    padding: 20px 10px;
    box-shadow: 0 10px 15px rgba(0,0,0,.15);
    transition: 5s;
    overflow: hidden;
    transform: scale(1);
    transition: all .35s;
}

.no-results{
	position: absolute;
	color: red;
	text-align: center;
	margin-left: 25%;
}

.card:hover{
    transform: scale(1.05);
    transition: all .35s;
}

.col-sm-4 .card,
.col-sm-4 .card .title .fas{
    

    background: linear-gradient(-45deg, #f5720e, #252525);
    -webkit-border-radius: 15px 15px 15px 15px;
    border-radius: 15px 15px 15px 15px;
}

/* .col-sm-4:nth-child(2) .card,
.col-sm-4:nth-child(2) .card .title .fas{

    background: linear-gradient(-45deg, #ffec61, #f321d7);
    -webkit-border-radius: 15px 15px 15px 15px;
    border-radius: 15px 15px 15px 15px;
}

.col-sm-4:nth-child(3) .card,
.col-sm-4:nth-child(3) .card .title .fas{

    background: linear-gradient(-45deg, #24ff72, #9a4eff);
    -webkit-border-radius: 15px 15px 15px 15px;
    border-radius: 15px 15px 15px 15px;
} */

.card:before{
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40%;
    background: rgba(255, 255,255, .1);
    z-index: 1;
    transform: skewY(-5deg) scale(1.5);
}

.title .fas{
    color: #fff;
    font-size: 60px;
    width: 100px;
    height: 100px;
    border-radius: 50%!important;
    text-align: center;
    line-height: 100px;
    box-shadow: 0 10px 10px rgba(0,0,0,.15);
}

.title h2{
    position: relative;
    margin: 20px 0 0;
    padding: 0;
    color: #fff;
    font-size: 28px;
    z-index: 2;
}

.price{
    position: relative;
    z-index: 2;
}

.price p{
    margin: 0;
    padding: 20px 0;
    color: #fff;
    font-size: 20px;
		text-align: center;
}

.option{
    position: relative;
    z-index: 2;
}

.option ul{
    margin: 0; 
    padding: 0;
}

.option ul li{
    margin: 0 0 0px;
    padding: 0;
    list-style: none;
    color: #fff;
    font-size: 18px;
	  /* text-align:left; */
}

.card a{
    position: relative;
    z-index: 2;
    background: #fff;
    color: slategray;
    width: 150px;
    height :40px;
    line-height: 40px;
    border-radius: 40px;
    display: block;
    text-align: center;
    margin: 20px auto 0;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 5px 10px rgba(0,0,0,.15);
    transform: scale(1);
    transition: all .35s;
}

.card a:hover{
    text-decoration: none;
    transform: scale(1.05);
    transition: all .35s;
}

.fa-plane{
    transform: rotate(-45deg);
}

.fa-check{
    padding-right: 10px;
}

.fa-times{
    padding-right: 10px;
}
	</style>
</section>
<script>
    $('document').ready(function(){
        
            $('#payBtn').on('click',function(e){
                e.preventDefault();
                $('#myModal').modal('toggle');
        
            });
        
            $('#continuebtn').on('click',function(){
        
                $('form').submit();
            });
        });
</script>
<script>
    
    
    // Close modal when Close button is clicked
    $(".btn-secondary").on("click", function() {
      // Find the parent modal element and hide it
      $(this).closest(".modal").modal("hide");
    });
    
    // Close modal when close icon is clicked
    $(".modal-header .close").on("click", function() {
      $('#myModal').modal('hide');
    });
    
    
    
</script>
@include('footer')