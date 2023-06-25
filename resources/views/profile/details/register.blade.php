<link rel="stylesheet" href="https://themes.mintycodes.com/quicky/assets/webfonts/inter/inter.css">
<link rel="stylesheet" href="https://themes.mintycodes.com/quicky/assets/css/app.min.css">
<link rel="stylesheet" href="{{ asset('css/profile/details/about.css') }}">
<style>
    #country{
        width: 100%;
        border: 1px solid #d3d3d3;
        outline: 0;
        background-color: #ebebeb;
    }
    #gender{
        width: 100%;
        border: 1px solid #d3d3d3;
        outline: 0;
        background-color: #ebebeb;
    }
    
</style>
<div class="main-layout card-bg-1">
    <div class="container d-flex flex-column">
        <div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <h1 class="font-weight-bold">About you</h1>
                <p class="text-dark mb-3">People are interested in you, and your career.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form  method="POST" action="{{ route('aboutsaved') }}" class="mb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo" id="profile_photo">
                            <div class="photo">
                                <img id="selected-image" src="{{ asset('icons/user.jfif') }}" alt="Selected Image">
                            </div>
                            <div class="uploader">
                                <img class="icon" src="{{ asset('icons/upload.png') }}" alt="">
                                <h6>Photo Profile</h6>
                            </div>
                            <input type="file" name="photo" id="photo" onchange="displaySelectedImage(event)">
                        </label>
                    </div>
                    <div class="form-group">
                        <h6>Select your Country</h6>
                        <select name="country" id="country">
                        </select>
                        </div>
                    <div class="form-group">
                        <h6>Select your Gender</h6>
                        <select name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h6>Write a Paragraph About you</h6>
                        <textarea name="about" id="about">{{ old('about') }}</textarea>
                    </div>
                
                    <button class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit">Next</button>
                </form>

            
            </div>
        </div>
    </div>
</div>
<script>
    function displaySelectedImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var image = document.getElementById('selected-image');
                image.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    let country = document.getElementById('country')
    let country2 = document.getElementById('country2')
    fetch('https://flagcdn.com/en/codes.json').then(res=>res.json())
    .then(data=>{
        for (let object in data) {          
            let pays = document.createElement('option')
            let image = document.createElement('img')

            pays.value = object
            pays.textContent = data[object]
            image.src = `https://flagcdn.com/16x12/${object}.png`
            pays.appendChild(image)
            country.appendChild(pays)

        }
    })
      // const pays = `<option value="${data[object]}">${data[object]}</option>` + `<img src="https://flagcdn.com/16x12/${object}.png"/>`
            // country.innerHTML += pays 
</script>