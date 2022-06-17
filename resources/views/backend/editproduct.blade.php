<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Product</title>
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ Route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ Route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Product
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ Route('manage') }}">Manage Product</a>
                                <a class="nav-link" href="{{ Route('create') }}">Add Product</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Product</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card shadow-base p-3 bd-0 overflow-hidden">
                                        <form action="{{ Route('update',$products->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="item_code">Product Name</label>
                                                        <input type="text" placeholder="Enter Product Name"
                                                            class="form-control" name="name" id="name"
                                                            value="{{ $products->name}}">
                                                        <span class="text-danger">
                                                            @error('name')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Category Name</label>
                                                        <input type="text" placeholder="Enter Category Name"
                                                            class="form-control" name="category_name"
                                                            id="category_name" value="{{$products->category_name}}">
                                                        <span class="text-danger">
                                                            @error('category_name')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Brand Name</label>
                                                        <input type="text" placeholder="Enter Brand Name"
                                                            class="form-control" name="brand_name" id="brand_name"
                                                            value="{{$products->brand_name}}">
                                                        <span class="text-danger">
                                                            @error('brand_name')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                    <img height="80"
                                                        src="{{ asset('backend/productimgages/' . $products->image) }}"
                                                        alt="">
                                                    <div class="form-group">
                                                        <label for="image">Product Image</label>
                                                        <input type="file" placeholder="Upload Image"
                                                            class="form-control" name="image" id="image">
                                                        <span class="text-danger">
                                                            @error('image')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea type="text" placeholder="Enter Product Description" class="des form-control" rows="4" name="description">{{ $products->description }}</textarea>
                                                        <span class="text-danger desError"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="">-----Select Status-----</option>
                                                            <option value="1"
                                                                @if ($products->status == 1) selected @endif>Active
                                                            </option>
                                                            <option value="2"
                                                                @if ($products->status == 2) selected @endif>
                                                                Inactive</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group m">
                                                        <button class="form-control btn btn-info">Update
                                                            Product</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div><!-- card -->
                                </div> <!-- col-12 -->
                            </div><!-- row -->
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">When scrolling, the navigation stays at the top of the page. This is
                            the end of the static navigation demo.</div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
</body>

</html>
