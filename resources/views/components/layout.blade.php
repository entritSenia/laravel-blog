<!DOCTYPE html>
<html lang="en">

<!-- molla/elements-blog-posts.html  22 Nov 2019 10:05:18 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> @isset($doctitle)
            {{ $doctitle }} | My Blog App
        @else
            My Blog App
        @endisset
    </title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/icons/favicon-16x16.png">
    {{-- <link rel="manifest" href="images/icons/site.html"> --}}
    <link rel="mask-icon" href="images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/bootstrap.min.css'])
    @vite(['resources/css/plugins/owl-carousel/owl.carousel.css'])
    @vite(['resources/css/style.css'])
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="page-wrapper">
        <div class="border-top">
            <div class="container-fluid d-flex">
                @auth
                    <div class="col-1" id="mobile-menu-new">
                        <input type="checkbox" id="active">
                        <label for="active" class="menu-btn"><span></span></label>
                        <label for="active" class="close"></label>
                        <div class="wrapper">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/create-post">Create a post</a></li>
                                <li><a href="/profile/{{ auth()->user()->username }}">Profile</a></li>
                                <li><a class="header-small-search-icon" title="Search" data-toggle="tooltip"
                                        data-placement="bottom"><i class="icon-search"
                                            style="color:#333;font-size:32px;font-weight:700;position:relative"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth
                <div class="col-5 text-left" id="top-bar">
                    <ul class="menu justify-content-start p-1 pt-1 pr-5">
                        <li class="pr-4 text-white"><span style="font-size: 16px">tel: 999</span></li>
                        <li class="text-white"><span style="font-size: 16px">entritsenia@gmail.com</span></li>
                    </ul>
                </div>
                <div class="col-11 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 co col-2">
                    <ul class="menu justify-content-end p-1 pr-5">
                        @auth
                            <li><a href="/profile/{{ auth()->user()->username }}" class="mr-4 p-0"><img
                                        title="{{ auth()->user()->username }}" data-toggle="tooltip" data-placement="bottom"
                                        style="width: 32px; height: 32px; border-radius: 16px"
                                        src="{{ auth()->user()->avatar }}" /></a>
                            </li>
                            <li class="pt-1"><a class="mr-4 p-0" href="/create-post"><i
                                        class="fa-regular fa-plus text-white" style="font-size:18px"></i></a>
                            </li>
                            <li class="pt-1">
                                <form action="/logout" method="POST" class="d-inline">
                                    @csrf
                                    <button class="border-0 bg-transparent" type="submit"><i
                                            class="fa-solid fa-arrow-right-from-bracket"
                                            style="color:#ffffff;font-size:18px"></i></button>
                                </form>
                            </li>
                        @else
                            <li>
                                <div class="mr-4">
                                    <a class="text-uppercase" style="color:#ffffff;" href="/"><i class="icon-user"
                                            style="font-size:24px"></i></a>
                                    </d>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <header class="header pt-5 pb-5">
            <div class="col-12 text-center">
                <adiv class="logo">
                    {{-- <img src="/images/logo.png" alt="Molla Logo" width="105" height="25"> --}}
                    <h1>𝑀𝓎 𝐵𝓁𝑜𝑔 𝒜𝓅𝓅</h1>
                    <h5>𝘌𝘯𝘵𝘳𝘪𝘵 𝘚𝘦𝘯𝘪𝘢</h5>
                </adiv>
            </div>

            <div class="sticky-header pt-3">
                <div class="container">
                    <div class="header">
                        <nav class="main-nav">
                            @auth
                                <ul class="menu sf-arrows justify-content-center">
                                    <li>
                                        <a href="/" class="sf-with-ul down-arrow-none">Home</a>
                                    </li>
                                    <li>
                                        <a href="/create-post" class="sf-with-ul down-arrow-none">Create A post</a>
                                    </li>

                                    <li>
                                        <a href="/profile/{{ auth()->user()->username }}"
                                            class="sf-with-ul down-arrow-none">Profile</a>
                                    </li>
                                    <li>
                                        {{-- <a href="/profile/{{ auth()->user()->username }}"
                                        class="sf-with-ul down-arrow-none">My Profile</a> --}}
                                    </li>
                                    <li>
                                        <a class="header-search-icon" title="Search" data-toggle="tooltip"
                                            data-placement="bottom"><i class="icon-search"
                                                style="color:#333;font-size:22px;font-weight:700"></i></a>
                                    </li><!-- End .header-search -->
                                    {{-- <li>
                                    <span class="mr-2 header-chat-icon" title="Chat" data-toggle="tooltip"
                                        data-placement="bottom"><i class="fas fa-comment"
                                            style="color:#333;font-size:20px;font-weight:700"></i></span>
                                </li> --}}
                                </ul><!-- End .menu -->
                            @endauth
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            @if (session()->has('success'))
                {<div class="container container--narrow">
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                </div>
                }
            @elseif (session()->has('error'))
                {
                <div class="container container--narrow">
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                </div>
                }
            @endif
            {{ $slot }}
        </main><!-- End .main -->

        <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row  text-center">
                        <div class="col-sm-12 col-lg-12 row justify-content-center">
                            <div class="widget widget-about mb-2">
                                <img src="/images/logo.jpg" class="footer-logo text-center" alt="Footer Logo"
                                    width="105" height="25">
                                <p class="mb-1">Entrit Senia</p>
                                <p class="mb-2">entritsenia@gmail.com</p>
                                <div class="social-icons justify-content-center">
                                    <a href="https://www.linkedin.com/in/entrit-senia/" class="social-icon"
                                        target="_blank" title="Linked-in"><i class="icon-linkedin"></i></a>
                                    <a href="https://www.instagram.com/entritsenia/" class="social-icon"
                                        target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->
            <div class="text-center col-12 border-top p-2">
                <p class="m-0">Copyright &copy; {{ date('Y') }} <a href="/" class="text-muted">Entrit
                        Senia</a>. All
                    rights reserved.
                </p>
            </div>
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    {{-- <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index.html">Home</a>

                        <ul>
                            <li><a href="index-1.html">01 - furniture store</a></li>
                            <li><a href="index-2.html">02 - furniture store</a></li>
                            <li><a href="index-3.html">03 - electronic store</a></li>
                            <li><a href="index-4.html">04 - electronic store</a></li>
                            <li><a href="index-5.html">05 - fashion store</a></li>
                            <li><a href="index-6.html">06 - fashion store</a></li>
                            <li><a href="index-7.html">07 - fashion store</a></li>
                            <li><a href="index-8.html">08 - fashion store</a></li>
                            <li><a href="index-9.html">09 - fashion store</a></li>
                            <li><a href="index-10.html">10 - shoes store</a></li>
                            <li><a href="index-11.html">11 - furniture simple store</a></li>
                            <li><a href="index-12.html">12 - fashion simple store</a></li>
                            <li><a href="index-13.html">13 - market</a></li>
                            <li><a href="index-14.html">14 - market fullwidth</a></li>
                            <li><a href="index-15.html">15 - lookbook 1</a></li>
                            <li><a href="index-16.html">16 - lookbook 2</a></li>
                            <li><a href="index-17.html">17 - fashion store</a></li>
                            <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                            <li><a href="index-19.html">19 - games store</a></li>
                            <li><a href="index-20.html">20 - book store</a></li>
                            <li><a href="index-21.html">21 - sport store</a></li>
                            <li><a href="index-22.html">22 - tools store</a></li>
                            <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                            <li><a href="index-24.html">24 - extreme sport store</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="category.html">Shop</a>
                        <ul>
                            <li><a href="category-list.html">Shop List</a></li>
                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span
                                            class="tip tip-hot">Hot</span></span></a></li>
                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span
                                            class="tip tip-new">New</span></span></a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="#">Lookbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html" class="sf-with-ul">Product</a>
                        <ul>
                            <li><a href="product.html">Default</a></li>
                            <li><a href="product-centered.html">Centered</a></li>
                            <li><a href="product-extended.html"><span>Extended Info<span
                                            class="tip tip-new">New</span></span></a></li>
                            <li><a href="product-gallery.html">Gallery</a></li>
                            <li><a href="product-sticky.html">Sticky Info</a></li>
                            <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                            <li><a href="product-fullwidth.html">Full Width</a></li>
                            <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li>
                                <a href="about.html">About</a>

                                <ul>
                                    <li><a href="about.html">About 01</a></li>
                                    <li><a href="about-2.html">About 02</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>

                                <ul>
                                    <li><a href="contact.html">Contact 01</a></li>
                                    <li><a href="contact-2.html">Contact 02</a></li>
                                </ul>
                            </li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>

                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="#">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Single Post</a>
                                <ul>
                                    <li><a href="single.html">Default with sidebar</a></li>
                                    <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                    <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements-list.html">Elements</a>
                        <ul>
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-titles.html">Titles</a></li>
                            <li><a href="elements-banners.html">Banners</a></li>
                            <li><a href="elements-product-category.html">Product Category</a></li>
                            <li><a href="elements-video-banners.html">Video Banners</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                            <li><a href="elements-accordions.html">Accordions</a></li>
                            <li><a href="elements-tabs.html">Tabs</a></li>
                            <li><a href="elements-testimonials.html">Testimonials</a></li>
                            <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                            <li><a href="elements-portfolio.html">Portfolio</a></li>
                            <li><a href="elements-cta.html">Call to Action</a></li>
                            <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                        class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                        class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                        class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                        class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container --> --}}

    <!-- Plugins JS File -->
    @vite(['resources/js/jquery.min.js'])
    @vite(['resources/js/bootstrap.bundle.min.js'])
    @vite(['resources/js/jquery.hoverIntent.min.js'])
    @vite(['resources/js/jquery.waypoints.min.js'])
    @vite(['resources/js/superfish.min.js'])
    @vite(['resources/js/owl.carousel.min.js'])
    @vite(['resources/js/main.js'])
    <!-- Main JS File -->

    {{-- <script>
        $('[data-toggle="tooltip"]').tooltip()
    </script> --}}
</body>


<!-- molla/elements-blog-posts.html  22 Nov 2019 10:05:20 GMT -->

</html>
