<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="container-fluid">
    <div class="row ">

        {{-- ***********image body************** --}}

        <div class="col-md-6">
            <img src="/assets/photoLogin.svg" class="rounded float-left" alt="">
        </div>
        <div class="col-md-6">
            <div class="col-md-4 offset-md-3">
                <br />
                <br />
                <br />
                <img src={{ '/assets/logo.svg' }} alt="">
            </div>

            <div class="col-md-4 offset-md-3">
                <div class="card-header bg-white">
                    <h1> {{__('เข้าสู่ระบบ') }}</h1>
                </div>
            </div>

            <br />
            <br />
            <div class="col">
                {{-- <div class="card-body"> --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-7 offset-md-1">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="เบอร์โทร" name="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-7 offset-1">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="รหัสผ่าน" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-1 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 offset-md-3">
                            <button type="submit" class="btn btn-info">
                                {{ __('เข้าสู่ระบบ') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
