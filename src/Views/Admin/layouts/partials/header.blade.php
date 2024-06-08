<header class="fixed top-0 z-10 w-full shadow-md bg-slate-100">
    <section class="container max-w-screen-xl m-auto">
        <nav class="flex items-center justify-between py-4">
            <a href="{{url('admin')}}" class="block text-2xl font-bold">
                ADMIN
            </a>

            <ul class="flex gap-8 text-xl font-semibold">
                <a class="hover:text-red-500" href="{{url('admin/categories')}}">Danh Mục</a>
                <a class="hover:text-red-500" href="{{url('admin/products')}}">Sản Phẩm</a>
                <a class="hover:text-red-500" href="{{url('admin/users')}}">Tài Khoản</a>
                <a class="hover:text-red-500" href="{{url('admin')}}">Thống Kê</a>
            </ul>

            <a href="{{ url('auth/logout') }}" class="font-semibold block w-fit float-right px-6 py-1 my-2 text-red-500 border-2 border-red-500 hover:bg-red-500 hover:text-white">
                Log out
            </a>
        </nav>
    </section>
</header>