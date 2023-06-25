<link rel="stylesheet" href="https://themes.mintycodes.com/quicky/assets/webfonts/inter/inter.css">
<link rel="stylesheet" href="https://themes.mintycodes.com/quicky/assets/css/app.min.css">
<div class="main-layout card-bg-1">
    <div class="container d-flex flex-column">
        <div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <h1 class="font-weight-bold">Sign in</h1>
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
                <form method="POST" action="{{ route('login') }}" class="mb-3">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="sr-only">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-md" id="email" placeholder="Enter your email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control form-control-md" id="password" placeholder="Enter your password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked="" id="checkbox-remember">
                            <label class="custom-control-label text-muted font-size-sm" for="checkbox-remember">Remember me</label>
                        </div>
                        <a class="font-size-sm" href="./reset-password.html">Reset password</a>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit">Sign in</button>
                </form>

                <p>Don't have an account? <a class="font-weight-semibold" href="{{ route('register') }}">Sign up</a>.</p>
            </div>
        </div>
    </div>
</div>