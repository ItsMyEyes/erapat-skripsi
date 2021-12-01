<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Welcome to Sim-R</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
  <link rel="stylesheet" href="/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<header>
  <div class="left">
      <h1 class="logo">Sim-R<span>.</span></h1>
  </div>
  <div class="btns">
    <button class="btn btn-secondary" onclick="alert('Please contact admin SIM-R')">Contact Us</button>
    @if (auth()->check())
        <button class="btn btn-primary" onclick="window.location.href='/dashboard'">Home</button>
    @else
        <button class="btn btn-primary" onclick="window.location.href='/login'">Login</button>
    @endif
  </div>
</header>
<section id="hero">
  <div class="left">
    <h5>Welcome to Sim-R</h5>
    <h1 class="title">{{ $about->judul }}</h1>
    <p class="desc">{!! $about->description !!}</p>
    <button class="btn btn-primary" onclick="window.location.href='/login'">Get Started</button>
  </div>
  <img src="https://cdn3d.iconscout.com/3d/premium/thumb/startup-3025714-2526912.png" alt="">
</section>
<!-- partial -->
  
</body>
</html>
