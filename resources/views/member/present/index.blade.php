@extends('layouts.main.member')

@section('title', 'Present')

@section('content')

    @if ($attendance['status'] == 'open' || $attendance['status'] == 'not')
        {{-- Camera --}}
        <form action="/member/present/store" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="data_url" id="inputDataUrl">
            <div id="cameraFrame">
                <video id="videoId" autoplay="true" style="transform: rotateY(180deg)"
                    class="w-full h-full rounded-2xl md:rounded-none"></video>
                <div class="text-center md:absolute md:bottom-5 md:right-5 mt-5">
                    <button id="takePhotoButtonId" class="btn btn-lg btn-primary text-white"><i
                            class="fa-solid fa-camera text-xl text-white"></i>Absen</button>
                </div>
            </div>
        </form>
    @elseif ($attendance['status'] == 'close')
        <div class="flex items-center justify-center h-full w-full p-5 overflow-auto">
            <div class="text-center">
                <p class="text-lg mb-3">Kamu telah melakukan absen, tunggu waktu absen keluar</p>
                <div class="btn btn-primary text-white btn-lg">Pukul
                    {{ $attendance['attendance']->time_end_deadline . ' - ' . $attendance['attendance']->time_end_gap_deadline }}
                </div>
            </div>
        </div>
    @endif





@endsection

@section('script')
    @if ($attendance['status'] == 'open' || $attendance['status'] == 'not')
        <script src="{{ asset('assets/plugin/jslib-html5-camera-photo/jslib-html5-camera-photo.min.js') }}"></script>

        <script>
            // get video and image elements from the html
            let videoElement = document.getElementById('videoId');
            let imgElement = document.getElementById('imgId');

            // get buttons elements from the html
            let takePhotoButtonElement = document.getElementById('takePhotoButtonId');
            let stopCameraButtonElement = document.getElementById('stopCameraButtonId');

            let FACING_MODES = JslibHtml5CameraPhoto.FACING_MODES;
            let cameraPhoto = new JslibHtml5CameraPhoto.default(videoElement);

            /*
             * Start the camera with ideal environment facingMode
             * if the environment facingMode is not available, it will fallback
             * to the default camera available.
             */
            cameraPhoto.startCamera(FACING_MODES.USER, {
                    width: 640,
                    height: 480,
                })
                .catch((error) => {

                    // Show alert error in Modal
                    document.getElementById('feedbackErrorModal').checked = true;

                    // Get the modal
                    document.getElementById('feedbackErrorModalTitle').innerHTML = 'Permission denied';
                    document.getElementById('feedbackErrorModalText').innerHTML = 'Izinkan browser untuk mengakses kamera.';

                    // Send Request Permission
                    navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                });

            // function called by the buttons.
            function takePhoto() {
                const config = {
                    isImageMirror: true
                }

                let dataUri = cameraPhoto.getDataUri(config);
                console.log(dataUri);
                imgElement.src = dataUri;
                inputDataUrl.setAttribute('value', dataUri);
            }

            function stopCamera() {
                cameraPhoto.stopCamera()
                    .then(() => {
                        console.log('Camera stoped!');
                    })
                    .catch((error) => {
                        console.log('No camera to stop!:', error);
                    });
            }
            // bind the buttons to the right functions.
            takePhotoButtonElement.onclick = takePhoto;
            stopCameraButtonElement.onclick = stopCamera;
        </script>
    @endif
@endsection
