<link rel="stylesheet" href="https://themes.mintycodes.com/quicky/assets/webfonts/inter/inter.css">
<link rel="stylesheet" href="https://themes.mintycodes.com/quicky/assets/css/app.min.css">
<div class="main-layout card-bg-1">
    <div class="container d-flex flex-column">
        <div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <h1 class="font-weight-bold">Sign up</h1>
                <p class="text-dark mb-3">We are Different, We Make You Different.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form  method="POST" action="{{ route('register') }}" class="mb-3">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" class="form-control form-control-md" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email Address</label>
                        <input type="email"  name="email" class="form-control form-control-md" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password"  name="password" class="form-control form-control-md" id="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password"  name="password_confirmation" class="form-control form-control-md" id="password" placeholder="Confirm your password">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit">Sign up</button>
                </form>

                <p>Already have an account? <a class="font-weight-semibold" href="{{ route('login') }}">Sign in</a>.
                </p>
            </div>
        </div>
    </div>
</div>
