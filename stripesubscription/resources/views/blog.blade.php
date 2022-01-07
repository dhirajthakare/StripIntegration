@include('include.header')

<div class="container mt-5">

    <div class="col-md-8 offset-md-2">
        <div class="card m-3">
            <div class="card-header bg-warning">
                Premium Post
            </div>
            <div class="card-body">
                <p> <a href=" {{route('Subscription')}} ">Subscription Now</a> to View Post</p>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-header bg-info">
                Free Post
            </div>
            <div class="card-body">
                <p> This is Free Post</p>
            </div>
        </div>
    </div>

</div>

@include('include.footer')