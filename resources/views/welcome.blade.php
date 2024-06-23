<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>Send Email</title>
</head>
<body>
  <div class="wrapper" style="margin-top: 9rem;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
            <h3>Contact Us</h3>
            </div>
            @if(session('success'))
            <div class="alert alert-success m-2">
              {{ session('success')}}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger m-2">
              {{ session('error')}}
            </div>
            @endif
       
            <form action="{{route('mail.send')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
              <div class="form-floating mb-3">
                <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Name</label>
                @error('name')
                <span class="text-danger">
                     {{$message}}
                </span>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="email" value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                @error('email')
                <span class="text-danger">
                {{$message}}
                </span>
                @enderror
              </div>
              
              <div class="form-floating mb-3">
                <input type="text" value="{{old('subject')}}" class="form-control @error('email') is-invalid @enderror" name="subject" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Subject</label>
                @error('subject')
                <span class="text-danger">
                {{$message}}
                </span>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <textarea value="{{old('message')}}" class="form-control @error('email') is-invalid @enderror" value="{{old('message')}}" placeholder="" name="message" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Message</label>
                @error('message')
                <span class="text-danger">
                {{$message}}
                </span>
                @enderror
              </div>

              <div class="mb-3">
                <input type="file" name="attachment" class="form-control" id="floatingInput">
                
              </div>

            
            
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              
             
            </div>

          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>