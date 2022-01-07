<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
<body>

    <div>

       
        <div class="mt-5 text-center">
            @if(Session('success'))
                    
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                   @endif
            <h4>Payment GateWay Examples</h4>
        </div>

        <div class="row mt-5">
            <div class="card col m-2">
                <div class="card-header">
                    Exmaple 1 Simple Payment 
                </div>
                <div class="card-body">
                    <a href="{{route('checkout1')}}"><button class="btn btn-success">PayNow</button></a>
                </div>
    
                <div class="card-footer">
                    
                </div>
            </div>
    
        <div class="card col m-2">
            <div class="card-header">
                Exmaple 2 payment by giving full details 

            </div>
            <div class="card-body">
                    <a href="{{route('checkout')}}"><button class="btn btn-success">PayNow</button></a>
            </div>

            <div class="card-footer">

            </div>
        </div>
       
      
        
       </div>

       <div class="row mt-5">
        <div class="card col-md-6  offset-md-3">
            <div class="card-header">

                    Exmaple 3 More secure
            </div>
            
                <div class="card-body p-4">
                 <form action="{{route('checkout3')}}"  method="post" id="payment-form">
                     @csrf                    
                     <div class="form-group">
                        
                         <div class="card-body">
                             <div>
                                 <strong>billing details</strong>
                             </div>
                             <hr>
                             <div class="mb-2">
                                 <label for="email">Email Address</label>
                                 <input type="text"  name="email" class="form-control" id="email" value="{{old('email')}}" >
                                 <span class="text-danger"> @error('email'){{$message}} @enderror  </span>
                             </div>
                             <div class="mb-2">
                                 <label for="name">Name</label>
                                 <input type="text"  name="name" class="form-control" id="name" value="{{old('name')}}" >
                                 <span class="text-danger"> @error('name'){{$message}} @enderror  </span>
                             </div>
                             <div class="mb-2">
                                <label for="name">Amount</label>
                                <input type="text"  name="amount" class="form-control" id="amount" value="{{old('amount')}}" >
                                <span class="text-danger"> @error('amount'){{$message}} @enderror  </span>
                            </div>
                             <div class="mb-2">
                                 <label for="address">Address</label>
                                 <input type="text"  name="address" class="form-control" id="address" value="{{old('address')}}" >
                                 <span class="text-danger"> @error('address'){{$message}} @enderror  </span>
                             </div>
                             <div class="row mb-2">
                                 <div class="col">
                                     <label for="city">City</label>
                                     <input type="text"  name="city" class="form-control " id="city" value="{{old('city')}}" >
                                     <span class="text-danger"> @error('city'){{$message}} @enderror  </span>
                                 </div>
                                 <div class="col">
                                     <label for="state">State</label>
                                     <input type="text"  name="state" class="form-control " id="state" value="{{old('state')}}" >
                                     <span class="text-danger"> @error('state'){{$message}} @enderror  </span>
                                 </div>
                             </div>
                             <div class="row mb-2">
                                 <div class="col">
                                     <label for="postalCode">Postal Code</label>
                                     <input type="text"  name="postalCode" class="form-control " id="postalCode" value="{{old('postalCode')}}" >
                                     <span class="text-danger"> @error('postalCode'){{$message}} @enderror  </span>
                                 </div>
                                 <div class="col">
                                     <label for="phone">Phone</label>
                                     <input type="text"  name="phone" class="form-control " id="phone" value="{{old('phone')}}" >
                                     <span class="text-danger"> @error('phone'){{$message}} @enderror  </span>
                             </div>
                             
                         </div>
                         </div>
                         </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">PayNow</button>
            </div>

            </form>

        </div>
       </div>
    
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>