<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('frontend/css/index.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Landing Page SBH</title>
</head>

<body>
    <div id="main">
        <nav class="flex justify-between px-16 py-5 w-full">
            <h1 class="">CR</h1>
            <ul class="flex">
                <li>Home</li>
                <li class="ml-5">Features</li>
                <li class="ml-5">About</li>
                <li class="ml-5">Contact Us</li>
            </ul>
            <div class="nav-button">
                <a class="bg-black text-white p-2" href="{{url('/login')}}">Log In</a>
                <a class="ml-2 bg-black text-white p-2" href="{{url('/register')}}">Sign Up</a>
            </div>
        </nav>
        @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
        <div class="hero flex px-16 pt-5 w-full h-1/2">
            <div class="w-7/12">
                <h1 class="text-7xl font-bold">Lorem ipsum dolor sit amet.</h1>
                <p class="pt-5 text-2xl">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae obcaecati assumenda dolore ipsa laborum nesciunt iste reiciendis in eum laboriosam?</p>
                <div class="pt-5">
                    <a class="bg-black text-white p-2" href="{{url('/login')}}">Log In</button>
                    <a class="ml-2 bg-black text-white p-2" href="{{url('/register')}}">Sign Up</a>
                </div>
            </div>
            <img class="h-full" src="https://astroship.web3templates.com/_astro/hero.6fdd0dc6_Z2mbqjy.webp" alt="">
        </div>
        <div class="features grid grid-cols-3 grid-rows-2 gap-1 px-16 py-10 text-white">
            <div class="bg-black text-white h-64 flex flex-col items-center justify-center">
                <h1>100%</h1>
                <p>Customizable</p>
            </div>
            <div class="bg-black text-whiteh-64 h-64 flex flex-col items-center justify-center text-center">
                <h1>Secure by default</h1>
                <p>Provident fugit and vero voluptate. magnam magni doloribus dolores voluptates a sapiente nisi.</p>
            </div>
            <div class="bg-black text-whiteh-64 h-64 flex flex-col items-center justify-center text-center">
                <h1>Faster than light</h1>
                <p>Provident fugit vero voluptate. magnam magni doloribus dolores voluptates inventore nisi.</p>
            </div>
            <div class="bg-black text-white h-64 flex flex-col items-center justify-center text-center">
                <h1>Faster than light</h1>
                <p>Provident fugit vero voluptate. Voluptates a sapiente inventore nisi.</p>
            </div>
            <div class="bg-black text-white h-64 flex flex-col items-center justify-center text-center">
                <h1>Keep your loved ones safe</h1>
                <p>Voluptate. magnam magni doloribus dolores voluptates a sapiente inventore nisi.</p>
            </div>
            <div class="bg-black text-white h-64 flex flex-col items-center justify-center text-center">
                <h1>Keep your loved ones safe</h1>
                <p>Voluptate. magnam magni doloribus dolores voluptates a sapiente inventore nisi.</p>
            </div>
        </div>
        <div class="about px-16">
            <h1 class="text-3xl">About</h1>
            <p class="text-xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non sed atque ex sit temporibus earum repellat, voluptate magni, et mollitia ratione libero est tempora aut similique expedita adipisci quae asperiores repellendus labore magnam! Fugit nesciunt, error optio doloribus officia odit facilis laborum asperiores amet omnis fuga! Velit voluptatibus officiis perferendis.</p>
            <div class="flex px-32 gap-2 text-center">
                <div class="bg-black text-white h-32 w-32 rounded-full">Ranadeb</div>
                <div class="bg-black text-white h-32 w-32 rounded-full">Tuman</div>
                <div class="bg-black text-white h-32 w-32 rounded-full">Himu</div>
                <div class="bg-black text-white h-32 w-32 rounded-full">Soumyadeep</div>
                <div class="bg-black text-white h-32 w-32 rounded-full">Yajuddin</div>
                <div class="bg-black text-white h-32 w-32 rounded-full">Sunita</div>
            </div>
        </div>
    </div>
    <footer class="bg-black text-white px-16 mt-5 h-auto">
        <div class="flex justify-between">
            <h1 class="mt-5 text-4xl">CR</h1>
            <div class="border-white border-l-[1px] my-5">
                <p class="pl-5 text-xl">Follow us</p>
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
            </div>
            <div class="border-white border-l-[1px] my-5">
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
                <p class="pl-5 text-xl">lorem</p>
            </div>
            <form class="flex flex-col gap-1 border-white border-l-[1px] pl-5 my-5" action="">
                <label for="">Your email*</label>
                <input class="text-black" type="email" placeholder="example@email.com" required>
                <label for="">Your message*</label>
                <textarea class="text-black" name="" id="" cols="30" rows="2" placeholder="Leave a message" required></textarea>
                <button class="bg-white text-black p-2" type="submit">Send message</button>
            </form>
        </div>
        <hr>
        <div class="flex gap-1">
            <p>©2024</p>
            <!-- <p>™</p> -->
            <p>. All rights reserved</p>
        </div>
    </footer>
</body>

</html>