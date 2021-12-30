<div class="container my-4 px-0">
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
    <div class="py-5">
        <a class="btn-primary px-4 py-3 mx-2 btn-floating rounded" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-primary px-4 py-3 mx-2 btn-floating rounded" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
    </ol>

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @if(isset($related[0]))
        <div class="carousel-item active">
            <div class="row">
                <?php $n=0; ?>                
                @foreach($related[0] as $product)
                    @if($n==0)
                    <div class="col-md-4"> 
                    @else
                    <div class="col-md-4 clearfix d-none d-md-block"> 
                    @endif                   
                    @include('frontend._product-card')
                    </div>
                <?php $n++; ?>
                @endforeach
            </div>
        </div>
        @endif
        @if(isset($related[1]))
        <div class="carousel-item">
            <div class="row">
                <?php $n=0; ?>                
                @foreach($related[1] as $product)
                    @if($n==0)
                    <div class="col-md-4"> 
                    @else
                    <div class="col-md-4 clearfix d-none d-md-block"> 
                    @endif                   
                    @include('frontend._product-card')
                    </div>
                <?php $n++; ?>
                @endforeach
            </div>
        </div>
        @endif
        @if(isset($related[2]))
        <div class="carousel-item">
            <div class="row">
                <?php $n=0; ?>                
                @foreach($related[2] as $product)
                    @if($n==0)
                    <div class="col-md-4"> 
                    @else
                    <div class="col-md-4 clearfix d-none d-md-block"> 
                    @endif                   
                    @include('frontend._product-card')
                    </div>
                <?php $n++; ?>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    </div>
</div>