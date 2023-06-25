<div wire:ignore>
    <style>
        #imagePreview{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            overflow: hidden;
        }
        #imagePreview img{
            width: 100px;
            border-radius: 1.2rem;
            margin: 5px
        }
    </style>
    <div class="images" id="imagePreview" wire:ignore>
        
    </div>
    <div class="chat-footer"  wire:ignore>
        <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="attachment">       
            <div class="dropdown">
                <button class="btn btn-secondary btn-icon btn-minimal btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/plus-circle.svg" alt=""> -->
                </button>
                <div class="dropdown-menu">
                    <label for="gallery" style="margin: 0;cursor: pointer;width:100%;">
                        <a class="dropdown-item">
                            <input type="file" wire:model="photo" id="gallery" style="display: none;" multiple>
                            <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <!-- <img class="injectable hw-20 mr-2" src="./../../assets/media/heroicons/outline/photograph.svg" alt=""> -->
                            <span>Gallery</span>      
                        </a>
                    </label>

                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                        </svg>

                        <!-- <img class="injectable hw-20 mr-2" src="./../../assets/media/heroicons/outline/volume-up.svg" alt=""> -->
                        <span>Audio</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>

                        <!-- <img class="injectable hw-20 mr-2" src="./../../assets/media/heroicons/outline/document.svg" alt=""> -->
                        <span>Document</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>

                        <!-- <img class="injectable hw-20 mr-2" src="./../../assets/media/heroicons/outline/user.svg" alt=""> -->
                        <span>Contact</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>

                        <!-- <img class="injectable hw-20 mr-2" src="./../../assets/media/heroicons/outline/location-marker.svg" alt=""> -->
                        <span>Location</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>

                        <!-- <img class="injectable hw-20 mr-2" src="./../../assets/media/heroicons/outline/chart-square-bar.svg" alt=""> -->
                        <span>Poll</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="sender">
            <textarea wire:model="message" name="message" id="message-input"></textarea>
            <button wire:click="store" id="insert" type="button">
                <img width="50px" src="https://cdn-icons-png.flaticon.com/512/8084/8084272.png">
            </button>
        </div>
    </form>
    </div>

<script  wire:ignore>
  function showSelectedImages() {
    const fileInput = document.getElementById('gallery');
    const imagePreview = document.getElementById('imagePreview');

    if (fileInput.files && fileInput.files.length > 0) {
      imagePreview.innerHTML = ''; // Clear previous image previews

      for (let i = 0; i < fileInput.files.length; i++) {
        const file = fileInput.files[i];
        const reader = new FileReader();

        reader.onload = function(event) {
          const imageSrc = event.target.result;

          // Create an <img> element and set its source to the image file
          const imgElement = document.createElement('img');
          imgElement.src = imageSrc;

          // Append the <img> element to the imagePreview div
          imagePreview.appendChild(imgElement);
        };

        reader.readAsDataURL(file);
      }
    }
  }

  // Event listener for file input change event
  const fileInput = document.getElementById('gallery');
  fileInput.addEventListener('change', showSelectedImages);
</script>
</div>





















