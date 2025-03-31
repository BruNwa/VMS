<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script defer src="{{ asset('backend/lib/daterange/moment.min.js') }}"></script>
<script defer src="{{ asset('backend/lib/daterange/daterange.min.js') }}"></script>
<script defer src="{{ asset('backend/lib/daterange/daterange-init.js') }}"></script>
<script defer src="{{ asset('backend/lib/apexcharts/apexcharts.min.js') }}"></script>
<script defer src="{{ asset('backend/lib/inttelinput/js/intlTelInput-jquery.js') }}"></script>
<script defer src="{{ asset('backend/lib/inttelinput/js/intlTelInput.js') }}"></script>
<script defer src="{{ asset('backend/lib/inttelinput/js/utils.js') }}"></script>
<script defer src="{{ asset('backend/lib/inttelinput/js/data.js') }}"></script>
<script defer src="{{ asset('backend/lib/inttelinput/js/init.js') }}"></script>
<script defer src="{{ asset('backend/lib/swiper/bundle.min.js') }}"></script>
<script defer src="{{ asset('backend/lib/swiper/initialize.js') }}"></script>
<script defer src="{{ asset('backend/js/dropdown.js') }}"></script>
<script defer src="{{ asset('backend/js/drawer.js') }}"></script>
<script defer src="{{ asset('backend/js/modal.js') }}"></script>
<script defer src="{{ asset('backend/js/tabs.js') }}"></script>
<script src="{{ asset('js/izitoast/dist/js/iziToast.min.js') }}"></script>
<script defer src="{{ asset('backend/js/script.js') }}"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
@stack('js')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var beep = document.getElementById("myAudio1");

    function sound() {
        beep.play();
    }
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // web_token
        var firebaseConfig = {
            apiKey: "{{ setting('apiKey') }}",
            authDomain: "{{ setting('authDomain') }}",
            projectId: "{{ setting('projectId') }}",
            storageBucket: "{{ setting('storageBucket') }}",
            messagingSenderId: "{{ setting('messagingSenderId') }}",
            appId: "{{ setting('appId') }}",
            measurementId: "{{ setting('measurementId') }}"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        startFCM();

        function startFCM() {
            messaging.requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajax({
                        url: '{{ route('admin.store.token') }}',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function(response) {

                        },
                        error: function(error) {

                        },
                    });
                }).catch(function(error) {

                });
        }
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const body = payload.notification.body;
            sound();
            new Notification(title, {
                body: body,
            });
        });
    });

    $(document).ready(function() {
        @if (session('success'))
            iziToast.success({
                title: 'Success',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        @endif

        @if (session('error'))
            iziToast.error({
                title: 'Error',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        @endif
    });
</script>
