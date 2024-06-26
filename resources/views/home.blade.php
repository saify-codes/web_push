<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification
            </button>
            <div class="card mt-3">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Message Body</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The core Firebase JS SDK is always required and must be listed first -->
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
{{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script> --}}
<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
    import {
        getMessaging,
        getToken
    } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-messaging.js";


    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyDDm3EbRQG5cPHL6FA4iBKmmeNpJ74Eeho",
        authDomain: "webpush-429b2.firebaseapp.com",
        projectId: "webpush-429b2",
        storageBucket: "webpush-429b2.appspot.com",
        messagingSenderId: "400114933400",
        appId: "1:400114933400:web:1e6358080e08c1a4997aed"
    };

    // Initialize Firebase
    // firebase.initializeApp(firebaseConfig);
    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);
    getToken(messaging, {
            vapidKey: "BPNCk13lx99LKz93CREzSmTY9X4P2nQbvv_s9j6nrfvheUJwPvJaqwg4dikxDmRCf0n3K02v-7g3a7objQr4iFg"
        })
        .then((currentToken) => {
            if (currentToken) {
                console.log(currentToken);
            } else {
                console.log('No registration token available. Request permission to generate one.');
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
        });





    // function startFCM() {
    //     messaging
    //         .requestPermission()
    //         .then(function() {
    //             return messaging.getToken()
    //         })
    //         .then(function(response) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //             $.ajax({
    //                 url: '{{ route('store.token') }}',
    //                 type: 'POST',
    //                 data: {
    //                     token: response
    //                 },
    //                 dataType: 'JSON',
    //                 success: function(response) {
    //                     alert('Token stored.');
    //                 },
    //                 error: function(error) {
    //                     alert(error);
    //                 },
    //             });
    //         }).catch(function(error) {
    //             alert(error);
    //         });
    // }
    // messaging.onMessage(function(payload) {
    //     const title = payload.notification.title;
    //     const options = {
    //         body: payload.notification.body,
    //         icon: payload.notification.icon,
    //     };
    //     new Notification(title, options);
    // });
</script>
