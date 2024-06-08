<header class="fixed z-10 w-full bg-white shadow-md">
    <section class="container max-w-screen-xl m-auto">
        <nav class="flex items-center justify-between py-4">
            <a href="{{ url() }}" class="block w-36">
                <img src="assets/images/kia-logo.png" alt="">
            </a>

            <ul class="flex gap-8 text-xl font-medium">
                <li><a href="{{ url() }}" class="hover:text-amber-500">Home</a></li>
                <li><a href="{{ url('products') }}" class="hover:text-amber-500">Products</a></li>
                <li><a href="about.html" class="hover:text-amber-500">About</a></li>
                <li><a href="contact.html" class="hover:text-amber-500">Contact</a></li>
            </ul>

            <ul class="flex gap-4">
                <a href="{{ url('auth/login') }}" class="hover:text-amber-500">
                    <span class="material-symbols-outlined text-3xl">person</span>
                </a>
                <a href="" class="hover:text-amber-500">
                    <span class="material-symbols-outlined text-3xl">search</span>
                </a>
                <a href="" class="hover:text-amber-500">
                    <span class="material-symbols-outlined text-3xl">favorite</span>
                </a>
                <a href="cart.html" class="hover:text-amber-500">
                    <span class="material-symbols-outlined text-3xl">shopping_cart</span>
                </a>
            </ul>
        </nav>
    </section>
</header>