<html>

<head>
    <title>litshelf</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<link href="https://fonts.google.com/specimen/Lato" rel="stylesheet">
<link rel="stylesheet" href="css/welcome.css">
<link rel="stylesheet" href="css/home.css">

<body>
    <div class=top-content>
        <div class=top-body-left>
            <div class=heading>
                <h1>Online</h1>
                <h1 class=h2>Haberdashery</h1>
                <pre>It does what it says onthe tin!
If you sell services or products that are
commodities or you think your products
are 'boring' ,think again.</pre>
                <a href=" "class=signupp>Signup</a>
            </div>
            <div class=circle></div>
        </div>
        <div class=top-body-right>
            <div class=circle2></div>
        </div>
        {{-- <div class="container">
            <div class="card">
                <div class="card-body"> --}}
        {{-- <div class=card> --}}
        {{-- <div class="card-body"> --}}
        <div class="nav card-body">
            <div class=logo>
                <a href=""><img src="{{asset('css/raw/logo.png')}}" style="height:20px;width:20px;"></a>
            </div>
            <div class=lists>
                <a href="">Home</a>
                <a href="">About</a>
                <a href="">Home</a>
                <a href="{{route('admin.login')}}">Login</a>
                <a href="{{route('admin.register')}}"class=signup>Signup</a>

            </div>
        </div>


        <div class=slider>
        </div>
        <div class=arrival-header>
            <div class=card>
                <div class="card-title">
                    <h1>New Arrivals Here</h1>
                </div>
            </div>
        </div>
        <div class="new-arrival">
            {{-- first book --}}
            <div class="book1">
                <img src="images/dont.jpg">
                <div class="description">
                    <pre>I don't Love
        you any more</pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>

            {{-- second book --}}
            <div class="book2">
                <img src="images/atomic.png">
                <div class="description">
                    <pre>Atomic habit
        </pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>
            {{-- third book --}}
            <div class="book3">
                <img src="images/ikigai.png">
                <div class="description">
                    <pre>Ikigai
        </pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>
            {{-- fourth book --}}
            <div class="book4">
                <img src="images/horror.png">
                <div class="description">
                    <pre>Bram Stoker'sDracula
        </pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>

            </div>
        </div>


        <div class="sub-header2">
            <h1>Love</h1>
        </div>
        <div class="new-arrival2">
            {{-- first book --}}
            <div class="book1">
                <img src="images/atomic.png">
                <div class="description">
                    <pre>Atomic</pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>

            {{-- second book --}}
            <div class="book2">
                <img src="images/dont.jpg">
                <div class="description">
                    <pre>I don't Love
        you any more</pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>
            {{-- third book --}}
            <div class="book3">
                <img src="images/horror.png">
                <div class="description">
                    <pre>Bram Stoker's Dracula
                </pre>
                    <p>350</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>
            {{-- fourth book --}}
            <div class="book3">
                <img src="images/ikigai.png">
                <div class="description">
                    <pre>Ikigai
                </pre>
                    <p>500</p>
                </div>
                <a href="#" class="btn btn-warning">Add To Cart</a>
                <a href="#" class="btn btn-primary" class="a2">Buy</a>
            </div>
        </div>

        <div class=test>
            <h1>Testimonial</h1>
            <div class=circles>
                <div class=circle3></div>
                <div class=circle4></div>
                <div class=circle5></div>
            </div>
            <div class=pre>
                <div class=card3>
                    <pre class=pre-c3>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
Temporibus qui quidem repudiandae, culpa cumque sint
doloremque nihil impedit accusantium est, ab, vitae
blanditiis recusandae necessitatibus eum.
Consequatur dolores eum optio.</pre>
                </div>
                <pre class=pre-c4>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
Temporibus qui quidem repudiandae, culpa cumque sint
doloremque nihil impedit accusantium est, ab, vitae
blanditiis recusandae necessitatibus eum.
Consequatur dolores eum optio.</pre>
                <pre class=pre-c5>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
Temporibus qui quidem repudiandae, culpa cumque sint
doloremque nihil impedit accusantium est, ab, vitae
blanditiis recusandae necessitatibus eum.
Consequatur dolores eum optio.</pre>
            </div>
        </div>

        <div class="welcome">
            <div class="content">
                <h1>WELCOME</h1>
                <h2>TO OUR WEBSITE</h2>
                <pre>Lorem ipsum dolor sit amet consectetur adipisicing elit.
Provident ex blanditiis voluptas ea assumenda pariatur
consequuntur officiis error. Quas possimus repudiandaetenetur
magnam id expedita corrupti reprehenderit dicta quia hic.</pre>
            </div>
            <img src="">
        </div>

        <div class="footer">

        </div>

</body>

</html>
{{-- @endsection --}}
